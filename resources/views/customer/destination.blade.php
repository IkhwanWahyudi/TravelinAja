<div class="w-full h-full relative">
    <h1 class="font-bold text-3xl flex place-content-center "> Our Lovely Destination</h1>
    @foreach ($destination as $index => $dn)
        <div class="flex flex-row justify-center py-10  ">
            <div class="flex bg-white rounded-lg drop-shadow-2xl w-[90%] h-[400px]  p-7 justify-around gap-32">
                <div class="w-10 h-72 bg-gray-400 basis-1/5 flex place-content-center rounded-lg">
                    <p>Photo Destinasi</p>
                </div>
                <div class="flex flex-col gap-4 ">
                    <h2 class="font-bold text-2xl w-96">{{ $dn->destination }}</h2>
                    <p class="text-base text-gray-600 font-normal w-96">{{ $dn->description }}</p>
                    <div class="flex flex-row w-fit h-fit gap-32">
                        <p class="text-2xl font-extrabold text-[#F68712]">Rp {{ number_format($dn->price, 0, ',', '.') }}</p>
                        <a href="">
                            <button class="bg-[#1569A2] hover:bg-[#0e466b] px-4 py-2 text-white rounded-md">Buy
                                Now</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
