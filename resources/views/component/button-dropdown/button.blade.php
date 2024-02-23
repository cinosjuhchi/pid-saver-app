<div class="relative z-10" id="dropdownButton">
    <button class="text-white px-6 py-2 font-bold text-center rounded-md bg-birumuda" onclick="toggleDropdownUpload()">
        <i class="bi bi-plus-lg text-base text-white"></i>
        Buat
    </button>

    <div class="rounded border-gray-300 bg-white shadow-md mt-1 p-2 absolute text-sm font-semibold hidden transition-all" id="dropdown">
        <button class="hover:bg-slate-200 px-3 py-2 rounded-sm flex gap-2 w-full cursor-pointer" id="openFolder"><i class="bi bi-folder"></i>Tambahkan Folder</button>
        <button class="hover:bg-slate-200 px-3 py-2 rounded-sm flex gap-2 w-full cursor-pointer" id="openModal"><i class="bi bi-image"></i>Upload Foto</button>
    </div>
</div>

</div>

<!-- Modal Upload -->

@include("component.modal.image-form-modal")
@include("component.modal.folder-form-modal")

<!-- JS Button Dropdown -->
<script>
    function toggleDropdownUpload() {
        let dropdown = document.querySelector('#dropdownButton #dropdown');
        dropdown.classList.toggle("hidden");

        if (!dropdown.classList.contains("hidden")) {
            // Remove width style to allow it to expand based on content
            dropdown.style.width = "max-content";

            // Get bounding rectangle of dropdown and button
            let dropdownRect = dropdown.getBoundingClientRect();
            let buttonRect = document.getElementById('dropdownButton').getBoundingClientRect();

            // Check if there is enough space on the right side of the button
            let spaceRight = window.innerWidth - buttonRect.right;

            // Check if there is enough space on the left side of the button
            let spaceLeft = buttonRect.left;

            // If there is not enough space on the right side, show the dropdown on the left side
            if (spaceRight < dropdownRect.width && spaceLeft >= dropdownRect.width) {
                dropdown.classList.remove("left-0");
                dropdown.classList.add("right-0");
            } else {
                dropdown.classList.remove("right-0");
                dropdown.classList.add("left-0");
            }
        }
    }
</script>
