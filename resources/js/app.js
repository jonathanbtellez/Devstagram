// Library to charge files
import Dropzone from 'dropzone';

// Desactivate the default behavior
Dropzone.autoDiscover = false;

// Image manager config
const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Sube tu imagen aqui',
    acceptedFiles: '.png, .jpg, .jpeg, .git',
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar archivo',
    maxFiles: 1,
    uploadMultiple: false,
    init: function(){
        if (document.querySelector('[name="image"]').value.trim()) {
            const imageUploaded = {}
            imageUploaded.size = 1234;
            imageUploaded.name = document.querySelector('[name="image"]').value;
            this.options.addedfile.call(this, imageUploaded)
            this.options.thumbnail.call(this, imageUploaded, `/uploads/${imageUploaded.name}`)

            dropzone.previewElement.classList.add('dz-success', 'dz-complete')
        }
    }
});

// dropzone.on('sending', function(file, xhr, formData){
//     console.log('====================================');
//     console.log(file);
//     console.log('====================================');
// });

dropzone.on('success', (file, response) => {
    console.log(response.image);
    document.querySelector('[name="image"]').value = response.image
});

// dropzone.on('error',(file, message)=>{
//     console.log('====================================');
//     console.log(message);
//     console.log('====================================');
// });

dropzone.on('removedfile', () => {
    document.querySelector('[name="image"]').value = "";
});