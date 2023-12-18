
const formulario = document.querySelector('.form')
const campos = Array.from(document.querySelectorAll("input:not([type='file']), textarea"))
const registroValidaciones = {};
campos.forEach( item => registroValidaciones[item.getAttribute("name")] = false )

const resetear = (ticket = false) => {
  campos.forEach((item) => {
    if (item.matches(".invalid"))
      document.querySelector(`[data-field='${item.getAttribute("name")}']`).classList.remove("error--show")
    item.classList.remove("invalid")
    item.classList.remove("valid")
  })
  document.getElementById("select2-select-container").innerHTML = '';
  document.getElementById("select").value = '';
  formulario.reset()
  if (ticket) {
    selectCat.value = "senior"
    selectCategory()
  }
}

const validarCampo = (campo, regexp) => {
  let elementoMensaje = document.querySelector(`[data-field='${campo.getAttribute("name")}']`);
  if (!regexp.test(campo.value)) {
    campo.classList.remove("valid")
    campo.classList.add("invalid")
    elementoMensaje.classList.add("error--show")
    registroValidaciones[campo.getAttribute("name")] = false;
  } else {
    campo.classList.remove("invalid")
    campo.classList.add("valid")
    elementoMensaje.classList.remove("error--show")
    registroValidaciones[campo.getAttribute("name")] = true;
  }
}

const enviarformulario = () => {
  const selectElement = document.getElementById('select');
  const formData = new FormData(formulario);
  const opcionesSeleccionadas = Array.from(selectElement.selectedOptions).map(option => option.value);
  let direccion;

  formData.append('opciones', opcionesSeleccionadas.join(','));
  if (window.location.pathname === "/trabajo_integrador_cac/includes/edit.php")
    direccion = "edit.php"
  else 
    direccion = "insert.php"
  fetch(`http://localhost/trabajo_integrador_cac/includes/${direccion}`, {
    method: 'POST',
    body: formData
  })
    .then(response => response.json())
    .then(data => {
      if (data.redirect) {
        sessionStorage.setItem('mostrarNotificacion', 'true');
        sessionStorage.setItem('notificacionMensaje', data.message)
        window.location.href = data.url;
      } else {
        document.querySelector(".popup__message").innerHTML = data.message;
        notificacion.classList.add('popup--visible');
      }
    })
    .catch(error => {
      console.error(error);
    });
}

const validacion = (campo) => {validarCampo(campo, regularExpresions[campo.getAttribute("name")])}

const validarFormulario = (ticket=false) => {
  campos.forEach(campo => validacion(campo))
  let esValido = Object.values(registroValidaciones).every(element => element === true);
  if (esValido) {
    console.log("Enviando al servidor...")
    enviarformulario();
    if (ticket) {
      let precio = calculatePrice()
      resetear(ticket)
      showPrice(precio)
    }
    else resetear(ticket)
  }
  else console.log("%cAun no se puede enviar al servidor, hay campos incompletos o inválidos","color:red")
}

formulario.addEventListener('submit', (e) => {
  e.preventDefault()
  e.stopPropagation()
  console.clear();
  if(e.submitter.id === "resume")
    validarFormulario(true)
  else if (e.submitter.id === "calcular")
    validarCalculo()
  else
    validarFormulario(false)
})

document.addEventListener('input', e => {
  if (e.target.matches("input:not([type='file'])") || e.target.matches("textarea.text"))
    validacion(e.target);
})