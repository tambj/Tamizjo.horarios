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
            <form action="<?= URLROOT; ?>/courses/update/<?=$data['course']->id_course ?>" method="POST">
                <div class="form-group">
                    <div class="d-flex mb-2">
                        <label for="id_course">Nombre del curso</label>
                    </div>
                    <input type="text" class="form-control" name="name" placeholder="Indica el nombre del curso" value="<?php echo $data['course']->name ?>">
                </div>
                <div class="form-group">
                    <div class="d-flex mb-2">
                        <label for="description">Descripción del curso</label>
                    </div>
                    <input type="text" class="form-control" name="description" placeholder="Indica la descripción del curso" value="<?php echo $data['course']->description ?>">
                </div>
                <div class="form-group">
                    <div class="d-flex mb-2">
                        <label for="date_start">Fecha de inicio</label>
                    </div>
                    <input type="date" class="form-control" name="date_start" value="<?php echo $data['course']->date_start ?>">
                </div>
                <div class="form-group">
                    <div class="d-flex mb-2">
                        <label for="date_end">Fecha de finalización</label>
                    </div>
                    <input type="date" class="form-control" name="date_end" value="<?php echo $data['course']->date_end ?>">
                </div>
                <div class="form-group">
                    <div class="d-flex mb-2">
                        <label for="active">Activo</label>
                    </div>
                    <select class="form-select" aria-label="Default select example" name="active">
                        <option value="1"
                        <?php 
                            if($data['course']->active == '1')
                            {
                                echo "selected";
                            } 
                            ?>
                            >Sí</option>
                        <option value="0"
                        <?php 
                            if($data['course']->active == '0')
                            {
                                echo "selected";
                            } 
                            ?>
                        
                        >No</option>
                    </select>

                </div>


                <div class="form-group mt-5">
                    <button class="nuevo-registro form-control" type="submit" value="submit">Crear curso</button>
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