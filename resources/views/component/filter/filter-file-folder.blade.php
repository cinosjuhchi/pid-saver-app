<div class="filter lg:mt-2">
    <h1 class="font-bold">Filter</h1>

    <div class="flex gap-2">
        @if($title === "Photo")
        <div class="gap-2 mt-1 flex-wrap hidden">
            <button class="px-10 py-1 rounded-md font-bold bg-white hover:bg-birumuda hover:text-white transition text-sm sm:px-8">
                Foto
            </button>

            <button class="px-10 py-1 rounded-md font-bold bg-white hover:bg-birumuda hover:text-white transition text-sm sm:px-8">
                Folder
            </button>
        </div>
        @elseif($title === "Folder")
        <div class="gap-2 mt-1 flex-wrap hidden">
            <button class="px-10 py-1 rounded-md font-bold bg-white hover:bg-birumuda hover:text-white transition text-sm sm:px-8">
                Foto
            </button>

            <button class="px-10 py-1 rounded-md font-bold bg-white hover:bg-birumuda hover:text-white transition text-sm sm:px-8">
                Folder
            </button>
        </div>
        @else
        <div class="flex gap-2 mt-1 flex-wrap">
            <button class="px-10 py-1 rounded-md font-bold bg-white hover:bg-birumuda hover:text-white transition text-sm sm:px-8">
                Foto
            </button>

            <button class="px-10 py-1 rounded-md font-bold bg-white hover:bg-birumuda hover:text-white transition text-sm sm:px-8">
                Folder
            </button>
        </div>
        @endif
        
        <div class="flex gap-2 mt-1 flex-wrap">
            @include('component.button-dropdown.button-filter')
        </div>
    </div>
</div>
