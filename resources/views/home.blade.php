<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de assinatura</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>

    <div class="row mt-3">
        <div class="container">
            <h1>Cadastro de assinatura</h1>
            <hr>
            <div class="alert alert-secondary" role="alert">
              A assinatura estará sujeita a validação.
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="container">
            <h3>Formulário de cadastro</h3>

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

            {!! Form::open(['route' => 'home.store', 'class' => 'form', 'files' => true, 'enctype' => 'multipart/form-data']) !!}

            <div class='row justify-content-center mt-3'>
                <div class="col-md-12"><div class="form-group">
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}</div></div>
                <div class="col-md-12"><div class="form-group">
                    {!! Form::text('mail', null, ['class' => 'form-control', 'placeholder' => 'example@site.com.br']) !!}</div></div>
                <div class="col-md-12"><div class="form-group">
                    {!! Form::text('office', null, ['class' => 'form-control', 'placeholder' => 'Seu cargo']) !!}</div></div>
                <div class="col-md-6"><div class="form-group">
                    {!! Form::select('company', $companies, 0, ['id' => 'companies', 'class' => 'form-control']) !!}</div></div>
                <div class="col-md-6"><div class="form-group">
                    {!! Form::select('phone', ['Selecione o telefone'], 0, ['id' => 'list_phones', 'class' => 'form-control']) !!}</div></div>
                <div class="col-md-6"><div class="form-group">
                    {!! Form::select('state', $states, 0, ['id' => 'states', 'class' => 'form-control']) !!}</div></div>
                <div class="col-md-6"><div class="form-group">
                    {!! Form::select('city', ['Selecione um estado'], $employee->city ?? 0, ['id' => 'list_cities', 'class' => 'form-control']) !!}</div></div>
                <div class="col-md-4"><div class="form-group">
                    {!! Form::file('image', ['class' => 'form-control']) !!}</div></div>
                <div class="col-md-8 pull-right">{!! Form::submit('Enviar',['class' => 'btn btn-primary pull-right']) !!}</div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

</body>
</html>

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