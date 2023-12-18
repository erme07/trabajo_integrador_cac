const menuButton = document.querySelector(".burguer");
const menu = document.getElementById("menu");
const nav = document.getElementById("navBar");
const notificacion = document.getElementById('notificacion');

const regularExpresions = {
  titulo: /^.{1,100}$/,
  texto: /^.+[^ \t\r\n]+.*$/,
  nombre: /^[A-Za-zñÑáéíóúÁÉÍÓÚ]{1,15}$/i,
  apellido: /^[A-Za-zñÑáéíóúÁÉÍÓÚ]{1,15}$/i,
  correo: /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/,
  cantidad: /^[1-9]\d*$/
}

let posicionY = 0;

const mostrarNotificacion = () => {
  notificacion.classList.add('popup--visible');
  setTimeout(function () {
    notificacion.classList.remove('popup--visible');
    sessionStorage.removeItem('mostrarNotificacion');
    sessionStorage.removeItem('notificacionMensaje');
  }, 5000);
}


document.addEventListener("click", (e) => {
  if (e.target.matches(".menu__item")) {
    menuButton.classList.remove("open");
    menu.classList.remove("menu--visible");
    nav.classList.remove("navBar--fixed");
    document.body.classList.remove("navbarPlaceholder");
  }
  if (e.target.matches('.burguer') || e.target.matches('.burguer *')) {
    menuButton.classList.toggle("open");
    menu.classList.toggle("menu--visible");
    nav.classList.toggle("navBar--fixed");
    document.body.classList.toggle("navbarPlaceholder");
  }
  if (e.target.id === "eliminar") {
    document.getElementById("modal-delete").classList.add("modal--visible");
    document.body.style.overflow = "hidden";
    
  }
  if (e.target.id === "confirmar") {
    sessionStorage.setItem('mostrarNotificacion', 'true');
    sessionStorage.setItem('notificacionMensaje', 'El orador se ha eliminado correctamente')
  }
  if(e.target.id === 'cancelar'){
    document.getElementById("modal-delete").classList.remove("modal--visible");
    document.body.style.overflow = "auto";
  }
})

document.addEventListener('scroll', (e) => {
  if (posicionY > scrollY) 
    nav.classList.add('navBar--sticky');
  else 
    nav.classList.remove('navBar--sticky');
  posicionY = scrollY;
})

$(document).ready(function () {
  $('.js-example-basic-multiple').select2({
    placeholder: 'Seleccione las categorias'
  });
});

window.onload = function () {
  if (sessionStorage.getItem('mostrarNotificacion') === 'true') {
    document.querySelector(".popup__message").innerHTML = sessionStorage.getItem("notificacionMensaje");
    mostrarNotificacion();
  }
}
