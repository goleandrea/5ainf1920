<?php
    $nome = $_REQUEST["txtNome"];
    
    $cognome = $_REQUEST["txtCognome"];
    
    
    $servername = "localhost";
   
    $username = "root";

    $password = "";
    $dbname = "dbpersone";
    $tblname = "persone";
    
    insertValuesDB($servername, $username, $password, $dbname, $tblname, $nome, $cognome);

    
    
    function insertValuesDB($servername, $username, $password, $dbname, $tblname, $nome, $cognome){
        
        $con = new mysqli($servername, $username, $password, $dbname);

       //creo connessione
        if($con->connect_error){
            die("connessione fallita: " . $con->connect_error);
        }

        $sql = "INSERT INTO " . $tblname ." (nome, cognome) VALUES ('" . $nome . "', '" . $cognome . "')";

        if($con->query($sql) == TRUE){
                $con->close();
                require 'readDB.php';
        }else{
            echo "errore";
            $con->close();
        }
    }
?>