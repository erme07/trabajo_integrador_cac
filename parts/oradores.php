<section id="oradores" class="container oradores">
  <h2 class="oradores__title"><span class="oradores__title--small">Conoce a los </span>oradores</h2>
  <div class="oradores__content">

<?php $delay=0;
    foreach($oradores as $orador){?>
      <div data-aos="fade-up" data-aos-once="true" data-aos-delay="<?php echo $delay?>" class="card">
      <?php $delay +=50;
      if($delay== 150) $delay=0; ?>
      <div class="card__image">
        <img src="<?php echo BASE_URL; ?>/assets/upload/<?php echo $orador['imagen'];?>" alt="<?php echo "Imagen de presentacio de ".$orador['nombre'];?>" loading="lazy">
      </div>
      <div class="card__content">
        <div class="tags">

        <?php $tag_list= explode(",", $orador['categorias']);
        foreach($tag_list as $tag){
          ?>
          <span class="card__tag card__tag--<?php echo $tag?>"><?php echo ucfirst($tag)?></span>
        <?php } ?>
        </div>
        <h3 class="card__title"><?php echo $orador['tema'];?></h3>
        <p class="card__text"><?php echo $orador['descripcion'];?></p>
        <p class="card__name"><span>por: </span><?php echo $orador['nombre'];?> <?php echo $orador['apellido'];?> <a href="mailto:<?php echo $orador['mail'];?>"><img src="<?php echo BASE_URL; ?>/assets/icons/email.svg" alt="Enviar mail"></a></p>
        <?php if($_SESSION['rol'] == "administrador" && $_SESSION['logueado'] == 'S' && $currentPage == "admin-list.php"){?>
          <div class="options">
            <span name="eliminar" id="eliminar" class="table__button table__button--red" title="eliminar"><img src="../assets/icons/delete.svg" alt="boton eliminar">Eliminar</span>
            <a name="modificar" id="modificar" class="table__button table__button--orange" href="?modificar=<?php echo $orador['id_orador'];?>" title="modificar"><img src="../assets/icons/edit.svg" alt="boton modificar">Modificar</a>
          </div>
        <?php }?>
      </div>
    </div>
    <?php } ?>
  </div>
<?php if ( isset( $_SESSION['usuario']) and  $_SESSION['rol']=="administrador" && $currentPage == "index.php") {?>
  <a class="oradores__button" href="./pages/admin-list.php">Crud de oradores</a>      
<?php } else if($currentPage == "index.php"){ ?>
  <a class="oradores__button" href="./pages/list.php">Conoce más oradores</a>
<?php } ?>

</section>