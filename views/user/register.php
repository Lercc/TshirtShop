<!-- MAIN-CONTAINER -->
<!-- MAIN-REGISTER-CONTAINER -->
<div class="register-cotainer">
    <div class="status">
        <img src="<?=BASE_URL?>/assets/icons/account-user.svg" alt="">
        <h1>REGISTRARSE</h1>
        
        <?php if(isset($_SESSION['registro']) && $_SESSION['registro']) : ?>
        <h5 class="alerta-exito">El usuario fue creado correctamente</h5>
        <?php elseif(isset($_SESSION['registro']) && !$_SESSION['registro']) :?>
        <h5 class="alerta-error">Error al crear usuario</h5>
        <?php endif; ?>
        <?php //$_SESSION['registro']=null?>
        <?php Utilidades::deleteSession('registro')?>
        
    </div>
    <form action="<?=BASE_URL?>/usuario/createUser" method="POST">
        <label for="nombre">Nombre</label><span class="alerta-error"><?=Utilidades::mostrarErrores('nombre')?></span>
        <input type="text" name="nombre" placeholder="nombre" required>
        
        <label for="apellidos">Apellidos</label><span class="alerta-error"><?=Utilidades::mostrarErrores('apellidos')?></span>
        <input type="text" name="apellidos"  placeholder="apellidos" required>
        
        <label for="email">Correo</label><span class="alerta-error"><?=Utilidades::mostrarErrores('email')?></span>
        <input type="email" name="email"  placeholder="correo" required>
        
        <label for="password">Password</label><span class="alerta-error"><?=Utilidades::mostrarErrores('password')?></span>
        <input type="password" name="password"  placeholder="password" required>
    
        <input type="submit" value="CREAR">
    </form>

    <?php Utilidades::deleteSession('errores'); ?>
    
</div>
<?php 

