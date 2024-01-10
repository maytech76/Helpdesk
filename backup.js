/* Efectuar respaldo de Base de datos */


document.addEventListener("DOMContentLoaded", function() {
    const button = document.getElementById("backup");

    button.addEventListener("click", function() {
        // Hacer una solicitud al servidor para realizar el respaldo
        fetch('run_backup.php')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Respaldo Exitoso',
                        showConfirmButton: false,
                        text: 'La base de datos se ha respaldado correctamente.',
                        timer: 1500
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Hubo un error al intentar respaldar la base de datos.'
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
});




document.getElementById('import_backup').addEventListener('click', function() {
    const input = document.createElement('input');
    input.type = 'file';
    input.accept = '.sql'; // Asegúrate de permitir solo archivos SQL si es necesario.

    input.addEventListener('change', function() {
        const selectedFile = input.files[0];
        if (selectedFile) {
            const filePath = selectedFile.name;
            alert('Seleciona el origen del archivo SQL: ' + filePath);
        }
    });

    input.click();
});
