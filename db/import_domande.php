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
        
        // Nome del file CSV
        $file = 'quiz-risposte.csv';

        // Apre il file in modalità lettura
        if (($handle = fopen($file, 'r')) !== FALSE) {
            // Itera su ogni riga del file
            $data_array=[];
            while (($data = fgetcsv($handle, 1000, '	')) !== FALSE) {
                // Stampa i dati della riga
                // In questo esempio, assume che ci siano 4 colonne: username, nome, cognome, email
                $id_quiz = $data[0];
                $domanda = $data[1];
                $rc = $data[2];
                $re1 = $data[3];
                $re2 = $data[4];
                $re3 = $data[5];

                if(!$data_array[$id_quiz]){
                	$data_array[$id_quiz]=[];
                }
                $data_array[$id_quiz][]=array(
                	"testo"=>$domanda,
                    "rc"=>$rc,
                    "re1"=>$re1,
                    "re2"=>$re2,
                    "re3"=>$re3
                );
                
                
            }
            // Chiude il file
            fclose($handle);
            foreach($data_array as $key=>$value) {
                foreach($value as $n=>$dom){
                	$num=$n+1;
                    $sql = "INSERT INTO `domanda` (`quiz`, `numero`, `testo`) VALUES (:idq, :num, :testo)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':idq', $key);
                    $stmt->bindParam(':num', $num);
                    $stmt->bindParam(':testo', $dom["testo"]);
                    $stmt->execute();
                    
                    $sql = "INSERT INTO `risposta` (`quiz`, `domanda`, `numero`, `testo`, `tipo`, `punteggio`) VALUES (:idq, :num, '1', :rc, 'corretta', 100);
                    		INSERT INTO `risposta` (`quiz`, `domanda`, `numero`, `testo`, `tipo`, `punteggio`) VALUES (:idq, :num, '2', :re1, 'sbagliata', NULL);
                            INSERT INTO `risposta` (`quiz`, `domanda`, `numero`, `testo`, `tipo`, `punteggio`) VALUES (:idq, :num, '3', :re2, 'sbagliata', NULL);
                            INSERT INTO `risposta` (`quiz`, `domanda`, `numero`, `testo`, `tipo`, `punteggio`) VALUES (:idq, :num, '4', :re3, 'sbagliata', NULL);";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':idq', intval($key));
                    $stmt->bindParam(':num', $num);
                    $stmt->bindParam(':rc', $dom["rc"]);
                    $stmt->bindParam(':re1', $dom["re1"]);
                    $stmt->bindParam(':re2', $dom["re2"]);
                    $stmt->bindParam(':re3', $dom["re3"]);
                    $stmt->execute();
                    
                }
            }
            
            
            
        } else {
            // Se non è possibile aprire il file, stampa un messaggio di errore
            echo "Impossibile aprire il file $file";
        }

	} catch(PDOException$e) {
		echo "DB Error: " . $e->getMessage();
		$error = true;
	}
?>
