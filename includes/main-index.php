<?php include 'includes/conexion.php'; ?>
<?php $conexion = new Conexion();
 $oradores= $conexion->consultar("SELECT * FROM `oradores` limit 3");
?>
<main>
  <?php include "./parts/oradores.php";?>

  <section id="lugarFecha" class="lugarFecha">
    <div class="lugarFecha__image"></div>
    <div  class="lugarFecha__content">
      <h2 data-aos="fade-up" data-aos-once="true" data-aos-delay="50">Bs As - Octubre</h2>
      <p data-aos="fade-up" data-aos-once="true" data-aos-delay="50">Buenos Aires es la provincia y localidad más grande del estado de Argentina. En los Estados Unidos, Honolulu es la mas sureña entre las principales ciudades estadounidenses. Aunque el nombre de Honolulu se refiere al área urbana en la costa sureste de la isla de Oahu, la ciudad y el condado de Honolulu han formado una ciudad-condado consolidad que cubre toda la ciudad (aproximadamente 600 km<span>2</span> de superficie).</p>
      <a data-aos="fade-up" data-aos-once="true" data-aos-delay="50" href="" class="button button--small">Conocé más</a>
    </div>
  </section>
  
  <?php include './parts/oradores-form.php';?>

</main>