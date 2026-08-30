document.addEventListener("DOMContentLoaded", () => {
    const registerForm = document.getElementById("registerForm");

    if (registerForm) {
        registerForm.addEventListener("submit", (e) => {
            const passwordInput = registerForm.querySelector("input[name='password']");
            if (passwordInput && passwordInput.value.length < 6) {
                alert("Password must be at least 6 characters long.");
                e.preventDefault();
            }
        });
    }
});