@extends('layouts.landing')

@section('content')
    @include('admin.navbar')
    <div class="w-full h-full flex">
        <div class="w-full flex flex-col bg-[#985d44]">
            <div class="h-auto m-4 p-8 bg-white rounded-lg drop-shadow-md">
                <p class="text-4xl font-bold mb-4 text-[#985d44]">Booking</p>
                <hr><br>
                <div class="w-full h-auto flex justify-end">
                    {{-- <a href="{{ route('add') }}"> --}}
                    <button
                        class="px-4 py-2 bg-[#5f7251] hover:bg-[#546548] rounded-md text text-black hover:text-white font-semibold">Add</button>
                    {{-- </a> --}}
                </div><br>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-[#985d44] uppercase bg-gray-300">
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
                                <th scope="col" class="px-6 py-3">
                                    Payment Receipt
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($history as $index => $hs)
                                <tr class="bg-white border-b hover:bg-[#5f7251] text-black font-medium hover:text-white">
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
                                    <td class="px-6 py-4">
                                        {{ $hs->payment_receipt }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="w-full h-auto flex justify-around">
                                            {{-- <a href="{{ route('admin.edit', $hs->id) }}"> --}}
                                            <button
                                                class="px-4 py-2 bg-yellow-300 rounded-md text-black hover:bg-yellow-500 hover:text-white font-semibold">Edit</button>
                                            {{-- </a> --}}
                                            {{-- <form action="{{ route('admin.delete', $hs->id) }}" method="post">
                                                @csrf --}}
                                            <button
                                                class="px-4 py-2 bg-red-600 rounded-md text-black hover:bg-red-800 hover:text-white font-semibold">Delete</button>
                                            {{-- </form> --}}
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
