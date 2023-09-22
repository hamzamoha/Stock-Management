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
                        class="bg-white rounded flex items-center w-full max-w-xl mr-4 p-2 shadow-sm border border-gray-200">
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
            <div id="content" class="h-full mb-10">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 py-4 gap-4">
                    <div
                        class="bg-yellow-500 dark:bg-yellow-900 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-yellow-600 dark:border-yellow-700 text-white font-medium group">
                        <div
                            class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                            <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="stroke-current text-black dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </div>
                        <div class="text-right">
                            <p class="text-2xl">{{ $clients_count }}</p>
                            <p>Clients</p>
                        </div>
                    </div>
                    <div
                        class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
                        <div
                            class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                            <svg width="30" height="30" fill="currentColor" viewBox="-5 -5 32 32"
                                stroke="currentColor"
                                class="stroke-current text-black dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                                <path
                                    d="M2 21C1 21 0 20 0 19V2C0 1 1 0 2 0H17.8693C18.8693 0 19.8693 1 19.8693 2V10H18.8693V2C18.8693 1 17.8693 1 17.8693 1H2C2 1 1 1 1 2V19C1 19 1 20 2 20H10L11 21Z">
                                </path>
                                <path
                                    d="M3.3348 4.0753C3.131 4.0753 2.9643 3.816 2.9643 3.501 2.9643 3.1861 3.131 2.9267 3.3348 2.9267H9.633C9.8368 2.9267 10.0035 3.186 10.0035 3.501 10.0035 3.8159 9.8368 4.0753 9.633 4.0753H3.3348Z">
                                </path>
                                <path
                                    d="M3.2607 7.0392C3.094 7.0392 2.9643 6.7984 2.9643 6.4649S3.094 5.8906 3.2607 5.8906H7.7806C7.9473 5.8906 8.077 6.1314 8.077 6.4649S7.9473 7.0392 7.7806 7.0392H3.2607Z">
                                </path>
                                <path
                                    d="M17.1168 23.8592C16.4685 23.8592 15.7645 23.8222 14.8568 23.7481 13.5416 23.637 12.3375 23.0257 11.1705 21.8957L5.9097 16.7459C4.6871 15.5603 4.6315 14.0043 5.7245 12.8188 6.1876 12.3372 6.9101 12.0408 7.6881 12.0408 8.4661 12.0408 9.17 12.3372 9.6146 12.8559 9.6331 12.8744 9.6702 12.9115 9.7443 12.9485 9.7628 12.967 9.7999 12.9855 9.8184 13.0041V10.5218 9.2992C9.8184 8.3545 9.8184 7.3912 9.8369 6.4465 9.8554 5.0387 10.9484 3.9643 12.3932 3.9643H12.4117C13.801 3.9643 14.8569 4.9831 14.931 6.3724 14.9495 6.6873 14.9495 7.0207 14.931 7.3542V7.7803H15.2089C16.1722 7.7803 16.9131 8.1137 17.4503 8.8177 17.4688 8.8547 17.58 8.8918 17.7282 8.8918 17.7838 8.8918 17.8393 8.8918 17.8764 8.8733 18.0431 8.8548 18.2098 8.8363 18.358 8.8363 19.099 8.8363 19.7473 9.1327 20.303 9.744 20.3956 9.8366 20.5994 9.9107 20.7846 9.9107H20.8587C20.9884 9.8922 21.1366 9.8737 21.2662 9.8737 22.6555 9.8737 23.767 10.8555 23.7855 12.1337 23.8411 14.4863 23.8781 16.8018 23.6188 19.0988 23.3039 21.8774 21.822 23.3594 18.9322 23.7299 18.395 23.8225 17.7837 23.8596 17.1168 23.8596ZM7.5954 13.0966C7.2064 13.0966 6.8359 13.2448 6.558 13.5041 6.2246 13.8375 6.0393 14.2265 6.0393 14.6526 6.0393 15.0972 6.2431 15.5418 6.6136 15.9122L7.3175 16.6161C8.855 18.1351 10.4481 19.6911 12.0412 21.2286 12.8192 21.9696 13.7084 22.4512 14.6902 22.6364 15.4497 22.7846 16.2092 22.8587 16.9502 22.8587 17.6171 22.8587 18.2839 22.8031 18.9323 22.6735 21.2849 22.2474 22.3593 21.1175 22.5816 18.9316 22.7854 16.8384 22.7668 14.6896 22.7298 12.6148V12.2814C22.7113 11.5219 22.1741 11.0032 21.4146 11.0032 21.2108 11.0032 21.0256 11.0402 20.8218 11.1143V14.0043C20.8218 14.2636 20.8218 14.7638 20.3031 14.7638H20.2846C20.1179 14.7638 19.9882 14.7268 19.9141 14.6341 19.7659 14.4859 19.7474 14.208 19.7474 13.9858V13.8747C19.7474 13.0226 19.7659 12.1519 19.7474 11.2813 19.7289 10.5218 19.1917 9.9846 18.4507 9.9846 18.2655 9.9846 18.0802 10.0216 17.9135 10.0772V13.0781C17.9135 13.3374 17.8579 13.5412 17.7283 13.6709 17.6357 13.7635 17.506 13.8191 17.3393 13.8191H17.3208C16.8206 13.8006 16.8206 13.2819 16.8206 13.0967V11.8741 10.3181C16.8206 9.9661 16.6724 9.5957 16.3945 9.3178 16.1352 9.0585 15.7832 8.9103 15.4312 8.9103 15.283 8.9103 15.1163 8.9288 14.9681 8.9844V10.318C14.9681 10.9478 14.9681 11.6147 14.9311 12.263 14.9126 12.4297 14.7644 12.5594 14.6162 12.6891 14.5606 12.7447 14.4865 12.8002 14.431 12.8558L14.3754 12.9114 14.3384 12.8188C14.3014 12.7632 14.2458 12.7077 14.1902 12.6706 14.0791 12.5409 13.9494 12.4113 13.8753 12.2631 13.8197 12.152 13.8383 12.0223 13.8383 11.9111V11.7629 10.1513C13.8383 8.9657 13.8383 7.7432 13.8198 6.5391 13.8198 5.6499 13.2455 5.0572 12.412 5.0386 11.5043 5.0386 10.893 5.6869 10.893 6.6317V15.3566L10.6522 15.5048 10.6337 15.4678C10.467 15.2826 10.2817 15.0973 10.115 14.9121 9.726 14.5046 9.3185 14.06 8.9109 13.6525 8.5404 13.3005 8.0773 13.0968 7.5957 13.0968Z">
                                </path>
                            </svg>
                        </div>
                        <div class="text-right">
                            <p class="text-2xl">{{ $orders_count }}</p>
                            <p>Orders</p>
                        </div>
                    </div>
                    <div
                        class="bg-purple-500 dark:bg-purple-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-purple-600 dark:border-purple-600 text-white font-medium group">
                        <div
                            class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                            <svg class="stroke-current text-black dark:text-gray-800 transform transition-transform duration-500 ease-in-out"
                                viewBox="0 0 32 32" width="30" height="30" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <rect x="19" y="24" width="4" height="4"></rect>
                                    <rect x="26" y="24" width="4" height="4"></rect>
                                    <rect x="19" y="17" width="4" height="4"></rect>
                                    <rect x="26" y="17" width="4" height="4"></rect>
                                    <path
                                        d="M17,24H4V10H28v5h2V10a2.0023,2.0023,0,0,0-2-2H22V4a2.0023,2.0023,0,0,0-2-2H12a2.002,2.002,0,0,0-2,2V8H4a2.002,2.002,0,0,0-2,2V24a2.0023,2.0023,0,0,0,2,2H17ZM12,4h8V8H12Z">
                                    </path>
                                </g>
                            </svg>
                        </div>
                        <div class="text-right">
                            <p class="text-2xl">{{ env('CURRENCY_SYMBOL', "$") . number_format($stocks_worth) }}</p>
                            <p>Stocks Worth</p>
                        </div>
                    </div>
                    <div
                        class="bg-green-500 dark:bg-green-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-green-600 dark:border-green-500 text-white font-medium group">
                        <div
                            class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                            <svg width="30" height="30" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor"
                                class="stroke-current text-black dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                        <div class="text-right">
                            <p class="text-2xl">{{ env('CURRENCY_SYMBOL', "$") . number_format($profit_total) }}</p>
                            <p>Profit</p>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 py-4 gap-4">
                    <div
                        class="bg-red-500 dark:bg-red-900 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-red-600 dark:border-red-700 text-white font-medium group">
                        <div
                            class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                            <svg width="30" height="30" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor"
                                class="stroke-current text-black dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M12 3V9M12 3L9.5 5.5M12 3L14.5 5.5M5.82333 9.00037C6.2383 9.36683 6.5 9.90285 6.5 10.5C6.5 11.6046 5.60457 12.5 4.5 12.5C3.90285 12.5 3.36683 12.2383 3.00037 11.8233M5.82333 9.00037C5.94144 9 6.06676 9 6.2 9H8M5.82333 9.00037C4.94852 9.00308 4.46895 9.02593 4.09202 9.21799C3.71569 9.40973 3.40973 9.71569 3.21799 10.092C3.02593 10.469 3.00308 10.9485 3.00037 11.8233M3.00037 11.8233C3 11.9414 3 12.0668 3 12.2V17.8C3 17.9332 3 18.0586 3.00037 18.1767M3.00037 18.1767C3.36683 17.7617 3.90285 17.5 4.5 17.5C5.60457 17.5 6.5 18.3954 6.5 19.5C6.5 20.0971 6.2383 20.6332 5.82333 20.9996M3.00037 18.1767C3.00308 19.0515 3.02593 19.5311 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.46895 20.9741 4.94852 20.9969 5.82333 20.9996M5.82333 20.9996C5.94144 21 6.06676 21 6.2 21H17.8C17.9332 21 18.0586 21 18.1767 20.9996M21 18.1771C20.6335 17.7619 20.0973 17.5 19.5 17.5C18.3954 17.5 17.5 18.3954 17.5 19.5C17.5 20.0971 17.7617 20.6332 18.1767 20.9996M21 18.1771C21.0004 18.0589 21 17.9334 21 17.8V12.2C21 12.0668 21 11.9414 20.9996 11.8233M21 18.1771C20.9973 19.0516 20.974 19.5311 20.782 19.908C20.5903 20.2843 20.2843 20.5903 19.908 20.782C19.5311 20.9741 19.0515 20.9969 18.1767 20.9996M20.9996 11.8233C20.6332 12.2383 20.0971 12.5 19.5 12.5C18.3954 12.5 17.5 11.6046 17.5 10.5C17.5 9.90285 17.7617 9.36683 18.1767 9.00037M20.9996 11.8233C20.9969 10.9485 20.9741 10.469 20.782 10.092C20.5903 9.71569 20.2843 9.40973 19.908 9.21799C19.5311 9.02593 19.0515 9.00308 18.1767 9.00037M18.1767 9.00037C18.0586 9 17.9332 9 17.8 9H16M14 15C14 16.1046 13.1046 17 12 17C10.8954 17 10 16.1046 10 15C10 13.8954 10.8954 13 12 13C13.1046 13 14 13.8954 14 15Z"
                                        stroke="#000000" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </g>
                            </svg>
                        </div>
                        <div class="text-right">
                            <p class="text-2xl">{{ env('CURRENCY_SYMBOL', "$") . number_format($spent_total) }}</p>
                            <p>Spent</p>
                        </div>
                    </div>
                    <div></div>
                    <div></div>
                    <div
                        class="bg-blue-500 dark:bg-blue-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-blue-500 text-white font-medium group">
                        <div
                            class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                            <svg width="30" height="30" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor"
                                class="stroke-current text-black dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>
                        <div class="text-right">
                            <p class="text-2xl">{{ env('CURRENCY_SYMBOL', "$") . number_format($sales_total) }}</p>
                            <p>Sales</p>
                        </div>
                    </div>
                </div>
                <div class="flex py-4">
                    <div class="w-1/2 p-3"><canvas class="rounded-xl bg-slate-100 dark:bg-slate-800"
                            id="acquisitions"></canvas></div>
                    <div class="w-1/2 p-3"><canvas class="rounded-xl bg-slate-100 dark:bg-slate-800"
                            id="profit"></canvas></div>
                </div>
            </div>
        </main>
    </div>
    <script async>
        (async ()=>{
        const acquisitions_data = JSON.parse(`{!! $charts_data !!}`)
        const profit_data = JSON.parse(`{!! $charts_data2 !!}`)
        const options = {
            events: [],
            layout: {
                padding: 20
            },
            scales: {
                y: {
                    offset: true,
                    display: false
                }
            },
            responsive: true,
            animations: {
                tension: {
                    duration: 1000,
                    easing: 'linear',
                    from: .6,
                    to: .1,
                    loop: true
                }
            },
            plugins: {
                colors: {
                    enabled: true
                }
            },
            animation: {
                onComplete: function(e) {
                    const chartInstance = e.chart,
                        ctx = chartInstance.ctx,
                        getX = (o) => (chartInstance.data.datasets[0].data._chartjs.listeners[0]
                            .getMeta().data[o].x),
                        getY = (o) => (chartInstance.data.datasets[0].data._chartjs.listeners[0]
                            .getMeta().data[o].y);
                    console.log(chartInstance);
                    ctx.font = Chart.helpers.fontString(14, Chart.defaults
                        .font.style, Chart.defaults.font.family);
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'bottom';
                    ctx.fillStyle = "#000000"
                    chartInstance.data.datasets[0].data.forEach(function(dataset, i) {
                        ctx.fillText(dataset + ` {{ env("CURRENCY_SYMBOL", "$") }}`, getX(i), getY(i) - 5);
                    });
                }
            }
        }
        const acquisitions_chart = await new Chart(
            document.getElementById('profit'), {
                type: 'bar',
                data: {
                    labels: profit_data.map(row => row.new_date),
                    datasets: [{
                        label: 'Profit per Month',
                        data: profit_data.map(row => row.big_profit),
                        borderColor: 'rgba(0, 100, 0, 0.5)',
                        backgroundColor: 'rgba(100, 238, 100, 0.5)',
                        barThickness: 50,
                    }]
                },
                options: options,
            }
        );
        const profit_chart = await new Chart(
            document.getElementById('acquisitions'), {
                type: 'bar',
                data: {
                    labels: acquisitions_data.map(row => row.new_date),
                    datasets: [{
                        label: 'Sales per Month',
                        data: acquisitions_data.map(row => row.big_total),
                        borderColor: 'rgba(0, 0, 100, 0.5)',
                        backgroundColor: 'rgba(0, 100, 238, 0.5)',
                        barThickness: 50
                    }]
                },
                options: options,
            }
        );
    })()
    </script>
    <script>
        const sidebar = document.querySelector("aside");
        const maxSidebar = document.querySelector(".max")
        const miniSidebar = document.querySelector(".mini")
        const roundout = document.querySelector(".roundout")
        const maxToolbar = document.querySelector(".max-toolbar")
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
