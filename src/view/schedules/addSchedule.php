<!-- Import Header -->
<?php require APPROOT . '/view/layout/header.php'; ?>

<!-- Import Navbar -->
<?php require APPROOT . '/view/layout/navbar_admin.php'; ?>


<!-- Inicio Body -->
<div class="container text-center">
    <h1 class="mb-5 mt-5"><?php echo $data['title']; ?></h1>

    <!-- El contenido va aqui -->
    <div class="row justify-content-center">
        <div class="col-md-4 col-sm-12">
            <form action="<?= URLROOT; ?>/schedules/addSchedule" method="POST">
                <div class="form-group">
                    <div class="d-flex mb-2">
                        <label for="id_class">#ID de la clase</label>
                    </div>
                    <input type="text" class="form-control" name="id_class" placeholder="Indica el #ID de la clase">
                </div>
                <div class="form-group">
                    <div class="d-flex mb-2">
                        <label for="time_start">Empieza a las</label>
                    </div>
                    <input type="time" class="form-control" name="time_start">
                </div>
                <div class="form-group">
                    <div class="d-flex mb-2">
                        <label for="time_end">Termina a las</label>
                    </div>
                    <input type="time" class="form-control" name="time_end">
                </div>
                <div class="form-group">
                    <div class="d-flex mb-2">
                        <label for="day">Fecha de inicio</label>
                    </div>
                    <input type="date" class="form-control" name="day">
                </div>                
                <div class="form-group mt-5">
                    <button class="nuevo-registro form-control" type="submit" value="submit">Crear horario</button>
                </div>
                <div class="form-group">
                    <div class="btn form-control">
                        <a class="link-sesion" href="<?= URLROOT ?>/courses"> Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>




</div>
<!-- Import Footer -->
<?php require APPROOT . '/view/layout/footer.php'; ?>
<?php require APPROOT . '/view/layout/footer.php'; ?>