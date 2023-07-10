<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet" />
<link href="../front/css/header.css" rel="stylesheet" />
<link href="../front/css/footer.css" rel="stylesheet" />
<link href="../front/css/realisations.css" rel="stylesheet" />

<body>
 
  <?php
  require_once '../front/components/header.html';
  ?>

  <div class="border d-flex flex-column text-center py-5"  style="background-color: RGBA(255,255,0,0.06);">
    <h1 style="color:#119da4">Nos réalisations</h1>
    <h4 class="mt-3">Découvrez quelques unes de nos réalisations</h4>
    <div id="loading" class="loading mt-5">
      <div class="loading-animation"></div>
    </div>
  </div>

  <div id="réalisations"></div>

  <div class="border d-flex flex-column text-center py-5" style="background-color: RGBA(255,255,0,0.06);">
    <h1 class="my-2 px-5" style="color:#119da4">Transformez votre projet en réalité avec notre expertise en plomberie et chauffage !</h1>
    <p class="fs-5 px-5 mt-4">Chaque réalisation que nous présentons est le fruit d'un travail minutieux, avec une attention particulière portée aux détails et à la satisfaction de nos clients. Nous collaborons étroitement avec nos clients pour comprendre leurs besoins et offrir des solutions personnalisées qui répondent à leurs attentes.</p><br>
    <p class="fs-5 px-5 mt-1">Faites confiance à RHÔN'EAU pour vos besoins en plomberie et chauffage. Nous sommes impatients de travailler avec vous et de réaliser votre projet avec excellence !</p>
  </div>

  <?php
  require_once '../front/components/footer.html';
  ?>

  <script src="https://kit.fontawesome.com/9468c33ba3.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
    crossorigin="anonymous"></script>
  <script src="../front/script/header.js"></script>
  <script src="../front/script/loadingAnimation.js"></script>
</body>