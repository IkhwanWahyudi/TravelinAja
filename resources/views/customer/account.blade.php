@extends('layouts.landing')
@section('content')
    @include('customer.navbar')

    <div class="w-full h-full flex">
        <div class="w-full h-screen flex flex-col bg-[#ffffff] py-12">
            <div class="w-auto h-auto m-16 p-10 bg-[#cfcfcf] flex flex-row rounded-lg drop-shadow-md self-center">
                <div class="flex flex-col">

                </div>
                <form action="{{route('user.update', $account->id)}}" method="post" class="w-full flex flex-col items-center" enctype="multipart/form-data">
                    @csrf
                    <div class="h-auto flex flex-col gap-6">
                        <div class="flex flex-row gap-6">
                            <div class="flex flex-col">
                                <p class="w-[100px] text-[#1b4a68] font-semibold">Full Name</p>
                                {{-- <p class="w-[20px] text-[#1b4a68]">:</p> --}}
                                <input type="text" name="name" id="" value="{{$account->name}}"
                                    class="w-[300px] bg-slate-50 rounded-sm ring-1 p-1 ring-[#5f7251] focus:outline-none">
                            </div>
                            <div class="flex flex-col">
                                <p class="w-[100px] text-[#1b4a68] font-semibold">Username</p>
                                {{-- <p class="w-[20px] text-[#1b4a68]">:</p> --}}
                                <input type="text" name="username" id="" value="{{$account->username}}" disabled
                                    class="w-[200px] bg-slate-50 rounded-sm ring-1 p-1 ring-[#5f7251] focus:outline-none">
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <p class="w-[100px] text-[#1b4a68] font-semibold">Address</p>
                            {{-- <p class="w-[20px] text-[#1b4a68]">:</p> --}}
                            <textarea name="address" id=""
                                class="w-[525px] bg-slate-50 rounded-sm ring-1 p-1 ring-[#5f7251] focus:outline-none">{{$account->address}}</textarea>
                        </div>
                        <div class="flex flex-col">
                            <p class="w-[100px] text-[#1b4a68] font-semibold">NIK</p>
                            {{-- <p class="w-[20px] text-[#1b4a68]">:</p> --}}
                            <input type="number" name="nik" id="" min="0" value="{{$account->nik}}"
                                class="w-[525px] bg-slate-50 rounded-sm ring-1 p-1 ring-[#5f7251] focus:outline-none">
                        </div>
                    </div>
                    <button type="submit"
                        class="w-[200px] h-auto py-4 mt-16 text-black hover:text-white font-bold bg-[#1C97E3] rounded-md flex justify-center items-center hover:bg-[#064a75]">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
