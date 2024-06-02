@extends('index')

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="rounded-lg mt-14">
            @if ($message = Session::get('success'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        text: '{{ $message }}',
                    });
                </script>
            @endif
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6" id="profile">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Profil</h2>
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
                                <a href="{{ route('profil') }}"
                                    class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Profil</a>
                            </div>
                        </li>
                    </ol>
                </nav>
                <hr class="h-px my-3 bg-gray-200 border-0 dark:bg-gray-700">
                <div class="mt-4">
                    <form action="{{ route('mahasiswa.profil.update_nama') }}" method="POST" class="space-y-4 md:space-y-6">
                        @csrf
                        @method('PUT')
                        <div class="flex gap-3 items-center">
                            <label for="nama"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                            <input type="text" name="nama" id="nama" value="{{ $user->nama }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <button type="submit"
                                class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                        </div>
                    </form>
                    <form action="{{ route('mahasiswa.profil.update_phone') }}" method="POST" class="space-y-4 md:space-y-6">
                        @csrf
                        @method('PUT')
                        <div class="flex gap-3 items-center">
                            <label for="phone"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                            <input type="text" name="phone" id="phone" value="{{ $user->phone }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <button type="submit"
                                class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
