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


document.addEventListener('DOMContentLoaded', () => {

    const copyBtn = document.getElementById('copy-btn');

    if (copyBtn) {
        copyBtn.addEventListener('click', () => {
            const keyInput = document.getElementById("license-key");
            const copyIcon = document.getElementById("copy-icon");
            const checkIcon = document.getElementById("check-icon");
            const copyToast = document.getElementById("copy-toast");

            keyInput.select();
            keyInput.setSelectionRange(0, 99999);
            navigator.clipboard.writeText(keyInput.value);

            copyIcon.classList.add("hidden");
            checkIcon.classList.remove("hidden");
            copyBtn.classList.replace("bg-gray-50", "bg-green-100");
            copyBtn.classList.replace("text-gray-500", "text-green-700");
            copyToast.classList.replace("opacity-0", "opacity-100");

            setTimeout(() => {
                copyIcon.classList.remove("hidden");
                checkIcon.classList.add("hidden");
                copyBtn.classList.replace("bg-green-100", "bg-gray-50");
                copyBtn.classList.replace("text-green-700", "text-gray-500");
                copyToast.classList.replace("opacity-100", "opacity-0");
            }, 2000);
        });
    }

});

// Fitur ScrollSpy untuk Navbar
document.addEventListener('DOMContentLoaded', () => {
    const navLinks = document.querySelectorAll('.desktop-nav-link');

    window.addEventListener('scroll', () => {
        let currentSectionId = '';

        // Deteksi kita sedang berada di section mana
        navLinks.forEach(link => {
            const sectionId = link.getAttribute('href');
            // Abaikan jika href bukan berupa ID target
            if (!sectionId.startsWith('#')) return;

            const section = document.querySelector(sectionId);
            if (section) {
                const sectionTop = section.offsetTop;
                // Angka 100 adalah offset/buffer dari tinggi navbar Anda
                if (window.scrollY >= (sectionTop - 100)) {
                    currentSectionId = sectionId;
                }
            }
        });

        // Setel default ke menu pertama jika user nge-scroll mentok ke paling atas
        if (window.scrollY < 50) {
            currentSectionId = '#featured';
        }

        // Jalankan pertukaran class CSS (Active vs Inactive)
        if (currentSectionId) {
            navLinks.forEach(link => {
                // 1. Reset semua link menjadi abu-abu (Inactive)
                link.classList.remove('border-purple-600', 'text-purple-700', 'font-bold');
                link.classList.add('border-transparent', 'text-gray-500', 'hover:text-gray-900', 'hover:border-gray-300', 'font-semibold');

                // 2. Jika link cocok dengan section saat ini, ubah jadi ungu (Active)
                if (link.getAttribute('href') === currentSectionId) {
                    link.classList.remove('border-transparent', 'text-gray-500', 'hover:text-gray-900', 'hover:border-gray-300', 'font-semibold');
                    link.classList.add('border-purple-600', 'text-purple-700', 'font-bold');
                }
            });
        }
    });
});
