    <?php 
        include("menu.php");
    ?>
    <br>

    <h1 class="text-center">Modificar Medicion</h1>

    </header>

    <br>

    <div class="container w-25 p-3 text-center">

    <?php
        foreach($infomedicion->result() as $row)
        {
        echo form_open_multipart('medicion/modificarbd');
    ?>
        <input type="hidden" name="idmedicion" class="form-control" value="<?php echo $row->idMedicion; ?>">

        <input type="text" name="sistema" placeholder="Nro. del Sistema" class="form-control" value="<?php echo $row->idSistema; ?>">

        <input type="text" name="fecha" placeholder="Introduzca Fecha" class="form-control" value="<?php echo $row->fechaMedicion; ?>">

        <input type="text" name="potencia" placeholder="Escriba la potencia" class="form-control" value="<?php echo $row->potenciaGenerada; ?>">

        <input type="text" name="eficiencia" placeholder="Escriba la eficiencia" class="form-control" value="<?php echo $row->eficiencia; ?>">

        <button type="submit" class="btn btn-success">Modificar</button>
    
    <?php
    echo form_close();
        }
    ?>
    </div>
    <br>   
