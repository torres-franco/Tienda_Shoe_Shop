<?php

require_once '../../class/Cliente.php';

$cliente = Cliente::obtenerPorId($_POST['numID']);

?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Registro de Clientes</title>
</head>

<body>

	<div class="container">
	
	<div class="row pt-3 mt-3">
    	<div class="col">
    		<h5 class="text-secondary">
       			Resultado de la búsqueda:	
      		</h5>
    	</div>
    	<div class="col-auto">
    		<a href="listado.php" class="btn btn-primary " role="button">Volver</a>
      	</div>
  	</div>

	<table class="table table-hover text-center pt-3 mt-3">
  		<thead class="thead-dark">
    		<tr>
				<th>Id Cliente</th>
				<th>Id Persona</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Nro. Documento</th>
				<th>Fecha de Nacimiento</th>
				<th>CBU</th>
				<th>Estado</th>
			</tr>
		</thead>

		<tbody>
			<tr>
				<th scope="row"> <?php echo $cliente->getIdCliente(); ?> </th>
				<td> <?php echo $cliente->getIdPersona(); ?> </td>
				<td> <?php echo $cliente->getNombre(); ?> </td>
				<td> <?php echo $cliente->getApellido(); ?> </td>
				<td> <?php echo $cliente->getNumeroDocumento(); ?> </td>
				<td> <?php echo $cliente->getFechaNacimiento(); ?> </td>
				<td> <?php echo $cliente->getCbu(); ?> </td>
				<td> <?php echo $cliente->getEstado(); ?> </td>
			</tr>
		</tbody>

	</table>

	</div>

	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>