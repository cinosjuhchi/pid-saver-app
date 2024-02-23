<!-- Filter Nama -->
<div class="relative" id="dropdownButtonFilterNama">
    <button class="px-6 py-1 flex gap-1 rounded-md font-bold bg-white hover:bg-birumuda hover:text-white transition text-sm" onclick="toggleDropdown('dropdownFilterNama')">
        Nama
        <i class="bi bi-chevron-compact-down"></i>        
    </button>
    <div class="rounded border-gray-300 bg-white shadow-md mt-1 p-2 absolute text-sm font-semibold hidden transition-all" id="dropdownFilterNama">
        <div class="hover:bg-slate-200 px-3 py-2 rounded-sm flex items-center gap-2 cursor-pointer" id="openFolder"><i class="bi bi-sort-alpha-up text-xl"></i>Urutkan A - Z</div>
        <div class="hover:bg-slate-200 px-3 py-2 rounded-sm flex gap-2 cursor-pointer items-center" id="openModal"><i class="bi bi-sort-alpha-down-alt text-xl"></i>Urutkan Z - A</div>
    </div>
</div>

<!-- Filter Dibuat -->
<div class="relative" id="ButtonFilterDibuat">
    <button class="px-6 py-1 flex gap-1 rounded-md font-bold bg-white hover:bg-birumuda hover:text-white transition text-sm" onclick="toggleDropdown('FilterDibuat')">
        Dibuat
        <i class="bi bi-chevron-compact-down"></i>        
    </button>
    <div class="rounded border-gray-300 bg-white shadow-md mt-1 p-2 absolute text-sm font-semibold hidden transition-all" id="FilterDibuat">
        <div class="hover:bg-slate-200 px-3 py-2 rounded-sm flex items-center gap-2 cursor-pointer" id="openFolder"><i class="bi text-xl bi-sort-up"></i>Terbaru</div>
        <div class="hover:bg-slate-200 px-3 py-2 rounded-sm flex gap-2 cursor-pointer items-center" id="openModal"><i class="bi text-xl bi-sort-down-alt"></i>Terlama</div>
    </div>
</div>

<!-- JavaScript -->
<script>
    function toggleDropdown(id) {
        let dropdown = document.getElementById(id);
        let allDropdowns = document.querySelectorAll('.relative > .rounded');
        
        // Menutup dropdown lain
        allDropdowns.forEach((dropdownItem) => {
            if (dropdownItem.id !== id && !dropdownItem.classList.contains('hidden')) {
                dropdownItem.classList.add('hidden');
            }
        });
        
        dropdown.classList.toggle('hidden');
        
        if (!dropdown.classList.contains('hidden')) {
            dropdown.style.width = 'max-content';
            let dropdownRect = dropdown.getBoundingClientRect();
            let buttonRect = dropdown.parentElement.getBoundingClientRect();
            let spaceRight = window.innerWidth - buttonRect.right;
            let spaceLeft = buttonRect.left;
            if (spaceRight < dropdownRect.width && spaceLeft >= dropdownRect.width) {
                dropdown.classList.remove('left-0');
                dropdown.classList.add('right-0');
            } else {
                dropdown.classList.remove('right-0');
                dropdown.classList.add('left-0');
            }
        }
    }
</script>
