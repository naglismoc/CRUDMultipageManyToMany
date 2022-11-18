<?php 
include "../components/head.php"; 
include $_INNER_PATH ."/routes.php"; 
?>
<body>
    <?php include $_INNER_PATH."./views/components/navigation.php";  ?>

    <table class="table border-top">
            <thead>
                <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>ingredientCount</th>
                    <th>ingredients</th>
                    <th>show</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($recipes as $recipe) { ?>
                <tr>
                        <td> <?=$recipe->id?> </td>
                        <td> <?=$recipe->name?> </td>
                        <td> <?=count($recipe->ingredients)?> </td>
                        <td> 
                            <ul>
                                <?php foreach ($recipe->ingredients as $ingredient) { ?>
                                        <li> <?=$ingredient->name?> | <?=$ingredient->quantity?> g</li>
                        <?php } ?>
                            </ul>
                        </td>
                        

                        <td>
                            <form action="<?=$_OUTER_PATH.'/views/recipe/show.php'?>" method="get">
                                <input type="hidden" name="id" value="<?=$recipe->id?>">
                                <button type="submit" name="show" class="btn btn-primary">show</button>
                            </form>
                        </td>
                        <td>
                            <form action="<?=$_OUTER_PATH.'/views/recipe/edit.php'?>" method="get">
                                <input type="hidden" name="id" value="<?=$recipe->id?>">
                                <button type="submit" name="edit" class="btn btn-success">edit</button>
                            </form>
                        </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?=$recipe->id?>">
                                <button type="submit" name="destroy" class="btn btn-danger">delete</button>
                            </form>
                        </td>

                </tr>
                <?php  } ?>
            </tbody>
        </table>
</body>
</html>