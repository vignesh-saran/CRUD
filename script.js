document.addEventListener('DOMContentLoaded', function() {
    const employeeTable = document.getElementById('employeeTable');
    const form = document.getElementById('employeeForm');
    const submitButton = form.querySelector('[name="insert"]');
    const updateButton = form.querySelector('[name="update"]');
    const deleteButton = form.querySelector('[name="delete"]');

    updateButton.style.display = 'none';
    deleteButton.style.display = 'none';

    employeeTable.addEventListener('click', function(event) {
        if (event.target.classList.contains('edit')) {
            const row = event.target.closest('tr');
            const cells = row.querySelectorAll('td');

            form.name.value = cells[1].textContent;
            form.email.value = cells[2].textContent;
            form.phone.value = cells[3].textContent;
            form.job.value = cells[4].textContent;
            form.bank_no.value = cells[5].textContent;
            form.date_joining.value = cells[6].textContent;
            form.salary.value = cells[7].textContent;
            form.gender.value = cells[8].textContent;
            form.id.value = event.target.dataset.id;

            submitButton.style.display = 'none';
            updateButton.style.display = 'inline-block';
            deleteButton.style.display = 'inline-block';
        }

        if (event.target.classList.contains('delete')) {
            if (confirm('Are you sure you want to delete this record?')) {
                form.id.value = event.target.dataset.id;
                form.submit();
            }
        }
    });
});
