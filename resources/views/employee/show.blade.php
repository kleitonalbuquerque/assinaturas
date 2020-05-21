@extends('templates.srtdash.template')

@push('styles')
    @include('templates.custom.show')
@endpush

@section('content')
    <div id="logoShow" class='row'>
    	<div class='col-md-2'>
			<img src="{{ url('uploads/assets/images/employees/'.$employee->image) }}" class="w-75">
		</div>
    	<div class='col-md-10'>
    		<div class='col-md-12'>
    			<h2>{{$employee->name}}</h2>
				<p>{{$employee->office}}</p>
			</div>
    		<div class='col-md-12'>
    			<ul class="d-flex mt-3">
                    <!-- <li class="mr-3">
                    	{!! Form::open(['route' => ['employees.validate', $employee->id], 'class' => 'form justify-content-center', 'method' => 'PUT']) !!}
                    		<button type="submit" class="text-secondary text-info bnt-excluir" data-toggle="tooltip" data-placement="bottom" title="Validar Assinatura" alt="Validar Assinatura"><i class="fa fa-check"></i></button>
                        {!! Form::close() !!}
                    </li> -->
                    <li class="mr-3">
											{!! Form::open() !!}	
												<a href="{{route('employees.edit', $employee->id)}}" class="text-secondary" data-toggle="tooltip" data-placement="bottom" title="Editar dados" alt="Editar dados"><i class="fa fa-edit"></i></a>
											{!! Form::close() !!}	
                    </li>
                    <li class="justify-content-center">
                      {!! Form::open(['route' => ['employees.destroy', $employee->id], 'class' => 'justify-content-center', 'method' => 'DELETE']) !!}
                        <button type="submit" class="text-danger bnt-excluir" data-toggle="tooltip" data-placement="bottom" title="Excluir" alt="Excluir"><i class="ti-trash"></i></button>
                      {!! Form::close() !!}
                    </li>
                </ul>
			</div>
		</div>
		<div class='col-md-12'>
			<hr>
		</div>
    </div>

   	<div class='container py-4'>
        <div class='row justify-content-center'>
          <div class='col-md-8'>
            <div class='card'>
              <div class='card-header'>
                <h4 class='list-inline-item'>Dados de(o) {{$employee->name}}</h4>
              </div>
		      <div class='card-body'>

		        <ul class='list-group list-group-flush' id="phones">
		            <div class='list-group-item list-group-item-action d-flex'>
		            	<p>{{$employee->name}}</p>
		            </div>
		            <div class='list-group-item list-group-item-action d-flex'>
						<p>{{$employee->mail}}</p>
		            </div>
		            <div class='list-group-item list-group-item-action d-flex'>
						<p>{{$employee->office}}</p>
		            </div>
		            <div class='list-group-item list-group-item-action d-flex'>
						<p>{{$employee->company()->first()->name}}</p>
		            </div>
		            <div class='list-group-item list-group-item-action d-flex'>
						<p>{{$employee->city()->first()->name}}, {{$states->uf}}</p>
		            </div>
		            <div class='list-group-item list-group-item-action d-flex'>
						<p>{{$employee->phone()->first()->phone}}</p>
		            </div>
		        </ul>
		      </div>
            </div>
          </div>
        </div>
  	</div>

    <h2>Exemplo</h2>
    <hr>
    <div id="example">
		<table bgcolor="#FFFFFF" id="Table_mail" style="margin:0 auto 0 auto;width:800px;padding:50px 50px 50px 50px;width:800px;height:300px;" style="display:block;" height="340" border="0" cellpadding="0" cellspacing="0" align="center"><tbody>
		    <tr>
		        <td style="text-align:left;border-right: 2.5px solid rgba(120, 130, 140, 0.13) !important;">
		            <table id="image_employee" bgcolor="#FFFFFF" align="left" role="presentation" cellspacing="0" cellpadding="0" border="0" width="150" height="150" style="margin:auto;">
		                <tbody>
		                    <tr>
		                        <td>
									<img src="{{ url('uploads/assets/images/employees/'.$employee->image) }}" style="border-radius:200px;border:1px solid white;padding:0px;width:125px;height:125px;" class="imgEmployee">
		                        </td>                            
		                    </tr>
		                </tbody>
		            </table>
		        </td>
		        <td style="text-align:left;">
		            <table id="infos" bgcolor="#FFFFFF" align="left" role="presentation" cellspacing="0" cellpadding="0" border="0" width="500" height="150" style="margin:auto;padding:5px 25px;">
		                <tbody>
		                    <tr>
		                        <td>
		                        	<table id="block_left" bgcolor="#FFFFFF" align="left" role="presentation" cellspacing="0" cellpadding="0" border="0" width="500" height="65" style="margin:auto;">
						                <tbody>
						                    <tr>
						                        <td>
													<p style="font-size:26px;font-family:'Open Sans', sans-serif;text-align:left;display:block;color:{{$employee->company()->first()->color}};line-height:35px;letter-spacing:-0.1px;margin:0;font-weight:bold;" align="left">
														{{$employee->name}}
													</p>
													<p style="font-size:16px;font-family:'Open Sans', sans-serif;text-align:left;display:block;color:#A0A09E;line-height:20px;letter-spacing:-0.1px;margin:0;font-weight:200;" align="left">
														{{$employee->office}}
													</p>
												 </td>                            
						                    </tr>
						                </tbody>
						            </table>
						            <table id="block_right" bgcolor="#FFFFFF" align="left" role="presentation" cellspacing="0" cellpadding="0" border="0" width="500" height="85" style="margin:auto;padding:10px 0;">
						                <tbody>
						                    <tr>
						                        <td>
										            <table id="infos_employee" bgcolor="#FFFFFF" align="left" role="presentation" cellspacing="0" cellpadding="0" border="0" width="150" height="75" style="margin: auto;">
										                <tbody>
										                    <tr>
										                        <td>
																	<p style="font-size:16px;font-family:'Open Sans', sans-serif;text-align:left;display:block;color:#A0A09E;line-height:22.5px;margin:0;font-weight:200;" align="left">
																		{{$employee->phone()->first()->phone}}
																	</p>
																	<p style="font-size:16px;font-family:'Open Sans', sans-serif;text-align:left;display:block;color:#A0A09E;line-height:22.5px;margin:0;font-weight:200;" align="left">
																		{{$employee->company()->first()->site}}
																	</p>
																	<p style="font-size:16px;font-family:'Open Sans', sans-serif;text-align:left;display:block;color:#A0A09E;line-height:22.5px;margin:0;font-weight:200;" align="left">
																		{{$employee->city()->first()->name}}, {{$states->uf}}
																	</p>
																</td>                            
										                    </tr>
										                </tbody>
										            </table>
						                        </td> 
										        <td style="text-align:right;">
										            <table id="image_company" bgcolor="#FFFFFF" align="right" role="presentation" cellspacing="0" cellpadding="0" border="0" width="350" height="75" style="margin:auto;text-align:right;">
										                <tbody>
										                    <tr>
										                        <td width="350" style="text-align:right;width:250px;">
																							<img src="{{ url('uploads/assets/images/companies/'.$employee->company()->first()->image) }}" style="display:inline-block;" width="auto" height="40" class="logocompany">
										                        </td>                            
																				</tr>
																				<!-- Logos cinza -->
																				<tr>
										                        <td width="350" style="text-align:right;width:250px;margin-top:20px;">
																							<img src="{{ url('http://www.datainfo.inf.br/wp-content/uploads/sites/10/2020/05/ELEMENTOS_abaixo-02.png') }}" style="display:inline-block;" width="auto" height="40" class="logocompany">
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
            <tr>
                <td>
		            <table id="image" bgcolor="#FFFFFF" align="left" role="presentation" cellspacing="0" cellpadding="0" border="0" width="225" height="100" style="margin: auto;">
		                <tbody>
		                    <tr>
													<td width="225" height="100" style="text-align:right;width:225px;">
														<img src="{{ url('http://www.datainfo.inf.br/wp-content/uploads/sites/10/2020/05/ELEMENTOS_abaixo-01.png') }}" style="display:inline-block;margin-top:5px;" width="225" height="auto" class="icons">
													</td>                            
		                    </tr>
		                </tbody>
		            </table>
                </td>                            
            </tr>
		</tbody></table>
    </div> <!-- end #Exemplo -->

    <h2 class="mt-5">Validar Assinatura</h2>
    <hr>
    <div class="col-12 mt-1">
        <div class="card">
            <div class="card-body">
				<button type="button" class="btn btn-outline-info" onclick="doCapture()">Gerar imagem</button>
				<button type="button" class="btn btn-outline-success send" onclick="send()" id="{{$employee->id}}">Enviar imagem por email</button>
            </div>
            <div id="img-out" class="col-12 mt-1">
            	<div id="img" style="display:none;"> 
		            <img src="" id="newimg" class="" /> 
		        </div> 
            </div>
        </div>
    </div>

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{URL::asset('assets/js/html2canvas.js')}}"></script>
<script type='text/javascript'>
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	var protocol = window.location.protocol;
	var host = window.location.host;

	function doCapture() {
		window.scrollTo(0, 0);

		html2canvas(document.getElementById("Table_mail")).then(function (canvas) {

			// Create an AJAX object
			var ajax = new XMLHttpRequest();

			// Setting method, server file name, and asynchronous
			ajax.open("POST", protocol+"//"+host+"/save.php", true);

			// Setting headers for POST method
			ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

			// Sending image data to server
			ajax.send("image=" + canvas.toDataURL("image/jpeg", 0.9));

			// Receiving response from server
			// This function will be called multiple times
			ajax.onreadystatechange = function () {

				// Check when the requested is completed
				if (this.readyState == 4 && this.status == 200) {

					// Displaying response from server
					console.log(this.responseText);
					window.open(protocol+"//"+host+"/baixar.php?arquivo="+this.responseText)
				}
			};
		});
	} 

	// validate record
	function send() {

		html2canvas(document.getElementById("Table_mail")).then(function (canvas) {

			// Create an AJAX object
			var ajax = new XMLHttpRequest();

			// Setting method, server file name, and asynchronous
			ajax.open("POST", protocol+"//"+host+"/save.php", true);

			// Setting headers for POST method
			ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

			// Sending image data to server
			ajax.send("image=" + canvas.toDataURL("image/jpeg", 0.9));

			// Receiving response from server
			// This function will be called multiple times
			ajax.onreadystatechange = function () {

				// Check when the requested is completed
				if (this.readyState == 4 && this.status == 200) {

					// Displaying response from server
					console.log(this.responseText);
					
					//validate and send
					var id = $('.send').attr('id');
					var image = this.responseText;
					var value = id + "+" + image;
					var url = "{{ url('api/employees/validate') }}"+"/"+value;
					$.ajax({
						url: url,
						type: "GET",
						data: {_token:CSRF_TOKEN,'value':value},
						success: function(response){
							var alert = '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Cooperador <strong>validado</strong>!</div>';
							$("#img-out").append(alert);

							$("#img-out .alert-success").delay(5000).slideUp(200, function() {
							$(this).alert('close');
							});
						}
					});
				}
			};
		});

	}
</script>