@extends('layouts.landing')
@section('content')
    @include('customer.navbar')
    <div class="flex flex-col justify-center place-items-center py-20">
        <div class="flex flex-col py-4">
            <h1 class=" font-bold text-4xl ">{{ $tujuans->destination }}</h1>
        </div>
        <div
            class="flex bg-white rounded-lg hover:drop-shadow-2xl w-[80%] h-[400px] place-items-center p-7 justify-center gap-32">
            <div class="w-10 h-72 bg-gray-400 basis-1/5 flex place-content-center rounded-lg">
                <img src="{{ asset('assets/images/tujuan/' . $tujuans->image) }}" alt=""
                    class="w-full h-full rounded-lg">
            </div>
            <div class="flex flex-col gap-4">
                <p class="text-base text-gray-600 font-normal w-96">{{ $tujuans->description }}</p>
                <form action="{{ route('user.booking') }}" method="post">
                    @csrf
                    <div class="flex flex-row w-full justify-around mt-2">
                        <select name="vehicle" class="w-40 bg-slate-100 rounded-md p-2">
                            @foreach ($kendaraan as $kd)
                                <option value="{{ $kd->id }}">{{ $kd->type }}</option>
                            @endforeach
                        </select>
                        <div class="flex flex-row w-full justify-center gap-3 place-items-center">
                            <p class="flex justify-center w-fit">Passengers</p>
                            <input type="number" name="passengers" min="1" class="w-24 p-2 bg-slate-100 rounded-md">
                        </div>
                    </div>
                    <div class="flex flex-row w-full justify-around mt-2">
                        <div class="flex flex-col">
                            <p>Date</p>
                            <input type="date" name="departure_date" id="departure_date">
                        </div>
                        <div class="flex flex-col w-full justify-center gap-3 place-items-center">
                            <p class="flex justify-center w-fit">Duration</p>
                            <div class="flex flex-row justify-center gap-3 place-items-center">
                                <input type="number" name="duration" min="1"
                                    class="w-24 p-2 bg-slate-100 rounded-md">
                                <p>Days</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row w-fit h-fit gap-32">
                        <p class="text-2xl font-extrabold text-[#F68712]" id="">Rp.
                            {{ number_format($tujuans->price, 0, ',', '.') }}
                        </p>
                    </div>
                    <input type="hidden" name="total_price" id="" value="0">
                    <input type="hidden" name="tujuan_id" value="{{ $tujuans->id }}">
                    <input type="hidden" name="user" value="{{ $account->id }}">
                    <button type="submit"
                        class="bg-[#1569A2] hover:bg-[#0e466b] px-4 py-2 text-white rounded-md w-full">Next</button>
                </form>
            </div>
        </div>
    </div>
    @include('components.footer')
    @include('components.script')
@endsection
