document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('incidentForm');

    form.addEventListener('submit', function(event) {
        event.preventDefault();
        
        if (validateForm()) {
            this.submit();
        }
    });

    function validateForm() {
        let isValid = true;
        const requiredFields = form.querySelectorAll('[required]');

        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                isValid = false;
                field.style.borderColor = 'red';
            } else {
                field.style.borderColor = '';
            }
        });

        // Check if at least one checkbox is checked for each checkbox group
        const checkboxGroups = form.querySelectorAll('.checkbox-group');
        checkboxGroups.forEach(group => {
            const checkboxes = group.querySelectorAll('input[type="checkbox"]');
            const isChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
            if (!isChecked) {
                isValid = false;
                group.style.borderColor = 'red';
            } else {
                group.style.borderColor = '';
            }
        });

        if (!isValid) {
            alert('Veuillez remplir tous les champs obligatoires et sélectionner au moins une option pour chaque groupe.');
        }

        return isValid;
    }
});