<?php
include "connect.php";
$stmt = $conn->prepare("SELECT titolo FROM quiz WHERE codice=:codice", [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
$stmt->execute(["codice"=>$_GET["codice"]]);

echo $stmt->fetchColumn();