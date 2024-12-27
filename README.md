# Sistema de turnos para kinesiologia

## This project is in SPANISH

## This project isn't 100% finished, but it has the basic features to be used (Check to-do.txt). // Este proyecto no está terminado al 100%, pero tiene las funcionalidades básicas para usarse (Fijarse en to-do.txt).

## The admin user must be loaded manually into the database. // El usuario administrador debe ser cargado manualmente en la base de datos.

### ENG
This is a project about an appointment scheduling system developed using PHP and SQL as part of a personal project. It includes the following features:

- Login system for administrators and users (for scheduling an appointment with their name).
- Appointment scheduling system: stores the appointment in the database under the user’s record. The user can cancel the appointment, which will delete the record.
- Appointment validation: appointments cannot be scheduled on specific dates such as holidays or at the same time. Additionally, appointments cannot be scheduled on weekends. Appointments can only be made during certain hours of the day.
- SQL tables and relationships.
- Alerts and notifications using SweetAlert2.
- CRUD functionality (for scheduling and canceling appointments).
- Admin panel for appointments: displays appointments sorted from the closest to the current date. It also includes a button to cancel appointments in case of any issues or to send a WhatsApp reminder if necessary. (I tried to implement a bot for automatic reminders, but it comes with a cost).
- Use of advanced classes and methods in PHP.
- Database connections using PDO.
- Views and forms.
- Basic form validation.

### ESP
Este es un proyecto sobre un sistema de turnos desarrollado en PHP y SQL como parte de un proyecto personal. Incluye las siguientes características:

- Sistema de inicio de sesión para administradores y usuarios (para solicitar turno con su nombre).
- Sistema para solicitar turno: guarda el turno en la base de datos de un usuario. El usuario puede cancelar el turno y se borra el registro correspondiente.
- Comprobación de turnos: no puede haber turnos en fechas específicas como feriados ni en el mismo horario. Tampoco se pueden solicitar turnos en fines de semana. Solo se pueden pedir turnos en ciertos horarios del día.
- Tablas y relaciones en SQL.
- Alertas y notificaciones utilizando SweetAlert2.
- Funcionalidad CRUD (para solicitar y cancelar turnos).
- Panel de administración de turnos: se muestran los turnos ordenados desde el más cercano a la fecha actual. Además, incluye un botón para cancelarlos en caso de algún inconveniente o para enviar un recordatorio por WhatsApp si es necesario. (Intenté implementar un bot para hacerlo automáticamente, pero tiene un costo).
- Uso de clases y métodos avanzados en PHP.
- Conexiones a la base de datos mediante PDO.
- Vistas y formularios.
- Validación básica de formularios.

---

## 🖥️ Technologies
- **HTML**
- **CSS**
- **Bootstrap**
- **PHP**
- **MySQL (phpmyadmin and queries)**
- **JavaScript**