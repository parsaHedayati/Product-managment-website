document.addEventListener('DOMContentLoaded', function() {
    const numericInputs = document.querySelectorAll('input[type="number"]');
    
    numericInputs.forEach(input => {
        input.addEventListener('keydown', function(e) {
            // Allow: backspace, delete, tab, escape, enter, dot
            if ([46, 8, 9, 27, 13, 190, 110].indexOf(e.keyCode) !== -1 ||
                 // Allow: Ctrl+A
                (e.keyCode === 65 && e.ctrlKey === true) ||
                 // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                     // let it happen, don't do anything
                     return;
            }
            // Ensure that it's a number and stop the keypress if it's not
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });

        input.addEventListener('input', function() {
            // Ensure only one decimal point
            if ((this.value.match(/\./g) || []).length > 1) {
                this.value = this.value.slice(0, -1);
            }
            // Ensure non-negative value
            if (parseFloat(this.value) < 0) this.value = '';
        });
    });
});