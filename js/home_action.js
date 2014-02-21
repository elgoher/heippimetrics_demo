window.onload=function(){
	//se valida si algun usuario se ha loguiado, esta funcion se encuentra en sesion.js
        $('.bienvenida').append(sessionStorage.getItem("dato"));
        $('.user').val(sessionStorage.getItem("dato"));
        validarSesion();


        /*var url="js/"+sessionStorage.getItem("dato")+".json";
		$.getJSON(url, function successCallback (response){
                $('.user').val(response.user);
        }); */     
}

$( document ).on("ready",function() {

	//se cierra la sesion, esta funcion esta en sesion.js
		$(".cerrar_sesion").click(function(event) {
            cerrarSesion();
        });

        $(".crear_player").click(function(event) {
        	$(".contenido").load('player/register_player.html');
            
        });

        $(".modificar_player").click(function(event) {
            
        });

         $(".eliminar_player").click(function(event) {
            
        });

          $(".listar_player").click(function(event) {
            
        });

});
