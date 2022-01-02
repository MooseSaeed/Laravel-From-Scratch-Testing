<x-layout>
    <section class="py-8 max-w-md mx-auto">

        <h1 class="text-lg font-bold mb-4">Publish a Post</h1>

        <x-panel>

            <form method="POST" action="/admin/posts">
                @csrf

                <div class="mb-6">

                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">
                        Title
                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="text" name="title" id="title"
                        value="{{ old('title') }}" required>

                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror

                </div>

                <div class="mt-6">

                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="excerpt">
                        Excerpt
                    </label>

                    <textarea name="excerpt" id="excerpt" class="border border-gray-400 p-2 w-full"
                        required>{{ old('excerpt') }}</textarea>

                    @error('excerpt')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror

                </div>
                <div class="mt-6">

                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="body">
                        Body
                    </label>

                    <textarea name="body" id="body" class="border border-gray-400 p-2 w-full"
                        required>{{ old('body') }}</textarea>

                    @error('body')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror

                </div>

                <div class="mt-6">

                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category_id">
                        Category
                    </label>

                    <select name="category_id" id="category_id">
                        @foreach (\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>

                    @error('category')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror

                </div>

                <div class="mt-6">

                    <x-submit-button>
                        Publish
                    </x-submit-button>

                </div>

            </form>

        </x-panel>

    </section>
</x-layout>
