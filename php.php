<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php</title>
</head>
<body>

    <?php
    //Comprobamos que se recibe un formulario con el metodo POST, si no, se redirige al login
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            //Comprobamos que las variables que provienen del formulario no esten vacias, si no, redirige al login y sale un mensaje de advertencia
            if($_REQUEST["correo"]!=null && $_REQUEST["contrasenia"]!=null){
                $eml = $_REQUEST["correo"];
                $passw = $_REQUEST["contrasenia"];
                //Probamos que se pueda realizar la conexion a la base de datos
                try{
                $usuario="buscador";
                $contrasenia="buscador";
                $dsn = "mysql:dbname=pruebausuarios;host=127.0.0.1;port=3306";
                $bd = new PDO($dsn,$usuario,$contrasenia);
                //Consulta para la base de datos
                $consulta = "Select count(*) as coincidencias FROM usuario WHERE email = '$eml' AND password='$passw'";
                $com = $bd -> query($consulta);
                //COmprobamos que la consulta haya funcionado, si no indicara que los datos no son validos
                    if($com !==false){
                        //Sirve para contar cuantos valores ha devuelto la consulta, se usa en conjunto con el count por ejemplo
                        //al contrario que rowCount() que se usa sobre todo para cuado se alteran las tablas de la base datos
                        $existe = $com -> fetchColumn();

                        if($existe>=1){
                            header("location:bienvenida.html");
                        }else{
                            header("location:login.php?err");
                        }
                    }else{
                        echo"Se ha producido un error al ejecutar la sentencia en MySQL";
                    }
                }catch(PDOException $e){
                    echo "Se ha producido un error" . $e -> getMessage();
                }
            }else{
                header("location:login.php?inf");
            }
        }else{
            header("location:login.php");
        }
    ?>
    
</body>
</html>