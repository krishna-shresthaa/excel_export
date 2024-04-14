<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Upload a json file') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route("json.upload") }}" enctype="multipart/form-data" method="POST" class="max-w-sm mx-auto">
                    @csrf
                        <div class="mb-5">
                            <label for="file_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">File Name</label>
                            <input type="file_name" name="file_name" id="file_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                            <x-input-error :messages="$errors->get('file_name')" class="mt-2" />
                        </div>
                    <div class="mb-5">
                            <label for="file" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">File</label>
                            <input type="file" name="file" id="file" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                            <x-input-error :messages="$errors->get('file')" class="mt-2" />
                    </div>
                        <button type="submit" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Upload</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
