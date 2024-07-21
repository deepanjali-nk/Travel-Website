(function () {
    "use strict";
    function hideSuccessMessage() {
        var successMessage = document.querySelector('.success-message');
        if (successMessage) {
            setTimeout(function () {
                successMessage.style.display = 'none';
            }, 3000); // 5000 milliseconds (5 seconds)
        }
    }

    function hideErrorMessage() {
        var errorMessage = document.querySelector('.error-message');
        if (errorMessage) {
            setTimeout(function () {
                errorMessage.style.display = 'none';
            }, 3000); // 5000 milliseconds (5 seconds)
        }
    }

    // Call the function when the page loads
    window.addEventListener('load', hideSuccessMessage);
    window.addEventListener('load', hideErrorMessage);

    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
})();