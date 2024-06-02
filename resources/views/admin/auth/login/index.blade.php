<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Kita</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-white dark:bg-gray-900">
    <div class="container p-3 mx-auto">
        <section>
            <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto h-screen md:h-screen lg:py-0">
                <a href="" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                    UNIGA (Universitas Nigga)
                </a>
                <div
                    class="w-full bg-white rounded-lg shadow dark:border md:mt-0 max-w-md sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700 shadow">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1
                            class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                            Sign in to your account
                        </h1>
                        <form class="space-y-4 md:space-y-6" action="{{ route('login-proses') }}" method="POST">
                            @csrf
                            <div>
                                <label for="phone"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                    Phone</label>
                                <input type="text" name="phone" id="phone"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="08123456789">
                                @error('phone')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                            <div>
                                <label for="password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                <input type="password" name="password" id="password" placeholder="••••••••"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @error('password')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit"
                                class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sign
                                in</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @if ($messages = Session::get('failed'))
        <script>
            Swal.fire({
                icon: 'error',
                text: '{{ $messages }}'
            });
        </script>
    @endif

    @if ($messages = Session::get('success'))
        <script>
            Swal.fire({
                icon: 'success',
                text: '{{ $messages }}'
            });
        </script>
    @endif

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>
