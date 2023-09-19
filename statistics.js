


const xhttp = new XMLHttpRequest();
xhttp.onload = function (){
  const statiData = [JSON.parse(this.responseText)]; 

             xhttp.open("GET", "statistcs.php?startDate=" + startDate + "endDate=" + endDate );
             xhttp.send(); 

}
     
const labels = statiData.map(item => item.yaxis); 
const data = statiData.map(item => item.xaxis);  


const ctx = document.getElementById('myChart');
         const myChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: labels,
            datasets: [{
              label: 'Πλήθος Προσφορών ανά ημέρα',
              data: data,
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              x: {
                min: '2023-01-01',
                max: '2023-12-31',
                type: 'time',
                time: {
                  unit: 'day'  
                }

              },  
              y: {
                beginAtZero: true
              }
            }
          }
        });


        
        

        function filterChart(date) {

          

             console.log(date.value);
             const year = date.value.substring(0, 4);
             const month = date.value.substring(5, 7);
             console.log(month);
             
             
             const lastDay = (y, m) => {
              return new Date(y, m, 0).getDate()
             };


             const startDate = `${date.value}-01`;
             const endDate = `${date.value}-${lastDay(year,month)}`;

             myChart.config.options.scales.x.min = startDate;
             myChart.config.options.scales.x.max = endDate;
             myChart.update();
        
             const xhttp = new XMLHttpRequest();

             xhttp.open("GET", "statistcs.php?startDate=" + startDate + "endDate=" + endDate );
             xhttp.send(); 
     
            }

        

