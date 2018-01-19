<?php foreach ($datosUsuario as $value) {
	
 ?>
<div class="container-fluid">
		<h3>Actualizar Usuario</h3>
			<div class="col-sm-4">
				<form method="post" action="<?php echo base_url('usuario/usuario_update') ?>">
				  <div class="form-group">
				    <label for="usuario">Usuario</label>
				    <input type="text" class="form-control" id="txtusuario" name="txtusuario" required="true" placeholder="Nombre de usuario" value="<?php echo $value->usuario?>">
				  </div>
				  <div class="form-group">
				    <label for="clave">Clave</label>
				    <input type="password" class="form-control" id="txtclave" name="txtclave" required="true" placeholder="Password" value="<?php echo $value->clave?>">
				  </div>
				  <div class="form-group">
				    <label for="edad">Edad</label>
				    <input type="number" class="form-control" min="18" id="txtedad" name="txtedad" required="true" placeholder="Edad" value="<?php echo $value->edad?>">
				  </div>
				  <input type="number" hidden="true" id="txtcodigousuario" name="txtcodigousuario"  value="<?php echo $value->codigousuario?>">
				  	<button type="submit" class="btn btn-default">Actualizar</button>
				</form>
			</div>	
		</div>
<?php 
}
?>