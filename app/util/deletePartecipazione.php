<?php

$err=false;
$message="";

$codice="";

function exists_row($sql, $params){    
    include "connect.php";
    $stmt = $conn->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    $stmt->execute($params);
    $result = $stmt->fetchColumn();
    return $result==1;
}

if (array_key_exists('codice', $_POST) && $_POST["codice"] != "" ) {
    $codice=$_POST["codice"];
    if(!exists_row("SELECT COUNT(*) FROM partecipazione WHERE codice=:codice", ["codice"=>$codice])){
        $err=true;
        $message.="Il codice inserito non esiste\n";
    }
}else{
    $err=true;
    $message.="Parametro codice non inserito\n";
}



if($err){
    http_response_code(400);
    echo $message;
}else{

    include "connect.php";
    $stmt = $conn->prepare("DELETE FROM `risposta_utente_quiz` WHERE partecipazione=:codice", [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    if($stmt->execute(["codice"=>$codice])){
        $stmt = $conn->prepare("DELETE FROM `partecipazione` WHERE codice=:codice", [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        if($stmt->execute(["codice"=>$codice])){
            http_response_code(200);
            echo "Eliminazione avvenuta con successo";
        }else{
            http_response_code(500);
            echo "ERRORE:\nNon è stato possibile eliminare la partecipazione";
        }
    }else{
        http_response_code(500);
        echo "ERRORE:\nNon è stato possibile eliminare le risposte della partecipazione";
    }

}
