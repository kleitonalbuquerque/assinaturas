@extends('templates.srtdash.template')

@push('styles')
    @include('templates.custom.show')
@endpush

@section('content')
    <!-- <h2>Listagem do Empresa {{$company->name}}.</h2> -->
    <div id="logoShow">
		<div class='col-md-12'>
			<img src="{{ url('uploads/assets/images/companies/'.$company->image) }}" class="logoCompany">
			<h2>{{$company->site}}</h2>
		</div>
		<div class='col-md-12'>
			<ul class="d-flex mt-3">
                <li class="mr-3">
                	<a href="{{route('companies.edit', $company->id)}}" class="text-secondary" data-toggle="tooltip" data-placement="bottom" title="Editar dados" alt="Editar dados do Cooperador"><i class="fa fa-edit"></i></a>
                </li>
                <li class="justify-content-center">
                    {!! Form::open(['route' => ['companies.destroy', $company->id], 'class' => 'justify-content-center', 'method' => 'DELETE']) !!}
                        <button type="submit" class="text-danger bnt-excluir" data-toggle="tooltip" data-placement="bottom" title="Excluir" alt="Excluir"><i class="ti-trash"></i></button>
                    {!! Form::close() !!}
                </li>
            </ul>
		</div>
		<hr>
    </div>

   	<div class='container py-4'>
        <div class='row justify-content-center mb-2'>
			<div class='col-md-8'>
				<div class='input-group'>
					<input
						type='text'
						id='phoneinput'
						class='form-control'
						placeholder='Novo telefone'
					/>
					<div class='input-group-append'>
						<button id="create" class='btn btn-primary'>Inserir</button>
					</div>
				</div>
			</div>
        </div>
        <div class='row justify-content-center'>
          <div class='col-md-8'>
            <div class='card'>
              <div class='card-header'>
                <h4 class='list-inline-item'>Telefones da {{$company->name}}</h4>
              </div>
		      <div class='card-body'>

		        <ul class='list-group list-group-flush' id="phones">
    				@foreach($phones as $phone)
		            <div class='list-group-item list-group-item-action d-flex'>
		              	<p>{{$phone->phone}}</p>
				        <div class="form-excluir">
                            <button type="button" class="text-danger bnt-excluir destroy" id="{{$phone->id}}"><i class="ti-trash"></i></button>
                        </div>
		            </div>
    				@endforeach
		        </ul>
		      </div>
            </div>
          </div>
        </div>
  	</div>

    <h2>Exemplo</h2>
    <hr>
    <div id="example">
		<table bgcolor="#FFFFFF" id="Table_body" style="margin:0 auto 0 auto;width:800px;padding:50px;" style="display:block;" height="300" border="0" cellpadding="0" cellspacing="0" align="center"><tbody>
		    <tr>
		        <td style="text-align:left;border-right: 2.5px solid rgba(120, 130, 140, 0.13) !important;">
		            <table id="image" bgcolor="#FFFFFF" align="left" role="presentation" cellspacing="0" cellpadding="0" border="0" width="150" height="150" style="margin:auto;">
		                <tbody>
		                    <tr>
		                        <td>
									<img src="{{ url('assets/images/team/baitinha.jpg') }}" class="imgEmployee">
		                        </td>                            
		                    </tr>
		                </tbody>
		            </table>
		        </td>
		        <td style="text-align:left;">
		            <table id="image" bgcolor="#FFFFFF" align="left" role="presentation" cellspacing="0" cellpadding="0" border="0" width="500" height="150" style="margin:auto;padding:5px 25px;">
		                <tbody>
		                    <tr>
		                        <td>
		                        	<table id="image" bgcolor="#FFFFFF" align="left" role="presentation" cellspacing="0" cellpadding="0" border="0" width="500" height="65" style="margin:auto;">
						                <tbody>
						                    <tr>
						                        <td>
													<p style="font-size:26px;font-family:'Open Sans', sans-serif;text-align:left;display:block;color:{{$company->color}};line-height:35px;letter-spacing:-0.1px;margin:0;font-weight:bold;" align="left">
														NOME SOBRENOME
													</p>
													<p style="font-size:16px;font-family:'Open Sans', sans-serif;text-align:left;display:block;color:#A0A09E;line-height:20px;letter-spacing:-0.1px;margin:0;font-weight:200;" align="left">
														Cargo completo
													</p>
												 </td>                            
						                    </tr>
						                </tbody>
						            </table>
						            <table id="image" bgcolor="#FFFFFF" align="left" role="presentation" cellspacing="0" cellpadding="0" border="0" width="500" height="85" style="margin:auto;padding:10px 0;">
						                <tbody>
						                    <tr>
						                        <td>
										            <table id="image" bgcolor="#FFFFFF" align="left" role="presentation" cellspacing="0" cellpadding="0" border="0" width="150" height="75" style="margin: auto;">
										                <tbody>
										                    <tr>
										                        <td>
																	<p style="font-size:16px;font-family:'Open Sans', sans-serif;text-align:left;display:block;color:#A0A09E;line-height:22.5px;margin:0;font-weight:200;" align="left">
																		47 3285-9738
																	</p>
																	<p style="font-size:16px;font-family:'Open Sans', sans-serif;text-align:left;display:block;color:#A0A09E;line-height:22.5px;margin:0;font-weight:200;" align="left">
																		{{$company->site}}
																	</p>
																	<p style="font-size:16px;font-family:'Open Sans', sans-serif;text-align:left;display:block;color:#A0A09E;line-height:22.5px;margin:0;font-weight:200;" align="left">
																		Blumenau, SC
																	</p>
																</td>                            
										                    </tr>
										                </tbody>
										            </table>
						                        </td>                            
										        <td style="text-align:right;">
										            <table id="image" bgcolor="#FFFFFF" align="right" role="presentation" cellspacing="0" cellpadding="0" border="0" width="350" height="75" style="margin:auto;padding-top:25px;text-align:right;">
										                <tbody>
										                    <tr>
										                        <td width="350" style="text-align:right;width:350px;">
																	<img src="{{ url('uploads/assets/images/companies/'.$company->image) }}" style="display:inline-block;" width="auto" height="40" class="logocompany">
										                        </td>                            
										                    </tr>
										                </tbody>
										            </table>
										        </td>
						                    </tr>
						                </tbody>
						            </table>
		                        </td>                            
		                    </tr>
		                </tbody>
		            </table>
		        </td>
		    </tr>
		</tbody></table>
    </div>

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

	// Add record
	$('#create').click(function(){

	    var phone = $('#phoneinput').val();
	    var company = '{{$company->id}}';

	    if(phone != ''){
	      $.ajax({
	        url: "{{ route('phones.store') }}",
	        type: "POST",
	        data: {_token:CSRF_TOKEN,'phone':phone,'company':company},
	        success: function(response){
	            var id = response['last_insert_id'];		            
	            var tr_str = 
	            '<div class="list-group-item list-group-item-action d-flex">'+
	            	'<p>' + phone + '</p>'+
	            	'<div class="form-excluir"><button type="button" class="text-danger bnt-excluir destroy" id="' + id + '"><i class="ti-trash"></i></button></div>'+
	            '</div>';

	            $("#phones").append(tr_str);

	            if (response['last_insert_id']) {
		            var alert = '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Sucesso</strong> ao inserir telefone!</div>';
		            $("#phones").append(alert);

					$("#phones .alert-success").delay(5000).slideUp(200, function() {
					    $(this).alert('close');
					});
	        	}

	          	// Empty the input fields
	          	$('#phoneinput').val('');
	        }
	      });
	    }else{
	      alert('Fill all fields');
	    }
	});

	// Delete record
	$(document).on("click", ".destroy" , function() {
		var id = $(this).attr('id');
		var url = "{{ url('api/phones/destroy') }}"+"/"+id;
		$(this).closest( "div.list-group-item" ).remove();
		$.ajax({
			url: url,
			type: "GET",
			data: {_token:CSRF_TOKEN,'id':id},
			success: function(response){
				var alert = '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Telefone <strong>deletado</strong>!</div>';
				$("#phones").append(alert);

				$("#phones .alert-success").delay(5000).slideUp(200, function() {
				$(this).alert('close');
				});
			}
		});
	});

});

</script>