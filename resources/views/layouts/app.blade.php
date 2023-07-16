<!DOCTYPE html>
<html lang="es">

<head>
    @include('layouts.common-head')

    @stack('css')
</head>

<body>
    <div id="app">

        @include('layouts.header')

        <main class="py-4">
            @yield('content')
        </main>

    </div>

    @include('layouts.common-end')

    @stack('scripts')

</body>

</html>
