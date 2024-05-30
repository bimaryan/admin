<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Kita</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    @include('admin.components.navbar.index')
    @yield('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script>
        function toggleDarkMode() {
            const body = document.body;
            body.classList.toggle('dark');
            const darkModeIcon = document.getElementById('dark-mode-icon');
            if (body.classList.contains('dark')) {
                darkModeIcon.innerHTML = '<i class="bi bi-sun"></i>';
                localStorage.setItem('darkMode', 'true');
            } else {
                darkModeIcon.innerHTML = '<i class="bi bi-moon-stars"></i>';
                localStorage.removeItem('darkMode');
            }
        }
        const isDarkMode = localStorage.getItem('darkMode') === 'true';
        if (isDarkMode) {
            toggleDarkMode();
        }
    </script>
</body>

</html>
