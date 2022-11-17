<?php
include $_INNER_PATH."/models/DB.php";
class Recipe {

    public $id;
    public $name;
    public $ingredients;

    public function __construct($id = null, $name = null)
    {
      $this->id = $id;
      $this->name = $name;
    }

    public static function all(){
        $recipes = [];
        $db = new DB();
        $query = "select * from `recipes`";
        $result = $db->conn->query($query);

        while($row = $result->fetch_assoc()){
            $recipe = new Recipe( $row['id'], $row['name']);
            $recipe->ingredients = IngredientController::findByRecipe($row['id']);
            $recipes[] = $recipe;
        }
        $db->conn->close();
        return $recipes;
    }

    public static function create()
    {
       $db = new DB();
       $stmt = $db->conn->prepare("INSERT INTO `recipes`(`name`) VALUES (?)");
       $stmt->bind_param("s", $_POST['name']);
       if(!$stmt->execute()) {
        print_r( $stmt->error_list);
       }
        $recipeId = $stmt->insert_id;

        foreach ($_POST['ingredients'] as  $ingredient) {         
            $stmt = $db->conn->prepare("INSERT INTO `ingredients_recipes`(`ingredient_id`, `recipe_id`) VALUES (?, ?)");
            $stmt->bind_param("ii", $ingredient, $recipeId);
            if(!$stmt->execute()) {
                print_r( $stmt->error_list);
            }
        }

       $stmt->close();
       $db->conn->close();
    }

    public static function find($id)
    {
       
        $recipe = new Recipe();
        $db = new DB();
        $query = "SELECT * FROM `recipes` WHERE `id` =". $id;
        $result = $db->conn->query($query);

        while($row = $result->fetch_assoc()){
            $recipe = new Recipe( $row['id'], $row['name']);
            $recipe->ingredients = IngredientController::findByRecipe($row['id']);
        }
        $db->conn->close();
        return $recipe;
    }

    public function update()
    {       
        $db = new DB();
        $stmt = $db->conn->prepare("UPDATE `recipes` SET `name`= ? WHERE `id` = ?");
        $stmt->bind_param("si", $this->name,  $this->id);
        if(!$stmt->execute()) {
            print_r( $stmt->error_list);
           }
 
           $query = "delete from `ingredients_recipes` where `recipe_id` = ".$this->id;
            $db->conn->query($query);

           foreach ($_POST['ingredients'] as  $ingredient) {         
            $stmt = $db->conn->prepare("INSERT INTO `ingredients_recipes`(`ingredient_id`, `recipe_id`) VALUES (?, ?)");
            $stmt->bind_param("ii", $ingredient, $this->id);
            if(!$stmt->execute()) {
                print_r( $stmt->error_list);
            }
        }


        $stmt->close();
        $db->conn->close();
    }

    public static function destroy($id)
    {
        $db = new DB();
        $query = "delete from `ingredients_recipes` where `recipe_id` = ".$id;
        $db->conn->query($query);



        $stmt = $db->conn->prepare("DELETE FROM `recipes` WHERE `id` = ?");
        $stmt->bind_param("i", $_POST['id']);
        $stmt->execute();
 
        $stmt->close();
        $db->conn->close(); 
    }

}
?>