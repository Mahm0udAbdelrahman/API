<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Helpers\ApiResource;
use App\Http\Resources\DepartmentResource;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function getSingleDepartmentDate($id)
    {
        try
        {
            $department = \App\Models\Department::where('department_id', $id)
            ->firstOrFail();
        }catch(\Exception $e)
        {
            return ApiResource::getResponse( '404',   $e->getMessage() , null  );

        }

        return ApiResource::getResponse( '200',  ' Date success' , new DepartmentResource($department));



    }

    public function index()
    {
        $departments = \App\Models\Department::with(['manager'])->get();

        return ApiResource::getResponse( 200 , 'all data ok' , DepartmentResource::collection($departments) );
    }


    public function getQueryData(Request $request)
    {
        try
        {
            $departments = \App\Models\Department::with(['manager'])->where('department_id',$request->id)->firstOrFail();
        }catch(\Exception $e)
        {
            return ApiResource::getResponse( '404',   $e->getMessage() , [] );

        }

        return ApiResource::getResponse( '200',  ' Date success' , new DepartmentResource($departments));



    }
}
