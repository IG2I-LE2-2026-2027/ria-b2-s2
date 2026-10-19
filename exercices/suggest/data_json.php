<?php
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

//$data = array("suggestions"=> [], "qs"=> ""); 
$data = array();
$data["suggestions"] = array(); 
$data["qs"] = false; 

if (isset($_GET["debutNom"])) 
{
	$data["qs"] = $_GET["debutNom"];
	
	// On va ouvrir un fichier et afficher les lignes 
	// où le prénom ou le nom contient ce texte

	$tabLignes = file("LE2_2026_2027.csv");
	foreach ($tabLignes as $ligne)
	{
		// EXO1 : effectuer une recherche sur nom ou prénom 
		if (
			preg_match("/^(" . $data["qs"] . ".*):(.*):(.*)$/i",$ligne,$tabResultats)
		||
			preg_match("/^(.*):(" . $data["qs"] . ".*):(.*)$/i",$ligne,$tabResultats)
		)
		{
			// EXO2 afficher nom ET prénom 
			// echo "<li>" . $tabResultats[1] . " " . $tabResultats[2] . "</li>";
			$data["suggestions"][] = array("prenom"=> $tabResultats[1], 
																		 "nom"=> $tabResultats[2], 
																		 "id" => $tabResultats[3]
																		 ); 
		}
	}

}

/*
echo "<pre>";
print_r($data);
echo "</pre>"; 
*/

echo json_encode($data); 

?>
