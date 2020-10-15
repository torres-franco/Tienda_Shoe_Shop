function validarDatos() {
    /*alert(88998989898);*/
    var divMensajeError = document.getElementById("mensajeError");
    var razonSocial = document.getElementById("txtRazonSocial").value;
    if (razonSocial.trim() == "") {
        //alert("El nombre no debe estar vacio");
        divMensajeError.innerHTML = "La razón social no debe estar vacia *";
        return;
    } else if (razonSocial.length < 2) {
      
        divMensajeError.innerHTML = "La razón social debe tener al menos 3 carácteres *";
        return;
    }

    var cuit = document.getElementById("txtCuit").value;
    if (cuit.trim() == "") {
        //alert("El nombre no debe estar vacio");
        divMensajeError.innerHTML = "El CUIT no debe estar vacio *";
        return;
    } else if (cuit.length < 9) {
      
        divMensajeError.innerHTML = "El CUIT debe tener al menos 10 carácteres *";
        return;
    }
    

    var form = document.getElementById("frmDatos");
    form.submit();
    }