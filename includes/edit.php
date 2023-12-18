<?php include 'conexion.php'; ?>
<?php include 'init.php'; ?>
<?php include 'navbar.php';

if($_GET){
    if(isset($_GET['modificar'])){
        $id_orador = $_GET['modificar'];
        $_SESSION['id_orador'] = $id_orador;
        $conexion = new Conexion();
        $oradores = $conexion->consultar("SELECT * FROM `oradores` where id_orador=".$id_orador);
    }
}

if($_POST){
    $conexion = new Conexion();
    $id_orador = $_SESSION['id_orador'];
    $imagen = $conexion->consultar("select imagen FROM  `oradores` where id_orador=".$id_orador);
    unlink("../assets/upload/".$imagen[0]['imagen']);

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['correo'];
    $tema = $_POST['titulo'];
    $descripcion= $_POST['texto'];
    $categorias = $_POST['opciones'];

    $imagen_form = $_FILES['imagen']['name'];
    $imagen_temporal=$_FILES['imagen']['tmp_name'];
    
    $fecha = new DateTime();
    $imagen_form= $fecha->getTimestamp()."_".$imagen_form;
    move_uploaded_file($imagen_temporal,"../assets/upload/".$imagen_form);
    
    $sql = "UPDATE `oradores` SET `nombre` = '$nombre' , `imagen` = '$imagen_form', `apellido` = '$apellido' , `tema` = '$tema', `mail` = '$email', `descripcion` = '$descripcion', `categorias` = '$categorias'    WHERE `oradores`.`id_orador` = '$id_orador';";
    $id_orador = $conexion->ejecutar($sql);
    header("Location: ../pages/admin-list.php");
    die(); 
}?>
<?php include 'main-edit.php'; ?>
<?php include 'footer.php'; ?>