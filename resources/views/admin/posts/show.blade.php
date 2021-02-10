<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Posts</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="p-2 flex justify-end">
                     <a class="inline-block mr-4 px-4 py-2 border border-transparent text-sm font-medium rounded-md bg-gray-400 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500" href="{{ route('posts.index') }}">View all posts</a>
                      <a class="inline-block px-4 py-2 border border-transparent text-sm font-medium rounded-md bg-gray-400 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500" href="{{ route('posts.create') }}">+ Add new post</a>
                    </div>
                    <h2 class="text-3xl">Post detail</h2>

                   <ul class="divide-y divide-gray-200">
                       <li class="py-12">
                          <article class="space-y-2 xl:grid xl:grid-cols-4 xl:space-y-0 xl:items-baseline">
                             <dl>
                                <dt class="sr-only">Published on</dt>
                                <dd class="text-base leading-6 font-medium text-gray-500">
                                   <time datetime="2021-02-01T13:35:00.0Z">{{ $post->publication_date->diffForHumans() }}</time>
                                </dd>
                             </dl>
                             <div class="space-y-5 xl:col-span-3">
                                <div class="space-y-6">
                                   <h2 class="text-2xl leading-8 font-bold tracking-tight">{{ $post->title }}</h2>
                                   <div class="prose max-w-none text-gray-500">
                                      <p>

                                          {!! $post->description !!}
                                      </p>

                                   </div>
                                </div>

                             </div>
                          </article>
                       </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
