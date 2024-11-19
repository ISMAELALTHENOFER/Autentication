document.addEventListener('DOMContentLoaded', () => {
    const forms = document.querySelectorAll('.form');
    forms.forEach(form => {
        form.addEventListener('submit', (e) => {
            const email = form.querySelector('input[name="email"]');
            const password = form.querySelector('input[name="password"]');
            
            if (!email.value.includes('@')) {
                alert('Por favor, ingresa un correo electrónico válido.');
                e.preventDefault();
            }

            if (password.value.length < 6) {
                alert('La contraseña debe tener al menos 6 caracteres.');
                e.preventDefault();
            }
        });
    });
});
