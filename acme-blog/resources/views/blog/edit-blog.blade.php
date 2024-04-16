<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex items-center justify-center">
                    {{-- <form method="POST" action="/update-blog/{{$blog->id}}" class="flex items-center justify-between flex-col"> --}}
                    <form method="POST" action="" class="flex items-center justify-between flex-col">
                        {{-- @csrf 
                        @method('PUT') --}}
                        <input class="mt-3" type="text" id="title" name="title" placeholder="Title ..." value="{{$blog->title}}">
                        @error('title')
                            <div class="text-red">{{ $message }}</div>
                        @enderror

                        <input class="mt-3" type="text" id="description" name="description" placeholder="Description ..." value="{{$blog->description}}">
                        @error('description')
                            <div class="text-red">{{ $message }}</div>
                        @enderror

                        <textarea class="mt-3" name="content" id="content" cols="30" rows="10">{{$blog->content}}</textarea>
                        @error('content')
                            <div class="text-red">{{ $message }}</div>
                        @enderror
                        <button id="edit-blog" type="submit" class="mt-3 p-3 text-white bg-blue-600 rounded-md">Submit</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

    @includeWhen(true, 'scripts.edit-blog-script', ['blog' => $blog])
</x-app-layout>
