<?php 

require_once 'db.php';
require_once 'idojaras.php';

$idojarasId = $_GET['id'] ?? null;
$idojarasHofok = $_POST['homerseklet'] ?? 0;
$idojarasLeiras = $_POST['leiras'] ?? "";

if ($idojarasId === null) {
    header('Location: index.php');
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    Idojaras::idojarasUpdate($idojarasHofok, $idojarasLeiras, $idojarasId);
    header('Location: index.php');

}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="main.css">
    <title>Edit Idojaras</title>
</head>
<body>
    <div class="container">
        <form method="post">
            <div>
                Hőmérséklet: <input type="text" name="homerseklet">
            </div> 
            <div>
                Leírás: <input type="text" name="leiras">
            </div> 
            <input type="submit" value="Szerkeszt" id="editGomb">
        </form>
    </div>
</body>
</html>