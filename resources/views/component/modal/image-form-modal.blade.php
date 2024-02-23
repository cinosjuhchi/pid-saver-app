<!-- Modal -->
<div id="imageModal" class="modal hidden fixed inset-0 overflow-y-auto flex items-center justify-center h-screen">
    <div class="pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <!-- Modal Content -->
        <div class="modal-content bg-white rounded-lg shadow-lg p-4 mx-2 sm:mx-auto">

            <!-- Modal Header -->
            <div class="modal-header">
                <h3 class="text-lg font-semibold">Upload Image</h3>
                <button id="closeModal" class="modal-close absolute top-0">
                    <i class="bi bi-x-lg bg-black text-white px-1 text-2xl rounded-full"></i>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form id="uploadForm" action="{{ route('upload-photo') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" id="imageUpload" name="image_location" class="border p-1 border-gray-300 mb-4 rounded-md">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Upload</button>
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