@extends('dash')

@section('css')
    <style>
        .value-card{cursor: pointer;font-size: 3.5rem !important;}
        .navbar-header .logo{width: 62px;margin-top: 2px;}

        footer{bottom: 0;height: 90px;position: fixed;width: 100%;font-size: 2.6em;background-color: #212121 !important;color: white;}
        footer .time{border-right: 2px dotted #75788a;text-align: right;}        
        footer .logo{text-align: right;}
        footer img{width: 74px;margin-top: 0;margin-right: 10px;}

        .card-number{border-right: 2px dotted #75788a;}
        .feed{padding: 1em 10em 2em 3em;}

    </style>
@endsection
@section('content')

    <!-- eCommerce statistic -->
    <div class="row">
        <div class="col-xl-2 col-md-4 col-lg-3 card-number">            
            
        </div>
        <div class="col-xl-10 col-md-8 col-lg-9 feed">
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
    
    const result = fetch('/api/get/properties');
    result.then( result => result.json() )
    .then( data => {        
        var div = null;
        data.forEach( (row) => {
            div = document.createElement("div");
            div.innerHTML = `<!-- CARD -->
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-center">
                                <h5>${row.title}</h5>
                                <h2 class="secondary value-card" data-click="0">${row.total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")}</h2>
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
            document.querySelector('.card-number').appendChild(div);
        } )        
    } );

    fetch('/api/get/feed')
    .then(response => response.json())
    .then(data => {
        document.querySelector('.feed .title').innerHTML = data.title;
        document.querySelector('.feed .desc').innerHTML = data.description;
    })

    // const result = fetch('http://api.weatherstack.com/current?access_key=4a6825ddeac2fa6977db65b7b8b140d1&query=S%C3%A3o%20Paulo');              
    // result.then( result => result.json() )
    // .then( data => {
    //      document.querySelector('footer .temp').innerHTML = data.current.temperature + '&#176;'
    // } );
</script>
@endsection
