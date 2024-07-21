<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return
        [
            "Employee Code"=> $this->employee_id,
            "Employee First Name"=> $this->first_name,
            "Employee Last Name"=> $this->last_name,
            "Employee Email"=> $this->email,
            "Employee Salary"=> $this->salary,
            "Employee Department"=> $this->department->department_name,
        ];
    }
}
