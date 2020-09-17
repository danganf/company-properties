@extends('dash')

@section('css')
    <style>
        .value-card{cursor: pointer;font-size: 3.5rem !important;}
        .card-number{border-right: 2px dotted #75788a;text-align: center;}
        .feed{padding: 1em 10em 2em 3em;}

    </style>
@endsection
@section('content')

    <!-- eCommerce statistic -->
    <div class="row">
        <div class="col-xl-2 col-md-4 col-lg-3 card-number">            
            <img src="assets/images/loading-spinner.gif">
        </div>
        <div class="col-xl-10 col-md-8 col-lg-9 feed">
            <a href="{{route('admin')}}" class="btn btn-secondary pull-right">ADMINISTRAR</a>
            <h1 class="title"><img src="assets/images/loading-spinner.gif"> Buscando noticia...</h1>
            <h3 class="desc"></h1>
        </div>        
    </div>
    <!--/ eCommerce statistic -->
@endsection

@section('js')

<script>
    var d = new Date();
    document.querySelector('footer .time').innerHTML = d.getHours() + ':' + d.getMinutes();
    
    const result = fetch('/api/get/properties@last');
    result.then( result => result.json() )
    .then( data => {        
        let div = null;
        let elemCard = document.querySelector('.card-number');
        elemCard.innerHTML = '';
        div = document.createElement("div");        
        div.innerHTML = `<!-- CARD -->
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="media-body text-center">
                            <h5>${data.title}</h5>
                            <h2 class="secondary value-card" data-click="0">${data.total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")}</h2>
                        </div>
                    </div>
                    <div class="progress progress-sm mt-1 mb-0">
                        <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 100%"
                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END CARD -->`;
        elemCard.appendChild(div);
    } );

    fetch('/api/get/feed')
    .then(response => response.json())
    .then(data => {
        document.querySelector('.feed .title').innerHTML = data.title;
        document.querySelector('.feed .desc').innerHTML = data.description;
    })

    fetch('http://api.weatherstack.com/current?access_key=4a6825ddeac2fa6977db65b7b8b140d1&query=S%C3%A3o%20Paulo')           
    .then( response => response.json() )
    .then( data => {
         document.querySelector('footer .temp').innerHTML = data.current.temperature + '&#176;'
    } );
</script>
@endsection
