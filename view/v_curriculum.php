<?php 

	//require_once('c_curri.php');
	//$objetoCurri = new InterCurri();
 ?>

<form action="<?PHP $PHP_SELF ?>" method="post">
<h2>Curriculum</h2>

<table>
	<tr>
		<td>
			Nombre 
		</td>
		<td>
			<input type='text' name='nombre_curri' size='20'>
		</td>
		<td>
			<input type="submit" name='guardar_curri' value="Guardar">
		</td>
	</tr>
	<tr></tr>
	<tr>
		<td>
			Listar 
		</td>
		<td>
			<select name="listarCurri">
				<option value="0">Curriculum</option>
				<?php $objetoCurri->listarCurri(); ?>
			</select>
		</td>
		<td>
			<input type="submit" name="listarlo" value="Ver">
		</td>
	</tr>
</table>
</form>

