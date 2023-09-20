const ctx = document.getElementById('myChart');
         const myChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels:[],
            datasets: [{
              label: 'Πλήθος Προσφορών ανά ημέρα',
              data: [],
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
              xhttp.open("GET", "../../classes/Admin.php?function=statistics&startDate=" + startDate + "&endDate=" + endDate );
              xhttp.send(); 
              xhttp.onload = function (){
              const staticData = JSON.parse(this.responseText); 
              const labels = [];
              const data = [];
              for(i in staticData){
                labels[i] = staticData[i].yaxis;
                data[i] = staticData[i].xaxis;
              }
              //myChart.config.data.labels = labels;
              //myChart.config.data.datasets.data = data;
              //debugger
              //myChart.update();
              myChart.destroy();

              const ctx = document.getElementById('myChart');
         const myChart1 = new Chart(ctx, {
          type: 'line',
          data: {
            labels:labels,
            datasets: [{
              label: 'Πλήθος Προσφορών ανά ημέρα',
              data: data,
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              x: {
                min: startDate,
                max: endDate,
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
              }
              
            }

        

