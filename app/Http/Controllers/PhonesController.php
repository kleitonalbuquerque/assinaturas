<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phone;

class PhonesController extends Controller
{
    private $phone;

	public function __construct(Phone $phone)
	{
		$this->phone = $phone;
	}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPhonesCompany($company)
    {
        // get phones bd
        $phones = Phone::where('company', $company)->get();

        foreach($phones as $key => $phone){
            //store results
            $data_array[] = array(
                'id' => $phone->id,
                'phone' => $phone->phone,
            );
        }
        
        if ($phones) {
            return json_encode($data_array);
        } else {
            return json_encode('Falha');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    $this->validate($request, [
	        'phone' => 'required|min:8|max:20',
	        'company' => 'required',
	    ]);

        $insert = $this->phone->create($request->all());

        if ($insert) {
            return response()->json(array('success' => true, 'last_insert_id' => $insert->id), 200);

        } else {
            return response()->json('Falha ao criar');
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
        $phoneDel = $this->phone->find($id);
        $delete = $phoneDel->delete();

        if ($delete) {
            return response()->json('Sucesso ao excluir phone');
        } else {
            return response()->json('Falha ao deletar');
        }
    }
}
