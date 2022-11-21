<!-- Import Header -->
<?php require APPROOT . '/view/layout/header.php'; ?>

<!-- Import Navbar -->
<?php require APPROOT . '/view/layout/navbar.php'; ?>


<!-- Inicio Body -->
<div class="container text-center">
    <h1 class="mb-5 mt-5"><?php echo $data['title']; ?></h1>

<!-- El contenido va aqui -->

    <h4 class="text-center mt-3">Registro de usuarios</h4>
    <br>
    <div class="row justify-content-center">
        <div class="col-5">
            <div id="tabla-formulario">
                <form action="<?=URLROOT;?>/admin/register" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" required="required" placeholder="Usuario">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" required="required" placeholder="Correo electrónico">
                        </div>
                            <input type="password" class="form-control" name="password" required="required" placeholder="Contraseña">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="confirmPassword" required="required" placeholder="Confirmar Contraseña">
                        </div>
                        <div class="form-group">
                            <select class="select-sesion" name="rol" >
                                <option selected="yes">Escoge un rol</option>
                                <option>Estudiante</option>
                                <option>Profesor</option>
                                <option>Administrador</option>
                            </select>
                        </div>
                        <div class="text-center">
                            <button  type="submit" class="boton-sesion" value="submit">Registrar Usuario</button>
                        </div>
                        <div class="form-group">
                            <p class="text-center mt-3">Para usuarios ya registrados <a class="link-sesion" href="<?=URLROOT?>/admin/login"> Inicia sesión aquí.</a></p>
                        </div>
                </form>
            </div>
        </div>
    </div>




</div>
<!-- Import Footer -->
<?php require APPROOT . '/view/layout/footer.php'; ?>