    function validarDatosUsuario() {
    /*alert(88998989898);*/
    var divMensajeError = document.getElementById("mensajeError");
    
    var nombre = document.getElementById("txtNombre").value;
    if (nombre.trim() == "") {
        //alert("El nombre no debe estar vacio");
        divMensajeError.innerHTML = "El nombre no debe estar vacio *";
        return;
    } else if (nombre.length < 3) {
      
        divMensajeError.innerHTML = "El nombre debe tener al menos 3 carácteres *";
        return;
    }

    var apellido = document.getElementById("txtApellido").value;
    if (apellido.trim() == "") {
        //alert("El nombre no debe estar vacio");
        divMensajeError.innerHTML = "El apellido no debe estar vacio *";
        return;
    } else if (apellido.length < 3) {
      
        divMensajeError.innerHTML = "El apellido debe tener al menos 3 carácteres *";
        return;
    }


    var user = document.getElementById("txtUser").value;
    if (user.trim() == "") {
        //alert("El nombre no debe estar vacio");
        divMensajeError.innerHTML = "El usario no debe estar vacio *";
        return;
    } else if (user.length < 6) {
      
        divMensajeError.innerHTML = "El usario debe tener al menos 6 carácteres *";
        return;
    }

    var clave = document.getElementById("txtClave").value;
    if (clave.trim() == "") {
        //alert("El nombre no debe estar vacio");
        divMensajeError.innerHTML = "La clave no debe estar vacia *";
        return;
    } else if (clave.length < 7) {
      
        divMensajeError.innerHTML = "La clave debe tener al menos 7 carácteres *";
        return;
    }


    var form = document.getElementById("frmDatos");
    form.submit();
    }