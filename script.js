document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form");
    const passwordInput = document.querySelector('input[name="password"]');
    const passwordFeedback = document.createElement("div");
    passwordFeedback.className = "form-text text-danger";

    passwordInput.parentElement.appendChild(passwordFeedback);

    passwordInput.addEventListener("input", () => {
        const password = passwordInput.value;
        const requirements = /^(?=.*[A-Z])(?=.*[!@#$%^&*(),.?":{}|<>]).{4,}$/;

        if (requirements.test(password)) {
            passwordFeedback.textContent = "La contraseña es válida.";
            passwordFeedback.classList.replace("text-danger", "text-success");
        } else {
            passwordFeedback.textContent =
                "La contraseña debe tener al menos 4 caracteres, una letra mayúscula y un carácter especial.";
            passwordFeedback.classList.replace("text-success", "text-danger");
        }
    });

    form.addEventListener("submit", (e) => {
        const password = passwordInput.value;
        const requirements = /^(?=.*[A-Z])(?=.*[!@#$%^&*(),.?":{}|<>]).{4,}$/;

        if (!requirements.test(password)) {
            alert("La contraseña no cumple con los requisitos.");
            e.preventDefault();
        }
    });
});
