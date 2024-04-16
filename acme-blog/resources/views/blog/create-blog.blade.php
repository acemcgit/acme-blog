<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex items-center justify-center">
                    {{-- <form method="POST" action="/store-blog" class="flex items-center justify-between flex-col"> --}}
                    <form method="POST" class="flex items-center justify-between flex-col">
              
                        <input class="mt-3" type="text" id="title" name="title" placeholder="Title ..." value="{{ old('title') }}">
                        {{-- @error('title') --}}
                            <div class="text-red-500" id="title-err"></div>
                        {{-- @enderror --}}

                        <input class="mt-3" type="text" id="description" name="description" placeholder="Description ..." value="{{ old('description') }}">
                        {{-- @error('description') --}}
                            <div class="text-red-500" id="desc-err"></div>
                        {{-- @enderror --}}

                        <textarea class="mt-3" name="content" id="content" cols="30" rows="10">{{ old('conent') }}</textarea>
                        {{-- @error('content') --}}
                            <div class="text-red-500" id="content-err"></div>
                        {{-- @enderror --}}
                        <button id="create-blog" type="submit" class="mt-3 p-3 text-white bg-blue-600 rounded-md">Submit</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

    @include('scripts.create-blog-script');
</x-app-layout>
