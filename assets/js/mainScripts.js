var borradores = document.querySelectorAll('.borrado');



if ( borradores )
{
    for (var borrador of borradores){
    
    borrador.addEventListener('click', function(e){
        e.preventDefault();

        /*******************
        console.log(borrador);
        Siempre Borra ultimo
         registro        
        ******************* */
        
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
                window.location = borrador.href;

            },800);

        } else {
            swal("Tranquilo, tu archivo esta a salvo!");
        }
        });
    });
    
    }
} 