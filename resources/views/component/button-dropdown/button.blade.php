<div class="relative" id="dropdownButton">
    <button class="text-white px-6 py-2 font-bold text-center rounded-md bg-birumuda" onclick="toggleDropdown()">
        <i class="bi bi-plus-lg text-base text-white"></i>
        Buat
    </button>

    <div class="rounded border-gray-300 bg-birumuda p-2 absolute text-sm font-bold hidden" id="dropdown">
        <div class="hover:bg-slate-200 px-3 py-2 rounded-sm flex gap-2"><i class="bi bi-folder"></i>Tambahkan Folder</div>
        <div class="hover:bg-slate-200 px-3 py-2 rounded-sm flex gap-2 cursor-pointer" id="openModal"><i class="bi bi-image"></i>Upload Foto</div>
        <div class="hover:bg-slate-200 px-3 py-2 rounded-sm flex gap-2"><i class="bi bi-folder"></i>Upload Folder</div>
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
                <form id="uploadForm" action="{{ route('upload-photo') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" id="imageUpload" name="image_location" class="border border-gray-300 p-2 mb-4">
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
</script>

<script>
    function toggleDropdown() {
        let dropdown = document.querySelector('#dropdownButton #dropdown');
        dropdown.classList.toggle("hidden");

        // Get bounding rectangle of dropdown and button
        let dropdownRect = dropdown.getBoundingClientRect();
        let buttonRect = document.getElementById('dropdownButton').getBoundingClientRect();

        // Check if there is enough space on the right side of the button
        let spaceRight = window.innerWidth - buttonRect.right;

        // Check if there is enough space on the left side of the button
        let spaceLeft = buttonRect.left;

        // If there is not enough space on the right side, show the dropdown on the left side
        if (spaceRight < dropdownRect.width && spaceLeft >= dropdownRect.width) {
            dropdown.classList.remove("right-0");
            dropdown.classList.add("left-0");
        } else {
            dropdown.classList.remove("left-0");
            dropdown.classList.add("right-0");
        }
    }
</script>
