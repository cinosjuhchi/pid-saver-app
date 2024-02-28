<div class="hidden lg:block">
<div class="search bg-white rounded-md outline-none py-4 shadow-sm flex justify-between items-center px-9">
    <h3 class="font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-birumuda to-birutua text-2xl">{{ $title }}</h3>
    <div class="p-2 flex items-center justify-content-between rounded-md px-4 duration-300 cursor-pointer bg-slate-100 w-1/2 text-gray gap-2 group/search">
        <i
        class="bi bi-search cursor-pointer text-indigo-95 group-focus-within/search:text-blue-700"
      ></i>
        <form id="searchForm" action="{{ route('search-files') }}" method="GET">
        <input class="outline-none w-full bg-slate-100 rounded-md bg-transparent group/search " type="text" name="search_title" placeholder="Cari di SaverApp" id="search_title">
        </form>
    </div>
    <div class="w-auto">
        @include('component.button-dropdown.button')
    </div>
</div>
</div>
<script>
    document.getElementById('search_title').addEventListener('submit', function() {
        document.getElementById('searchForm').submit();
    });
</script>

