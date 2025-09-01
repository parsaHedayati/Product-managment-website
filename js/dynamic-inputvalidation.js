window.applyNumericValidation = function(input) {
    input.addEventListener('keydown', function(e) {
        // List of allowed keys
        const allowedKeys = ['Backspace', 'Delete', 'Tab', 'Escape', 'Enter', '.', 'ArrowLeft', 'ArrowRight', 'Home', 'End'];
        
        // Allow: numeric keys, allowed special keys, and Ctrl+A
        if (
            (/^[0-9]$/.test(e.key)) ||
            allowedKeys.includes(e.key) ||
            (e.key === 'a' && e.ctrlKey === true)
        ) {
            return; // Allow the keypress
        }
        
        // Prevent the keypress for any other key
        e.preventDefault();
    });

    input.addEventListener('input', function() {
        // Sanitize the input value
        let sanitizedValue = this.value.replace(/[^0-9.]/g, '');
        
        // Ensure only one decimal point
        const parts = sanitizedValue.split('.');
        if (parts.length > 2) {
            sanitizedValue = parts[0] + '.' + parts.slice(1).join('');
        }
        
        // Ensure non-negative value
        const numValue = parseFloat(sanitizedValue);
        if (isNaN(numValue) || numValue < 0) {
            sanitizedValue = '';
        }
        
        // Update the input value
        this.value = sanitizedValue;
    });
};

document.addEventListener('DOMContentLoaded', function() {
    const staticNumericInputs = document.querySelectorAll('input[type="number"]');
    staticNumericInputs.forEach(applyNumericValidation);
});
