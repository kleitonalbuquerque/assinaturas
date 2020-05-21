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

    <div class="col-md-12 mt-3">
        <div class="alert alert-danger w-100">
           @foreach( $errors->all() as $error )
            <p>{{$error}}</p>
            @endforeach
        </div>
    </div>

    @endif
    
    @if(session()->has('status'))

    <div class="col-md-12 mt-3">
        <div class="alert alert-success w-100">
            <p>{{session()->get('status')}}</p>
        </div>
    </div>
    @endif

	<!-- <div class="col-12 mt-5 text-center"><div class="pull-right">{-- $companies->links() --}</div></div> -->

    <!-- data table start -->
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <div class="data-tables">
                    <table id="dataTable" class="table table-hover text-center">
                        <thead class="text-capitalize bg-info">
                            <tr class="text-white">
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Site</th>
                                <th>Telefone</th>
                                <th>Logo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($companies as $company)
                            <tr>
                                <th scope="row">{{$company->id}}</th>
                                <td>{{$company->name}}</td>
                                <td>{{$company->site}}</td>
                                <td>{{$company->phone}}</td>
                                <td><img src="{{ url('uploads/assets/images/companies/'.$company->image)}}" class="logocompany"></td>
                                <td>
                                    <ul class="d-flex justify-content-center">
                                        <li class="mr-3"><a href="{{route('companies.show', $company->id)}}" class="text-secondary text-info" data-toggle="tooltip" data-placement="bottom" title="Visualizar" alt="Visualizar"><i class="fa fa-eye"></i></a></li>
                                        <li class="mr-3"><a href="{{route('companies.edit', $company->id)}}" class="text-secondary" data-toggle="tooltip" data-placement="bottom" title="Editar" alt="Editar"><i class="fa fa-edit"></i></a></li>
                                        <li>
                                            {!! Form::open(['route' => ['companies.destroy', $company->id], 'class' => '', 'method' => 'DELETE']) !!}
                                                <button type="submit" class="text-danger bnt-excluir" data-toggle="tooltip" data-placement="bottom" title="Excluir" alt="Excluir"><i class="ti-trash"></i></button>
                                            {!! Form::close() !!}
                                        </li>
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