@use('App\Models\Student')

<div class="px-4 py-0  sm:py-0.5 sm:px-6 space-y-4 sm:space-y-6">
    <!-- Grid -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
        <!-- Card 1 -->
        <div class="flex flex-col bg-white border border-blue-600 shadow-sm rounded-xl">
            <div class="p-4 md:p-5">
                <div class="flex items-center gap-x-2">
                    <p class="text-xs uppercase tracking-wide text-gray-500"> Freshers </p>
                    <div class="hs-tooltip">
                        <!-- toggle -->
                        <div class="hs-tooltip-toggle">
                            <svg class="shrink-0 size-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10" />
                                <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                                <path d="M12 17h.01" />
                            </svg>
                            <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm" role="tooltip"> Who recently paid for university programs </span>
                        </div>
                    </div>
                </div>

                <div class="mt-1 flex items-center gap-x-2">
                    <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
                        {{ Student::where('major_id', 3)->count() }}
                    </h3>
                    <span class="flex items-center gap-x-1 text-blue-700">
                    <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <polyline points="22 7 13.5 15.5 8.5 10.5 2 17" />
                      <polyline points="16 7 22 7 22 13" />
                    </svg>
                    <span class="inline-block text-sm">
                        @php
                            $todayUserCount = Student::whereDate('created_at', '2024-09-07')
                                                     ->where('major_id', 1)->count();

                            $totalUserCount = Student::where('major_id', 1)->count();

                            $rate = $totalUserCount > 0 ? ($todayUserCount / $totalUserCount) * 100 : 0;
                            $rateChange = number_format($rate, 1);
                        @endphp
                      {{ $rateChange }}%
                    </span>
                </span>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="flex flex-col bg-white border border-blue-600 shadow-sm rounded-xl">
            <div class="p-4 md:p-5">
                <div class="flex items-center gap-x-2">
                    <p class="text-xs uppercase tracking-wide text-gray-500"> Total users </p>
                    <div class="hs-tooltip">
                        <!-- toggle -->
                        <div class="hs-tooltip-toggle">
                            <svg class="shrink-0 size-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10" />
                                <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                                <path d="M12 17h.01" />
                            </svg>
                            <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm" role="tooltip"> The number of students </span>
                        </div>
                    </div>
                </div>

                <div class="mt-1 flex items-center gap-x-2">
                    <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
                        {{ Student::count() }}
                    </h3>
                    <span class="flex items-center gap-x-1 text-blue-700">
                    <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <polyline points="22 7 13.5 15.5 8.5 10.5 2 17" />
                      <polyline points="16 7 22 7 22 13" />
                    </svg>
                    <span class="inline-block text-sm">
                        @php
                            $todayUserCount = Student::whereDate('created_at', '2024-09-07')->count();

                            $totalUserCount = Student::count();

                            $rate = $totalUserCount > 0 ? ($todayUserCount / $totalUserCount) * 100 : 0;
                            $rateChange = number_format($rate, 1);
                        @endphp
                        {{ $rateChange }}%
                    </span>
                </span>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="sm:col-span-2 lg:col-span-2 w-full flex justify-center items-center">
            <div class="relative w-full cursor-pointer">
                <span class="absolute top-0 left-0 w-full h-full mt-0.5 ml-0.5 bg-transparent rounded-lg"></span>
                <div class="relative py-3.5 px-[82px] bg-white border-2 border-blue-600 rounded-lg hover:scale-[1.025] transition duration-500">
                    <div class="flex items-center justify-center">
                        <div class="text-center">
                            <h3 class="mb-2 mt-1 font-bold text-gray-800">
                                Welcome Back, {{ Auth::user()->name }} <span class="text-lg">👋</span>
                            </h3>
                        </div>
                    </div>
                    <p class="text-gray-600 text-xs text-center mt-2">
                        Your dashboard is waiting. Ready to help!
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="grid lg:grid-cols-2 gap-4 sm:gap-6">
        <!-- Income Graph -->
        <div class="p-4 md:p-5 min-h-[410px] flex flex-col bg-white border shadow-sm rounded-xl ">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-sm text-gray-500 ">Income</h2>
                    @php
                        $total_income_allDay = 0;
                        for ($i = 4; $i <= 21; $i++) {
                            $incomeByBatch = (Student::where('major_id', $i) -> count()) * 100;
                            $total_income_allDay += $incomeByBatch;
                        }
                    @endphp
                    @php
                        $today = date('Y-m-d');
                        $lastDays = date('Y-m-d', strtotime($today . '-6 days'));
                        $thisWeekArray = array();

                        while($lastDays <= $today){
                            $incomeByDay_this = (Student::whereDate('updated_at', $lastDays) -> count()) * 100;
                            $thisWeekArray[] = $incomeByDay_this;
                            $lastDays = date('Y-m-d', strtotime($lastDays . '+1 days'));
                        }

                        $thisWeekArrayJson = json_encode($thisWeekArray);

                        $lastWeekStart = date('Y-m-d', strtotime($today . '-13 days'));
                        $lastWeekEnd = date('Y-m-d', strtotime($today . '-7 days'));
                        $lastWeekArray = array();

                        while($lastWeekStart <= $lastWeekEnd){
                            $incomeByDay_last = (Student::whereDate('updated_at', $lastWeekStart) -> count()) * 100;
                            $lastWeekArray[] = $incomeByDay_last;
                            $lastWeekStart = date('Y-m-d', strtotime($lastWeekStart . '+1 days'));
                        }

                        $lastWeekArrayJson = json_encode($lastWeekArray);

                    @endphp
                    <p class="text-xl sm:text-2xl font-medium text-gray-800">${{ number_format($total_income_allDay) }}</p>
                </div>

                <div>
                      <span class="py-[5px] px-1.5 inline-flex items-center gap-x-1 text-xs font-medium rounded-md bg-teal-100 text-teal-800">
                        <svg class="inline-block size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path d="M19 12l-7-7-7 7" />
                          <path d="M12 19V5" />
                        </svg>
                          @php
                              $today = date('Y-m-d');
                              $todayIncome = Student::whereDate('updated_at', $today)->count() * 100;
                              $todayIncomeRate = ( $todayIncome / $total_income_allDay ) * 100;
                          @endphp
                          {{ number_format($todayIncomeRate, 1) }}%
                      </span>
                </div>
            </div>
            <div id="hs-line-chart"></div>
        </div>

        <!-- Student Graph -->
        <div class="p-4 md:p-5 min-h-[410px] flex flex-col bg-white border shadow-sm rounded-xl">
            <!-- Header -->
            <div class="flex justify-between items-center">
                <div>
                    @php
                        $today = date('Y-m-d');
                        $lastDays = date('Y-m-d', strtotime($today . '-6 days'));
                        $dataArray = array();

                        while ($lastDays <= $today){
                            $userCounting = Student::whereDate('created_at', $lastDays)->count();
                            $dataArray[] = $userCounting;
                            $lastDays = date('Y-m-d', strtotime($lastDays . '+1 days'));
                        }

                        $dataArrayJson = json_encode($dataArray);
                    @endphp
                    <h2 class="text-sm text-gray-500"> Students </h2>
                    <p class="text-xl sm:text-2xl font-medium text-gray-800">
                        {{ Student::count() }}
                    </p>
                </div>

                <div>
                  <span class="py-[5px] px-1.5 inline-flex items-center gap-x-1 text-xs font-medium rounded-md bg-teal-100 text-green-700">
                    <svg class="inline-block size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M19 12l-7-7-7 7" />
                      <path d="M12 19V5" />
                    </svg> {{ $rateChange }}%
                  </span>
                </div>
            </div>

            <div id="hs-single-area-chart"></div>
        </div>
    </div>
</div>

<style>
    .apexcharts-xaxis-label {
        white-space: pre; /* Preserve white space, allowing line breaks */
        text-align: center; /* Center-align text */
    }
</style>

<!-- Income graph JS -->
<script>
    window.addEventListener("load", () => {
        const thisWeekArray = @json($thisWeekArray);
        const lastWeekArray = @json($lastWeekArray);

        (function () {
            buildChart(
                "#hs-line-chart",
                (mode) => ({
                    chart: {
                        type: "line",
                        height: 300,
                        toolbar: {
                            show: false,
                        },
                        zoom: {
                            enabled: false,
                        },
                    },
                    series: [
                        {
                            name: "Chosen Period",
                            data: thisWeekArray
                        },
                        {
                            name: "Last Period",
                            data: lastWeekArray
                        },
                    ],
                    stroke: {
                        curve: 'smooth',
                        width: 3
                    },
                    xaxis: {
                        categories: [
                            "Sun",
                            "Mon",
                            "Tues",
                            "Wed",
                            "Thurs",
                            "Fri",
                            "Sat",
                        ],
                    },
                    yaxis: {
                        min: 0,
                        max: Math.max(...thisWeekArray, ...lastWeekArray),
                    },
                    tooltip: {
                        enabled: true,
                        theme: "light", // Ensures tooltip background is light
                        style: {
                            fontSize: '12px',
                            fontFamily: 'Helvetica, Arial, sans-serif',
                        },
                        onDatasetHover: {
                            highlightDataSeries: true,
                        },
                        x: {
                            show: true,
                        },
                        y: {
                            formatter: (value) => value.toFixed(2), // Customize value format if needed
                        },
                        marker: {
                            show: true, // Display marker on the tooltip
                        },
                        background: '#ffffff', // White background for the tooltip
                        borderColor: '#e5e7eb', // Optional: add border color
                        borderWidth: 1, // Optional: add border width
                    },
                }),
                {
                    colors: ["#2563eb", "#d1d5db"],
                    grid: { borderColor: "#e5e7eb" },
                },
                {
                    colors: ["#6b7280", "#2563eb"],
                    grid: { borderColor: "#404040" },
                }
            );
        })();
    });
</script>


<!-- System users graph JS -->
<script>
    window.addEventListener("load", () => {
        (function () {
            // Function to generate date strings in the format 'Month Day'
            function getDateRange(startDate, endDate) {
                const dates = [];
                let currentDate = new Date(startDate);

                while (currentDate <= endDate) {
                    // Format date to 'Month' and 'Day'
                    const month = currentDate.toLocaleDateString('en-GB', { month: 'short' });
                    const day = currentDate.toLocaleDateString('en-GB', { day: '2-digit' });
                    dates.push(`${month} ${day}`);
                    currentDate.setDate(currentDate.getDate() + 1);
                }

                return dates;
            }

            const today = new Date();
            today.setHours(0, 0, 0, 0);

            // Set the start date to 6 days before today
            const startDate = new Date(today);
            startDate.setDate(today.getDate() - 6);

            const dateRange = getDateRange(startDate, today);
            const dataArray = @json($dataArray);

            buildChart(
                "#hs-single-area-chart",
                (mode) => ({
                    chart: {
                        height: 300,
                        type: "area",
                        toolbar: {
                            show: false,
                        },
                        zoom: {
                            enabled: false,
                        },
                    },
                    series: [
                        {
                            name: "New Users",
                            data: dataArray, // Use dynamic data here
                        },
                    ],
                    legend: {
                        show: false,
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    stroke: {
                        curve: "smooth",
                        width: 2,
                    },
                    grid: {
                        strokeDashArray: 2,
                    },
                    fill: {
                        type: "gradient",
                        gradient: {
                            type: "vertical",
                            shadeIntensity: 1,
                            opacityFrom: 0.1,
                            opacityTo: 0.8,
                        },
                    },
                    xaxis: {
                        type: "category",
                        tickPlacement: "on",
                        categories: dateRange,
                        axisBorder: {
                            show: false,
                        },
                        axisTicks: {
                            show: false,
                        },
                        crosshairs: {
                            stroke: {
                                dashArray: 0,
                            },
                            dropShadow: {
                                show: false,
                            },
                        },
                        tooltip: {
                            enabled: false,
                        },
                        labels: {
                            style: {
                                colors: "#9ca3af",
                                fontSize: "11px",
                                fontFamily: "Inter, ui-sans-serif",
                                fontWeight: 400,
                            },
                            rotate: 45, // Rotate labels diagonally if needed
                            formatter: (title) => title,
                        },
                    },
                    yaxis: {
                        labels: {
                            align: "left",
                            minWidth: 0,
                            maxWidth: 140,
                            style: {
                                colors: "#9ca3af",
                                fontSize: "13px",
                                fontFamily: "Inter, ui-sans-serif",
                                fontWeight: 400,
                            },
                            formatter: (value) => {
                                if (value >= 100000) {
                                    return `${value / 100000} lakh`;
                                }
                                return value;
                            },
                        },
                    },
                    tooltip: {
                        x: {
                            format: "MMMM yyyy",
                        },
                        y: {
                            formatter: (value) =>
                                `${value >= 1000 ? `${value / 1000}k` : value}`,
                        },
                        custom: function (props) {
                            const { categories } = props.ctx.opts.xaxis;
                            const { dataPointIndex } = props;
                            const title = categories[dataPointIndex].split(" ");
                            const newTitle = `${title[0]} ${title[1]}`;

                            return buildTooltip(props, {
                                title: newTitle,
                                mode,
                                valuePrefix: "",
                                hasTextLabel: true,
                                markerExtClasses: "!rounded-sm",
                                wrapperExtClasses: "min-w-28",
                            });
                        },
                    },
                    responsive: [
                        {
                            breakpoint: 568,
                            options: {
                                chart: {
                                    height: 300,
                                },
                                labels: {
                                    style: {
                                        colors: "#9ca3af",
                                        fontSize: "11px",
                                        fontFamily: "Inter, ui-sans-serif",
                                        fontWeight: 400,
                                    },
                                    offsetX: -2,
                                    rotate: -45, // Rotate labels diagonally for smaller screens as well
                                    formatter: (title) => title,
                                },
                                yaxis: {
                                    labels: {
                                        align: "left",
                                        minWidth: 0,
                                        maxWidth: 140,
                                        style: {
                                            colors: "#9ca3af",
                                            fontSize: "11px",
                                            fontFamily: "Inter, ui-sans-serif",
                                            fontWeight: 400,
                                        },
                                        formatter: (value) =>
                                            value >= 1000 ? `${value / 1000}k` : value,
                                    },
                                },
                            },
                        },
                    ],
                }),
                {
                    colors: ["#2563eb", "#9333ea"],
                    fill: {
                        gradient: {
                            stops: [0, 90, 100],
                        },
                    },
                    grid: {
                        borderColor: "#e5e7eb",
                    },
                },
                {
                    colors: ["#3b82f6", "#a855f7"],
                    fill: {
                        gradient: {
                            stops: [100, 90, 0],
                        },
                    },
                    grid: {
                        borderColor: "#404040",
                    },
                }
            );
        })();
    });
</script>


