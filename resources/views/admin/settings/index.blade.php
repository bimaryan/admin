@extends('index')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="rounded-lg mt-14">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Settings</h2>
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
                                <a href="{{ route('settings') }}"
                                    class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Settings</a>
                            </div>
                        </li>
                    </ol>
                </nav>
                <hr class="h-px my-3 bg-gray-200 border-0 dark:bg-gray-700">

                <!-- Version Information -->
                <div class="mt-4">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">Application Version</h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            <strong>Version:</strong> {{ config('app.version') }}
                        </p>
                    </div>
                </div>

                <!-- Feature Update Information -->
                <div class="mt-4">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">Update Features</h3>
                    <div class="mt-2">
                        <ul class="list-disc text-sm text-gray-600 dark:text-gray-400 pl-5">
                            <li>Bisa Memperbarui profil admin</li>
                            <li>Aplikasi versi 1.0.3</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
