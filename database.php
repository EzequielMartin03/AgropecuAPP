<?php

class database {
    const server = "sql205.ezyro.com";
    const user = "ezyro_38017307";
    const password = "a7322ddd1a3333a";
    const nameDB = "ezyro_38017307_agropecuappdb";

    public static function connection() {
        try {

            $conexion = new PDO("mysql:host=".self::server.";dbname=".self::nameDB.";charset=utf8",
            self::user,self::password);

            $conexion ->setAttribute(PDO::ATTR_ERRMODE,
            PDO:: ERRMODE_EXCEPTION);

            return $conexion;

        }catch(PDOException $e) {
            return "Fallo".$e->getMessage();

        }
    }
}