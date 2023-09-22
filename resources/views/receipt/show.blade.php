<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Laravel</title>
    @include('head')
</head>

<body class="antialiased">
    <div class="bg-white dark:bg-slate-900 min-h-screen">
        @include('sidebar')
        <main class="relative p-3" style="margin-left: 80px;">
            <header
                class="w-full flex items-center justify-between h-14 text-black bg-slate-200 rounded dark:bg-gray-800 dark:text-white z-10">
                <div class="flex items-center justify-start md:justify-center pl-4 h-14 border-none">
                    <img class="w-7 h-7 md:w-10 md:h-10 mr-2 rounded-full overflow-hidden"
                        src="https://therminic2018.eu/wp-content/uploads/2018/07/dummy-avatar.jpg" />
                    <span class="hidden md:block">ADMIN</span>
                </div>
                <div class="flex justify-between items-center h-14 header-right">
                    <div
                        class="bg-white rounded flex items-center w-full max-w-xl mr-4 p-2 shadow-sm border border-gray-600">
                        <button class="outline-none focus:outline-none">
                            <svg class="w-5 text-gray-600 h-5 cursor-pointer" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                        <input type="search" name="" id="" placeholder="Search"
                            class="w-full pl-3 text-sm text-black outline-none focus:outline-none bg-transparent" />
                    </div>
                    <ul class="flex items-center">
                        <li>
                            <div class="block w-px h-6 mx-3 bg-gray-400 dark:bg-gray-700"></div>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center mr-4 hover:text-gray-600 dark:hover:text-blue-100">
                                <span class="inline-flex mr-1">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                        </path>
                                    </svg>
                                </span>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </header>
            <div id="content" class="h-full mt-4 relative">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="error-alert bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold">Dang it! </strong>
                            <span class="block sm:inline"> {{ $error }}</span>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3"
                                onclick="this.closest('.error-alert').remove()">
                                <svg class="fill-current h-6 w-6 text-red-500" role="button"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <title>Close</title>
                                    <path
                                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                </svg>
                            </span>
                        </div>
                    @endforeach
                @endif
                <div class="grid grid-cols-3 gap-2">
                    <div class="col-span-2">
                        <div class="p-5 bg-slate-100 dark:bg-slate-700 rounded shadow">
                            <h2 class="text-2xl font-bold mb-4 text-gray-700 dark:text-gray-300">Receipt</h2>
                            <table
                                class="bg-gray-100 dark:bg-gray-800 min-w-full shadow divide-y divide-gray-200 dark:divide-gray-700">
                                <thead
                                    class="text-sm text-left text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-2 py-2">#</th>
                                        <th scope="col" class="px-2 py-2">Name</th>
                                        <th scope="col" class="px-2 py-2">Unit Price</th>
                                        <th scope="col" class="px-2 py-2">Quantity</th>
                                        <th scope="col" class="px-2 py-2">Total Price</th>
                                    </tr>
                                </thead>
                                <tbody
                                    class="text-sm bg-white dark:text-gray-400 divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                    @foreach ($receipt->list as $stock)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td class="px-2 py-2">{{ $stock->id }}</td>
                                            <td scope="row" class="px-2 py-2">{{ $stock->name }}</td>
                                            <td class="px-2 py-2">{{ $stock->sell_price }}</td>
                                            <td class="px-2 py-2">{{ $stock->quantity }}</td>
                                            <td class="px-2 py-2">{{ $stock->sell_price * $stock->quantity }}</td>
                                        </tr>
                                    @endforeach
                                    <!-- Add more rows for each stock in your inventory -->
                                </tbody>
                                <tfoot
                                    class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-2 py-2"></th>
                                        <th scope="col" class="px-2 py-2"></th>
                                        <th scope="col" class="px-2 py-2"></th>
                                        <th scope="col" class="px-2 py-2"></th>
                                        <th scope="col" class="px-2 py-2 text-left">{{ $receipt->total . " " . env("CURRENCY_SYMBOL", "$") }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div>
                        <div class="shadow-md rounded p-5 mb-4 bg-slate-100 dark:bg-slate-700">
                            <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                    @if ($receipt->client)
                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <th colspan="2"
                                                class="border py-3 px-6 tracking-wider text-gray-700 uppercase dark:text-gray-400">
                                                Client</th>
                                        </tr>
                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <th
                                                class="border py-3 px-6 text-xs tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Name</th>
                                            <td
                                                class="border py-3 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $receipt->client->name }}</td>
                                        </tr>
                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <th
                                                class="border py-3 px-6 text-xs tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Phone Number</th>
                                            <td
                                                class="border py-3 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $receipt->client->phone_number }}</td>
                                        </tr>
                                    @else
                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <th colspan="2"
                                                class="border py-3 px-6 tracking-wider text-gray-700 uppercase dark:text-gray-400">
                                                A Guest</th>
                                        </tr>
                                    @endif
                                    @if ($receipt->status == 'paid')
                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <th colspan="2"
                                                class="border py-3 px-6 tracking-wider text-gray-700 uppercase dark:text-gray-400">
                                                <div
                                                    class="py-1 px-2 bg-green-400 text-green-700 inline-block rounded-lg">
                                                    Paid</div>
                                            </th>
                                        </tr>
                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <th
                                                class="border py-3 px-6 text-xs tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Payment Method</th>
                                            <td
                                                class="border py-3 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                @if ($receipt->payment_method == 'credit_card')
                                                    <div
                                                        class="rounded-full bg-sky-500 text-sky-800 text-xs font-bold inline-block py-1 px-2">
                                                        <svg viewBox="0 2 24 24" fill="none" class="h-4 w-4 inline"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <path
                                                                    d="M3 9H21M7 15H9M6.2 19H17.8C18.9201 19 19.4802 19 19.908 18.782C20.2843 18.5903 20.5903 18.2843 20.782 17.908C21 17.4802 21 16.9201 21 15.8V8.2C21 7.0799 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V15.8C3 16.9201 3 17.4802 3.21799 17.908C3.40973 18.2843 3.71569 18.5903 4.09202 18.782C4.51984 19 5.07989 19 6.2 19Z"
                                                                    stroke="currentColor" stroke-width="3"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                </path>
                                                            </g>
                                                        </svg>
                                                        Credit Card
                                                    </div>
                                                @else
                                                    @if ($receipt->payment_method == 'check')
                                                        <div
                                                            class="rounded-full bg-slate-400 text-slate-700 text-xs font-bold inline-block py-1 px-2">
                                                            <svg fill="currentColor" viewBox="0 0 640.00 640.00"
                                                                class="w-4 h-4 inline"
                                                                xmlns="http://www.w3.org/2000/svg" stroke-width="0">
                                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                    stroke-linejoin="round"></g>
                                                                <g id="SVGRepo_iconCarrier">
                                                                    <path
                                                                        d="M608 32H32C14.33 32 0 46.33 0 64v384c0 17.67 14.33 32 32 32h576c17.67 0 32-14.33 32-32V64c0-17.67-14.33-32-32-32zM176 327.88V344c0 4.42-3.58 8-8 8h-16c-4.42 0-8-3.58-8-8v-16.29c-11.29-.58-22.27-4.52-31.37-11.35-3.9-2.93-4.1-8.77-.57-12.14l11.75-11.21c2.77-2.64 6.89-2.76 10.13-.73 3.87 2.42 8.26 3.72 12.82 3.72h28.11c6.5 0 11.8-5.92 11.8-13.19 0-5.95-3.61-11.19-8.77-12.73l-45-13.5c-18.59-5.58-31.58-23.42-31.58-43.39 0-24.52 19.05-44.44 42.67-45.07V152c0-4.42 3.58-8 8-8h16c4.42 0 8 3.58 8 8v16.29c11.29.58 22.27 4.51 31.37 11.35 3.9 2.93 4.1 8.77.57 12.14l-11.75 11.21c-2.77 2.64-6.89 2.76-10.13.73-3.87-2.43-8.26-3.72-12.82-3.72h-28.11c-6.5 0-11.8 5.92-11.8 13.19 0 5.95 3.61 11.19 8.77 12.73l45 13.5c18.59 5.58 31.58 23.42 31.58 43.39 0 24.53-19.05 44.44-42.67 45.07zM416 312c0 4.42-3.58 8-8 8H296c-4.42 0-8-3.58-8-8v-16c0-4.42 3.58-8 8-8h112c4.42 0 8 3.58 8 8v16zm160 0c0 4.42-3.58 8-8 8h-80c-4.42 0-8-3.58-8-8v-16c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16zm0-96c0 4.42-3.58 8-8 8H296c-4.42 0-8-3.58-8-8v-16c0-4.42 3.58-8 8-8h272c4.42 0 8 3.58 8 8v16z">
                                                                    </path>
                                                                </g>
                                                            </svg>
                                                            Check
                                                        </div>
                                                    @else
                                                        @if ($receipt->payment_method == 'cash')
                                                            <div
                                                                class="rounded-full bg-teal-500 text-teal-800 text-xs font-bold inline-block py-1 px-2">
                                                                <svg viewBox="50 60 280 280" fill="none"
                                                                    class="w-4 h-4 inline"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                    <g id="SVGRepo_tracerCarrier"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round"></g>
                                                                    <g id="SVGRepo_iconCarrier">
                                                                        <path
                                                                            d="M303.126 136.208C281.015 132.778 265.08 104.845 246.318 98.0984C244.081 97.2946 232.069 107.635 229.8 109.141C197.375 130.656 162.319 147.633 129.719 168.977C122.439 173.743 85.8024 187.889 83.1465 196.481C82.674 198.014 82.5844 200.212 83.1465 200.322C91.5257 201.965 100.174 208.769 107.257 213.499C111.791 216.526 151.723 247.346 155.006 244.84C189.824 218.255 264.876 166.587 305.77 140.126"
                                                                            stroke="currentColor" stroke-width="25"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"></path>
                                                                        <path
                                                                            d="M312.312 160.424C262.454 184.856 195.245 257.231 155.602 278.601C153.826 279.558 139.956 268.042 137.675 266.812C123.434 259.133 110.102 248.85 97.7998 237.996"
                                                                            stroke="currentColor" stroke-width="25"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"></path>
                                                                        <path
                                                                            d="M317 184.071C304.217 178.343 169.407 306.551 156.375 300.919C143.344 295.288 116.401 273.745 100.319 261.358"
                                                                            stroke="currentColor" stroke-width="25"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"></path>
                                                                        <path
                                                                            d="M188.842 155.443C219.671 118.612 245.085 191.932 193.136 184.294C182.431 182.721 176.52 159.313 184.875 153.304"
                                                                            stroke="currentColor" stroke-width="25"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"></path>
                                                                        <path
                                                                            d="M119.806 192.842C125.346 200.295 129.325 195.187 139.627 187.5"
                                                                            stroke="currentColor" stroke-width="25"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"></path>
                                                                        <path
                                                                            d="M263.16 144.401C268.505 140.996 264.15 143.816 264.15 137.28"
                                                                            stroke="currentColor" stroke-width="25"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"></path>
                                                                    </g>
                                                                </svg>
                                                                Cash
                                                            </div>
                                                        @endif
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                    @else
                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <th colspan="2"
                                                class="border py-3 px-6 tracking-wider text-gray-700 uppercase dark:text-gray-400">
                                                <div class="py-1 px-2 bg-red-400 text-red-700 inline-block rounded-lg">
                                                    unPain</div>
                                            </th>
                                        </tr>
                                    @endif
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <th colspan="2"
                                            class="border py-3 px-6 tracking-wider text-gray-700 uppercase dark:text-gray-400">
                                            Date & Time
                                        </th>
                                    </tr>
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td
                                            class="border py-3 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <div class="flex items center">
                                                <svg viewBox="-1 -1 23 23" fill="none" class="w-4 h-4 mr-2"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M20 10V7C20 5.89543 19.1046 5 18 5H6C4.89543 5 4 5.89543 4 7V10M20 10V19C20 20.1046 19.1046 21 18 21H6C4.89543 21 4 20.1046 4 19V10M20 10H4M8 3V7M16 3V7"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                                    <rect x="6" y="12" width="3" height="3"
                                                    rx="0.5" fill="currentColor" />
                                                <rect x="10.5" y="12" width="3" height="3"
                                                    rx="0.5" fill="currentColor" />
                                                    <rect x="15" y="12" width="3" height="3"
                                                    rx="0.5" fill="currentColor" />
                                                </svg>
                                            {{ date('D d M Y', strtotime($receipt->created_at)) }}
                                        </div>
                                        </td>
                                        <td
                                            class="border py-3 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <div class="flex items-center">
                                                <svg viewBox="0 0 24 24" fill="none" class="h-4 w-4 mr-2"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                    <path d="M12 6V12" stroke="currentColor" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M16.24 16.24L12 12" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            {{ date('h:i A', strtotime($receipt->created_at)) }}
                                        </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script>
        const sidebar = document.querySelector("aside");
        const maxSidebar = document.querySelector(".max")
        const miniSidebar = document.querySelector(".mini")
        const roundout = document.querySelector(".roundout")
        const maxToolbar = document.querySelector(".max-toolbar")
        const logo = document.querySelector('.logo')
        const content = document.querySelector('.content')
        const moon = document.querySelector(".moon")
        const sun = document.querySelector(".sun")

        function setDark(val) {
            if (val === "dark") {
                document.documentElement.classList.add('dark')
                moon.classList.add("hidden")
                sun.classList.remove("hidden")
            } else {
                document.documentElement.classList.remove('dark')
                sun.classList.add("hidden")
                moon.classList.remove("hidden")
            }
        }

        function openNav() {
            if (sidebar.classList.contains('-translate-x-48')) {
                // max sidebar 
                sidebar.classList.remove("-translate-x-48")
                sidebar.classList.add("translate-x-none")
                maxSidebar.classList.remove("hidden")
                maxSidebar.classList.add("flex")
                miniSidebar.classList.remove("flex")
                miniSidebar.classList.add("hidden")
                maxToolbar.classList.add("translate-x-0")
                maxToolbar.classList.remove("translate-x-24", "scale-x-0")
                logo.classList.remove("ml-12")
                content.classList.remove("ml-12")
                content.classList.add("ml-12", "md:ml-60")
            } else {
                // mini sidebar
                sidebar.classList.add("-translate-x-48")
                sidebar.classList.remove("translate-x-none")
                maxSidebar.classList.add("hidden")
                maxSidebar.classList.remove("flex")
                miniSidebar.classList.add("flex")
                miniSidebar.classList.remove("hidden")
                maxToolbar.classList.add("translate-x-24", "scale-x-0")
                maxToolbar.classList.remove("translate-x-0")
                logo.classList.add('ml-12')
                content.classList.remove("ml-12", "md:ml-60")
                content.classList.add("ml-12")
            }
        }
    </script>
    <script>
        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
        // Change the icons inside the button based on previous settings
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }
        var themeToggleBtn = document.getElementById('theme-toggle');
        themeToggleBtn.addEventListener('click', function() {
            // toggle icons inside button
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');
            // if set via local storage previously
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }
                // if NOT set via local storage previously
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }
        });
    </script>
</body>

</html>
