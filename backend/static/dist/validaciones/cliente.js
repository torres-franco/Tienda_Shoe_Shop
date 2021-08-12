function validarDatosClientes() {

    var divMensajeError = document.getElementById("mensajeError");  
    var nombre = document.getElementById("txtNombre").value;
    if (nombre.trim() == "") {
        //alert("El nombre no debe estar vacio");
        divMensajeError.innerHTML = "El nombre no debe estar vacio *";
        return;
    } else if (nombre.length < 3) {   
        divMensajeError.innerHTML = "El nombre debe tener al menos 3 carácteres *";
        return;
    } else if(/^([0-9])*$/.test(nombre)) {
        divMensajeError.innerHTML = "Error, en el campo Nombre sólo se admiten letras *";
        return false;
    }


    var apellido = document.getElementById("txtApellido").value;
    if (apellido.trim() == "") {
        //alert("El nombre no debe estar vacio");
        divMensajeError.innerHTML = "El apellido no debe estar vacío *";
        return;
    } else if (apellido.length < 3) {
      
        divMensajeError.innerHTML = "El apellido debe tener al menos 3 caracteres *";
        return;
    } else if(/^([0-9])*$/.test(apellido)) {
        divMensajeError.innerHTML = "Error, en el campo Apellido sólo se admiten letras";
        return false;
    }


    var fechaNacimiento = document.getElementById("txtFechaNacimiento").value;
    if (fechaNacimiento.trim() == "") {
        //alert("El nombre no debe estar vacio");
        divMensajeError.innerHTML = "La fecha de nacimiento no debe estar vacía *";
        return;
    }

    var dni = document.getElementById("txtDni").value;
    if (dni.trim() == "") {
        divMensajeError.innerHTML = "El DNI no debe estar vacío *";
        return;
    } else if (dni.length < 7) {
      
        divMensajeError.innerHTML = "El DNI debe contener al menos 7 caracteres";
        return;
    } else if(dni <= 0){
        divMensajeError.innerHTML = "El DNI no debe contener caracteres negativo o nulo";
        return;
    }


    var genero = document.getElementById("txtGenero").value;
    if (genero.trim() == 0) {
        //alert("El nombre no debe estar vacio");
        divMensajeError.innerHTML = "Debe seleccionar un género *";
        return;
    }


    var form = document.getElementById("frmDatos");
    form.submit();
    }