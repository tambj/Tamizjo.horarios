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
            <form action="<?=URLROOT;?>/enrollments/addenrollment" method="POST">
                <div class="form-group">
                    <div class="d-flex mb-2">
                        <label for="id_student">#ID del alumno</label>
                    </div>                    
                    <input type="number" class="form-control" name="id_student" placeholder="Indica el ID del alumno">
                </div>
                <div class="form-group"><div class="d-flex mb-2">
                        <label for="id_course">#ID del curso</label>
                    </div>
                    <input type="number" class="form-control" name="id_course" placeholder="Indica el ID del Curso">
                </div>
                <div class="form-group">
                    <div class="d-flex mb-2">
                        <label for="active">Activo</label>
                    </div>
                    <select class="form-select" aria-label="Default select example" name="status">
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="form-group mt-5">
                    <button class="nuevo-registro form-control" type="submit" value="submit">Crear matrícula</button>
                </div>
                <div class="form-group">
                    <div class="btn form-control">
                        <a class="link-sesion" href="<?=URLROOT?>/enrollments"> Cancelar</a>
                    </div>
                </div>
                

            </form>
                  
        </div>
    </div>




</div>
<!-- Import Footer -->
<?php require APPROOT . '/view/layout/footer.php'; ?>
<?php require APPROOT . '/view/layout/footer.php'; ?>