<!-- Import Header -->
<?php require APPROOT . '/view/layout/header.php'; ?>

<!-- Import Navbar -->
<?php require APPROOT . '/view/layout/navbar_login.php'; ?>


<!-- Content -->





<div class="container text-center">
    <h1 class="mb-5 mt-5"><?php echo $data['title']; ?></h1>
    <h5>Porfavor selecciona el perfil con el que desees iniciar sesión</h5>
    <br>
    <div class="row">
        <div class="col-md-4 mx-auto">
        <div class="grid-card">
        <a href="<?php echo URLROOT; ?>/students/login">
            <div class="menu-admin-opt p-4">
                <i class="bi bi-mortarboard-fill"></i> Estudiante
            </div>
        </a>
        <a href="<?php echo URLROOT; ?>/admin/login">
            <div class="menu-admin-opt p-4">
                <i class="bi bi-terminal-fill"></i> Administrador
            </div>
        </a>
      



    </div>

    </div>
</div>

    



</div>

<!-- Import Footer -->
<?php require APPROOT . '/view/layout/footer.php'; ?>