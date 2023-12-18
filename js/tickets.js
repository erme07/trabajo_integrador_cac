const amount = document.getElementById("cantidad");
const selectCat = document.getElementById("selectCategory");
const categoryStudent = document.querySelector(".category--student");
const categoryTrainee = document.querySelector(".category--trainee");
const categoryJunior = document.querySelector(".category--junior");
const categorySenior = document.querySelector(".category--senior");
const price = document.getElementById("total");

const formulario = document.querySelector('.form')
const campos = Array.from(document.querySelectorAll("input, textarea"))
const registroValidaciones = {};
campos.forEach(item => registroValidaciones[item.getAttribute("name")] = false)

const COSTO_BOLETO = 200;

const descuentos = {
  estudiante: 80,
  trainee: 50,
  junior: 15,
  senior: 0
}

const discountPercent = () => {
  if (Object.hasOwn(descuentos, selectCat.value))
    return descuentos[selectCat.value]
  else
    return 0;
}

const calculatePrice = () => {
  let subtotal = amount.value * COSTO_BOLETO;
  let total = subtotal - (subtotal * discountPercent() / 100)
  return total;
}

const showPrice = (precio) => {
    price.innerHTML = '$' + precio;
}

const removeSelected = () => {
  categoryStudent.classList.remove("selected");
  categoryTrainee.classList.remove("selected");
  categoryJunior.classList.remove("selected");
  categorySenior.classList.remove("selected")
}

const selectCategory = () => {
  removeSelected()
  if (selectCat.value === 'estudiante')
    categoryStudent.classList.add("selected")
  else if (selectCat.value === 'trainee')
    categoryTrainee.classList.add("selected")
  else if (selectCat.value === 'junior')
    categoryJunior.classList.add("selected")
  else if (selectCat.value === 'senior')
    categorySenior.classList.add("selected")
}

const resetear = (ticket = false) => {
  campos.forEach((item) => {
    if (item.matches(".invalid"))
      document.querySelector(`[data-field='${item.getAttribute("name")}']`).classList.remove("error--show")
    item.classList.remove("invalid")
    item.classList.remove("valid")
  })
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

const validacion = (campo) => { validarCampo(campo, regularExpresions[campo.getAttribute("name")]) }

const validarFormulario = (ticket = false) => {
  campos.forEach(campo => validacion(campo))
  let esValido = Object.values(registroValidaciones).every(element => element === true);
  if (esValido) {
    console.log("Enviando al servidor...")
    // enviarformulario();
    if (ticket) {
      let precio = calculatePrice()
      resetear(ticket)
      showPrice(precio)
    }
    else resetear(ticket)
  }
  else console.log("%cAun no se puede enviar al servidor, hay campos incompletos o inválidos", "color:red")
}

const validarCalculo = () => {
  if (regularExpresions.cantidad.test(amount.value)) {
    amount.classList.remove("invalid")
    amount.classList.add("valid")
    let precio = calculatePrice()
    showPrice(precio)
  } else {
    amount.classList.remove("valid")
    amount.classList.add("invalid")
  }
}

document.addEventListener('click', (e) => {
  if (e.target.matches('.category--student') || e.target.matches('.category--student *')) {
    selectCat.value = 'estudiante'
    selectCategory()
  }
  if (e.target.matches('.category--trainee') || e.target.matches('.category--trainee *')) {
    selectCat.value = 'trainee'
    selectCategory()
  }
  if (e.target.matches('.category--junior') || e.target.matches('.category--junior *')) {
    selectCat.value = 'junior'
    selectCategory()
  }
  if (e.target.matches('.category--senior') || e.target.matches('.category--senior *')) {
    selectCat.value = 'senior'
    selectCategory()
  }
  if (e.target.id === "clear") {
    resetear(true)
    price.innerHTML = "$0"
  }
})

formulario.addEventListener('submit', (e) => {
  e.preventDefault()
  e.stopPropagation()
  console.clear();
  if (e.submitter.id === "resume")
    validarFormulario(true)
  else if (e.submitter.id === "calcular")
    validarCalculo()
  else
    validarFormulario(false)
})

document.addEventListener('input', e => { 
  if (e.target.id === "selectCategory") {
    selectCat.value = e.target.value
    selectCategory()
  }
  if (e.target.matches("input:not([type='file'])") || e.target.matches("textarea.text"))
    validacion(e.target);

})