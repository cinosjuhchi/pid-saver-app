<div id="folderModal" class="modal hidden fixed inset-0 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <!-- Modal Content -->
        <div class="modal-content bg-white rounded-lg shadow-lg p-4 mx-2 sm:mx-auto">

            <!-- Modal Header -->
            <div class="modal-header">
                <h3 class="text-lg font-semibold">Upload Image</h3>
                <button id="closeFolder" class="modal-close">
                    Tutup
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form id="uploadForm" name="title" action="{{ route('add-folder') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="parent_folder_id" value="{{ $title == 'beranda' ? 1 : $folder->id }}">
                    <input type="text" id="textFolder" name="title" class="border border-gray-300 p-2 mb-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambahkan</button>
                </form>
            </div>

        </div>
    </div>
</div>

<script>
    const folder = document.getElementById('folderModal');
    // Get open modal button
    const openFolderBtn = document.getElementById('openFolder');
    // Get close modal button

    const closeFolderBtn = document.getElementById('closeFolder');

    function openFolder() {
        folder.classList.remove('hidden');
    }

    // Function to close folder
    function closeFolder() {
        folder.classList.add('hidden');
    }

    openFolderBtn.addEventListener('click', openFolder);
    // Event listener for close modal button
    closeFolderBtn.addEventListener('click', closeFolder);

    // Close modal when clicking outside of it
    window.addEventListener('click', (e) => {
        if (e.target === folder) {
            closeFolder();
        }
    });

    // Prevent modal from closing when clicking inside it
    folder.addEventListener('click', (e) => {
        e.stopPropagation();
    });
</script>