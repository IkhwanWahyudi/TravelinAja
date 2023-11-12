<nav class="z-50 grid grid-flow-col w-full content-center justify-between sticky top-0 bg-white">
    <div class="w-full p-7 flex flex-row justify-around font-bold">
        <p class="text-black p-3 pr-0">Travelin</p>
        <p class="text-orange-600 p-3 pl-0">Aja</p>
    </div>
    <div class="w-full p-7 flex flex-row gap-10 justify-around font-bold">
        <p class="text-black p-3">Dashboard</p>
        <p class="text-black p-3">Pemesanan</p>
        <p class="text-black p-3">Users</p>
        <p class="text-black p-3">History Transaction</p>
        <a href="{{ route('signout') }}" class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 self-center">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
            </svg>
        </a>
    </div>
</nav>
