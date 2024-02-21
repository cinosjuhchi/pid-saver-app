<style>
        .zoomable-image {
            cursor: zoom-in;
            transition: transform 0.2s;
        }

        .zoomable-image.zoomed {
            cursor: zoom-out;
            transform: scale(1.5);
        }
</style>

<div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-y-5 gap-x-4 mt-6">

        <a href="#" id="lihat-detail" class="cursor-pointer group">
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

        <a href="#" id="lihat-detail" class="cursor-pointer group">
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

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 hidden bg-black bg-blend-overlay bg-opacity-80">
        <div class="nav-modal flex justify-between items-center px-6 pt-4">
            <div class="kanan flex text-white gap-3 font-bold text-2xl">
                <button id="tutup" class="cursor-pointer">
                    <i class="bi bi-arrow-left"></i>
                </button>
                <h1>Nama File</h1>
            </div>
            <div class="kiri flex gap-4  text-white text-2xl">
                <button class="hover:bg-white hover:text-black transition-all rounded-full px-3 py-2">
                <i class="bi bi-printer"></i>
                </button>

                <button class="hover:bg-white hover:text-black transition-all rounded-full px-3 py-2">
                <i class="bi bi-star"></i>
                </button>

                <button class="hover:bg-white hover:text-black transition-all rounded-full px-3 py-2">
                <i class="bi bi-download"></i>
                </button>

                <button class="hover:bg-white hover:text-black transition-all rounded-full px-3 py-2">
                <i class="bi bi-info-lg"></i>
                </button>
            </div>
        </div>
        <div class="flex items-end justify-center lg:h-screen">
            <div class="max-w-lg mx-auto">
                <img id="modal-image" src="{{ asset('resources/image/fotojdn.png') }}" alt="Gambar" class="zoomable-image rounded-md h-max w-max scale-50 object-cover">
            </div>
        </div>
    </div>

   <!-- JavaScript -->
<script>
    // Ambil elemen gambar modal dan tombol-tombol
    const modalImage = document.getElementById('modal-image');
    const tutupButton = document.getElementById('tutup');

    // Tampilkan modal saat tombol "Lihat Detail" ditekan
    document.getElementById('lihat-detail').addEventListener('click', function () {
        document.getElementById('modal').classList.remove('hidden');
    });


    // Sembunyikan modal saat tombol "Tutup" ditekan
    tutupButton.addEventListener('click', function () {
        document.getElementById('modal').classList.add('hidden');
    });

    // Hapus transformasi saat gambar modal diklik
    modalImage.addEventListener('click', function () {
        modalImage.classList.toggle('zoomed'); // Menggunakan toggle untuk memperbolehkan zoom in dan zoom out
    });
</script>


</div>