document
  .getElementById("socioForm")
  .addEventListener("submit", function (event) {
    event.preventDefault();
    console.log("Formulario enviado");
    var formData = new FormData(this);

    fetch("send_email.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.text())
      .then((data) => {
        console.log("Respuesta del servidor:", data);
        document.getElementById("message").innerHTML =
          '<div class="alert alert-success">Correo enviado exitosamente.</div>';
        document.getElementById("socioForm").reset();
        document
          .getElementById("hagase-socio")
          .scrollIntoView({ behavior: "smooth" });
      })
      .catch((error) => {
        console.error("Error:", error);
        document.getElementById("message").innerHTML =
          '<div class="alert alert-danger">Error al enviar el correo.</div>';
        document
          .getElementById("hagase-socio")
          .scrollIntoView({ behavior: "smooth" });
      });
  });
