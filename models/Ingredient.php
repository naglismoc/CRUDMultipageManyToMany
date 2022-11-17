<?php
// include $_INNER_PATH."/models/DB.php";
class Ingredient {


    public $id;
    public $name;
    public $recipes;

    public function __construct($id = null, $name = null)
    {
      $this->id = $id;
      $this->name = $name;
    }

    public static function all(){
        $ingredients = [];
        $db = new DB();
        $query = "select * from `ingredients`";
        $result = $db->conn->query($query);

        while($row = $result->fetch_assoc()){
            $ingredient = new Ingredient( $row['id'], $row['name']);
            //$ingredient->model = HiveModelController::show($row['hive_model_id']);
            $ingredients[] = $ingredient;
        }
        $db->conn->close();
        return $ingredients;
    }

    public static function findByRecipe($id)
    {
        $ingredients = [];
        $db = new DB();
        $query = "SELECT `i`.`id`, `i`.`name` FROM `ingredients_recipes` `ir`
        join `ingredients` `i`
        on `i`.`id` = `ir`.`ingredient_id`
        join `recipes` `r`
        on `r`.`id` = `ir`.`recipe_id`
        where `r`.`id` =" . $id;
        $result = $db->conn->query($query);

        while($row = $result->fetch_assoc()){
            $ingredient = new Ingredient( $row['id'], $row['name']);
            //$ingredient->model = HiveModelController::show($row['hive_model_id']);
            $ingredients[] = $ingredient;
        }
        $db->conn->close();
        return $ingredients;
    }


    public static function create()
    {
       $db = new DB();
       $stmt = $db->conn->prepare("INSERT INTO `hives`( `title`, `bee_count`, `year`, `hive_model_id`) VALUES (?,?,?,?)");
       $stmt->bind_param("siii", $_POST['title'], $_POST['beeCount'], $_POST['year'], $_POST['hiveModel']);
       if(!$stmt->execute()) {
        print_r( $stmt->error_list);
       }

       $stmt->close();
       $db->conn->close();
    }

    public static function find($id)
    {
        $hive = new Hive();
        $db = new DB();
        $query = "SELECT * FROM `hives` 
            where .`id`=". $id;
        $result = $db->conn->query($query);

        while($row = $result->fetch_assoc()){
            $hive = new hive( $row['id'], $row['title'], $row['bee_count'], $row['year'],$row['hive_model_id']);
            $hive->model = HiveModelController::show($row['hive_model_id']);
        }
        $db->conn->close();
        return $hive;
    }

    public function update()
    {       
        $db = new DB();
        $stmt = $db->conn->prepare("UPDATE `hives` SET `title`= ? ,`bee_count`= ? ,`year`= ?,`hive_model_id`= ? WHERE `id` = ?");
        $stmt->bind_param("siiii", $this->title, $this->beeCount, $this->year, $this->modelId, $this->id);
        if(!$stmt->execute()) {
            print_r( $stmt->error_list);
           }
 
        $stmt->close();
        $db->conn->close();
    }

    public static function destroy($id)
    {
        $db = new DB();
        $stmt = $db->conn->prepare("DELETE FROM `hives` WHERE `id` = ?");
        $stmt->bind_param("i", $_POST['id']);
        $stmt->execute();
 
        $stmt->close();
        $db->conn->close(); 
    }

    public static function findByHive($id)
    {
        $hives = [];
        $db = new DB();
        $query = "select * from `hives` where `hive_model_id` = ".$id;
        $result = $db->conn->query($query);

        while($row = $result->fetch_assoc()){
            $hives[] = new hive( $row['id'], $row['title'], $row['bee_count'], $row['year'],$row['hive_model_id']);
        }
        $db->conn->close();
        return $hives;
    }
}
?>