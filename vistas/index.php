<?php include('header.php'); ?>

<div class="container">
    <div class="row mb-5">
        <div class="col-md-12 text-center">
            <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 rounded-pill mb-3 font-monospace">
                CONTROL DE EMPLEADOS
            </span>
            <h1 class="display-5 fw-bold text-dark">Panel de Gestión Central</h1>
            <p class="lead text-muted mx-auto" style="max-width: 650px;">
                Bienvenido al sistema web desarrollado.
            </p>
        </div>
    </div>

    <div class="row g-4 justify-content-center">
        
        <div class="col-md-5">
            <div class="card card-custom h-100 p-4">
                <div class="card-body text-center d-flex flex-column align-items-center justify-content-center">
                    <div class="rounded-circle bg-primary bg-opacity-10 p-4 mb-3 text-primary">
                        <i class="fa-solid fa-building-user fs-1"></i>
                    </div>
                    <h3 class="fw-bold mb-2">Departamentos</h3>
                    <p class="text-muted small mb-4">
                        Administre los departamentos de la empresa. Asigne códigos únicos, nombres y descripciones detalladas.
                    </p>
                    <a href="departamento.php" class="btn btn-primary-custom w-100">
                        Gestionar Departamentos <i class="fa-solid fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card card-custom h-100 p-4">
                <div class="card-body text-center d-flex flex-column align-items-center justify-content-center">
                    <div class="rounded-circle bg-success bg-opacity-10 p-4 mb-3 text-success">
                        <i class="fa-solid fa-id-card-clip fs-1"></i>
                    </div>
                    <h3 class="fw-bold mb-2">Empleados</h3>
                    <p class="text-muted small mb-4">
                        Controle el registro de personal. Códigos autogenerados (EMP-XXXX) y asignación a departamentos.
                    </p>
                    <a href="empleado.php" class="btn btn-dark w-100 py-2 border-0 fw-medium" style="border-radius: 8px;">
                        Gestionar Empleados <i class="fa-solid fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include('footer.php'); ?>