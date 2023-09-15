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
            <header class="w-full flex items-center justify-between h-14 text-black bg-slate-200 rounded dark:bg-gray-800 dark:text-white z-10">
                <div class="flex items-center justify-start md:justify-center pl-4 h-14 border-none">
                    <img class="w-7 h-7 md:w-10 md:h-10 mr-2 rounded-full overflow-hidden" src="https://therminic2018.eu/wp-content/uploads/2018/07/dummy-avatar.jpg" />
                    <span class="hidden md:block">ADMIN</span>
                </div>
                <div class="flex justify-between items-center h-14 header-right">
                    <div class="bg-white rounded flex items-center w-full max-w-xl mr-4 p-2 shadow-sm border border-gray-200">
                        <button class="outline-none focus:outline-none">
                            <svg class="w-5 text-gray-600 h-5 cursor-pointer" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                        <input type="search" name="" id="" placeholder="Search" class="w-full pl-3 text-sm text-black outline-none focus:outline-none bg-transparent" />
                    </div>
                    <ul class="flex items-center">
                        <li>
                            <div class="block w-px h-6 mx-3 bg-gray-400 dark:bg-gray-700"></div>
                        </li>
                        <li>
                            <a href="#" class="flex items-center mr-4 hover:text-gray-600 dark:hover:text-blue-100">
                                <span class="inline-flex mr-1">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                        </path>
                                    </svg>
                                </span>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </header>
            <div id="content" class="h-full mb-10">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 py-4 gap-4">
                    <div class="bg-green-500 dark:bg-green-900 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-green-600 dark:border-green-700 text-white font-medium group">
                        <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                            <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </div>
                        <div class="text-right">
                            <p class="text-2xl">{{$clients_count}}</p>
                            <p>Clients</p>
                        </div>
                    </div>
                    <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
                        <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                            <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                        </div>
                        <div class="text-right">
                            <p class="text-2xl">{{$orders_count}}</p>
                            <p>Orders</p>
                        </div>
                    </div>
                    <div class="bg-red-500 dark:bg-red-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-red-600 dark:border-red-700 text-white font-medium group">
                        <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                            <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>
                        <div class="text-right">
                            <p class="text-2xl">{{env("CURRENCY_SYMBOL", "$") . number_format($sales_total)}}</p>
                            <p>Sales</p>
                        </div>
                    </div>
                    <div class="bg-purple-500 dark:bg-purple-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-purple-600 dark:border-purple -600 text-white font-medium group">
                        <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                            <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                        <div class="text-right">
                            <p class="text-2xl">{{env("CURRENCY_SYMBOL", "$") . number_format($profit_total)}}</p>
                            <p>Profit</p>
                        </div>
                    </div>
                </div>
                <div class="flex py-4">
                    <div class="w-1/2"><canvas id="acquisitions"></canvas></div>
                    <div class="w-1/2"><canvas id="profit"></canvas></div>
                </div>
            </div>
        </main>
    </div>
    <script async>
        (async function() {
            const data = [{
                    month: "Sept 2022",
                    count: 251125
                },
                {
                    month: "Oct 2022",
                    count: 95874
                },
                {
                    month: "Nov 2022",
                    count: 99658
                },
                {
                    month: "Dec 2022",
                    count: 110254
                },
                {
                    month: "Jan 2023",
                    count: 102548
                },
                {
                    month: "Feb 2023",
                    count: 85721
                },
            ];

            new Chart(
                document.getElementById('acquisitions'), {
                    type: 'bar',
                    data: {
                        labels: data.map(row => row.month),
                        datasets: [{
                            label: 'Sales per Month',
                            data: data.map(row => row.count)
                        }]
                    }
                }
            );
        })();
        (async function() {
            const data = [{
                    month: "Sept 2022",
                    count: 35256
                },
                {
                    month: "Oct 2022",
                    count: 21548
                },
                {
                    month: "Nov 2022",
                    count: 26589
                },
                {
                    month: "Dec 2022",
                    count: 35698
                },
                {
                    month: "Jan 2023",
                    count: 15426
                },
                {
                    month: "Feb 2023",
                    count: 19845
                },
            ];

            new Chart(
                document.getElementById('profit'), {
                    type: 'bar',
                    data: {
                        labels: data.map(row => row.month),
                        datasets: [{
                            label: 'Profit per Month',
                            data: data.map(row => row.count),
                            borderColor: 'rgba(0, 100, 0, 0.5)',
                            backgroundColor: 'rgba(100, 238, 100, 0.5)',
                        }]
                    },
                    options: {
                        animations: {
                            tension: {
                                duration: 1000,
                                easing: 'linear',
                                from: 1,
                                to: 0,
                                loop: true
                            }
                        },
                        plugins: {
                            colors: {
                                enabled: true
                            }
                        }
                    }
                }
            );
        })();
    </script>
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