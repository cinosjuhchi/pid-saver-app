<div class="filter lg:mt-2">
    <h1 class="font-bold">Filter</h1>

    <div class="flex gap-2">
        @if($title !== "Photo" && $title !== "Folder")
        <div class="flex gap-2 mt-1 flex-wrap">
            <form action="{{ route('dashboard.filter') }}" method="GET">
                @csrf
                <input type="hidden" name="filter" value="photo">
                <input type="hidden" name="loc" value="{{ $title === 'Beranda' && $title === 'Archive' ? 1 : $folder->id}}">
                <input type="hidden" name="parent_folder_id" value="{{ $title == 'Beranda' ? 1 : $folder->id }}">
                <button class="px-10 py-1 rounded-md font-bold {{ $filterActive == 'photo' ? 'bg-birumuda hover:bg-white hover:text-birumuda text-white' :  'bg-white hover:bg-birumuda hover:text-white'}}  transition text-sm sm:px-8" type="submit">
                    Foto
                </button>
            </form>
            <form action="{{ route('dashboard.filter') }}" method="GET">
                @csrf
                <input type="hidden" name="filter" value="folder  ">
                <input type="hidden" name="loc" value="{{ $title === 'Beranda' || $title === 'Archive' ? 1 : $folder->id}}">
                <input type="hidden" name="parent_folder_id" value="{{ $title == 'Beranda' ? 1 : $folder->id }}">
                <button class="px-10 py-1 rounded-md font-bold {{ $filterActive == 'folder' ? 'bg-birumuda hover:bg-white hover:text-birumuda text-white' :  'bg-white hover:bg-birumuda hover:text-white'}} transition text-sm sm:px-8">
                    Folder
                </button>
            </form>
        </div>
        @endif
        <div class="flex gap-2 mt-1 flex-wrap">
            @include('component.button-dropdown.button-filter')
        </div>
    </div>
</div>
