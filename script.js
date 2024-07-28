document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('employeeForm');
    const submitButton = form.querySelector('[name="insert"]');
    const updateButton = form.querySelector('[name="update"]');
    const deleteButton = form.querySelector('[name="delete"]');

    // Hide update and delete buttons initially
    updateButton.style.display = 'none';
    deleteButton.style.display = 'none';

    // Event delegation for edit and delete buttons
    document.body.addEventListener('click', function(event) {
        if (event.target.classList.contains('edit')) {
            const row = event.target.closest('tr');
            const cells = row.querySelectorAll('td');

            // Fill form with row data for editing
            form.name.value = cells[1].textContent;
            form.email.value = cells[2].textContent;
            form.phone.value = cells[3].textContent;
            form.job.value = cells[4].textContent;
            form.date_joining.value = cells[5].textContent;
            form.bank_no.value = cells[6].textContent;
            form.salary.value = cells[7].textContent;
            form.gender.value = cells[8].textContent;
            form.id.value = event.target.dataset.id;

            // Toggle button visibility
            submitButton.style.display = 'none';
            updateButton.style.display = 'inline-block';
            deleteButton.style.display = 'inline-block';
        }

        if (event.target.classList.contains('delete')) {
            if (confirm('Are you sure you want to delete this record?')) {
                form.id.value = event.target.dataset.id;
                form.action = 'employee.php'; // Set the form action to the processing script
                deleteButton.click(); // Simulate delete button click
            }
        }
    });
});
