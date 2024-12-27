<?php
$hoy = date('Y-m-d');
$turnosUser = Turno::turnos_usuario($idUser, $hoy);
?>

<section class="container" id="turnos">
    <h2 class="text-center">Pedi tu turno</h2>

    <div class="col-lg-7 justify-content-center text-align-center">
        <p><?= Alerta::obtener_alertas(); ?></p>
    </div>

    <form action="admin/actions/reservar.php" method="POST">
        <label for="fecha_turno">Selecciona una fecha y hora:</label>
        <input type="text" id="fecha_turno" name="fecha_turno" required>

        <button type="submit">Reservar</button>
    </form>

    <h3>Tus turnos</h3>

    <?php
    if ($turnosUser) {
        foreach ($turnosUser as $turno) { ?>
            <div class=row>
                <div class="col-lg-3">
                    <p><?= $turno->getFecha_turno() ?></p>
                </div>
                <div class="col-lg-3">
                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cancelModal" href="#">Cancelar turno</a>
                </div>
            </div>
        <?php } ?>
        <!-- Modal -->
        <div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="cancelModalLabel">Confirmar Cancelación</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ¿Estás seguro de que deseas cancelar este turno?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <!-- El href se actualizará dinámicamente con el ID del turno -->
                        <a href="admin/actions/cancelar.php?id=<?= $turno->getId() ?>" id="confirmCancelBtn" class="btn btn-danger">Cancelar turno</a>
                    </div>
                </div>
            </div>
        </div>
    <?php } else {
        echo "<p>No hay turnos agendados</p>";
    }
    ?>

</section>