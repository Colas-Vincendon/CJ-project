$(document).ready(function () {
  performSearch(); // Lancer la fonction performSearch() au chargement du DOM

  function showLoading() {
    $('#loading').show(); // Afficher l'animation de chargement
  }

  function hideLoading() {
    $('#loading').hide(); // Masquer l'animation de chargement
  }

  function performSearch() {
    showLoading(); // Afficher l'animation de chargement

    // Effectuer la requête AJAX vers affichageRealisations.php
    $.ajax({
      url: '../back/affichageRealisations.php',
      type: 'POST',
      success: function (response) {
        hideLoading(); // Masquer l'animation de chargement

        // La requête a réussi, mettre à jour le contenu de la page
        $('#réalisations').html(response);
      },
      error: function () {
        hideLoading(); // Masquer l'animation de chargement en cas d'erreur
        console.log('Erreur lors de la requête AJAX');
      },
    });
  }
});
