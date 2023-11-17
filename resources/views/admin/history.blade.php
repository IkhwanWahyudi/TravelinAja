@extends('layouts.landing')

@section('content')
    @include('admin.navbar')
    <div class="w-full h-full flex">
        <div class="w-full flex flex-col bg-[#1569A2]">
            <div class="h-full m-4 p-8 bg-white rounded-lg drop-shadow-md">
                <p class="text-4xl font-bold mb-4 text-[#1569A2]">History Transaction</p>
                <hr><br>
                <div class="relative h-[500px] overflow-x-auto">
                    <table class="w-full relative text-sm text-left text-gray-500">
                        <thead class="text-xs sticky text-[#1569A2] uppercase bg-gray-300">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    NO
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    User
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Departure Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Destination
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Kendaraan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Duration
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Number of Passengers
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Total Price
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($history as $index => $hs)
                                <tr class="bg-white border-b hover:bg-[#1f80f0] text-black font-medium hover:text-white">
                                    <th scope="row" class="px-6 py-4 whitespace-nowrap">
                                        {{ $index + 1 }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $hs->user_id }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $hs->departure_date }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $hs->tujuan_id }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $hs->kendaraan_id }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $hs->duration }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $hs->number_of_passengers }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $hs->total_price }}
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
