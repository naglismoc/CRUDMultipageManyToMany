<?php
include $_INNER_PATH."/models/Ingredient.php";
// include $_INNER_PATH."/helperClasses/Validator.php";


class IngredientController{

    public static function index()
    {
        return Ingredient::all(); 
    }

public static function findByRecipe($id)
{
    return Ingredient::findByRecipe($id);
}

    public static function store()
    {   
        if(Validator::validate()){
            header("Location: "."http://".$_SERVER['SERVER_NAME']."/webdie1020/CRUDMultipage"."/views/hive/add.php");
            die;
        }
        Hive::create();
    }

    public static function show($id)
    {
        $hive = Hive::find($id);
        return $hive;
    }

    public static function update()
    {
        if(Validator::validate()){
            header("Location: "."http://".$_SERVER['SERVER_NAME']."/webdie1020/CRUDMultipage"."/views/hive/edit.php?edit=&id=".$_GET['id']);
            die;
        }
        
       $hive = new Hive();
       $hive->id = $_POST['id'];
       $hive->title = $_POST['title'];
       $hive->beeCount = $_POST['beeCount'];
       $hive->year = $_POST['year'];
       $hive->modelId = $_POST['hiveModel'];
       $hive->update();
    }

    public static function destroy()
    {
        Hive::destroy($_POST['id']);
    }

    public static function findByHive($id)
    {
      return Hive::findByHive($id);
    }









}
?>