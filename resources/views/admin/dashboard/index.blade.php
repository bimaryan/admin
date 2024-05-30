@extends('index')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="rounded-lg mt-14">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6" id="user">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Dashboard</h2>
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
