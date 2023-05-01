<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<title>Retira aspas simples contra code injection (MariaDB e mySQL)</title>
 		<link rel="stylesheet" href="php_retiraaspas.css"/>
		<link rel="icon" type="image/png" href="php_retiraaspas.png"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<?php
			header( "Content-Type: text/html; charset=ISO-8859-1", true);

			$resultado = '';
			$texto = '';

			if( isset( $_POST[ 'retirar']))
			{
				$texto = $_POST["texto"];
				// mágica
				$resultado = "'" . str_replace( "'", "\'", str_replace( '\\', '\\\\', $texto)) . "'";
			}
		?>
		<h1>Retira aspas simples contra code injection (MariaDB e mySQL)<br></h1>

		<form action="php_retiraaspas.php" method="POST" style="border: 0px">
			<p>Valor: <input type="text" name="texto" style="width: 500px" value="<?php echo htmlspecialchars( $texto, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401, "ISO-8859-1"); ?>" autofocus></p>
			<p><input type="submit" name="retirar" value="Retirar"></p>
		</form>

		<br><p>Resultado: <?php echo htmlspecialchars( $resultado, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401, "ISO-8859-1"); ?></p><br><br>
		<p><a href="https://github.com/jacknpoe/php_retiraaspas">Repositório no GitHub</a></p><br><br>
		<form action="index.html" method="POST" style="border: 0px">
			<p><input type="submit" name="voltar" value="Voltar"></p>
		</form>
	</body>
</html>