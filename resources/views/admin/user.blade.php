@extends('layouts.landing')

@section('content')
    @include('admin.navbar')
    <div class="w-full h-full flex">
        <div class="w-full flex flex-col bg-[#1569A2]">
            <div class="h-full m-4 p-8 bg-white rounded-lg drop-shadow-md">
                <p class="text-4xl font-bold mb-4 text-[#1569A2]">Users</p>
                <hr><br>
                <div class="relative h-[500px] overflow-x-auto">
                    <table class="w-full relative text-sm text-left text-gray-500">
                        <thead class="text-xs sticky text-[#1569A2] uppercase bg-gray-300">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    NIK
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Address
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Username
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $index => $us)
                                <tr class="bg-white border-b hover:bg-[#1f80f0] text-black font-medium hover:text-white">
                                    <th scope="row" class="px-6 py-4 whitespace-nowrap">
                                        {{ $index + 1 }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $us->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $us->nik }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $us->address }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $us->username }}
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
