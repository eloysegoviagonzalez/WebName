<?php
    class Conectar{
        public static function conexion(){
            try {
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "infomemes";
            
                // Create connection
                $conn = new mysqli($servername, $username, $password, $database);
            
                // Check connection
                    

            } catch (Exception $f) {
                 die("Fallo en la conexión a la base de datos: " . $f->getMessage());
            }

            return $conn;
        }
    }
?>