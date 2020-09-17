@extends('admin')

@section('css')
    <style>
        h1{border-bottom: 2px dotted #75788a;padding-bottom: .8em;font-weight: bold;margin-bottom: 30px;}
        h1 a:first-child{margin-right: 10px;}
        th{font-weight: normal;}
        td{font-weight: bold;}
    </style>
@endsection

@section('content')
    <h1>
        Gestão de Números
        <div class="pull-right">
            <a href="{{route('dashboard')}}" class="btn btn-secondary">VER DASHBOARD</a>
            <a href="{{route('new')}}" class="btn btn-secondary">NOVO NÚMERO+</a>
        </div>
    </h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-content collapse show">
                        <div id="last-orders" class="media-list position-relative">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-xl mb-0">
                                    <thead>
                                    <tr>
                                        <th class="border-top-0" style="width: 5%">#</th>
                                        <th class="border-top-0">TÍTULO</th>
                                        <th class="border-top-0">VALOR</th>
                                        <th class="border-top-0">DATA/HORA</th>
                                        <th class="border-top-0 text-right">AÇÕES</th>
                                    </tr>
                                    </thead>
                                    <tbody class="registers">
                                        <tr>
                                            <td class="text-truncate text-center" colspan="5">
                                                <img src="assets/images/loading-spinner.gif"> Buscando...
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        fetch('/api/get/properties')
        .then(response => response.json())
        .then(data => {
            let elem = document.querySelector('.registers')        
            if(data.length > 0){
                elem.innerHTML = '';
                data.forEach( (row) => {
                    tr = document.createElement("tr");
                    tr.innerHTML = `<td class="text-truncate">#${row.id}</td>
                                    <td class="text-truncate">${row.title}</td>
                                    <td class="text-truncate">${row.total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")}</td>
                                    <td class="text-truncate">${row.created_at.split(' ')[0]}</td>
                                    <td class="text-right">
                                        <a href="{{route('edit',['_ID_'])}}" data-id="${row.id}" data-action="updt" class="btn action btn-secondary btn-default">EDITAR [-]</a>
                                        <a href="#" data-id="${row.id}" data-action="del" class="btn action btn-secondary btn-default">EXCLUIR [+]</a>
                                    </td>`;
                    tr.addEventListener('click', (e) => {
                        e.preventDefault();
                        const id = +e.target.getAttribute('data-id')
                        if( e.target.getAttribute('data-action') === 'updt' ){
                            e.target.innerHTML = 'ABRINDO...'
                            window.location.href = e.target.getAttribute('href').replace('_ID_',id)
                        } else {
                            e.target.innerHTML='DELETANDO...';
                            fetch('/api/delete/properties/'+id)
                            .then(response => response.json())
                            .then(data => {
                                location.reload()   
                            })
                        }
                    })                 
                    elem.appendChild(tr);
                });        
            } else {
                elem.innerHTML = `<tr>
                                    <td class="text-truncate text-center" colspan="5">
                                        Sem registros.
                                    </td>
                                </tr>`;
            }
        })
    </script>
@endsection