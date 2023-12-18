<?php ob_start();
    set_error_handler("var_dump");
    include 'conexion.php';
    session_start();
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['correo'];
    $tema = $_POST['titulo'];
    $descripcion = $_POST['texto'];
    $categorias = $_POST['opciones'];

    $imagen = $_FILES['imagen']['name'];
    $imagen_temporal = $_FILES['imagen']['tmp_name'];
    $fecha = new DateTime();
    $imagen = $fecha->getTimestamp() . "_" . $imagen;
    move_uploaded_file($imagen_temporal, "../assets/upload/" . $imagen);

    $conexion = new conexion();
    $sql="INSERT INTO `oradores` (`id_orador`, `nombre`, `apellido`, `mail`, `tema`,`imagen`, `descripcion`,`categorias`) VALUES (NULL, '$nombre' , '$apellido','$email','$tema','$imagen', '$descripcion','$categorias')";
    $id_orador = $conexion->ejecutar($sql);

    if (isset( $_SESSION['usuario'])=='Admin') {
        // header("Location: ../pages/admin-list.php");
        echo json_encode(['redirect' => true, 'url' => 'http://localhost/trabajo_integrador_cac/pages/admin-list.php', 'message' => 'Orador creado exitosamente']);
    }else
        //header("Location: ../index.php");
        echo json_encode(['redirect' => false, 'message' => 'Orador creado exitosamente']);
} else {
    echo "Error: No se recibieron datos del formulario.";
}?>