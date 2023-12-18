<?php include '../includes/conexion.php';
    $conexion = new conexion();
    $oradores= $conexion->consultar("SELECT * FROM `oradores`");

    if($_GET){
        if(isset($_GET['borrar'])){
            $id_orador = $_GET['borrar'];
            $conexion = new conexion();
            $imagen = $conexion->consultar("select imagen FROM  `oradores` where id_orador=".$id_orador);
            unlink("../assets/upload/".$imagen[0]['imagen']);

            $sql ="DELETE FROM `oradores` WHERE `oradores`.`id_orador` =".$id_orador; 
            $id_orador = $conexion->ejecutar($sql);
            header("Location:admin-list.php");
            die();
        }
        if(isset($_GET['modificar'])){
            $id_orador = $_GET['modificar'];
            header("Location:../includes/edit.php?modificar=".$id_orador);
            die();
        }
    } 
    $conexion = new conexion();
    $oradores= $conexion->consultar("SELECT * FROM `oradores`");
?> 

<?php include_once("../includes/init.php")?>
<?php include_once("../includes/navbar.php")?>
<?php include_once("../parts/oradores.php")?>
<?php include_once("../parts/delete.php")?>
<?php include_once("../includes/footer.php")?>