<section class="container" id="login">
    <h2 class="text-center">Entra a tu cuenta</h2>

    <div class="col-lg-7 justify-content-center text-align-center">
        <p><?= Alerta::obtener_alertas(); ?></p>
    </div>

    <form method="POST" action="admin/actions/auth_login.php" class="form row justify-content-center align-items-center p-4">
        <div class="form-group col-7">
            <label class="fw-bold" for="nombre_usuario">Nombre de Usuario</label>
            <input required type="text" name="nombre_usuario" id="nombre_usuario" class="form-control">
        </div>

        <div class="form-group col-7">
            <label class="fw-bold" for="contrasena">Contraseña</label>
            <input required type="password" name="contrasena" id="contrasena" class="form-control">
        </div>

        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </div>
    </form>
</section>
