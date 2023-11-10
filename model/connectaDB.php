<?php
    

    function conectaDB($password_a8){
        $servidor = "localhost";
        $port     = "5432";
        $DBnom    = "tdiw-db";
        $usuari   = "tdiw-a8";
        $clau     = $password_a8;
        $connexio = pg_connect("host=$servidor port=$port dbname=$DBnom 
        user=$usuari password=$clau") or die("Error a la conexio de la DB");
        return($connexio);
    }