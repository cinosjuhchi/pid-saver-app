@extends('layouts.home')
@section('content')
    @include('component.filter.filter-file-folder')

<div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-y-5 gap-x-4 mt-6">

@if(Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
@endif

@if($photos->isEmpty() && $folders->isEmpty())
    <p>Tidak ada apa-apa di sini</p>
@else    
    @if($title == 'Beranda' || $title == 'Photo' || $title == 'Archive' )
    @foreach ($photos as $photo)
        
        <div class="group">
            <div class="relative">
                <div class="card-file bg-white rounded-md p-3 group-hover:bg-gray-200 transition-all flex flex-col">
                    <a href="{{ route('preview', ['slug' => $photo->slug]) }}" class="cursor-pointer flex flex-col flex-grow">
                        <img src="{{ asset('storage/' . $photo->image_location) }}" alt="" class="rounded-md h-60 object-cover w-full">
                        <div class="headline flex items-center justify-between mt-3">
                            <div class="title truncate overflow-hidden flex-grow max-w-[15rem]">
                                <h1 class="font-bold text-sm">{{ $photo->title }}</h1>
                                <p class="text-xs text-gray-400">{{ $photo->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="dropdown-container hidden absolute z-10 top-72 right-0 mt-1 bg-white border border-gray-200 rounded-md shadow-md">
                                <!-- Dropdown content here -->
                                <!-- Example dropdown content: -->
                                <div class="rounded border-gray-300 bg-white shadow-md p-2 text-sm transition-all">
                                    <a href="" class="hover:bg-slate-200 px-3 py-2 rounded-sm flex justify-start items-center gap-2 w-full cursor-pointer" id="openFolder"><i class="bi bi-pencil-square"></i>Ganti nama</a>                                
                                    <a href="" class="hover:bg-slate-200 px-3 py-2 rounded-sm flex justify-start items-center gap-2 w-full cursor-pointer" id="openFolder"><i class="bi bi-star"></i>Tambah ke Favorit</a>                                
                                    <a href="" class="hover:bg-slate-200 px-3 py-2 rounded-sm flex justify-start items-center gap-2 w-full cursor-pointer" id="openFolder"><i class="bi bi-archive"></i>Pindahkan ke Arsip</a>                                
                                    <a href="{{ route('download-image', ['slug' => $photo->slug]) }}" class="hover:bg-slate-200 px-3 py-2 rounded-sm flex justify-start items-center gap-2 w-full cursor-pointer" id="openFolder"><i class="bi bi-download"></i>Download</a>                                
                                    <a href="" class="hover:bg-slate-200 px-3 py-2 rounded-sm flex justify-start items-center gap-2 w-full cursor-pointer text-red-500" id="openFolder"><i class="bi bi-trash"></i>Hapus</a>                                
                                </div>
                            </div>
                            <button class="toggle-dropdown bg-white p-1 rounded-full hover:bg-gray-100 transition flex items-center justify-center">
                                <i class="bi bi-three-dots-vertical text-gray-700 group-hover:text-gray-900"></i>
                            </button>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    @endforeach
    @endif


    @if($title == 'Beranda' || $title == 'Folder' || $title == 'Archive' )
    @foreach ($folders as $folder)
        
        <div class="group">
            <div class="relative">
                <div class="card-folder bg-white rounded-md p-3 group-hover:bg-neutral-200 transition-all flex flex-col">
                    <a href="{{ route('folder-show', ['slug' => $folder->slug]) }}" class="cursor-pointer flex flex-col flex-grow">
                        <img src="{{ asset('resources/image/folder_img.png') }}" alt="" class="rounded-sm h-60 object-contain scale-75 w-full">
                        <div class="headline flex items-center justify-between mt-3">
                            <div class="title truncate text-overflow-ellipsis overflow-hidden flex-grow max-w-[10rem]">
                                <h1 class="font-bold text-sm">{{ $folder->title }}</h1>
                                <p class="text-xs text-neutral-400">21 February 2024</p>
                            </div>
                            <div class="dropdown-container hidden absolute z-10 top-72 right-0 mt-1 bg-white border border-gray-200 rounded-md shadow-md">
                                <!-- Dropdown content here -->
                                <!-- Example dropdown content: -->
                                <div class="rounded border-gray-300 bg-white shadow-md p-2 text-sm transition-all">
                                    <a href="" class="hover:bg-slate-200 px-3 py-2 rounded-sm flex justify-start items-center gap-2 w-full cursor-pointer" id="openFolder"><i class="bi bi-pencil-square"></i>Ganti nama</a>
                                    @if($folder->status == 'active')
                                    <a class="hover:bg-slate-200 px-3 py-2 rounded-sm flex justify-start items-center gap-2 w-full cursor-pointer" href="{{ route('favorite-folder', ['id' => $folder->id]) }}" id="openFolder"><i class="bi bi-star"></i>Tambah ke Favorit</a>                           @else
                                    <a class="hover:bg-slate-200 px-3 py-2 rounded-sm flex justify-start items-center gap-2 w-full cursor-pointer text-yellow-500 font-bold" href="{{ route('unstatus-folder', ['id' => $folder->id]) }}" id="openFolder"><i class="bi bi-star-fill text-yellow-500"></i>Hapus dari Favorit</a>                           
                                    @endif      
                                                            
                                    <a class="hover:bg-slate-200 px-3 py-2 rounded-sm flex justify-start items-center gap-2 w-full cursor-pointer" id="openFolder" href="{{ route('archive-folder', ['id' => $folder->id]) }}"><i class="bi bi-archive"></i>Pindahkan ke Arsip</a>                                
                                    <a class="hover:bg-slate-200 px-3 py-2 rounded-sm flex justify-start items-center gap-2 w-full cursor-pointer" href="{{ route('download-zip', ['id' => $folder->id]) }}" id="openFolder"><i class="bi bi-download"></i>Download</a>                                
                                    <a class="hover:bg-slate-200 px-3 py-2 rounded-sm flex justify-start items-center gap-2 w-full cursor-pointer text-red-500" id="openFolder"><i class="bi bi-trash"></i>Hapus</a>                             
                                </div>
                            </div>
                            <button class="toggle-dropdown bg-white p-1 rounded-full hover:bg-gray-100 transition flex items-center justify-center">
                                <i class="bi bi-three-dots-vertical text-gray-700 group-hover:text-gray-900"></i>
                            </button>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    @endforeach
    @endif
@endif
        
</div>

<!-- JS Dropdown -->
@include('component.button-dropdown.js-dots')

@endsection
