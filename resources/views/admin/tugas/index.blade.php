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
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white">Tugas Mahasiswa</h2>
                    <a class="px-2 py-1 bg-blue-700 dark:bg-blue-600 rounded hover:bg-blue-800 dark:hover:bg-blue-700 text-white dark:text-black"
                        href="{{ route('admin.tugas.create') }}"><i class="bi bi-journal-plus"></i></a>
                </div>
                <nav class="flex mb-4" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ route('dashboard') }}"
                                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                <i class="bi bi-house-door me-2"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <i class="bi bi-chevron-right text-gray-400"></i>
                                <a href="{{ route('admin.tugas.index') }}"
                                    class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Data
                                    Tugas</a>
                            </div>
                        </li>
                    </ol>
                </nav>
                <hr class="h-px my-3 bg-gray-200 border-0 dark:bg-gray-700">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-3">
                    @foreach ($tasks as $task)
                        <div>
                            <div
                                class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700"">
                                <a href="{{ route('admin.tugas.show', $task->id) }}">
                                    <img class="rounded-t-lg" src="https://flowbite.com/docs/images/blog/image-1.jpg"
                                        alt="" />
                                </a>
                                <div class="p-3">
                                    <div class="flex justify-between items-center gap-3">
                                        <div>
                                            <a href="{{ route('admin.tugas.show', $task->id) }}">
                                                <h5
                                                    class="text-1xl font-bold tracking-tight text-gray-900 dark:text-white">
                                                    {{ $task->title }}
                                                </h5>
                                            </a>
                                        </div>
                                        <div>
                                            <button class="dark:text-white" id="dropdownDefaultButton-{{ $task->id }}"
                                                data-dropdown-toggle="dropdown-{{ $task->id }}"><i
                                                    class="bi bi-three-dots-vertical"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="dropdown-{{ $task->id }}"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownDefaultButton">
                                    <li>
                                        <a href="{{ route('admin.tugas.edit', $task->id) }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="confirmDelete({{ $task->id }})"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</a>
                                        <form id="delete-form-{{ $task->id }}"
                                            action="{{ route('admin.tugas.destroy', $task->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete(taskId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + taskId).submit();
                }
            })
        }
    </script>
@endsection
