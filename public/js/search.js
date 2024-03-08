document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('search');
    const rows = document.querySelectorAll('.table-item tbody tr');

    searchInput.addEventListener('input', function () {
        const searchText = this.value.trim().toLowerCase();

        rows.forEach(function (row) {
            const name = row.querySelector('#item-name').textContent.toLowerCase();

            if (name.includes(searchText)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

});
