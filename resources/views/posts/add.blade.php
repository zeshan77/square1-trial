
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Posts</h2>
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

                    <a class="float-right inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md bg-gray-400 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500" href="{{ route('dashboard') }}">View all posts</a>
                    <div class="container mx-auto h-full flex justify-center items-center">
        <div class="w-1/2">
                        <form method="POST" action="{{ route('store.post') }}">
                            @csrf
                            <!-- Post Title -->
                            <div>
                                <x-label for="title" :value="__('Title')" />
                                <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                                @error('title')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="mt-4">
                                <x-label for="published date" :value="__('Published Date')" />

                                <x-input id="published_date" class="block mt-1 w-full" type="date" name="published_date" :value="old('published_date',\Carbon\Carbon::today()->format('Y-m-d'))" required autofocus />
                                @error('published_date')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Post Description -->
                            <div class="mt-4">
                                <x-label for="Description" :value="__('Description')" />

                                <textarea rows="9" cols="10" id="description" class="block mt-1 w-full rounded-md border-gray-300" type="description" name="description" required autofocus>{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Published date -->

                            <div class="flex items-center justify-end mt-4">
                                        <x-button>
                                            {{ __('Add Post') }}
                                        </x-button>
                            </div>
                        </form>
                    </div> </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
