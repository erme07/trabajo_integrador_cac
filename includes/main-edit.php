<main class="container"> 
<?php
foreach($oradores as $orador){ ?>
    <div class="contact">
        <h2 class="contact__title"><span class="contact__title--small">modifica los</span>datos del orador</h2>
        <form class="form"  action="#" method="post" enctype="multipart/form-data">
            <div class="full">
                <img class="img" src="../assets/upload/<?php echo $orador['imagen']; ?>">
            </div>
            <div class="half">
                <input type="text" placeholder="Nombre" name="nombre" value="<?php echo $orador['nombre']; ?>">
                <div class="error" data-field="nombre">Ingrese un nombre válido</div>
            </div>
            <div class="half">
                <input type="text" placeholder="Apellido" name="apellido" value="<?php echo $orador['apellido']; ?>">
                <div class="error" data-field="apellido">Ingrese un apellido válido</div>
            </div>
            <div class="full">
                <input type="email" placeholder="Email" name="correo" value="<?php echo $orador['mail']; ?>">
                <div class="error" data-field="correo">Ingrese un email válido</div>
            </div>
            <div class="full">
                <label for="archivo">Imagen del Orador</label>
                <input class="" type="file" name="imagen" id="archivo" accept=".jpg, .png, .webp, .jpeg">
                <div class="error" data-field="imagen">Ingrese una imagen válida</div>
            </div>
            <div class="full">
                <label>Categorias</label>
                <select class="js-example-basic-multiple" name="categorias" multiple="multiple" id="select" style="width: 100%">
                <optgroup label="Frontend">
                    <option value="html" <?php if (in_array('html', explode(",", $orador['categorias']))) echo 'selected'; ?>>HTML</option>
                    <option value="css" <?php if (in_array('css', explode(",", $orador['categorias']))) echo 'selected'; ?>>CSS</option>
                    <option value="javascript" <?php if (in_array('javascript', explode(",", $orador['categorias']))) echo 'selected'; ?>>JavaScript</option>
                    <option value="react" <?php if (in_array('react', explode(",", $orador['categorias']))) echo 'selected'; ?>>React</option>
                    <option value="bootstrap" <?php if (in_array('bootstrap', explode(",", $orador['categorias']))) echo 'selected'; ?>>Bootstrap</option>
                </optgroup>
                <optgroup label="Backend">
                    <option value="php" <?php if (in_array('php', explode(",", $orador['categorias']))) echo 'selected'; ?>>PHP</option>
                    <option value="python" <?php if (in_array('python', explode(",", $orador['categorias']))) echo 'selected'; ?>>Python</option>
                    <option value="java" <?php if (in_array('java', explode(",", $orador['categorias']))) echo 'selected'; ?>>Java</option>
                </optgroup>
                <optgroup label="Frameworks">
                    <option value="angular" <?php if (in_array('angular', explode(",", $orador['categorias']))) echo 'selected'; ?>>Angular</option>
                    <option value="vue" <?php if (in_array('vue', explode(",", $orador['categorias']))) echo 'selected'; ?>>Vue</option>
                    <option value="laravel" <?php if (in_array('laravel', explode(",", $orador['categorias']))) echo 'selected'; ?>>Laravel</option>
                    <option value="codeigniter" <?php if (in_array('codeigniter', explode(",", $orador['categorias']))) echo 'selected'; ?>>Codeigniter</option>
                </optgroup>
                <optgroup label="Tools">
                    <option value="git" <?php if (in_array('git', explode(",", $orador['categorias']))) echo 'selected'; ?>>Git</option>
                    <option value="github" <?php if (in_array('github', explode(",", $orador['categorias']))) echo 'selected'; ?>>Github</option>
                    <option value="markdown" <?php if (in_array('markdown', explode(",", $orador['categorias']))) echo 'selected'; ?>>Markdown</option>
                    <option value="figma" <?php if (in_array('figma', explode(",", $orador['categorias']))) echo 'selected'; ?>>Figma</option>
                    <option value="wordpress" <?php if (in_array('wordpress', explode(",", $orador['categorias']))) echo 'selected'; ?>>Wordpress</option>
                </optgroup>
                </select>
            </div>
            <div class="full">
                <input type="text" placeholder="Titulo" name="titulo" value="<?php echo htmlspecialchars($orador['tema'], ENT_QUOTES, 'UTF-8'); ?>">
                <div class="error" data-field="titulo">Ingrese un titulo</div>
            </div>
            <div class="full">
                <textarea class="text" name="texto" placeholder="Sobre qué quieres hablar?"><?php echo htmlspecialchars($orador['descripcion'], ENT_QUOTES, 'UTF-8'); ?></textarea>
                <div class="error" data-field="texto">Ingrese un texto</div>
            </div>
            <button type="submit" id="oradoresForm">Guardar</button>
        </form>
    </div>

<?php } ?>
</main>