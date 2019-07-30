var idagl = {};

//Seccion de VARIABLES: _____________________________________________________________________________________
idagl.elementos = {};







//Seccion de ATAJOS: _____________________________________________________________________________________
var id = idagl;
var el = id.elementos;







//Seccion de Funciones Globales: _____________________________________________________________________________________
//Funcion general de consultas externas.
function db_conectE(url, datos, f, e){
	new Request.JSON({
		method:'post',
		url:url,
		secure:false,
		onError:function(er){
			if(typeOf(e) === 'function'){ e(er); }
			console.warn(er);
			alert("Ocurrio un problema al guardar su informacion, intentelo mas tarde");
			
		},
		onFailure:function(xhr){
			if(typeOf(e) === 'function'){ f(xhr); }
			console.warn(xhr);
			alert("Ocurrio un problema al guardar su informacion, intentelo mas tarde");
			
		},
		onSuccess:function(j){
			if(j){
				if(j.status == 'ok'){
					if(typeOf(f) === 'function'){ f(j); }
				} else{
					if(typeOf(e) === 'function'){ e(j); }
					console.warn(j);
					alert("Ocurrio un problema al guardar su informacion, intentelo mas tarde");
				}
			} else{
				if(typeOf(e) === 'function'){ e(j); }
				console.warn(j);
				alert("Ocurrio un problema con su consulta, intentelo mas tarde");
			}
		}
	}).post('datos='+ JSON.encode(datos));
}








//--- Seccion de FUNCIONES: _____________________________________________________________________________________

// Funcion del controlador Load CSV
function bs_input_file() {
	$(".input-file").before(
		function() {
			if ( ! $(this).prev().hasClass('input-ghost') ) {
				var element = $("<input type='file' name='FileCSV' class='input-ghost' style='visibility:hidden; height:0'>");
				//element.attr("name",$(this).attr("name"));
				element.change(function(){
					element.next(element).find('input').val((element.val()).split('\\').pop());
				});
				$(this).find("button.btn-choose").click(function(){
					element.click();
				});
				$(this).find("button.btn-reset").click(function(){
					element.val(null);
					$(this).parents(".input-file").find('input').val('');
				});
				$(this).find('input').css("cursor","pointer");
				$(this).find('input').mousedown(function() {
					$(this).parents('.input-file').prev().click();
					return false;
				});
				return element;
			}
		}
	);
}





// Funcion del controlador Carga de documentos
function activeFalseBTN(){
	var btns = $$('.input-file');
		
	btns.each(function(b){
		var parent = b.getParent();
		var text = b.getElement('.form-control');
		var btn = b.getElement('.input-group-btn');
		var input = document.id('doc'+b.getProperty('name'));
		
		b.addEvent('click', function(e){
			e.stop();
		});
		text.addEvent('click', function(e){
			e.stop();
			this.blur();
			var p = this.getParent().getProperty('name');
			document.id('doc'+p).focus();
			document.id('doc'+p).click();
		});
		btn.addEvent('click', function(e){
			e.stop();
			var p = this.getParent().getProperty('name');
			document.id('doc'+p).click();
		});
		
		input.addEvent('change', function(e){
			var blok = this.value.split('\\');
			var val = blok[(blok.length)-1];
			var p = this.getParent();
			var input = p.getElement('input[type="text"]');
			input.value = val;
		})
		
	});
}






//::::::::::::::::::::::::
// ***** Funcio  para el proceso de los documentos de validacion *****//
if(typeof pageActual !== 'undefined'){
	if(pageActual !== '' && pageActual == 'validador'){
		// ***. INICIO connstructor de motivos
/*
		var motivos = new Element('select', {'class':'selectMotivos', 'date-style':'btn-default btn-block', 'data-menu-style':'dropdown-blue'});
		arrayMotivos.each(function(m){
			var opcion = new Element('option', {'value':m.cat_resp_valor, 'text':m.cat_resp_valor});
			motivos.adopt([opcion]);
		});
		
		var boxMotivos = new Element('div', {'id':'boxMotivos', 'class':'motivos'});
		var boxMotivosSelec = new Element('div', {'class':'motivosSelec'});
			var btnMenos = new Element('div', {'class':'btnMenos', 'text':'-'});
			btnMenos.addEvent('click', function(){
				var padre = this.getParent();
				padre.destroy();
			});
			boxMotivosSelec.adopt([motivos, btnMenos]);
		var boxMotivosMas = new Element('div', {'class':'motivosMas', 'text':'Agregar Motivo: '});
			var btnMas = new Element('div', {'class':'btnMas', 'text':'+'});
			btnMas.addEvent('click', function(){
				var myClone = boxMotivosSelec.clone();
				var btnMenosC = myClone.getElement('.btnMenos');
				btnMenosC.addEvent('click', function(){
					var padre = this.getParent();
					padre.destroy();
				});
				document.id('boxMotivos').adopt([myClone]);
			});
		boxMotivosMas.adopt([btnMas]);
		boxMotivos.adopt([boxMotivosMas]);
*/
		// ***. FIN connstructor de motivos
		
		
		idagl.globaBox = document.id('box_files');
		idagl.globaBoxCom = document.id('comentarios');
		var gb = idagl.globaBox;
		var gbc = idagl.globaBoxCom;
	
		idagl.leadActivo = {};
		idagl.leadActivo.actual = "";
	
		var motivosStatus = false;
		
		idagl.fileActivo = {};
		idagl.fileActivo.actual = "";
	}
}


function makeMotivo(){
	var motivos = new Element('select', {'class':'selectMotivos', 'date-style':'btn-default btn-block', 'data-menu-style':'dropdown-blue'});
	arrayMotivos.each(function(m){
		var opcion = new Element('option', {'value':m.cat_resp_valor, 'text':m.cat_resp_valor});
		motivos.adopt([opcion]);
	});
	
	var boxMotivos = new Element('div', {'class':'motivos'});
	var boxMotivosSelec = new Element('div', {'class':'motivosSelec'});
		var btnMenos = new Element('div', {'class':'btnMenos', 'text':'-'});
		btnMenos.addEvent('click', function(){
			var padre = this.getParent();
			padre.destroy();
		});
		boxMotivosSelec.adopt([motivos, btnMenos]);
	var boxMotivosMas = new Element('div', {'class':'motivosMas', 'text':'Agregar Motivo: '});
		var btnMas = new Element('div', {'class':'btnMas', 'text':'+'});
		btnMas.addEvent('click', function(){
			var myClone = boxMotivosSelec.clone();
			var btnMenosC = myClone.getElement('.btnMenos');
			btnMenosC.addEvent('click', function(){
				var padre = this.getParent();
				padre.destroy();
			});
			this.getParent().getParent().adopt([myClone]);
		});
	boxMotivosMas.adopt([btnMas]);
	boxMotivos.adopt([boxMotivosMas]);
	
	return boxMotivos;
}


function seguir(lead){
	if(idagl.leadActivo.actual !== lead){
		if(idagl.leadActivo.actual !== ""){
			document.id(idagl.leadActivo.actual).removeClass('activo');
		}
		
		document.id(lead).addClass('activo');
		idagl.leadActivo.actual = lead;
		
		return true;
	} else{
		return false;
	}
}


function cleanBox(){
	gb.empty();
	gbc.empty();
}


function tomarRegistros(){
	var leads = $$('#box_listado .lead');
	leads.each(function(l){
		l.idago = arrayFiles[l.id];
		l.addEvent('click', function(){
			if(seguir(this.id)){
				if(idagl.fileActivo.actual !== this.id){
					cleanBox();
					idagl.fileActivo.actual = this.id;
					
					
					this.idago.comentarios.each(function(c){
						var tr = new Element('tr');
							var coment = new Element('td', {'text':c.com_text});
						tr.adopt([coment]);
						gbc.adopt([tr]);
					});
					
					
					var files = this.idago.archivos;
					files.each(function(f, i){
						var card = new Element('div', {'id':'file_'+f.id_archivo, 'class':'effect-milo card card-stats'});
							var card_body = new Element('div', {'class':'card-body documento'});
								var row = new Element('div', {'class':'row'});
									var bl1 = new Element('div', {'class':'col-lg-5 col-sm-3 docImg'});
										var imgURL = f.archivo_ruta +'/'+ f.archivo_nombre;
										var imgURLFinal = imgURL;
										if(f.archivo_extencion == '.pdf'){ imgURLFinal = '../assets/admin/img/pdf_icono.jpg'; }
										
										var enlace = new Element('a', {'href':imgURL, 'target':'_blank'});
											var imagen = new Element('div', {'class':'docImagen'});
											imagen.setStyle('background-image', 'url(' + imgURLFinal + ')');
										enlace.adopt([imagen]);
										
									bl1.adopt([enlace]);
									
									var bl2 = new Element('div', {'class':'col-lg-7 col-sm-9 docInfo'});
										var fcaption = new Element('figcaption');
											var h = new Element('h4', {'text':f.archivo_formato});
											var p = new Element('p', {'html':f.archivo_time + "<br />Peso: " + (f.archivo_peso / 1024).toFixed(2) + " MB<br />Extencion: " + f.archivo_extencion });
											var validado = new Element('div', {'class':'box_val', 'text':'Valido: '});
												var toggle = new Element('input', {
													'type':'checkbox',
													'id':'file'+i,
													'name':'file'+i,
													'data-toggle':'switch',
													'data-on-color':'info',
													'data-off-color':'info',
													'data-on-text':'si',
													'data-off-text':'no',
													'value':'si'
												});
												//toggle.addEvent('change', checkNo);
											validado.adopt([toggle]);
											
										fcaption.adopt([h, p, validado]);
									bl2.adopt([fcaption]);
						
								row.adopt([bl1, bl2]);
								
								var motivos = new Element('div', {'class':'motivosBox'});
								motivos.adopt([makeMotivo()]);
								
							card_body.adopt([row, motivos]);
						card.adopt([card_body]);
						gb.adopt([card]);
						
					})
					if ($("[data-toggle='switch']").length != 0) {
				        $("[data-toggle='switch']").bootstrapSwitch();
				    }
				    
				}
			}
		});
	});
}


function btnProcesar(){
	if(idagl.leadActivo.actual === ""){
		alert("No se ha seleccionado nada a procesar");
		document.id('procesar').disabled = false;
		return false;
	}
	
	document.id('procesar').disabled = true;
	var files = $$("#box_files .card");
	var checks = [];
	var ninguno = false;
	var todos = false;
	var algunos = false;
	var confirmado = true;
	
	
	files.each(function(d){
		checks.push(d.getElement('input[type="checkbox"]'));
	});
	
	ninguno = checks.every(function(c){
		return c.checked === false;
	});
	
	todos = checks.every(function(c){
		return c.checked === true;
	});
	
	algunos = checks.some(function(c){
		return c.checked === true;
	});
	
	if(ninguno === true){
		confirmado = false;
		if(confirm('Ningún documento se a validado, ¿desea proseguir con el procesado de archivos?')){
			confirmado = true;
		} else{
			document.id('procesar').disabled = false;
			return false;
		}
	}
	
		
	var datos = {
		id_lead: idagl.leadActivo.actual.replace('lead_', ''),
		lead_vendor: arrayFiles[idagl.leadActivo.actual].lead_vendor,
		userRFC: arrayFiles[idagl.leadActivo.actual].lead_rfc,
		files:[]
	};
	
	var motivosDeclarados = true;
	files.each(function(f){
		var core = {}
		core.motivos = [];
		core.id = f.id.replace('file_', '');
		core.tipo = f.getElement('h4').get('text');
		
		var togg = f.getElement('input[type="checkbox"]');
		if(togg.checked){
			core.value = 'si';
		} else{
			core.value = 'no';
		}
		
		var useMotivosArray = [];
		var selectsMotivos = f.getElements('.selectMotivos');//$$('#boxMotivos select');
		if(core.value === 'no' && selectsMotivos.length <= 0){ motivosDeclarados = false; }
		
		selectsMotivos.each(function(s){
			core.motivos.push(s.value);
		});
		
		datos.files.push(core);
	});
	if(motivosDeclarados === false){
		document.id('procesar').disabled = false;
		alert('Debe de seleccionar mínimo un motivo de cancelación por cada archivo no aprobado');
		return false;
	}
	
	datos.total = 'si';
	if(todos !== true){
		datos.total = 'no';
	}
	
	function limpiar(j){
		cleanBox();
		document.id(idagl.leadActivo.actual).destroy();
		idagl.leadActivo.actual = "";
		idagl.fileActivo.actual = "";
		document.id('procesar').disabled = false;
		alert('Se proceso correctamente');
	}
	
	function error(j){
		alert("Se produjo un error al ejecutar el proceso, póngase en contacto con su área de sistemas.");
		document.id('procesar').disabled = false;
	}
	
	db_conectE(window.location.pathname+'/procesar', datos, limpiar, error );
	
}








// Pagina Home
function home_inicio(){
	document.id('formulario').addEvent('submit', function(e){
		e.preventDefault();
		e.stop();
		
		validar();
	});
	
	var pGlobalServicio = document.id('servicios');
	var pServicio = pGlobalServicio.getElement('.contentServicio');
	var base = document.id('servicio_base');
	
	
	function reconteo(){
		var servicios = $$('#servicios .servicio');
		
		servicios.each(function(s, i){
			var header = s.getElement('.valNum').empty();
			var foto = s.getElement('.servicio_foto').getElement('input');
			var titulo = s.getElement('.servicio_titulo').getElement('input');
			var texto = s.getElement('.servicio_texto').getElement('textarea');
			var enlace = s.getElement('.servicio_enlace').getElement('input');
			
			header.set('text', i+1);
			foto.name = "servicios[servicio]["+i+"][icono]";
			titulo.name = "servicios[servicio]["+i+"][titulo]";
			texto.name = "servicios[servicio]["+i+"][texto]";
			enlace.name = "servicios[servicio]["+i+"][enlace]";
		});
	}
	
	function btnMas(){
		var clone = base.clone();
		pServicio.adopt([clone]);
		activar(clone);
	}
	
	function btnMenos(){
		var cajonPadre = this.getParent().getParent().getParent();
		cajonPadre.destroy();
		reconteo();
	}
	
	document.id('servicio_clonemas').addEvent('click', btnMas);
	
	var activar = function(copia){
		var btn_menos = copia.getElement(".menos");
		btn_menos.addEvent('click', btnMenos);
		
		reconteo();
	}
	
	//activar(base);
	
	
	
	
	
	// funciones para validar y enviar el formulario
	//validar
	
	function validar(){
/*
		var files = document.id('fotofile').files;
		console.info(files);
		
		var file = files[0];
		console.info(file);
*/
		
		var datos = new FormData(document.id('formulario'));
		//console.info(datos);
		
		//datos.append('userfile', file, file.name);
		//datos.append('userfile', file, file.name);
/*
		for (var key of datos.entries()) {
			console.log(key[0] + ', ' + key[1]);
			console.info(key[1]);
		}
*/
		
		function limpiar(j){
			console.info(j);
		}
		
		function error(j){
			//console.info(j);
		}
		
		
		// Set up the request.
		var xhr = new XMLHttpRequest();
		
		// Open the connection.
		xhr.open('POST', window.location.pathname+'/do_upload', true);
		
		// Set up a handler for when the request finishes.
		xhr.onload = function () {
			if (xhr.status === 200) {
				// File(s) uploaded.
				//uploadButton.innerHTML = 'Upload';
				console.info('se envio');
			} else {
				alert('An error occurred!');
			}
		};
		
		// Send the Data.
		xhr.send(datos);
		
		//db_conectE(window.location.pathname+'/do_upload', datos, limpiar, error );
		//document.id('formulario').send();
/*
		var datos = {};
		
		//Recopilar la informacion del formulario.
		var servicios = $$('#servicios .servicio');
		
		datos.servicios = [];
		servicios.each(function(s, i){
			var foto = s.getElement('.servicio_foto').getElement('input');
			var titulo = s.getElement('.servicio_titulo').getElement('input');
			var texto = s.getElement('.servicio_texto').getElement('textarea');
			var enlace = s.getElement('.servicio_enlace').getElement('input');
			
			var servicio = {
				'foto':foto.value,
				'titulo':titulo.value,
				'texto':texto.value,
				'enlace':enlace.value
			}
			
			datos.servicios.push(servicio);
		});
		
		
		function limpiar(j){
			console.info(j);
		}
		
		function error(j){
			//console.info(j);
		}
		
		db_conectE(window.location.pathname+'/send', datos, limpiar, error );
*/	}

}









//--- Eventos a ejecutar cuando el DOM este listo _____________________________________________________________________________________
window.addEvent('domready', function(){
	if(typeof pageActual !== 'undefined'){
		if(pageActual !== ''){
			switch(pageActual){
				case 'load_csv':
					bs_input_file();
				break;
				
				case 'cargaArchivos':
					activeFalseBTN();
				break;
				
				case 'validador':
					tomarRegistros();
					document.id('procesar').addEvent('click', btnProcesar);
				break;
				
				case 'home':
					home_inicio();
				break;

			}
		}
	}
});


//--- Eventos a ejecutar cuando la pagina este cargada _____________________________________________________________________________________
window.addEvent('load', function(){
	
});








