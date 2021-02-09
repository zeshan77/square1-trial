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
                    <p><a class="text-blue" href="{{ route('create.post') }}">+ Add new post</a></p>
                      <table class="min-w-full table-auto">
                        <thead class="justify-between">
                          <tr class="bg-gray-800">
                            <th class="px-16 py-2">
                              <span class="text-gray-300">S.NO</span>
                            </th>
                            <th class="px-16 py-2">
                              <span class="text-gray-300">Post Title</span>
                            </th>
                             <th class="px-16 py-2">
                              <span class="text-gray-300">Post Description</span>
                            </th>
                            <th class="px-16 py-2">
                              <span class="text-gray-300">Published Date</span>
                            </th>
                            <th class="px-16 py-2">
                              <span class="text-gray-300">Action</span>
                            </th>
                          </tr>
                        </thead>
                      <tbody>
                        @foreach($allposts as $post)
                        <tr class="bg-white border-4 border-gray-200">
                          <td><span class="text-center ml-2 font-semibold">{{ $loop->iteration }}</span></td>
                          <td class="px-16 py-2">{{ $post->post_title }}</td>
                          <td class="px-16 py-2">{{ $post->post_description }}</td>
                          <td class="px-16 py-2">{{ $post->PublishedDate }}</td>
                          <td class="px-16 py-2"><a href="{{ route('show.post',$post->id) }}">View detail</a></td>
                        </tr>
                        @endforeach
                        
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
