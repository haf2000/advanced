@extends('layouts.app')

@section('content')
<div class="container" style="width: 1000px;height:1000px;text-align: center;margin-left:auto;margin-right:auto;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div>
               

               
                               @if (Auth::check())
               <div class="container">
                         <canvas id="myChart"></canvas>
       <script>
  
var ctx = document.getElementById('myChart').getContext('2d');
 var d;
 var date;
const xlabels = ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Aôut','Septembre','Octobre','Novembre','Decembre'];
      var dates_reservations = [
       @foreach( $data['reservations'] as $res)
   "{{ $res->date }}",
      @endforeach      
];
var Jan=0;
var Fev=0;
var Mar=0;
var Avr=0;
var Mai=0;
var Juin=0;
var Juil=0;
var Aout=0;
var Sept=0;
var Oct=0;
var Nov=0;
var Dec=0;

for (var i = 0; i < dates_reservations.length; i++) {
     d =  dates_reservations[i];
     date = new Date(d);
  console.log(date);
        switch(date.getMonth())
     {
      case 0:
        Jan++;
      break;
        case 1:
                Fev++;
      break;
        case 2:
                Mar++;
      break;
       case 3:
               Avr++;
      break; 
       case 4:
               Mai++;       
      break; 
       case 5:
       Juin++;
      break;
        case 6:
        Juil++;
      break;
        case 7:
        Aout++;
      break;
        case 8:
        Sept++;
      break;
        case 9:
        Oct++;
      break;
        case 10:
        Nov++;
      break;
        case 11:
        Dec++;
      break;

     }
        
}




//------------------------------------------

  
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: xlabels,
        datasets: [{
            label: 'Nombre de réservations refusées',
            data: [Jan, Fev, Mar, Avr, Mai, Juin,Juil,Aout,Sept,Oct,Nov,Dec],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});



</script>

               </div>
                  

                            @else
                            <h4 class="jumbotron" style="align-content: center;">Bienvenue sur notre application </h4>
                            @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
