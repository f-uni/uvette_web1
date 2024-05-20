<?php

$err=false;
$message="";

function set_error($msg){
    $err=true;
    $message=$msg;
}

function exists_row($sql, $params){    
    include "connect.php";
    $stmt = $conn->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    $stmt->execute($params);
    $result = $stmt->fetchColumn();
    return $result==1;
}

if (array_key_exists('utente', $_POST) && $_POST["utente"] != "" ) {
    $utente=$_POST["utente"];
    if(!exists_row("SELECT COUNT(*) FROM utente WHERE nome_utente=:utente", ["utente"=>$utente])){
        set_error("Il nome utente inserito non esiste");
    }
}else{
    set_error("Parametro utente non inserito");
}

if (array_key_exists('quiz', $_POST) && $_POST["quiz"] != "" ) {
    $quiz=$_POST["quiz"];
    if(!exists_row("SELECT COUNT(*) FROM quiz WHERE codice=:quiz", ["quiz"=>$quiz])){
        set_error("Il quiz inserito non esiste");
    }
}else{
    set_error("Parametro quiz non inserito");
}

if (array_key_exists('data', $_POST) && $_POST["data"] != "" ) {
    $data=$_POST["data"];
}else{
    set_error("Parametro data non inserito");
}


if($err){
    http_response_code(400);
    echo $message;
}


