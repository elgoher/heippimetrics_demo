
$('.on-captura').on('click', function(e){

    $('.on-captura').css({"display":"none"});
            
    $('.off-captura').css({"display":"inherit"})

    carga();

    runCamera();
    pintarImagen();
   // var activador = setTimeout( 

   //      function(){
   //          console.log("activando pintarImagen ...");
   //          pintarImagen();
   //      },1000
   //  )

   // clearInterval(activador);
    
});

     
$('.off-captura').on('click', function(e){

    finalizartodo();

 });

function finalizartodo(){
           
    clearInterval(capture);
            
    clearInterval(returnimg);

    clearInterval(cronometro);

    clearInterval(imagenesretornadas);  

    if(datosVideo.StreamVideo){

        datosVideo.StreamVideo.stop();

        window.URL.revokeObjectURL(datosVideo.url);
	}

    $('.on-captura').css({"display":"inherit"});
            
    $('.off-captura').css({"display":"none"})
            
    $('#procesado').attr("src","img/nosignal.gif");

    $('#webcam').attr("poster","img/nosignal.gif");
           
    
}