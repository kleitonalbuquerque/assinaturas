@extends('templates.srtdash.template')

@push('styles')
    @include('templates.srtdash.inc.datatablecss')
@endpush

@push('scripts')
    @include('templates.srtdash.inc.datatablejs')
@endpush

@section('content')
<div class="row">

    @if(isset($errors) && count($errors) > 0)

    <div class="row"><div class="col-md-12">
        <div class="alert alert-danger w-100">
           @foreach( $errors->all() as $error )
            <p>{{$error}}</p>
            @endforeach
        </div>
    </div></div>

    @endif
    
    @if(session()->has('status'))

    <div class="row"><div class="col-md-12">
        <div class="alert alert-success w-100">
            <p>{{session()->get('status')}}</p>
        </div>
    </div></div>

    @endif

	<!-- <div class="col-12 mt-5 text-center"><div class="pull-right">{-- $companies->links() --}</div></div> -->
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
            </div>
        </div>
    </div>

    <!-- data table start -->
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <div class="col-14">
                    <h2>Pedidos em aberto</h2>
                    <hr>
                </div>
                <div class="data-tables">
                    <table id="dataTable" class="table table-hover text-center">
                        <thead class="text-capitalize bg-info">
                            <tr class="text-white">
                                <th>ID</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Cargo</th>
                                <th>Empresa</th>
                                <th>Telefone</th>
                                <th>Localidade</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($employees as $employee)
                            <tr>
                                <th scope="row" class="table-warning">
                                    {{$employee->id}}</th>
                                <td>{{$employee->name}}</td>
                                <td>{{$employee->mail}}</td>
                                <td>{{$employee->office}}</td>
                                <td>{{$employee->company}}</td>
                                <td>{{$employee->phone}}</td>
                                <td>{{$employee->city}}, {{$employee->uf}}</td>
                                <td>
                                    <ul class="d-flex justify-content-center">
                                        {!! Form::open(['route' => ['employees.validate', $employee->id], 'class' => 'form justify-content-center', 'method' => 'PUT']) !!}
                                            <button type="submit" class="text-secondary text-info bnt-excluir" data-toggle="tooltip" data-placement="bottom" title="Validar Assinatura" alt="Validar Assinatura"><i class="fa fa-check"></i></button>
                                        {!! Form::close() !!}
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- data table end -->

</div>
@endsection