<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap.css">
    <script src="<?php echo base_url();?>bootstrap/js/bootstrap.js" ></script>
    <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/style.css">

    <title>Document</title>
</head>
<body>
    
    <header>
    <?php 
        include("menu.php");
    ?>
    <br>
    <h1>Inicio</h1>

    </header>

    <main>
                
        <div class="container card mb-3">
            <br>
            <img src="<?php echo base_url();?>img/solarTech.png" class="center" width="400">
            <br>
                <div class="card-body">
                <h5 class="card-title">Nombre:</h5>
                <p class="card-text">"SolarTech"</p>
                <br>
                <h5 class="card-title">Slogan:</h5>
                <p class="card-text">"Maximiza tu energía solar con nuestro sistema de monitoreo"</p>
                
            </div>
        </div>

    </main> 
    <br>
    <br>   




    <footer class="pie-pagina">
        <div class="grupo-2">
            <small>&copy; 2023 <b>Melgarejo Cardozo Ronaldo </b> - Todos los Derechos Reservados.</small>
        </div>
    </footer>    

<script src="<?php echo base_url();?>bootstrap/js/bootstrap.bundle.js" ></script>
</body>
</html>