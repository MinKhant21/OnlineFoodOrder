@extends('admin.layout.master')

@section('content')

<div class="container">
    <div class="container">
        
                <canvas id="myChart"></canvas>
            
            
                <h3>Latest User</h3>
                <ul class="list-group">
                    @foreach ($user as $u)
                    <li class="list-group-item">
                        {{$u->name}}
                    </li>
                    @endforeach
    
                </ul>
           
    </div>
</div>

@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

const labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July',
    'August',
    'Setember',
    'October',
    'November',
    'December'
  ];

  const data = {
    labels: labels,
    datasets: [{
      label: 'Order Report',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: @json($data),
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {}
  };
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>
@endsection