
function leadertable() {

    const xhttp = new XMLHttpRequest();

    xhttp.open("GET", "leaderboard.php?" );
    xhttp.send();
    xhttp.onload = function (){
        const tableData = JSON.parse(this.responseText); // Initialize this with the JSON data received from PHP

const itemsPerPage = 10; // Number of items to display per page
let currentPage = 1; // Current page

// Function to display data for the current page
function displayTablePage() {

  const table = document.getElementById('leaderboard');
  const start = (currentPage - 1) * itemsPerPage;
  const end = start + itemsPerPage;
  const pageData = tableData.slice(start, end);

  // Clear the table body
  table.innerHTML = '';

  // Loop through the page data and add rows to the table
  pageData.forEach(item => {
    const row = table.insertRow();
    // Add cells and populate data here
  });

}

            document.getElementById('prevPage').addEventListener('click', () => {
            if (currentPage > 1) {
                                     currentPage--;
                                     displayTablePage();
                                   }
                                  });
  
  // Event listener for the "Next" button
            document.getElementById('nextPage').addEventListener('click', () => {
               if (currentPage < Math.ceil(tableData.length / itemsPerPage)) {
                   currentPage++;
                    displayTablePage();
                    }
                   });
  
  // Initial display of the first page
              displayTablePage();
    
    
    } 

       

} 




// Event listener for the "Previous" button

