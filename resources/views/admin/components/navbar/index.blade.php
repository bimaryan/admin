<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <a href="" class="flex ms-2 md:me-24">
                    {{-- <img src="" class="h-8 me-3" alt="Extroverse" /> --}}
                    <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Admin Sungut Lele</span>
                </a>
            </div>
            <div class="flex items-center">
                <div class="flex items-center ms-3">
                    <div class="flex gap-3">
                        <button onclick="toggleDarkMode()"
                            class="px-2 py-1 bg-gray-900 rounded-full text-white dark:text-gray-900 dark:bg-white">
                            <span id="dark-mode-icon">
                                @if (isset($isDarkMode) && $isDarkMode)
                                    <i class="bi bi-sun"></i>
                                @else
                                    <i class="bi bi-moon-stars"></i>
                                @endif
                            </span>
                        </button>
                        <button type="button"
                            class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                            aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            <img src="" alt="foto user" class="w-8 h-8 rounded-full" />
                        </button>
                    </div>
                    <div class="max-w-full z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                        id="dropdown-user">
                        <ul class="py-1" role="none">
                            <li>
                                <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white cursor-pointer"
                                    role="menuitem" href="{{ route('profil') }}"><i class="bi bi-person"></i> Account</a>
                            </li>
                            <li>
                                <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white cursor-pointer"
                                    role="menuitem" href="{{ route('settings') }}"><i class="bi bi-gear"></i> Settings</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" method='POST'
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                    role="menuitem"><i class="bi bi-box-arrow-right"></i> Log out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <a style="cursor:pointer;"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
                    href="{{ route('dashboard') }}">
                    <span class="ms-3"><i class="bi bi-house-door"></i> Dashboard</span>
                </a>
            </li>
            <li>
                <a style="cursor:pointer;"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
                    href="{{ route('mahasiswa.index') }}">
                    <span class="flex-1 ms-3 whitespace-nowrap"><i class="bi bi-people"></i> Data Mahasiswa</span>
                </a>
            </li>
        </ul>
        <footer class="fixed bottom-0 left-0 z-50 bg-gray-900 text-white py-2 px-4 text-center">
            <p class="text-sm">Visit our GitHub repository: <a href="https://github.com/bimaryan/admin"
                    class="underline" target="_blank" rel="noopener noreferrer">https://github.com/bimaryan/admin</a>
            </p>
        </footer>
    </div>
</aside>
