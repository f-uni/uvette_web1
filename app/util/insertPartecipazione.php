<?php

$err=false;
$message="";

$utente="";
$quiz="";
$data="";

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
        $err=true;
        $message.="Il nome utente inserito non esiste\n";
    }
}else{
    $err=true;
    $message.="Parametro utente non inserito\n";
}

if (array_key_exists('quiz', $_POST) && $_POST["quiz"] != "" ) {
    $quiz=$_POST["quiz"];
    if(!exists_row("SELECT COUNT(*) FROM quiz WHERE codice=:quiz", ["quiz"=>$quiz])){
        $err=true;
        $message.="Il quiz inserito non esiste\n";
    }

    if (array_key_exists('data', $_POST) && $_POST["data"] != "" ) {
        $data=$_POST["data"];
        include "connect.php";
        $stmt = $conn->prepare("SELECT COUNT(*) from quiz WHERE codice=:quiz AND :data BETWEEN data_inizio AND data_fine ", [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $stmt->execute(["quiz"=>$quiz, "data"=>$data]);
        if($stmt->fetchColumn()!=1){
            $err=true;
            $message.="La data inserita non è valida per il quiz selezionato\n";
        }
    }else{
        $err=true;
        $message.="Parametro data non inserito\n";
    }

}else{
    $err=true;
    $message.="Parametro quiz non inserito\n";
}




if($err){
    http_response_code(400);
    echo $message;
}else{

    include "connect.php";
    $stmt = $conn->prepare("INSERT INTO `partecipazione`(`utente`, `quiz`, `data`) VALUES (:utente,:quiz,:data)", [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    if($stmt->execute(["utente"=>$utente,"quiz"=>$quiz, "data"=>$data])){
        http_response_code(200);
        echo "Inserimento avvenuto con successo";
    }else{
        http_response_code(500);
        echo "ERRORE:\nNon è stato possibile inserire la partecipazione";
    }



    
}


