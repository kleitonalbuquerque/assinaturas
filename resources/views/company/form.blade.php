@extends('templates.srtdash.template')

@section('content')

    @if(isset($errors) && count($errors) > 0)

    <div class="alert alert-danger">
    	@foreach( $errors->all() as $error )
    	<p>{{$error}}</p>
    	@endforeach
    </div>

    @endif

    @if(isset($company))
        {!! Form::open(['route' => ['companies.update', $company->id], 'class' => 'form', 'files' => true, 'enctype' => 'multipart/form-data', 'method' => 'PUT']) !!}
    @else
        {!! Form::open(['route' => 'companies.store', 'class' => 'form', 'files' => true, 'enctype' => 'multipart/form-data',]) !!}
    @endif
    <div class='row justify-content-center mt-3'>
    	<div class="col-md-12"><div class="form-group">
            {!! Form::text('name', $company->name ?? null, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}</div></div>
        <div class="col-md-12"><div class="form-group">
            {!! Form::text('site', $company->site ?? null, ['class' => 'form-control', 'placeholder' => 'Site']) !!}</div></div>
        <div class="col-md-1"><div class="form-group">
            {!! Form::color('color', $company->color ?? null, ['class' => 'form-control', 'style' => 'height:50px;']) !!}</div></div>
        <div class="col-md-6"><div class="form-group">
            {!! Form::file('image', ['class' => 'form-control']) !!}</div></div>
        <div class="col-md-5 ">{!! Form::submit('Salvar',['class' => 'btn btn-primary pull-right']) !!}</div>
    </div>
    {!! Form::close() !!}

@endsection