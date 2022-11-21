<!-- Import Header -->
<?php require APPROOT . '/view/layout/header.php'; ?>

<!-- Import Navbar -->
<?php require APPROOT . '/view/layout/navbar.php'; ?>


<!-- Inicio Body -->
<div class="container text-center">
    <h1 class="mb-5 mt-5"><?php echo $data['title']; ?></h1>
<!-- El contenido va aqui -->


<!--tabla con los contenidos a mostrar-->
<div id="container_tabla" class="container text-center">
    <table id="tabla-asignaturas" class="table">
        <thead class="thead-light">
            <tr>
                <th style="border-top-left-radius:10px; width:10%; font-size: 20px; padding-left: 20px">ID</th>
                <th style="font-size: 20px">Nombre del curso</th>
                <th style="font-size: 20px">Descripción</th>
                <th style="font-size: 20px">Fecha inicio</th>
                <th style="font-size: 20px">Fecha fin</th>
                <th style="font-size: 20px">Estado</th>
                <th></th>
                <th style="border-top-right-radius:10px;"></th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($data['courses'] as $course): ?>
            <tr>
                <td style="font-weight: bold; font-size: 20px; padding-left: 20px"><?=$course->id_course;?></td>
                <td style="font-weight: bold; font-size: 20px;"><?=$course->name;?></td>
                <td style="font-weight: bold; font-size: 20px;"><?=$course->description;?></td>
                <td style="font-weight: bold; font-size: 20px;"><?=$course->date_start;?></td>
                <td style="font-weight: bold; font-size: 20px;"><?=$course->date_end;?></td>
                <td style="font-weight: bold; font-size: 20px;"><?=$course->active;?></td>
                <td style="width:5%;">
                    <a class="h4 mr-3" href="#">
                        <i class="fa-solid fa-pen-to-square icono"></i>
                    </a>
                </td>
                <td style="width:5%;">
                    <a class="h4 mr-3" href="#">
                        <i class="fa-solid fa-trash-can icono"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach;?>

        <tfooter class="thead-light">
        <tr style="border-bottom:10px;">
            <th style="border-bottom-left-radius:10px; font-size: 20px; padding-left: 20px">ID</th>
            <th style="font-size: 20px">Nombre del curso</th>
                <th style="font-size: 20px">Descripción</th>
                <th style="font-size: 20px">Fecha inicio</th>
                <th style="font-size: 20px">Fecha fin</th>
                <th style="font-size: 20px">Estado</th>
            <th></th>
            <th style="border-bottom-right-radius:10px;"></th>
        </tr>
        </tfooter>
        </tbody>
    </table>
</div>
<!-- FIN tabla con los contenidos a mostrar-->

</div>

<!-- Import Footer -->
<?php require APPROOT . '/view/layout/footer.php'; ?>