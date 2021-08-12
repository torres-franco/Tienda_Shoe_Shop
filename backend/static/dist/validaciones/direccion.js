function validarDireccion(){

	//Validacion Provincia
    var divMensajeError = document.getElementById("mensajeError");
    var provincia = document.getElementById("cboProvincia").value;
    if (provincia == 0) {
        divMensajeError.innerHTML = "Debe seleccionar una provincia *";
        return;
    }	
	//Validacion Localidad
	var ciudad = document.getElementById("cboCiudad").value;
	if(ciudad == 0){
		divMensajeError.innerHTML = "Debe seleccionar una ciudad *";
        return;
	}	

	var barrio = document.getElementById("cboBarrio").value;
	if(barrio == 0){
		divMensajeError.innerHTML = "Debe seleccionar un barrio *";
        return;
	}
	//Validacion Calle
	var calle = document.getElementById("txtCalle").value;
	if(calle.trim() == ""){
		divMensajeError.innerHTML = "El campo calle es requerido *";
        return;
	}
	if(calle.length < 4){
		divMensajeError.innerHTML = "La calle debe tener al menos 4 caracteres";
        return;
	}
	if(calle.length > 40){
		divMensajeError.innerHTML = "La calle no debe contener más de 40 caracteres";
        return;
	}


	var altura = document.getElementById("txtAltura").value;
	if(isNaN(altura)){
		divMensajeError.innerHTML = "No se admiten letras en el campo altura";
        return;
	}
	if(altura.length > 5){
		divMensajeError.innerHTML = "Debe ingresar una altura real";
        return;
	}

	var form = document.getElementById("frmDatos");
	form.submit();
}