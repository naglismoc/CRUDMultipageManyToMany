<?php
session_start();
$_INNER_PATH = $_SERVER['DOCUMENT_ROOT']."/webdie1020/CRUDMultipageManyToMany";
$_OUTER_PATH = "http://".$_SERVER['SERVER_NAME']."/webdie1020/CRUDMultipageManyToMany";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Bitynas</title>
</head>

<?php
if(isset($_SESSION['errors'])){
    foreach ($_SESSION['errors'] as $error) { ?>
       <div class="alert alert-danger" role="alert">
            <?=$error?>
        </div>
    <?php } } 
    $_SESSION['errors'] = []; ?>
