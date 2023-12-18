const inputs= Array.from(document.querySelectorAll("input"));
const formulario = document.querySelector(".form");

const enviarformulario = () => {
  const formData = new FormData(formulario);

  fetch('http://localhost/trabajo_integrador_cac/pages/login.php', {
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
        inputs.forEach((input) => {
          input.classList.add("invalid");
        });
        document.querySelector(".wrong-access").innerHTML = data.message;
      }
    })
    .catch(error => {
      console.error(error);
    });
}

const validar = () => {
  let error = false;
  inputs.forEach((input) => {
    if (input.value === "") {
      input.classList.add("invalid");
      error = true;
    }
  });
  if (!error)
    enviarformulario();
  else
    document.querySelector(".wrong-access").innerHTML = "No pueden haber campos vacios";
};

document.addEventListener("submit", (e) => {
  e.preventDefault()
  validar();
});