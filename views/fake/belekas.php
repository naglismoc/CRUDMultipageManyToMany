<?php 
include "../components/head.php"; 
include $_INNER_PATH ."/routes.php"; 


header('Content-Type: application/json; charset=utf-8');
echo json_encode(IngredientController::index());
http_response_code(200);


?>