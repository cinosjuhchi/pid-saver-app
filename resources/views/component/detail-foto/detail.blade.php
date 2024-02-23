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

<!-- Modal -->
    <div class="fixed inset-0 bg-neutral-50 bg-blend-overlay bg-opacity-80 lg:text-2xl">
        <div class="nav-modal absolute w-full flex justify-between items-center sm:px-2 lg:px-6 pt-4">
            <div class="kanan flex items-center text-black lg:gap-2 sm:gap-1 font-bold truncate">
                <button id="tutup" onclick="goBack()" class="cursor-pointer hover:bg-black hover:text-white rounded-full px-3 py-2">
                    <i class="bi bi-arrow-left text-2xl"></i>
                </button>
                <h1 class="">{{ $photo->title }}</h1>
            </div>
            <div class="kiri flex lg:gap-4 sm:gap-3 text-black">
                <button class="hover:bg-black hover:text-white transition-all rounded-full px-3 py-2 text-2xl">
                <i class="bi bi-printer"></i>
                </button>

                <button class="hover:bg-black hover:text-white transition-all rounded-full px-3 py-2 text-2xl">
                <i class="bi bi-star"></i>
                </button>

                <a class="hover:bg-black hover:text-white transition-all rounded-full px-3 py-2 text-2xl" href="{{ route('download-image', ['slug' => $photo->slug]) }}">
                <i class="bi bi-download"></i>
                </a>

                <button class="hover:bg-black hover:text-white transition-all rounded-full px-3 py-2 text-2xl">
                <i class="bi bi-info-lg"></i>
                </button>
            </div>
        </div>
        <div class="flex items-center justify-center h-screen">
            <div class="max-w-lg mx-auto">
                <img id="modal-image" src="{{ asset('storage/' . $photo->image_location) }}" alt="Gambar" class="zoomable-image rounded-md h-max w-max scale-100 object-cover">
            </div>
        </div>
    </div>

    

   <!-- JavaScript -->
    <script>    
        const modalImage = document.getElementById('modal-image');

        // Hapus transformasi saat gambar modal diklik
        modalImage.addEventListener('click', function () {
            modalImage.classList.toggle('zoomed'); // Menggunakan toggle untuk memperbolehkan zoom in dan zoom out
        });
        function goBack() {
            window.history.back();
        }
    </script>
