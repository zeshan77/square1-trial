
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(session('message'))
                    <div class="alert-content ml-4">
                        
                        <div class="alert-description text-lg text-green-600">
                            {{ session('message') }}
                        </div>
                    </div>
                    @endif
                    <a class="text-blue float-right" href="{{ route('dashboard') }}">View all posts</a>
                    <form method="POST" action="{{ route('store.post') }}">
                        @csrf

                        <!-- Post Title -->
                        <div>
                            <x-label for="post title" :value="__('Post Title')" />

                            <x-input id="post_title" class="block mt-1 w-full" type="text" name="post_title" :value="old('post_title')" required autofocus />
                             <x-input id="user_id"  type="hidden" name="user_id" value="{{ auth()->user()->id }}" />
                        </div>

                        <!-- Post Description -->
                        <div class="mt-4">
                            <x-label for="Description" :value="__('Description')" />

                            <textarea id="post_description" class="block mt-1 w-full" type="post_description" name="post_description" 
                            :value="old('post_description')" /></textarea>
                        </div>

                        <!-- Published date -->
                        <div class="mt-4">
                             <x-label for="published date" :value="__('Published Date')" />

                            <x-input id="published_date" class="block mt-1 w-full" type="date" name="published_date" :value="old('published_date')" required autofocus />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                                    <x-button>
                                        {{ __('Add Post') }}
                                    </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>