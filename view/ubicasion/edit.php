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
    <main class="container d-flex flex-column justify-content-center align-items-center mt-5">

        <h1 class="textColor">Modificar ubicasión</h1>
        <h2><?php echo $this->mensaje; ?></h2>

        <div class="card p-5 w-50 shadow rounded">
            <form class="row align-items-start g-3" action="http://localhost/MarcadorPages/Ubicasion/updateUbicasion" method="POST">
                <?php include_once 'models/class/ubicasion.php';
                    $ubicasion = new \Models\ClassModel\Ubicasion();
                    $ubicasion = $this->info;
                ?>
                <div class="col-12">
                    <label for="formGroupExampleInput" class="form-label" >Nombre</label>
                    <input type="text" name="nombre" name="nombre" value="<?php echo $ubicasion->nombre ?>" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btnColor" from="form_nuevaUbicasion" value="Submit" >Modificar</button>
                </div>     
            </form>
        </div>
    </main>
    <?php require'view/footer.php' ?>
    <?php require'view/importsFooter.php' ?>
</body>
</html>