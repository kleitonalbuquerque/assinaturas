<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;
use App\Models\State;
use App\Models\Phone;
use App\Models\City;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\EmployeesFormRequest;

class EmployeesController extends Controller
{
    private $employee;
    private $pagination = 3;

    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //get employees da DB
        // $employees = $this->employee->paginate($this->pagination);
        // $employees = $this->employee->all();
        $employees = $this->employee
                        ->join('phones', 'phones.id', '=', 'employees.phone')
                        ->join('companies', 'companies.id', '=', 'employees.company')
                        ->join('cities', 'cities.id', '=', 'employees.city')
                        ->join('states', 'states.id', '=', 'cities.state')
                        ->select('employees.*', 'phones.phone', 'cities.name as city', 'states.uf as uf', 'companies.name as company')
                        ->get();
        
        //titulo na Aba da página
        $title_page = 'Colaboradores - Listagem';
        //titulo da página
        $title = 'Colaboradores';      
        //titulo na Aba da página
        $active = 'employees';
        //titulo da página
        $activeList = 'Listagem';
        
        return view('employee.index', compact('title', 'title_page', 'active', 'activeList', 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // get companies bd
        $companies = Company::get()->pluck('name','id');
        $companies[0] = 'Selecione sua empresa';
        
        // get companies bd
        $states = State::get()->pluck('name','id');
        $states[0] = 'Selecione seu estado';

        //titulo na Aba da página
        $title_page = 'Colaboradores - Cadastro';
        //titulo da página
        $title = 'Colaboradores';      
        //titulo na Aba da página
        $active = 'employees';
        //titulo da página
        $activeList = 'Cadastro';
        
        return view('employee.form', compact('title', 'title_page', 'active', 'activeList', 'companies', 'states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeesFormRequest $request)
    {
        //metodo de insersão no bd na tabela employees
        $dataForm = $request->all();

        //validar a coisa toda! (não precisa porq ta com o formRequest)
        //$this->validate($request, $this->employee->rules, $this->employee->messages);

        // Define o valor default para a variável que contém o nome da imagem 
        $nameFile = null;
     
        // Verifica se informou o arquivo e se é válido
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
             
            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));
     
            // Recupera a extensão do arquivo
            $extension = $request->image->getClientOriginalExtension();
     
            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";

            // Faz o upload:
            $upload = $request->image->storeAs('assets\images\employees', $nameFile);

            if ( !$upload ) {
                return redirect()
                    ->back()
                    ->withErrors('error', 'Falha ao fazer upload')
                    ->withInput();
            } else {
                $dataForm['image'] = $nameFile;
            }
 
        } else {
            $dataForm['image'] = null;
        }

        //sql run!!!
        $insert = $this->employee->create($dataForm);

        if ($insert) {
            return redirect()->route('employees.index')->with(['status' => 'Sucesso ao criar employee']);
        } else {
            return redirect()->back()->withErrors(['errors' => 'Falha ao criar']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $employee = $this->employee->with('company')->with('phone')->with('city')->find($id);
        // $states = State::where('id', $employee->city()->first()->state)->get();
        $states = State::find($employee->city()->first()->state);

        //titulo na Aba da página
        $title_page = 'Colaborador: '.$employee->name;
        //titulo da página
        $title = 'Colaboradores';      
        //titulo na Aba da página
        $active = 'employees';
        //titulo da página
        $activeList = 'Colaborador: '.$employee->name;
        
        return view('employee.show', compact('title', 'title_page', 'active', 'activeList', 'employee', 'states'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $employee = $this->employee->find($id);

        // get companies bd
        $companies = Company::get()->pluck('name','id');
        $companies[0] = 'Selecione sua empresa';
        
        // get companies bd
        $states = State::get()->pluck('name','id');
        $states[0] = 'Selecione seu estado';

        $state = State::find($employee->city()->first()->state);

        // get companies bd
        $phones = Phone::where('company', $employee->company)->get()->pluck('phone','id');
        $phones[0] = 'Selecione a sua empresa';
        
        // get companies bd
        $cityBd = City::find($employee->city);
        
        $cities = DB::table('cities')
                    ->join('states', 'cities.state', '=', 'states.id')
                    ->where('states.id', $cityBd->state)
                    ->select('cities.name', 'cities.id')
                    ->get()
                    ->pluck('name','id');

        $cities[0] = 'Selecione o seu estado';

        //titulo na Aba da página
        $title_page = 'Colaboradores - Editar';
        //titulo da página
        $title = 'Colaboradores';      
        //titulo na Aba da página
        $active = 'employees';
        //titulo da página
        $activeList = 'Editar: '.$employee->name; 
        
        return view('employee.form', compact('title', 'title_page', 'active', 'activeList', 'employee', 'companies', 'states', 'phones', 'cities', 'state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeesFormRequest $request, $id)
    {
        $dataForm = $request->all();
        // $employeeUp = $this->employee->where('id', $id);
        $employeeUp = $this->employee->find($id);

        // Define o valor default para a variável que contém o nome da imagem 
        $nameFile = null;
     
        // Verifica se informou o arquivo e se é válido
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
             
            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));
     
            // Recupera a extensão do arquivo
            $extension = $request->image->getClientOriginalExtension();
     
            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";

            // Faz o upload:
            $upload = $request->image->storeAs('assets\images\employees', $nameFile);

            if ( !$upload ) {
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao fazer upload')
                    ->withInput();
            } else {
                $dataForm['image'] = $nameFile;
            }
 
        } else {
            $dataForm['image'] = $employeeUp->image;
        }
        
        $update = $employeeUp->update($dataForm);

        if ($update) {
            return redirect()->route('employees.index')->with(['status' => 'Sucesso ao atualizar cooperador']);
        } else {
            return redirect()->route('employees.edit', $id)->withErrors(['errors' => 'Falha ao editar']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function validateEmployee($value)
    {
        $val = explode("+", $value);
        $id = $val[0];
        $image = $val[1];
        // $employeeUp = $this->employee->where('id', $id);
        $employeeUp = $this->employee->find($id);

        if($employeeUp) {
            $employeeUp->validate = 1;
            $employeeUp->save();
        }

        $to = $employeeUp->mail;

        $html = '
            <html>
            <head>
            <title>Chegou a versão 4.03 do EME4.</title>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            </head>
            <body bgcolor="#dedede" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
            <table style="margin:0 auto 0 auto; width:800px;display:block;" height="auto" border="0" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td>
                        <table style="margin:50px auto 0 auto; width:800px;display:block;" border="0" cellpadding="0" cellspacing="0" align="center">
                            <tr>
                                <td>
                                    <p style="font-size:16px;">Salve esta imagem em seu computador, e em seguida coloque em sua assinatura de email.</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img style="display:block;" src="http://assinaturas.linsper.com.br/public/uploads/assets/images/emails/'.$image.'" width="800" alt=""></td>
                </tr>
            </table>
            </body>
            </html>
        ';

        $emailsender = "no-replay@linsper.com.br";
        $quebra_linha = "\n";
        $headers = "From: no-replay@linsper.com.br\n";
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\n";
        // para enviar a mensagem em prioridade máxima
        $headers .= "X-Priority: 1\n";

        $subject = 'Email de assinatura gerada';
        $message = ''. $html;

        if (!mail($to, $subject, $message, $headers ,"-r".$emailsender)) {
            $headers .= "Return-Path: " . $emailsender . $quebra_linha; // Se "não for Postfix"
            mail($to, $subject, $message, $headers );
            $mailMessage = error_get_last()['message'];
        } else {
            $mailMessage = "Sucesso email";
        }

        if ($employeeUp->validate == 1) {
            return response()->json(['status' => ['Sucesso ao aprovar', $mailMessage, $to]]);
        } else {
            return response()->json('employees.edit', $id)->withErrors(['errors' => 'Falha ao aprovar']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $employeeDel = $this->employee->find($id);
        $delete = $employeeDel->delete();
        //$destroy = $employeeDel->destroy();

        if ($delete) {
            return redirect()->route('employees.index')->with(['status' => 'Sucesso ao excluir cooperador']);
        } else {
            return redirect()->route('employees.show', $id)->withErrors(['errors' => 'Falha ao deletar']);
        }
    }
}
