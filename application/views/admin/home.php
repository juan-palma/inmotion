<div class="container area_scroll" data-page="<?php echo($actual); ?>">
	<div id="servicios" class="row"><br/>
		<div class="card stacked-form col-md-12">
			<div class="card-header ">
				<h5>Servicios:</h5>
				<hr class="colorgraph">
			</div>
			
			<div class="valueBox">
				<label>Titulo de la sección:</label>
				<?php
				$data  =  array ( 
					'name' => 'servicio[\'titulo\']',
					'value' => '',
					'class' => 'validaciones vc form-control input-lg',
					'autocomplete' => 'off',
					'placeholder' => ''
				); 
				echo  form_input( $data );
				
				
				$data_servicio_icono  =  array ( 
					'name' => 'servicio[0][icono]',
					'value' => '',
					'class' => 'validaciones vc form-control input-lg',
					'autocomplete' => 'off',
					'placeholder' => ''
				);
				$data_servicio_titulo  =  array ( 
					'name' => 'servicio[0][titulo]',
					'value' => '',
					'class' => 'validaciones vc form-control input-lg',
					'autocomplete' => 'off',
					'placeholder' => ''
				);
				
				$data_servicio_intro  =  array ( 
					'name' => 'servicio[0][intro]',
					'value' => '',
					'class' => 'validaciones vc form-control input-lg',
					'autocomplete' => 'off',
					'placeholder' => ''
				);
				
				$data_servicio_link  =  array ( 
					'name' => 'servicio[0][link]',
					'value' => '',
					'class' => 'validaciones vc form-control input-lg',
					'autocomplete' => 'off',
					'placeholder' => ''
				);
				
				?>
				
				<div class="contentServicio">
					Agregar un servicio: <div id="servicio_clonemas" class="clone mas"><i class="fas fa-plus-circle"></i></div>
					
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
								<div class="servicio_titulo">
									<label>Titulo del Servicio:</label>
									<?php echo form_input( $data_servicio_titulo ); ?>
								</div>
							</div>
							
							<div class="col -md-9">
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
				</div>
				
				
				
			</div>
		</div>
	</div>
</div>