<x-volt-app :title="__('List Ping')">

    <br/>
    @foreach($websites as $key => $website)
      <canvas id="myChart{{$key}}" width="400" height="100"></canvas>
      <br/>
    @endforeach
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <script>
    // create initial empty chart
    @foreach($websites as $key => $website)
      let labelID{{$key}} = 1;
      var ctx{{$key}} = document.getElementById("myChart"+{{$key}});
      var chart{{$key}} = new Chart(ctx{{$key}}, {
        type: 'bar',
        data: {
          labels: [],
          datasets: [{
            data: [],
            borderWidth: 1,
            borderColor:'#00c0ef',
            label: "{{$website->website_name}}",
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
    @endforeach

    function get_ping() {
      @foreach($websites as $key => $website)
        $.ajax({
          url: "{{ route('api.chart') }}",
          type: 'GET',
          dataType: 'json',
          data: {link: "{{$website->website_domain_name}}"},
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(data) {
            chart{{$key}}.data.labels.push(labelID{{$key}}++);
            chart{{$key}}.data.datasets[0].data.push(data.data);
            chart{{$key}}.update();
          },
          error: function(data){
            console.log(data);
          }
        });
      @endforeach
    }

    setInterval(() => {
      get_ping()
    }, 2000);
    </script>

</x-volt-app>
