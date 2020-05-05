@extends('templates.srtdash.template')

@section('content')

    @if(isset($errors) && count($errors) > 0)

    <div class="alert alert-danger">
    	@foreach( $errors->all() as $error )
    	<p>{{$error}}</p>
    	@endforeach
    </div>

    @endif

    @if(isset($employee))
        {!! Form::open(['route' => ['employees.update', $employee->id], 'class' => 'form', 'files' => true, 'enctype' => 'multipart/form-data', 'method' => 'PUT']) !!}
    @else
        {!! Form::open(['route' => 'employees.store', 'class' => 'form', 'files' => true, 'enctype' => 'multipart/form-data']) !!}
    @endif

	<div class='row justify-content-center mt-3'>
        <div class="col-md-12"><div class="form-group">
            {!! Form::text('name', $employee->name ?? null, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}</div></div>
    	<div class="col-md-12"><div class="form-group">
            {!! Form::text('mail', $employee->mail ?? null, ['class' => 'form-control', 'placeholder' => 'example@site.com.br']) !!}</div></div>
        <div class="col-md-12"><div class="form-group">
            {!! Form::text('office', $employee->office ?? null, ['class' => 'form-control', 'placeholder' => 'Seu cargo']) !!}</div></div>
        <div class="col-md-6"><div class="form-group">
            {!! Form::select('company', $companies, $employee->company ?? 0, ['id' => 'companies', 'class' => 'form-control']) !!}</div></div>
        <div class="col-md-6"><div class="form-group">
            {!! Form::select('phone', $phones ?? ['Selecione uma empresa'], $employee->phone ?? 0, ['id' => 'list_phones', 'class' => 'form-control']) !!}</div></div>
        <div class="col-md-6"><div class="form-group">
            {!! Form::select('state', $states, $state->id ?? 0, ['id' => 'states', 'class' => 'form-control']) !!}</div></div>
        <div class="col-md-6"><div class="form-group">
            {!! Form::select('city', $cities ?? ['Selecione um estado'], $employee->city ?? 0, ['id' => 'list_cities', 'class' => 'form-control']) !!}</div></div>
        <div class="col-md-4"><div class="form-group">
            {!! Form::file('image', ['class' => 'form-control']) !!}</div></div>
        <div class="col-md-8 ">{!! Form::submit('Salvar',['class' => 'btn btn-primary pull-right']) !!}</div>
    </div>
    {!! Form::close() !!}

@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type='text/javascript'>
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
$(document).ready(function(){

    // get telefones
    $(document).on("change", "#companies" , function() {

        $('#list_phones')
            .find('option')
            .remove()
            .end()
            .append('<option value="0">Selecione um telefone de '+$('select#companies option:selected').text()+'</option>')
            .val('0')
        ;

        var company = $(this).val();
        var url = "{{ url('api/phones/getphonescompany') }}"+"/"+company;

        if(company != '' && company > 0){
          $.ajax({
            url: url,
            type: "GET",
            data: {_token:CSRF_TOKEN,'company':company},
            success: function(response){
                // console.log(response['phones']);
                $.each(JSON.parse(response),function(){
                    var phone = $(this).get(0);
                    var options = 
                    '<option value="' + phone.id + '">' + phone.phone + '</option>';

                    $("#list_phones").append(options);
                });               
            }
          });
        }
    });

    // get telefones
    $(document).on("change", "#states" , function() {

        $('#list_cities')
            .find('option')
            .remove()
            .end()
            .append('<option value="0">Selecione uma cidade de '+$('select#states option:selected').text()+'</option>')
            .val('0')
        ;

        var state = $(this).val();
        var url = "{{ url('api/cities/getcitiesstate') }}"+"/"+state;

        if(state != '' && state > 0){
          $.ajax({
            url: url,
            type: "GET",
            data: {_token:CSRF_TOKEN,'state':state},
            success: function(response){
                // console.log(response['cities']);
                $.each(JSON.parse(response),function(){
                    var city = $(this).get(0);
                    console.log(city)
                    var options = 
                    '<option value="' + city.id + '">' + city.name + '</option>';

                    $("#list_cities").append(options);
                });               
            }
          });
        }
    });

});

</script>