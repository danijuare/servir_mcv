# Análisis y Diseño: Módulo de Control de Asistencia y Centros de Trabajo

## Planteamiento del Problema
La empresa requiere incorporar al sistema el control de asistencia de los empleados. Dado que los colaboradores no siempre trabajan en la misma ubicación, se les asigna mensualmente a distintos centros de trabajo mediante una planificación. 
La toma de asistencia no es marcada de forma directa por el empleado, sino que se corrobora diariamente a través de llamadas telefónicas realizadas por el operador a los encargados de cada centro de trabajo.

## Tablas de Almacenamiento
Se propone la creación de 4 tablas nuevas para dar solución:

### Tabla 1: centros_trabajo
Registra los diferentes sedes o lugares donde los empleados pueden trabajar.
* `idcentro` (int) - Llave primaria de la tabla.
* `codigo_centro` (varchar) - Código único del centro de trabajo.
* `nombre_centro` (varchar) - Nombre del lugar o sede.
* `direccion_centro` (varchar) - Dirección o referencia física.
* `estado_centro` (int) - 1 o 0 para realizar borrados lógicos.

### Tabla 2: encargados_centro
Personas responsables de los centros a quienes se contactará para confirmar las asistencias.
* `idencargado` (int) - Llave primaria de la tabla.
* `idcentro` (int) - Llave foránea relacionada con la tabla `centros_trabajo`.
* `nombre_encargado` (varchar) - Nombre completo de la persona a cargo.
* `telefono_encargado` (varchar) - Número de teléfono de contacto (personal o corporativo).
* `estado_encargado` (int) - 1 o 0 para realizar borrados lógicos.

### Tabla 3: planificacion_mensual
Registra la programación de los empleados y los lugares donde estarán asignados a trabajar.
* `idplanificacion` (int) - Llave primaria de la tabla.
* `idempleado` (int) - ID del empleado registrado.
* `idcentro` (int) - ID del centro de trabajo asignado.
* `fecha_planificada` (date) - Día específico de presentación en el lugar.
* `hora_entrada` (time) - Hora establecida de entrada.
* `hora_salida` (time) - Hora establecida de salida.
* `estado_plan` (int) - 1 para planificación vigente, 0 para planificación anulada.

### Tabla 4: asistencias
Almacena el registro diario de las asistencias.
* `idasistencia` (int) - Llave primaria de la tabla.
* `idplanificacion` (int) - ID de la planificación asociada.
* `estado_asistencia` (varchar) - Ejemplo: Presente, Ausente, Permiso, Tardanza.
* `idencargado` (int) - Encargado que proporcionó la información vía telefónica.
* `fecha_hora_llamada` (datetime) - Momento exacto en que se efectuó la llamada.
* `observacion` (varchar) - Comentarios o notas sobre la asistencia tomada.
* `usuario_registra` (varchar) - Usuario del sistema que registró la asistencia.
* `fecha_registro` (datetime) - Momento en que se guardó en la base de datos.


## Pantallas del Sistema
Manteniendo la línea gráfica y el diseño moderno actual, se incorporan 5 nuevas opciones de menú:
1. **Centros**
2. **Encargados de Centro**
3. **Planificación**
4. **Asistencia**
5. **Reportes**

Cada pantalla dispondrá de operaciones estándar adaptadas a requerimientos de producción:
* Crear y Editar registros.
* Listar y Buscar por coincidencias, fechas, encargados o empleados.
* Aplicación de borrados lógicos (sin perder historial).


## Bloqueos y Validaciones Recomendadas
* Un empleado **no puede** estar asignado en dos centros de trabajo distintos el mismo día.
* Solo se permite registrar asistencia de personas que se encuentren **debidamente planificadas** para esa fecha.
* **No se pueden** registrar asistencias correspondientes a fechas futuras.
* No se eliminan físicamente centros ni empleados con historial previo únicamente se desactivan mediante borrados lógicos.

---

## Flujo del Proceso Operativo
1. **Planificación Mensual**: El administrador asigna de forma previa a cada empleado al centro de trabajo correspondiente para el mes entrante.
2. **Verificación Telefónica**: El operador visualiza en pantalla el teléfono del encargado respectivo, efectúa la llamada y corrobora la presencia del personal.
3. **Registro y Confirmación**: Se ingresan y guardan las asistencias correspondientes verificadas durante la jornada diaria.