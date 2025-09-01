
document.getElementById('delete-product-btn').addEventListener('click', function(e) {
    e.preventDefault(); // Prevent the default form submission

    const checkboxes = document.querySelectorAll('.delete-checkbox:checked');
    const skusToDelete = Array.from(checkboxes).map(cb => cb.value);

    if (skusToDelete.length > 0) {
        
        fetch('deleteproduct.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ skus: skusToDelete }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                
                checkboxes.forEach(checkbox => checkbox.closest('.product').remove());
            } else {
                alert('Error deleting products: ' + (data.message || 'Unknown error'));
            }
        })
        .catch((error) => {
            console.error('Error:', error);
            alert('Error deleting products');
        });
    } else {
        alert('No products selected for deletion');
    }
});
