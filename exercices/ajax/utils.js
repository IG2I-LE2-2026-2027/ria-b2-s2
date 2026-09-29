function trace(s) {
	window.console && window.console.log(s);
}

dbg = (function (borne_max) {

	if (borne_max == undefined) borne_max=5;
	var compteur_interne = 0; 
	
	return {
		trace : function (s) {
			if (compteur_interne++ < borne_max) 
				trace(s);
		}, 
		reset : function () {
			compteur_interne = 0; 
		},
		getCompteur : function(){ 
			return compteur_interne; 
		}, 
		setCompteur : function(v){
			compteur_interne = v;
		} 
	}; 
}) (3);

function show(refOrId,display) {
	// affiche en mode block par défaut 
	if (typeof refOrId == "string") 
		refOrId = document.getElementById(refOrId);
		
	refOrId.style.display = (display==undefined) ? "block" : display ; 
}

function hide(refOrId) {
	if (typeof refOrId == "string") 
		refOrId = document.getElementById(refOrId);
		
	refOrId.style.display = "none";
}

function html(refOrId, val) {	
	if (typeof refOrId == "string") 
		refOrId = document.getElementById(refOrId);
		
	if (val == undefined) return refOrId.innerHTML; 
	else refOrId.innerHTML = val;
}

function val(refOrId, val) {	
	if (typeof refOrId == "string") 
		refOrId = document.getElementById(refOrId);
	
	if ((refOrId.type =="radio") || (refOrId.type =="checkbox")) {
		// champ à cocher : propriete .checked 
		if (val == undefined) return refOrId.checked; 
		else refOrId.checked = val;
	} else {
		// champ à remplir : propriete .value
		if (val == undefined) return refOrId.value; 
		else refOrId.value = val;
	}
}

trace("Chargement lib. utils : trace, dbg, show, hide, html, val");

