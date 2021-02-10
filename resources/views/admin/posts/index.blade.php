<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Posts</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(auth()->user()->posts_endpoint)
                        <a class="text-blue-500 hover:underline" href="{{ route('posts.import') }}">Import Posts</a>
                    @endif
                    <a href="{{ route('posts.create') }}" type="button" class="float-right inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md bg-gray-400 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        Add new post
                    </a>

                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="flex flex-col clear-both mt-14">
                        @if(session('message'))
                            <div class="alert-content ml-4 mb-4">
                                <div class="alert-description text-lg text-green-600">
                                    {{ session('message') }}
                                </div>
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert-content ml-4 mb-4">
                                <div class="alert-description text-lg text-red-500">
                                    {{ session('error') }}
                                </div>
                            </div>
                        @endif

                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg mb-4">

                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Title
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Description
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Published on
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                            @forelse ($posts as $post)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                       <a class="text-blue-500" href="{{ route('posts.show',$post->id) }}"> {{ \Illuminate\Support\Str::limit($post->title, 30) }}</a>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ \Illuminate\Support\Str::limit($post->description, 100) }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500" title="{{ $post->publication_date }}">
                                                        {{ $post->publication_date->diffForHumans() }}
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr><td colspan="3" class="py-4 text-center">No records found.</td></tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    {{ $posts->links() }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
