<!-- Import Header -->
<?php require APPROOT . '/view/layout/header.php'; ?>

<!-- Import Navbar -->
<?php require APPROOT . '/view/layout/navbar_admin.php'; ?>


<!-- Content -->

<div class="container text-center">
    <h1 class="mb-5 mt-5"><?php echo $data['title']; ?></h1>
    <div class="row">
        <div class="col-md-8 mx-auto">
        <div class="grid-card">
        <a href="<?php echo URLROOT; ?>/students">
            <div class="menu-admin-opt p-4">
                <i class="bi bi-mortarboard-fill"></i> Alumnos
            </div>
        </a>
        <a href="<?php echo URLROOT; ?>/teachers">
            <div class="menu-admin-opt p-4">
                <i class="bi bi-briefcase-fill"></i> Profesores
            </div>
        </a>
        <a href="<?php echo URLROOT; ?>/courses">
            <div class="menu-admin-opt p-4">
                <i class="bi bi-clipboard-check"></i> Cursos
            </div>
        </a>        
        <a href="<?php echo URLROOT; ?>/enrollments">
            <div class="menu-admin-opt p-4">
                <i class="bi bi-journal-text"></i> Matrículas
            </div>
        </a>        
        <a href="<?php echo URLROOT; ?>/schedules">
            <div class="menu-admin-opt p-4">
                <i class="bi bi-alarm-fill"></i> Horarios
            </div>
        </a>
        <a href="<?php echo URLROOT; ?>/classes">
            <div class="menu-admin-opt p-4">
                <i class="bi bi-easel"></i> Clases
            </div>
        </a>
    </div>

    </div>
</div>

    



</div>

<!-- Import Footer -->
<?php require APPROOT . '/view/layout/footer.php'; ?>