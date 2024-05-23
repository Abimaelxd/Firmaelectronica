<?php

    session_start();
    include 'conexion_be.php';

    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $contrasena = hash('sha512', $contrasena);


    $Valida = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo' and contrasena = '$contrasena'");

    if(mysqli_num_rows($Valida) > 0){
        $_SESSION['Usuario'] = $correo;
        header("location: ../paginaprincipal.php");
        exit();
    }else{
        echo '
            <script>
            alert("Datos no validos, favor de verificar los datos correspondientes");
            window.location = "../inicio.php";
            
            </script>
        ';
        exit();
    }
?>