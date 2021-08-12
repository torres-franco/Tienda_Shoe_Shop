function validarDatosBarrio() {
    /*alert(88998989898);*/
    var divMensajeError = document.getElementById("mensajeError");
    var descripcion = document.getElementById("txtDescripcion").value;
    if (descripcion.trim() == "") {
        //alert("El nombre no debe estar vacio");
        divMensajeError.innerHTML = "El campo barrio es requerido *";
        return;
    } else if (descripcion.length < 2) {
      
        divMensajeError.innerHTML = "El campo barrio debe contener al menos 2 carateres *";
        return;
    } else if (descripcion.length > 40) {
      
        divMensajeError.innerHTML = "El campo barrio no debe contener más de 40 caratéres *";
        return;
    }

    var ciudad = document.getElementById("cboCiudad").value;
    if (ciudad == 0) {
        //alert("El nombre no debe estar vacio");
        divMensajeError.innerHTML = "Seleccione una ciudad a la que pertenece el barrio *";
        return;
    } 
    

    var form = document.getElementById("frmDatos");
    form.submit();
}