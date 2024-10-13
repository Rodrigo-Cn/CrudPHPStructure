<?php

    class DataBase{

        private static $connection;

        public static function getConnection(){
            $envPath = realpath(dirname(__FILE__).'/../env.ini');
            if (!$envPath) {
                throw new Exception("Arquivo env.ini não encontrado.");
            }
            $env = parse_ini_file($envPath);
            if (!$env) {
                throw new Exception("Erro ao ler o arquivo env.ini.");
            }
            self::$connection = mysqli_connect(
                $env['host'],
                $env['username'],
                $env['password'],
                $env['dbname'],
                3306
            );

            if (self::$connection->connect_error) {
                die(self::$connection->connect_error);
            }

            return self::$connection;
        }
    }

?>