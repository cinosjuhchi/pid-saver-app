<div class="hidden lg:block">
<div class="search bg-white rounded-md outline-none py-4 shadow-sm flex justify-between items-center px-9">
    <h3 class="font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-birumuda to-birutua text-2xl">Beranda</h3>
    <div class="p-2 flex items-center justify-content-between rounded-md px-4 duration-300 cursor-pointer bg-slate-100 w-1/2 text-gray gap-2 group/search">
        <i
        class="bi bi-search cursor-pointer text-indigo-95 group-focus-within/search:text-blue-700"
      ></i>
        <input class="outline-none w-full bg-slate-100 rounded-md bg-transparent group/search " type="text" name="" placeholder="Cari di SaverApp" id="">
    </div>
    <div class="w-auto">
        <button class="text-white px-6 py-2 font-bold text-center rounded-md bg-birumuda" id="openModal">
            <i class="bi bi-plus-lg text-base text-white"></i>
            Buat
        </button>
    </div>
</div>
</div>


<!-- Modal -->
<div id="imageModal" class="modal hidden fixed inset-0 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <!-- Modal Content -->
        <div class="modal-content bg-white rounded-lg shadow-lg p-4 mx-2 sm:mx-auto">

            <!-- Modal Header -->
            <div class="modal-header">
                <h3 class="text-lg font-semibold">Upload Image</h3>
                <button id="closeModal" class="modal-close">
                    Tutup
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form id="uploadForm" enctype="multipart/form-data">
                    <input type="file" id="imageUpload" name="imageUpload" accept="image/*" class="border border-gray-300 p-2 mb-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Upload</button>
                </form>
            </div>

        </div>
    </div>
</div>

<script>
    // Get modal element
    const modal = document.getElementById('imageModal');
    // Get open modal button
    const openModalBtn = document.getElementById('openModal');
    // Get close modal button
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

    // Handle form submission
    const uploadForm = document.getElementById('uploadForm');
    uploadForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const formData = new FormData(uploadForm);
        // Perform AJAX request to handle form submission (you can replace this with your own implementation)
        console.log('Submitting form with data:', formData);
        // After submitting, you can close the modal
        closeModal();
    });
</script>