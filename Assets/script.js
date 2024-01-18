const wrapper = document.querySelector('.wrapper');
const loginLink = document.querySelector('.login-lnk');
const registerLink = document.querySelector('.register-link');

registerLink.addEventListener('click', ()=> {
    wrapper.classList.add('active');
});
loginLink.addEventListener('click', ()=> {
wrapper.classList.remove('active');
});


document.addEventListener("DOMContentLoaded", function () {
    // Function to validate password strength
    function validatePasswordStrength(password) {
        return /^(?=.*[A-Za-z])(?=.*\d).{8,}$/.test(password);
    }

    // Function to validate contact number
    function validateContactNumber(contactNo) {
        return /^\d{10}$/.test(contactNo);
    }

    // Add event listener to the form
    document.querySelector("form").addEventListener("submit", function (event) {
        const password = document.querySelector("[name='password']").value;
        const confirmPassword = document.querySelector("[name='confirmPassword']").value;
        const contactNo = document.querySelector("[name='contactNo']").value;

        // Validate confirming password
        if (password !== confirmPassword) {
            alert("Passwords do not match. Please re-enter.");
            event.preventDefault(); // Prevent form submission
            return;
        }

        // Validate password strength
        if (!validatePasswordStrength(password)) {
            alert("Password should be at least 8 characters long and include letters and numbers.");
            event.preventDefault(); // Prevent form submission
            return;
        }

        // Validate contact number
        if (!validateContactNumber(contactNo)) {
            alert("Contact number should contain exactly 10 digits.");
            event.preventDefault(); // Prevent form submission
        }

        if (!termsAndConditions) {
            showError("terms", "Please agree to the terms and conditions.");
            event.preventDefault(); // Prevent form submission
        } else {
            hideError("terms");
        }
    });
});