<?php 
include "../components/head.php"; 
include $_INNER_PATH ."/routes.php"; 
$old = false;
if(isset($_SESSION['POST'])){
    if(count($_SESSION['POST']) != 0){
        $old = true;
    }
}
?>
<body>
<div class="container">
    <?php include $_INNER_PATH."./views/components/navigation.php";  ?>


    <form action="" method="post" class="">

        <div class="form-group">
            <label for="f1">title</label>
            <input type="text" name="name" id="f1" value="<?=($old)? $_SESSION['POST']['title'] : $recipe->name?>" class="form-control"">
        </div>
        <?php foreach ($ingredients as $key => $i) {
                    $value = "";
            ?>
                <label for="i<?=$key?>"><?=$i->name?></label>
                <?php foreach ($recipe->ingredients as  $ri) {
                   if($i->id == $ri->id){
                    $value = $ri->quantity;
                    break;
                   }
                }?>
               <input type="text" name="ingredients[<?=$i->id?>]" value="<?=$value?>" id="i<?=$key?>"><br>
            <?php } ?>
        <input type="hidden" name="id" value="<?=$recipe->id?>" >

        <button type="submit" name="update" class="btn btn-success mt-3 mb-3">Išsaugoti</button>

</form>
</div>
</body>
</html>

<?php
    $_SESSION['POST'] = [];
?>