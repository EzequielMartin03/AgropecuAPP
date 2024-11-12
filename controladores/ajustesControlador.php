<?php
include_once 'modelos/database.php';

class AjustesControlador {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::connection();
    }

    // Método para descargar el respaldo de la base de datos
    public function descargarBackup() {
        try {
            // Nombre del archivo de respaldo
            $backupFile = 'backup_' . date("Y-m-d_H-i-s") . '.sql';
            $output = '';
    
            // Establecer el tiempo de ejecución máximo para evitar que se detenga en bases de datos grandes
            set_time_limit(0);  // Sin límite de tiempo de ejecución
    
            // Obtener todas las tablas de la base de datos
            $tables = $this->pdo->query('SHOW TABLES')->fetchAll(PDO::FETCH_COLUMN);
    
            foreach ($tables as $table) {
                // Obtener la estructura de la tabla
                $output .= "DROP TABLE IF EXISTS `$table`;\n"; // Eliminar la tabla si existe
                $createTableStmt = $this->pdo->query("SHOW CREATE TABLE `$table`")->fetch(PDO::FETCH_ASSOC);
                $output .= $createTableStmt['Create Table'] . ";\n\n";
    
                // Obtener los datos de la tabla
                $rows = $this->pdo->query("SELECT * FROM `$table`");
    
                // Obtener las columnas de la tabla para la sentencia INSERT
                $columns = array_keys($rows->fetch(PDO::FETCH_ASSOC));
    
                // Volver al inicio de los resultados para procesar las filas
                $rows->execute();
    
                // Agrupar las filas en un solo INSERT
                $insertValues = [];
                foreach ($rows as $row) {
                    $values = [];
    
                    foreach ($columns as $column) {
                        $value = $row[$column];
                        // Si el valor es null, insertamos 'NULL' en lugar de una cadena vacía
                        if ($value === null) {
                            $values[] = 'NULL';
                        } else {
                            // Escapa el valor para SQL
                            $quotedValue = $this->pdo->quote($value);
                            $values[] = $quotedValue;
                        }
                    }
    
                    // Agregar los valores de la fila a la lista de valores para INSERT
                    if (count($values) > 0) {
                        $insertValues[] = "(" . implode(', ', $values) . ")";
                    }
                }
    
                // Si hay datos para insertar, generar el INSERT
                if (!empty($insertValues)) {
                    $output .= "INSERT INTO `$table` (" . implode(', ', $columns) . ") VALUES \n";
                    $output .= implode(",\n", $insertValues) . ";\n\n";
                }
            }
    
            // Guardar en un archivo
            file_put_contents($backupFile, $output);
    
            // Descargar el archivo
            header('Content-Description: File Transfer');
            header('Content-Type: application/sql');
            header('Content-Disposition: attachment; filename=' . basename($backupFile));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($backupFile));
            readfile($backupFile);
    
            // Eliminar el archivo temporal
            unlink($backupFile);
    
        } catch (Exception $e) {
            echo "Error al generar el backup: " . $e->getMessage();
        }
    }
    
    
    

    // Método para restaurar el respaldo de la base de datos
    public function restaurarBackup() {
        if (isset($_POST['submit'])) {
            // Verifica si se ha subido un archivo
            if (isset($_FILES['sql_file']) && $_FILES['sql_file']['error'] == 0) {
                $file = $_FILES['sql_file']['tmp_name'];
    
                // Lee el contenido del archivo SQL
                $sql_query = file_get_contents($file);
    
                // Conexión a la base de datos usando PDO
                try {
                    $conn = new PDO('mysql:host=localhost;dbname=agropecuappdb', 'root', '');
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                    // Paso 1: Deshabilitar las restricciones de clave foránea
                    $conn->exec("SET foreign_key_checks = 0");
    
                    // Paso 2: Eliminar todas las tablas de la base de datos
                    // Primero elimina las tablas dependientes (con claves foráneas)
                    $conn->exec("DROP TABLE IF EXISTS `aguaterotrabajo`");
    
                    // Luego elimina las demás tablas
                    $tables = $conn->query('SHOW TABLES')->fetchAll(PDO::FETCH_COLUMN);
                    foreach ($tables as $table) {
                        $conn->exec("DROP TABLE IF EXISTS `$table`");
                    }
    
                    // Paso 3: Ejecutar las consultas SQL desde el archivo
                    $queries = explode(';', $sql_query); // Divide las consultas por punto y coma
                    foreach ($queries as $query) {
                        $query = trim($query); // Limpiar espacios en blanco
                        if (!empty($query)) {
                            // Verificar si la consulta es un INSERT
                            if (stripos($query, 'INSERT INTO') !== false) {
                                // Asegurarse de que la cantidad de columnas coincida con la cantidad de valores
                                $tableName = ''; // Obtener el nombre de la tabla del query
                                preg_match('/INSERT INTO `([^`]+)`/', $query, $matches);
                                if (!empty($matches)) {
                                    $tableName = $matches[1];
                                }
    
                                // Obtener la cantidad de columnas en la tabla
                                $stmt = $conn->prepare("DESCRIBE `$tableName`");
                                $stmt->execute();
                                $columns = $stmt->fetchAll(PDO::FETCH_COLUMN);
                                $numColumns = count($columns);
    
                                // Obtener los valores de la consulta INSERT y verificar la cantidad
                                preg_match('/\((.*?)\)/', $query, $valueMatches);
                                $values = explode(',', $valueMatches[1]);
                                $numValues = count($values);
    
                                // Si las columnas y los valores no coinciden, corregir el número de valores
                                if ($numColumns !== $numValues) {
                                    echo "Error: La cantidad de columnas no coincide con los valores en la tabla '$tableName'.";
                                    break;
                                }
                            }
    
                            // Ejecutar la consulta
                            try {
                                $conn->exec($query);
                            } catch (Exception $e) {
                                echo "Error al restaurar la base de datos: " . $e->getMessage();
                                break;
                            }
                        }
                    }
    
                    // Paso 4: Volver a habilitar las restricciones de clave foránea
                    $conn->exec("SET foreign_key_checks = 1");
    
                    echo "<script>
                    alert('La base de datos ha sido restaurada correctamente.');
                    window.location.href = '?c=Ajustes&a=inicio'; // Redirige después de la alerta
                  </script>";
            
                } catch (PDOException $e) {
                    // Si ocurre un error en la conexión o en la restauración
                    echo "<script>alert('Error al restaurar la base de datos: " . addslashes($e->getMessage()) . "');</script>";
                }
            } else {
                echo "<script>alert('Por favor, selecciona un archivo SQL válido.');</script>";
            }
        }
    }

    // Método para cargar la vista de ajustes
    public function inicio() {
        require_once './vistas/inicio/SideBar.php';
        require_once './vistas/Ajustes/indexAjustes.php';
    }
}
?>
