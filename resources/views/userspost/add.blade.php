

@if(session('message'))
<div class="alert alert-info alert-dismissible" role="alert">

    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('message') }}
</div>
@endif
<form method="POST" action="{{ route('store.post') }}">
    @csrf

    <!-- Post Title -->
    <div>
        <x-label for="post title" :value="__('Post Title')" />

        <x-input id="post_title" class="block mt-1 w-full" type="text" name="post_title" :value="old('post_title')" required autofocus />
         <x-input id="user_id"  type="hidden" name="user_id" value="{{ auth()->user()->id }}" />
    </div>

    <!-- Email Address -->
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