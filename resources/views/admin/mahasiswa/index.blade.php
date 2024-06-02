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
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white">Mahasiswa</h2>
                    <a class="px-2 py-1 bg-blue-700 dark:bg-blue-600 rounded hover:bg-blue-800 dark:hover:bg-blue-700 text-white dark:text-black"
                        href="{{ route('mahasiswa.create') }}"><i class="bi bi-person-add"></i></a>
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
                                <a href="{{ route('mahasiswa.index') }}"
                                    class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Data
                                    Mahasiswa</a>
                            </div>
                        </li>
                    </ol>
                </nav>
                <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
                <form class="max-w-md mx-auto mb-2" action="{{ route('mahasiswa.index') }}" method="GET">
                    <label for="search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <i class="bi bi-search dark:text-white"></i>
                        </div>
                        <input type="search" id="search"
                            class="block w-full p-3 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search Mahasiswa" name='search' value="{{ request('search') }}" />
                        <button type="submit"
                            class="text-white absolute end-2 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-1 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i
                                class="bi bi-search"></i></button>
                    </div>
                </form>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <tr class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <th class="px-6 py-3">NIM</th>
                            <th class="px-6 py-3">Nama</th>
                            <th class="px-6 py-3">Kelas</th>
                            <th class="px-6 py-3">Jurusan</th>
                            <th class="px-6 py-3">Prodi</th>
                            <th class="px-6 py-3">Action</th>
                        </tr>
                        @foreach ($mahasiswa as $mhs)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $mhs->nim }}</td>
                                <td class="px-6 py-4">{{ $mhs->nama }}</td>
                                <td class="px-6 py-4">{{ $mhs->kelas }}</td>
                                <td class="px-6 py-4">{{ $mhs->jurusan }}</td>
                                <td class="px-6 py-4">{{ $mhs->prodi }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <a href="{{ route('mahasiswa.edit', $mhs->id) }}"
                                            class="bg-yellow-400 dark:bg-yellow-600 text-white px-2 py-1 rounded"><i
                                                class="bi bi-pencil-square"></i></a>
                                        <button type="button" data-modal-target="modal-{{ $mhs->id }}"
                                            data-modal-toggle="modal-{{ $mhs->id }}"
                                            class="bg-purple-500 dark:bg-purple-600 text-white px-2 py-1 rounded"><i
                                                class="bi bi-eye"></i></button>
                                        <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST"
                                            class="delete-form" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                class="bg-red-500 dark:bg-red-600 text-white px-2 py-1 rounded delete-btn"><i
                                                    class="bi bi-trash3"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div id="modal-{{ $mhs->id }}" tabindex="-1" aria-hidden="true"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <div
                                            class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                Detail Mahasiswa
                                            </h3>
                                            <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-toggle="modal-{{ $mhs->id }}">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <div class="p-6 space-y-6">
                                            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                <strong>NIM:</strong> {{ $mhs->nim }}<br />
                                                <strong>Nama:</strong> {{ $mhs->nama }}<br />
                                                <strong>Kelas:</strong> {{ $mhs->kelas }}<br />
                                                <strong>Jurusan:</strong> {{ $mhs->jurusan }}<br />
                                                <strong>Prodi:</strong> {{ $mhs->prodi }}<br />
                                                <strong>Waktu Buat:</strong> {{ $mhs->created_at }} <br />
                                                <strong>Waktu Update:</strong> {{ $mhs->updated_at }}<br />
                                            </p>
                                        </div>
                                        <div
                                            class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                                            <button data-modal-toggle="modal-{{ $mhs->id }}" type="button"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteForms = document.querySelectorAll('.delete-form');
            deleteForms.forEach(form => {
                form.querySelector('.delete-btn').addEventListener('click', function(event) {
                    event.preventDefault();
                    Swal.fire({
                        title: 'Kamu yakin ingin dihapus ?',
                        text: "Data Mahasiswa dihapus secara Permanen!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, saya ingin hapus!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection
