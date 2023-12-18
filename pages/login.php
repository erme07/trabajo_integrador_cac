<?php ob_start();
session_start();
include '../includes/conexion.php';
?>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['email'];
    $password = $_POST['password'];
    
    $conexion = new Conexion();
    //$user= $conexion->consultar("SELECT * FROM `usuarios` WHERE (usuario ='".$_POST['email']."' OR correo ='".$_POST['email']."') AND password ='".$_POST['password']."'");
    $user= $conexion->consultar("SELECT * FROM `usuarios` WHERE usuario ='".$name."' OR correo ='".$name."'");

    if (count($user) != 0) {
      $usuario = $user[0]['usuario'];
      $contrasenia_hashed = $user[0]['password'];
      $rol= $user[0]['rol'];
      if(password_verify($password, $contrasenia_hashed)){
        $_SESSION['usuario'] = $usuario;
        $_SESSION['logueado']='S';
        if($rol == 'administrador'){
          $_SESSION['rol']="administrador";
          echo json_encode(['redirect' => true, 'url' => 'http://localhost/trabajo_integrador_cac/pages/admin-list.php', 'message' => 'Bienvenido/a '.$usuario]);
          die();
        }else{
          echo json_encode(['redirect' => true, 'url' => 'http://localhost/trabajo_integrador_cac/pages/list.php', 'message' => 'Bienvenido/a '.$usuario]);
          die();
        }
      }else{
        echo json_encode(['redirect' => false, 'message' => 'Usuario o contraseña incorrectos']);
        die();
      }
    } else {
      echo json_encode(['redirect' => false, 'message' => 'Usuario o contraseña incorrectos']);
      die();
    }
}?>

<?php include_once("../includes/init.php")?>
<?php include_once("../includes/navbar.php")?>
<?php include_once("../includes/main-login.php")?>
<?php include_once("../includes/footer.php")?>