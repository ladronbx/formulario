function validateForm() {
    var name = document.getElementById("name").value;
    var last_name = document.getElementById("last_name").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var postal_code = document.getElementById("postal_code").value;
    var privacy_policy_accepted = document.getElementById("privacy_policy_accepted").checked;

    document.getElementById("name-error").innerText = "";
    document.getElementById("last_name-error").innerText = "";
    document.getElementById("email-error").innerText = "";
    document.getElementById("phone-error").innerText = "";
    document.getElementById("postal_code-error").innerText = "";
    document.getElementById("privacy_policy_accepted-error").innerText = "";

    var isValid = true;

    if (!name) {
        document.getElementById("name-error").innerText = "Por favor, ingrese su nombre.";
        isValid = false;
    } else if (!/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/.test(name)) {
        document.getElementById("name-error").innerText = "El nombre debe contener solo letras y espacios.";
        isValid = false;
    }

    if (!last_name) {
        document.getElementById("last_name-error").innerText = "Por favor, ingrese sus apellidos.";
        isValid = false;
    } else if (!/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/.test(last_name)) {
        document.getElementById("last_name-error").innerText = "Los apellidos deben contener solo letras y espacios.";
        isValid = false;
    }

    if (!email) {
        document.getElementById("email-error").innerText = "Por favor, ingrese su correo electrónico.";
        isValid = false;
    } else if (!/\S+@\S+\.\S+/.test(email)) {
        document.getElementById("email-error").innerText = "Por favor, ingrese un correo electrónico válido.";
        isValid = false;
    }

    if (!phone) {
        document.getElementById("phone-error").innerText = "Por favor, ingrese su número de teléfono.";
        isValid = false;
    } else if (!/^\d{9}$/.test(phone)) {
        document.getElementById("phone-error").innerText = "Por favor, ingrese un número de teléfono válido de 9 dígitos.";
        isValid = false;
    }

    if (!postal_code) {
        document.getElementById("postal_code-error").innerText = "Por favor, ingrese su código postal.";
        isValid = false;
    } else if (!/^\d{5}$/.test(postal_code)) {
        document.getElementById("postal_code-error").innerText = "Por favor, ingrese un código postal válido de 5 dígitos.";
        isValid = false;
    }

    if (!privacy_policy_accepted) {
        document.getElementById("privacy_policy_accepted-error").innerText = "Por favor, acepte las políticas de privacidad.";
        isValid = false;
    }

    if (isValid) {
        document.getElementById("registrationForm").submit();
    }
}
