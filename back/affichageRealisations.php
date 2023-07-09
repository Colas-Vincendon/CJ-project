<div id="affichageRealisations">

    <?php
    require_once 'databaseConnexion.php';

    //SINGLETON
    $database = Database::getInstance();
    $conn = $database->getConnection();

    // Récupérer les chantiers depuis la base de données
    $sql = "SELECT c.id, c.titre, c.paragraphe
        FROM nurichantiers c";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $chantiers = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($chantiers)) {
        foreach ($chantiers as $chantier) {
            $chantierId = $chantier['id'];
            $titre = $chantier['titre'];
            $paragraphe = $chantier['paragraphe'];

            // Afficher les informations du chantier
            echo "<div class='col-12 col-lg-6 my-3 mx-3 py-3' style='background-color:blue>";
            echo "<div>";
            echo "<h3>$titre</h3>";
            echo "<p>$paragraphe</p>";

            // Récupérer les images du chantier depuis la base de données
            // Requête préparée pour récupérer les images du chantier
            $stmtImages = $conn->prepare("SELECT image_base64 FROM nurichantiersimages WHERE chantiersID = :chantierId");
            $stmtImages->bindParam(':chantierId', $chantierId);
            $stmtImages->execute();
            $images = $stmtImages->fetchAll(PDO::FETCH_ASSOC);

            if (!empty($images)) {
                echo "<div id='carouselExampleIndicators_$chantierId' class='carousel slide' data-bs-ride='carousel'>";
                echo "<ol class='carousel-indicators'>";
                foreach ($images as $index => $image) {
                    $active = ($index === 0) ? "active" : "";
                    echo "<li data-bs-target='#carouselExampleIndicators_$chantierId' data-bs-slide-to='$index' class='$active'></li>";
                }
                echo "</ol>";

                echo "<div class='carousel-inner'>";
                foreach ($images as $index => $image) {
                    $active = ($index === 0) ? "active" : "";
                    echo "<div class='carousel-item $active'>";
                    echo "<img src='data:image/jpeg;base64," . $image['image_base64'] . "' class='d-block w-100' alt='Image chantier'>";
                    echo "</div>";
                }
                echo "</div>";

                echo "<a class='carousel-control-prev' href='#carouselExampleIndicators_$chantierId' role='button' data-bs-slide='prev'>";
                echo "<span class='carousel-control-prev-icon' aria-hidden='true'></span>";
                echo "<span class='visually-hidden'>Previous</span>";
                echo "</a>";
                echo "<a class='carousel-control-next' href='#carouselExampleIndicators_$chantierId' role='button' data-bs-slide='next'>";
                echo "<span class='carousel-control-next-icon' aria-hidden='true'></span>";
                echo "<span class='visually-hidden'>Next</span>";
                echo "</a>";

                echo "</div>";
            }

            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "Aucun chantier existant.";
    }

    $conn = null;
    ?>

</div>