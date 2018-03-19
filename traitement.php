<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Traitement</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php
	// Les infos sur le fichier sont recup dans $_FILES
		var_dump($_FILES);

		if(!empty($_FILES)){
			// on m'envoie un fichier et l'on verifie s'il n'y a pas d'erreur
			if($_FILES['fichier']['error'] ==0){
				// pas d'erreur 
				// on va maintenant verifier la taille
				// 1ko = 1024 octets;
				// 1Mo = 1048576 octets
				// 1Go = 1 073 741 824 octets
				if($_FILES['fichier']['size'] < 2* 1048576){
					// le fichier fait moins de 2Mo, c'est bon
					// on verifie l'extension du fichier
					$fileInfo = pathinfo($_FILES['fichier']['name']);
						//print_r($filesInfo);
						$extensions_autorisees = ['jpg', 'png', 'gif', 'svg'];
						if(in_array($fileInfo['extension'], $extensions_autorisees)){
							move_uploaded_file($_FILES['fichier']['tmp_name'], $_FILES['fichier']['name']);

						}
					}
				}
			else{ echo 'erreur: extension non autorisée';

			}
		}
	?>
	
</body>
</html>