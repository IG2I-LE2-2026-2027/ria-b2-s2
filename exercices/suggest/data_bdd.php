<?php
// TODO : les données proviennent d'une base de données 
// Contrainte : pas plus de 5 lignes (en + des inclusions des librairies)

// TODO : renvoyer des données structurées en JSON 
// Produire un code ROBUSTE : insensible aux variations des conditions d'appel 
// cf. exemples/json/json_encode.php 

// renvoyer un objet contenant les suggestions + la chaine recherchée 
// {
//		suggestions : [ {prenom:, nom:, id:},
//			{prenom:, nom:, id:},
//			{prenom:, nom:, id:},
// 		]
// 		qs : "Th"
// }

echo json_encode($data); 

?>
