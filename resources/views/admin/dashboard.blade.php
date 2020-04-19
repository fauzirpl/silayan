<!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Beranda</h1>
          </div>
          <a class="weatherwidget-io" href="https://forecast7.com/en/1d41101d62/bengkalis-regency/" data-label_1="BENGKALIS" data-label_2="CUACA SAAT INI" data-font="Roboto" data-icons="Climacons Animated" data-days="5" data-theme="original" >BENGKALIS CUACA SAAT INI</a>
          <script>
          !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
          </script>
          <div class="section-body">
          	<div class="row" style="margin-top: 30px">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Statistik Penangkapan Ikan Para Nelayan</h4>
                  <div class="card-header-action">
                    <div class="btn-group">
                      <a href="#" class="btn btn-primary">Tahun 2019</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <canvas id="myChart" height="182"></canvas>
                </div>
              </div>
            </div>
          </div>
          </div>
        </section>
      </div>

      <script src="{{ asset('back/modules/chart.min.js') }}"></script>

      <script>
      var ctx = document.getElementById("myChart").getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
          datasets: [{
            label: 'Statistics',
            data: [{{ $januari }}, {{ $februari }}, {{ $maret }}, {{ $april }}, {{ $mei }}, {{ $juni }}, {{ $juli }}, {{ $agustus }}, {{ $september }}, {{ $oktober }}, {{ $november }}, {{ $desember }}],
            borderWidth: 2,
            backgroundColor: 'rgb(87,75,144)',
            borderColor: 'rgb(87,75,144)',
            borderWidth: 2.5,
            pointBackgroundColor: '#ffffff',
            pointRadius: 4
          }]
        },
        options: {
          legend: {
            display: false
          },
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true,
                stepSize: 150
              }
            }],
            xAxes: [{
              gridLines: {
                display: false
              }
            }]
          },
        }
      });
      </script>