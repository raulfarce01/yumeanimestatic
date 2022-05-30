<?php

    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    session_start();

//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//FICHERO PARA SUBIR LA IMAGEN AL PERFIL DEL USUARIO
//ESTE FICHERO NO HACE NADA MÁS QUE ESO
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

    if(isset($_POST["cambiaFoto"])){
        //RECOGER ID DEL USER
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false){
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));

            /*
            * Insert image data into database
            */
            
            //DB details
            $dbHost     = 'localhost';
            $dbUsername = 'yumeanime';
            $dbPassword = '123456'; // Change password
            $dbName     = 'yumeanimedb';
            
            //Create connection and select DB
            $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
            
            // Check connection
            if($db->connect_error){
                die("Error al conectar: " . $db->connect_error);
            }
                    
            //echo $_POST['nombre'].", ".$_POST['desc'].", ".$_POST['precio'];
            //echo "INSERT INTO figura (nombreFig, descFig, precioFig, fotoFig) VALUES (".$_POST['nombre'].", ".$_POST['desc'].", ".$_POST['precio'].", '$imgContent')";
            //Insert image content into database
            $insert = $db->query("UPDATE user SET imgPerfil = '$imgContent' WHERE idUser = '".$_SESSION['idUser']."'");
            //echo $imgContent;
            if($insert){
                echo "<p>Archivo subido correctamente a la base de datos</p>";
            }else{
                echo "<p>Error al subir el archivo a la base de datos</p>";
            } 

        }else{
            echo "Selecciona un archivo para subir.";
        }
    }else{
        echo "No se ha recibido imagen";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirección al Perfil :)</title>
</head>
<body>

    <form action="../view/perfil.php" method="get">
        <input type="hidden" name="idUser" value='<?php echo $_SESSION['idUser'] ?>'>
    </form>
    
    <script>

        window.onload = function ()
        {

		    document.forms[0].submit();

        }
    </script>

</body>
</html>