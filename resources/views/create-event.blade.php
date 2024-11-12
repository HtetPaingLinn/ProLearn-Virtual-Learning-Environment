@php use Illuminate\Support\Facades\Auth; @endphp
    <!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="https://preline.co/">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Comprehensive overview with charts, tables, and a streamlined dashboard layout for easy data visualization and analysis.">

    <meta name="twitter:site" content="@preline">
    <meta name="twitter:creator" content="@preline">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Tailwind CSS Admin Template | Preline UI, crafted with Tailwind CSS">
    <meta name="twitter:description" content="Comprehensive overview with charts, tables, and a streamlined dashboard layout for easy data visualization and analysis.">
    <meta name="twitter:image" content="https://preline.co/assets/img/og-image.png">

    <meta property="og:url" content="https://preline.co/">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Preline">
    <meta property="og:title" content="Tailwind CSS Admin Template | Preline UI, crafted with Tailwind CSS">
    <meta property="og:description" content="Comprehensive overview with charts, tables, and a streamlined dashboard layout for easy data visualization and analysis.">
    <meta property="og:image" content="https://preline.co/assets/img/og-image.png">

    <!-- Title -->
    <title>Dashboard</title>

    <!-- Favicon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="../../public/favicon.ico">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Theme Check and Update -->
    <script>
        const html = document.querySelector('html');
        const isLightOrAuto = localStorage.getItem('hs_theme') === 'light' || (localStorage.getItem('hs_theme') === 'auto' && !window.matchMedia('(prefers-color-scheme: dark)').matches);
        const isDarkOrAuto = localStorage.getItem('hs_theme') === 'dark' || (localStorage.getItem('hs_theme') === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches);

        if (isLightOrAuto && html.classList.contains('dark')) html.classList.remove('dark');
        else if (isDarkOrAuto && html.classList.contains('light')) html.classList.remove('light');
        else if (isDarkOrAuto && !html.classList.contains('dark')) html.classList.add('dark');
        else if (isLightOrAuto && !html.classList.contains('light')) html.classList.add('light');
    </script>

    <!-- Apexcharts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts/dist/apexcharts.min.css">
    <style>
        .apexcharts-tooltip.apexcharts-theme-light {
            background-color: transparent !important;
            border: none !important;
            box-shadow: none !important;
        }
        #major-scroll.custom-padding {
            padding-inline-start: 270px;
        }

        @media (min-width: 640px) {
            #major-scroll.custom-padding {
                padding-inline-start: 270px;
            }
        }

        @media (min-width: 1024px) {
            #major-scroll.custom-padding {
                padding-inline-start: 270px;
            }
        }
    </style>

    <!-- CSS Preline -->
    <link rel="stylesheet" href="https://preline.co/assets/css/main.min.css">
</head>

<body class="bg-gray-50 dark:bg-neutral-900">
<!-- ========== HEADER ========== -->
<header
    class="sticky top-0 inset-x-0 flex flex-wrap md:justify-start md:flex-nowrap z-[48] w-full bg-white text-sm py-2.5 lg:ps-[260px] dark:bg-neutral-800 dark:border-neutral-700">
    <nav class="px-4 sm:px-6 flex basis-full items-center w-full mx-auto">
        <div class="me-5 lg:me-0 lg:hidden">
            <!-- Logo -->
            <a class="flex-none rounded-md text-xl inline-block font-semibold focus:outline-none focus:opacity-80"
               href="#" aria-label="Preline">
                <svg class="w-28 h-auto" width="116" height="32" viewBox="0 0 116 32" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M33.5696 30.8182V11.3182H37.4474V13.7003H37.6229C37.7952 13.3187 38.0445 12.9309 38.3707 12.5369C38.7031 12.1368 39.134 11.8045 39.6634 11.5398C40.1989 11.2689 40.8636 11.1335 41.6577 11.1335C42.6918 11.1335 43.6458 11.4044 44.5199 11.946C45.3939 12.4815 46.0926 13.291 46.6158 14.3743C47.139 15.4515 47.4006 16.8026 47.4006 18.4276C47.4006 20.0095 47.1451 21.3452 46.6342 22.4347C46.1295 23.518 45.4401 24.3397 44.5661 24.8999C43.6982 25.4538 42.7256 25.7308 41.6484 25.7308C40.8852 25.7308 40.2358 25.6046 39.7003 25.3523C39.1709 25.0999 38.737 24.7829 38.3984 24.4013C38.0599 24.0135 37.8014 23.6226 37.6229 23.2287H37.5028V30.8182H33.5696ZM37.4197 18.4091C37.4197 19.2524 37.5367 19.9879 37.7706 20.6158C38.0045 21.2436 38.343 21.733 38.7862 22.0838C39.2294 22.4285 39.768 22.6009 40.402 22.6009C41.0421 22.6009 41.5838 22.4254 42.027 22.0746C42.4702 21.7176 42.8056 21.2251 43.0334 20.5973C43.2673 19.9633 43.3842 19.2339 43.3842 18.4091C43.3842 17.5904 43.2704 16.8703 43.0426 16.2486C42.8149 15.6269 42.4794 15.1406 42.0362 14.7898C41.593 14.4389 41.0483 14.2635 40.402 14.2635C39.7618 14.2635 39.2202 14.4328 38.777 14.7713C38.34 15.1098 38.0045 15.59 37.7706 16.2116C37.5367 16.8333 37.4197 17.5658 37.4197 18.4091ZM49.2427 25.5V11.3182H53.0559V13.7926H53.2037C53.4622 12.9124 53.8961 12.2476 54.5055 11.7983C55.1149 11.3428 55.8166 11.1151 56.6106 11.1151C56.8076 11.1151 57.02 11.1274 57.2477 11.152C57.4754 11.1766 57.6755 11.2105 57.8478 11.2536V14.7436C57.6632 14.6882 57.4077 14.639 57.0815 14.5959C56.7553 14.5528 56.4567 14.5312 56.1859 14.5312C55.6073 14.5312 55.0903 14.6574 54.6348 14.9098C54.1854 15.156 53.8284 15.5007 53.5638 15.9439C53.3052 16.3871 53.176 16.898 53.176 17.4766V25.5H49.2427ZM64.9043 25.777C63.4455 25.777 62.1898 25.4815 61.1373 24.8906C60.0909 24.2936 59.2845 23.4503 58.7182 22.3608C58.1519 21.2652 57.8688 19.9695 57.8688 18.4737C57.8688 17.0149 58.1519 15.7346 58.7182 14.6328C59.2845 13.531 60.0816 12.6723 61.1096 12.0568C62.1437 11.4413 63.3563 11.1335 64.7474 11.1335C65.683 11.1335 66.5539 11.2843 67.3603 11.5859C68.1728 11.8814 68.8806 12.3277 69.4839 12.9247C70.0932 13.5218 70.5672 14.2727 70.9057 15.1776C71.2443 16.0762 71.4135 17.1288 71.4135 18.3352V19.4155H59.4384V16.978H67.7111C67.7111 16.4117 67.588 15.91 67.3418 15.473C67.0956 15.036 66.754 14.6944 66.317 14.4482C65.8861 14.1958 65.3844 14.0696 64.812 14.0696C64.2149 14.0696 63.6856 14.2081 63.2239 14.4851C62.7684 14.7559 62.4114 15.1222 62.1529 15.5838C61.8944 16.0393 61.762 16.5471 61.7559 17.1072V19.4247C61.7559 20.1264 61.8851 20.7327 62.1437 21.2436C62.4083 21.7545 62.7807 22.1484 63.2608 22.4254C63.741 22.7024 64.3103 22.8409 64.9689 22.8409C65.406 22.8409 65.8061 22.7794 66.1692 22.6562C66.5324 22.5331 66.8432 22.3485 67.1018 22.1023C67.3603 21.8561 67.5572 21.5545 67.6927 21.1974L71.3304 21.4375C71.1458 22.3116 70.7672 23.0748 70.1948 23.7273C69.6285 24.3736 68.896 24.8783 67.9974 25.2415C67.1048 25.5985 66.0738 25.777 64.9043 25.777ZM77.1335 6.59091V25.5H73.2003V6.59091H77.1335ZM79.5043 25.5V11.3182H83.4375V25.5H79.5043ZM81.4801 9.49006C80.8954 9.49006 80.3937 9.29616 79.9752 8.90838C79.5628 8.51444 79.3566 8.04356 79.3566 7.49574C79.3566 6.95407 79.5628 6.48935 79.9752 6.10156C80.3937 5.70762 80.8954 5.51065 81.4801 5.51065C82.0649 5.51065 82.5635 5.70762 82.9759 6.10156C83.3944 6.48935 83.6037 6.95407 83.6037 7.49574C83.6037 8.04356 83.3944 8.51444 82.9759 8.90838C82.5635 9.29616 82.0649 9.49006 81.4801 9.49006ZM89.7415 17.3011V25.5H85.8083V11.3182H89.5569V13.8203H89.723C90.037 12.9955 90.5632 12.343 91.3019 11.8629C92.0405 11.3767 92.9361 11.1335 93.9887 11.1335C94.9735 11.1335 95.8322 11.349 96.5647 11.7798C97.2971 12.2107 97.8665 12.8262 98.2728 13.6264C98.679 14.4205 98.8821 15.3684 98.8821 16.4702V25.5H94.9489V17.1719C94.9551 16.304 94.7335 15.6269 94.2841 15.1406C93.8348 14.6482 93.2162 14.402 92.4283 14.402C91.8989 14.402 91.4311 14.5159 91.0249 14.7436C90.6248 14.9714 90.3109 15.3037 90.0831 15.7408C89.8615 16.1716 89.7477 16.6918 89.7415 17.3011ZM107.665 25.777C106.206 25.777 104.951 25.4815 103.898 24.8906C102.852 24.2936 102.045 23.4503 101.479 22.3608C100.913 21.2652 100.63 19.9695 100.63 18.4737C100.63 17.0149 100.913 15.7346 101.479 14.6328C102.045 13.531 102.842 12.6723 103.87 12.0568C104.905 11.4413 106.117 11.1335 107.508 11.1335C108.444 11.1335 109.315 11.2843 110.121 11.5859C110.934 11.8814 111.641 12.3277 112.245 12.9247C112.854 13.5218 113.328 14.2727 113.667 15.1776C114.005 16.0762 114.174 17.1288 114.174 18.3352V19.4155H102.199V16.978H110.472C110.472 16.4117 110.349 15.91 110.103 15.473C109.856 15.036 109.515 14.6944 109.078 14.4482C108.647 14.1958 108.145 14.0696 107.573 14.0696C106.976 14.0696 106.446 14.2081 105.985 14.4851C105.529 14.7559 105.172 15.1222 104.914 15.5838C104.655 16.0393 104.523 16.5471 104.517 17.1072V19.4247C104.517 20.1264 104.646 20.7327 104.905 21.2436C105.169 21.7545 105.542 22.1484 106.022 22.4254C106.502 22.7024 107.071 22.8409 107.73 22.8409C108.167 22.8409 108.567 22.7794 108.93 22.6562C109.293 22.5331 109.604 22.3485 109.863 22.1023C110.121 21.8561 110.318 21.5545 110.454 21.1974L114.091 21.4375C113.907 22.3116 113.528 23.0748 112.956 23.7273C112.389 24.3736 111.657 24.8783 110.758 25.2415C109.866 25.5985 108.835 25.777 107.665 25.777Z"
                        class="fill-blue-600 dark:fill-white" fill="currentColor" />
                    <path
                        d="M1 29.5V16.5C1 9.87258 6.37258 4.5 13 4.5C19.6274 4.5 25 9.87258 25 16.5C25 23.1274 19.6274 28.5 13 28.5H12"
                        class="stroke-blue-600 dark:stroke-white" stroke="currentColor" stroke-width="2" />
                    <path
                        d="M5 29.5V16.66C5 12.1534 8.58172 8.5 13 8.5C17.4183 8.5 21 12.1534 21 16.66C21 21.1666 17.4183 24.82 13 24.82H12"
                        class="stroke-blue-600 dark:stroke-white" stroke="currentColor" stroke-width="2" />
                    <circle cx="13" cy="16.5214" r="5" class="fill-blue-600 dark:fill-white"
                            fill="currentColor" />
                </svg>
            </a>
        </div>

        <div class="w-full flex items-center justify-end ms-auto md:justify-between gap-x-1 md:gap-x-3">

            <div class="hidden md:block">
                <!-- Search Input -->
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3.5">
                        <svg class="shrink-0 size-4 text-gray-400 dark:text-white/60"
                             xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8" />
                            <path d="m21 21-4.3-4.3" />
                        </svg>
                    </div>
                    <input type="text"
                           class="py-2 ps-10 pe-16 block w-full bg-white border-gray-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder:text-neutral-400 dark:focus:ring-neutral-600"
                           placeholder="Search">
                    <div class="hidden absolute inset-y-0 end-0 flex items-center pointer-events-none z-20 pe-1">
                        <button type="button"
                                class="inline-flex shrink-0 justify-center items-center size-6 rounded-full text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500"
                                aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                 height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10" />
                                <path d="m15 9-6 6" />
                                <path d="m9 9 6 6" />
                            </svg>
                        </button>
                    </div>
                    <div
                        class="absolute inset-y-0 end-0 flex items-center pointer-events-none z-20 pe-3 text-gray-400">
                        <svg class="shrink-0 size-3 text-gray-400 dark:text-white/60" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M15 6v12a3 3 0 1 0 3-3H6a3 3 0 1 0 3 3V6a3 3 0 1 0-3 3h12a3 3 0 1 0-3-3" />
                        </svg>
                        <span class="mx-1">
                                <svg class="shrink-0 size-3 text-gray-400 dark:text-white/60" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14" /> <path d="M12 5v14" />
                                </svg>
                            </span>
                        <span class="text-xs">/</span>
                    </div>
                </div>
            </div>

            <div class="flex flex-row items-center justify-end gap-1">
                <button type="button"
                        class="md:hidden size-[38px] relative inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8" /> <path d="m21 21-4.3-4.3" />
                    </svg>
                    <span class="sr-only">Search</span>
                </button>

                <button type="button"
                        class="size-[38px] relative inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"> <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9" />
                        <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0" />
                    </svg>
                    <span class="sr-only">Notifications</span>
                </button>

                <button type="button"
                        class="size-[38px] relative inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"> <path d="M22 12h-4l-3 9L9 3l-3 9H2" />
                    </svg>
                    <span class="sr-only">Activity</span>
                </button>

                <!-- Dropdown -->
                <div class="hs-dropdown [--placement:bottom-right] relative inline-flex">
                    <button id="hs-dropdown-account" type="button"
                            class="inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 focus:outline-none disabled:opacity-50 disabled:pointer-events-none dark:text-white"
                            aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                        <div class="w-10 h-10 rounded-full border-4 border-white overflow-hidden">
                            <img src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : 'https://cdn.pixabay.com/photo/2018/11/13/21/43/avatar-3814049_1280.png' }}"
                                 alt="Profile Picture" class="w-full h-full object-cover">
                        </div>
                    </button>

                    <div
                        class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700"
                        role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-account">
                        <!-- Signed in as section -->
                        <div class="py-3 px-5 bg-gray-100 rounded-t-lg dark:bg-neutral-700">
                            <p class="text-sm text-gray-500 dark:text-neutral-500">Signed in as</p>
                            <p class="text-sm font-medium text-gray-800 dark:text-neutral-200">
                                {{ Auth::user()->email }}</p>
                        </div>

                        <!-- Profile and Logout with Heroicons -->
                        <div class="p-1.5 space-y-0.5">
                            <x-dropdown-link :href="route('profile.edit')"
                                             class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>
                                </svg>

                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                                 class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300"
                                                 onclick="event.preventDefault(); this.closest('form').submit();">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15"/>
                                    </svg>

                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

@if(Auth::user()->role_id == 2)
    <div
        class=" inset-x-0 flex flex-wrap md:justify-start md:flex-nowrap z-[48] w-full bg-white border-b text-sm py-2.5 lg:ps-[260px] dark:bg-neutral-800 dark:border-neutral-700">
        <div class="flex flex-nowrap overflow-x-auto gap-2 py-2" id="majorTags">
            <!-- "All" Tag -->
            <button type="button"
                    class="group inline-flex items-center justify-center gap-x-2 font-semibold rounded-full border border-gray-300 px-4 py-2 text-sm text-gray-700 hover:bg-blue-100 focus:outline-none focus:bg-blue-100 dark:border-neutral-600 dark:text-neutral-300 dark:hover:bg-neutral-600 dark:focus:bg-neutral-600"
                    onclick="filterCoursesByMajor(0)" data-major-id="0">
                <span class="truncate max-w-[200px] text-ellipsis overflow-hidden whitespace-nowrap">All</span>
            </button>
            @foreach (\App\Models\Major::all() as $major)
                <button type="button"
                        class="group inline-flex items-center justify-center gap-x-2 font-semibold rounded-full border border-gray-300 px-4 py-2 text-sm text-gray-700 hover:bg-blue-100 focus:outline-none focus:bg-blue-100 dark:border-neutral-600 dark:text-neutral-300 dark:hover:bg-neutral-600 dark:focus:bg-neutral-600"
                        onclick="filterCoursesByMajor({{ $major->id }})" data-major-id="{{ $major->id }}">
                    <span
                        class="truncate max-w-[200px] text-ellipsis overflow-hidden whitespace-nowrap">{{ $major->name }}</span>
                </button>
            @endforeach
        </div>
    </div>
@endif

@if (Auth::user()->role_id == 4 )
    <div class="inset-x-0 flex flex-wrap md:justify-start md:flex-nowrap z-[48] w-full bg-white border-b text-sm py-2.5 lg:ps-[260px] dark:bg-neutral-800 dark:border-neutral-700">
        <div class="flex flex-nowrap overflow-x-auto gap-2 py-2" id="majorTags">
            <!-- "All" Tag -->
            <button type="button"
                    class="group inline-flex items-center justify-center gap-x-2 font-semibold rounded-full border border-gray-300 px-4 py-2 text-sm text-gray-700 hover:bg-blue-100 focus:outline-none focus:bg-blue-100 dark:border-neutral-600 dark:text-neutral-300 dark:hover:bg-neutral-600 dark:focus:bg-neutral-600"
                    onclick="filterCoursesByMajor(0)" data-major-id="0">
                <span class="truncate max-w-[200px] text-ellipsis overflow-hidden whitespace-nowrap">All</span>
            </button>

            @foreach (\App\Models\Major::all() as $major)
                @if (
                    (Auth::user()->student->major_id >= 3 && Auth::user()->student->major_id <= 6 && $major->id >= 1 && $major->id <= Auth::user()->student->major_id) ||
                    (Auth::user()->student->major_id == 7 && ($major->id >= 1 && $major->id <= 5 || $major->id == 7)) ||
                    (Auth::user()->student->major_id >= 8 && Auth::user()->student->major_id <= 11 && ($major->id >= 1 && $major->id <= 6 || $major->id == Auth::user()->student->major_id)) ||
                    (Auth::user()->student->major_id >= 12 && Auth::user()->student->major_id <= 14 && ($major->id >= 1 && $major->id <= 5 || $major->id == 7 || $major->id == Auth::user()->student->major_id)) ||
                    (Auth::user()->student->major_id >= 15 && Auth::user()->student->major_id <= 18 && ($major->id >= 1 && $major->id <= 6 || $major->id == (Auth::user()->student->major_id - 7) || $major->id == Auth::user()->student->major_id)) ||
                    (Auth::user()->student->major_id >= 19 && Auth::user()->student->major_id <= 21 && ($major->id >= 1 && $major->id <= 5 || $major->id == 7 || $major->id == (Auth::user()->student->major_id - 7) || $major->id == Auth::user()->student->major_id))
                )
                    <button type="button" class="group inline-flex items-center justify-center gap-x-2 font-semibold rounded-full border border-gray-300 px-4 py-2 text-sm text-gray-700 hover:bg-blue-100 focus:outline-none focus:bg-blue-100 dark:border-neutral-600 dark:text-neutral-300 dark:hover:bg-neutral-600 dark:focus:bg-neutral-600"
                            onclick="filterCoursesByMajor({{ $major->id }})" data-major-id="{{ $major->id }}">
                        <span class="truncate max-w-[200px] text-ellipsis overflow-hidden whitespace-nowrap">{{ $major->name }}</span>
                    </button>
                @endif
            @endforeach
        </div>
    </div>
@endif

<!-- ========== MAIN CONTENT ========== -->
<!-- Breadcrumb -->
<div class="sticky top-0 inset-x-0 z-20 bg-white border-y px-4 sm:px-6 lg:px-8 lg:hidden dark:bg-neutral-800 dark:border-neutral-700">
    <div class="flex items-center py-2">
        <!-- Navigation Toggle -->
        <button type="button" class="size-8 flex justify-center items-center gap-x-2 border border-gray-200 text-gray-800 hover:text-gray-500 rounded-lg focus:outline-none focus:text-gray-500 disabled:opacity-50 disabled:pointer-events-none dark:border-neutral-700 dark:text-neutral-200 dark:hover:text-neutral-500 dark:focus:text-neutral-500"
                aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-application-sidebar" aria-label="Toggle navigation" data-hs-overlay="#hs-application-sidebar">
            <span class="sr-only">Toggle Navigation</span>
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                 stroke-linecap="round" stroke-linejoin="round"> <rect width="18" height="18" x="3" y="3" rx="2" />
                <path d="M15 3v18" /> <path d="m8 9 3 3-3 3" />
            </svg>
        </button>

        <!-- Breadcrumb -->
        <ol class="ms-3 flex items-center whitespace-nowrap">
            <li class="flex items-center text-sm text-gray-800 dark:text-neutral-400">
                Home
                <svg class="shrink-0 mx-3 overflow-visible size-2.5 text-gray-400 dark:text-neutral-500" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 1L10.6869 7.16086C10.8637 7.35239 10.8637 7.64761 10.6869 7.83914L5 14" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                </svg>
            </li>
            <li class="text-sm font-semibold text-gray-800 truncate dark:text-neutral-400" aria-current="page"> Browse </li>
        </ol>
    </div>
</div>

<!-- Sidebar -->
<div id="hs-application-sidebar" class="hs-overlay  [--auto-close:lg] hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform w-[260px] h-full hidden fixed inset-y-0 start-0 z-[60] bg-white border-e border-gray-200 lg:block lg:translate-x-0 lg:end-auto lg:bottom-0dark:bg-neutral-800 dark:border-neutral-700" role="dialog" tabindex="-1" aria-label="Sidebar">
    <div class="relative flex flex-col h-full max-h-full">
        <!-- Logo -->
        <div class="px-6 pt-4">
            <a class="flex-none rounded-xl text-xl inline-block font-semibold focus:outline-none focus:opacity-80" href="/dashboard" aria-label="Preline">
                <svg class="w-28 h-auto" width="116" height="32" viewBox="0 0 116 32" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M33.5696 30.8182V11.3182H37.4474V13.7003H37.6229C37.7952 13.3187 38.0445 12.9309 38.3707 12.5369C38.7031 12.1368 39.134 11.8045 39.6634 11.5398C40.1989 11.2689 40.8636 11.1335 41.6577 11.1335C42.6918 11.1335 43.6458 11.4044 44.5199 11.946C45.3939 12.4815 46.0926 13.291 46.6158 14.3743C47.139 15.4515 47.4006 16.8026 47.4006 18.4276C47.4006 20.0095 47.1451 21.3452 46.6342 22.4347C46.1295 23.518 45.4401 24.3397 44.5661 24.8999C43.6982 25.4538 42.7256 25.7308 41.6484 25.7308C40.8852 25.7308 40.2358 25.6046 39.7003 25.3523C39.1709 25.0999 38.737 24.7829 38.3984 24.4013C38.0599 24.0135 37.8014 23.6226 37.6229 23.2287H37.5028V30.8182H33.5696ZM37.4197 18.4091C37.4197 19.2524 37.5367 19.9879 37.7706 20.6158C38.0045 21.2436 38.343 21.733 38.7862 22.0838C39.2294 22.4285 39.768 22.6009 40.402 22.6009C41.0421 22.6009 41.5838 22.4254 42.027 22.0746C42.4702 21.7176 42.8056 21.2251 43.0334 20.5973C43.2673 19.9633 43.3842 19.2339 43.3842 18.4091C43.3842 17.5904 43.2704 16.8703 43.0426 16.2486C42.8149 15.6269 42.4794 15.1406 42.0362 14.7898C41.593 14.4389 41.0483 14.2635 40.402 14.2635C39.7618 14.2635 39.2202 14.4328 38.777 14.7713C38.34 15.1098 38.0045 15.59 37.7706 16.2116C37.5367 16.8333 37.4197 17.5658 37.4197 18.4091ZM49.2427 25.5V11.3182H53.0559V13.7926H53.2037C53.4622 12.9124 53.8961 12.2476 54.5055 11.7983C55.1149 11.3428 55.8166 11.1151 56.6106 11.1151C56.8076 11.1151 57.02 11.1274 57.2477 11.152C57.4754 11.1766 57.6755 11.2105 57.8478 11.2536V14.7436C57.6632 14.6882 57.4077 14.639 57.0815 14.5959C56.7553 14.5528 56.4567 14.5312 56.1859 14.5312C55.6073 14.5312 55.0903 14.6574 54.6348 14.9098C54.1854 15.156 53.8284 15.5007 53.5638 15.9439C53.3052 16.3871 53.176 16.898 53.176 17.4766V25.5H49.2427ZM64.9043 25.777C63.4455 25.777 62.1898 25.4815 61.1373 24.8906C60.0909 24.2936 59.2845 23.4503 58.7182 22.3608C58.1519 21.2652 57.8688 19.9695 57.8688 18.4737C57.8688 17.0149 58.1519 15.7346 58.7182 14.6328C59.2845 13.531 60.0816 12.6723 61.1096 12.0568C62.1437 11.4413 63.3563 11.1335 64.7474 11.1335C65.683 11.1335 66.5539 11.2843 67.3603 11.5859C68.1728 11.8814 68.8806 12.3277 69.4839 12.9247C70.0932 13.5218 70.5672 14.2727 70.9057 15.1776C71.2443 16.0762 71.4135 17.1288 71.4135 18.3352V19.4155H59.4384V16.978H67.7111C67.7111 16.4117 67.588 15.91 67.3418 15.473C67.0956 15.036 66.754 14.6944 66.317 14.4482C65.8861 14.1958 65.3844 14.0696 64.812 14.0696C64.2149 14.0696 63.6856 14.2081 63.2239 14.4851C62.7684 14.7559 62.4114 15.1222 62.1529 15.5838C61.8944 16.0393 61.762 16.5471 61.7559 17.1072V19.4247C61.7559 20.1264 61.8851 20.7327 62.1437 21.2436C62.4083 21.7545 62.7807 22.1484 63.2608 22.4254C63.741 22.7024 64.3103 22.8409 64.9689 22.8409C65.406 22.8409 65.8061 22.7794 66.1692 22.6562C66.5324 22.5331 66.8432 22.3485 67.1018 22.1023C67.3603 21.8561 67.5572 21.5545 67.6927 21.1974L71.3304 21.4375C71.1458 22.3116 70.7672 23.0748 70.1948 23.7273C69.6285 24.3736 68.896 24.8783 67.9974 25.2415C67.1048 25.5985 66.0738 25.777 64.9043 25.777ZM77.1335 6.59091V25.5H73.2003V6.59091H77.1335ZM79.5043 25.5V11.3182H83.4375V25.5H79.5043ZM81.4801 9.49006C80.8954 9.49006 80.3937 9.29616 79.9752 8.90838C79.5628 8.51444 79.3566 8.04356 79.3566 7.49574C79.3566 6.95407 79.5628 6.48935 79.9752 6.10156C80.3937 5.70762 80.8954 5.51065 81.4801 5.51065C82.0649 5.51065 82.5635 5.70762 82.9759 6.10156C83.3944 6.48935 83.6037 6.95407 83.6037 7.49574C83.6037 8.04356 83.3944 8.51444 82.9759 8.90838C82.5635 9.29616 82.0649 9.49006 81.4801 9.49006ZM89.7415 17.3011V25.5H85.8083V11.3182H89.5569V13.8203H89.723C90.037 12.9955 90.5632 12.343 91.3019 11.8629C92.0405 11.3767 92.9361 11.1335 93.9887 11.1335C94.9735 11.1335 95.8322 11.349 96.5647 11.7798C97.2971 12.2107 97.8665 12.8262 98.2728 13.6264C98.679 14.4205 98.8821 15.3684 98.8821 16.4702V25.5H94.9489V17.1719C94.9551 16.304 94.7335 15.6269 94.2841 15.1406C93.8348 14.6482 93.2162 14.402 92.4283 14.402C91.8989 14.402 91.4311 14.5159 91.0249 14.7436C90.6248 14.9714 90.3109 15.3037 90.0831 15.7408C89.8615 16.1716 89.7477 16.6918 89.7415 17.3011ZM107.665 25.777C106.206 25.777 104.951 25.4815 103.898 24.8906C102.852 24.2936 102.045 23.4503 101.479 22.3608C100.913 21.2652 100.63 19.9695 100.63 18.4737C100.63 17.0149 100.913 15.7346 101.479 14.6328C102.045 13.531 102.842 12.6723 103.87 12.0568C104.905 11.4413 106.117 11.1335 107.508 11.1335C108.444 11.1335 109.315 11.2843 110.121 11.5859C110.934 11.8814 111.641 12.3277 112.245 12.9247C112.854 13.5218 113.328 14.2727 113.667 15.1776C114.005 16.0762 114.174 17.1288 114.174 18.3352V19.4155H102.199V16.978H110.472C110.472 16.4117 110.349 15.91 110.103 15.473C109.856 15.036 109.515 14.6944 109.078 14.4482C108.647 14.1958 108.145 14.0696 107.573 14.0696C106.976 14.0696 106.446 14.2081 105.985 14.4851C105.529 14.7559 105.172 15.1222 104.914 15.5838C104.655 16.0393 104.523 16.5471 104.517 17.1072V19.4247C104.517 20.1264 104.646 20.7327 104.905 21.2436C105.169 21.7545 105.542 22.1484 106.022 22.4254C106.502 22.7024 107.071 22.8409 107.73 22.8409C108.167 22.8409 108.567 22.7794 108.93 22.6562C109.293 22.5331 109.604 22.3485 109.863 22.1023C110.121 21.8561 110.318 21.5545 110.454 21.1974L114.091 21.4375C113.907 22.3116 113.528 23.0748 112.956 23.7273C112.389 24.3736 111.657 24.8783 110.758 25.2415C109.866 25.5985 108.835 25.777 107.665 25.777Z"
                        class="fill-blue-600 dark:fill-white" fill="currentColor" />
                    <path
                        d="M1 29.5V16.5C1 9.87258 6.37258 4.5 13 4.5C19.6274 4.5 25 9.87258 25 16.5C25 23.1274 19.6274 28.5 13 28.5H12"
                        class="stroke-blue-600 dark:stroke-white" stroke="currentColor" stroke-width="2" />
                    <path
                        d="M5 29.5V16.66C5 12.1534 8.58172 8.5 13 8.5C17.4183 8.5 21 12.1534 21 16.66C21 21.1666 17.4183 24.82 13 24.82H12"
                        class="stroke-blue-600 dark:stroke-white" stroke="currentColor" stroke-width="2" />
                    <circle cx="13" cy="16.5214" r="5" class="fill-blue-600 dark:fill-white"
                            fill="currentColor" />
                </svg>
            </a>
        </div>

        <!-- Buttons -->
        <div class="h-full overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
            <nav class="hs-accordion-group p-3 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
                @if (Auth::user()->role_id == 4)
                    <ul class="flex flex-col space-y-1">
                        <li>
                            <button type="button"
                                    class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200"
                                    aria-expanded="true" aria-controls="users-accordion-sub-1-child" id="browse">
                                <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="m15.75 15.75-2.489-2.489m0 0a3.375 3.375 0 1 0-4.773-4.773 3.375 3.375 0 0 0 4.774 4.774ZM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>

                                Browse
                            </button>
                        </li>

                        <li class="hs-accordion" id="users-accordion">
                            <button type="button" class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200"
                                    aria-expanded="true" aria-controls="users-accordion-child">
                                <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                                </svg>

                                My Courses

                                <svg class="hs-accordion-active:block ms-auto hidden size-4"
                                     xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m18 15-6-6-6 6" />
                                </svg>

                                <svg class="hs-accordion-active:hidden ms-auto block size-4"
                                     xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m6 9 6 6 6-6" />
                                </svg>
                            </button>

                            <div id="users-accordion-child"
                                 class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden"
                                 role="region" aria-labelledby="users-accordion">
                                <ul class="hs-accordion-group ps-8 pt-1 space-y-1" data-hs-accordion-always-open>
                                    <li class="hs-accordion" id="users-accordion-sub-1">
                                        <button type="button"
                                                class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200"
                                                aria-expanded="true" aria-controls="users-accordion-sub-1-child"
                                                id="university-courses">
                                            University Courses
                                        </button>
                                    </li>
                                    <li class="hs-accordion" id="users-accordion-sub-2">
                                        <button type="button"
                                                class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200"
                                                aria-expanded="true" aria-controls="users-accordion-sub-2-child"
                                                id="extra-courses">
                                            Extraordinary Courses
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="hs-accordion" id="projects-accordion">
                            <button type="button"
                                    class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200"
                                    aria-expanded="true" aria-controls="projects-accordion-child">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25" />
                                </svg>

                                Projects

                                <svg class="hs-accordion-active:block ms-auto hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m18 15-6-6-6 6" />
                                </svg>

                                <svg class="hs-accordion-active:hidden ms-auto block size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m6 9 6 6 6-6" />
                                </svg>
                            </button>

                            <div id="projects-accordion-child"
                                 class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden"
                                 role="region" aria-labelledby="projects-accordion">
                                <ul class="ps-8 pt-1 space-y-1">
                                    <li>
                                        <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                           href="#"> Link 1
                                        </a>
                                    </li>
                                    <li>
                                        <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                           href="#"> Link 2
                                        </a>
                                    </li>
                                    <li>
                                        <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200"
                                           href="#"> Link 3
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li><a class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-700 dark:text-neutral-200 dark:hover:text-neutral-300"
                               href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                                </svg>

                                Job Post
                            </a></li>
                        <li><a class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-900 dark:text-neutral-200 dark:hover:text-neutral-300"
                               href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                </svg>

                                Newsletter
                            </a></li>
                    </ul>
                @endif

                @if (Auth::user()->role_id == 2)
                    <ul class="flex flex-col space-y-1">
                        <li>
                            <button type="button"
                                    class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200"
                                    aria-expanded="true" aria-controls="users-accordion-sub-1-child" id="browse">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m15.75 15.75-2.489-2.489m0 0a3.375 3.375 0 1 0-4.773-4.773 3.375 3.375 0 0 0 4.774 4.774ZM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                My Course
                            </button>
                        </li>

                        <li><a class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-700 dark:text-neutral-200 dark:hover:text-neutral-300"
                               href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                                </svg>

                                Create New Post
                            </a>
                        </li>
                    </ul>
                @endif

                @if (Auth::user()->role_id == 1)
                    <ul class="flex flex-col space-y-1">
                        <li>
                            <a onclick="showSection('dashboard-section')" type="button" class=" hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-customTeal" aria-expanded="true" aria-controls="account-accordion-child">
                                <div class="flex flex-row items-center gap-x-3">
                                    <i class="fa-solid fa-house"></i> <span class="mt-1">Dashboard</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a onclick="showSection('add-teacher-section')" type="button" class=" hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-customTeal" aria-expanded="true" aria-controls="account-accordion-child">
                                <div class="flex flex-row items-center gap-x-3">
                                    <i class="fa-solid fa-chalkboard-user"></i> <span class="mt-1"> Add Teacher </span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a type="button" onclick="showSection('add-recruiter-section')" class=" hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-customTeal" aria-expanded="true" aria-controls="account-accordion-child">
                                <div class="flex flex-row items-center gap-x-4">
                                    <i class="fa-solid fa-user-tie"></i> <span class="mt-1"> Add Recruiter </span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a type="button" onclick="showSection('student-list-section')" class=" hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-customTeal" aria-expanded="true" aria-controls="account-accordion-child">
                                <div class="flex flex-row items-center gap-x-4">
                                    <i class="fa-solid fa-address-book"></i> <span class="mt-1"> Student List </span>
                                </div>
                            </a>
                        </li>
                    </ul>
                @endif

                @if (Auth::user()->role_id == 3)
                    <ul class="flex flex-col space-y-1">
                        <li>
                            <a href="/dashboard" type="button" class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200"
                               aria-expanded="true" aria-controls="users-accordion-sub-1-child" id="browse">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m15.75 15.75-2.489-2.489m0 0a3.375 3.375 0 1 0-4.773-4.773 3.375 3.375 0 0 0 4.774 4.774ZM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                My Events
                            </a>
                        </li>

                        <li>
                            <a onclick="showSection('create-event-section')" class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-700 dark:text-neutral-200 dark:hover:text-neutral-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                                </svg>
                                Create New Events
                            </a>
                        </li>
                    </ul>
                @endif
            </nav>
        </div>
    </div>
</div>

<!-- Content -->
<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
        @if (Auth::user()->role->name == 'student')
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-6 p-4" id="coursesGrid">

                @foreach (\App\Models\Course::all() as $course)
                    <a href="/course/{{ $course->id }}"
                       class="course-item block bg-white border border-gray-200 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 dark:border-gray-700"
                       data-major-id="{{ $course->major_id }}">
                        <img class="w-full h-[150px] object-cover rounded-t-lg"
                             src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}">
                        <div class="p-6 mt-[-20px]">
                            <div class="flex justify-between w-full h-12">
                                <h5 class="text-md font-semibold text-gray-900 dark:text-white mb-2 text-left">
                                    {{ $course->title }}</h5>
                            </div>
                            <div class="flex justify-start items-center mt-2">
                                <span
                                    class="bg-blue-100 text-blue-600 px-2 py-1 rounded-full text-xs flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                    </svg>
                                    {{ $course->chapters->count() }} Chapters
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif

        @if (Auth::user()->role->name == 'teacher')
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-6 p-4" id="coursesGrid">
                @if (Auth::user()->role->name == 'teacher')
                    <a href="/createcourse" class="course-item block bg-gradient-to-r from-blue-500 to-purple-600 border border-transparent rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105 dark:border-gray-700">
                        <div class="p-8 flex flex-col items-center justify-center">
                            <div class="bg-white p-4 rounded-full shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="h-16 w-16 text-blue-600 dark:text-blue-300" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </div>
                            <p class="mt-4 text-lg font-bold text-white dark:text-gray-100">Create New Course</p>
                        </div>
                    </a>
                @endif

                @if (Auth::user()->role->name == 'student')
                    @foreach (\App\Models\Course::all() as $course)
                        <a href="/course/{{ $course->id }}"
                           class="course-item block bg-white border border-gray-200 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 dark:border-gray-700"
                           data-major-id="{{ $course->major_id }}">
                            <img class="w-full h-[150px] object-cover rounded-t-lg"
                                 src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}">
                            <div class="p-6 mt-[-20px]">
                                <div class="flex justify-between w-full h-12">
                                    <h5 class="text-md font-semibold text-gray-900 dark:text-white mb-2 text-left">
                                        {{ $course->title }}</h5>
                                </div>
                                <div class="flex justify-start items-center mt-2">
                                    <span
                                        class="bg-blue-100 text-blue-600 px-2 py-1 rounded-full text-xs flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                             class="w-4 h-4 ml-2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                        </svg>
                                        {{ $course->chapters->count() }} Chapters
                                    </span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endif

                @if (Auth::user()->role->name == 'teacher')
                    @foreach (\App\Models\Course::where('user_id', Auth::user()->id)->get() as $course)
                        <a href="/course/{{ $course->id }}" class="course-item block bg-white border border-gray-200 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 dark:border-gray-700"
                           data-major-id="{{ $course->major_id }}">
                            <img class="w-full h-[150px] object-cover rounded-t-lg"
                                 src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}">
                            <div class="p-6 mt-[-20px]">
                                <div class="flex justify-between w-full h-12">
                                    <h5 class="text-md font-semibold text-gray-900 dark:text-white mb-2 text-left">
                                        {{ $course->title }}</h5>
                                </div>
                                <div class="flex justify-start items-center mt-2">
                                    <span
                                        class="bg-blue-100 text-blue-600 px-2 py-1 rounded-full text-xs flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                             class="w-4 h-4 ml-2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                        </svg>
                                        {{ $course->chapters->count() }} Chapters
                                    </span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>
        @endif

        @if (Auth::user()->role->name == 'admin')
            <!-- Add Teacher Section-->
            <div id="add-teacher-section" class="w-full h-[80%] lg:pl-72 py-5 pr-10 transition-all duration-300">
                @if (session('success'))
                    <div id="success-message" class=" mb-10 bg-green-200 text-sm text-green-700 rounded-lg p-4" role="alert" tabindex="-1"
                         aria-labelledby="hs-solid-color-success-label">
                        <span id="hs-solid-color-success-label" class="font-bold">Success</span> {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div id="error-message" class=" mb-10 bg-red-200 text-sm text-red-700 rounded-lg p-4" role="alert" tabindex="-1"
                         aria-labelledby="error-message-label">
                        <span id="error-message-label" class="font-bold">Error</span>
                        <ul class="mt-2 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h2 class="font-semibold text-xl text-gray-700 ps-6 mb-5 -mt-5"> Provide the details below to register a new Teacher  </h2>
                <x-add_teacher />
            </div>

            <!-- Add Recruiter Section-->
            <div id="add-recruiter-section" class="w-full h-[80%] lg:pl-72 pr-5 transition-all duration-300">
                @if (session('success'))
                    <div id="success-message" class=" mb-10 bg-green-200 text-sm text-green-700 rounded-lg p-4" role="alert" tabindex="-1"
                         aria-labelledby="hs-solid-color-success-label">
                        <span id="hs-solid-color-success-label" class="font-bold">Success</span> {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div id="error-message" class=" mb-10 bg-red-200 text-sm text-red-700 rounded-lg p-4" role="alert" tabindex="-1"
                         aria-labelledby="error-message-label">
                        <span id="error-message-label" class="font-bold">Error</span>
                        <ul class="mt-2 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h2 class="font-semibold text-xl text-gray-700 ps-6 mb-5 -mt-5"> Provide the details below to register a new Job Recruiter </h2>
                <x-add_recruiter />
            </div>

            <!-- Dashboard Section-->
            <div id="dashboard-section" class="w-full lg:ps-32 transition-all duration-300">
                <x-admin_workspace />
            </div>

            <!-- Student List Section-->
            <div id="student-list-section">
                <div id="major-scroll" class="custom-padding absolute left-10 top-14 inset-x-0 flex flex-wrap md:justify-start md:flex-nowrap z-[48] w-full bg-white border-b text-sm  pb-2.5 lg:ps-[260px] dark:bg-neutral-800 dark:border-neutral-700">
                    <div class="flex flex-nowrap overflow-x-auto gap-2 py-2" id="majorTags">
                        <!-- "All" Tag -->
                        <button type="button" class="group inline-flex items-center justify-center gap-x-2 font-semibold rounded-full border border-gray-300 px-4 py-2 text-sm text-gray-700 hover:bg-blue-100 focus:outline-none focus:bg-blue-100 dark:border-neutral-600 dark:text-neutral-300 dark:hover:bg-neutral-600 dark:focus:bg-neutral-600"
                                id='all-student-btn' data-major-id="0">
                            <span class="truncate max-w-[200px] text-ellipsis overflow-hidden whitespace-nowrap">All</span>
                        </button>
                        @foreach (\App\Models\Major::all() as $major)
                            <button type="button" class="major-btn group inline-flex items-center justify-center gap-x-2 font-semibold rounded-full border border-gray-300 px-4 py-2 text-sm text-gray-700 hover:bg-blue-100 focus:outline-none focus:bg-blue-100 dark:border-neutral-600 dark:text-neutral-300 dark:hover:bg-neutral-600 dark:focus:bg-neutral-600"
                                    data-major-id="{{ $major->id }}">
                                <span class="truncate max-w-[200px] text-ellipsis overflow-hidden whitespace-nowrap">{{ $major->name }}</span>
                            </button>
                        @endforeach
                    </div>
                </div>
                <div id="student-list" class="relative mt-16 w-full lg:ps-36 transition-all duration-300">
                    <x-student_list />
                </div>
            </div>
        @endif

        <!-- Create Event Section -->
        @if (Auth::user()->role->name == 'job_recruiter')
            <div id="create-event-section" class="hidden w-full lg:col-span-4 lg:pl-72 py-5 pr-10 transition-all duration-300">
                @if (session('success'))
                    <div id="success-message" class="mb-10 bg-green-200 text-sm text-green-700 rounded-lg p-4" role="alert" tabindex="-1" aria-labelledby="hs-solid-color-success-label">
                        <span id="hs-solid-color-success-label" class="font-bold">Success</span> {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div id="error-message" class="mb-10 bg-red-200 text-sm text-red-700 rounded-lg p-4" role="alert" tabindex="-1" aria-labelledby="error-message-label">
                        <span id="error-message-label" class="font-bold">Error</span>
                        <ul class="mt-2 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h2 class="font-semibold text-xl text-gray-700 ps-6 mb-5 -mt-5">Enter information below to create an Event</h2>
                    <style>
                        #image-preview-wrapper {
                            height: 200px; /* Adjust height as needed */
                            overflow: hidden;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        }
                        #event-form {
                            height: 125vh;
                        }
                        form {
                            height: 125vh;
                        }
                    </style>
                    <div id="event-form" class="w-full max-w-5xl mx-auto px-5 pb-3 gap-7 columns-2 space-y-5 whitespace-nowrap">
                        <form action="/createEvent" method="post" class="flex flex-wrap gap-7" enctype="multipart/form-data">
                            @csrf
                            <div class="bg-white shadow rounded-lg px-6 py-6 mb-5 h-[330px] w-full md:w-[48%]">
                                <h2 class="text-xl font-semibold text-gray-800 mb-4"> Event Information </h2>
                                <div class="mb-4">
                                    <label for="title" class="block text-sm font-medium text-gray-700">Event title</label>
                                    <input type="text" name='title' id="title" class="mt-1 px-4 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Name of the event">
                                </div>
                                <div class="mb-4">
                                    <label for="description" class="block text-sm font-medium text-gray-700">Event description</label>
                                    <textarea name="description" id="description" rows="5" cols="50" class="mt-1 p-4 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Detail description of the event"></textarea>
                                </div>
                            </div>
                            <div class="bg-white shadow rounded-lg p-6 mb-5 h-[260px] w-full md:w-[48%]">
                                <h2 class="text-xl font-semibold text-gray-800 mb-4">Event image</h2>
                                <div class="mb-4">
                                    <label class="image-upload border-gray-300">
                                        <input type="file" name="image" class="hidden" id="image-input" />
                                        <div class="text-center flex flex-col" id="image-preview-wrapper">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                            </svg>
                                            <p class="text-gray-600 mt-2">Click to upload an image (Max 4MB)</p>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div class="bg-white shadow rounded-lg p-6 h-[420px] mb-5 w-full md:w-[48%]">
                                <h2 class="text-xl font-semibold text-gray-800 mb-4"> Date & Time </h2>
                                <div class="mb-4 relative">
                                    <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                                    <div class="relative">
                                        <input type="date" id="date" name="date" min="{{ \Carbon\Carbon::now()->toDateString() }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm pr-10"/>
                                    </div>
                                    <label for="time" class="block text-sm font-medium text-gray-700 mt-3">Time</label>
                                    <div class="relative">
                                        <input type="time" id="time" name="time" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm pr-10"/>
                                    </div>
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            const dateInput = document.getElementById('date');
                                            const timeInput = document.getElementById('time');

                                            function updateTimeLimit() {
                                                const currentDate = new Date();
                                                const selectedDate = new Date(dateInput.value);

                                                // Check if the selected date is today
                                                if (selectedDate.toDateString() === currentDate.toDateString()) {
                                                    const hours = String(currentDate.getHours()).padStart(2, '0');
                                                    const minutes = String(currentDate.getMinutes()).padStart(2, '0');
                                                    timeInput.min = `${hours}:${minutes}`;
                                                } else {
                                                    timeInput.min = '';
                                                }
                                            }

                                            updateTimeLimit();
                                            dateInput.addEventListener('input', updateTimeLimit);
                                        });
                                    </script>
                                </div>
                            </div>

                            <div class="bg-white shadow rounded-lg p-6 h-[420px] mb-5 w-full md:w-[48%]">
                                <h2 class="text-xl font-semibold text-gray-800 mb-4">Major Category</h2>
                                <div class="mb-4 relative">
                                    <div class="relative">
                                        <select name="category" class="mt-1 block w-full text-gray-500 text-sm appearance-none border border-gray-300 rounded-lg py-2 px-5 pr-10 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 input-focus transition duration-150 ease-in-out">
                                            <option value="" disabled selected> Select course category</option>
                                            @foreach (\App\Models\Major::all() as $major)
                                                <option value="{{ $major->id }}">{{ $major->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white shadow rounded-lg p-6 h-[420px] mb-5 w-full md:w-[48%]">
                                <h2 class="text-xl font-semibold text-gray-800 mb-4">Meeting Information </h2>
                                <div class="mb-4 relative">
                                    <label for="link" class="block text-sm font-medium text-gray-700">Meeting link</label>
                                    <div class="relative">
                                        <input type="text" id="link" name="link" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm pr-10" />
                                    </div>
                                    <label for="passcode" class="block text-sm mt-3 font-medium text-gray-700">Passcode number</label>
                                    <div class="relative">
                                        <input type="text" id="passcode" name="passcode" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm pr-10" />
                                        <input type="text" id="recruiter_id" name="recruiter_id" value="{{ Auth::user()->id }}" class=" hidden mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm pr-10" />
                                    </div>
                                </div>
                            </div>
                            <div class="w-full flex justify-end">
                                <button id="edit_btn" type="submit" class="mt-4 inline-flex items-center w-28 justify-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">Save</button>
                            </div>
                        </form>
                    </div>
                    <script>

                        function togglePassword(id) {
                            var x = document.getElementById(id);
                            if (x.type === "password") {
                                x.type = "text";
                            } else {
                                x.type = "password";
                            }
                        }
                        const imageInput = document.getElementById('image-input');
                        const imagePreview = document.getElementById('image-preview-wrapper');

                        imageInput.addEventListener('change', function () {
                            const file = this.files[0];
                            if (file) {
                                const reader = new FileReader();
                                reader.onload = function (event) {
                                    imagePreview.innerHTML =
                                        `<img src="${event.target.result}" class="w-full h-auto rounded-lg" alt="Course Image Preview">`;
                                }
                                reader.readAsDataURL(file);
                            }
                        });
                    </script>
            </div>
        @endif

    </div>
</div>

<!-- JS Implementing Plugins -->

<!-- JS PLUGINS -->
<!-- Required plugins -->
<script src="https://cdn.jsdelivr.net/npm/preline/dist/preline.min.js"></script>

<!-- Apexcharts -->
<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://preline.co/assets/js/hs-apexcharts-helpers.js"></script>
</body>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const activeSection = localStorage.getItem('activeSection') || 'create-event-section'; // default to dashboard
        showSection(activeSection);
    });

    function showSection(sectionId) {
        document.querySelectorAll('div[id$="-section"]').forEach(section => {
            if (section.id !== sectionId) {
                section.style.display = 'none';
            }
        });

        const activeSection = document.getElementById(sectionId);
        if (activeSection) {
            activeSection.style.display = 'block';
            localStorage.setItem('activeSection', sectionId);
        }
    }

    const allStudentBtn = document.getElementById('all-student-btn');

    document.querySelectorAll('.major-btn').forEach(button => {
        button.addEventListener('click', function() {
            const major_id_no = this.getAttribute('data-major-id');
            location.href = `?major=${major_id_no}`;
        });
    });

    const major = 'all';
    allStudentBtn.addEventListener('click', function() {
        location.href = `?major=${major}`;
    })
</script>
<script>
    function filterCoursesByMajor(majorId) {
        const courseItems = document.querySelectorAll('.course-item');
        const majorButtons = document.querySelectorAll('#majorTags button');

        courseItems.forEach(item => {
            if (item.getAttribute('data-major-id') === majorId || majorId === 0) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });

        majorButtons.forEach(button => {
            if (button.getAttribute('data-major-id') === majorId) {
                button.classList.add('bg-blue-100', 'text-blue-600');
            } else {
                button.classList.remove('bg-blue-100', 'text-blue-600');
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        const browseButton = document.getElementById('browse');
        const universityCoursesButton = document.getElementById('university-courses');
        const extraCoursesButton = document.getElementById('extra-courses');
        const coursesGrid = document.getElementById('coursesGrid');

        const buttons = [browseButton, universityCoursesButton, extraCoursesButton];

        const allCourses = @json(\App\Models\Course::withCount('chapters')->get());
        const enrolledCourses = @json(\App\Models\student_enrolled_courses::where('user_id', Auth::user()->id)->pluck('course_id'));

        function updateCourses(courses) {
            coursesGrid.innerHTML = '';

            courses.forEach(course => {
                const courseElement = `
                    <a href="/course/${course.id}"
                        class="course-item block bg-white border border-gray-200 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 dark:border-gray-700"
                        data-major-id="${course.major_id}">
                        <img class="w-full h-[150px] object-cover rounded-t-lg"
                            src="/storage/${course.image}" alt="${course.title}">
                        <div class="p-6 mt-[-20px]">
                            <div class="flex justify-between w-full h-12">
                                <h5 class="text-md font-semibold text-gray-900 dark:text-white mb-2 text-left">
                                    ${course.title}</h5>
                            </div>
                            <div class="flex justify-start items-center mt-2">
                                <span
                                    class="bg-blue-100 text-blue-600 px-2 py-1 rounded-full text-xs flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                    </svg>
                                    ${course.chapters_count} Chapters
                                </span>
                            </div>
                        </div>
                    </a>
                `;
                coursesGrid.insertAdjacentHTML('beforeend', courseElement);
            });
        }

        function clearActiveStyles() {
            buttons.forEach(button => button.classList.remove('bg-blue-100', 'text-blue-600'));
        }

        browseButton.addEventListener('click', function () {
            clearActiveStyles();
            browseButton.classList.add('bg-blue-100', 'text-blue-600');
            updateCourses(allCourses);
        });

        universityCoursesButton.addEventListener('click', function () {
            clearActiveStyles();
            universityCoursesButton.classList.add('bg-blue-100', 'text-blue-600');
            const universityCourses = allCourses.filter(course => enrolledCourses.includes(course.id) && course.major_id >= 4 && course.major_id <= 21);
            updateCourses(universityCourses);
        });

        extraCoursesButton.addEventListener('click', function () {
            clearActiveStyles();
            extraCoursesButton.classList.add('bg-blue-100', 'text-blue-600');
            const extraCourses = allCourses.filter(course => enrolledCourses.includes(course.id) &&
                course.major_id >= 1 && course.major_id <= 3);
            updateCourses(extraCourses);
        });
    });
</script>

</html>

