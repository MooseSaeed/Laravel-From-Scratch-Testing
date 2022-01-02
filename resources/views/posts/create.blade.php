<x-layout>

    <x-setting heading="Publish New Post">

        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf

            <x-form.input name="title" />
            <x-form.input name="thumbnail" type="file" />
            <x-form.textArea name="excerpt" />
            <x-form.textArea name="body" />


            <x-form.field>

                <x-form.label name="category_id" />

                <select name="category_id" id="category_id">
                    @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category" />

            </x-form.field>

            <div class="mt-6">

                <x-form.button>
                    Publish
                </x-form.button>

            </div>

        </form>

    </x-setting>

</x-layout>
