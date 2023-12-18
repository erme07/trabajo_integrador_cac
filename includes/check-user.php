<?php ob_start();
session_start();
include './conexion.php';
?>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $usuario = $_POST['usuario'];
  $conexion = new Conexion();
  $user= $conexion->consultar("SELECT * FROM `usuarios` WHERE usuario ='".$usuario."'");

  if (count($user) == 0) {
    echo json_encode(['disponible' => true]);
    die();
  }else{
    echo json_encode(['disponible' => false, 'message' => 'Usuario no disponible']);
    die();
  }

}?>