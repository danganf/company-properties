@extends('dash')

@section('css')
    <style>
        .value-card-click{cursor: pointer;font-size: 2.5rem !important;}
        .value-card-click i{font-size: 2.5rem !important;}

        .navbar-header .logo{
            width: 62px;
            margin-top: 2px;
        }

        footer{bottom: 0;height: 90px;position: fixed;width: 100%;font-size: 2.6em;background-color: #212121 !important;color: white;}
        footer .time{border-right: 2px dotted #75788a;text-align: right;}
        footer .logo{text-align: right;}
        footer img{width: 74px;margin-top: 0;margin-right: 10px;}

    </style>
@endsection
@section('content')

    <!-- eCommerce statistic -->
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
                <div class="card-content reload-card" id="card-orders">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="info value-card-click value-card-orders" data-click="0" data-value="0"><i class="la la-eye" style="opacity: 0.4;"></i></h3>
                                <h6>Vendas do dia</h6>
                            </div>
                            <div>
                                <i class="icon-basket-loaded info font-large-2 float-right"></i>
                            </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0">
                            <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 100%"
                                 aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
                <div class="card-content reload-card" id="amount-sales">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="warning value-card-click value-amount-sales" data-click="0" data-value="R$0"><i class="la la-eye" style="opacity: 0.4;"></i></h3>
                                <h6>Total vendido</h6>
                            </div>
                            <div>
                                <i class="icon-pie-chart warning font-large-2 float-right"></i>
                            </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0">
                            <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 100%"
                                 aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
                <div class="card-content reload-card" id="paid-sales">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="danger value-card-click value-paid-sales" data-click="0" data-value="R$0"><i class="la la-eye" style="opacity: 0.4;"></i></h3>
                                <h6>Total pago</h6>
                            </div>
                            <div>
                                <i class="icon-bar-chart danger font-large-2 float-right"></i>
                            </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0">
                            <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 100%"
                                 aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
                <div class="card-content reload-card" id="tt-new-user">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="success value-card-click value-tt-new-user" data-click="0" style="font-size: 2.5rem;"><i class="la la-eye" style="opacity: 0.4;"></i></h3>
                                <h6>Novos clientes</h6>
                            </div>
                            <div>
                                <i class="icon-user-follow success font-large-2 float-right"></i>
                            </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0">
                            <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 100%"
                                 aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ eCommerce statistic -->
@endsection

@section('js')

<script>
    var d = new Date();
    document.querySelector('footer .time').innerHTML = d.getHours() + ':' + d.getMinutes();    
    // const result = fetch('http://api.weatherstack.com/current?access_key=4a6825ddeac2fa6977db65b7b8b140d1&query=S%C3%A3o%20Paulo');              
    // result.then( result => result.json() )
    // .then( data => {
    //      document.querySelector('footer .temp').innerHTML = data.current.temperature + '&#176;'
    // } );
</script>
@endsection
