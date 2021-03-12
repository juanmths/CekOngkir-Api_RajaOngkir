<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::withHeaders([
            'Key' => '3734c13ea7f4995cf8ba789d02e60f4c'
            ])->get('https://api.rajaongkir.com/starter/city');
        
        $city  =  $response['rajaongkir']['results'];

        foreach($city as $city){
            $data_city[] = [
                'id' => $city['city_id'],
                'province_id' => $city['province_id'],
                'type' => $city['type'],
                'city_name' => $city['city_name'],
                'postal_code' => $city['postal_code'],
            ];
        }
        City::insert($data_city);
    }
}
