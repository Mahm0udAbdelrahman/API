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
            "Employee code"=> $this->employee_id,
            "Employee name"=> $this->first_name,
            "Employee email"=> $this->email,
            "Employee salary"=> $this->salary,
            "Employee department"=> $this->department->department_name,
        ];
    }
}
