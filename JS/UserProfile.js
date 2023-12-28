function goToPreferences() {
    openModal('preferencesModal');
}

function goToNotification() {
    openModal('notificationModal');
}

function openModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.style.display = 'block';
}

function closeModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.style.display = 'none';
}


/*automatic update the No. in the table*/
document.addEventListener('DOMContentLoaded', function () {
    var rows = document.querySelectorAll('#history tbody tr');

    rows.forEach(function (row, index) 
    {
        var cell = row.insertCell(0);
        /*insertCell(0) = insert at the cell 0 (No.)*/
        
        cell.textContent = index + 1;
        /*index+1 is to update the "no." accordingly, the number wont repeat*/
    });
});

