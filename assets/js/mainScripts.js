
/* Localizacion y parametro de url */
const url = window.location;
const searchParams = url.search;

/* Borrado de elementos */
var borradores = document.querySelectorAll('.borrado');

/* Si hay elementos los seleccionamos */
if ( borradores )
{
    for (var borrador of borradores){
    
        borrador.addEventListener('click', function(e){
            e.preventDefault();

            if (searchParams == '?PROV=true'){
                BorrarProveedor(e);
            } else {
                BorrarGeneral(e)
            }
            
        });
    
    }
} 

/* Funciones de borrado */
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
                    window.location = e.originalTarget.href;
                },800);

            } else {
                swal("Tranquilo, tu registro esta a salvo!");
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
                window.location = e.originalTarget.href;
            },800);

        } else {
            swal("Tranquilo, tu registro esta a salvo!");
        }
    });
}