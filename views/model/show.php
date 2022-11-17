<?php 
include "../components/head.php"; 
include $_INNER_PATH ."/routes.php"; 
?>
<body>
<div class="container">
    <?php include $_INNER_PATH."./views/components/navigation.php";  ?>


    <div class="form-group">
            <label for="f1">Pavadinimas</label>
            <h2><?=$hiveModel->model?> </h2>
        </div>
       
    <div class="form-group">
            <label for="f1">Avilių pagaminta:</label>
            <h2><?=$hiveModel->hives?> </h2>
        </div>
       





        <form action="<?=$_OUTER_PATH.'/views/model/edit.php'?>" method="post">
            <input type="hidden" name="id" value=" <?=$hiveModel->id?>">
            <button type="submit" name="edit" class="btn btn-success">edit</button>
        </form>

</div>
</body>
</html>