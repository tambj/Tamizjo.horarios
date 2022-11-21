<nav class="navbar navbar-expand-lg nav-tamizjo">
        <div class="container">
            <a class="navbar-brand" href="<?php echo URLROOT;?>/admin">
                <img src="<?php echo URLROOT; ?>/img/tamizjo.png" alt="" width="35" height="35" class="d-inline-block align-text-top">
                Tamizjo.horarios
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-eye-fill"></i> Vistas
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="<?php echo URLROOT; ?>/admin"><i class="bi bi-house"></i> Inicio</a></li>
                            <li><a class="dropdown-item" href="<?php echo URLROOT; ?>/students"><i class="bi bi-mortarboard-fill"></i> Alumnos</a></li>
                            <li><a class="dropdown-item" href="<?php echo URLROOT; ?>/teachers"><i class="bi bi-briefcase-fill"></i> Profesores</a></li>
                            <li><a class="dropdown-item" href="<?php echo URLROOT; ?>/courses"><i class="bi bi-clipboard-check"></i> Cursos</a></li>
                            <li><a class="dropdown-item" href="<?php echo URLROOT; ?>/enrollments"><i class="bi bi-journal-text"></i> Matrículas</a></li>
                            <li><a class="dropdown-item" href="<?php echo URLROOT; ?>/schedules"><i class="bi bi-alarm-fill"></i> Horarios</a></li>
                            <li><a class="dropdown-item" href="<?php echo URLROOT; ?>/classes"><i class="bi bi-easel"></i> Clases</a></li>                            
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-fill"></i> Usuario
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-file-person"></i> Mi perfil</a></li>
                            <li><a class="dropdown-item" href="<?php echo URLROOT; ?>admin/login"><i class="bi bi-arrow-bar-left"></i> Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>