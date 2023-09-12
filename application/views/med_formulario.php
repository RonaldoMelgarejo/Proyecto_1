  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Crear medicion</h1>
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
                <h3 class="card-title">Rellene el formulario para una Mediciones</h3>
                <br>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php
                    echo form_open_multipart('medicion/agregarbd');
                    
                    date_default_timezone_set('America/La_Paz');
                    $fecha_actual=date("Y-m-d H:i:s");
                ?>

                    <!-- <td>Nro. de Sistema</td> -->
                    <input type="text" name="sistema" placeholder="Nro. del Sistema" class="form-control" value="<?php echo set_value('sistema'); ?>">
                    <?php echo form_error('sistema'); ?>
                    <br>
                    <input type="datetime" name="fecha" placeholder="Introduzca Fecha" class="form-control" value="<?= $fecha_actual?>">
                    <br>
                    <input type="text" name="potencia" placeholder="Escriba la potencia" class="form-control">
                    <br>
                    <input type="text" name="eficiencia" placeholder="Escriba la eficiencia" class="form-control">
                    <br>
                    <input type="text" name="nota" placeholder="Escriba la nota" class="form-control">
                    <br>
                    <button type="submit" class="btn btn-success">Agregar</button>
                
                <?php
                echo form_close();
                ?>
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