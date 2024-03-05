

    var acordion = document.getElementsByClassName("contenido");

    for(let i=0; i<acordion.length; i++){
        acordion[i].addEventListener("click",function(){
            this.classList.toggle('active');
    });
    }

    // Agregar script para mostrar el modal después de enviar el formulario
    document.getElementById('evaluationForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Evitar que el formulario se envíe normalmente
        $('#confirmationModal').modal('show'); // Mostrar el modal
    });

    