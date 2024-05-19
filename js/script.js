function AfficherDate() {
  var date = new Date();
  var jours = [
    "Dimanche",
    "Lundi",
    "Mardi",
    "Mercredi",
    "Jeudi",
    "Vendredi",
    "Samedi",
  ];
  var mois = [
    "Janvier",
    "Février",
    "Mars",
    "Avril",
    "Mai",
    "Juin",
    "Juillet",
    "Août",
    "Septembre",
    "Octobre",
    "Novembre",
    "Décembre",
  ];
  var divDate = document.getElementById("date");
  divDate.innerHTML =
    jours[date.getDay()] +
    ", le " +
    date.getDate() +
    " " +
    mois[date.getMonth()] +
    " " +
    date.getFullYear();
}

function ValiderSuppression() {
  var cpt = 0,
    valide = false;
  var checked = document.querySelectorAll("input[type=checkbox]");
  for (var i = 0; i < checked.length; i++) {
    if (checked[i].checked == true) {
      cpt++;
    }
  }

  if (cpt == 1) {
    if (confirm("Voulez-vous supprimer ce produit ?")) {
      valide = true;
    }
  } else if (cpt > 1) {
    if (confirm(`Voulez-vous supprimer ces ${cpt} produits ?`)) {
      valide = true;
    }
  }

  return valide;
}

function AnnulerModif() {
  window.location.href = "modifierproduit.php";
}
