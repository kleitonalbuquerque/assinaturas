<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CitiesController extends Controller
{
    private $city;

	public function __construct(City $city)
	{
		$this->city = $city;
	}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCitiesState($state)
    {
        // get cities bd
        $cities = City::where('state', $state)->get();

        foreach($cities as $key => $city){
            //store results
            $data_array[] = array(
                'id' => $city->id,
                'name' => $city->name,
            );
        }
        
        if ($cities) {
            return json_encode($data_array);
        } else {
            return json_encode('Falha');
        }
    }
}
