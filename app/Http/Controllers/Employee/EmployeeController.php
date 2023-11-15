<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Ref_Department;
use App\Models\Ref_Employment_Status;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index() {
        $employees = Employee::all();
        return view('Employee.index', compact('employees'));
    }

    public function store(Request $request)
    {
        $valideData = Validator::make($request->all(), [
            'name'          =>  'required',
            'identity_no'   =>  'required|numeric|digits:12',
            'phone'         =>  'required|numeric|digits_between:10,11',
            'email'         =>  'required|email|unique:mysql.k_production.employee,email',
            'department'    =>  'required',
        ],
        [
            '*.required' => 'The field is required',
            'identity_no.digits' => 'Digits must be 12',
            'contact_no.numeric' => 'Only numeric allowed here',
            'contact_no.digits_between' => 'Digit must be in range 10 or 11',
            'email.email' => 'Email not valid',
        ]);

        if($valideData->fails()){
            return response()->json([
                'status'    => 422,
                'message'   => $valideData->messages(),
            ], 422);
        }
        else
        {
            $data = $valideData->validated();

            $name = $data['name'];
            $identity_no = $data['identity_no'];
            $phone_no = $data['phone'];
            $email = $data['email'];
            $department = $data['department'];

            Employee::create([
                'UUID' => Str::uuid()->toString(),
                'STAFF_ID' => generateStaffID($department),
                'NAME'  => $name,
                'IDENTITY_NO'  => $identity_no,
                'CONTACT_NO'  => $phone_no,
                'EMAIL'  => $email,
                'DEPARTMENT_CODE'  => $department,
                'EMPLOYMENT_sTATUS'  => 1,
            ]);

            return response()->json([
                'status'    => 200,
                'message'   => "Employee ".$name." successfully registered",
            ]);
        }
    }

    public function viewRegister() 
    {
        $department = Ref_Department::all();
        $employment_status = Ref_Employment_Status::all();

        return view('Employee.register', compact('department', 'employment_status'));
    }

    public function edit()
    {
        $uuid = request()->has('profile') ? request()->input('profile') : '';
        $department = Ref_Department::all();
        $employment_status = Ref_Employment_Status::all();

        if($uuid)
        {
            $employee = Employee::where('UUID', $uuid)->first();

            return view('Employee.edit', compact('employee', 'department', 'employment_status'));
        }
        else
        {
            return response()->json([
                'status'    => 422,
                'message'   => "Employee not found",
            ], 422);
        }
    }

    public function saveEdit(Request $request)
    {
        $uuid = request()->has('profile') ? request()->input('profile') : '';
        $current_employee = Employee::where('UUID', $uuid)->first();
        
        if($uuid == $current_employee->UUID)
        {
            $valideData = Validator::make($request->all(), [
                'name'          =>  'required',
                'phone'         =>  'required|numeric|digits_between:10,11',
                'email'         =>  'required|email',
                'department'    =>  'required',
                'emp_status'    =>  'required',
            ],
            [
                '*.required' => 'The field is required',
                'contact_no.numeric' => 'Only numeric allowed here',
                'contact_no.digits_between' => 'Digit must be in range 10 or 11',
                'email.email' => 'Email not valid',
            ]);
        }
        else
        {
            $valideData = Validator::make($request->all(), [
                'name'          =>  'required',
                'phone'         =>  'required|numeric|digits_between:10,11',
                'email'         =>  'required|email|unique:mysql.k_production.employee,email',
                'department'    =>  'required',
                'emp_status'    =>  'required',
            ],
            [
                '*.required' => 'The field is required',
                'contact_no.numeric' => 'Only numeric allowed here',
                'contact_no.digits_between' => 'Digit must be in range 10 or 11',
                'email.email' => 'Email not valid',
            ]);
        }

        if($valideData->fails()){
            return response()->json([
                'status'    => 422,
                'message'   => $valideData->messages(),
            ], 422);
        }
        else
        {
            $data = $valideData->validated();

            $name = $data['name'];
            $phone_no = $data['phone'];
            $email = $data['email'];
            $department = $data['department'];
            $emp_status = $data['emp_status'];

            if($department == $current_employee->DEPARTMENT_CODE)
            {
                $staff_id = $current_employee->STAFF_ID;
            }
            else
            {
                $staff_id = generateStaffID($department);
            }

            Employee::where('UUID', $uuid)->update([
                'NAME'  => $name,
                'STAFF_ID'  => $staff_id,
                'CONTACT_NO'  => $phone_no,
                'EMAIL'  => $email,
                'DEPARTMENT_CODE'  => $department,
                'EMPLOYMENT_STATUS'  => $emp_status,
            ]);

            return response()->json([
                'status'    => 200,
                'message'   => "Employee ".$name." successfully updated",
            ]);
        }
    }

    public function deleteEmployee()
    {
        $uuid = request()->has('profile') ? request()->input('profile') : '';

        if($uuid)
        {
            $employee_name = Employee::where('UUID', $uuid)->first()->NAME;
            $employee = Employee::where('UUID', $uuid)->delete();

            return response()->json([
                'status'    => 200,
                'message'   => "Employee ".$employee_name." successfully deleted",
            ]);
        }
        else
        {
            return response()->json([
                'status'    => 422,
                'message'   => "Fail to delete employee.",
            ], 422);
        }
    }
}
