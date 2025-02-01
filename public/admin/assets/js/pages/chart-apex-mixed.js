var colors = ["#727cf5", "#0acf97"],
    dataColors = $("#line-column-mixed").data("colors"),
    options = {
        chart: { height: 380, type: "line", toolbar: { show: !1 } },
        series: [
            {
                name: "Website Blog",
                type: "column",
                data: [
                    440, 505, 414, 671, 227, 413, 201, 352, 752, 320, 257, 160,
                ],
            },
            {
                name: "Social Media",
                type: "line",
                data: [23, 42, 35, 27, 43, 22, 17, 31, 22, 22, 12, 16],
            },
        ],
        stroke: { width: [0, 4] },
        labels: [
            "01 Jan 2001",
            "02 Jan 2001",
            "03 Jan 2001",
            "04 Jan 2001",
            "05 Jan 2001",
            "06 Jan 2001",
            "07 Jan 2001",
            "08 Jan 2001",
            "09 Jan 2001",
            "10 Jan 2001",
            "11 Jan 2001",
            "12 Jan 2001",
        ],
        xaxis: { type: "datetime" },
        colors: (colors = dataColors ? dataColors.split(",") : colors),
        yaxis: [
            { title: { text: "Website Blog" } },
            { opposite: !0, title: { text: "Social Media" } },
        ],
        legend: { offsetY: 7 },
        grid: { borderColor: "#f1f3fa", padding: { bottom: 5 } },
    },
    chart = new ApexCharts(
        document.querySelector("#line-column-mixed"),
        options
    ),
    colors = (chart.render(), ["#727cf5", "#39afd1", "#fa5c7c"]),
    dataColors = $("#multiple-yaxis-mixed").data("colors"),
    options = {
        chart: {
            height: 380,
            type: "line",
            stacked: !1,
            toolbar: { show: !1 },
        },
        dataLabels: { enabled: !1 },
        stroke: { width: [0, 0, 3] },
        series: [
            {
                name: "Income",
                type: "column",
                data: [1.4, 2, 2.5, 1.5, 2.5, 2.8, 3.8, 4.6],
            },
            {
                name: "Cashflow",
                type: "column",
                data: [1.1, 3, 3.1, 4, 4.1, 4.9, 6.5, 8.5],
            },
            {
                name: "Revenue",
                type: "line",
                data: [20, 29, 37, 36, 44, 45, 50, 58],
            },
        ],
        colors: (colors = dataColors ? dataColors.split(",") : colors),
        xaxis: { categories: [2009, 2010, 2011, 2012, 2013, 2014, 2015, 2016] },
        yaxis: [
            {
                axisTicks: { show: !0 },
                axisBorder: { show: !0, color: colors[0] },
                labels: { style: { color: colors[0] } },
                title: { text: "Income (thousand crores)" },
            },
            {
                axisTicks: { show: !0 },
                axisBorder: { show: !0, color: colors[1] },
                labels: { style: { color: colors[1] }, offsetX: 10 },
                title: { text: "Operating Cashflow (thousand crores)" },
            },
            {
                opposite: !0,
                axisTicks: { show: !0 },
                axisBorder: { show: !0, color: colors[2] },
                labels: { style: { color: colors[2] } },
                title: { text: "Revenue (thousand crores)" },
            },
        ],
        tooltip: {
            followCursor: !0,
            y: {
                formatter: function (o) {
                    return void 0 !== o ? o + " thousand crores" : o;
                },
            },
        },
        grid: { borderColor: "#f1f3fa", padding: { bottom: 5 } },
        legend: { offsetY: 7 },
        responsive: [
            {
                breakpoint: 600,
                options: { yaxis: { show: !1 }, legend: { show: !1 } },
            },
        ],
    },
    colors =
        ((chart = new ApexCharts(
            document.querySelector("#multiple-yaxis-mixed"),
            options
        )).render(),
        ["#0acf97", "#fa5c7c"]),
    dataColors = $("#line-area-mixed").data("colors"),
    options = {
        chart: { height: 380, type: "line", toolbar: { show: !1 } },
        stroke: { curve: "smooth", width: 2 },
        series: [
            {
                name: "Team A",
                type: "area",
                data: [44, 55, 31, 47, 31, 43, 26, 41, 31, 47, 33],
            },
            {
                name: "Team B",
                type: "line",
                data: [55, 69, 45, 61, 43, 54, 37, 52, 44, 61, 43],
            },
        ],
        fill: { type: "solid", opacity: [0.35, 1] },
        labels: [
            "Dec 01",
            "Dec 02",
            "Dec 03",
            "Dec 04",
            "Dec 05",
            "Dec 06",
            "Dec 07",
            "Dec 08",
            "Dec 09 ",
            "Dec 10",
            "Dec 11",
        ],
        markers: { size: 0 },
        legend: { offsetY: 7 },
        colors: (colors = dataColors ? dataColors.split(",") : colors),
        yaxis: [
            { title: { text: "Series A" } },
            { opposite: !0, title: { text: "Series B" } },
        ],
        tooltip: {
            shared: !0,
            intersect: !1,
            y: {
                formatter: function (o) {
                    return void 0 !== o ? o.toFixed(0) + " points" : o;
                },
            },
        },
        grid: { borderColor: "#f1f3fa", padding: { bottom: 5 } },
        responsive: [
            {
                breakpoint: 600,
                options: { yaxis: { show: !1 }, legend: { show: !1 } },
            },
        ],
    },
    colors =
        ((chart = new ApexCharts(
            document.querySelector("#line-area-mixed"),
            options
        )).render(),
        ["#727cf5", "#39afd1", "#fa5c7c"]),
    dataColors = $("#all-mixed").data("colors"),
    options = {
        chart: {
            height: 380,
            type: "line",
            stacked: !1,
            toolbar: { show: !1 },
        },
        stroke: { width: [0, 2, 4], curve: "smooth" },
        plotOptions: { bar: { columnWidth: "50%" } },
        colors: (colors = dataColors ? dataColors.split(",") : colors),
        series: [
            {
                name: "Team A",
                type: "column",
                data: [23, 11, 22, 27, 13, 22, 37, 21, 44, 22, 30],
            },
            {
                name: "Team B",
                type: "area",
                data: [44, 55, 41, 67, 22, 43, 21, 41, 56, 27, 43],
            },
            {
                name: "Team C",
                type: "line",
                data: [30, 25, 36, 30, 45, 35, 64, 52, 59, 36, 39],
            },
        ],
        fill: {
            opacity: [0.85, 0.25, 1],
            gradient: {
                inverseColors: !1,
                shade: "light",
                type: "vertical",
                opacityFrom: 0.85,
                opacityTo: 0.55,
                stops: [0, 100, 100, 100],
            },
        },
        labels: [
            "01/01/2003",
            "02/01/2003",
            "03/01/2003",
            "04/01/2003",
            "05/01/2003",
            "06/01/2003",
            "07/01/2003",
            "08/01/2003",
            "09/01/2003",
            "10/01/2003",
            "11/01/2003",
        ],
        markers: { size: 0 },
        legend: { offsetY: 7 },
        xaxis: { type: "datetime" },
        yaxis: { title: { text: "Points" } },
        tooltip: {
            shared: !0,
            intersect: !1,
            y: {
                formatter: function (o) {
                    return void 0 !== o ? o.toFixed(0) + " points" : o;
                },
            },
        },
        grid: { borderColor: "#f1f3fa", padding: { bottom: 5 } },
    };
(chart = new ApexCharts(
    document.querySelector("#all-mixed"),
    options
)).render();
