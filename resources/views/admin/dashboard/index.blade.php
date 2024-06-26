@extends('index')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="rounded-lg mt-14">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6" id="user">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Dashboard</h2>
                <nav class="flex mb-4" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ route('dashboard') }}"
                                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                <i class="bi bi-house-door me-2"></i>
                                Dashboard
                            </a>
                        </li>
                    </ol>
                </nav>
                <hr class="h-px my-3 bg-gray-200 border-0 dark:bg-gray-700">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    <div
                        class="max-w-sm p-3 text-center bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-700 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Jumlah Mahasiswa</h3>
                        <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $mahasiswaCount }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
