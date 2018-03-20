<?php
					$y=$_POST['y'];
					$pdo = new PDO('mysql:host=127.0.0.1;dbname=Search','root','root');
					  $pdo->exec("SET CHARACTER SET utf8");   
					$results = $pdo->prepare("SELECT * FROM `index` where `id`=$y");
					$results->execute();
					$result=$results->fetch();
					$x=$result["visit"]+1;
					echo $y;
					  $sql = "UPDATE `index` SET `visit`=$x WHERE `id`=$y";
					  $count = $pdo->exec($sql);
					  $pdo = null;  
?>	