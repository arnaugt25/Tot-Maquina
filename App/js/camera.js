document.addEventListener('DOMContentLoaded', function() {
    // Seleccionar elementos necesarios (Select required items)
    const mobileMenuButton = document.querySelector('button');
    const mobileMenu = document.querySelector('.md\\:hidden.hidden');

    // Añadir evento click al botón (Add click event to button)
    mobileMenuButton.addEventListener('click', function() {
        // Toggle la clase hidden del menú móvil (Toggle the hidden class of the mobile menu)
        mobileMenu.classList.toggle('hidden');
    });

    // Cerrar menú al hacer click fuera (Close menu when clicking outside)
    document.addEventListener('click', function(event) {
        if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
            mobileMenu.classList.add('hidden');
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    // Elementos del DOM (DOM Elements)
    const cameraButton = document.getElementById('camera-button');
    const cameraModal = document.getElementById('camera-modal');
    const closeModal = document.getElementById('close-modal');
    const video = document.getElementById('camera-feed');
    const captureButton = document.getElementById('capture-button');
    const canvas = document.getElementById('canvas');
    const profileImage = document.querySelector('.profile-image');
    // Configuración de la cámara (Camera Settings)
    const constraints = {
        video: {
            width: { ideal: 1280 },
            height: { ideal: 720 },
            facingMode: "user"
        }
    };
    let stream = null;
    // Función para abrir la cámara (Function to open the camera)
    window.openCamera = async function() {
        try {
            if (!cameraModal || !video) {
                console.error('Elementos de cámara no encontrados');
                return;
            }
            
            stream = await navigator.mediaDevices.getUserMedia(constraints);
            video.srcObject = stream;
            cameraModal.classList.remove('hidden');
        } catch (err) {
            console.error('Error al acceder a la cámara:', err);
            alert('No se pudo acceder a la cámara. Por favor, verifica los permisos.');
        }
    }
    // Función para cerrar la cámara (Function to close the camera)
    window.closeCamera = function() {
        if (stream) {
            stream.getTracks().forEach(track => track.stop());
            video.srcObject = null;
        }
        cameraModal.classList.add('hidden');
    }

    // Función para capturar la foto (Function to capture the photo)
    window.capturePhoto = function() {
        const context = canvas.getContext('2d');
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        context.drawImage(video, 0, 0, canvas.width, canvas.height);

        // Convertir la imagen a blob (Convert image to blob)
        canvas.toBlob(async (blob) => {
            const formData = new FormData();
            formData.append('profile_pic', blob, 'profile-picture.jpg');
            try {
                const response = await fetch('/profile/update', {
                    method: 'POST',
                    body: formData
                });

                if (response.ok) {
                    // Actualizar la imagen de perfil en la página (Update profile picture on page)
                    const imageUrl = URL.createObjectURL(blob);
                    profileImage.src = imageUrl;
                    closeCamera();
                    // Recargar la página para mostrar la nueva imagen (Reload the page to display the new image) 
                    location.reload();
                } else {
                    alert('Error al guardar la imagen');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Error al subir la imagen');
            }
        }, 'image/jpeg', 0.8);
    }
    // Event Listeners
    if (cameraButton) {
        cameraButton.addEventListener('click', openCamera);
    }
    if (closeModal) {
        closeModal.addEventListener('click', closeCamera);
    }
    if (captureButton) {
        captureButton.addEventListener('click', capturePhoto);
    }
});