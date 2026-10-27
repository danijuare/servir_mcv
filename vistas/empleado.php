<?php 
include('header.php'); 
?>

<div class="container py-4">
    <div class="row mb-4 align-items-center">
        <div class="col-md-6">
            <h2 class="fw-bold text-dark mb-1">
                <i class="fa-solid fa-users text-primary me-2"></i> Gestión de Empleados
            </h2>
            <p class="text-muted small mb-0">Administre el registro de personal, asignación de departamentos y códigos únicos (EMP-XXXX).</p>
        </div>
        <div class="col-md-6 text-md-end mt-3 mt-md-0">
            <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill fw-medium">
                Módulo de Personal / MVC PHP
            </span>
        </div>
    </div>

    <!-- Layout principal a dos columnas (Formulario + Tabla) -->
    <div class="row g-4">
        
        <!-- Columna Izquierda: Formulario de Registro / Edición -->
        <div class="col-lg-4">
            <div class="card card-custom h-100">
                <div class="card-header bg-dark text-white py-3">
                    <h5 class="mb-0 fs-6 fw-semibold">
                        <i class="fa-solid fa-user-plus me-2"></i> Formulario de Empleado
                    </h5>
                </div>
                <div class="card-body p-4">
                    <form name="formulario" id="formulario" method="POST">
                        <!-- Campo oculto para el ID del empleado en caso de edición -->
                        <input type="hidden" name="idempleado" id="idempleado">

                        <div class="mb-3">
                            <label for="nombres_empleado" class="form-label fw-medium text-secondary small">Nombres:</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fa-solid fa-user"></i></span>
                                <input type="text" class="form-control" name="nombres_empleado" id="nombres_empleado" placeholder="Ej: Juan Carlos" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="apellidos_empleado" class="form-label fw-medium text-secondary small">Apellidos:</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fa-solid fa-user-tag"></i></span>
                                <input type="text" class="form-control" name="apellidos_empleado" id="apellidos_empleado" placeholder="Ej: Pérez Gómez" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="fecha_nacimiento_empleado" class="form-label fw-medium text-secondary small">Fecha de Nacimiento:</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fa-solid fa-calendar"></i></span>
                                <input type="date" class="form-control" name="fecha_nacimiento_empleado" id="fecha_nacimiento_empleado" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="iddepartamento" class="form-label fw-medium text-secondary small">Departamento:</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fa-solid fa-building"></i></span>
                                <select class="form-select" name="iddepartamento" id="iddepartamento" required>
                                </select>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary-custom text-white py-2" id="btnGuardar">
                                <i class="fa-solid fa-floppy-disk me-2"></i> Guardar Empleado
                            </button>
                            <button type="button" class="btn btn-light border py-2 text-secondary" onclick="limpiar()">
                                <i class="fa-solid fa-eraser me-2"></i> Limpiar Campos
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Columna Derecha: Tabla de Listado -->
        <div class="col-lg-8">
            <div class="card card-custom h-100">
                <div class="card-header bg-white py-3 border-bottom">
                    <h5 class="mb-0 fs-6 fw-bold text-dark">
                        <i class="fa-solid fa-address-book me-2 text-primary"></i> Empleados Registrados
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table id="tbllistado" class="table table-hover align-middle w-100 text-center">
                            <thead class="table-light text-uppercase fs-7">
                                <tr>
                                    <th class="py-3">Opciones</th>
                                    <th class="py-3">Código</th>
                                    <th class="py-3">Nombres</th>
                                    <th class="py-3">Apellidos</th>
                                    <th class="py-3">Nacimiento</th>
                                    <th class="py-3">Departamento</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Los datos se cargan dinámicamente mediante AJAX y DataTables -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="js/empleado.js"></script>

<?php 
include('footer.php'); 
?>