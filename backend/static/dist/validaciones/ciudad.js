function validarDatosCiudad() {
    var divMensajeError = document.getElementById("mensajeError");
    var codigoPostal = document.getElementById("txtCodigoPostal").value;
    if (codigoPostal.trim() == "") {
        divMensajeError.innerHTML = "El código postal es requerido*";
        return;
    } else if (codigoPostal.length < 4) {
        divMensajeError.innerHTML = "El código postal debe contener al menos 4 carácteres *";
        return;
    } else if(isNaN(codigoPostal)){
        divMensajeError.innerHTML = "No se admiten letras en el campo Código Postal";
        return;
    } else if (codigoPostal.length > 7) {
        divMensajeError.innerHTML = "Ingrese un Código Postal válido.";
        return;
    }

    var nombre = document.getElementById("txtNombre").value;
    if (nombre.trim() == "") {
        divMensajeError.innerHTML = "La ciudad es requerida *";
        return;
    } else if (nombre.length < 2) {
      
        divMensajeError.innerHTML = "La ciudad debe tener al menos 2 carácteres *";
        return;
    } else if(/^([0-9])*$/.test(nombre)) {
        divMensajeError.innerHTML = "Error, el campo ciudad no acepta números *";
        return false;
    }
    

    var form = document.getElementById("frmDatos");
    form.submit();
    }

