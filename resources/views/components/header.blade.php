<div class="relative w-full h-screen">
    <nav id="scroll-bg" class="z-50 grid grid-flow-col w-full content-center justify-between fixed top-0 bg-transparent backdrop-blur-[2px]">
        <div class="w-full p-7 flex flex-row justify-around font-bold">
            <p class="text-[#1569A2] p-3 pr-0">Travelin</p>
            <p class="text-[#F68712] p-3 pl-0">Aja</p>
        </div>
        <div class="w-full p-7 flex flex-row gap-10 justify-around font-bold">
            <p class="text-black p-3">Home</p>
            <p class="text-black p-3">FaQ</p>
            <p class="text-black p-3">About</p>
            <a href="{{ route("signin") }}">
                <button class="bg-[#F68712] px-5 py-3 rounded-lg text-white hover:bg-[#c47726] hover:text-black">Sign In</button>
            </a>
        </div>
    </nav>
    <div class="absolute top-[40%] left-[9%] p-20 rounded-lg bg-[#ffffff42] flex flex-col"> {{-- bg-[#ffffff85] --}}
        <p class="text-5xl font-bold pb-2 self-center ">Explore the world, one adventure at a time</p>
        <p class="text-xl pb-5 opacity-80 self-center">discover new things in exploring the world and make your vacation memorable to remember forever</p>
        <button class="p-3 rounded-lg bg-[#F68712] hover:bg-[#c47726] font-bold w-fit self-center text-white hover:text-black">Adventure Now</button>
    </div>
    <img src="{{ asset('assets/images/home.jpg') }}" alt="" class="w-full h-full object-cover -z-10">
</div>
