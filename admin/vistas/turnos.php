<?php
$hoy = date('Y-m-d');
$turnos = Turno::listado_de_turnos($hoy);

$usuarios = Usuario::listado_de_usuarios();
?>

<section id="turnos-admin" class="container my-5">
    <h2 class="text-center mb-4">Próximos Turnos</h2>
    <div class="col-lg-7 justify-content-center text-align-center">
        <p><?= Alerta::obtener_alertas(); ?></p>
    </div>

    <?php if ($turnos) { ?>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Fecha del Turno</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Pedido en</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($turnos as $turno) {
                        $id = $turno->getId_usuario();
                        $usuarios = Usuario::usuario_por_id($id);
                    ?>
                        <tr>
                            <!-- Fecha del turno -->
                            <td><?= $turno->getFecha_turno(); ?></td>

                            <!-- Información del cliente -->
                            <td>
                                <strong>Nombre:</strong> <?= $usuarios->getNombre_completo(); ?><br>
                                <strong>Cel:</strong> <?= $usuarios->getTelefono(); ?>
                            </td>

                            <!-- Fecha de creación del pedido -->
                            <td><?= $turno->getCreacion(); ?></td>

                            <!-- Acciones -->
                            <td>
                                <a href="https://web.whatsapp.com/send?phone=<?= $usuarios->getTelefono() ?>" class="btn btn-primary btn-sm me-2" target="_blank">Enviar Mensaje</a>
                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cancelModal" href="#">Cancelar turno</a>
                            </td>
                        </tr>
                </tbody>
            </table>
        </div>
        <?php }
        } else { ?>
        <h3>No hay turnos agendados.</h3>
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
                ¿Estás seguro de que deseas cancelar el turno?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <a href="actions/cancelar.php?id=<?= $turno->getId() ?>" id="confirmCancelBtn" class="btn btn-danger">Cancelar turno</a>
            </div>
        </div>
    </div>
</div>
</section>