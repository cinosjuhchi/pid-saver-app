@extends('layouts.home')
@section('content')
@include('component.filter.filter-file-folder')
    
<div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-y-5 gap-x-4 mt-6">

    @foreach ($photos as $photo)
        
        <a href="{{ route('preview', ['slug' => $photo->slug]) }}" id="lihat-detail" class="cursor-pointer group    ">
            <div class="card-file bg-white rounded-md p-3 group-hover:bg-gray-200 transition-all">
                <img src="{{ asset('storage/' . $photo->image_location) }}" alt="" class="rounded-md h-60 object-cover w-full">
                <div class="title flex items-center justify-between mt-3">
                    <div class="title truncate overflow-hidden">
                        <h1 class="font-bold text-sm">{{ $photo->title }}</h1>
                        <p class="text-xs text-gray-400">{{ $photo->created_at->diffForHumans() }}</p>
                    </div>
                    <button class="hover:bg-white rounded-full transition">
                        <i class="bi bi-three-dots-vertical text-xl"></i>
                    </button>
                </div>
            </div>
        </a>

    @endforeach
        @foreach ($folders as $folder)
            
    <a href="{{ route('folder-show', ['slug' => $folder->slug]) }}" class="cursor-pointer group">
            <div class="card-folder bg-white rounded-md p-3 group-hover:bg-neutral-200 transition-all">
                <img src="{{ asset('resources/image/folder_img.png') }}" alt="" class="rounded-sm h-60 object-contain scale-75 w-full">
                <div class="title flex items-center justify-between mt-3">
                    <div class="title truncate text-overflow-ellipsis overflow-hidden">
                        <h1 class="font-bold text-sm">{{ $folder->title }}</h1>
                        <p class="text-xs text-neutral-400">21 February 2024</p>
                    </div>
                    <button class="hover:bg-white rounded-full transition">
                    <i class="bi bi-three-dots-vertical text-xl"></i>
                    </button>
                </div>
            </div>
        </a>

        @endforeach
        
        
</div>
@endsection