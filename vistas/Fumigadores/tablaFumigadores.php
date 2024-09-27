<table class="table table-striped" id="tabla">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Cuit</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Foreach para mostrar todos los Fumigadores -->
                <?php foreach ($Fumigadores as $Fumigador): ?>
                    <tr>
                        <td><?= $Fumigador->IdFumigador ?></td>
                        <td><?= $Fumigador->NombreFumigador ?></td>
                        <td><?= $Fumigador->DireccionFumigador ?></td>
                        <td><?= $Fumigador->TelefonoFumigador ?></td>
                        <td><?= $Fumigador->CuitFumigador ?></td>
                        <td>
                            <!-- Botón para modificar Fumigador-->
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModificarFumigador<?= $Fumigador->IdFumigador ?>">
                                <i class="bi-pencil"></i> Modificar
                            </button>
                            
                            <!-- Botón para eliminar Fumigador -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#EliminarFumigador<?= $Fumigador->IdFumigador ?>">
                                <i class="bi-trash"></i> Eliminar
                            </button>

                              <!-- Modales -->
                             <?php include './vistas/Fumigadores/modalesFumigador.php' ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        