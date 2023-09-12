  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lista de mediciones</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Mediciones Habilitadas</h3>
                <br>
                <a href="<?php echo base_url(); ?>index.php/medicion/agregar">
                    <button type="button" class="btn btn-primary">Crear Medicion</button>
                </a>

                <a href="<?php echo base_url(); ?>index.php/medicion/deshabilitados">
                    <button type="button" class="btn btn-primary">Lista Deshabilitados</button>
                </a>


                <a href="<?php echo base_url(); ?>index.php/usuarios/logout">
                    <button type="button" class="btn btn-danger">Cerrar Sesión</button>
                </a>

                
                <h3>
                  Login: <?php echo $this->session->userdata('login'); ?> <br>
                  id: <?php echo $this->session->userdata('idusuario'); ?> <br>
                  Tipo: <?php echo $this->session->userdata('tipo'); ?> <br>
                </h3>

                <hr>
              <!--
                <a href="<?php echo base_url();?>index.php/medicion/listapdf" target="_blank">
                  <button type="submit" class="btn btn-success btn-block">Lista pdf mediciones</button>  
                </a>-->

                <!-- Video reporte en excel, colocar boton
                <a href="<?php echo base_url();?>index.php/medicion/listaxls" target="_blank">
                  <button type="submit" class="btn btn-warning btn-block">Lista de medicion en EXCEL</button>  
                </a>-->
                <!-- Se listaxls 

                <a href="<?php echo base_url();?>index.php/medicion/listaxls2" target="_blank">
                  <button type="submit" class="btn btn-danger btn-block">Lista 2 EXCEL</button>  
                </a>-->
                
                <div class="row">
                  <div class="col-md-4">
                    <a href="<?php echo base_url();?>index.php/medicion/listapdf" target="_blank" class="btn btn-success btn-block">Lista pdf mediciones</a>
                  </div>

                  <div class="col-md-4">
                    <a href="<?php echo base_url();?>index.php/medicion/listaxls" target="_blank" class="btn btn-warning btn-block">Lista de medicion en EXCEL</a>
                  </div>

                  <div class="col-md-4">
                    <a href="<?php echo base_url();?>index.php/medicion/listaxls2" target="_blank" class="btn btn-danger btn-block">Lista 2 EXCEL</a>
                  </div>
                </div>


              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  
                  <tr>
                    <th>Nro</th>
                    <th>Sistema</th>
                    <th>Fecha</th>
                    <th>Potencia Generada [Kw]</th>
                    <th>Eficiencia [%]</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                    <th>Deshabilitar</th>
                    <th>Foto</th>
                  </tr>
                  
                  </thead>
                  <tbody>
            <?php
            $indice=1;
            foreach($mediciones->result() as $row)
            {
                ?>
                  <tr>
                    <th><?php echo $indice; ?></th>
                    <td><?php echo $row->idSistema; ?></td>
                    <td><?php echo formatearFecha($row->fechaMedicion); ?></td>
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
                    
                    
                    <td>
                        <?php
                        $foto=$row->foto;
                        if($foto=="")
                        {
                          ?>
                          <img width="100" src="<?php echo base_url(); ?>uploads/mediciones/perfil.jpg">

                          <?php 
                        }
                        else
                        {
                        ?>
                          <img width="100" src="<?php echo base_url(); ?>uploads/mediciones/<?php echo $foto; ?>">
                        <?php
                        }
                        ?>

                        <?php
                            echo form_open_multipart('medicion/subirfoto');
                        ?>
                            <input type="hidden" name="idmedicion" value="<?php echo $row->idMedicion; ?>">
                            <button type="submit" class="btn btn-warning">subir</button>
                        <?php
                        echo form_close();
                        ?>


                     
                    </td>

                  </tr>
            <?php
                $indice++;
            }
            ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nro</th>
                    <th>Sistema</th>
                    <th>Fecha</th>
                    <th>Potencia Generada [Kw]</th>
                    <th>Eficiencia [%]</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                    <th>Deshabilitar</th>
                    <th>Foto</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->