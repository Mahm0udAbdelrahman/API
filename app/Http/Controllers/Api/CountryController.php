<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResource;
use App\Models\Country;

class CountryController extends Controller
{
    public function index()
    {
        // $data = Country::paginate(2);

        // if(count($data) > 0)
        // {
        //     return ApiResource::getResponse(201,'all data' ,$data);
        // }else{
        //     return ApiResource::getResponse(201,'single data' ,$data);
        // }

        // $data = Country::paginate(2);

        // if(count($data) > 0)
        // {
        //     if(count($data) == 1 )
        //     {
        //     return ApiResource::getResponse(201,'all data' , new CountryResource($data));

        //     }
        //     return ApiResource::getResponse(201,'all data' ,CountryResource::collection($data));
        // }else{
        //     return ApiResource::getResponse(401,'no data' ,[]);
        // }

        $data = Country::paginate(2);
        if(count($data)> 0)
         {
            if($data->total() > $data->perPage())
            {
                $customDate = [
                    'data' => CountryResource::collection($data),
                    'pagination_data' => [
                        'currentPage' => $data->currentPage(),
                        'perPage' => $data->perPage(),
                        'total' => $data->total(),
                        'links' => [
                            'first' => $data->url(1),
                            'last' => $data->lastPage(),
                        ],
                    ],

                ];

            }
            else
            {
                $customDate = CountryResource::collection($data);
            }

            return ApiResource::getResponse(201, 'all data', $customDate);
        } else {
            return ApiResource::getResponse(401, 'no data', []);
        }

    }
}
