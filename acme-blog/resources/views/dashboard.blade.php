<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex flex-col">
                    @forelse ($blogs as $blog)
                        <div class="mt-3 mb-3 flex flex-col">
                            <span  class="text-gray-500 text-[12px] font-bold" >{{$blog->user->name}}</span>
                            <h2 class="text-gray-900 text-[22px] font-bold">{{ $blog->title }}</h2>
                            <span class="text-gray-500 text-[12px]" >{{$blog->description}}</span>
                            <p >{{$blog->content}}</p>

                            @if ($blog->user_id == $user_id)
                            <div class="flex">
                                <form action="/delete-blog/{{$blog->id}}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="mt-9 bg-red-500 p-1.5 ml-2 rounded:md w-[100px]">Delete</button>
                                </form>
                               <a href="/edit-blog/{{$blog->id}}" class="text-center mt-9 bg-green-500 p-1.5 ml-2 rounded:md w-[100px]">Edit</a>
                            </div>
                               
                            @else
                                
                            @endif
                        </div>
                    @empty 
                        No Blogs found!
                    @endforelse

                    {{ $blogs->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
