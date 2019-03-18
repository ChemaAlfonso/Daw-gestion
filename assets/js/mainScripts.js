/**********************************
  Localizacion y parametros de url 
 **********************************/

var url = window.location;
var searchParams = url.search;

/****************************
     Borrado de filas
 ****************************/

/* Selector de borradores */
var borradores = document.querySelectorAll('.borrado');

/* Si hay borradores los seleccionamos */
if ( borradores )
{
    for (var borrador of borradores){
    
        borrador.addEventListener('click', function(e){
            e.preventDefault();

            if (searchParams == '?route=PROV'){
                BorrarProveedor(e);
            } else {
                BorrarGeneral(e);
            }
            
        });
    
    }
} 

/****************************
     Funciones de borrado 
 ****************************/

function BorrarProveedor(e){
        swal({
            title: "Atencion!!",
            text: "Se borraran todos los productos asociados a este proveedor!",
            icon: "warning",
            buttons: true,
            dangerMode: true
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("Poof! el registro ha sido borrado!", {
                icon: "success",
                });

                window.setTimeout(function(){

                    //Validacion de navegadores
                    if ( es_edge() ){
                        
                        window.location = e.target.href;

                    } else if( es_firefox() ) {
                        window.location = e.originalTarget.href;
                        
                    } else {
                        
                        window.location = e.toElement.href;
                            
                    }

                },800);

            } else {
                swal("Tranquilo, tus datos estan a salvo!");
            }
        });
}

function BorrarGeneral(e){
    swal({
        title: "¿ Estas seguro ?",
        text: "Una vez borrado no se podrá volver a recuperar!",
        icon: "warning",
        buttons: true,
        dangerMode: true
    })
    .then((willDelete) => {
        if (willDelete) {
            swal("Poof! el registro ha sido borrado!", {
            icon: "success",
            });

            window.setTimeout(function(){

                //Validacion de navegadores
                if ( es_edge() ){
                    
                    window.location = e.target.href;

                } else if( es_firefox() ) {
                    window.location = e.originalTarget.href;
                    
                } else {
                    
                    window.location = e.toElement.href;
                        
                }

            },800);

        } else {
            swal("Tranquilo, tus datos estan a salvo!");
        }
    });
}

/****************************
       Compatibilidad
 ****************************/

function es_edge(){

    var es_edge = navigator.userAgent.toLowerCase().indexOf('edge') > -1 && navigator.userAgent.toLowerCase().indexOf('chrome') > -1;

    if(es_edge){
        return true;
    }

    return false;
}

function es_firefox(){

    var es_firefox = navigator.userAgent.toLowerCase().indexOf('firefox') > -1;

    if(es_firefox){
        return true;
    }

    return false;
}

function es_chrome(){

    var es_chrome = navigator.userAgent.toLowerCase().indexOf('chrome') > -1;

    if(es_chrome){
        return true;
    }

    return false;
}