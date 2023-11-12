@extends('layouts.landing')
@section('content')
    <div class="relative w-full h-screen">
        <nav id="scroll-bg"
            class="z-50 grid grid-flow-col w-full content-center justify-between fixed top-0 bg-transparent backdrop-blur-[2px]">
            <div class="w-full p-7 flex flex-row justify-around font-bold">
                <p class="text-[#1569A2] p-3 pr-0">Travelin</p>
                <p class="text-[#F68712] p-3 pl-0">Aja</p>
            </div>
            <div class="w-full p-7 flex flex-row gap-10 justify-around font-bold">
                <div class="flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                    <p>{{ $account->name }}</p>
                </div>
                <p class="text-black p-3">Home</p>
                <p class="text-black p-3">FaQ</p>
                <p class="text-black p-3">About</p>
                <a href="{{ route('signout') }}">
                    <button class="bg-[#F68712] px-5 py-3 rounded-lg text-white hover:bg-[#c47726] hover:text-black">Sign
                        Out</button>
                </a>
            </div>
        </nav>
        <div class="absolute top-[40%] left-[9%] p-20 rounded-lg bg-[#ffffff42] flex flex-col"> {{-- bg-[#ffffff85] --}}
            <p class="text-5xl font-bold pb-2 self-center ">Explore the world, one adventure at a time</p>
            <p class="text-xl pb-5 opacity-80 self-center">discover new things in exploring the world and make your vacation
                memorable to remember forever</p>
            <button onclick="scrollBehavior()"
                class="p-3 rounded-lg bg-[#F68712] hover:bg-[#c47726] font-bold w-fit self-center text-white hover:text-black">Adventure
                Now</button>
        </div>
        <img src="{{ asset('assets/images/home.jpg') }}" alt="" class="w-full h-full object-cover -z-10">
    </div>

    <div id="targetScroll" class="w-full h-screen bg-gradient-to-b from-[#6FBAC3F0] to-white grid place-items-center">
        <p class="text-3xl font-bold">Suggested Location</p>
        <div class="grid grid-flow-col gap-12">
            <div class="w-[300px] h-[400px] bg-slate-900 rounded-xl">
                <img src="{{ asset('assets/images/top-destinations-1.jpg') }}" alt=""
                    class="w-full h-full object-cover -z-10 rounded-xl">
                <p class="flex justify-center font-bold">Nusa Penida</p>
            </div>
            <div class="w-[300px] h-[400px] bg-slate-900 rounded-xl">
                <img src="{{ asset('assets/images/top-destinations-2.jpg') }}" alt=""
                    class="w-full h-full object-cover -z-10 rounded-xl">
                <p class="flex justify-center font-bold">Coban Sewu</p>
            </div>
            <div class="w-[300px] h-[400px] bg-slate-900 rounded-xl">
                <img src="{{ asset('assets/images/top-destinations-3.jpg') }}" alt=""
                    class="w-full h-full object-cover -z-10 rounded-xl">
                <p class="flex justify-center font-bold">Lombok</p>
            </div>
        </div>
    </div>
    @include('components.footer')
    @include('components.script')
@endsection
