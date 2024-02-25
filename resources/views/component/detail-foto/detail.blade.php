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
    <div class="bg-neutral-50 lg:text-2xl h-screen flex flex-col">
        <div class="nav-modal relative  w-full flex justify-between items-center sm:px-2 lg:px-6 py-2 bg-putihneut2 bg-opacity-80 bg-blend-overlay">
            <div class="kanan flex items-center text-black lg:gap-2 sm:gap-1 font-bold truncate">
                <button id="tutup" onclick="goBack()" class="cursor-pointer hover:bg-black hover:text-white rounded-full px-3 py-2">
                    <i class="bi bi-arrow-left text-2xl"></i>
                </button>
                <h1 class="">{{ $photo->title }}</h1>
            </div>
            <div class="kiri flex lg:gap-4 sm:gap-3 text-black">
                <a class="hover:bg-black hover:text-white transition-all rounded-full px-3 py-2 text-2xl">
                <i class="bi bi-printer"></i>
                </a>

                <a class="hover:bg-black hover:text-white transition-all rounded-full px-3 py-2 text-2xl">
                <i class="bi bi-star"></i>
                </a>

                <a class="hover:bg-black hover:text-white transition-all rounded-full px-3 py-2 text-2xl" href="{{ route('download-image', ['slug' => $photo->slug]) }}">
                <i class="bi bi-download"></i>
                </a>

                <a class="hover:bg-black hover:text-white transition-all rounded-full px-3 py-2 text-2xl">
                <i class="bi bi-info-lg"></i>
                </a>
            </div>
        </div>
        <div class="flex-1 flex items-center justify-center overflow-y-auto w-full relative">
            <div class="max-w-lg mx-auto">
                <img id="modal-image" src="{{ asset('storage/' . $photo->image_location) }}" alt="Gambar" class="zoomable-image h-max w-max scale-100 object-cover">
            </div>
        </div>
    </div>

    

  <script>
    const modalImage = document.getElementById('modal-image');
    const navModal = document.querySelector('.nav-modal');
    let isZoomed = false;
    let initialScaleApplied = false;

    // Cek apakah gambar melebihi tinggi layar saat keadaan normal
    window.onload = function () {
        const screenHeight = window.innerHeight;
        const imageHeight = modalImage.offsetHeight;
        if (imageHeight > screenHeight) {
            modalImage.style.transform = 'scale(0.5)';
            initialScaleApplied = true;
        }
    };

    // Toggle zoom in/out dan ubah kursor
    modalImage.addEventListener('click', function () {
        const screenHeight = window.innerHeight;
        const imageHeight = modalImage.offsetHeight;
        if (!isZoomed) {
            if (imageHeight > screenHeight * 0.5) {
                modalImage.style.transform = 'scale(1.5) translateY(calc(20% - ' + navModal.clientHeight / 2 + 'px))'; // Atur transformasi untuk zoom in
            }
            modalImage.classList.add('zoomed');
            modalImage.style.cursor = 'zoom-out'; // Mengubah kursor saat zoom in
            isZoomed = true;
        } else {
            modalImage.style.transform = initialScaleApplied ? 'scale(0.5)' : ''; // Tetapkan skala 50% jika skala awal sudah diaplikasikan, jika tidak, reset skala
            modalImage.classList.remove('zoomed');
            modalImage.style.cursor = 'zoom-in'; // Mengubah kursor saat zoom out
            isZoomed = false;
        }
    });

    function goBack() {
        window.history.back();
    }
</script>








