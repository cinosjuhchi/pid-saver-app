<div id="imageModal" class="modal hidden fixed bg-slate-600 bg-opacity-50 h-screen inset-0 z-50 ">
    <div class="h-screen flex flex-1 justify-center items-center text-center">
        <div class="modal-content bg-white py-4 px-6 w-1/3 items-center rounded-sm relative">
            <!-- Modal Header -->
            <div class="modal-header mb-12">
                <h3 class="font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-birumuda to-birutua text-2xl">Upload Foto</h3>
                <button id="closeModal" class="modal-close absolute -top-3 -right-3">
                    <i class="bi bi-x-lg bg-black text-white px-1 text-2xl rounded-full"></i>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form id="uploadForm" action="{{ route('upload-photo') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="parent_folder_id" value="{{ $title == 'Beranda' || $title == 'Photo' || $title == 'Folder' || $title == 'Archive' ? 1 : $folder->id }}">
                    <input type="file" id="imageUpload" name="image_location[]" class="border p-1 border-gray-300 mb-4 rounded-md w-full placeholder:text-sm" multiple required>
                    <button type="submit" class="bg-birumuda hover:bg-birutua transition-all text-white font-bold py-2 px-4 rounded">Upload</button>
                </form>
            </div>
            </div>
    </div>
</div>

<!-- Javascript -->
<script>
    // Get modal element
    const modal = document.getElementById('imageModal');
    // Get open modal button
    const openModalBtn = document.getElementById('openModal');
    const closeModalBtn = document.getElementById('closeModal');

 // Function to open modal
    function openModal() {
        modal.classList.remove('hidden');
    }

    // Function to close modal
    function closeModal() {
        modal.classList.add('hidden');
    }

    // Event listener for open modal button
    openModalBtn.addEventListener('click', openModal);
    // Event listener for close modal button
    closeModalBtn.addEventListener('click', closeModal);

    // Close modal when clicking outside of it
    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            closeModal();
        }
    });

    // Prevent modal from closing when clicking inside it
    modal.addEventListener('click', (e) => {
        e.stopPropagation();
    });
</script>

