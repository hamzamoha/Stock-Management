<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.umd.js"
        integrity="sha512-vCUbejtS+HcWYtDHRF2T5B0BKwVG/CLeuew5uT2AiX4SJ2Wff52+kfgONvtdATqkqQMC9Ye5K+Td0OTaz+P7cw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
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
            <div id="content" class="h-full mt-4 relative">
                <div>
                    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 dark:bg-slate-700"
                        name="withdraw_product" novalidate autocomplete="off" onsubmit="return false;">
                        <input type="hidden" name="product_id" value="">
                        <input type="hidden" name="buy_price" value="">
                        <h1 class="text-3xl font-bold my-2 text-gray-700 dark:text-gray-100">Withdraw Stock</h1>
                        <div class="mb-4 relative">
                            <label for="product_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a
                                Product</label>
                            <input id="product_name" name="product_name" placeholder="Product Name"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <ul id="product_search_result"
                                class="cursor-default shadow-md absolute top-full left-0 w-full mt-2 text-gray-700 bg-slate-200 dark:text-white dark:bg-gray-600">
                            </ul>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2"
                                    for="quantity">
                                    Quantity
                                </label>
                                <input
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    name="quantity" type="number" min="0" step="1" placeholder="Quantity">
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2"
                                    for="price">
                                    Price
                                </label>
                                <input
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    name="price" type="number" min="0" step="0.01"
                                    placeholder="in {{ env('CURRENCY', 'MAD') }}">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2"
                                for="total_price">
                                Total Price
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="total_price" type="text" readonly
                                placeholder="in {{ env('CURRENCY', 'MAD') }}">
                        </div>
                        <div class="flex items-center justify-between">
                            <button
                                class="bg-cyan-700 hover:bg-cyan-600 dark:bg-cyan-800 dark:hover:bg-cyan-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="button" onclick="add_to_receipt();">
                                Add to Receipt
                            </button>
                            <button
                                class="bg-teal-700 hover:bg-teal-600 dark:bg-teal-800 dark:hover:bg-teal-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="button" onclick="go_to_client();">
                                Withdraw
                            </button>
                            <button
                                class="bg-slate-400 hover:bg-slate-300 dark:bg-slate-600 dark:hover:bg-slate-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="reset">
                                Clear
                            </button>
                        </div>
                    </form>
                </div>
                <div id="receipt_table"></div>
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
        let receipt = [];
        let product_search_result = document.getElementById('product_search_result');

        function product_search() {
            let query = document.withdraw_product['product_name'].value;
            if (query == "") {
                product_search_result.innerHTML = '';
                return;
            }
            fetch('/stock/search?query=' + query)
                .then(res => res.json())
                .then(res => {
                    product_search_result.innerHTML = '';
                    localStorage.setItem("stocks", JSON.stringify(res));
                    res.forEach(element => {
                        product_search_result.innerHTML +=
                            `<li class="p-2" data-id="${element.id}">${element.name}</li>`
                    });
                });
        }
        product_search();
        document.withdraw_product['product_name'].addEventListener('input', product_search);
        document.withdraw_product['product_name'].addEventListener('keydown', function(event) {
            let li_count = product_search_result.querySelectorAll('li').length;
            if (li_count == 0) return;
            let selected_li = product_search_result.querySelector(".bg-slate-300.dark\\:bg-gray-500");
            if (event.code == 'ArrowDown') {
                if (!selected_li) {
                    product_search_result.querySelector('li:first-child').classList.add('bg-slate-300');
                    product_search_result.querySelector('li:first-child').classList.add('dark:bg-gray-500');
                } else {
                    let i = Array.from(product_search_result.querySelectorAll('li')).indexOf(selected_li);
                    i = (i + 1) % li_count + 1;
                    selected_li.classList.remove('bg-slate-300');
                    selected_li.classList.remove('dark:bg-gray-500');
                    product_search_result.querySelector(`li:nth-child(${i})`).classList.add('bg-slate-300');
                    product_search_result.querySelector(`li:nth-child(${i})`).classList.add('dark:bg-gray-500');
                }
            } else if (event.code == 'ArrowUp') {
                if (!selected_li) {
                    product_search_result.querySelector('li:last-child').classList.add('bg-slate-300');
                    product_search_result.querySelector('li:last-child').classList.add('dark:bg-gray-500');
                } else {
                    let i = Array.from(product_search_result.querySelectorAll('li')).indexOf(selected_li);
                    i = (i - 1 + li_count) % li_count + 1;
                    selected_li.classList.remove('bg-slate-300');
                    selected_li.classList.remove('dark:bg-gray-500');
                    product_search_result.querySelector(`li:nth-child(${i})`).classList.add('bg-slate-300');
                    product_search_result.querySelector(`li:nth-child(${i})`).classList.add('dark:bg-gray-500');
                }
            } else if (event.code == 'Enter') {
                if (selected_li) {
                    let data_id = selected_li.getAttribute("data-id");
                    let stocks = JSON.parse(localStorage.getItem("stocks"));
                    stocks.forEach(element => {
                        if (element.id == data_id) {
                            document.withdraw_product['product_name'].value = element.name;
                            document.withdraw_product['price'].value = element.sell_price;
                            document.withdraw_product['buy_price'].value = element.buy_price;
                            document.withdraw_product['product_id'].value = element.id;
                            product_search_result.innerHTML = '';
                            localStorage.setItem('stocks', null);
                        }
                    });
                }
            }
        });
        //select product by click
        product_search_result.addEventListener('click', function(event) {
            if (event.target.matches('li')) {
                let data_id = event.target.getAttribute("data-id");
                let stocks = JSON.parse(localStorage.getItem("stocks"));
                stocks.forEach(element => {
                    if (element.id == data_id) {
                        document.withdraw_product['product_name'].value = element.name;
                        document.withdraw_product['price'].value = element.sell_price;
                        document.withdraw_product['buy_price'].value = element.buy_price;
                        document.withdraw_product['product_id'].value = element.id;
                        product_search_result.innerHTML = '';
                        localStorage.setItem('stocks', null);
                    }
                });
            }
        })
        //Total Price Calculate
        function total_price_calculate() {
            let price = Number(document.withdraw_product['price'].value);
            let quantity = Number(document.withdraw_product['quantity'].value);
            let total_price = price * quantity;
            document.withdraw_product['total_price'].value = total_price;
        }
        document.withdraw_product['price'].addEventListener("change", total_price_calculate);
        document.withdraw_product['quantity'].addEventListener("change", total_price_calculate);
        //go to client
        function go_to_client() {
            //
        }
        //add to receipt
        function combine_receipt_element(product, index) {
            receipt[index].quantity = Number(receipt[index].quantity) + Number(product
                .quantity);
            receipt[index].total_price = Number(receipt[index].total_price) + Number(product
                .total_price);
            receipt_to_table();
        }

        function is_in_receipt(product, i) {
            if (i < receipt.length) {
                if (receipt[i].id == product.id && receipt[i].sell_price == product.sell_price) {
                    combine_receipt_element(product, i);
                } else is_in_receipt(product, i + 1);
            } else {
                receipt.push(product);
                receipt_to_table();
            }
        }

        function add_to_receipt() {
            let product = {
                id: document.withdraw_product['product_id'].value,
                name: document.withdraw_product['product_name'].value,
                buy_price: document.withdraw_product['buy_price'].value,
                sell_price: document.withdraw_product['price'].value,
                quantity: document.withdraw_product['quantity'].value,
                total_price: document.withdraw_product['total_price'].value,
            }
            if (
                product.id !== "" &&
                product.name !== "" &&
                product.quantity !== "" &&
                product.sell_price !== "" &&
                product.buy_price !== "" &&
                product.total_price !== ""
            ) {
                is_in_receipt(product, 0);
                receipt_to_table();
            } else {
                alert("Please fill all the info");
            }
        }

        async function receipt_to_table() {
            let total = 0;
            let innerHTML = `
<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">#</th>
            <th scope="col" class="px-6 py-3">Name</th>
            <th scope="col" class="px-6 py-3">Unit Price</th>
            <th scope="col" class="px-6 py-3">Quantity</th>
            <th scope="col" class="px-6 py-3">Total Price</th>
        </tr>
    </thead>
    <tbody>
`;

            await receipt.forEach(async (stock, i) => {
                innerHTML += `
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <td class="px-6 py-4">${i}</td>
            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">${stock.name}</td>
            <td class="px-6 py-4">${stock.sell_price}</td>
            <td class="px-6 py-4">${stock.quantity}</td>
            <td class="px-6 py-4">${stock.total_price}</td>
        </tr>`;
                total += Number(stock.total_price);
            });
            innerHTML += `
                </tbody>
                <tfoot>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4"></td>
                        <td class="px-6 py-4"></td>
                        <td class="px-6 py-4"></td>
                        <td class="px-6 py-4"></td>
                        <th class="px-6 py-4">${total}</th>
                    </tr>
                </tfoot>
            </table>`;
            document.getElementById('receipt_table').innerHTML = innerHTML;
        }
        // send_receipt()
        function send_receipt() {
            fetch('/withdraw', {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(receipt)
                })
                .then(res => res.json())
                .then(res => {
                    if (res.error) {
                        let innerHTML = document.getElementById("content").innerHTML;
                        document.getElementById("content").innerHTML =
                            `
                            <div class="error-alert bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                <strong class="font-bold">Dang it!</strong>
                                <span class="block sm:inline">${res.error}</span>
                                <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.closest('.error-alert').remove()">
                                    <svg class="fill-current h-6 w-6 text-red-500" role="button"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <title>Close</title>
                                        <path
                                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                    </svg>
                                </span>
                            </div>
                            ` + innerHTML;
                    } else if (res.message) {
                        let innerHTML = document.getElementById("content").innerHTML;
                        document.getElementById("content").innerHTML =
                            `
                            <div class="error-alert bg-green-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative" role="alert">
                                <strong class="font-bold">Dang it!</strong>
                                <span class="block sm:inline">${res.message}</span>
                                <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.closest('.error-alert').remove()">
                                    <svg class="fill-current h-6 w-6 text-green-500" role="button"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <title>Close</title>
                                        <path
                                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                    </svg>
                                </span>
                            </div>
                            ` + innerHTML;
                    } else if (res.success) {
                        let innerHTML = document.getElementById("content").innerHTML;
                        document.getElementById("content").innerHTML =
                            `
                            <div class="error-alert bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                                <strong class="font-bold">Dang it!</strong>
                                <span class="block sm:inline">${res.success}</span>
                                <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.closest('.error-alert').remove()">
                                    <svg class="fill-current h-6 w-6 text-green-500" role="button"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <title>Close</title>
                                        <path
                                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                    </svg>
                                </span>
                            </div>
                            ` + innerHTML;
                        setTimeout(() => {
                            window.location.href = "/withdraw/" + res.receipt_id;
                        }, 1500);
                    }
                })
        }
    </script>
</body>

</html>
