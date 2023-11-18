<div class="relative w-full h-full">
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
                <a href="{{route('account')}}">
                    <p>{{ $account->name }}</p>
                </a>
            </div>
            <a href="{{ route('customer') }}"><p class="text-black p-3">Home</p></a>
            <p class="text-black p-3">Booking</p>
            <a href="{{ route('signout') }}">
                <button class="bg-[#F68712] px-5 py-3 rounded-lg text-white hover:bg-[#c47726] hover:text-black">Sign
                    Out</button>
            </a>
        </div>
    </nav>
</div>
