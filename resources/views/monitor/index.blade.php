<x-volt-app :title="__('List Ping')">

    <br/>
    <canvas id="myChart" width="400" height="100"></canvas>
    <br/>
    <canvas id="myChart1" width="400" height="100"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <script>
    // create initial empty chart
    let labelID = 1;
    let labelID1 = 1;
    var ctx_live = document.getElementById("myChart");
    var ctx_live1 = document.getElementById("myChart1");
    var myChart = new Chart(ctx_live, {
      type: 'bar',
      data: {
        labels: [],
        datasets: [{
          data: [],
          borderWidth: 1,
          borderColor:'#00c0ef',
          label: 'Kaskus',
        }]
      },
      options: {
        responsive: true,
        legend: {
          display: false
        },
        scales: {
          y: {
            beginAtZero: true,
          }
        }
      }
    });

    var myChart1 = new Chart(ctx_live1, {
      type: 'bar',
      data: {
        labels: [],
        datasets: [{
          data: [],
          borderWidth: 1,
          borderColor:'#00c0ef',
          label: 'Google',
        }]
      },
      options: {
        responsive: true,
        legend: {
          display: false
        },
        scales: {
          y: {
            beginAtZero: true,
          }
        }
      }
    });

    var updateChart = function() {
        $.ajax({
          url: "{{ route('api.chart') }}",
          type: 'GET',
          dataType: 'json',
          data: {link: 'https://kaskus.com/'},
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(data) {

            myChart.data.labels.push(labelID++);
            myChart.data.datasets[0].data.push(data.data);
            myChart.update();
          },
          error: function(data){
            console.log(data);
          }
        });
    }

    var updateChart1 = function() {
        $.ajax({
          url: "{{ route('api.chart') }}",
          type: 'GET',
          dataType: 'json',
          data: {link: 'https://www.google.com/'},
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(data) {

            myChart1.data.labels.push(labelID++);
            myChart1.data.datasets[0].data.push(data.data);
            myChart1.update();
          },
          error: function(data){
            console.log(data);
          }
        });
    }

    setInterval(() => {
        updateChart();
        updateChart1();
      }, 1500);
    </script>

</x-volt-app>
