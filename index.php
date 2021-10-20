<?php 

require_once 'db.php';
require_once 'idojaras.php';

$idojarasAdatok = Idojaras::osszes();

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="main.css">
    <title>Idojaras</title>
</head>
<body>
    <div class="container">
        <h1>Időjárás</h1>
        <?php 
        foreach ($idojarasAdatok as $idojaras) {
            echo "<div class='adatok'>";
            echo "<article>";
            echo "<h3>" . $idojaras -> getDatum() -> format('Y-m-d') . "</h3>";
            echo "<p>Hőmérséklet: " . $idojaras -> getHofok() . "°C</p>";
            echo "<p>Leírás: " . $idojaras -> getLeiras() . "</p>";
            /* echo "<form method='POST'>";
            echo "<input type='hidden' name='deleteId' value='" . $idojaras -> getId() . "'>";
            echo "<button type='submit'>Törlés</button>";
            echo "</form>";*/
            echo "<a href='editIdojaras.php?id=" . $idojaras -> getId() . "'>Szerkesztés</a>";
            echo "</article>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>