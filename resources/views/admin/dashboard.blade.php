@extends('layouts.landing')

@section('content')
    @include('admin.navbar')
    <div class="w-full h-full flex">
        <div class="w-full flex flex-col bg-[#1569A2]">
            <div class="h-full m-4 p-8 bg-white rounded-lg drop-shadow-md">
                <p class="text-4xl font-bold mb-4 text-[#1569A2]">Destinations</p>
                <hr><br>
                <div class="w-full h-auto flex justify-end">
                    <a href="{{ route('add-des') }}">
                    <button
                        class="px-4 py-2 bg-[#04AA6D] hover:bg-[#03915d] rounded-md text text-black hover:text-white font-semibold">Add</button>
                    </a>
                </div><br>
                <div class="relative h-[500px] overflow-x-auto">
                    <table class="w-full relative text-sm text-left text-gray-500">
                        <thead class="text-xs sticky text-[#1569A2] uppercase bg-gray-300">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Destination
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Description
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Price
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($destination as $index => $dn)
                                <tr class="bg-white border-b hover:bg-[#1f80f0] text-black font-medium hover:text-white">
                                    <th scope="row" class="px-6 py-4 whitespace-nowrap">
                                        {{ $index + 1 }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $dn->destination }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $dn->description }}
                                    </td>
                                    <td class="px-6 py-4">
                                        Rp {{ number_format($dn->price, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="w-full h-auto flex justify-around">
                                            <a href="{{ route('destination.edit', $dn->id) }}">
                                            <button
                                                class="px-4 py-2 bg-yellow-300 rounded-md text-black hover:bg-yellow-500 hover:text-white font-semibold">Edit</button>
                                            </a>
                                            <form action="{{ route('destination.delete', $dn->id) }}" method="post">
                                                @csrf
                                            <button
                                                class="px-4 py-2 bg-red-600 rounded-md text-black hover:bg-red-800 hover:text-white font-semibold">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full h-full flex">
        <div class="w-full flex flex-col bg-[#1569A2]">
            <div class="h-full m-4 p-8 bg-white rounded-lg drop-shadow-md">
                <p class="text-4xl font-bold mb-4 text-[#1569A2]">Vehicles</p>
                <hr><br>
                <div class="w-full h-auto flex justify-end">
                    <a href="{{ route('add-veh') }}">
                    <button
                        class="px-4 py-2 bg-[#04AA6D] hover:bg-[#03915d] rounded-md text text-black hover:text-white font-semibold">Add</button>
                    </a>
                </div><br>
                <div class="relative h-[500px] overflow-x-auto">
                    <table class="w-full relative text-sm text-left text-gray-500">
                        <thead class="text-xs sticky text-[#1569A2] uppercase bg-gray-300">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Jenis
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Plat
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Maksimal Penumpang
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Price
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kendaraan as $index => $kd)
                                <tr class="bg-white border-b hover:bg-[#1f80f0] text-black font-medium hover:text-white">
                                    <th scope="row" class="px-6 py-4 whitespace-nowrap">
                                        {{ $index + 1 }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $kd->type }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $kd->license_plate }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $kd->maximum_passengers }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ number_format($kd->price, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="w-full h-auto flex justify-around">
                                            <a href="{{ route('vehicle.edit', $kd->id) }}">
                                            <button
                                                class="px-4 py-2 bg-yellow-300 rounded-md text-black hover:bg-yellow-500 hover:text-white font-semibold">Edit</button>
                                            </a>
                                            <form action="{{ route('kendaraan.delete', $kd->id) }}" method="post">
                                                @csrf
                                            <button
                                                class="px-4 py-2 bg-red-600 rounded-md text-black hover:bg-red-800 hover:text-white font-semibold">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
