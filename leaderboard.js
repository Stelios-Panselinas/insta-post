function leadertable() {

  const xhttp = new XMLHttpRequest();

  xhttp.open("GET", "leaderboard.php?" );
  xhttp.send();
  xhttp.onload = function (){
      const tableData = JSON.parse(this.responseText); // Initialize this with the JSON data received from PHP
      
  }

  } 


const itemsPerPage = 10; // Number of items to display per page
let currentPage = 1; // Current page

function paginateData(tableData, page) {
  const start = (page - 1) * itemsPerPage;
  const end = start + itemsPerPage;
  return tableData.slice(start, end);
}

function displayPage(tableData) {
  // Render data on the page, e.g., populate a table
}

// Event listeners for navigation buttons
document.getElementById('prevPage').addEventListener('click', () => {
  if (currentPage > 1) {
    currentPage--;
    const pageData = paginateData(tableData, currentPage);
    displayPage(pageData);
  }
});

document.getElementById('nextPage').addEventListener('click', () => {
  if (currentPage < totalPages) {
    currentPage++;
    const pageData = paginateData(tableData, currentPage);
    displayPage(pageData);
  }
});

const totalPages = Math.ceil(tableData.length / itemsPerPage);

const initialPageData = paginateData(tableData, currentPage);
displayPage(initialPageData);






