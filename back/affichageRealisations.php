
<div id="affichageRealisations">

    <?php
    require_once 'databaseConnexion.php';

    // SINGLETON
    $database = Database::getInstance();
    $conn = $database->getConnection();

    // Récupérer les chantiers depuis la base de données
    $sql = "SELECT c.id, c.titre
        FROM nurichantiers c";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $chantiers = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($chantiers)) {
        $isLeft = true; // Indicateur pour l'alignement à gauche ou à droite

        foreach ($chantiers as $index => $chantier) {
            $chantierId = $chantier['id'];
            $titre = $chantier['titre'];

            // Récupérer les images du chantier depuis la base de données
            // Requête préparée pour récupérer les images du chantier
            $stmtImages = $conn->prepare("SELECT image_base64 FROM nurichantiersimages WHERE chantiersID = :chantierId");
            $stmtImages->bindParam(':chantierId', $chantierId);
            $stmtImages->execute();
            $images = $stmtImages->fetchAll(PDO::FETCH_ASSOC);
            
            echo "<div class='container-fluid'>";
            echo "<div class='row " . ($isLeft ? 'align-left' : 'align-right') . "'>";
            echo "<div class='container-fluid col col-12 col-sm-4 text-center my-auto py-3 justify-content-around align-items-center " . ($isLeft ? 'order-sm-first' : 'order-sm-last') . "'>";
            
            echo "<h3 class='mx-5'>$titre</h3>";
            echo "</div>";
            echo "<div class='container-fluid col col-12 col-sm-8 text-center my-auto py-3 justify-content-around align-items-center " . ($isLeft ? 'order-sm-last' : 'order-sm-first') . "'>";

            if (count($images) === 1) {
                // Afficher une seule image
                echo "<img style='height:auto; width: 400px; object-fit:cover;' src='data:image/jpeg;base64," . $images[0]['image_base64'] . "' class='d-block mx-auto' alt='Image chantier'>";
            } else if (count($images) > 1) {
                // Afficher un carousel
                echo "<div id='carouselExampleIndicators_$chantierId' class='carousel slide' data-bs-ride='carousel'>";
                echo "<ol class='carousel-indicators'>";
                foreach ($images as $index => $image) {
                    $active = ($index === 0) ? "active" : "";
                    echo "<li data-bs-target='#carouselExampleIndicators_$chantierId' data-bs-slide-to='$index' class='$active'></li>";
                }
                echo "</ol>";

                echo "<div class='carousel-inner mx-auto' style='width: 400px; height: 500px; ; object-fit:cove'>";
                foreach ($images as $index => $image) {
                    $active = ($index === 0) ? "active" : "";
                    echo "<div class='carousel-item $active'>";
                    echo "<img style='height:100%; min-height: 500px; width: 100%; object-fit:cover;' src='data:image/jpeg;base64," . $image['image_base64'] . "' class='d-block img-fluid' alt='Image chantier'>";
                    echo "</div>";
                }
                echo "</div>";

                echo "<a class='carousel-control-prev' href='#carouselExampleIndicators_$chantierId' role='button' data-bs-slide='prev' style='opacity:0.8'>";
                echo "<span class='carousel-control-prev-icon' aria-hidden='true' style='background-color:#119da4'></span>";
                echo "<span class='visually-hidden'>Previous</span>";
                echo "</a>";
                echo "<a class='carousel-control-next' href='#carouselExampleIndicators_$chantierId' role='button' data-bs-slide='next'  style='opacity:0.8'>";
                echo "<span class='carousel-control-next-icon' aria-hidden='true' style='background-color:#119da4'></span>";
                echo "<span class='visually-hidden'>Next</span>";
                echo "</a>";

                echo "</div>";
            }
            echo "</div>";
            echo "</div>";
            echo "</div>";

            $isLeft = !$isLeft; // Alterner l'alignement à gauche et à droite
        }
    } else {
        echo "Aucun chantier existant.";
    }

    $conn = null;
    ?>

</div>
