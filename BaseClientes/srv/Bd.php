<?php

class Bd
{
    private static ?PDO $pdo = null;

    static function pdo(): PDO
    {
        if (self::$pdo === null) {

            self::$pdo = new PDO(
                "sqlite:srvbd.db",
                null,
                null,
                [PDO::ATTR_PERSISTENT => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );

            self::$pdo->exec(
                "CREATE TABLE IF NOT EXISTS CLIENTE (
                    CLI_ID INTEGER,
                    CLI_NOMBRE TEXT NOT NULL,
                    CLI_APELLIDO TEXT NOT NULL,
                    CLI_CORREO_ELECTRONICO TEXT NOT NULL,
                    CONSTRAINT CLI_PK PRIMARY KEY(CLI_ID),
                    CONSTRAINT CLI_NOM_UNQ UNIQUE(CLI_NOMBRE),
                    CONSTRAINT CLI_NOM_NV CHECK(LENGTH(CLI_NOMBRE) > 0),
                    CONSTRAINT CLI_APE_NV CHECK(LENGTH(CLI_APELLIDO) > 0),
                    CONSTRAINT CLI_CORREO_NV CHECK(LENGTH(CLI_CORREO_ELECTRONICO) > 0)
                )"
            );
        }

        return self::$pdo;
    }
}
