<?php
include("conexion.php");
session_start();
   if (is_null($_SESSION['username'])) {
   	echo "enviar";
    header("Location: index.php"); /* Redirect browser */
   }
else {

}
?>
<!DOCTYPE html>
<html >
<head>

  	<meta charset="UTF-8">
  	<title>Reserva de recursos</title>
  	<link rel="/img/favicon/apple-touch-icon-precomposed" sizes="57x57" href="http://javieisrael.esy.es/apple-touch-icon-57x57.png" />
	<link rel="/img/favicon/apple-touch-icon-precomposed" sizes="114x114" href="http://javieisrael.esy.es/apple-touch-icon-114x114.png" />
	<link rel="/img/favicon/apple-touch-icon-precomposed" sizes="72x72" href="http://javieisrael.esy.es/apple-touch-icon-72x72.png" />
	<link rel="/img/favicon/apple-touch-icon-precomposed" sizes="144x144" href="http://javieisrael.esy.es/apple-touch-icon-144x144.png" />
	<link rel="/img/favicon/apple-touch-icon-precomposed" sizes="60x60" href="http://javieisrael.esy.es/apple-touch-icon-60x60.png" />
	<link rel="/img/favicon/apple-touch-icon-precomposed" sizes="120x120" href="http://javieisrael.esy.es/apple-touch-icon-120x120.png" />
	<link rel="/img/favicon/apple-touch-icon-precomposed" sizes="76x76" href="http://javieisrael.esy.es/apple-touch-icon-76x76.png" />
	<link rel="/img/favicon/apple-touch-icon-precomposed" sizes="152x152" href="http://javieisrael.esy.es/apple-touch-icon-152x152.png" />
	<link rel="icon" type="image/png" href="http://javieisrael.esy.es/favicon-196x196.png" sizes="196x196" />
	<link rel="icon" type="image/png" href="http://javieisrael.esy.es/favicon-96x96.png" sizes="96x96" />
	<link rel="icon" type="image/png" href="http://javieisrael.esy.es/favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="http://javieisrael.esy.es/favicon-16x16.png" sizes="16x16" />
	<link rel="icon" type="image/png" href="http://javieisrael.esy.es/favicon-128.png" sizes="128x128" />
	<meta name="application-name" content="Reserva de recursos"/>
	<meta name="msapplication-TileColor" content="#FFFFFF" />
	<meta name="msapplication-TileImage" content="http://javieisrael.esy.es/mstile-144x144.png" />
	<meta name="msapplication-square70x70logo" content="http://javieisrael.esy.es/mstile-70x70.png" />
	<meta name="msapplication-square150x150logo" content="http://javieisrael.esy.es/mstile-150x150.png" />
	<meta name="msapplication-wide310x150logo" content="http://javieisrael.esy.es/mstile-310x150.png" />
	<meta name="msapplication-square310x310logo" content="http://javieisrael.esy.es/mstile-310x310.png" />
    <link rel="stylesheet" href="css/style.css">

  
</head>
<body>


	<div class="login">
	<div class="heading">
	<form action="estadistica.php">
		<div class="reservas">
	</form>
	<?php
	// Se incluye el miniscript de tratamiento de fechas
	include ("scripts/fechas.php");
	extract($_POST);
	// Se muestra la fecha en curso.
	echo ("Fecha de hoy: ".$diaActual." - ".$mesActual." - ".$annioActual.salto);
	?>
	<form action="reserva_guardar.php" method="post" name="formularioNuevaCita" id="formularioNuevaCita">
		<input type="hidden" name="fechaEnCurso" id="fechaEnCurso" value="<?php echo($fechaEnCurso); ?>">
			<table width="500" border="0" cellspacing="0" cellpadding="2">
				<tr>
					<td width="200">Hora inicio:</td>
					<td width="350">Fecha inicio:</td>
				</tr>	
				<tr>
					<td><select name="hora_inicio" id="hora_inicio" required>
						<?php
						for ($i=8;$i<20;$i++){
							echo ("<OPTION VALUE='");
							printf ("%2s:00:00",$i);
							echo ("'>");
							printf("%2s:00:00",$i);
							echo ("</OPTION>");
						}

						?>
					</select></td>
					<td><input type="date" name="fecha_final" id="fecha_final" required></td>
				</tr>
				<tr>
					<td>Hora final:</td>
					<td>Fecha final:</td>
				</tr>
				<tr>
					<td><select name="hora_final" id="hora_final" required>
						<?php
						for ($i=8;$i<20;$i++){
						echo ("<OPTION VALUE='");
						printf ("%2s:00:00",$i);
						echo ("'>");
						printf("%2s:00:00",$i);
						echo ("</OPTION>".salto);
						}
						
						?>
					</select></td>
					<td><input type="date" class="" name="fecha_inicio" id="fecha_inicio" required></td>
				</tr>
			</table>
		<input type="hidden" name="id_recurso" value="<?php echo $idrecurso ;?>">
		<input type="hidden" name="estado_reserva" value="<?php echo $estado ;?>">
		<input type="hidden" name="n_recurso" value="<?php echo $nom_recurso ;?>">
		<div class="centrador">
		<input name="grabarCita" class="cita" type="submit" id="grabarCita" value="Reservar">
		<input name="anularCita" class="cita" type="submit" id="anularCita" value="Cancelar">			
	</div>
	<br/>	
	</form>	
	</div>
	<form action="home.php">
	<button type="submit" class="float" >Home</button>
	</form>
	<form action="estadistica.php">	
		<button type="submit" class="float" >Estadística de uso</button>
		</div>
	</form>
	<form action="logout.php">
		<div class="input-group input-group-lg">
		</div>
		<button type="submit" class="float" >Cerrar sesión</button>
	</form>

</body>
</html>
