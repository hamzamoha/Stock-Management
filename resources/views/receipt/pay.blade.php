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
                        <form class="shadow-md rounded p-5 mb-4 bg-slate-100 dark:bg-slate-700" name="pay_check"
                            autocomplete="off" onsubmit="return submit_form()" method="POST">
                            @csrf
                            <input type="hidden" name="regular_id" value="">
                            <h1 class="text-3xl font-bold my-2 text-gray-700 dark:text-gray-100">Client</h1>
                            <div class="grid gap-4 md:grid-cols-3 my-5">
                                <div class="flex items-center pl-4 border border-gray-200 rounded dark:border-gray-600">
                                    <input checked id="client_guest" type="radio" value="guest" name="client_option"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="client_guest"
                                        class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Guest</label>
                                </div>
                                <div class="flex items-center pl-4 border border-gray-200 rounded dark:border-gray-600">
                                    <input id="client_regular" type="radio" value="regular" name="client_option"
                                        class="w-4 h-4 text-blue-600    bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="client_regular"
                                        class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Regular</label>
                                </div>
                                <div class="flex items-center pl-4 border border-gray-200 rounded dark:border-gray-600">
                                    <input id="client_new" type="radio" value="new" name="client_option"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="client_new"
                                        class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">New</label>
                                </div>
                            </div>
                            <div id="client_section" class="my-5">
                                <div id="client_section_guest">
                                    <!--label for="guest_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</?label>
                                    <input id="guest_name" name="guest_name" placeholder="Name"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"-->
                                </div>
                                <div id="client_section_regular" class="hidden relative">
                                    <label for="regular_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Search</label>
                                    <input id="regular_name" name="regular_name" placeholder="Search by name or id"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <ul id="regular_search_result"
                                        class="cursor-default shadow-md absolute top-full left-0 w-full mt-2 text-gray-700 bg-slate-200 dark:text-white dark:bg-gray-600">
                                    </ul>
                                    <div id="regular_info"></div>
                                </div>
                                <div id="client_section_new" class="hidden">
                                    <div class="my-2">
                                        <label for="new_client_name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                        <input id="new_client_name" name="new_client_name" placeholder="Name"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </div>
                                    <div class="my-2">
                                        <label for="new_client_phone_number"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                                            Number</label>
                                        <input id="new_client_phone_number" name="new_client_phone_number"
                                            placeholder="Phone Number"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </div>
                                </div>
                            </div>
                            <h1 class="text-3xl font-bold my-2 text-gray-700 dark:text-gray-100">Payment</h1>
                            <h2 class="text-xl font-bold my-2 text-gray-700 dark:text-gray-100">Payment Status</h2>
                            <div class="grid gap-4 md:grid-cols-2 my-5">
                                <div
                                    class="flex items-center pl-4 border border-gray-200 rounded dark:border-gray-600">
                                    <input checked id="paid" type="radio" value="paid"
                                        name="payment_status"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="paid"
                                        class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Paid</label>
                                </div>
                                <div
                                    class="flex items-center pl-4 border border-gray-200 rounded dark:border-gray-600">
                                    <input id="unpaid" type="radio" value="unpaid" name="payment_status"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="unpaid"
                                        class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Unpaid</label>
                                </div>
                            </div>
                            <div id="payment_status_section">
                                <div id="payment_status_section_paid">
                                    <h2 class="text-xl font-bold my-2 text-gray-700 dark:text-gray-100">Payment Method
                                    </h2>
                                    <div class="grid gap-4 md:grid-cols-3 my-5">
                                        <div
                                            class="flex items-center pl-4 border border-gray-200 rounded dark:border-gray-600">
                                            <input checked id="cash" type="radio" value="cash"
                                                name="payment_method"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="cash"
                                                class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cash</label>
                                        </div>
                                        <div
                                            class="flex items-center pl-4 border border-gray-200 rounded dark:border-gray-600">
                                            <input id="credit_card" type="radio" value="credit_card"
                                                name="payment_method"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="credit_card"
                                                class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Credit
                                                Card</label>
                                        </div>
                                        <div
                                            class="flex items-center pl-4 border border-gray-200 rounded dark:border-gray-600">
                                            <input id="check" type="radio" value="check"
                                                name="payment_method"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="check"
                                                class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Check</label>
                                        </div>
                                    </div>
                                    <div id="payment_method_section">
                                        <div id="payment_method_section_cash"></div>
                                        <div id="payment_method_section_credit_card" class="hidden">
                                            <div class="my-2">
                                                <label for="transaction_serial_number"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Transaction
                                                    Serial Number</label>
                                                <input id="transaction_serial_number" name="transaction_serial_number"
                                                    placeholder="Transaction Serial Number"
                                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                            <div class="my-2">
                                                <label for="transaction_amount"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Transaction
                                                    Amount</label>
                                                <input id="transaction_amount" name="transaction_amount"
                                                    placeholder="Transaction Amount"
                                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                        </div>
                                        <div id="payment_method_section_check" class="hidden">
                                            <div class="my-2">
                                                <label for="check_serial_number"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Check
                                                    Serial Number</label>
                                                <input id="check_serial_number" name="check_serial_number"
                                                    placeholder="Transaction ID"
                                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                            <div class="my-2">
                                                <label for="check_amount"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Check
                                                    Amount</label>
                                                <input id="check_amount" name="check_amount"
                                                    placeholder="Check Amount"
                                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="payment_status_section_unpaid" class="h_idden"></div>
                            </div>
                            <div class="flex justify-between mt-5">
                                <button
                                    class="bg-teal-700 hover:bg-teal-600 dark:bg-teal-800 dark:hover:bg-teal-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                    type="submit">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="">
                        <div class="p-5 bg-slate-100 dark:bg-slate-700 rounded shadow">
                            <h2 class="text-2xl font-bold mb-4 text-gray-700 dark:text-gray-300">Receipt</h2>
                            <table
                                class="bg-gray-100 dark:bg-gray-800 min-w-full shadow divide-y divide-gray-200 dark:divide-gray-700">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-2 py-2">#</th>
                                        <th scope="col" class="px-2 py-2">Name</th>
                                        <th scope="col" class="px-2 py-2">Unit Price</th>
                                        <th scope="col" class="px-2 py-2">Quantity</th>
                                        <th scope="col" class="px-2 py-2">Total Price</th>
                                    </tr>
                                </thead>
                                <tbody
                                    class="text-xs bg-white dark:text-gray-400 divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
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
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-2 py-2"></th>
                                        <th scope="col" class="px-2 py-2"></th>
                                        <th scope="col" class="px-2 py-2"></th>
                                        <th scope="col" class="px-2 py-2"></th>
                                        <th scope="col" class="px-2 py-2 text-left">{{ $receipt->total }}</th>
                                    </tr>
                                </tfoot>
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
    <script>
        let pay_check_form = document.pay_check;
        pay_check_form.client_option.forEach(element => {
            element.addEventListener("change", async () => {
                await document.querySelectorAll("#client_section > div:not(#client_section_" +
                    pay_check_form.client_option.value + ")").forEach(async e => {
                    e.classList.add("hidden");
                })
                document.querySelector("#client_section_" + pay_check_form.client_option.value)
                    .classList.remove("hidden");
            })
        });
        pay_check_form.payment_status.forEach(element => {
            element.addEventListener("change", async () => {
                await document.querySelectorAll(
                    "#payment_status_section > div:not(#payment_status_section_" +
                    pay_check_form.payment_status.value + ")").forEach(async e => {
                    e.classList.add("hidden");
                })
                document.querySelector("#payment_status_section_" + pay_check_form.payment_status.value)
                    .classList.remove("hidden");
                if (pay_check_form.payment_status.value == "unpaid") {
                    pay_check_form.querySelector("#client_guest").disabled = true;
                    if (pay_check_form.client_option.value != "regular" && pay_check_form.client_option
                        .value != "new") {
                        pay_check_form.querySelector("#client_regular").checked = true;
                        pay_check_form.querySelector("#client_regular").dispatchEvent(new Event(
                            'change'));
                    }
                } else {
                    pay_check_form.querySelector("#client_guest").disabled = false;
                }
            })
        });
        pay_check_form.payment_method.forEach(element => {
            element.addEventListener("change", async () => {
                await document.querySelectorAll(
                    "#payment_method_section > div:not(#payment_method_section_" +
                    pay_check_form.payment_method.value + ")").forEach(async e => {
                    e.classList.add("hidden");
                })
                document.querySelector("#payment_method_section_" + pay_check_form.payment_method.value)
                    .classList.remove("hidden");
            });
        });
        // search for regular client
        function search_for_regular_client() {
            let regular_search_result = document.getElementById('regular_search_result');
            let search_query = pay_check_form.regular_name.value;
            if (search_query == "") {
                regular_search_result.innerHTML = '';
                return;
            }
            fetch('/clients/search?query=' + search_query)
                .then(res => res.json())
                .then(res => {
                    regular_search_result.innerHTML = '';
                    localStorage.setItem("clients", JSON.stringify(res));
                    res.forEach(element => {
                        regular_search_result.innerHTML +=
                            `<li class="p-2" data-id="${element.id}">${element.name}</li>`
                    });
                });
            //
        }
        pay_check_form.regular_name.addEventListener("input", search_for_regular_client);
        pay_check_form.regular_name.addEventListener('keydown', function(event) {
            let li_count = regular_search_result.querySelectorAll('li').length;
            if (li_count == 0) return;
            let selected_li = regular_search_result.querySelector(".bg-slate-300.dark\\:bg-gray-500");
            if (event.code == 'ArrowDown') {
                if (!selected_li) {
                    regular_search_result.querySelector('li:first-child').classList.add('bg-slate-300');
                    regular_search_result.querySelector('li:first-child').classList.add('dark:bg-gray-500');
                } else {
                    let i = Array.from(regular_search_result.querySelectorAll('li')).indexOf(selected_li);
                    i = (i + 1) % li_count + 1;
                    selected_li.classList.remove('bg-slate-300');
                    selected_li.classList.remove('dark:bg-gray-500');
                    regular_search_result.querySelector(`li:nth-child(${i})`).classList.add('bg-slate-300');
                    regular_search_result.querySelector(`li:nth-child(${i})`).classList.add('dark:bg-gray-500');
                }
            } else if (event.code == 'ArrowUp') {
                if (!selected_li) {
                    regular_search_result.querySelector('li:last-child').classList.add('bg-slate-300');
                    regular_search_result.querySelector('li:last-child').classList.add('dark:bg-gray-500');
                } else {
                    let i = Array.from(regular_search_result.querySelectorAll('li')).indexOf(selected_li);
                    i = (i - 1 + li_count) % li_count + 1;
                    selected_li.classList.remove('bg-slate-300');
                    selected_li.classList.remove('dark:bg-gray-500');
                    regular_search_result.querySelector(`li:nth-child(${i})`).classList.add('bg-slate-300');
                    regular_search_result.querySelector(`li:nth-child(${i})`).classList.add('dark:bg-gray-500');
                }
            } else if (event.code == 'Enter') {
                event.preventDefault();
                if (selected_li) {
                    let data_id = selected_li.getAttribute("data-id");
                    let clients = JSON.parse(localStorage.getItem("clients"));
                    clients.forEach(element => {
                        if (element.id == data_id) {
                            pay_check_form.regular_id.value = element.id;
                            pay_check_form.regular_name.value = element.name;
                            regular_search_result.innerHTML = '';
                            document.getElementById("regular_info").innerHTML = `
                                        <table class="text-gray-600 dark:text-gray-200">
                                            <tr>
                                                <th class="p-3">Name: </th>
                                                <td class="p-3">${element.name}</td>
                                            </tr>
                                            
                                            <tr>
                                                <th class="p-3">Name: </th>
                                                <td class="p-3">${element.phone_number}</td>
                                            </tr>
                                        </table>
                            `;
                            localStorage.setItem('clients', null);
                        }
                    });
                }
            }
        });
        //select client by click
        regular_search_result.addEventListener('click', function(event) {
            if (event.target.matches('li')) {
                let data_id = event.target.getAttribute("data-id");
                let clients = JSON.parse(localStorage.getItem("clients"));
                clients.forEach(element => {
                    if (element.id == data_id) {
                        pay_check_form.regular_id.value = element.id;
                        pay_check_form.regular_name.value = element.name;
                        regular_search_result.innerHTML = '';
                        document.getElementById("regular_info").innerHTML = `
                                        <table class="text-gray-600 dark:text-gray-200">
                                            <tr>
                                                <th class="p-3">Name: </th>
                                                <td class="p-3">${element.name}</td>
                                            </tr>
                                            
                                            <tr>
                                                <th class="p-3">Name: </th>
                                                <td class="p-3">${element.phone_number}</td>
                                            </tr>
                                        </table>
                            `;
                        localStorage.setItem('clients', null);
                    }
                });
            }
        })
        // Pay Receipt
        function submit_form() {
            let client_option = pay_check_form.client_option.value;
            if (client_option == 'regular') {
                if (pay_check_form.regular_id.value == "") {
                    alert("Please select a client !");
                    pay_check_form.regular_name.focus();
                    return false;
                }
            }
            if (client_option == 'new') {
                if (pay_check_form.new_client_name.value == "") {
                    alert("Please enter the new client name !");
                    pay_check_form.new_client_name.focus();
                    return false;
                }
                if (pay_check_form.new_client_phone_number.value == "") {
                    alert("Please enter the new client phone number !");
                    pay_check_form.new_client_phone_number.focus();
                    return false;
                }
            }
            if (pay_check_form.payment_status.value == "paid") {
                let payment_method = pay_check_form.payment_method.value;
                if (payment_method == "credit_card") {
                    if (pay_check_form.transaction_serial_number.value == "") {
                        alert("Please enter the transaction serial number !");
                        pay_check_form.transaction_serial_number.focus();
                        return false;
                    }
                    if (pay_check_form.transaction_amount.value == "") {
                        alert("Please enter the transaction Amount !");
                        pay_check_form.transaction_amount.focus();
                        return false;
                    }
                } else if (payment_method == "check") {
                    if (pay_check_form.check_serial_number.value == "") {
                        alert("Please enter the check serial number !");
                        pay_check_form.check_number.focus();
                        return false;
                    } else if (pay_check_form.check_amount.value == "") {
                        alert("Please enter the check amount !");
                        pay_check_form.check_amount.focus();
                        return false;
                    }
                }
            }
            return confirm("Do you confirm this data ?");
        }
    </script>
</body>

</html>
