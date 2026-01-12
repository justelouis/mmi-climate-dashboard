let data = new FormData();
data.append("Nom de la clé du tableau Post", "Valeur de la clé")

fetch("actions/Fichier.php", {
        method: "POST",
        body: data
})
.then(response => response.text())  //.json si on renvoie un tableau
.then(data => {
	console.log(data);
})
.catch(error => console.error("Erreur :", error));