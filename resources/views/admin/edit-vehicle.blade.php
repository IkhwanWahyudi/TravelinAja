@extends('layouts.landing')

@section('content')
    @include('admin.navbar')
    <div class="w-full h-full flex">
        <div class="w-full h-screen flex flex-col bg-[#1C97E3]">
            <div class="w-auto h-auto m-8 p-10 bg-white flex flex-row rounded-lg drop-shadow-md self-center">
                <p class="text-4xl font-bold mb-4 text-[#1C97E3] text-left">Update Our Excellent Vehicle</p>
                <hr><br>
                <form action="{{ route('vehicle.store') }}" method="post" class="w-full flex flex-col items-center" enctype="multipart/form-data">
                    @csrf
                    <div class="h-auto flex flex-col gap-5">
                        <div class="flex flex-col">
                            <p class="w-[100px] text-[#1b4966] font-semibold">Type</p>
                            {{-- <p class="w-[20px] text-[#1b4966]">:</p> --}}
                            <input type="text" name="type" id=""
                                class="w-[500px] bg-slate-50 rounded-sm ring-1 ring-[#1b4966] focus:outline-none">
                        </div>
                        <div class="flex flex-col">
                            <p class="w-[100px] text-[#1b4966] font-semibold">License Plate</p>
                            {{-- <p class="w-[20px] text-[#1b4966]">:</p> --}}
                            <textarea name="license_plate" id=""
                                class="w-[500px] bg-slate-50 rounded-sm ring-1 ring-[#1b4966] focus:outline-none"></textarea>
                        </div>
                        <div class="flex flex-col">
                            <p class="w-[190px] text-[#1b4966] font-semibold">Maximum Passengers</p>
                            {{-- <p class="w-[20px] text-[#1b4966]">:</p> --}}
                            <input type="number" name="maximum_passengers" id="" min="1"
                                class="w-[500px] bg-slate-50 rounded-sm ring-1 ring-[#1b4966] focus:outline-none">
                        </div>
                        <div class="flex flex-col">
                            <p class="w-[100px] text-[#1b4966] font-semibold">Price</p>
                            {{-- <p class="w-[20px] text-[#1b4966]">:</p> --}}
                            <input type="number" name="price" id="" min="0"
                                class="w-[500px] bg-slate-50 rounded-sm ring-1 ring-[#1b4966] focus:outline-none">
                        </div>
                        {{-- <div class="flex flex-col">
                            <p class="w-[100px] text-[#5f7251]">Photo</p>
                            <p class="w-[20px] text-[#5f7251]">:</p>
                            <input type="file" name="image" id="" class="text-[#5f7251]">
                        </div> --}}
                    </div>
                    <button type="submit"
                        class="w-[200px] h-auto py-4 mt-16 text-white hover:text-gray-400 font-semibold bg-[#1C97E3] rounded-md flex justify-center items-center hover:bg-[#106499]">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
