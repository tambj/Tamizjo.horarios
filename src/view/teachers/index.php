<!-- Import Header -->
<?php require APPROOT . '/view/layout/header.php'; ?>

<!-- Import Navbar -->
<?php require APPROOT . '/view/layout/navbar_admin.php'; ?>


<!-- Inicio Body -->
<div class="container text-center">
    <h1 class="mb-5 mt-5"><?php echo $data['title']; ?></h1>
<!-- El contenido va aqui -->
<div class="d-flex justify-content-end mb-3">
<a href="<?php echo URLROOT; ?>/teachers/addteacher">
    <div class="nuevo-registro"><i class="bi bi-plus-circle"></i> Nuevo profesor</div>
</a>
</div>

<!--tabla con los contenidos a mostrar-->
    
    <table id="tabla" class="table text-center">
        <thead class="thead-light">
            <tr>
                <th style="border-top-left-radius:10px;">ID Profesor</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>NIF</th>
                <th>E-mail</th>
                <th style="border-top-right-radius:10px;"> Acciones</th>
            </tr>
        </thead>


        <tbody>
            <?php foreach ($data['teachers'] as $teacher): ?>
            <tr>
                <td><?=$teacher->id_teacher;?></td>
                <td><?=$teacher->name;?></td>
                <td><?=$teacher->surname;?></td>
                <td><?=$teacher->telephone;?></td>
                <td><?=$teacher->nif;?></td>
                <td><?=$teacher->email;?></td>
                <td class="d-flex justify-content-center">
                    <a href="<?=URLROOT;?>/teachers/update/<?=$teacher->id_teacher?>">
                        <i class="bi bi-pencil-square icono mr-1"></i>
                    </a>
                    <form action="<?=URLROOT;?>/teachers/delete/<?=$teacher->id_teacher ?>" method="POST">
                        <button type="submit" value="submit" style="background-color:transparent;"><i class="bi bi-trash3-fill icono ml-1"></i></button>                        
                    </form>
                </td>
            </tr>
            <?php endforeach;?>

        <tfooter class="thead-light">
        <tr>
                <th style="border-bottom-left-radius:10px;">ID Profesor</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>NIF</th>
                <th>E-mail</th>
                <th style="border-bottom-right-radius:10px;"> Acciones</th>
            </tr>
        </tfooter>
        </tbody>
    </table>

<!-- FIN tabla con los contenidos a mostrar-->

</div>

<!-- Import Footer -->
<?php require APPROOT . '/view/layout/footer.php'; ?>