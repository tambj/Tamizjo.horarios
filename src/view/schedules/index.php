<!-- Import Header -->
<?php require APPROOT . '/view/layout/header.php'; ?>

<!-- Import Navbar -->
<?php require APPROOT . '/view/layout/navbar_admin.php'; ?>


<!-- Inicio Body -->
<div class="container text-center">
    <h1 class="mb-5 mt-5"><?php echo $data['title']; ?></h1>
<!-- El contenido va aqui -->
<div class="d-flex justify-content-end mb-3">
<a href="<?php echo URLROOT; ?>/schedules/addschedule">
    <div class="nuevo-registro"><i class="bi bi-plus-circle"></i> Nuevo horario</div>
</a>
</div>

<!--tabla con los contenidos a mostrar-->
    <table id="tabla" class="table text-center">
        <thead class="thead-light">
            <tr>
                <th style="border-top-left-radius:10px;">ID Schedule</th>
                <th>ID Class</th>
                <th>Hora de inicio</th>
                <th>Hora de fin</th>
                <th>Dia</th>
                <th style="border-top-right-radius:10px;">Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($data['schedules'] as $schedule): ?>
            <tr>
                <td><?=$schedule->id_schedule;?></td>
                <td><?=$schedule->id_class;?></td>
                <td><?=$schedule->time_start;?></td>
                <td><?=$schedule->time_end;?></td>
                <td><?=$schedule->day;?></td>
                <td class="d-flex justify-content-center">
                    <a href="<?=URLROOT;?>/schedules/update/<?=$schedule->id_schedule ?>">
                        <i class="bi bi-pencil-square icono mr-1"></i>
                    </a>
                    <form action="<?=URLROOT;?>/schedules/delete/<?=$schedule->id_schedule?>" method="POST">
                        <button type="submit" value="submit" style="background-color:transparent;"><i class="bi bi-trash3-fill icono ml-1"></i></button>                        
                    </form>
                </td>
            </tr>
            <?php endforeach;?>
            </tbody>
        <tfooter class="thead-light">
        <tr>
            <th style="border-bottom-left-radius:10px;">ID Schedule</th>
            <th>ID Class</th>
            <th>Hora de inicio</th>
            <th>Hora de fin</th>
            <th>Dia</th>
            <th style="border-bottom-right-radius:10px;">Acciones</th>
        </tr>
        </tfooter>
        
    </table>
<!-- FIN tabla con los contenidos a mostrar-->

</div>

<!-- Import Footer -->
<?php require APPROOT . '/view/layout/footer.php'; ?>
