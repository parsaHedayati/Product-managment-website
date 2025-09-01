
 

document.getElementById('productType').addEventListener('change', function() {
    const additionalFields = document.getElementById('additional-fields');
    additionalFields.innerHTML = ''; // Clear any existing fields
    
    if (this.value === 'disk') {
        const div1 = document.createElement('div');
        const div2 = document.createElement('div');
        const div3 = document.createElement('div');
        const diskLabel = document.createElement('label');
        
        const diskInput = document.createElement('input');
        
        diskLabel.htmlFor = 'disk';
        diskLabel.innerHTML = 'Size(Mb): ';
        diskInput.type = 'number';
        
        diskInput.id = 'size';
        
        diskInput.name = 'size';
        diskInput.placeholder = 'size';
        diskInput.className = 'form-control'; 
        diskInput.step = '0.01';
        
        div1.className = 'row g-3 align-items-center';
        div2.className = 'col-auto';
        div3.className = 'col-auto';
        
        diskInput.required = true;
         
        // Correct nesting of elements
        div2.appendChild(diskLabel);
        div3.appendChild(diskInput);
        
        div1.appendChild(div2);
        div1.appendChild(div3);
        additionalFields.appendChild(div1);
        window.applyNumericValidation(diskInput);
        
        const diskNote = document.createElement('p');
        diskNote.textContent = 'Please provide the size in MB.';
        diskNote.className = 'text-muted mt-2'; // Add Bootstrap classes
        additionalFields.appendChild(diskNote);
        applyNumericValidation(diskInput);
    }else if (this.value === 'furniture') {
    // Furniture option
    const furnitureFields = ['height', 'width', 'length'];
    
    furnitureFields.forEach(field => {
        const div1 = document.createElement('div');
        const div2 = document.createElement('div');
        const div3 = document.createElement('div');
        const label = document.createElement('label');
        const input = document.createElement('input');
        
        
        
        label.htmlFor = field;
        label.innerHTML = `${field.charAt(0).toUpperCase() + field.slice(1)}(cm): `;
        input.type = 'number';
        input.id = field;
        input.name = field;
        input.placeholder = `${field.charAt(0).toUpperCase() + field.slice(1)}(cm)`;
        input.className = 'form-control';
        input.step = '0.01';
        input.required = true;
        
        div1.className = 'row g-3 align-items-center';
        div2.className = 'col-auto';
        div3.className = 'col-auto';
        
        div2.appendChild(label);
        div3.appendChild(input);
        
        div1.appendChild(div2);
        div1.appendChild(div3);
        additionalFields.appendChild(div1);
        window.applyNumericValidation(input);
    });

    const furnitureNote = document.createElement('p');
    furnitureNote.textContent = 'Please enter the furniture dimensions in H x W x L.';
    furnitureNote.className = 'text-muted mt-2';
    additionalFields.appendChild(furnitureNote);

} else if (this.value === 'book') {
    // Book option
    const div1 = document.createElement('div');
    const div2 = document.createElement('div');
    const div3 = document.createElement('div');
    const bookLabel = document.createElement('label');
    const bookInput = document.createElement('input');
    
    bookLabel.htmlFor = 'book';
    bookLabel.innerHTML = 'Weight(kg): ';
    bookInput.type = 'number';
    bookInput.id = 'weight';
    bookInput.name = 'weight';
    bookInput.placeholder = 'Weight(kg)';
    bookInput.className = 'form-control';
    bookInput.step = '0.01';
    bookInput.required = true;
    
    div1.className = 'row g-3 align-items-center';
    div2.className = 'col-auto';
    div3.className = 'col-auto';
    
    div2.appendChild(bookLabel);
    div3.appendChild(bookInput);
    
    div1.appendChild(div2);
    div1.appendChild(div3);
    additionalFields.appendChild(div1);
    window.applyNumericValidation(bookInput);

    const bookNote = document.createElement('p');
    bookNote.textContent = 'Please provide the weight in KG.';
    bookNote.className = 'text-muted mt-2';
    additionalFields.appendChild(bookNote);
}
});
