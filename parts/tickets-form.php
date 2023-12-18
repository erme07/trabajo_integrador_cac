<h2 class="ticket__title"><span class="ticket__title--small">Venta</span> Valor de ticket $200</h2>

<form class="form form--ticket" id="ticketForm">
  <div class="half">
    <input type="text" placeholder="Nombre" class="" name="nombre">
    <div class="error" data-field="nombre">Ingrese un nombre válido</div>
  </div>
  <div class="half">
    <input type="text" placeholder="Apellido" class="" name="apellido">
    <div class="error" data-field="apellido">Ingrese un apellido válido</div>
  </div>
  <div class="full">
    <input type="email" placeholder="Correo" class="" name="correo">
    <div class="error" data-field="correo">Ingrese un correo válido</div>
  </div>
  <div class="half">
    <label for="cantidad" class="">Cantidad</label>
    <input type="text" id="cantidad" placeholder="Cantidad" class="" name="cantidad">
    <div class="error" data-field="cantidad">Ingrese un número válido</div>
  </div>
  <div class="half">
    <label for="selectCategory" class="half">Categoria</label>
    <select name="" id="selectCategory" class="half">
      <option value="senior" selected>Senior</option>
      <option value="junior">Junior</option>
      <option value="trainee">Trainee</option>
      <option value="estudiante">Estudiante</option>
    </select>
  </div>
  <div class="ticket__total full">
    <p>Total a Pagar: <span id="total">$0</span></p>
  </div>
  <div class="ticket__buttons full">
    <button type="reset" id="clear">Borrar</button>
    <button type="submit" id="calcular">Calcular costo</button>
  </div>
  <div class="ticket__buttons full">
    <button type="submit" id="resume">Comprar</button>
  </div>
</form>