<!-- Import Header -->
<?php require APPROOT . '/view/layout/header.php'; ?>

<!-- Import Navbar -->
<?php require APPROOT . '/view/layout/navbar_admin.php'; ?>


<!-- Inicio Body -->
<div class="container text-center">
    <h1 class="mb-5 mt-5"><?php echo $data['title']; ?></h1>
<!-- El contenido va aqui -->

<div class="d-flex justify-content-end mb-3">
<a href="<?php echo URLROOT; ?>/students/addstudent">
    <div class="nuevo-registro"><i class="bi bi-plus-circle"></i> Nuevo alumno</div>
</a>
</div>

<!--tabla con los contenidos a mostrar-->
    <table id="tabla" class="table text-center">
        <thead class="thead-light">
            <tr>
                <th style="border-top-left-radius:10px;">ID Alumno</th>
                <th>Username</th>
                <th>E-mail</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>NIF</th>
                <th>Fecha de inscripción</th>
                <th style="border-top-right-radius:10px;"> Acciones</th>
            </tr>
        </thead>


        <tbody>
            <?php foreach ($data['students'] as $student): ?>
            <tr>
                <td><?=$student->id;?></td>
                <td><?=$student->username;?></td>
                <td><?=$student->email;?></td>
                <td><?=$student->name;?></td>
                <td><?=$student->surname;?></td>
                <td><?=$student->telephone;?></td>
                <td><?=$student->nif;?></td>
                <td><?=$student->date_registered;?></td>
                <td class="d-flex justify-content-center">
                    <a href="<?=URLROOT;?>/students/update/<?=$student->id?>">
                        <i class="bi bi-pencil-square icono mr-1"></i>
                    </a>
                    <form action="<?=URLROOT;?>/students/delete/<?=$student->id?>" method="POST">
                        <button type="submit" value="submit" style="background-color:transparent;"><i class="bi bi-trash3-fill icono ml-1"></i></button>                        
                    </form>
                </td>  
            </tr>
            <?php endforeach;?>
            </tbody>
        <tfooter class="thead-light">
        <tr>
                <th style="border-bottom-left-radius:10px;">ID Alumno</th>
                <th>Username</th>
                <th>E-mail</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>NIF</th>
                <th>Fecha de inscripción</th>
                <th style="border-bottom-right-radius:10px;"> Acciones</th>
            </tr>
        </tfooter>        
    </table>

<!-- FIN tabla con los contenidos a mostrar-->

</div>

<!-- Import Footer -->
<?php require APPROOT . '/view/layout/footer.php'; ?>