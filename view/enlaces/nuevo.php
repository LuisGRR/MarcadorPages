<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require'view/importsHead.php' ?>
    <link rel="stylesheet" href="../public/main.css">
</head>
<body>
<?php require'view/header.php' ?>
<main class="container d-flex flex-column justify-content-center align-items-center mt-5">

    <h1>Nuevo enlace</h1>
    <h2><?php echo $this->mensaje; ?></h2>

    <div class="card p-5 w-50 shadow rounded">
        <form class="row align-items-start g-3" action="http://localhost/MarcadorPages/Enlaces/nuevoLink" method="POST">
            <div class="col-12">
                <label for="formGroupExampleInput" class="form-label" >Nombre</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="name" placeholder="Example input placeholder">
            </div>
            <div class="col-12">
                <label for="formGroupExampleInput" class="form-label">Link</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="link" placeholder="Example input placeholder">
            </div>
            <div class="col-md-6">
                <select class="form-select " name="ubicasion" aria-label="Default select example">
                <?php
                include_once 'models/class/ubicasion.php';
                
                foreach($this->ubicasion as $row){
                    $ubicasion = new \Models\Class\Ubicasion();
                    $ubicasion = $row;

                    echo '<option value="'.$ubicasion->id.'">'.$ubicasion->nombre.'</option>';
                }
                ?> 
                </select>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary" from="form_nuevaUbicasion" value="Submit" >Primary</button>
            </div>
        </form>
    </div>
    </main>
    <?php require'view/importsFooter.php' ?>
</body>
</html>