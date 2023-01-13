<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require'view/importsHead.php' ?>

</head>
<body>
    <?php require'view/header.php' ?>
    <main class="container">

        <h2><?php echo $this->mensaje ?></h2>
        <h1>Ubicasion</h1>

        <div class="row justify-content-md-center">
            <?php
                include_once 'models/class/ubicasion.php';
                
                foreach($this->enlaces as $row){
                    $ubicasion = new \Models\Class\Ubicasion();
                    $ubicasion = $row;
            ?>
            <div class="col g-3"">
                <div class="card" style="width: 19rem;">
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
    <?php require'view/importsFooter.php' ?>
</body>
</html>