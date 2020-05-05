<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Requests\CompaniesFormRequest;


class CompaniesController extends Controller
{
    private $company;
    private $pagination = 3;

    public function __construct(Company $company)
    {
        $this->company = $company;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //get companies da DB
        // $companies = $this->company->paginate($this->pagination);
        $companies = $this->company->all();

        //titulo na Aba da página
        $title_page = 'Empresa - Listagem';
        //titulo da página
        $title = 'Empresas';      
        //titulo na Aba da página
        $active = 'companies';
        //titulo da página
        $activeList = 'Listagem';
        
        return view('company.index', compact('title', 'title_page', 'active', 'activeList', 'companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //titulo na Aba da página
        $title_page = 'Empresa - Cadastro';
        //titulo da página
        $title = 'Empresas';      
        //titulo na Aba da página
        $active = 'companies';
        //titulo da página
        $activeList = 'Cadastro';
        
        return view('company.form', compact('title', 'title_page', 'active', 'activeList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompaniesFormRequest $request)
    {
        //metodo de insersão no bd na tabela companies
        $dataForm = $request->all();

        //validar a coisa toda! (não precisa porq ta com o formRequest)
        //$this->validate($request, $this->company->rules, $this->company->messages);

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
            $upload = $request->image->storeAs('assets\images\companies', $nameFile);

            if ( !$upload ) {
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao fazer upload')
                    ->withInput();
            } else {
                $dataForm['image'] = $nameFile;
            }
 
        } else {
            $dataForm['image'] = null;
        }

        //sql run!!!
        $insert = $this->company->create($dataForm);

        if ($insert) {
            return redirect()->route('companies.index')->with(['status' => 'Sucesso ao criar empresa']);
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
        $company = $this->company->with('phone')->find($id);

        //titulo na Aba da página
        $title_page = 'Empresa: '.$company->name;
        //titulo da página
        $title = 'Empresas';     
        //titulo na Aba da página
        $active = 'companies';
        //titulo da página
        $activeList = $company->name;

        $phones = $company->phone;

        
        return view('company.show', compact('title', 'title_page', 'active', 'activeList', 'company', 'phones'));
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
        $company = $this->company->find($id);

        //titulo na Aba da página
        $title_page = 'Empresa - Editar';
        //titulo da página
        $title = 'Empresas';     
        //titulo na Aba da página
        $active = 'companies';
        //titulo da página
        $activeList = 'Editar: '.$company->name; 
        
        return view('company.form', compact('title', 'title_page', 'active', 'activeList', 'company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompaniesFormRequest $request, $id)
    {
        $dataForm = $request->all();
        // $companyUp = $this->company->where('id', $id);
        $companyUp = $this->company->find($id);

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
            $upload = $request->image->storeAs('assets\images\companies', $nameFile);

            if ( !$upload ) {
                return redirect()
                    ->back()
                    ->withErrors('error', 'Falha ao fazer upload')
                    ->withInput();
            } else {
                $dataForm['image'] = $nameFile;
            }
 
        } else {
            $dataForm['image'] = $companyUp->image;
        }
        
        $update = $companyUp->update($dataForm);

        if ($update) {
            return redirect()->route('companies.index')->with(['status' => 'Sucesso ao atualizar empresa']);
        } else {
            return redirect()->route('companies.edit', $id)->withErrors(['errors' => 'Falha ao editar']);
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
        $companyDel = $this->company->find($id);
        $delete = $companyDel->delete();
        //$destroy = $companyDel->destroy();

        if ($delete) {
            return redirect()->route('companies.index')->with(['status' => 'Sucesso ao excluir company']);
        } else {
            return redirect()->route('companies.show', $id)->withErrors(['errors' => 'Falha ao deletar']);
        }
    }
}
