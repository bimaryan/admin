@extends('index')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="rounded-lg mt-14">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">{{ __('messages.settings') }}</h2>
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
                                <a href="{{ route('settings') }}"
                                    class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">{{ __('messages.settings') }}</a>
                            </div>
                        </li>
                    </ol>
                </nav>
                <hr class="h-px my-3 bg-gray-200 border-0 dark:bg-gray-700">

                <!-- Language Selector -->
                <div class="mb-4">
                    <form method="POST" action="{{ route('language.change') }}">
                        @csrf
                        <select name="locale" onchange="this.form.submit()"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full px-2 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="en"{{ App::getLocale() === 'en' ? ' selected' : '' }}>English</option>
                            <option value="id"{{ App::getLocale() === 'id' ? ' selected' : '' }}>Indonesia</option>
                        </select>
                    </form>
                </div>

                <!-- Version Information -->
                <div class="mt-4">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">{{ __('messages.application_version') }}
                    </h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            <strong>{{ __('messages.version') }}:</strong> {{ config('app.version') }}
                        </p>
                    </div>
                </div>

                <!-- Feature Update Information -->
                <div class="mt-4">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">{{ __('messages.update_features') }}</h3>
                    <div class="mt-2">
                        <ul class="list-disc text-sm text-gray-600 dark:text-gray-400 pl-5">
                            <li>{{ __('messages.role') }}</li>
                            <li>{{ __('messages.crud_task') }}</li>
                            <li>{{ __('messages.upload_task') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
