<!DOCTYPE html>
<html lang="fr">

<head>
<meta charset="UTF-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../front/css/header.css" rel="stylesheet" />
  <link href="../front/css/footer.css" rel="stylesheet" />
  <link rel="shortcut icon" href="../Medias/logo3.png">

  <meta property="og:title" content="Contact Rhôn'eau">
<meta property="og:url" content="https://rhoneau.fr/front/contact">
  <meta property="og:url" content="/">
  <meta property="og:image" content="https://rhoneau-a8e844ea6e1d.herokuapp.com/Medias/logo4.jpg">
<meta property="og:type" content="website">
<meta property="og:site_name" content="Rhôn'eau">
<meta property="og:locale" content="fr_FR">

</head>

<body>
  <?php
  require_once '../front/components/header.html';
  ?>
  <section class="row text-center border" style='color:white'>
    <div class=" col-sm-2 col-md-3 col-xl-4" style='background-color: #119da4;'></div>
    <div class=" col-sm-8 col-md-6 col-xl-4" style='background-color: #119da4;'>
      <h1 class="my-4">Formulaire de contact</h1>
      <div class="form-group justify-content-center my-3 fs-4 px-3">
        <form method="POST" action="../back/sendEmail.php">
          <div>
            <label class="my-1" for="nom">Nom *</label>
            <input value="" data-msg-required="Votre nom" maxlength="100" class="form-control mb-3" name="nom" id="nom"
              required="required" aria-required="true" type="text" />
          </div>
          <div>
            <label class="my-1" for="email">Adresse e-mail *</label>
            <input value="" data-msg-required="Votre email" data-msg-email="Adresse email non valide" maxlength="100"
              class="form-control mb-3" name="email" id="email" required="required" aria-required="true" type="email" />
          </div>
          <div>
            <label class="my-1" for="sujet">Sujet *</label>
            <input value="" data-msg-required="Sujet" maxlength="100" class="form-control mb-3" name="sujet" id="sujet"
              required="required" aria-required="true" type="text" />
          </div>
          <div>
            <label class="my-1" for="message">Message *</label>
            <textarea maxlength="5000" data-msg-required="Please enter your message." rows="10"
              class="form-control mb-3" name="message" id="message" required="required" aria-required="true"></textarea>
          </div>
          <div>
            <input value="1" name="rgpd" type="checkbox" required="required" />
            <span class="small">En soumettant ce formulaire, j'accepte que les
              informations saisies soient exploitées dans le cadre
              de la relation commerciale qui peut en découler.
              <a style="color: #fff;" href="politic.php" target="_blank">En savoir plus</a></span>
          </div>
          <div>
            <button class="btn btn-outline-primary my-4" style='background-color: #fff; color:#119da4'
              type="submit">Envoyer</button>
          </div>
        </form>
      </div>
    </div>
    <div class=" col-sm-2 col-md-3 col-xl-4" style='background-color: #119da4;'></div>
  </section>
  <?php
  require_once '../front/components/footer.html';
  ?>
  <script src="../front/script/header.js"></script>
  <script src="https://kit.fontawesome.com/9468c33ba3.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
    crossorigin="anonymous"></script>
  <script src="../front/script/clickOutside.js"></script>
</body>

</html>