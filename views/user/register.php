<!-- MAIN-CONTAINER -->
<div class="form">
    <h1>REGISTRARSE</h1>
    <form action="<?=BASE_URL?>/usuario/createUser" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre">
        
        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos">
        
        <label for="email">Correo</label>
        <input type="email" name="email">
        
        <label for="password">Password</label>
        <input type="password" name="password">
    
        <input type="submit" value="CREAR">
    </form>
</div>
