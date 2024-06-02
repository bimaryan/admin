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
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Daftar Tugas</h2>
                <nav class="flex mb-4" aria-label="Breadcrumb">
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
                    </ol>
                </nav>
                <hr class="h-px my-3 bg-gray-200 border-0 dark:bg-gray-700">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-3">
                    @foreach ($tasks as $task)
                        <div>
                            <div
                                class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                <a href="{{ route('mahasiswa.tugas.show', $task->id) }}">
                                    <img class="rounded-t-lg" src="https://flowbite.com/docs/images/blog/image-1.jpg"
                                        alt="" />
                                </a>
                                <div class="p-3">
                                    <div class="flex justify-between items-center gap-3">
                                        <div>
                                            <a href="{{ route('mahasiswa.tugas.show', $task->id) }}">
                                                <h5
                                                    class="mb-2 text-1xl font-bold tracking-tight text-gray-900 dark:text-white">
                                                    {{ $task->title }}
                                                </h5>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
