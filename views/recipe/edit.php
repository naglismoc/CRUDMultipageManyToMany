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
                    $checked = "";
            ?>
                <label for="i<?=$key?>"><?=$i->name?></label>
                <?php foreach ($recipe->ingredients as  $ri) {
                   if($i->id == $ri->id){
                    $checked = "checked";
                    break;
                   }
                }?>
               <input type="checkbox" <?=$checked?> name="ingredients[]" value="<?=$i->id?>" id="i<?=$key?>"><br>
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