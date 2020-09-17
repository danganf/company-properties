@extends('admin')

@section('css')
    <style>
        .error{font-style: italic;color:orangered;padding-top: 4px;display: none;}
        .input-error{border-color:orangered !important;}
    </style>
@endsection

@section('content')

    @php
        $id = isset( $id ) ? $id : '';
        $title = isset( $title ) ? $title : '';
        $total = isset( $total ) ? $total : '1';
    @endphp

    <form class="form form-horizontal striped-labels form-bordered" id="formNumber" data-id="{{$id}}" onsubmit="return false">
        <div class="card">
            <div class="card-header reload-card">
                
            </div>
            <div class="card-content collapse show">
                <div class="card-body">
                    <div class="form-body">
                        <h4></h4>
                        <div class="form-group row">
                            <label class="col-md-3 label-control" for="title">Título*</label>
                            <div class="col-md-9">
                                <input type="text" id="title" maxlength="80" value="{{$title}}" class="form-control col-md-6" placeholder="Titulo" name="title">
                                <span class="error">Campo obrigatório</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 label-control" for="total">Valor*</label>
                            <div class="col-md-3">
                                <input type="number" min="1" id="total" value="{{$total}}" maxlength="100" class="form-control col-md-6" placeholder="Total" name="total">
                                <span class="error">Campo obrigatório</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div id="cardFilter" class="card-content">
                <div class="card-body text-right">
                    <div class="form-actions">
                        <button type="button" onclick="location.href='{{route('admin')}}'" class="btn btn-secondary btn-default btn-click mr-1"><i class="la la-backward"></i> VOLTAR</button>
                        <button type="submit" class="btn btn-primary">SALVAR</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        const elemTitle = document.getElementById('title');
        const elemTotal = document.getElementById('total');
        elemTitle.focus();

        document.querySelector('.btn-primary').addEventListener('click', (e) => {

            let flag = true;            
            if( elemTitle.value.trim() === '' ){
                elemTitle.classList.add('input-error');
                elemTitle.nextElementSibling.style.display='block';
                flag = false;
            } else {
                elemTitle.classList.remove('input-error');
                elemTitle.nextElementSibling.style.display='none';
            }

            if( elemTotal.value.trim() === '' ){
                elemTotal.classList.add('input-error');
                elemTotal.nextElementSibling.style.display='block';
                flag = false;
            } else {
                elemTotal.classList.remove('input-error');
                elemTotal.nextElementSibling.style.display='none';
            }

            if( flag ){
                e.target.innerHTML = 'PROCESSANDO...';
                fetch("/api/{{$id ? 'put' : 'post'}}/properties/"+'{{$id}}', {
                    method: "POST",
                    body: new FormData(document.getElementById('formNumber'))
                })
                .then(response => response.json())
                .then(data => {
                    window.location.href = '{{route('admin')}}'
                })
            }
        })

    </script>
@endsection