<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo APP_NAME; ?></title>
    <?php require'view/importsHead.php' ?>
    <link  rel="stylesheet" href="http://localhost/MarcadorPages/public/main.css">
</head>
<body>
    <?php require'view/header.php' ?>
    <main class="container">
        <div class="row mt-2 text-center">
            <h2 class="textColor" ><?php echo $this->mensaje ?></h2>
            <h1 class="detailColor">Ubicasion</h1>
        </div>
        <div class="row mt-2 row-cols-1 row-cols-md-3 g-4">
            <?php
                include_once 'models/class/ubicasion.php';
                
                foreach($this->enlaces as $row){
                    $ubicasion = new \Models\ClassModel\Ubicasion();
                    $ubicasion = $row;
            ?>
            <div class="col"">
                <div class="card shadow rounded" style="width: 19rem;">
                    <div class="card-header bg-transparent border-success">
                        <h5 class="card-title"> <?php echo $ubicasion->nombre; ?> </h5>
                    </div>
                    <div class="card-footer bg-transparent border-success">
                        <a href="http://localhost/MarcadorPages/Ubicasion/elimiarUbicasion/<?php echo $ubicasion->id ?>" class="card-link" >Eliminar</a>
                        <a href="http://localhost/MarcadorPages/Ubicasion/Modificar/<?php echo $ubicasion->id ?>"class="card-link">Editar</a>
                    </div>
                </div>
            </div>
            <?php }?> 
        </div>
    </main>
    <?php require'view/footer.php' ?>
    <?php require'view/importsFooter.php' ?>
</body>
</html>