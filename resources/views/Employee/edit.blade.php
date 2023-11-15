{{-- 
    <body>
        <div class="container py-5">
            <header class="text-center text-white">
                <h1 class="display-4">Edit Employees</h1>
            </header>
            <div class="row py-5">
                <div class="col-lg-10 mx-auto">
                    <div class="card rounded shadow border-0">
                    <div class="card-body p-5 bg-white rounded">
                        <form method="POST" action="{{ route('post-edit') }}?profile={{ $employee->UUID }}" enctype="multipart/form-data" accept-charset="utf-8">
                            @csrf
                            <div class="flex justify-center space-x-4">
                                <label>Name</label>
                                <input type="text" class="px-4 py-2 border-2 border-gray-500 rounded-lg text-gray-700 bg-gray-200 hover:bg-gray-300" id="name" name="name" value="{{ $employee->NAME }}" />
                                <label>Employee ID</label>
                                <input type="text" class="px-4 py-2 border-2 border-gray-500 rounded-lg text-gray-700 bg-gray-200 hover:bg-gray-300" id="staff_id" name="staff_id" value="{{ $employee->STAFF_ID }}" disabled />
                                <label>Identity No.</label>
                                <input type="text" class="px-4 py-2 border-2 border-gray-500 rounded-lg text-gray-700 bg-gray-200 hover:bg-gray-300" id="identity_no" name="identity_no" value="{{ $employee->IDENTITY_NO }}" disabled/>
                                <label>Contact No.</label>
                                <input type="text" class="px-4 py-2 border-2 border-gray-500 rounded-lg text-gray-700 bg-gray-200 hover:bg-gray-300" id="phone" name="phone" value="{{ $employee->CONTACT_NO }}" />
                                <label>Email</label>
                                <input type="text" class="px-4 py-2 border-2 border-gray-500 rounded-lg text-gray-700 bg-gray-200 hover:bg-gray-300" id="email" name="email" value="{{ $employee->EMAIL }}" />
                                <label>Department</label>
                                <select class="px-4 py-2 border-2 border-gray-500 rounded-lg text-gray-700 bg-gray-200 hover:bg-gray-300" id="department" name="department" >
                                    @foreach($department as $item)
                                        <option value="{{ $item->CODE }}" @if($item->CODE == $employee->DEPARTMENT_CODE) selected @endif>
                                            {{ $item->DESCRIPTION }}
                                        </option>
                                    @endforeach
                                </select>
                                <label>Employment Status</label>
                                <select class="px-4 py-2 border-2 border-gray-500 rounded-lg text-gray-700 bg-gray-200 hover:bg-gray-300" id="emp_status" name="emp_status" value="{{ $employee->employmentStatus->DESCRIPTION }}">
                                    @foreach($employment_status as $item)
                                        <option value="{{ $item->CODE }}" @if($item->CODE == $employee->EMPLOYMENT_STATUS) selected @endif>
                                            {{ $item->DESCRIPTION }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="submit" name="submit" class="px-4 py-2 border-2 border-blue-500 rounded-lg text-white bg-blue-600 hover:bg-blue-700" value="Submit" />
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </body> --}}

@extends('layouts.base', ['title' => __('Employee List')])
<style>
    .readonly {
        background-color: rgb(209 213 219);
    }
</style>
@section('content')
<div class="space-y-12">
    <form method="POST" action="{{ route('post-edit') }}?profile={{ $employee->UUID }}" enctype="multipart/form-data" accept-charset="utf-8">
        @csrf
        <div class="p-8 space-y-8 bg-white rounded-lg">
            <p class="font-extrabold">Personal Details</p>
            <div class="grid grid-cols-4 gap-4">
                <label>Name</label>
                <input type="text" class="px-4 py-2 border-2 border-gray-500 rounded-lg text-gray-700 bg-white hover:bg-gray-200" id="name" name="name" value="{{ $employee->NAME }}" />
                <label>Employee ID</label>
                <input type="text" class="px-4 py-2 border-2 border-gray-500 rounded-lg text-gray-700 bg-gray-200 hover:bg-gray-200" id="staff_id" name="staff_id" value="{{ $employee->STAFF_ID }}" readonly />
                <label>Identity No.</label>
                <input type="text" class="px-4 py-2 border-2 border-gray-500 rounded-lg text-gray-700 bg-gray-200 hover:bg-gray-200" id="identity_no" name="identity_no" value="{{ $employee->IDENTITY_NO }}" readonly/>
                <label>Contact No.</label>
                <input type="text" class="px-4 py-2 border-2 border-gray-500 rounded-lg text-gray-700 bg-white hover:bg-gray-200" id="phone" name="phone" value="{{ $employee->CONTACT_NO }}" />
                <label>Email</label>
                <input type="text" class="px-4 py-2 border-2 border-gray-500 rounded-lg text-gray-700 bg-white hover:bg-gray-200" id="email" name="email" value="{{ $employee->EMAIL }}" />
                <label>Department</label>
                <select class="px-4 py-2 border-2 border-gray-500 rounded-lg text-gray-700 bg-white hover:bg-gray-200" id="department" name="department" >
                    @foreach($department as $item)
                        <option value="{{ $item->CODE }}" @if($item->CODE == $employee->DEPARTMENT_CODE) selected @endif>
                            {{ $item->DESCRIPTION }}
                        </option>
                    @endforeach
                </select>
                <label>Employment Status</label>
                <select class="px-4 py-2 border-2 border-gray-500 rounded-lg text-gray-700 bg-white hover:bg-gray-200" id="emp_status" name="emp_status" value="{{ $employee->employmentStatus->DESCRIPTION }}">
                    @foreach($employment_status as $item)
                        <option value="{{ $item->CODE }}" @if($item->CODE == $employee->EMPLOYMENT_STATUS) selected @endif>
                            {{ $item->DESCRIPTION }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="flex justify-end">
                <input type="submit" name="submit" class="px-4 py-2 border-2 border-blue-500 rounded-lg text-white bg-blue-600 hover:bg-blue-700" value="Submit" />
            </div>
        </div>
    </form>
</div>
@endsection