$(document).ready(function() {
    $('#csvFileInput').on('change', function() {
        const fileName = $('#fileName');
        const fileInfo = $('#fileInfo');
        const selectedFileName = $('#selectedFileName');
        const importButton = $('#importButton');

        if (this.files && this.files[0]) {
            const file = this.files[0];
            if (!file.name.toLowerCase().endsWith('.csv')) {
                alert('Por favor, selecciona un archivo CSV válido');
                this.value = '';
                return;
            }
            fileName.text(file.name);
            selectedFileName.text(file.name);
            fileInfo.removeClass('hidden');
            importButton.removeClass('hidden');
        }
    });

    $('#importButton').on('click', function() {
        const fileInput = $('#csvFileInput')[0];
        if (!fileInput.files || !fileInput.files[0]) {
            alert('Por favor, selecciona un archivo CSV primero');
            return;
        }

        const file = fileInput.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            const formData = new FormData();
            formData.append('csv_file', file);

            $.ajax({
                url: '/uploadcsv',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response) {
                    
                    if (response && response.success) {
                        alert('Importación exitosa');
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                    } else {
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                    }
                },
                error: function(xhr, status, error) {
                    console.log('Error:', error);
                    alert('Error al procesar el archivo. Por favor, intenta de nuevo.');
                },
                complete: function() {
                    closeCSVModal();
                }
            });
        };

        reader.readAsText(file);
    });
});

// Funciones del modal
window.showCSVModal = function() {
    $('#csvModal').removeClass('hidden');
};

window.closeCSVModal = function() {
    $('#csvModal').addClass('hidden');
    $('#csvFileInput').val('');
    $('#fileName').text('Seleccionar archivo CSV');
    $('#selectedFileName').text('');
    $('#fileInfo').addClass('hidden');
    $('#importButton').addClass('hidden');
};

window.handleFileSelection = function(input) {
    const fileName = $('#fileName');
    const fileInfo = $('#fileInfo');
    const selectedFileName = $('#selectedFileName');
    const importButton = $('#importButton');

    if (input.files && input.files[0]) {
        const file = input.files[0];
        if (!file.name.toLowerCase().endsWith('.csv')) {
            alert('Por favor, selecciona un archivo CSV válido');
            input.value = '';
            return;
        }
        fileName.text(file.name);
        selectedFileName.text(file.name);
        fileInfo.removeClass('hidden');
        importButton.removeClass('hidden');
    }
};