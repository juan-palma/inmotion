<div class="container area_scroll" data-page="<?php echo($actual); ?>">
	<div id="servicios" class="row"><br/>
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock">Servicios:</h5>
				<hr class="colorgraph">
			</div>
			
			<div class="valueBox">
				<label>Titulo de la sección:</label>
				<?php
				
				$encontrar = array("\r\n", "\n", "\r");
				$remplazar = '';
				$nuevoValor = str_replace($encontrar, $remplazar, $serviciosDB->contenido_info);
				
				$valoresDB = json_decode($nuevoValor);
				
				
				$data  =  array ( 
					'name' => 'servicios[titulo]',
					'value' => $valoresDB->titulo_general,
					'class' => 'validaciones vc form-control input-lg',
					'autocomplete' => 'off',
					'placeholder' => ''
				); 
				echo  form_input( $data );
				
				
				$data_servicio_icono  =  array ( 
					'name' => 'servicio0_icono',
					'value' => '',
					'class' => 'validaciones vc form-control input-lg',
					'autocomplete' => 'off',
					'placeholder' => ''
				);
				$data_servicio_foto  =  array ( 
					'name' => 'servicio0_foto',
					'value' => '',
					'class' => 'validaciones vc form-control input-lg',
					'autocomplete' => 'off',
					'placeholder' => ''
				);
				$data_servicio_titulo  =  array ( 
					'name' => 'servicios[servicio][0][titulo]',
					'value' => '',
					'class' => 'validaciones vc form-control input-lg',
					'autocomplete' => 'off',
					'placeholder' => ''
				);
				
				$data_servicio_intro  =  array ( 
					'name' => 'servicios[servicio][0][intro]',
					'value' => '',
					'class' => 'validaciones vc form-control input-lg hl2',
					'autocomplete' => 'off',
					'placeholder' => ''
				);
				
				$data_servicio_link  =  array ( 
					'name' => 'servicios[servicio][0][link]',
					'value' => '',
					'class' => 'validaciones vc form-control input-lg',
					'autocomplete' => 'off',
					'placeholder' => ''
				);
				
				?>
				
				<div class="contentServicio">
					Agregar un servicio: <div id="servicio_clonemas" class="clone mas"><i class="fas fa-plus-circle"></i></div>
					
					<?php
					if(count($valoresDB->servicios) <= 0 ){
						?>
						<div id="servicio_base" class="servicio">
							<div class="valHead">
								<h5>Servicio <span class="valNum">1</span></h5>
								<div class="servicio_cloneBox">
									<div class="clone menos"><i class="fas fa-minus-circle"></i></div>
								</div>
							</div>
							
							<div class="row">
								<div class="col -md-3">
									<div class="servicio_foto">
										<label>Icono</label>
										<?php echo form_upload( $data_servicio_icono ); ?>
									</div>
									<div class="servicio_foto">
										<label>foto</label>
										<?php echo form_upload( $data_servicio_foto ); ?>
									</div>
									
								</div>
								
								<div class="col -md-9">
									<div class="servicio_titulo">
										<label>Titulo del Servicio:</label>
										<?php echo form_input( $data_servicio_titulo ); ?>
									</div>
									<div class="servicio_texto">
										<label>Introducción:</label>
										<?php echo form_textarea( $data_servicio_intro ); ?>
									</div>
									<div class="servicio_enlace">
										<label>Enlace del servicio:</label>
										<?php echo form_input( $data_servicio_link ); ?>
									</div>
								</div>
							</div>
						</div>
						<?php
					} else{
						foreach ($valoresDB->servicios as $i=>$v) {
							
							?>
							<div id="servicio_base" class="servicio">
								<div class="valHead">
									<h5>Servicio <span class="valNum"><?php echo($i+1); ?></span></h5>
									<div class="servicio_cloneBox">
										<div class="clone menos"><i class="far fa-trash-alt"></i></i></div>
									</div>
								</div>
								
								<div class="row">
									<div class="col -md-3">
										<div class="servicio_foto">
											<label>Icono</label>
											<?php
												$data_servicio_icono['name'] = 'servicio'.$i.'_icono';
												echo form_upload( $data_servicio_icono );
											?>
										</div>
										<div class="servicio_foto">
											<label>Icono</label>
											<?php
												$data_servicio_icono['name'] = 'servicio'.$i.'_foto';
												echo form_upload( $data_servicio_foto );
											?>
										</div>
									</div>
									
									<div class="col -md-9">
										<div class="servicio_titulo">
											<label>Titulo del Servicio:</label>
											<?php
												$data_servicio_titulo['name'] = 'servicios[servicio]['.$i.'][titulo]';
												$data_servicio_titulo['value'] = $v->titulo;
												echo form_input( $data_servicio_titulo );
											?>
										</div>
										<div class="servicio_texto">
											<label>Introducción:</label>
											<?php
												$data_servicio_intro['name'] = 'servicios[servicio]['.$i.'][texto]';
												//$encontrar = array("<br />");
												//$remplazar = '\r\n ';
												//$nuevoValor = str_replace($encontrar, $remplazar, $v->texto);
												$data_servicio_intro['value'] = $v->texto;
												echo form_textarea( $data_servicio_intro );
											?>
										</div>
										<div class="servicio_enlace">
											<label>Enlace del servicio:</label>
											<?php
												$data_servicio_link['name'] = 'servicios[servicio]['.$i.'][enlace]';
												$data_servicio_link['value'] = $v->enlace;
												echo form_input( $data_servicio_link );
											?>
										</div>
									</div>
								</div>
							</div>
							<?php
						}
						
					}
					?>
				</div>
				
				
			</div>
		</div>
	</div>
</div>


</form>