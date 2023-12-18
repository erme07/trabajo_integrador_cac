<section id="convierteteOrador" class="container">
  <div class="contact">
    <h2 class="contact__title"><span class="contact__title--small">conviertete en un </span>orador</h2>
    <p class="contact__subtitle">Anótate como orador para dar una <span class="underline">charla ignite</span>. Cuéntanos de qué quieres hablar!</p>
    <form class="form">
      <div class="half">
        <input type="text" placeholder="Nombre" name="nombre">
        <div class="error" data-field="nombre">Ingrese un nombre válido</div>
      </div>
      <div class="half">
        <input type="text" placeholder="Apellido" name="apellido">
        <div class="error" data-field="apellido">Ingrese un apellido válido</div>
      </div>
      <div class="full">
        <input type="email" placeholder="Email" name="correo">
        <div class="error" data-field="correo">Ingrese un email válido</div>
      </div>
      <div class="full">
        <label for="archivo">Imagen del Orador</label>
        <input class="" type="file" name="imagen" id="archivo" accept=".jpg, .png, .webp, .jpeg">
        <div class="error" data-field="imagen">Ingrese una imagen válida</div>
      </div>
      <div class="full">
        <select class="js-example-basic-multiple" name="categorias" multiple="multiple" id="select" style="width: 100%">
          <optgroup label="Frontend">
            <option value="html">HTML</option>
            <option value="css">CSS</option>
            <option value="javascript">JavaScript</option>
            <option value="react">React</option>
            <option value="bootstrap">Bootstrap</option>
          </optgroup>
          <optgroup label="Backend">
            <option value="php">PHP</option>
            <option value="python">Python</option>
            <option value="java">Java</option>
          </optgroup>
          <optgroup label="Frameworks">
            <option value="react">React</option>
            <option value="angular">Angular</option>
            <option value="vue">Vue</option>
            <option value="laravel">Laravel</option>
            <option value="codeigniter">Codeigniter</option>
          </optgroup>
          <optgroup label="Tools">
            <option value="git">Git</option>
            <option value="github">Github</option>
            <option value="markdown">Markdown</option>
            <option value="figma">Figma</option>
            <option value="wordpress">Wordpress</option>
          </optgroup>
        </select>
      </div>
      <div class="full">
        <input type="text" placeholder="Titulo" name="titulo">
        <div class="error" data-field="titulo">Ingrese un titulo</div>
      </div>
      <div class="full">
        <textarea class="text" name="texto" placeholder="Sobre qué quieres hablar?"></textarea>
        <div class="error" data-field="texto">Ingrese un texto</div>
      </div>
      <p>Recuerda incluir un título para tu charla</p>
      <button type="submit" id="oradoresForm">Enviar</button>
    </form>
  </div>
</section>