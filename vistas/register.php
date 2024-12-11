<section class="container" id="register">
    <h2 class="text-center">Crea tu cuenta</h2>

        <div class="col-lg-7 justify-content-center text-align-center">
            <p><?= Alerta::obtener_alertas(); ?></p>
        </div>

    <form method="POST" action="admin/actions/auth_register.php" class="form row justify-content-center align-items-center p-4">
        <div class="form-group col-7">
            <label class="fw-bold" for="nombre_usuario">Nombre de Usuario<span class="disclaimer-form">Escribe tu nombre de usuario sin espacios</span></label>
            <input required type="text" name="nombre_usuario" id="nombre_usuario" class="form-control">
        </div>
        
        <div class="form-group col-7">
            <label class="fw-bold" for="nombre_completo">Nombre Completo<span class="disclaimer-form">Escribe tu nombre real</span></label>
            <input required type="text" name="nombre_completo" id="nombre_completo" class="form-control">
        </div>

        <div class="form-group col-7">
            <label class="fw-bold" for="contrasena">Contraseña<span class="disclaimer-form">No debe contener más de 32 caracteres</span></label>
            <input required type="password" name="contrasena" id="contrasena" class="form-control">
        </div>

        <div class="form-group col-7">
            <label class="fw-bold" for="telefono">Celular<span class="disclaimer-form">Solo números (EJ: 5493446549212)</span></label>
            <input required type="number" name="telefono" id="telefono" class="form-control">
        </div>

        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </div>
    </form>
</section>
