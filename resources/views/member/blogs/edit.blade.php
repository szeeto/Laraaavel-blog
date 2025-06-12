<x-app-layout class="dark">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Edit Tulisan
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-2xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-white">
                                Edit Data Tulisan
                            </h2>
                            <p class="mt-1 text-sm text-white">
                                Silakan melakukan perubahan data
                            </p>
                        </header>

                        <form method="post" action="{{ route('member.blogs.update', ['post' => $data->id]) }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div>
                                <x-input-label for="title" value="Title" />
                                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" value="{{ old('title', $data->title) }}"/>
                            </div>
                            <div>
                                <x-input-label for="description" value="Description" />
                                <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" value="{{ old('description', $data->description) }}"/>
                            </div>
                            <div>
                                <x-input-label for="thumbnail" value="Thumbnail" class="text-white" />
                                @if($data->thumbnail)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $data->thumbnail) }}" alt="Thumbnail" class="h-24 rounded">
                                    </div>
                                @endif
                                <input id="thumbnail" name="thumbnail" type="file" class="w-full border border-gray-300 rounded-md dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                            </div>
                            <div>
                                <x-textarea-trix value="{!! $data->content !!}" id="content" name="content" />
                            </div>
                            <div>
                                <x-select name="status">
                                    <option value="draft" {{ old('status', $data->status) == 'draft' ? 'selected' : '' }}>Simpan sebagai draft</option>
                                    <option value="published" {{ old('status', $data->status) == 'published' ? 'selected' : '' }}>Publish</option>
                                </x-select>
                            </div>
                            <div class="flex items-center gap-4">
                                <a href="{{ route('member.blogs.index') }}">
                                    <x-secondary-button>Kembali</x-secondary-button>
                                </a>
                                <x-primary-button type="submit">Simpan</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
