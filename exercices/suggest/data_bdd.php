<?php
include("libs/maLibSQL.pdo.php");
include("libs/maLibUtils.php");
// TODO : les données proviennent d'une base de données 
// Contrainte : pas plus de 5 lignes (en + des inclusions des librairies)
// NB : créer la base, remplir le fichier config.php 

$data = array("suggestions"=>array(), "qs"=>valider("debutNom"));
if ($cherche = valider("debutNom")) {
	$SQL = "SELECT * FROM etudiants WHERE prenom LIKE '$cherche%' OR nom LIKE '$cherche%'"; 
	$data["suggestions"] = parcoursRs(SQLSelect($SQL));
}
echo json_encode($data); 

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


?>
