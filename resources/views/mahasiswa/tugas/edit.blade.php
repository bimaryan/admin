@extends('index')

@section('content')
    <div class="p-4 sm:ml-64">
        @if ($message = Session::get('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    text: '{{ $message }}',
                });
            </script>
        @endif
        <div class="rounded-lg mt-14">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6" id="user">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">{{ $task->title }}</h2>
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ route('mahasiswa.dashboard') }}"
                                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                <i class="bi bi-house-door me-2"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <i class="bi bi-chevron-right text-gray-400"></i>
                                <a href="{{ route('mahasiswa.tugas.index') }}"
                                    class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Data
                                    Tugas</a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <i class="bi bi-chevron-right text-gray-400"></i>
                                <a href="{{ route('mahasiswa.tugas.show', $task->id) }}"
                                    class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">{{ $task->title }}</a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <i class="bi bi-chevron-right text-gray-400"></i>
                                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Edit
                                    Tugas</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 mt-3">
                <h5 class="dark:text-white text-2xl">{{ $task->title }}</h5>
                <p class="dark:text-white mt-5 mb-5">{{ $task->description }}</p>

                <form method="POST" action=""
                    enctype="multipart/form-data">
                    @csrf
                    @if ($task->submission_type == 'online_text')
                        <div class="mb-3">
                            <label for="online_text"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Submit Text</label>
                            <textarea name="online_text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full px-2 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="online_text">{{ $task->online_text }}</textarea>
                        </div>
                    @elseif($task->submission_type == 'file')
                        <div class="mb-3">
                            <label for="file"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Submit File</label>
                            <input type="file" name="file"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full px-2 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="file">
                            @if ($task->file_path)
                                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Current File: <a
                                        href="{{ Storage::url($task->file_path) }}"
                                        target="_blank">{{ dirname($task->file_path) }}</a></p>
                            @endif
                        </div>
                    @endif
                    <button type="submit"
                        class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save
                        Changes</button>
                </form>
            </div>
        </div>
    </div>
@endsection
