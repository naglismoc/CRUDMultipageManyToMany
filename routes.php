<?php 
include $_INNER_PATH."/controllers/RecipeController.php"; 
include $_INNER_PATH."/controllers/IngredientController.php"; 

if(strpos($_SERVER['REQUEST_URI'], "/recipe/") !== false){
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        if(isset($_POST['save'])){
            
            RecipeController::store();
            header("Location: ".$_OUTER_PATH."/views/recipe/index.php");
            die;
        }
            
        if(isset($_POST['update'])){
            RecipeController::update();        
            header("Location: ".$_OUTER_PATH."/views/recipe/index.php");
            die;
        }
        
        if(isset($_POST['destroy'])){
            RecipeController::destroy();
            header("Location: ".$_OUTER_PATH."/views/recipe/index.php");
            die;
        }    

    }

    if($_SERVER['REQUEST_METHOD'] == "GET"){
        if(count($_GET) == 0){
      
            $recipes = RecipeController::index();
            $ingredients = IngredientController::index();
        }
        if(isset($_GET['show']) ){
            $recipe = RecipeController::show($_GET['id']);
        }
        
        if(isset($_GET['edit'])){
            $recipe = RecipeController::show($_GET['id']);
            $ingredients = IngredientController::index();

        }  
    }

    // $RecipeModels = RecipeModelController::index();
}



if(strpos($_SERVER['REQUEST_URI'], "/model/") !== false){
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        if(isset($_POST['save'])){
            RecipeModelController::store();
        header("Location: ".$_OUTER_PATH."/views/model/index.php");
        die;
        }
            
        if(isset($_POST['update'])){
            RecipeModelController::update();        
            header("Location: ".$_OUTER_PATH."/views/model/index.php");
            die;
        }
        
        if(isset($_POST['destroy'])){
            RecipeModelController::destroy();
            header("Location: ".$_OUTER_PATH."/views/model/index.php");
            die;
        }    

    }

    if($_SERVER['REQUEST_METHOD'] == "GET"){
        if(count($_GET) == 0){
            $RecipeModels = RecipeModelController::index();
        }
        if(isset($_GET['show']) ){
            $RecipeModel = RecipeModelController::show($_GET['id']);
        }
        
        if(isset($_GET['edit'])){
            $RecipeModel = RecipeModelController::show($_GET['id']);
        }  
    }

    // $RecipeModels = RecipeModelController::index();
}


?>