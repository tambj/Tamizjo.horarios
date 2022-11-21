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
            <form action="<?=URLROOT;?>/classes/addClass" method="POST">
                <div class="form-group">
                    <div class="d-flex mb-2">
                        <label for="id_professor">#ID professor</label>
                    </div>                    
                    <input type="number" class="form-control" name="id_teacher" placeholder="Indica el ID del profesor">
                </div>
                <div class="form-group"><div class="d-flex mb-2">
                        <label for="id_course">#ID del curso</label>
                    </div>
                    <input type="number" class="form-control" name="id_course" placeholder="Indica el ID del Curso">
                </div>
                <div class="form-group">
                <div class="d-flex mb-2">
                        <label for="id_schedule">#ID del horario</label>
                    </div>
                    <input type="number" class="form-control" name="id_schedule" placeholder="Indica el ID del horario">
                </div>
                <div class="form-group">
                <div class="d-flex mb-2">
                        <label for="name">Clase</label>
                    </div>
                    <input type="text" class="form-control" name="name" placeholder="Indica el nombre de la clase">
                </div>
                <div class="form-group">
                <div class="d-flex mb-2">
                        <label for="color">Color</label>
                    </div>
                    <input type="text" class="form-control" name="color" placeholder="Indica el color de la clase">
                </div>
                <div class="form-group mt-5">
                    <button class="nuevo-registro form-control" type="submit" value="submit">Crear clase</button>
                </div>
                <div class="form-group">
                    <div class="btn form-control">
                        <a class="link-sesion" href="<?=URLROOT?>/classes"> Cancelar</a>
                    </div>
                </div>
                

            </form>
                  
        </div>
    </div>




</div>
<!-- Import Footer -->
<?php require APPROOT . '/view/layout/footer.php'; ?>
<?php require APPROOT . '/view/layout/footer.php'; ?>