<link href="../front/css/header.css" rel="stylesheet" />
<link href="../front/css/footer.css" rel="stylesheet" />
<link href="../front/css/galleryServices.css" rel="stylesheet" />
<link href="../front/css/skills.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet" />

<body>

    <?php
    echo "<div class='container_fluid d-flex flex-column'>";
    echo "<div class='container_fluid'>";
    echo "<div style='display:block'>";
    require './components/header.html';
    echo "</div>";

    echo "<div style='display:block'>";
    require './components/galleryServices.html';
    echo "</div>";
    ?>

<!-- ------------------------- SKILLS -------------------------- -->

    <div class="container-fluid background">

        <div class="row d-flex text-center py-5">
            <h1 style="color:#f1f1f1">Vous avez besoin d'un plombier-chauffagiste sur Lyon ?</h1>
        </div>

        <div class="row d-flex text-center justify-content-center py-5">
            <div class="col-12 col-md-6 col-lg-3 px-2 py-3">
                <div class="rounded py-2 px-2" style="background-color: #f1f1f1;">
                    <div>
                        <i class="fa fa-money-check-alt fa-2xl py-4" style="color: #119da4;"></i>
                        <h2>Devis gratuit</h2>
                        <p class="py-4 fs-5" style="color: RGBA(0,0,0,0.50)">Chaque projet est unique, et nous nous engageons à évaluer vos besoins spécifiques et à vous fournir un devis détaillé et transparent. Vous pouvez compter sur notre expertise et notre professionnalisme pour vous offrir un service de qualité et des solutions adaptées à votre budget.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 px-2 py-3">
                <div class="rounded py-2 px-2" style="background-color: #f1f1f1;">
                    <div>
                        <i class="fa-solid fa-comments fa-2xl py-4" style="color: #119da4;"></i>
                        <h2>Réactivité et disponibilité</h2>
                        <p class="py-4 fs-5" style="color: RGBA(0,0,0,0.50)">Nous comprenons à quel point il est essentiel d'avoir une équipe de confiance sur laquelle vous pouvez compter lorsque vous êtes confronté à des problèmes de plomberie imprévus.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 px-2 py-3">
                <div class="rounded py-2 px-2" style="background-color: #f1f1f1;">
                    <div>
                        <i class="fa fa-check fa-2xl py-4" style="color: #119da4;"></i>
                        <h2>Matériaux de qualité</h2>
                        <p class="py-4 fs-5" style="color: RGBA(0,0,0,0.50)">Radiateurs, chauffe-eau... Grâce à l'expertise de votre plombier, choisissez des équipements performants et durables, 100% adaptés à vos besoins et la configuration de votre logement.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 px-2 py-3">
                <div class="rounded py-2 px-2" style="background-color: #f1f1f1;">
                    <div>
                        <i class="fa fa-user-check fa-2xl py-4"  style="color: #119da4;"></i>
                        <h2>Services personnalisés</h2>
                        <p class="py-4 fs-5" style="color: RGBA(0,0,0,0.50)">Vous souhaitez être conseillé dans le choix de vos équipements de plomberie ? RHÔN'EAU se tient à l'écoute de votre projet et mettra tout en œuvre pour vous conseiller efficacement et de manière entièrement personnalisée.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- ------------------------------- REVIEWS ----------------------------------- -->
    <div class="row text-center">
        <h2 class="pt-5 pb-3">Les avis clients</h2>
    </div>
    <div class="row pb-5 border-bottom">
        <div class="col-12 col-lg-2"></div>
        <div class="col-12 col-lg-4 text-center">
            <h3 class="py-5">Nous sommes notés</h3>
            <h1 class="py-2">5/5 sur 4 avis !</h1>
            <div>
                <i class="fas fa-star" style="color: #DAA520;margin-left: 0.1rem;"></i>
                <i class="fas fa-star" style="color: #DAA520;margin-left: 0.1rem;"></i>
                <i class="fas fa-star" style="color: #DAA520;margin-left: 0.1rem;"></i>
                <i class="fas fa-star" style="color: #DAA520;margin-left: 0.1rem;"></i>
                <i class="fas fa-star" style="color: #DAA520;margin-left: 0.1rem;"></i>
            </div>
        </div>
        <div class="col-12 col-lg-4 d-flex justify-content-center">
            <div id="carouselExample" class="carousel slide py-5 px-3 row row-cols-1 row-cols-md-2"
                data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../Medias/avis/avis2.jpg" class="d-block img-fluid" alt="Image 1">
                    </div>
                    <div class="carousel-item">
                        <img src="../Medias/avis/avis3.jpg" class="d-block img-fluid" alt="Image 2">
                    </div>
                    <div class="carousel-item">
                        <img src="../Medias/avis/avis1.jpg" class="d-block img-fluid" alt="Image 3">
                    </div>
                    <div class="carousel-item">
                        <img src="../Medias/avis/avis4.jpg" class="d-block img-fluid" alt="Image 3">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-2"></div>
    </div>

    <?php
    echo "<div style='display:block'>";
    require './components/footer.html';
    echo "</div>";
    echo "</div>";
    echo "</div>";
    ?>

    <script src="https://kit.fontawesome.com/9468c33ba3.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../front/script/header.js"></script>
    <script src="../front/script/cardsServices.js"></script>

</body>