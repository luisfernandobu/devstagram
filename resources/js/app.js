import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

if(document.querySelector('#dropzone')) {
    const dropzone = new Dropzone('#dropzone', {
        dictDefaultMessage: 'Sube aquí tu imagen',
        acceptedFiles: '.png, .jpg, .jpeg, .gif',
        addRemoveLinks: true,
        dictRemoveFile: 'Eliminar Archivo',
        maxFiles: 1,
        uploadMultiple: false,
        init: function() {
            let sNombreImagen = document.querySelector('[name="image"]').value.trim();
            if(sNombreImagen) {
                const imagenPublicada = {};
                imagenPublicada.size = 1234;
                imagenPublicada.name = sNombreImagen;
    
                this.options.addedfile.call(this, imagenPublicada);
                this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`);
    
                imagenPublicada.previewElement.classList.add('dz-success', 'dz-complete');
            }
        }
    });
    
    dropzone.on('success', function(file, response){
        console.log(response);
        document.querySelector('[name="image"]').value = response.image;
    });
    
    dropzone.on('removedFile', function(){
        document.querySelector('[name="image"]').value = '';
    });
}

const navegacion = document.querySelector('#navbar-dropdown');
const btnNavegacion = document.querySelector('#btnNavegacion');

btnNavegacion.addEventListener('click', function(){
    navegacion.classList.contains('hidden') ? navegacion.classList.remove('hidden') : navegacion.classList.add('hidden');
});
