<?php 
// include "../components/head.php"; 
$_INNER_PATH = $_SERVER['DOCUMENT_ROOT']."/webdie1020/CRUDMultipageManyToMany";
$_OUTER_PATH = "http://".$_SERVER['SERVER_NAME']."/webdie1020/CRUDMultipageManyToMany";
include $_INNER_PATH ."/routes.php"; 


header('Content-Type: application/json; charset=utf-8');
echo json_encode(IngredientController::index());
http_response_code(200);


?>