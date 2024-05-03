<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ApiResource;

class EmployeeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // $emp = Employee::findOrFail(100);
        // return  new EmployeeResource($emp);
        // لو ابعت حاجه واحده بس يعني سنجل اعمل نيو وبعجه اسم كلاس بتاع ريسورس

        // $employee = Employee::all();
        // return EmployeeResource::collection($employee);
        // لو ابعت حاجه واحده كل البيانات اكتب اسم الكلاس بتاع الريسورس واعمل جمبها كولكشن

        try {
            $emp = Employee::findOrFail(100);
        } catch (\Exception $e) {
            return  ApiResource::getResponse(404,"employee data Not found" );
        }
        return  ApiResource::getResponse(200,"employee data received success", new EmployeeResource($emp) );







    }
}
