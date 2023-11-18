@extends('layouts.landing')
@section('content')
    @include('customer.navbar')
    @include('customer.hero')
    <div id="targetScroll" class="w-full h-screen bg-gradient-to-b from-[#6FBAC3F0] to-white grid place-items-center pt-24">
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
    @include('customer.destination')
    @include('components.faq')
    @include('components.footer')
    @include('components.script')
@endsection
