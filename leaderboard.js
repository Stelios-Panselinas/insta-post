function leadertable() {

  const xhttp = new XMLHttpRequest();

  xhttp.open("GET", "leaderboard.php?" );
  xhttp.send();
  xhttp.onload = function (){
      const tableData = JSON.parse(this.responseText); // Initialize this with the JSON data received from PHP
      
  }

  } 


var tableData = [
  {
    'first_name': "Panos Papadopoulos", 'cur_tokens': "7", 'total_tokens': "23"
  },
 {
  'first_name': "Nikos Papadopoulos", 'cur_tokens': "8", 'total_tokens': "19"}
]

var state = {
  'querySet': tableData,
  'page': 1,
  'rows':10,
}

buildTable ()


function pagination(querySet, page,rows){
        var trimStart = (page - 1) * rows
        var trimEnd = trimStart + rows

        var trimmedData = querySet.slice(trimStart, trimEnd)

        var pages = Math.ceil(querySet.length /rows)

        return{
          'querySet': trimmedData,
          'pages': pages
        }
}

function pageButtons(pages){

        var wrapper = document.getElementById('pagination-wrapper')
        wrapper.innerHTML = ''

        for (var page = 1; page <=pages; page++){
          wrapper.innerHTML += `<button value=${page} class=page btn btn-sm btn-info">${page}</button>`
        }

        $('.page').on('click', function(){
          $('#leaderboard').empty()

          state.page = $(this).val()

          buildTable()
        }
        )
      }

function buildTable() {
  var table = $('#leaderboard')

  var data = pagination(state.querySet, state.page, state.rows)
 
  myList = data.querySet

  for ( var i = 1 in myList) {

    var row = ` <tr>
                    <td></td>
                    <td>${myList[i].first_name}</td>
                    <td>${myList[i].cur_tokens}</td>
                    <td>${myList[i].total_tokens}</td>
    `
    table.append(row)
  }

  pageButtons(data.pages)
}