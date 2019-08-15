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





// habilitar boton pausa y control de video Backgroudn
function videoControl(video, btnPlay, btPausa){
	var vid = document.getElementById(video);
	var playBtn = document.querySelector(btnPlay);
	var pauseBtn = document.querySelector(btPausa);
	
	if (window.matchMedia('(prefers-reduced-motion)').matches) {
		vid.removeAttribute("autoplay");
		vid.pause();
		playBtn.removeClass('dnone').removeClass('op0');
		pauseBtn.addClass('dnone').addClass('op0');
		//pauseBtn.innerHTML = "Paused";
	}
	
	function vidFade() {
		vid.classList.add("stopfade");
	}
	
	vid.addEventListener('ended', function(){
		// only functional if "loop" is removed 
		vid.pause();
		// to capture IE10
		vidFade();
	});
	
	
	function vidAction(){
		vid.classList.toggle("stopfade");
		if (vid.paused) {
			vid.play();
			playBtn.addClass('op0');
			(function(){
				playBtn.addClass('dnone');
			}).delay(100);
			pauseBtn.removeClass('dnone').removeClass('op0');
		} else {
			vid.pause();
			pauseBtn.addClass('op0');
			(function(){
				pauseBtn.addClass('dnone');
			}).delay(100);
			playBtn.removeClass('dnone').removeClass('op0');
		}
	}
	
	
	playBtn.addEventListener("click", vidAction);
	pauseBtn.addEventListener("click", vidAction);
}
	


















//--- Seccion de FUNCIONES: _____________________________________________________________________________________

//::::::::::::::::::::::::
// ***** HOME *****//
function home_inicio(){
	var slider = tns({
		container: '#clientes .slideItems',
		items: 2,
		axis:'vertical',
		nav:false,
		speed: 300,
		controls:false,
		prevButton:'#clientes .slideMain .btnSlideBack',
		nextButton:'#clientes .slideMain .btnSlideNext',
		responsive: {
			780: {
				edgePadding: 20,
				items: 1,
				controls:true,
				autoplay: false
			},
			900: {
				items: 2
			}
		}
	});
	
	var sliderNosotros = tns({
		container: '#nosotros .slideItems',
		items: 1,
		nav:false,
		speed: 300,
		prevButton:'#nosotros .slideMain .btnSlideBack',
		nextButton:'#nosotros .slideMain .btnSlideNext',
		responsive: {
			780: {
				items: 2,
				autoplay:false
			},
			1023: {
				items: 4
			}
		}
	});

	var resizeTimer;
	window.addEventListener('resize', function () {
		clearTimeout(resizeTimer);
		resizeTimer = setTimeout(function () {
			slider.refresh();
			sliderNosotros.refresh();
		}, 100);
	});

}

function descargar_vcard(){
	console.info('Hiciste click en descargar vCard');
}








//::::::::::::::::::::::::
// ***** header *****//
idagl.menu = 'off';
function header_run(){
	var btnMenu = document.id('btnMenu');
	var btnMenuClose = document.id('menuItemClose');
	var menu = document.id('menuItems');
	
	function menuActive(){
		if(idagl.menu === 'off'){
			idagl.menu = 'on';
			menu.removeClass('dnone');
			(function(){
				menu.addClass('activo');
			}).delay(10);
		} else{
			idagl.menu = 'off';
			menu.removeClass('activo');
			(function(){
				menu.addClass('dnone');
			}).delay(300);
		}
	}
	
	btnMenu.addEvent('click', menuActive);
	btnMenuClose.addEvent('click', menuActive);
}











//::::::::::::::::::::::::
// ***** Portafolio *****//
function portafolio_inicio(){
	var slider = tns({
		container: '#portafolios .slideItems',
		items: 1,
		controls:false,
		nav:true,
		speed: 300,
		navContainer:'#portafolios .mboxD_in #navSlide .centro',
		autoHeight: true,
		disable:true,
		axis:'vertical',
		responsive: {
			780: {
				item: 1,
				disable:false
			}
		}
	});
	

	var resizeTimer;
	window.addEventListener('resize', function () {
		clearTimeout(resizeTimer);
		resizeTimer = setTimeout(function () {
			var activo = slider.getInfo();
			if(activo.sheet.disabled = false){
				slider.refresh();
			}
		}, 100);
	});

}














//::::::::::::::::::::::::
// ***** Servicios *****//
function servicio_inicio(){
	//videoControl("bgvid", "#servicios .btnPlay",  "#servicios .btnPlayPause");
}
















//::::::::::::::::::::::::
// ***** Portafolio Interior *****//
function portafolio_in_inicio(){
	//videoControl("bgvid", "#portafolio_video .btnPlay", "#portafolio_video .btnPlayPause");
	
	var slider = tns({
		container: '#portafolio_main .slideItems',
		items: 2,
		controls:true,
		nav:false,
		autoplay: true,
		"autoplayText": ["▶", "❚❚" ],
		prevButton:'#portafolio_main .slideMain .btnSlideBack',
		nextButton:'#portafolio_main .slideMain .btnSlideNext',
		responsive: {
			825: {
				items: 3,
				autoplay: false
			}
		}
	});

	var resizeTimer;
	window.addEventListener('resize', function () {
		clearTimeout(resizeTimer);
		resizeTimer = setTimeout(function () {
			slider.refresh();
		}, 100);
	});
	
}















//::::::::::::::::::::::::
// ***** Servicios Interior *****//
function servicios_in_inicio(){
/*
	var slider = tns({
		container: '#servicios_galeria .slideItems',
		items: 1,
		controls:false,
		nav:true,
		speed: 300,
		navContainer:'#servicios_galeria .mboxD_in',
		autoHeight: false,
		disable:false,
		responsive: {
			780: {
				item: 1,
				disable:false
			}
		}
	});
*/
	var slider = tns({
		container: '#servicios_galeria .slideItems',
		items: 1,
		nav:false,
		speed: 300,
		prevButton:'#servicios_galeria .mboxD_in .btnSlideBack',
		nextButton:'#servicios_galeria .mboxD_in .btnSlideNext',
		responsive: {
			780: {
				items: 1,
				autoplay:false
			},
			1023: {
				items: 1
			}
		}
	});
		
		//videoControl("bgvid", "#servicios_video .btnPlay", "#servicios_video .btnPlayPause");
	
/*
	var slider = tns({
		container: '#portafolio_main .slideItems',
		items: 3,
		controls:true,
		nav:false,
		prevButton:'#portafolio_main .slideMain .btnSlideBack',
		nextButton:'#portafolio_main .slideMain .btnSlideNext',
		responsive: {
			825: {
				items: 3
			}
		}
	});

	var resizeTimer;
	window.addEventListener('resize', function () {
		clearTimeout(resizeTimer);
		resizeTimer = setTimeout(function () {
			slider.refresh();
		}, 100);
	});
*/
	
}



















//::::::::::::::::::::::::
// ***** Footer *****//
function footer_run(){
	//Funcion que se ejecuta antes de enviar los datos.
	idagl.ocupado = false;
	idagl.seguros = {};
	function sendAll(){
		idagl.seguros.msnManual = '';
		var datos = {};
		
		function condicion_siguiente(){
			var status = true;
			
			idagl.seguros.arrayAll = $$('#footerContactoForm *[data-validar]');
			status = idagl.seguros.arrayAll.every(function(item){
				return item.idago.validado === true;
			});
			if(status === false){ idagl.seguros.msnManual += 'Todos los campos son obligatorios.\r\n\r\n'; }
				
			return status;
		}	
		
		
		
		
		if(condicion_siguiente()){
			idagl.ocupado = true;
			
			var datos = new FormData(document.id('footerContactoForm'));
						
			function limpiar(j){
				if(j.status == "ok"){
					swal('', 'Se envio su mensaje con exito', 'success');
					//alert("El registro fue guardado con exito");
					idagl.ocupado = false;
					document.id('footerContactoForm').reset();
					//location.reload();
				} else{
					
				}
			}
			
			function error(j){
				swal('', 'Se produjo un error al ingresar el registro, póngase en contacto con su área de sistemas.', 'warning');
				console.info(j.errores);
				idagl.ocupado = false;
			}
			
			
			
			// Set up the request.
			var xhr = new XMLHttpRequest();
			
			// Open the connection.
			//xhr.open('POST', window.location.pathname+'/do_upload', true);
			xhr.open('POST', baseDir+"ajax/footerForm", true);
			
			// Set up a handler for when the request finishes.
			xhr.onload = function () {
				console.info(xhr);
				var j = JSON.parse(xhr.response);
				if (xhr.status === 200) {
					if(j.status === "ok"){
						limpiar(j);
					} else{
						error(j);
					}
				} else {
					alert('An error occurred!');
				}
			};
			
			// Send the Data.
			xhr.send(datos);
			//db_conectE(baseDir+"ajax/footerForm", datos, limpiar, error );
		
			
		} else{
			idagl.ocupado = false;
			alert(idagl.seguros.msnManual);
		}
	}
	
	
	function sendIntervencion(){
		if(idagl.ocupado == true){ return false; }
		sendAll();
		return false;
	}
	
	
	//Validacion de formulario:
	idaglGV_def.msn.validar.send.novalid = "Alguno de los campos tiene un error o está incompleto.\n\nFavor de verificar su información.";
	idaglGV_def.msn.validar.nulo = 'Este campo es obligatorio y debe contener datos, por favor capture la información correspondiente.\n\nverifique por favor.';
	
	var ml1 = [];
	
	ml1[0] = {
		objeto: 'texto',
		validar: {
			parametro: 'texto'
		},
	/*
		funciones: {
			nombre: 'mayusculas'
		},
	*/
		nulo: {
			status: false,
			valores: {
				//adicionales_c: true
			}
		}
	};
	
	ml1[2] = {
		objeto: 'correo',
		validar: {
			parametro: 'correo',
			error: 'El Correo Electrónico que ingresó no es válido. \n\nFavor de verificarlo.'
		},
		nulo: {
			status: false
		}
	};
	
	ml1[3] = {
		objeto: 'telefono',
		validar: {
			parametro: 'limite',
			valor: {
				unico: 10,
				invertir: true
			},
			error: 'El Número de Teléfono que ingresó está incompleto. \nFavor de ingresar los 10 dígitos de su número incluyendo lada'
		},
		funciones: [{
			nombre: 'solonumerico'
		}/*
	, {
			nombre: 'autotexto',
			valor: '10 digitos con Lada...'
		}
	*/]
	};
	
	
	
	idaV_inicio({
		formulario: 'footerContactoForm',
		lista: ml1,
		intervencion: sendIntervencion
	});
	
	
	var contactBtn = document.id('footerBtnEnviar');
	contactBtn.addEvent('click', function(){
		sendIntervencion();
		//document.getElementById("footerContactoForm").submit();
	});
}









//--- Eventos a ejecutar cuando el DOM este listo _____________________________________________________________________________________
window.addEvent('domready', function(){
	if(typeof pageActual !== 'undefined'){
		if(pageActual !== ''){
			switch(pageActual){
				case 'home':
					home_inicio();
				break;
				
				case 'portafolio':
					portafolio_inicio();
				break;
				
				case 'servicios':
					servicio_inicio();
				break;
				
				case 'portafolio_in':
					portafolio_in_inicio();
				break;
				
				case 'servicios_in':
					servicios_in_inicio();
				break;
			}
		}
	}
	
	header_run();
	footer_run();
});


//--- Eventos a ejecutar cuando la pagina este cargada _____________________________________________________________________________________
window.addEvent('load', function(){
	
});








