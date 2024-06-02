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
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Data Tugas</h2>
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
                                <span
                                    class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">{{ $task->title }}</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 mt-3">
                <h5 class="dark:text-white text-2xl">{{ $task->title }}</h5>
                <p class="dark:text-white mt-5 mb-5">{{ $task->description }}</p>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-5">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">ID</th>
                                <td scope="col" class="px-6 py-3">{{ $task->id }}</td>
                            </tr>
                            <tr
                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th scope="col" class="px-6 py-3">Submission Type</th>
                                <td scope="col" class="px-6 py-3">{{ $task->submission_type }}</td>
                            </tr>
                            <tr>
                                <th scope="col" class="px-6 py-3">Due Date</th>
                                <td scope="col" class="px-6 py-3">{{ $task->due_date }}</td>
                            </tr>
                            <tr
                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th scope="row" class="px-6 py-3">Submission</th>
                                <td scope="col" class="px-6 py-3">
                                    @if ($submission)
                                        @if ($task->submission_type == 'file')
                                            <a href="{{ Storage::url($submission->file_path) }}"
                                                target="_blank">{{ $submission->file_path }}</a>
                                        @else
                                            {{ $submission->online_text }}
                                        @endif
                                    @else
                                        Submission not available
                                    @endif
                                </td>
                            </tr>
                        </thead>
                    </table>
                </div>

                @if (!$submission)
                    @if ($task->submission_type == 'file')
                        <form action="{{ route('mahasiswa.tugas.submit', $task->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="file"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Submit File</label>
                                <input type="file" name="file"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full px-2 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    id="file" required>
                            </div>
                            <button type="submit"
                                class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </form>
                    @else
                        <form action="{{ route('mahasiswa.tugas.submit', $task->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="online_text"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Submit Text</label>
                                <textarea name="online_text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full px-2 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    id="online_text" required></textarea>
                            </div>
                            <button type="submit"
                                class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </form>
                    @endif
                @else
                    {{-- <a href="{{ route('mahasiswa.tugas.edit', $task->id) }}"
                        class="text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:bg-yellow-400 dark:hover:bg-yellow-500 dark:focus:ring-yellow-600">Edit
                        Submission</a> --}}
                @endif
            </div>
        </div>
    </div>
@endsection
