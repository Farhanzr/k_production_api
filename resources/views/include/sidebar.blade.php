<!-- Desktop sidebar -->
<link rel="stylesheet" href="{{ asset('css/sidebar.css')}}" />
{{-- <x-sidebar-loading/> --}}
<aside
    x-show="isSideMenuOpenDesktop"
    x-transition:enter="transition ease-in-out duration-300"
    x-transition:enter-start="opacity-0 transform -translate-x-20"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0 transform -translate-x-20"
    @keydown.escape="closeSideMenuDesktop"
    class="relative z-20 flex-shrink-0 hidden px-2 overflow-y-auto bg-teal-600 md:block" id="sidebar">

    <div class="mb-6 animate" id="nav-items">
        <div class="text-yellow-300">
            <div class="p-2 my-2 bg-gray-200 rounded-md">
                <div class="flex justify-center ">
                    <img src="{{asset('img/power_button.png')}}" class="w-16 h-16"  />
                </div>
            </div>
            <div>
                <ul class="mt-6 leading-10">
                    <! -- Start Employee Section -->
                    <x-sidebar.dropdown-nav-item active="open" title="EMPLOYEE" uri="employee/*">
                        <x-slot name="icon">
                            <x-heroicon-o-user-group class="w-7 h-7" />
                        </x-slot>
                        <div class="leading-5">
                            <x-sidebar.dropdown-item title="Register New" href="{{ route('add-new-employee') }}" uri="employee/add-new-employee">
                                <x-slot name="icon">
                                    <x-heroicon-o-cube class="w-5 h-5" />
                                </x-slot>
                            </x-sidebar.dropdown-item>
                            <x-sidebar.dropdown-item title="Employee List" href="{{ route('employee-list') }}" uri="employee/employee">
                                <x-slot name="icon">
                                    <x-heroicon-o-cube class="w-5 h-5" />
                                </x-slot>
                            </x-sidebar.dropdown-item>
                        </div>
                    </x-sidebar.dropdown-nav-item>
                    <! -- End Employee Section -->
                </ul>
            </div>
        </div>
    </div>

</aside>


