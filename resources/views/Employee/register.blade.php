@extends('layouts.base', ['title' => __('Register New Employee')])

@section('content')
    <div class="space-y-12">
        <form method="POST" action="{{ route('register-employee') }}" enctype="multipart/form-data" accept-charset="utf-8">
            @csrf
            <div class="p-8 space-y-8 bg-white rounded-lg">
                <p class="font-extrabold">Personal Details</p>
                <div class="grid grid-cols-4 gap-4">
                    <label>Name</label>
                    <input type="text" class="px-4 py-2 border-2 border-gray-500 rounded-lg text-gray-700 bg-white hover:bg-gray-200" id="name" name="name" />
                    <label>Identity No.</label>
                    <input type="text" class="px-4 py-2 border-2 border-gray-500 rounded-lg text-gray-700 bg-white hover:bg-gray-200" id="identity_no" name="identity_no"/>
                    <label>Contact No.</label>
                    <input type="text" class="px-4 py-2 border-2 border-gray-500 rounded-lg text-gray-700 bg-white hover:bg-gray-200" id="phone" name="phone" />
                    <label>Email</label>
                    <input type="text" class="px-4 py-2 border-2 border-gray-500 rounded-lg text-gray-700 bg-white hover:bg-gray-200" id="email" name="email" />
                    <label>Department</label>
                    <select class="px-4 py-2 border-2 border-gray-500 rounded-lg text-gray-700 bg-white hover:bg-gray-200" id="department" name="department" >
                        @foreach($department as $item)
                            <option value="{{ $item->CODE }}"> {{ $item->DESCRIPTION }} </option>
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