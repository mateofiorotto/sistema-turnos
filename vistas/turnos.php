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


</section>