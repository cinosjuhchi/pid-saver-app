<!-- component -->

  <div class="nav-mobile px-6 w-full py-6 lg:hidden sticky top-0 z-50 bg-putihneut2">
    <div class="nav flex gap-3 mb-2">
    <span
      class=" text-white text-4xl cursor-pointer"
      onclick="openSidebar()"
    >
      <i class="bi bi-filter-left px-2 bg-birumuda rounded-md"></i>
    </span>

      <div
        class="flex items-center rounded-md px-4 duration-300 cursor-pointer bg-slate-200 text-gray search w-full"
      >
        <i class="bi bi-search text-sm"></i>
        <input
          type="text"

          placeholder="Cari di SaverApp"
          class="text-[15px] w-full ml-4 text-gray bg-transparent focus:outline-none"
        />
      </div>

    <div class="relative z-10" id="dropdownButton2">
      <button class="text-white font-bold text-center rounded-md bg-birumuda" onclick="toggleDropdown('dropdown2')">
          <i class="bi bi-plus px-2 bg-birumuda rounded-md text-4xl"></i>
      </button>

      <div class="rounded border-gray-300 bg-white shadow-md mt-1 p-2 absolute text-sm font-semibold hidden transition-all" id="dropdown2">
          <button class="hover:bg-slate-200 px-3 py-2 rounded-sm flex gap-2 w-full cursor-pointer" id="openFolder"><i class="bi bi-folder"></i>Tambahkan Folder</button>
          <button class="hover:bg-slate-200 px-3 py-2 rounded-sm flex gap-2 w-full cursor-pointer" id="openModal"><i class="bi bi-image"></i>Upload Foto</button>
      </div>
    </div>

    </div>

    <!-- Modal Upload -->

    @include("component.modal.image-form-modal")
    @include("component.modal.folder-form-modal")

    <!-- Js -->
    @include('component.button-dropdown.js-upload')
  </div>

    <div
      class="sidebar fixed  lg:sticky h-svh top-0 bottom-0 lg:left-0 py-4 px-5 md:w-1/3 sm:w-1/2 lg:w-[340px] overflow-y-auto text-center bg-neutral-50 transition-all duration-300 ease-in-out z-50"
    >
        <div class="mt-1 flex items-center justify-between mb-3">
          <h1 class="font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-birumuda to-birutua text-2xl">SaverApp</h1>
          <i
            class="bi bi-x-circle cursor-pointer text-black lg:hidden"
            onclick="openSidebar()"
          ></i>
        </div>
        <div class="my-2 bg-gray-600 h-[1px]"></div>

      <div
        class="p-2.5 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-slate-100 text-gray search my-4"
      >
        <i class="bi bi-search text-sm"></i>
        <input
          type="text"
          placeholder="Cari di SaverApp"
          class="text-[15px] ml-4 w-full text-gray bg-transparent focus:outline-none"
        />
      </div>
      
      <a href="/">
      <div
        class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gradient-to-l from-birumuda to-birutua {{ $title === "Beranda" ? "bg-gradient-to-l from-birumuda to-birutua text-neutral-100" : "" }} hover:text-neutral-100"
      >
        <i class="bi bi-house-door"></i>
        <span class=" ml-4 text-dark-200 font-bold">Beranda</span>
      </div>
      </a>


      <a href="/foto">
      <div
        class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gradient-to-l from-birumuda to-birutua hover:text-neutral-100"
      >
        <i class="bi bi-images font-bold"></i>
        <span class=" ml-4 text-dark-200 font-bold">Foto</span>
      </div>
      </a>
      
      <a href="">
      <div
        class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gradient-to-l from-birumuda to-birutua hover:text-neutral-100"
      >
        <i class="bi bi-folder font-bold"></i>
        <span class=" ml-4 text-dark-200 font-bold">Folder</span>
      </div>
      </a>

      <a href="">
      <div
        class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gradient-to-l from-birumuda to-birutua hover:text-neutral-100"
      >
        <i class="bi bi-archive font-bold"></i>
        <span class=" ml-4 text-dark-200 font-bold">Arsip</span>
      </div>
      </a>
      
      <a href="">
      <div
        class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gradient-to-l from-birumuda to-birutua hover:text-neutral-100"
      >
        <i class="bi bi-star font-bold"></i>
        <span class="ml-4 text-dark-200 font-bold">Favorit</span>
      </div>
      </a>
     
      <a href="/logout">
      <div
        class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-red-500 group"
      >
        <i class="bi bi-box-arrow-in-right text-red-500 group-hover:text-neutral-100"></i>
        <span class="ml-4 text-red-500 font-bold group-hover:text-neutral-100">Logout</span>
      </div>
      </a>
    </div>

    <script type="text/javascript">
    function openSidebar() {
        document.querySelector(".sidebar").classList.toggle("hidden");
    }

    function toggleSidebar() {
        const sidebar = document.querySelector(".sidebar");
        const search = document.querySelector(".search");

        if (window.innerWidth < 1024) {
            // Layar mobile, sidebar akan muncul sebagai tombol
            sidebar.classList.add('hidden');
        } else {
            sidebar.classList.remove('hidden');
        }
    }

    function closeSidebarOnOutsideClick(event) {
        if (window.innerWidth < 1024) {
            const sidebar = document.querySelector(".sidebar");
            const navMobileButton = document.querySelector(".nav-mobile");
            if (!sidebar.contains(event.target) && !navMobileButton.contains(event.target)) {
                sidebar.classList.add("hidden");
            }
        }
    }

    // Panggil fungsi toggleSidebar() saat halaman dimuat
    toggleSidebar();

    // Tambahkan event listener untuk memantau perubahan ukuran layar
    window.addEventListener("resize", toggleSidebar);

    // Tambahkan event listener untuk menutup sidebar saat pengguna mengklik di luar sidebar
    document.addEventListener("click", closeSidebarOnOutsideClick);
</script>

