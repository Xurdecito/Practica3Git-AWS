<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Esta es la pagina de login</h1>
    <form action="php.php" method="post">
        <?php if(isset($_REQUEST["inf"])){echo"<p>Debes introducir tu correo y tu contraseña</p>";} ?>
        <?php if(isset($_REQUEST["err"])){echo"<p>Los datos introducidos no son correctos</p>";} ?>
        <p><label for="cor">Correo Electrónico:</label>
        <input type="text" name="correo" id="cor"></p>

        <p><label for="con">Contraseña:</label>
        <input type="password" name="contrasenia" id="con"></p>

        <input type="submit" value="Iniciar sesion">
        <input type="reset" value="Borrar datos">
    </form>
    
</body>
</html>