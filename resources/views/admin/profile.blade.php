<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">Profile</h2></x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form class="space-y-8 divide-y divide-gray-200" method="post" action="/dashboard/profile">
                @csrf
                @method('patch')
                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                    @if(session('message'))
                        <div class="alert-content ml-4 mt-6">

                            <div class="alert-description text-lg text-green-600">
                                {{ session('message') }}
                            </div>
                        </div>
                    @endif
                    <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
                        <div>
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Profile
                            </h3>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                Your profile information
                            </p>
                        </div>
                        <div class="space-y-6 sm:space-y-5">
                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="first_name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Blog posts endpoint
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <div class="max-w-lg flex rounded-md shadow-sm">
                                        <input value="{{ old('posts_endpoint', auth()->user()->posts_endpoint) }}" type="url" name="posts_endpoint" id="posts-endpoint" placeholder="https://google.com" class="flex-1 block w-full focus:ring-indigo-500 focus:border-indigo-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                                    </div>
                                    @error('posts_endpoint') <div class="text-sm text-red-500">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-5">
                    <div class="flex justify-end">
                        <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Cancel
                        </button>
                        <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
