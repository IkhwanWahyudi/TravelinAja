@extends('layouts.landing')
@section('content')
@include('customer.navbar')
<div class="w-full h-full flex">
    <div class="w-full h-screen flex flex-col bg-[#1C97E3] pt-16">
        <div class="w-auto h-auto m-16 px-32 py-8 bg-white flex flex-row rounded-lg drop-shadow-md self-center">
            <h2 class="font-bold text-3xl text-[#2b75a3]">Your Booking Description</h2>
            <form action="" method="post"
                class="w-full flex flex-col items-center" enctype="multipart/form-data">
                @csrf
                <div class="h-auto flex flex-col gap-6">
                    <div class="flex flex-row gap-6">
                        <div class="flex flex-col">
                            <p class="w-[100px] text-[#1b4a68] font-semibold text-xl">Destination</p>
                            {{-- <p class="w-[20px] text-[#1b4a68]">:</p> --}}
                            <p class="">Destination</p>
                        </div>
                        <div class="flex flex-col pl-72">
                            <p class="w-[140px] text-[#1b4a68] font-semibold text-xl">Departure Date</p>
                            {{-- <p class="w-[20px] text-[#1b4a68]">:</p> --}}
                            <p class="">Date</p>
                        </div>
                    </div>

                    <div class="flex flex-row gap-6">
                        <div class="flex flex-col">
                            <p class="w-[100px] text-[#1b4a68] font-semibold text-xl">Vehicle</p>
                            {{-- <p class="w-[20px] text-[#1b4a68]">:</p> --}}
                            <p class="">Vehicle</p>
                        </div>
                        <div class="flex flex-col pl-72">
                            <p class="w-[220px] text-[#1b4a68] font-semibold text-xl">Number of Passengers</p>
                            {{-- <p class="w-[20px] text-[#1b4a68]">:</p> --}}
                            <p class="">Jumlah Penumpang</p>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <p class="w-[100px] text-[#1b4a68] font-semibold text-xl">Duration</p>
                        <p>Duration</p>
                        {{-- <p class="w-[20px] text-[#1b4a68]">:</p> --}}
                    </div>
                    <div class="flex flex-row gap-6">
                        <div class="flex flex-col">
                            <p class="w-[100px] text-[#1b4a68] font-semibold text-xl">Total Price</p>
                            {{-- <p class="w-[20px] text-[#1b4a68]">:</p> --}}
                            <p class="font-bold text-orange-500"> Rp Price</p>
                        </div>
                        <div class="flex flex-col pl-72">
                            <p class="w-[140px] text-[#1b4a68] font-semibold text-xl">Status </p>
                            {{-- <p class="w-[20px] text-[#1b4a68]">:</p> --}}
                            <p class="">Status</p>
                        </div>
                    </div>
                </div>
                <button type="submit"
                    class="w-[200px] h-auto py-4 mt-16 text-black hover:text-white font-bold bg-[#1C97E3] rounded-md flex justify-center items-center hover:bg-[#064a75]">Finish Trip</button>
            </form>
        </div>
    </div>
</div>
@endsection
