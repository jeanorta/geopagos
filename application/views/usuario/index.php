
<br>
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Inicio</a></li>
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Gestión de Usuarios<span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a data-toggle="tab" href="#user-1">Registro nuevo</a></li>
        <li><a data-toggle="tab" href="#user-2">Consultar Usuarios</a></li>                        
      </ul>
    </li>
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Favoritos<span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a data-toggle="tab" href="#fav-1">Registro Favoritos</a></li>
        <li><a data-toggle="tab" href="#fav-2">Consultar favoritos</a></li>                        
      </ul>
    </li>
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Gestión de Pagos<span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a data-toggle="tab" href="#pagos-1">Ingresar Pagos</a></li>
        <li><a data-toggle="tab" href="#pagos-2">Consultar Pagos</a></li>                        
      </ul>
    </li>    
  </ul>

<div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>Ejercicio Framework GeoPagos</h3>
      <center>
      <iframe src="<?php echo base_url('public/Frameworks.pdf')?>" style="width:800px; height:600px;" frameborder="0"></iframe>
      </center>
    </div>
    <div id="user-1" class="tab-pane fade">      
		<div class="container-fluid">
		<h3>Registrar Usuario Nuevo</h3>
			<div class="col-sm-4">
				<form method="post" action="<?php echo base_url('usuario/usuario_registro') ?>">
				  <div class="form-group">
				    <label for="usuario">Usuario</label>
				    <input type="text" class="form-control" id="txtusuario" name="txtusuario" placeholder="Nombre de usuario" required="true">
				  </div>
				  <div class="form-group">
				    <label for="clave">Clave</label>
				    <input type="password" class="form-control" id="txtclave" name="txtclave" placeholder="Password" required="true">
				  </div>
				  <div class="form-group">
				    <label for="edad">Edad</label>
				    <input type="number" min="18" class="form-control" id="txtedad" name="txtedad" placeholder="Edad" required="true">
				  </div>
				  	<button type="submit" class="btn btn-default">Registrar</button>
				</form>
			</div>	
		</div>
    </div>
    <div id="user-2" class="tab-pane fade">
    	<div class="container-fluid">
			<h3>Consultar Usuarios</h3>
		    <table class="table table-striped table-hover">
			<thead>
				<th>Codigo Usuario</th>
				<th>Usuario</th>
				<th>clave</th>
				<th>Edad</th>
				<th>Acciones</th>
			</thead>
			<tbody>
				<?php foreach ($selPerfil as $value) { ?>
				<tr>
					<td><?php echo $value->codigousuario; ?></td>
					<td><?php echo $value->usuario; ?></td>
					<td><?php echo $value->clave; ?></td>
					<td><?php echo $value->edad; ?></td>
					<td>
						<a href="<?php echo base_url('usuario/usuario_edit')."/".$value->codigousuario ?>" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
						<a href="<?php echo base_url('usuario/usuario_delete')."/".$value->codigousuario ?>" title="Eliminar"><span class="glyphicon glyphicon-trash"></span></a>

					</td>
				</tr>
				<?php	} ?>
			</tbody>  
			</table>
		</div>
    </div>
    <div id="fav-1" class="tab-pane fade">
    	<div class="container-fluid">
			<h3>Agregar Favoritos</h3>
			<div class="container-fluid">
				<div class="col-sm-4">
					<form method="post" action="<?php echo base_url('usuario/fav_registro') ?>">
						<div class="form-group">
							<label>Seleccionar Usuario:</label>
							<select name="fav_usuario" class="form-control">
							<?php foreach ($selPerfil as $value) { ?>
								<option value="<?php echo $value->codigousuario?>"><?php echo $value->usuario?> </option>
							<?php	} ?>
							</select>

						</div>
						<div class="form-group">
							<label>Seleccionar Usuario Favorito:</label>
							<select name="fav_usuarioFav" class="form-control">
							<?php foreach ($selPerfil as $value) { ?>
								<option value="<?php echo $value->codigousuario?>"><?php echo $value->usuario?> </option>
							<?php	} ?>
							</select>

						</div>					  
					  	<button type="submit" class="btn btn-default">Agregar Favorito</button>
					</form>
				</div>	
			</div>
		</div>
	</div>
	<div id="fav-2" class="tab-pane fade">
    	<div class="container-fluid">
			<h3>Consultar Favoritos</h3>
			<table class="table table-striped table-hover">
			<thead>
				<th>Usuario</th>
				<th>Codigo Usuario</th>				
				<th>Codigo Usuario Favorito</th>
				<th>Acciones</th>
			</thead>
			<tbody>
				<?php foreach ($selFav as $valor) { ?>
				<tr>
					<td><?php echo $valor->usuario; ?></td>
					<td><?php echo $valor->codigousuario; ?></td>					
					<td><?php echo $valor->codigousuariofavorito; ?></td>
					<td>
						<a href="<?php echo base_url('usuario/fav_delete')."/".$valor->codigousuario."/".$valor->codigousuariofavorito ?>" title="Eliminar"><span class="glyphicon glyphicon-trash"></span></a>
					</td>
				</tr>
				<?php	} ?>
			</tbody>  
			</table>
		</div>
	</div>
	<div id="pagos-1" class="tab-pane fade">
    	<div class="container-fluid">
			<h3>Ingresar Pagos</h3>
			<div class="container-fluid">
				<div class="col-sm-4">
					<form method="post" action="<?php echo base_url('usuario/pago_registro') ?>">
						<div class="form-group">
							<label>Seleccionar Usuario:</label>
							<select name="pago_usuario" class="form-control">
							<?php foreach ($selPerfil as $value) { ?>
								<option value="<?php echo $value->codigousuario?>"><?php echo $value->usuario?> </option>
							<?php	} ?>
							</select>

						</div>
					  <div class="form-group">
					    <label>Pago</label>
					    <input type="number" class="form-control" min="0" id="pago_monto" name="pago_monto" required="true" placeholder="Monto a pagar">
					  </div>
					  <div class="form-group">
					    <label>Fecha</label>
					    <input type="date" class="form-control" id="pago_fecha" name="pago_fecha" required="true" min="<?php echo date("Y-m-d");  ?>">
					  </div>
					  	<button type="submit" class="btn btn-default">Registrar Pago</button>
					</form>
				</div>	
			</div>
		</div>
	</div>
	<div id="pagos-2" class="tab-pane fade">
    	<div class="container-fluid">
			<h3>Consultar Pagos</h3>
			<table class="table table-striped table-hover">
			<thead>
				<th>Codigo Usuario</th>
				<th>Usuario</th>
				<th>Codigo Pago</th>
				<th>Importe</th>
				<th>Fecha</th>
				<th>Acciones</th>
			</thead>
			<tbody>
				<?php foreach ($selPago as $value) { ?>
				<tr>
					<td><?php echo $value->codigousuario; ?></td>
					<td><?php echo $value->usuario; ?></td>
					<td><?php echo $value->codigopago; ?></td>
					<td><?php echo $value->importe; ?></td>
					<td><?php echo $value->fecha; ?></td>
					<td>
						<a href="<?php echo base_url('usuario/pago_edit')."/".$value->codigopago ?>" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
						<a href="<?php echo base_url('usuario/pago_delete')."/".$value->codigopago ?>" title="Eliminar"><span class="glyphicon glyphicon-trash"></span></a>

					</td>
				</tr>
				<?php	} ?>
			</tbody>  
			</table>
		</div>
	</div>
</div>