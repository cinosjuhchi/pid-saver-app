<div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-y-5 gap-x-4 mt-6">

        <a href="{{ route('preview') }}" id="lihat-detail" class="cursor-pointer group">
            <div class="card-file bg-white rounded-md p-3 group-hover:bg-gray-200 transition-all">
                <img src="{{ asset('resources/image/fotojdn.png') }}" alt="" class="rounded-md h-60 object-cover w-full">
                <div class="title flex items-center justify-between mt-3">
                    <div class="title">
                        <h1 class="font-bold text-sm">Nama File</h1>
                        <p class="text-xs text-gray-400">21 February 2024</p>
                    </div>
                    <button class="hover:bg-white rounded-full transition">
                        <i class="bi bi-three-dots-vertical text-xl"></i>
                    </button>
                </div>
            </div>
        </a>
</div>