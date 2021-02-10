<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine.js" integrity="sha512-nIwdJlD5/vHj23CbO2iHCXtsqzdTTx3e3uAmpTm4x2Y8xCIFyWu4cSIV8GaGe2UNVq86/1h9EgUZy7tn243qdA==" crossorigin="anonymous"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div>
        <nav class="bg-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-8 w-8" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow">
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <a href="/" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            <!-- Profile dropdown -->
                            <div class="ml-3 relative" x-data="{ showDropdown: false }">
                                <div>
                                    @auth
                                        <button
                                            class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu" aria-haspopup="true">
                                            <span class="sr-only">Open user menu</span>
                                            <a class="text-gray-300 mr-4 hover:underline" href="{{ route('dashboard') }}">Admin</a>
                                        </button>
                                    @endauth
                                    @guest
                                        <div class="flex">
                                            <a class="text-gray-300 mr-4 hover:underline" href="/login">Login</a>
                                            <a class="text-gray-300 hover:underline" href="/register">Register</a>
                                        </div>
                                    @endguest
                                </div>
                                <div
                                    x-show="showDropdown"
                                    @click.away="showDropdown = false"
                                    class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold leading-tight text-gray-900">
                    Blogs
                </h1>
            </div>
        </header>

        <main>
            <div class="max-w-prose mx-auto py-6 sm:px-6 lg:px-8">
                <form action="" method="get">
                    <select class="rounded-md" name="sort" id="sort" onchange="reloadPage(this.value)">
                        <option value="desc" {{ request('sort', 'desc') === 'desc' ? 'selected' : '' }}>Newest first</option>
                        <option value="asc" {{ request('sort') === 'asc' ? 'selected' : '' }}>Oldest first</option>
                    </select>
                </form>
                <ul class="divide-y divide-gray-200">
                    @foreach($posts as $post)
                        <li class="py-4 mb-4">
                            <div class="flex space-x-3">
                                <div class="flex-1 space-y-1">
                                    <div class="flex items-center justify-between pb-2">
                                        <h3 class="text-sm font-medium w-4/5">{{ $post->title }}</h3>
                                        <p class="text-sm text-gray-500"><span title="{{ $post->publication_date->toDateString() }}">{{ $post->publication_date->diffForHumans() }}</span></p>
                                    </div>
                                    <p class="text-sm text-gray-500 w-4/5">{{ \Illuminate\Support\Str::limit($post->description, 300) }}</p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                {{ $posts->appends($_GET)->links() }}
            </div>
        </main>
    </div>
    <script>
        function reloadPage(v) {
            let uri = document.location.href;
            let key = 'sort';
            let value = v;
            var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
            var separator = uri.indexOf('?') !== -1 ? "&" : "?";
            if (uri.match(re)) {
                uri = uri.replace(re, '$1' + key + "=" + value + '$2');
            }
            else {
                uri = uri + separator + key + "=" + value;
            }

            window.location.href = uri;
        }
    </script>
</body>
</html>

