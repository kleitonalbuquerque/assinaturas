<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;
use App\Models\State;
use App\Http\Requests\EmployeesFormRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // get companies bd
        $companies = Company::get()->pluck('name','id');
        $companies[0] = 'Selecione sua empresa';
        
        // get companies bd
        $states = State::get()->pluck('name','id');
        $states[0] = 'Selecione seu estado';
        
        return view('home', compact('companies', 'states'));
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
            return redirect()->route('home')->with(['status' => 'Sucesso ao criar pedido']);
        } else {
            return redirect()->back()->withErrors(['errors' => 'Falha ao criar']);
        }
    }
}
