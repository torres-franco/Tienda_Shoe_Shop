function validarDatosContacto() {

    var divMensajeError = document.getElementById("mensajeError");
    var tipoContacto = document.getElementById("cboTipoContacto").value;
    if (tipoContacto.trim() == 0) {
        divMensajeError.innerHTML = "Debe seleccionar el tipo de contacto*";
        return;
    }

    var valor = document.getElementById("txtValor").value;
    if (valor.trim() == "") {
        divMensajeError.innerHTML = "Descripción de contacto requerida *";
        return;
    } else if(valor <= 0){
        divMensajeError.innerHTML = "La descripción de contacto no debe contener caracteres negativo o nulo";
        return;
    } else if(valor.length > 35){
        divMensajeError.innerHTML = "La descripción de contacto no debe contener más de 35 caracteres";
        return;
    } else if(valor.length < 5){
        divMensajeError.innerHTML = "La descripción de contacto debe contener al menos 5 caracteres";
        return;
    } 

    var form = document.getElementById("frmDatos");
    form.submit();

}