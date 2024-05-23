<?php

    include 'conexion_be.php';

    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $Usuario = $_POST['Usuario'];
    $contrasena = $_POST['contrasena'];
    $contrasena = hash('sha512', $contrasena);

    $query = "INSERT INTO usuarios(nombre_completo, correo, Usuario, contrasena) 
            Values('$nombre_completo','$correo', '$Usuario','$contrasena')";


$verificar_Usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE Usuario = '$Usuario'");

if(mysqli_num_rows($verificar_Usuario) > 0){
    echo'
        <script>
        
        alert("Usuario ya a sido tomado registro invalido");
        window.location = "../inicio.php";
        </script>
    ';
    exit();
}
    
$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo'");

    if(mysqli_num_rows($verificar_correo) > 0){
        echo'
            <script>
            
            alert("Correo registrado invalido");
            window.location = "../inicio.php";
            </script>
        ';
        exit();
    }

    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
        <script>
            alert("Usuario registrado!");
            window.location = "../inicio.php";
            </script>
        ';
    }else{
        echo '
        <script>
        alert("Usuario no pudo ser registrado");
        windows.location = "../inicio.php";
       ';   
    }
    mysqli_close($conexion);

?>