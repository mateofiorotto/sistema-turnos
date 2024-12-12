<?php 
$turnos = Turno::listado_de_turnos();
?>

<section id="turnos-admin">
    <h2 class="text-center">Proximos turnos</h2>
    <div class="row">
        <div class="col-lg-3 col-md-12">
            <h3>Fecha del turno</h3>
        </div>
        <div class="col-lg-3 col-md-12">
            <h3>Pedido en</h3>
        </div>
        <div class="col-lg-3 col-md-12">
            <h3>Cliente</h3>
        </div>
        <div class="col-lg-3 col-md-12">
            <h3>Acciones</h3>
        </div>
    </div>
    <?php
    
    foreach ($turnos as $t) { ?>
    <div class="row">
        <div class="col-lg-3 col-md-12">
            <p>Fecha: <?= $t->getFecha_turno(); ?> </p>
        </div>
        <div class="col-lg-3 col-md-12">
            <p>Pedido en: <?= $t->getCreacion(); ?> </p>
        </div>

        <?php 
        $id = $t->getId();
        $usuarios = Usuario::usuario_por_id($id);
        ?>

        <div class="col-lg-3 col-md-12">
            <p>Fecha: <?= $usuarios->getNombre_completo(); ?> </p>
            <p>Cel: <?= $usuarios->getTelefono(); ?> </p>
        </div>

        <div class="col-lg-3 col-md-12">
            <a>Enviar mensaje</a>
            <a>Cancelar turno</a>
        </div>
    </div>
    
    <?php } ?>

</section>