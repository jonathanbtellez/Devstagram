// Library to charge files
import Dropzone from 'dropzone';

// Desactivate the default behavior
Dropzone.autoDiscover = false;


const dropzone = new Dropzone('#dropzone',{
    dictDefaultMessage: 'Sube tu imagen aqui',
    acceptedFiles: '.png, .jpg, .jpeg, .git',
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar archivo',
    maxFiles: 1,
    uploadMultiple: false
} );

// dropzone.on('sending', function(file, xhr, formData){
//     console.log('====================================');
//     console.log(file);
//     console.log('====================================');
// });

dropzone.on('success',(file, response)=>{
    console.log(response.image);
    document.querySelector('[name="image"]').value = response.image
});

// dropzone.on('error',(file, message)=>{
//     console.log('====================================');
//     console.log(message);
//     console.log('====================================');
// });

dropzone.on('removedfile',()=>{
    console.log('====================================');
    console.log('file deleted');
    console.log('====================================');
});