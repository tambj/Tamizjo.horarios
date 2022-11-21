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
            <form action="<?=URLROOT;?>/students/addStudent" method="POST">
                <div class="form-group">
                    <div class="d-flex mb-2">
                        <label for="username">Nombre de usuario</label>
                    </div>                    
                    <input type="text" class="form-control" name="username" placeholder="Indica el nombre de usuario">
                </div>
                <div class="form-group"><div class="d-flex mb-2">
                        <label for="id_course">Contraseña</label>
                    </div>
                    <input type="password" class="form-control" name="pass" placeholder="Indica la contraseña">
                </div>
                <div class="form-group">
                <div class="d-flex mb-2">
                        <label for="id_schedule">E-mail</label>
                    </div>
                    <input type="email" class="form-control" name="email" placeholder="Indica el e-mail">
                </div>
                <div class="form-group">
                <div class="d-flex mb-2">
                        <label for="name">Nombre</label>
                    </div>
                    <input type="text" class="form-control" name="name" placeholder="Indica el nombre del estudiante">
                </div>
                <div class="form-group">
                <div class="d-flex mb-2">
                        <label for="color">Apellido</label>
                    </div>
                    <input type="text" class="form-control" name="surname" placeholder="Indica el apellido del estudiante">
                </div>
                <div class="form-group">
                <div class="d-flex mb-2">
                        <label for="color">Teléfono</label>
                    </div>
                    <input type="text" class="form-control" name="telephone" placeholder="Indica el teléfono del estudiante">
                </div>
                <div class="form-group">
                <div class="d-flex mb-2">
                        <label for="color">NIF</label>
                    </div>
                    <input type="text" class="form-control" name="nif" placeholder="Indica el NIF del estudiante">
                </div>
                <div class="form-group mt-5">
                    <button class="nuevo-registro form-control" type="submit" value="submit">Crear estudiante</button>
                </div>
                <div class="form-group">
                    <div class="btn form-control">
                        <a class="link-sesion" href="<?=URLROOT?>/students"> Cancelar</a>
                    </div>
                </div>
                

            </form>
                  
        </div>
    </div>




</div>
<!-- Import Footer -->
<?php require APPROOT . '/view/layout/footer.php'; ?>
<?php require APPROOT . '/view/layout/footer.php'; ?>