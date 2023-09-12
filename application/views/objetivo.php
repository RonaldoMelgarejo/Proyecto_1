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
        <h1>Objetivo</h1>

    </header>

    <main>
        <div class="container card mb-3">
            
            <br>
                <div class="card-body">
                    <h5 class="card-title">Objetivo General:</h5>
                    <br>
                    <p class="card-text">"Desarrollar un sistema que realice la emisión de reportes de rendimiento para sistemas fotovoltaicos."</p>
                    <br>
                    <h5 class="card-title">Objetivo Especifico:</h5>
                    <br>
                    <p class="card-text">"Analizar y seleccionar los componentes electrónicos necesarios para la construcción del prototipo."</p>
                    <p class="card-text">"Diseñar el circuito eléctrico del sistema fotovoltaico."</p>
                    <p class="card-text">"Desarrollar y programar el microcontrolador del sistema fotovoltaico para la lectura de datos y transmisión de información a la plataforma web."</p>
                    <p class="card-text">"Desarrollar una interfaz web (dashboard) para la visualización y análisis de los datos de la energía generada."</p>
                    <p class="card-text">"Desarrollar una base de datos para almacenar información de la energía eléctrica generada y su posterior integración con el prototipo."</p>
                    <p class="card-text">"Evaluar la eficacia del prototipo en la medición y registro de la energía generada en tiempo real."</p>
                    <br>
                
                </div>
        </div>

    </main>    




    <footer class="pie-pagina">
        <div class="grupo-2">
            <small>&copy; 2023 <b>Melgarejo Cardozo Ronaldo </b> - Todos los Derechos Reservados.</small>
        </div>
    </footer> 

    


<script src="<?php echo base_url();?>bootstrap/js/bootstrap.bundle.js" ></script>
</body>
</html>