<?php
include $_INNER_PATH."/models/Recipe.php";
// include $_INNER_PATH."/helperClasses/Validator.php";


class RecipeController{

    public static function index()
    {
        $hives = Recipe::all();
        return $hives;
    }

    public static function findByRecipe($id)
    {
        return Ingredient::findByRecipe($id);
    }

    public static function store()
    {   
        // if(Validator::validate()){
        //     header("Location: "."http://".$_SERVER['SERVER_NAME']."/webdie1020/CRUDMultipage"."/views/hive/add.php");
        //     die;
        // }
        Recipe::create();
    }

    public static function show($id)
    {
        return Recipe::find($id);
    }

    public static function update()
    {
        // if(Validator::validate()){
        //     header("Location: "."http://".$_SERVER['SERVER_NAME']."/webdie1020/CRUDMultipage"."/views/hive/edit.php?edit=&id=".$_GET['id']);
        //     die;
        // }
        
       $recipe = new Recipe();
       $recipe->id = $_POST['id'];
       $recipe->name = $_POST['name'];
       $recipe->update();
    }

    public static function destroy()
    {
        Recipe::destroy($_POST['id']);
    }











}
?>