<link href="../front/css/header.css" rel="stylesheet" />
<link href="../front/css/footer.css" rel="stylesheet" />
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
    require './components/politic.html';
    echo "</div>";


    echo "<div style='display:block'>";
    require './components/footer.html';
    echo "</div>";

    echo "</div>";
    echo "</div>";
    ?>

    <script src="https://kit.fontawesome.com/9468c33ba3.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../front/script/header.js"></script>

</body>