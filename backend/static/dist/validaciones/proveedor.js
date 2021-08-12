function validarDatosProveedor() {
    /*alert(88998989898);*/
    var divMensajeError = document.getElementById("mensajeError");
    var razonSocial = document.getElementById("txtRazonSocial").value;
    if (razonSocial.trim() == "") {
        //alert("El nombre no debe estar vacio");
        divMensajeError.innerHTML = "La razón social no debe estar vacía *";
        return;
    } else if (razonSocial.length < 2) {
      
        divMensajeError.innerHTML = "La razón social debe tener al menos 3 caracteres *";
        return;
    }

    var cuit = document.getElementById("txtCuit").value;
    if (cuit.trim() == "") {
        //alert("El nombre no debe estar vacio");
        divMensajeError.innerHTML = "El CUIT no debe estar vacío *";
        return;
    } else if (cuit.length < 10) {   
        divMensajeError.innerHTML = "El CUIT debe tener al menos 10 caracteres *";
        return;
    } 

    else if(cuit.length > 15){
        divMensajeError.innerHTML = "El CUIT no debe contener más de 15 caracteres";
        return;
    } 

    else if(cuit < 0){
        divMensajeError.innerHTML = "El CUIT no debe contener números negativos";
        return;
    }
    

    var form = document.getElementById("frmDatos");
    form.submit();
    }