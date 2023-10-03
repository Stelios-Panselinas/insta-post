const itemsPerPage = 10; // Number of items to display per page
const table = document.getElementById('leaderboard');
const pagination = document.getElementById('pagination');

function displayItems(pageNumber, items) {
    const startIndex = (pageNumber - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;
    const displayedItems = items.slice(startIndex, endIndex);

    table.innerHTML = '';
    displayedItems.forEach(item => {
        var row = table.insertRow(-1);
        var first_name = row.insertCell(0);
        var last_name = row.insertCell(1);
        var cur_tokens = row.insertCell(2);
        var total_tokens = row.insertCell(3);
        first_name.innerHTML = item.first_name;
        last_name.innerHTML = item.last_name;
        cur_tokens.innerHTML = item.cur_tokens;
        total_tokens.innerHTML = item.total_tokens;

    });
    createPaginationLinks(items);
}

function createPaginationLinks(items) {
    const pageCount = Math.ceil(items.length / itemsPerPage);

    pagination.innerHTML = '';
    for (let i = 1; i <= pageCount; i++) {
        const link = document.createElement('a');
        link.href = '#';
        link.textContent = i;

        link.addEventListener('click', function (event) {
            event.preventDefault();
            displayItems(i, items);
        });

        pagination.appendChild(link);
    }
}

// Initial page load
//displayItems(1);

const xhttp = new XMLHttpRequest();

xhttp.open("GET", "../../classes/Admin.php?function=leaderboards");
xhttp.send();
xhttp.onload = function () {
    tableData = JSON.parse(this.responseText);
    displayItems(1, tableData);
}
