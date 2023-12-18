<?php include '../includes/conexion.php';
      $conexion = new conexion();
      $oradores= $conexion->consultar("SELECT * FROM `oradores`");
      include "../includes/init.php" ;
      include "../includes/navbar.php" ;
      include_once("../parts/oradores.php");
      include_once("../includes/footer.php");
?>