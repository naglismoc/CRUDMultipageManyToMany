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
            <label for="f1">name</label>
            <input type="text" name="name" id="f1" value="<?=($old)? $_SESSION['POST']['title'] : ""?>" class="form-control"">
        </div>
        
  
            <?php foreach ($ingredients as $key => $i) {?>
                <label for="i<?=$key?>"><?=$i->name?></label>
               <input type="checkbox" name="ingredients[]" value="<?=$i->id?>" id="i<?=$key?>"><br>
            <?php } ?>
            
  
        <button type="submit" name="save" class="btn btn-primary mt-3 mb-3">Išsaugoti</button>

</form>
</div>
</body>
</html>

<?php
    $_SESSION['POST'] = [];
?>