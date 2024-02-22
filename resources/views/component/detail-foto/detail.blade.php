<!-- Modal -->
    <div id="modal" class="fixed inset-0 bg-black bg-blend-overlay bg-opacity-80">
        <div class="nav-modal flex justify-between items-center px-6 pt-4">
            <div class="kanan flex text-white gap-3 font-bold text-2xl">
                <button id="tutup" onclick="goBack()" class="cursor-pointer">
                    <i class="bi bi-arrow-left"></i>
                </button>
                <h1>{{ $photo->title }}</h1>
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
                <img id="modal-image" src="{{ asset('storage/' . $photo->image_location) }}" alt="Gambar" class="zoomable-image rounded-md h-max w-max scale-50 object-cover">
            </div>
        </div>
    </div>

   <!-- JavaScript -->
<script>    
    // Hapus transformasi saat gambar modal diklik
    modalImage.addEventListener('click', function () {
        modalImage.classList.toggle('zoomed'); // Menggunakan toggle untuk memperbolehkan zoom in dan zoom out
    });
    function goBack() {
        window.history.back();
    }
</script>
