<?php
	$servername= "localhost";
	$username = "fcolpani";
	$dbname= "my_fcolpani";
	$password = null;
	$error = false;
	
	try {
		$conn = new PDO("mysql:host=".$servername.";dbname=".$dbname, 
											$username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "SELECT * FROM partecipazione";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $row) {
              for ($i = 1; $i <= 10; $i++) {
                  $sql = "INSERT INTO `risposta_utente_quiz` (`partecipazione`, `quiz`, `domanda`, `risposta`) VALUES (:p, :idq, :n,:r)";
                  $stmt = $conn->prepare($sql);
                  $stmt->bindParam(':p', $row["codice"]);
                  $stmt->bindParam(':idq', $row["quiz"]);
                  $stmt->bindParam(':n', $i);
                  $stmt->bindParam(':r', mt_rand(1, 4));
                  $stmt->execute();
              }
        }
            
            

	} catch(PDOException$e) {
		echo "DB Error: " . $e->getMessage();
		$error = true;
	}
?>