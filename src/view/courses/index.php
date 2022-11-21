<!-- Import Header -->
<?php require APPROOT . '/view/layout/header.php'; ?>

<!-- Import Navbar -->
<?php require APPROOT . '/view/layout/navbar_admin.php'; ?>


<!-- Inicio Body -->
<div class="container text-center">
    <h1 class="mb-5 mt-5"><?php echo $data['title']; ?></h1>
<!-- El contenido va aqui -->
<div class="d-flex justify-content-end mb-3">
<a href="<?php echo URLROOT; ?>/courses/addcourse">
    <div class="nuevo-registro"><i class="bi bi-plus-circle"></i> Nuevo curso</div>
</a>
</div>

<!--tabla con los contenidos a mostrar-->
    <table id="tabla" class="table text-center">
        <thead class="thead-light">
            <tr>
                <th style="border-top-left-radius:10px;">ID</th>
                <th>Nombre del curso</th>
                <th>Descripción</th>
                <th>Fecha inicio</th>
                <th>Fecha fin</th>
                <th>Estado</th>
                <th style="border-top-right-radius:10px;"> Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($data['courses'] as $course): ?>
            <tr>
                <td><?=$course->id_course;?></td>
                <td><?=$course->name;?></td>
                <td><?=$course->description;?></td>
                <td><?=$course->date_start;?></td>
                <td><?=$course->date_end;?></td>
                <td><?=$course->active;?></td>
                <td class="d-flex justify-content-center">
                    <a href="<?=URLROOT;?>/courses/update/<?=$course->id_course?>">
                        <i class="bi bi-pencil-square icono mr-1"></i>
                    </a>
                    <form action="<?=URLROOT;?>/courses/delete/<?=$course->id_course ?>" method="POST">
                        <button type="submit" value="submit" style="background-color:transparent;"><i class="bi bi-trash3-fill icono ml-1"></i></button>                        
                    </form>
                </td>                
            </tr>
            <?php endforeach;?>

        <tfooter class="thead-light">
        <tr>
            <th style="border-bottom-left-radius:10px;">ID</th>
                <th>Nombre del curso</th>
                <th>Descripción</th>
                <th>Fecha inicio</th>
                <th>Fecha fin</th>
                <th>Estado</th>
                <th style="border-bottom-right-radius:10px;"> Acciones</th>
        </tr>
        </tfooter>
        </tbody>
    </table>
<!-- FIN tabla con los contenidos a mostrar-->

</div>

<!-- Import Footer -->
<?php require APPROOT . '/view/layout/footer.php'; ?>