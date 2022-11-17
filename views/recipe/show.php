<?php 
include "../components/head.php"; 
include $_INNER_PATH ."/routes.php"; 
?>
<body>
<div class="container">
    <?php include $_INNER_PATH."./views/components/navigation.php";  ?>


    <div class="form-group">
            <label for="f1">Pavadinimas</label>
            <h2><?=$hive->title?> </h2>
        </div>
        <div class="form-group">
            <label for="f2">bee count</label>
            <h2><?=$hive->beeCount?></h2>
        </div>
        <div class="form-group">
            <label for="f3">year</label>
           <h2><?=$hive->year?></h2>
        </div>
        <div class="form-group">
            <label for="f3">year</label>
           <h2><?=$hive->model?></h2>
        </div>





        <form action="<?=$_OUTER_PATH.'/views/hive/edit.php'?>" method="post">
            <input type="hidden" name="id" value=" <?=$hive->id?>">
            <button type="submit" name="edit" class="btn btn-success">edit</button>
        </form>

</div>
</body>
</html>