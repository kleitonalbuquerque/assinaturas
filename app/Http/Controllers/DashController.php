<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class DashController extends Controller
{
    private $employee;
    private $pagination = 3;

    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
        $this->middleware('auth');
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
                        ->where('validate', '=', '0')
                        ->select('employees.*', 'phones.phone', 'cities.name as city', 'states.uf as uf', 'companies.name as company')
                        ->get();
        
        //titulo na Aba da página
        $title_page = 'Dashbord - Pedidos';
        //titulo da página
        $title = 'Dashbord';      
        //titulo na Aba da página
        $active = 'dashbord';
        //titulo da página
        $activeList = 'Pedidos';
        
        return view('dashbord.index', compact('title', 'title_page', 'active', 'activeList', 'employees'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pedidos()
    {
        $pedidos = $this->employee
                        ->join('phones', 'phones.id', '=', 'employees.phone')
                        ->join('companies', 'companies.id', '=', 'employees.company')
                        ->join('cities', 'cities.id', '=', 'employees.city')
                        ->join('states', 'states.id', '=', 'cities.state')
                        ->where('validate', '=', '0')
                        ->select('employees.*', 'phones.phone', 'cities.name as city', 'states.uf as uf', 'companies.name as company')
                        ->latest()
                        ->limit(5)
                        ->get();
        
        return $pedidos;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function notifications()
    {
        $count = $this->employee
                        ->join('phones', 'phones.id', '=', 'employees.phone')
                        ->join('companies', 'companies.id', '=', 'employees.company')
                        ->join('cities', 'cities.id', '=', 'employees.city')
                        ->join('states', 'states.id', '=', 'cities.state')
                        ->where('validate', '=', '0')
                        ->select('employees.*', 'phones.phone', 'cities.name as city', 'states.uf as uf', 'companies.name as company')
                        ->count();
        
        return $count;
    }

}
