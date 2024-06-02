@extends('index')

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="rounded-lg mt-14">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Task Details</h2>
                <hr class="h-px my-3 bg-gray-200 border-0 dark:bg-gray-700">

                <div class="mb-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Title:</h3>
                    <p class="text-gray-700 dark:text-gray-300">{{ $task->title }}</p>
                </div>

                <div class="mb-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Description:</h3>
                    <p class="text-gray-700 dark:text-gray-300">{{ $task->description }}</p>
                </div>

                <div class="mb-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Due Date:</h3>
                    <p class="text-gray-700 dark:text-gray-300">{{ $task->due_date }}</p>
                </div>

                <div class="mb-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Submission Type:</h3>
                    <p class="text-gray-700 dark:text-gray-300">{{ ucfirst($task->submission_type) }}</p>
                </div>

                <a href="{{ route('admin.tugas.index') }}" class="btn btn-primary">Back to Tasks</a>
            </div>
        </div>
    </div>
@endsection
