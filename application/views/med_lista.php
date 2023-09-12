    <?php 
        include("menu.php");
    ?>
    <br>

    <a href="<?php echo base_url(); ?>index.php/medicion/agregar">
        <button type="button" class="btn btn-primary">Crear Medicion</button>
    </a>

    <a href="<?php echo base_url(); ?>index.php/medicion/deshabilitados">
        <button type="button" class="btn btn-primary">Lista Deshabilitados</button>
    </a>

    <h1 class="text-center">Lista de Mediciones</h1>

    <br>
    <div class="container col-xs-6 text-center">
    <table class="table table-bordered table-striped">
        
        <tr class="table-dark">
            <th>Nro</th>
            <th>Nro. de Sistema</th>
            <th>Fecha</th>
            <th>Potencia Generada [Kw]</th>
            <th>Eficiencia [%]</th>
            <th>Modificar</th>
            <th>Eliminar</th>
            <th>Deshabilitar</th>
        </tr>

        <?php
            $indice=1;
            foreach($mediciones->result() as $row)
            {
                ?>
                <tr>
                    <th><?php echo $indice; ?></th>
                    <td><?php echo $row->idSistema; ?></td>
                    <td><?php echo $row->fechaMedicion; ?></td>
                    <td><?php echo $row->potenciaGenerada; ?></td>
                    <td><?php echo $row->eficiencia; ?></td>
                    <td>
                        <?php
                            echo form_open_multipart('medicion/modificar');
                        ?>
                            <input type="hidden" name="idmedicion" value="<?php echo $row->idMedicion; ?>">
                            <button type="submit" class="btn btn-success">Modificar</button>
                        <?php
                        echo form_close();
                        ?>
                    </td>
                    <td>
                        <?php
                            echo form_open_multipart('medicion/eliminarbd');
                        ?>
                            <input type="hidden" name="idmedicion" value="<?php echo $row->idMedicion; ?>">
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        <?php
                        echo form_close();
                        ?>
                    </td>
                    <td>
                        <?php
                            echo form_open_multipart('medicion/deshabilitarbd');
                        ?>
                            <input type="hidden" name="idmedicion" value="<?php echo $row->idMedicion; ?>">
                            <button type="submit" class="btn btn-warning">Deshabilitar</button>
                        <?php
                        echo form_close();
                        ?>
                    </td>
                </tr>
                <?php
                $indice++;
            }

        ?>
        
    </table>
        </div>
    </header>    