<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>A compléter</title>
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />
  <link
    href="https://getbootstrap.com/docs/5.3/assets/css/docs.css"
    rel="stylesheet"
  />
  <link href="../front/css/header.css" rel="stylesheet" />
  <link href="../front/css/footer.css" rel="stylesheet" />
</head>

<body>
  <style>
    .align-left {
      background-color: #119da4;
      color: #f1f1f1;
    }

    .align-right {
      background-color: #f1f1f1;
      color: #119da4;
    }
  </style>

  <?php
  require_once '../front/components/header.html';
  ?>

  <div id="réalisations"></div>

  <?php
  require_once '../front/components/footer.html';
  ?>
 <script
    src="https://kit.fontawesome.com/9468c33ba3.js"
    crossorigin="anonymous"
  ></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="../front/script/supprimer_chantier.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
    crossorigin="anonymous"></script>
  <script>
    $(document).ready(function () {
      // Charger le contenu
      $('#réalisations').load(
        '../back/affichageRealisations.php #affichageRealisations',
      );
    });
  </script>
</body>

</html>