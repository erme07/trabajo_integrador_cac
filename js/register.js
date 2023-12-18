const inputs = Array.from(document.querySelectorAll("input"));
const formulario = document.querySelector(".form");
const usernameRegex = /^[a-zA-Z0-9_-]{5,18}$/;


const enviarformulario = () => {
  const formData = new FormData(formulario);

  fetch('http://localhost/trabajo_integrador_cac/includes/insert-user.php', {
    method: 'POST',
    body: formData
  })
    //.then(response => response.json())
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.json();
    })
    .then(data => {
      if (data.redirect) {
        sessionStorage.setItem('mostrarNotificacion', 'true');
        sessionStorage.setItem('notificacionMensaje', data.message)
        window.location.href = data.url;
      } else {
        notificacion.innerHTML = data.message;
        mostrarNotificacion();
      }
    })
    .catch(error => {
      console.error(error);
    });
}

const comprobarInput = (element, valor) => {
  const mensaje = element.nextElementSibling;
  const formData = new FormData();
  formData.append(valor, element.value);
  let ruta = "http://localhost/trabajo_integrador_cac/includes/check-user.php";
  
  if (valor === "correo") ruta = 'http://localhost/trabajo_integrador_cac/includes/check-mail.php';

  fetch(ruta, {
    method: 'POST',
    body: formData
  })
    .then(response => response.json())
    .then(data => {
      if (data.disponible) {
        mensaje.classList.remove("error--show");
        mensaje.innerHTML = data.message;
        element.classList.add("valid");
        element.classList.remove("invalid");
      } else {
        element.classList.add("invalid");
        element.classList.remove("valid");
        mensaje.classList.add("error--show");
        mensaje.innerHTML = data.message;
      }
    })
}

const validar = () => {
  let error = 0;
  inputs.forEach((input) => {
    if (input.value === "" || input.classList.contains("invalid")) {
      input.classList.add("invalid");
      input.nextElementSibling.classList.add("error--show");
      input.nextElementSibling.innerHTML = "Este campo es obligatorio";
      error++;
    }
  });
  if (error === 0)
    enviarformulario();
  else
    console.log("No puede enviarse al servidor");
};


document.addEventListener("change", (e) => { 
  if (e.target.id === "usuario") {
    if (usernameRegex.test(e.target.value))
      comprobarInput(e.target, "usuario");
    else {
      e.target.nextElementSibling.innerHTML = "Ingrese un nombre válido (5 a 18 caracteres - letras, números, guiones y guiones bajos)";
      e.target.classList.add("invalid");
      e.target.nextElementSibling.classList.add("error--show");
    }
  }
    
  if (e.target.id === "correo") {
    if (regularExpresions.correo.test(e.target.value)) 
      comprobarInput(e.target, "correo");
    else {
      e.target.nextElementSibling.innerHTML = "Ingrese un correo válido";
      e.target.classList.add("invalid");
      e.target.nextElementSibling.classList.add("error--show");
    }
      
  }
  if (e.target.id === "password") {
    if (e.target.value.length >= 8) {
      e.target.classList.add("valid");
      e.target.classList.remove("invalid");
      e.target.nextElementSibling.classList.remove("error--show");
    } else {
      e.target.classList.add("invalid");
      e.target.classList.remove("valid");
      e.target.nextElementSibling.classList.add("error--show");
      e.target.nextElementSibling.innerHTML = "La contraseña debe tener al menos 8 caracteres";
    }
  }

  if (e.target.id === "confirm_password") {
    const pass = document.getElementById("password")
    if (e.target.value === pass.value) {
      e.target.classList.add("valid");
      e.target.classList.remove("invalid");
      e.target.nextElementSibling.classList.remove("error--show");
    } else {
      e.target.classList.add("invalid");
      e.target.classList.remove("valid");
      e.target.nextElementSibling.classList.add("error--show");
      e.target.nextElementSibling.innerHTML = "Las contraseñas deben coincidir";

      pass.classList.add("invalid");
      pass.classList.remove("valid");
    }
  }
})


formulario.addEventListener('submit', (e) => {
  e.preventDefault()
  validar();
})
