<div class="relative" id="dropdownButton">
    <button class="text-white px-6 py-2 font-bold text-center rounded-md bg-birumuda" onclick="toggleDropdown()">
        <i class="bi bi-plus-lg text-base text-white"></i>
        Buat
    </button>

    <div class="rounded border-gray-300 bg-birumuda p-2 absolute text-sm font-bold hidden" id="dropdown">
        <div class="hover:bg-slate-200 px-3 py-2 rounded-sm flex gap-2"><i class="bi bi-folder"></i>Tambahkan Folder</div>
        <div class="hover:bg-slate-200 px-3 py-2 rounded-sm flex gap-2"><i class="bi bi-image"></i>Upload Foto</div>
        <div class="hover:bg-slate-200 px-3 py-2 rounded-sm flex gap-2"><i class="bi bi-folder"></i>Upload Folder</div>
    </div>
</div>

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
