<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-accent min-h-screen">

    <div x-data="{ sidebarOpen: false }" class="min-h-screen flex">

        @include('layouts.partials.admin-sidebar')

        <div class="flex-1 flex flex-col min-h-screen lg:ml-64">
            <header class="bg-white border-b border-light px-4 py-4 flex items-center justify-between lg:hidden">
                <button
                    @click="sidebarOpen = true"
                    class="inline-flex items-center justify-center rounded-md bg-primary text-white px-3 py-2"
                >
                    Menu
                </button>

                <h1 class="text-base font-semibold text-primary">Admin Panel</h1>
            </header>

            <main class="flex-1 w-full p-4 sm:p-6 lg:p-8">
                @yield('content')
            </main>
        </div>
    </div>

</body>
</html>