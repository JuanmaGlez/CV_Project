	<?php 		

		$objetoFoto= new SubirFoto();

	 ?>


	<h4>Foto Curriculum</h4>

	<table>
		<tr>
			<td>
				<label for="imagen">Imagen:</label>
			</td>
			<td>
				<!-- type=file, boton de examinar -->
				<input type="file" name="imagen" size="15">
			</td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: center"><input type="submit" name="Enviar_Imagen" value="Enviar Imagen"></td>
		</tr>
	</table>

	
	<div class="foto">
 		<img src="/intranet/uploads/<?php  echo $_SESSION['username'] . $_SESSION['idUsuario'] . '/' . $objetoFoto->objetoUsuario->getPhoto(); ?>" alt="Foto Curriculum" width="90">
 	</div>



