<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>{{ config('app.name', 'Laravel') }}</title>

      <!-- Fonts -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

      <!-- Styles -->
      @livewireStyles

      <!-- Scripts -->
      @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="px-4 py-6 mx-auto sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
              <!-- Flash Messages -->
              <div>
                @if (session()->has('message'))
                  <x-success-msg>
                    {{ session('message') }}
                  </x-success-msg>
                @endif
              </div>
              
                {{ $slot }}
            </main>
          
          <footer class="mt-5 p-4">
            <p>All rights reserved &copy; 2022 AyMakan</p>
          </footer>
        </div>

        @stack('modals')

        @livewireScripts

          <script>
            setTimeout(() => {
              document.getElementById('alert').remove()
            }, 3500)
          </script>
    </body>
</html>
