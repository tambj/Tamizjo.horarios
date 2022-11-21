<!-- Import Header -->
<?php require APPROOT . '/view/layout/header.php'; ?>

<!-- Import Navbar -->
<?php require APPROOT . '/view/layout/navbar_admin.php'; ?>


<!-- Inicio Body -->
<div class="container text-center">
    <h1 class="mb-5 mt-5"><?php echo $data['title']; ?></h1>
<!-- El contenido va aqui -->

<div class="d-flex justify-content-end mb-3">
<a href="<?php echo URLROOT; ?>/classes/addclass">
    <div class="nuevo-registro"><i class="bi bi-plus-circle"></i> Nueva clase</div>
</a>
</div>

<!--tabla con los contenidos a mostrar-->
    <table id="tabla" class="table text-center">
        <thead>
            <tr>
                <th style="border-top-left-radius:10px;">ID Clase</th>
                <th>ID Profesor</th>
                <th>ID Curso</th>
                <th>ID Schedule</th>
                <th>Nombre</th>
                <th>Color</th>
                <th style="border-top-right-radius:10px;"> Acciones</th>
            </tr>
        </thead>


        <tbody>
            <?php foreach ($data['classes'] as $clase): ?>
            <tr>
                <td><?=$clase->id_class;?></td>
                <td><?=$clase->id_teacher;?></td>
                <td><?=$clase->id_course;?></td>
                <td><?=$clase->id_schedule;?></td>
                <td><?=$clase->name;?></td>
                <td><?=$clase->color;?></td>
                <td class="d-flex justify-content-center">
                    <a href="<?=URLROOT;?>/classes/update/<?=$clase->id_class?>">
                        <i class="bi bi-pencil-square icono mr-1"></i>
                    </a>
                    <form action="<?=URLROOT;?>/classes/delete/<?=$clase->id_class?>" method="POST">
                        <button type="submit" value="submit" style="background-color:transparent;"><i class="bi bi-trash3-fill icono ml-1"></i></button>                        
                    </form>
                </td>               
            </tr>
            <?php endforeach;?>        
        </tbody>
        <tfoot class="thead-light">
        <tr>
            <th style="border-bottom-left-radius:10px;">ID Clase</th>
            <th>ID Profesor</th>
            <th>ID Curso</th>
            <th>ID Schedule</th>
            <th>Nombre</th>
            <th>Color</th>
            <th style="border-bottom-right-radius:10px;">Acciones</th>
        </tr>
        </tfoot>
    </table>
<!-- FIN tabla con los contenidos a mostrar-->

</div>

<!-- Import Footer -->
<?php require APPROOT . '/view/layout/footer.php'; ?>