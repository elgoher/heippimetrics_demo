    var cronometro;

    function carga()
    {

        var segundos = 0;

        var minutos  = 5;
 
        $(".minutos").html('0'+minutos);  

        cronometro = setInterval(

            function(){

                if(segundos==0)
                {

                    segundos=59;

                    minutos--;

                    if (minutos<10) {
                        $(".minutos").html('0'+minutos);  
                    }
                    else{
                        $(".minutos").html(minutos);
                    }                  
                }
                segundos--;
                
                if (segundos < 10) {
                    $(".segundos").html(': 0'+segundos);    
                }
                else{
                    $(".segundos").html(': '+segundos);
                }
                

                if (minutos==0 & segundos==0) {
                     
                    console.log("Lo sentimos, ha llegado al limite de tiempo ... Muchas Gracias !");

                    finalizartodo();
                }
            },1000
        );
    }