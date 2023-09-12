    <?php 
        include("menu.php");
    ?>
    <br>

    <a href="<?php echo base_url(); ?>index.php/medicion/index">
        <button type="button" class="btn btn-primary">Lista Habilitados</button>
    </a>

    <h1 class="text-center">Lista de Mediciones deshabilitados</h1>

    <br>
    <div class="container col-xs-6 text-center">
    <table class="table table-bordered table-striped">
        
        <tr class="table-dark">
            <th>Nro</th>
            <th>Nro. de Sistema</th>
            <th>Fecha</th>
            <th>Potencia Generada [Kw]</th>
            <th>Eficiencia [%]</th>
            <th>Habilitar</th>
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
                            echo form_open_multipart('medicion/habilitarbd');
                        ?>
                            <input type="hidden" name="idmedicion" value="<?php echo $row->idMedicion; ?>">
                            <button type="submit" class="btn btn-warning">Habilitar</button>
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