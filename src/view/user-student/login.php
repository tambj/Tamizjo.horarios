<!-- Import Header -->
<?php require APPROOT . '/view/layout/header.php'; ?>

<!-- Import Navbar -->
<?php require APPROOT . '/view/layout/navbar_login.php'; ?>


<!-- Inicio Body -->
<div class="container text-center">
    <h1 class="mb-5 mt-5"><?php echo $data['title']; ?></h1>

<!-- El contenido va aqui -->

    <h4 class="text-center mt-3">Si ya tienes una cuenta puedes iniciar sesión.</h4>
    <br>
    <div class="row justify-content-center">
        <div class="col-4">
            <div id="tabla-formulario">
                <form action="<?=URLROOT;?>/user-student/login" method="POST">
                    <div>
                        <input type="text" class="form-control" id="nombreUsuario" name="username" required="required" autocomplete="off" placeholder="Usuario">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password" required="required" placeholder="Contraseña">
                    </div>

                    <div class="form-group">
                        <button type="submit" value="submit" class="btn btn-outline-success btn-block">
                            <i class="fas fa-sign-in-alt"></i> Iniciar Sesión</button>
                    </div>

                </form>
            </div>
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                <p>Credenciales Erróneas</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>





</div>
<!-- Import Footer -->
<?php require APPROOT . '/view/layout/footer.php'; ?>




