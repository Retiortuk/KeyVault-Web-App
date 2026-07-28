window.toggleModal = function(modalID) {
    const modal = document.getElementById(modalID);
    if (modal) {
        if (modal.classList.contains('hidden')) {
            modal.classList.remove('hidden');
        } else {
            modal.classList.add('hidden');
        }
    }
};

window.previewImage = function(event) {
    const input = event.target;
    const placeholder = document.getElementById('upload-placeholder');
    const preview = document.getElementById('image-preview');
    const overlay = document.getElementById('image-overlay');

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
            overlay.classList.remove('hidden');
            overlay.classList.add('flex');
            placeholder.classList.add('hidden');
        }

        reader.readAsDataURL(input.files[0]);
    }
};

window.closeToast = function(toastId) {
    const toast = document.getElementById(toastId);
    if(toast) {
        toast.classList.remove('translate-x-0');
        toast.classList.add('opacity-0', 'translate-x-full');
        setTimeout(() => toast.remove(), 300);
    }
};

document.addEventListener('DOMContentLoaded', () => {
    ['toast-success', 'toast-error'].forEach(id => {
        if(document.getElementById(id)) {
            setTimeout(() => {
                window.closeToast(id);
            }, 4000); 
        }
    });
});
