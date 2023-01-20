<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo APP_NAME; ?></title>
    <?php require'view/importsHead.php' ?>
    <link rel="stylesheet" href="public/main.css">
</head>
<body>
<?php require'view/header.php' ?>

<main class="container">
    <div class="row mt-2 text-center">
        <h1 class="textColor" >Enlaces</h1>
    </div>
    <div class="row mt-2 row-cols-1 row-cols-md-3 g-4" >
            <?php
                include_once 'models/class/enlaces.php';
                
                foreach($this->enlaces as $row){
                    $enlace = new \Models\ClassModel\Enlaces();
                    $enlace = $row;
            ?>
        <div class="col"">
            <div class="card borderColor shadow rounded" style="width: 19rem;">
                <div class="card-header bg-transparent detailColor">
                    <h5 class="card-title detailColor"> <?php echo $enlace->nombre; ?> </h5>
                    <h6 class="card-subtitle mb-2 textColor"><?php echo $enlace->ubicasion; ?></h6>
                </div>
                <div class="card-body">
                    <p class="card-text"> <?php echo $enlace->link; ?></p>
                </div>
                <div class="card-footer bg-transparent border-success">
                    <a href="http://localhost/MarcadorPages/Enlaces/elimiar/<?php echo $enlace->uuid ?>" class="card-link" >Eliminar</a>
                    <a href="http://localhost/MarcadorPages/Enlaces/Modificar/<?php echo $enlace->uuid ?>" class="card-link">Editar</a>
                    <a href="<?php echo $enlace->link; ?>" target="_blank" class="card-link">Ir</a>
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