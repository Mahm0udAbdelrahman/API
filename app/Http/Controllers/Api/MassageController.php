<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MassageRequest;
use App\Models\Massage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use PhpParser\Node\Stmt\Catch_;

class MassageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(MassageRequest $request)
    {
    //    $data = $request->validated();
    //    try
    //    {
    //        Massage::create($data);
    //    }catch(ModelNotFoundException $ex)
    //    {
    //         return ApiResource::getResponse(404,'No Massage',[]);
    //    }
    //    return ApiResource::getResponse(201,'create Massage', [] );

    //======================================================================= OR
    $data = $request->validated();
    if($data)
    {
     Massage::create($data);
     return ApiResource::getResponse(201,'Create Massage',[]);
    }


    }
}
