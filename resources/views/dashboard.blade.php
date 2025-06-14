@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {{-- Left: Welcome and Buttons --}}
        <div class="bg-white rounded-xl p-6 shadow h-full flex flex-col justify-between">
            <p class="text-sm text-gray-500 mb-1">Welcome Back,</p>

            <div class="flex gap-4 flex-wrap mt-2">
                <a href="#"
                class="bg-red-600 hover:bg-red-700 text-white px-5 py-3 rounded-lg flex items-center gap-3 shadow">
                    <i class="bi bi-telephone-forward-fill text-xl"></i>
                    Search Phone Extension
                </a>
                <a href="#"
                class="bg-red-600 hover:bg-red-700 text-white px-5 py-3 rounded-lg flex items-center gap-3 shadow">
                    <i class="bi bi-calendar-week-fill text-xl"></i>
                    Meeting Room Booking List
                </a>
            </div>
        </div>

        {{-- Right: Daily Quote --}}
        <div class="bg-red-700 text-white rounded-xl p-6 shadow relative overflow-hidden flex flex-col justify-between">
            <div class="z-10 relative">
                <h3 class="text-sm font-semibold mb-2">Daily Quotes</h3>
                <p class="text-sm leading-relaxed max-w-xs">
                    "Kecuali kalau jamnya rusak, ya, terus bergeraklah, bukan diam kayak patung."
                </p>
            </div>
            <img src="{{ asset('images/dashboard-quote.svg') }}"
                alt="Quote"
                class="absolute bottom-0 right-0 w-36 lg:w-44 opacity-90" />
        </div>
    </div>

    {{-- Employee Birthdays --}}
    <div class="mt-6 bg-white rounded-xl shadow p-6 grid grid-cols-1 lg:grid-cols-2 gap-6 items-center"
        style="background-image: url('{{ asset('images/dashboard-birthday.png') }}');
            background-repeat: no-repeat;
            background-position: right bottom;
            ">
        {{-- Left: Birthday List --}}
        <div>
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Employee’s Birthday</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @for ($i = 0; $i < 6; $i++)
                    <div class="flex items-center gap-3 bg-gray-50 rounded-lg p-3">
                        <img src="{{ asset('images/user-avatar.jpg') }}" alt="Avatar" class="w-12 h-12 rounded-full object-cover">
                        <div>
                            <p class="font-medium text-gray-800">Olyvia Irene Hunggianto</p>
                            <p class="text-sm text-gray-500">UI/UX Designer</p>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>

@endsection