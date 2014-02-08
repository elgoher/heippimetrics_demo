 
        var step = 0;

        console.log("Iniciando Analisis de Observadores...");

        var newObservers = 0;

        var presentObservers = 0;

        var total =0;

        var numero=0;
    
        var totalAnterior=0
        

        function Observadores(){

            $.ajax({
              
                url: "data/dataHeippi.json",
              
                type: "GET",
              
                dataType: "json",
              
                success: function(source){

                    audiencie = source.audiencie;
                    
                    $("#observadores").html(audiencie);

                    newObservers = audiencie;

                    numero =  newObservers ;
                    console.log("total : "+total);
                    
                    if (newObservers >presentObservers) {

                        total = numero + totalAnterior;

                        presentObservers = newObservers;
                    }

                    if (newObservers == 0) {

                        presentObservers = 0;
                     
                        numero = 0;

                        totalAnterior = total;
                    }
                    
                    $("#total").html(total);


                },
                error: function(result){
                  
                    console.log("Error : Peticion fallida analisis en tiempo real ...")
                  
                    console.log(result);
                }
            });
         };