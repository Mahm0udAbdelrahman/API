<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\RegionResource;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index()
    {
        $data = Region::paginate(3);
        if(count($data)>0)
        {
            if($data->total()>$data->perPage())
            {
                $customDate =
                [
                    'data' => RegionResource::collection($data),
                    'paginate_data' => [
                        'currentPage' => $data->currentPage(),
                        'perPage' => $data->perPage(),
                        'Total' => $data->total(),
                    ],
                    'links' =>[
                        'first' => $data->url(1),
                        'last' => $data->lastPage(),
                    ]

                ];
            }else
            {
                // if(count($data)== 3 ||  $data->total()==$data->perPage())
                // {
                //     $customDate = new RegionResource($data);

                // }
                $customDate = RegionResource::collection($data);
            }
            return ApiResource::getResponse(201, 'Data' , $customDate);
        }
        else
        {
            return ApiResource::getResponse(401,'No Data' , null);
        }
    }
}
