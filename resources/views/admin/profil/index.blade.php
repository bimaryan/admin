@extends('index')

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="rounded-lg mt-14">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6" id="profile">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Profil</h2>
                <hr class="h-px my-3 bg-gray-200 border-0 dark:bg-gray-700">
                <div class="mt-4">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">User Information</h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-600 dark:text-gray-400"><strong>Nama:</strong> {{ $user->nama }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400"><strong>Phone:</strong> {{ $user->phone }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
