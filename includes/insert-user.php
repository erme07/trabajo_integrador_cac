<?php ob_start();
    set_error_handler("var_dump");
    include './conexion.php';
    session_start();
?>

<?php
header('Content-Type: application/json');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usernameRegex = '/^[a-zA-Z0-9_-]{5,18}$/';
    $correoRegex= '/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/';

  if (preg_match($usernameRegex, $_POST['usuario']) && preg_match($correoRegex, $_POST['correo']) && strlen($_POST['password'])) {
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $conexion = new conexion();
    $sql="INSERT INTO `usuarios` (`id_usuario`, `usuario`, `correo`, `password`) VALUES (NULL, '$usuario', '$correo','$password')";
    $id_usuario = $conexion->ejecutar($sql);
    $_SESSION['usuario'] = $usuario;
    $_SESSION['logueado']='S';
    $_SESSION['rol']="cliente";
    echo json_encode(['redirect' => true, 'url' => 'http://localhost/trabajo_integrador_cac/index.php', 'message' => 'Usuario creado exitosamente']);
    die();
  } else {
    echo json_encode(['redirect' => false, 'message' => 'Error al crear el usuario']);
    die();
  }

} else {
    echo json_encode(['redirect' => false, 'message' => 'Error al crear el usuario']);
    die();
}
?>