@extends('layouts.base', ['title' => __('Employee List')])

@section('content')
    <x-general.grid mobile="1" gap="5" sm="1" md="1" lg="1" xl="1" class="col-span-12">
        <div class="flex items-center space-x-2">
            <h1 class="text-2xl font-bold">Employees</h1>
        </div>
        <x-general.card class="px-4 bg-white">
            <div class="flex flex-col justify-between py-4 border-b-2 lg:flex-row">
                <div>
                    <div x-data="{ Open : false }">
                        <a href="{{ route('add-new-employee') }}" class="px-4 py-2 font-bold text-white bg-green-500 rounded hover:bg-green-600">
                            Register New Employee
                        </a>
                    </div>
                </div>
            </div>
            <div class="pb-4 space-y-4">
                <x-table.table>
                    <x-slot name="thead">
                        <x-table.table-header class="text-left w-52" value="No." sort="" />
                        <x-table.table-header class="text-left w-52" value="Staff ID" sort="" />
                        <x-table.table-header class="text-left" value="Name" sort="" />
                        <x-table.table-header class="text-left" value="Identity No." sort="" />
                        <x-table.table-header class="text-left" value="Contact No." sort="" />
                        <x-table.table-header class="text-left" value="Email" sort="" />
                        <x-table.table-header class="text-left" value="Department" sort="" />
                        <x-table.table-header class="text-left" value="Employment Status" sort="" />
                        <x-table.table-header class="text-left" value="Actions" sort="" />
                    </x-slot>
                    <x-slot name="tbody">
                        @forelse ($employees as $employee)
                            <tr>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 uppercase">
                                    {{ $loop->iteration }}
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 uppercase">
                                    {{ $employee->STAFF_ID }}
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 uppercase">
                                    {{ $employee->NAME }}
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 uppercase">
                                    {{ $employee->IDENTITY_NO }}
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 uppercase">
                                    {{ $employee->CONTACT_NO }}
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700">
                                    {{ $employee->EMAIL }}
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 uppercase">
                                    {{ $employee->department->DESCRIPTION }}
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 uppercase">
                                    {{ $employee->employmentStatus->DESCRIPTION }}
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('edit-employee') }}?profile={{ $employee->UUID }}" class="flex items-center p-2 text-xs text-white bg-orange-500 rounded-full hover:bg-orange-600 focus:outline-none tooltipbtn" 
                                            data-title="Update"
                                            data-placement="top">
                                            <x-heroicon-o-pencil class="w-4 h-4 text-white"/>
                                        </a>

                                        <a href="{{ route('delete-employee') }}?profile={{ $employee->UUID }}" class="flex items-center p-2 text-xs text-white bg-red-500 rounded-full hover:bg-red-600 focus:outline-none tooltipbtn"
                                            data-title="Delete"
                                            data-placement="top">
                                            <x-heroicon-o-trash class="w-4 h-4 text-white"/>
                                        </a>
                                        <form action="{{ route('delete-employee') }}?profile={{ $employee->UUID }}" method="POST">
                                            @method('delete')
                                        </form>
                                    </div>
                                </x-table.table-body>
                            </tr>
                        @empty
                            <tr>
                                <x-table.table-body colspan="9" class="text-center">
                                    NO INFORMATION
                                </x-table.table-body>
                            </tr>
                        @endforelse
                    </x-slot>
                </x-table.table>
            </div>
        </x-general.card>
    </x-general.grid>
@endsection
