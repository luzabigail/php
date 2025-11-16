<?php
function calculaNIF(int $digitos): String
	{

		$letras = ["T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E"];
		$resultado = $letras[$digitos % 23];
		return $resultado;
	}

?>
<html>

<head>
	<meta charset="UTF-8">
	<title>Calcula NIF</title>
</head>

<body>
	<?php
	

	if ($_SERVER['REQUEST_METHOD'] == "GET") {
	?>
		<form method='POST'>
			<p>DNI: <input type='text' name='dni'></p>
			<input type='submit' value='Enviar' />
		</form>
	<?php
	} else {
		/*ctype_digit() en PHP es una función que verifica si todos los caracteres de 
		una cadena son dígitos decimales (0-9) y devuelve true si lo son, o false en 
		caso contrario. Es importante notar que esta función solo verifica caracteres 
		numéricos, no valores numéricos completos como números negativos o decimale */
		if (!empty($_POST["dni"]) && ctype_digit($_POST["dni"]) ) {
			$numdni   = $_POST["dni"];
			$letradni = calculaNIF($numdni);
			echo "La letra del DNI es: $letradni <br>";
			echo "Su NIF completo sería: $numdni-$letradni";	
		} else {
			echo "El valor del DNI:".htmlspecialchars($_POST["dni"])."</b> no es valor numérico";
		}
	}
	?>
</body>

</html>