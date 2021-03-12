<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\City;
use App\Province;


class getApi extends Controller
{
    public function index(Request $request){

        if($request->origin && $request->destination && $request->weight && $request->courier){
            $origin = $request->origin;
            $destination = $request->destination;
            $weight = $request->weight;
            $courier = $request->courier;

            $response = Http::asForm()->withHeaders([
                'Key' => '3734c13ea7f4995cf8ba789d02e60f4c'
                ])->post('https://api.rajaongkir.com/starter/cost',[
                    'origin' => $origin,
                    'destination' => $destination,
                    'weight' => $weight,
                    'courier' => $courier,
                ]);
            
            $cekOngkir = $response['rajaongkir']['results'][0]['costs'];
        }else{
            $origin = '';
            $destination = '';
            $weight = '';
            $courier = '';
            $cekOngkir = null;
        }
        
            $provinsi = Province::all();
            return view('ongkir', compact('provinsi','cekOngkir'));
    }

    public function ajax($id){
        $city = City::where('province_id','=', $id)->pluck('city_name','id');

        return json_encode($city);
    }
}
