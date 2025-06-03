<x-app-layout class="dark">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Pengaturan Blog
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg overflow-x-auto">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <table class="w-full whitespace-no-wrap table-fixed text-white">
                        <thead>
                            <tr class="text-center font-bold text-white">
                                <td class="border px-6 py-4 w-[80px] dark:border-gray-700">No</td>
                                <td class="border px-6 py-4 dark:border-gray-700">Judul</td>
                                <td class="border px-6 py-4 lg:w-[250px] hidden lg:table-cell dark:border-gray-700">Tanggal</td>
                                <td class="border px-6 py-4 lg:w-[100px] hidden lg:table-cell dark:border-gray-700">Status</td>
                                <td class="border px-6 py-4 lg:w-[250px] w-[100px] dark:border-gray-700">Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $value) 
                                                            <tr>
                                <td class="border px-6 py-4 text-center dark:border-gray-700">{{ $data->firstItem() + $loop->index }}</td>
                                <td class="border px-6 py-4 dark:border-gray-700">
                                    {{ $value->title }}
                                    <div class="block lg:hidden text-sm text-gray-400">
                                    {{ $value->status }} | {{ $value->created_at->isoFormat('dddd, D MMMM Y') }}
                                    </div>
                                </td>
                                <td class="border px-6 py-4 text-center text-sm hidden lg:table-cell text-gray-400 dark:border-gray-700">{{ $value->created_at->isoFormat('dddd, D MMMM Y') }}</td>
                                <td class="border px-6 py-4 text-center text-sm hidden lg:table-cell text-gray-400 dark:border-gray-700">   {{ $value->status }} </td>
                                <td class="border px-6 py-4 text-center dark:border-gray-700">
                                    <a href='{{ route("member.blogs.edit", ['blog' => $value->id]) }}' class="text-blue-400 hover:text-blue-300 px-2">edit</a>
                                    <a href='' class="text-blue-400 hover:text-blue-300 px-2">lihat</a>
                                    <button type='submit' class='text-red-500 hover:text-red-400 px-2'>
                                        hapus
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="p-5">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>