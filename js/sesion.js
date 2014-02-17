var xmlHTTP;

	function iniciar () {
		
		if (window.XMLHttpRequest) {
			xmlHTTP=new XMLHttpRequest();
		}else{
			xmlHTTP=new ActiveXObject("Microsoft.XMLHTTP");
		}
	}

	function iniciarSesion(){
		iniciar();
		console.log('validar');
		var user= $('#user').val();
		var password= $('#password').val();
		xmlHTTP.onreadystatechange=function(){
			 if (xmlHTTP.readyState==4 && xmlHTTP.status==200) {
			 	var res = xmlHTTP.responseText
			 	
			 	if(res=="main"){
			 		location.href='main.php';
			 	}
			 	if(res=="login"){
			 		$('#update').html("Usuario/e-mail o password estan errados porfavor intente nuevamente");
			 	}
			  }
			}
		xmlHTTP.open("POST", "./php/login_action.php", true);
		xmlHTTP.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		xmlHTTP.send("user="+user+"&&password="+password);
	}

	function cerrarSesion() {
		iniciar();
		console.log('cerrando sesion');
		var user= $('#user').val();
		
		xmlHTTP.onreadystatechange=function(){
			 if (xmlHTTP.readyState==4 && xmlHTTP.status==200) {
			 	var res = xmlHTTP.responseText
			 	console.log(res);
			 	if (res=="logout") {
			 		location.href='login.html';
			 	}
			 	if (res=="error") {
			 		console.log('algo salio mal');
			 	}
			  }
			}
		xmlHTTP.open("POST", "./php/logout_action.php", true);
		xmlHTTP.send();
	}

	function validarSesion() {
		var user=$('#user').val();
		console.log(user);
		if (!user || user.length === 0) {
			alert("Usted no ha iniciado sesion y sera redirigido a la pagina de iniciar sesion");
			location.href='login.html';
		}
	}