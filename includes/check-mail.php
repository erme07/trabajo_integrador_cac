<?php ob_start();
session_start();
include './conexion.php';
?>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $correo = $_POST['correo'];
  $conexion = new Conexion();
  $mail = $conexion->consultar("SELECT * FROM `usuarios` WHERE correo ='".$correo."'");

  if (count($mail) == 0) {
    echo json_encode(['disponible' => true]);
    die();
  }else{
    echo json_encode(['disponible' => false, 'message' => 'Ya hay una cuenta asociada a este correo']);
    die();
  }

}?>