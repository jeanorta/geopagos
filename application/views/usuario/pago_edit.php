<?php foreach ($datosPago as $value) {
	
 ?>
<div class="container-fluid">
			<h3>Actualizar Pagos</h3>
			<div class="container-fluid">
				<div class="col-sm-4">
					<form method="post" action="<?php echo base_url('usuario/pago_update') ?>">
						<div class="form-group">
							<label>Seleccionar Usuario:</label>
							<?php
							$lista = array(); 
							foreach ($selPerfil as $registro) { 
								$lista[$registro->codigousuario] = $registro->usuario;
								}
								echo form_dropdown('pago_usuario',$lista,$value->codigousuario, 'class="form-control"')
								?>
						</div>
					  <div class="form-group">
					    <label>Pago</label>
					    <input type="number" class="form-control" min="0" id="pago_monto" name="pago_monto" required="true" placeholder="Monto a pagar" value="<?php echo $value->importe?>">
					  </div>
					  <div class="form-group">
					    <label>Fecha</label>
					    <input type="date" class="form-control" id="pago_fecha" name="pago_fecha" required="true" value="<?php echo $value->fecha?>">
					  </div>
					  <input type="number" hidden="true" id="pago_codigo" name="pago_codigo"  value="<?php echo $value->codigopago?>">
					  	<button type="submit" class="btn btn-default">Actualizar Pago</button>
					</form>
				</div>	
			</div>
</div>
<?php 
}
?>