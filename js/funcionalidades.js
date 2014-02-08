
function enviar(form){

	switch(form)
	{
	case 'opinion':
	    if (validarCampoVacio()) {
		    enviarOpinion();
	    };
	    break;
	case 'contacto':
	  	if (validarCampoVacio()) {
		    enviarContacto();
	    };
	  break;
	
	}
}

function validarCampoVacio(){
	var cont =0;
	var result= false
        $(".formulario ul li input").each(function (index) {
              
            if ($(this).val()=="") {
                	cont = index + 1;
                	$(this).css({"border":"1px solid red"});
            };
        })
        if (cont>=1) {
            result= false;
            
        }
        else{
           result = true;
        }
    return result;
      
}

function restaurarCampos(){
	
        $(".formulario ul li input").each(function (index) {
        	$(this)[0].value ="";
            $(this).css({"border":"1px solid #ccc"});
        });
        document.getElementsByName("Mensaje")[0].value="";
         
}

function enviarOpinion() {

   
	$.ajax({
	    url:"backend_send.php?parametro=opinion",
	    type:"POST",
	    data:{
		    Name:document.getElementsByName("nombre")[0].value,
		    Email:document.getElementsByName("email")[0].value,
		    Asunto:"Nueva Opini¨®n de Heippi",
		    Comentario:document.getElementsByName("Mensaje")[0].value,
		    Suscripcion:$("input:radio[name='si-subscribir']:checked").val()
		},
		success:function(mensaje) {
		    
		    restaurarCampos();
		    alert(mensaje);
		    
		},
		error:function(mensaje)
		{ 
			console.log('Se produjo un fallo en el envio de datos, Opinion');
		} 
	})
}

function enviarContacto() {

	
	$.ajax({
	    url:"backend_send.php?parametro=contacto",
	    type:"POST",
	    data:{

		    Name:document.getElementsByName("nombre")[0].value,
		    Email:document.getElementsByName("email")[0].value,
		    Asunto:"Nuevo Contacto en Heippi",
		    Empresa:document.getElementsByName("empresa")[0].value,
		    AsuntoMensaje:document.getElementsByName("asunto")[0].value,
		    Comentario:document.getElementsByName("Mensaje")[0].value
		   
		},
		success:function(mensaje) {
		    
		   restaurarCampos();
		   
		   alert(mensaje);
		},
		error:function(mensaje)
		{ 
			console.log('Se produjo un fallo en el envio de datos, Contacto');
		} 
	})
}