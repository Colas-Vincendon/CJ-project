<link href="../front/css/header.css" rel="stylesheet" />
<link href="../front/css/footer.css" rel="stylesheet" />
<link href="../front/css/galleryServices.css" rel="stylesheet" />
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

<!-- ------------------------------- REVIEWS ----------------------------------- -->
    <div class="row text-center">
        <h2 class="pt-5 pb-3">Les avis clients</h2>
    </div>
    <div class="row pb-5 border-bottom">
        <div class="col-12 col-lg-2"></div>
        <div class="col-12 col-lg-4 text-center">
            <h3 class="py-5">Nous sommes notés</h3>
            <h1  class="py-2">5/5 sur 4 avis !</h1>
            <div>
                <i class="fas fa-star" style="color: #DAA520;margin-left: 0.1rem;"></i>
                <i class="fas fa-star" style="color: #DAA520;margin-left: 0.1rem;"></i>
                <i class="fas fa-star" style="color: #DAA520;margin-left: 0.1rem;"></i>
                <i class="fas fa-star" style="color: #DAA520;margin-left: 0.1rem;"></i>
                <i class="fas fa-star" style="color: #DAA520;margin-left: 0.1rem;"></i>
            </div>
        </div>
        <div class="col-12 col-lg-4 d-flex justify-content-center">
            <div id="carouselExample" class="carousel slide py-5 row row-cols-1 row-cols-md-2" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../Medias/avis/avis2.jpg" class="d-block" alt="Image 1">
                    </div>
                    <div class="carousel-item">
                        <img src="../Medias/avis/avis3.jpg" class="d-block" alt="Image 2">
                    </div>
                    <div class="carousel-item">
                        <img src="../Medias/avis/avis1.jpg" class="d-block" alt="Image 3">
                    </div>
                    <div class="carousel-item">
                        <img src="../Medias/avis/avis4.jpg" class="d-block" alt="Image 3">
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