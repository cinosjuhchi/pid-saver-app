<!-- component -->
    <span
      class="absolute text-white text-4xl top-5 left-4 cursor-pointer"
      onclick="openSidebar()"
    >
      <i class="bi bi-filter-left px-2 bg-gray-900 rounded-md"></i>
    </span>

    <div
      class="sidebar fixed  lg:sticky h-svh top-0 bottom-0 lg:left-0 p-2 w-[440px] overflow-y-auto text-center bg-neutral-50 transition-all duration-300 ease-in-out"
    >
      <div class="text-gray-100 text-xl">
        <div class="p-2.5 mt-1 flex items-center">
          <h1 class="font-bold bg-clip-text text-transparent bg-gradient-to-r from-sky-600 to-blue-600 ml-3 text-2xl">SaverApp</h1>
          <i
            class="bi bi-x cursor-pointer text-indigo-950 ml-28 lg:hidden"
            onclick="openSidebar()"
          ></i>
        </div>
        <div class="my-2 bg-gray-600 h-[1px]"></div>
      </div>
      <div
        class="p-2.5 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-slate-200 text-gray focus:ring-blue-700 sm:hidden search"
      >
        <i class="bi bi-search text-sm"></i>
        <input
          type="text"
          placeholder="Cari di SaverApp"
          class="text-[15px] ml-4 w-full text-gray bg-transparent focus:outline-none"
        />
      </div>
      
      <a href="">
      <div
        class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-700 {{ $title === "beranda" ? "bg-blue-700 text-neutral-100" : "" }} hover:text-neutral-100"
      >
        <i class="bi bi-house-door"></i>
        <span class=" ml-4 text-dark-200 font-bold">Beranda</span>
      </div>
      </a>


      <a href="">
      <div
        class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-700 hover:text-neutral-100"
      >
        <i class="bi bi-images font-bold"></i>
        <span class=" ml-4 text-dark-200 font-bold">File</span>
      </div>
      </a>
      
      <a href="">
      <div
        class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-700 hover:text-neutral-100"
      >
        <i class="bi bi-folder font-bold"></i>
        <span class=" ml-4 text-dark-200 font-bold">Folder</span>
      </div>
      </a>

      <a href="">
      <div
        class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-700 hover:text-neutral-100"
      >
        <i class="bi bi-archive font-bold"></i>
        <span class=" ml-4 text-dark-200 font-bold">Arsip</span>
      </div>
      </a>
      
      <a href="">
      <div
        class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-700 hover:text-neutral-100"
      >
        <i class="bi bi-star font-bold"></i>
        <span class="ml-4 text-dark-200 font-bold">Favorite</span>
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

      if (window.innerWidth < 768) {
        // Layar mobile, sidebar akan muncul sebagai tombol
        sidebar.classList.add('hidden');        
      }else{
        sidebar.classList.remove('hidden');
      }

    }

    // Panggil fungsi toggleSidebar() saat halaman dimuat
    toggleSidebar();

    // Tambahkan event listener untuk memantau perubahan ukuran layar
    window.addEventListener("resize", toggleSidebar);


    </script>