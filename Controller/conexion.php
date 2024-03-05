<?php
class Database
{
    function connectar()
      {
      $server = 'sql-server-gluky-data.database.windows.net';
      $database   = 'sqldb-gluky-data-model';
      $username       = 'insights';
      $password      = 'c$:2H;8&k7_*tEN';
      $port    = '1433';
      try {
        $conexion = "sqlsrv:Server=$server,$port;Database=$database";
        
        $opciones = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES  => false
        ];
        
        $pdo = new PDO($conexion,$username,$password,$opciones);
        return $pdo;
    } catch (PDOException $error) {
        echo 'Error en la conexión: ' . $error->getMessage();
    }
}
}
?>