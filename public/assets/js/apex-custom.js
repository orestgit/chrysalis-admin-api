$(document).ready(function () {
    // console.log(config.chartData.completeTime);
    // console.log(config.chartData.pendingTime);
    // console.log(config.chartData.ScheduleTime);

    // console.log(typeof (config.chartData.pendingTime));

    // currently sale
    var options = {
        series: [{
            name: 'series1',
            data: [3, 20, 15, 40, 18, 200, 18, 53, 18, 35, 30, 195, 6]
        }],
        chart: {
            height: '100%',
            type: 'area',
            toolbar: {
                show: false
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },

        xaxis: {
            type: 'category',
            low: 0,
            offsetX: 0,
            offsetY: 0,
            show: false,
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec", "Jan"],
            labels: {
                low: 0,
                offsetX: 0,
                show: false,
            },
            axisBorder: {
                low: 0,
                offsetX: 0,
                show: false,
            },
        },
        markers: {
            strokeWidth: 3,
            colors: "#ffffff",
            strokeColors: ['#F65365', '#D6FFF9'],
            hover: {
                size: 6,
            }
        },
        yaxis: {
            low: 0,
            offsetX: 0,
            offsetY: 0,
            show: false,
            labels: {
                low: 0,
                offsetX: 0,
                show: false,
            },
            axisBorder: {
                low: 0,
                offsetX: 0,
                show: false,
            },
        },
        grid: {
            show: false,
            padding: {
                left: 0,
                right: 0,
                bottom: 0,
                top: 0
            }
        },
        colors: ['#03C977', '#03C977'],
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.0,
                opacityTo: 0.0,
                stops: [0, 80, 100]
            }
        },
        legend: {
            show: false,
        },
        tooltip: {
            enabled: false,
            x: {
                show: false,
            },
        },
    };

    var chart = new ApexCharts(document.querySelector("#dashboard-posts-chart"), options);
    chart.render();


    var options2 = {
        series: [{
            name: 'series1',
            data: [3, 20, 15, 40, 18, 200, 18, 53, 18, 35, 30, 95, 6]
        }],
        chart: {
            height: '100%',
            type: 'area',
            toolbar: {
                show: false
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },

        xaxis: {
            type: 'category',
            low: 0,
            offsetX: 0,
            offsetY: 0,
            show: false,
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec", "Jan"],
            labels: {
                low: 0,
                offsetX: 0,
                show: false,
            },
            axisBorder: {
                low: 0,
                offsetX: 0,
                show: false,
            },
        },
        markers: {
            strokeWidth: 3,
            colors: "#ffffff",
            strokeColors: ['#FF5B5B', '#FF5B5B'],
            hover: {
                size: 6,
            }
        },
        yaxis: {
            low: 0,
            offsetX: 0,
            offsetY: 0,
            show: false,
            labels: {
                low: 0,
                offsetX: 0,
                show: false,
            },
            axisBorder: {
                low: 0,
                offsetX: 0,
                show: false,
            },
        },
        grid: {
            show: false,
            padding: {
                left: 0,
                right: 0,
                bottom: 0,
                top: 0
            }
        },
        colors: ['#FF5B5B', '#FF5B5B'],
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.0,
                opacityTo: 0.0,
                stops: [0, 80, 100]
            }
        },
        legend: {
            show: false,
        },
        tooltip: {
            enabled: false,
            x: {
                show: false,
            },
        },
    };

    var chart = new ApexCharts(document.querySelector("#dashboard-courses-chart"), options2);
    chart.render();


    var options3 = {
        series: [{
            name: 'series1',
            data: [3, 20, 15, 40, 18, 200, 18, 53, 18, 35, 30, 95, 6]
        }],
        chart: {
            height: '100%',
            type: 'area',
            toolbar: {
                show: false
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },

        xaxis: {
            type: 'category',
            low: 0,
            offsetX: 0,
            offsetY: 0,
            show: false,
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec", "Jan"],
            labels: {
                low: 0,
                offsetX: 0,
                show: false,
            },
            axisBorder: {
                low: 0,
                offsetX: 0,
                show: false,
            },
        },
        markers: {
            strokeWidth: 3,
            colors: "#ffffff",
            strokeColors: ['#795BF1', '#795BF1'],
            hover: {
                size: 6,
            }
        },
        yaxis: {
            low: 0,
            offsetX: 0,
            offsetY: 0,
            show: false,
            labels: {
                low: 0,
                offsetX: 0,
                show: false,
            },
            axisBorder: {
                low: 0,
                offsetX: 0,
                show: false,
            },
        },
        grid: {
            show: false,
            padding: {
                left: 0,
                right: 0,
                bottom: 0,
                top: 0
            }
        },
        colors: ['#795BF1', '#795BF1'],
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.0,
                opacityTo: 0.0,
                stops: [0, 80, 100]
            }
        },
        legend: {
            show: false,
        },
        tooltip: {
            enabled: false,
            x: {
                show: false,
            },
        },
    };

    var chart = new ApexCharts(document.querySelector("#dashboard-users-chart"), options3);
    chart.render();


    var options4 = {
        series: [{
            name: 'series1',
            data: [31, 40, 28, 51, 42, 109, 100]
        }, {
            // name: 'series2',
            data: [11, 32, 45, 32, 34, 52, 41]
        }],
        markers: {
            strokeWidth: 3,
            colors: "#ffffff",
            strokeColors: ['#03C977', '#FFBB54'],
            hover: {
                size: 6,
            }
        },
        colors: ['#03C977', '#FFBB54'],
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.0,
                opacityTo: 0.0,
                stops: [0, 80, 100]
            }
        },
        chart: {
            height: 350,
            type: 'area'
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        xaxis: {
            type: 'datetime',
            categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
        },
        tooltip: {
            x: {
                format: 'dd/MM/yy HH:mm'
            },
        },
    };

    var chart = new ApexCharts(document.querySelector("#dashboard-smooth-chart"), options4);
    chart.render();











    let serverChart = {
        graphset: [{
            type: 'bar',
            // title: {
            //     text: 'Stacked Bar Chart',
            //     color: '#5D7D9A',
            //     align: 'left',
            //     padding: '30 0 0 35'
            // },
            // subtitle: {
            //     text: 'Lets you stack multiple data sets on top of each other.',
            //     color: '#5D7D9A',
            //     fontWeight: 300,
            //     align: 'left',
            //     padding: '35 0 0 35'
            // },
            tooltip: {
                visible: false
            },
            crosshairX: {
                plotLabel: {
                    fontColor: '#333',
                    backgroundColor: '#fff',
                    borderRadius: 5,
                    borderColor: '#EEE',
                    padding: 10
                },
                scaleLabel: {
                    alpha: 0,
                    text: '%v',
                    transform: {
                        type: 'date',
                        all: '%M %d, %Y<br>%g:%i %a'
                    },
                    fontFamily: 'Georgia'
                }
            },
            plotarea: {
                margin: '130 10 90 60'
            },
            // legend: {
            //     layout: '3x2',
            //     align: 'right',
            //     verticalAlign: 'top',
            //     margin: '5 20 0 0',
            //     padding: '5px',
            //     borderRadius: '5px',
            //     header: {
            //         text: 'Legend',
            //         color: '#5D7D9A',
            //         padding: '10px'
            //     },
            //     item: {
            //         color: '#5D7D9A'
            //     }
            // },
            scaleX: {
                // labels: ['North 1', 'North 2', 'South 1', 'South 2', 'East 1', 'East 2', 'West 1'],
                // label: {
                //     color: '#6C6C6C',
                //     // text: '<br>Server Building Location'
                // },
                lineColor: '#D8D8D8',
                tick: {
                    visible: false,
                    _lineColor: '#D8D8D8'
                },
                item: {
                    color: '#6C6C6C',
                    angle: '-35'
                },

            },
            plot: {
                stacked: true,
                barWidth: '25%'
            },
            scaleY: {
                lineColor: '#D8D8D8',
                guide: {
                    lineStyle: 'solid'
                },
                tick: {
                    lineColor: '#D8D8D8'
                },
                item: {
                    color: '#6C6C6C'
                },
                // label: {
                //     padding: '20 0 0 0',
                //     text: 'Server CPU Usage %',
                //     color: '#6C6C6C'
                // },
                values: '0:100:20'
            },
            series: [{
                values: [19, 29, 22, 15, 20, 21, 19],
                lineColor: '#03C977',
                backgroundColor: '#01a3f4',
                marker: {
                    backgroundColor: '#01a3f4',
                    borderColor: '#03C977'
                }
            },
            {
                values: [16, 14, 8, 20, 17, 22, 24],
                lineColor: '#03C977',
                backgroundColor: '#99d1ee',
                marker: {
                    backgroundColor: '#99d1ee',
                    borderColor: '#03C977'
                }
            },
            {
                values: [19, 12, 15, 14, 20, 12, 16],
                lineColor: '#295A73',
                backgroundColor: '#295A73',
                marker: {
                    backgroundColor: '#295A73',
                    borderColor: '#295A73'
                }
            },
            {
                values: [12, 17, 17, 15, 24, 19, 8],
                lineColor: '#5cd6fa',
                backgroundColor: '#5cd6fa',
                marker: {
                    backgroundColor: '#5cd6fa',
                    borderColor: '#5cd6fa'
                }
            },
            {
                values: [13, 12, 20, 20, 14, 16, 15],
                lineColor: '#156eb0',
                backgroundColor: '#156eb0',
                marker: {
                    backgroundColor: '#156eb0',
                    borderColor: '#156eb0'
                }
            },
            {
                values: [21, 16, 18, 16, 5, 10, 18],
                lineColor: '#45d7c5',
                backgroundColor: 'transparent',
                marker: {
                    backgroundColor: 'transparent',
                    borderColor: '#45d7c5'
                }
            }
            ]
        }]
    };

    // render chart
    zingchart.render({
        id: 'graphChart',
        data: serverChart,
        height: '400px',
        width: '100%'
    });
    /* -------------------------------------------------------------------------- */
    /*                                     lol                                    */
    /* -------------------------------------------------------------------------- */


    // market value chart
    var options1 = {
        chart: {
            height: 380,
            type: 'bar',
            toolbar: {
                show: false
            },
        },
        series: [{
            name: 'Net Profit',
            data: [44, 55, 57, 56, 61, 58]
        }, {
            name: 'Revenue',
            data: [76, 85, 101, 98, 87, 105]
        }],
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: ['30%'],
                endingShape: 'rounded'
            },
        },
        xaxis: {
            categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false
            },
            labels: {
                style: {
                    fontSize: '12px'
                }
            }
        },
        // colors: ["#F65365", "#E5EAEE"],

        markers: {
            size: 6,
            colors: ['#fff'],
            strokeColor: "#F65365",
            strokeWidth: 3,
        },
        legend: {
            show: false
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        states: {
            normal: {
                filter: {
                    type: 'none',
                    value: 0
                }
            },
            hover: {
                filter: {
                    type: 'none',
                    value: 0
                }
            },
            active: {
                allowMultipleDataPointsSelection: false,
                filter: {
                    type: 'none',
                    value: 0
                }
            }
        },
        grid: {
            borderColor: "#FFCCD2",
            strokeDashArray: 4,
            yaxis: {
                lines: {
                    show: true
                }
            }
        },
        fill: {
            colors: [function ({ value, seriesIndex, w }) {
                if (value < 55) {
                    return '#7E36AF'
                } else if (value >= 55 && value < 80) {
                    return '#164666'
                } else {
                    return '#D9534F'
                }
            }],
            type: [function ({ value, seriesIndex, w }) {
                if (value < 55) {
                    return 'pattern'
                } else if (value >= 55 && value < 80) {
                    return 'pattern'
                } else {
                    return 'pattern'
                }
            }],
            // pattern: {
            //     style: [function ({ value, seriesIndex, w, }) {
            //         if (value < 55) {
            //             return ['circles', 'slantedLines', 'verticalLines']
            //         } else {
            //             return []
            //         }
            //     }],

            // },
        }
    }


    // earning chart

    var myConfigers = {
        "type": "bar",
        backgroundColor: "transparent",
        scaleY: {
            lineColor: 'none',
            tick: {
                visible: false
            },
            guide: {
                visible: false
            },
            item: {
                visible: false,

            }
        },


        "plot": {
            rules: [{
                rule: '"%v" == "40"',
                "gradientColors": "#fff #cbc3e3 #fff #cbc3e3 #fff #cbc3e3 #fff #cbc3e3 #fff #cbc3e3",
                gradientStops: "0.1 0.2 0.3 0.4 0.5 0.6 0.7 0.8 0.9 1.0",
            },
            {
                rule: '"%v" == "25"',
                // rule: '%v = 22 && %v = 22',
                backgroundColor: "rgba(171, 84, 219, 1)",
            },
            {
                rule: '"%v" !== "25" && "%v" !== "40"',
                // rule: '%v = 22 && %v = 22',
                backgroundColor: "rgba(171, 84, 219, 0.15)",
            },
            ],
            // "barmax-width": "40px",
            // "backgroundColor": "rgba(171, 84, 219, 0.15)",
            borderRadius: 10,
            "tooltip": {
                "font-color": "#fff",
                // "font-family": "Arial",
                "font-size": "18px",
                "font-weight": "600",
                // "border-radius": "16px",
                // "shadow": false,
                // "box-shadow": "0 2px 4px 0px solid gray",
                // "padding": "15px 30px",
                "backgroundColor": "rgba(255,255,255,0)",
                "borderWidth": "0px",
                "shadow": false,
                // "height": "50px",
                // "width": "0px",
                // "padding": "0px",

                "text": "<div  class='tools' style='font-size: 18px; font-weight: 600'>$%v</div>",
                "html-mode": true
            },
            "hover-state": {
                "background-color": "rgba(171, 84, 219, 1)"
            }


        },
        "scale-x": {
            label: {
                backgroundColor: '#ffe6e6',
                borderColor: 'red',
                borderRadius: 3,
                borderWidth: 1,
                fontColor: 'red',
                fontFamily: 'Georgia',
                fontSize: 16,
                fontStyle: 'normal',
                fontWeight: 'normal',
                padding: '5px 20px'
            },
            tick: {
                lineColor: '#fff',
            },
            lineColor: '#fff',
            "labels": ["Mon", "Tue", "Wed", "Thur", "Fri", "Sat", "Sun"],
            item: {
                color: '#A3A3A3',
                rules: [{
                    rule: '"%v" == "25"',
                    color: "blue"
                }],
            },
            labelColor: 'red',
        },
        "scale-y": {
            "values": "0:20:5"
        },

        "series": [{
            "values": [22, 70, 51, 05, 25, 8, 40],
        }],


    };

    zingchart.render({
        id: "dashboard-earning-bar-chart",
        data: myConfigers,
        height: "100%",
        width: "100%"
    });


    var myConfigers = {
        "type": "bar",
        scaleY: {
            lineColor: 'none',
            tick: {
                visible: false
            },
            guide: {
                visible: false
            },
            item: {
                visible: false,

            }
        },


        "plot": {
            rules: [{
                rule: '"%v" == "40"',
                "gradientColors": "#fff #cbc3e3 #fff #cbc3e3 #fff #cbc3e3 #fff #cbc3e3 #fff #cbc3e3",
                gradientStops: "0.1 0.2 0.3 0.4 0.5 0.6 0.7 0.8 0.9 1.0",
            },
            {
                rule: '"%v" == "25"',
                // rule: '%v = 22 && %v = 22',
                backgroundColor: "rgba(171, 84, 219, 1)",
            },
            {
                rule: '"%v" !== "25" && "%v" !== "40"',
                // rule: '%v = 22 && %v = 22',
                backgroundColor: "rgba(171, 84, 219, 0.15)",
            },
            ],
            // "bar-max-width": "40px",
            // "backgroundColor": "rgba(171, 84, 219, 0.15)",
            borderRadius: 10,
            "tooltip": {
                "font-color": "#fff",
                // "font-family": "Arial",
                "font-size": "18px",
                "font-weight": "600",
                // "border-radius": "16px",
                // "shadow": false,
                // "box-shadow": "0 2px 4px 0px solid gray",
                // "padding": "15px 30px",
                "backgroundColor": "rgba(255,255,255,0)",
                "borderWidth": "0px",
                "shadow": false,
                // "height": "50px",
                // "width": "0px",
                // "padding": "0px",

                "text": "<div  class='tools' style='font-size: 18px; font-weight: 600'>$%v</div>",
                "html-mode": true
            },
            "hover-state": {
                "background-color": "rgba(171, 84, 219, 1)"
            }


        },
        "scale-x": {
            label: {
                backgroundColor: '#ffe6e6',
                borderColor: 'red',
                borderRadius: 3,
                borderWidth: 1,
                fontColor: 'red',
                fontFamily: 'Georgia',
                fontSize: 16,
                fontStyle: 'normal',
                fontWeight: 'normal',
                padding: '5px 20px'
            },
            tick: {
                lineColor: '#fff',
            },
            lineColor: '#fff',
            "labels": ["Mon", "Tue", "Wed", "Thur", "Fri", "Sat", "Sun"],
            item: {
                color: '#A3A3A3',
                rules: [{
                    rule: '"%v" == "25"',
                    color: "blue"
                }],
            },
            labelColor: 'red',
        },
        "scale-y": {
            "values": "0:20:5"
        },

        "series": [{
            "values": [22, 70, 51, 05, 25, 8, 40],
        }],


    };
    var meetingOptions = {
        "type": "bar",
        scaleY: {
            lineColor: 'none',
            tick: {
                visible: false
            },
            guide: {
                visible: false
            },
            item: {
                visible: false,

            }
        },


        "plot": {
            rules: [{
                rule: '"%v" == "40"',
                "gradientColors": "#fff #cbc3e3 #fff #cbc3e3 #fff #cbc3e3 #fff #cbc3e3 #fff #cbc3e3",
                gradientStops: "0.1 0.2 0.3 0.4 0.5 0.6 0.7 0.8 0.9 1.0",
            },
            {
                rule: '"%v" == "25"',
                // rule: '%v = 22 && %v = 22',
                backgroundColor: "rgba(171, 84, 219, 1)",
            },
            {
                rule: '"%v" !== "25" && "%v" !== "40"',
                // rule: '%v = 22 && %v = 22',
                backgroundColor: "rgba(171, 84, 219, 0.15)",
            },
            ],
            // "bar-max-width": "40px",
            // "backgroundColor": "rgba(171, 84, 219, 0.15)",
            borderRadius: 10,
            "tooltip": {
                "font-color": "#fff",
                // "font-family": "Arial",
                "font-size": "18px",
                "font-weight": "600",
                // "border-radius": "16px",
                // "shadow": false,
                // "box-shadow": "0 2px 4px 0px solid gray",
                // "padding": "15px 30px",
                "backgroundColor": "rgba(255,255,255,0)",
                "borderWidth": "0px",
                "shadow": false,
                // "height": "50px",
                // "width": "0px",
                // "padding": "0px",

                "text": "<div  class='tools' style='font-size: 18px; font-weight: 600'>$%v</div>",
                "html-mode": true
            },
            "hover-state": {
                "background-color": "rgba(171, 84, 219, 1)"
            }


        },
        "scale-x": {
            label: {
                backgroundColor: '#ffe6e6',
                borderColor: 'red',
                borderRadius: 3,
                borderWidth: 1,
                fontColor: 'red',
                fontFamily: 'Georgia',
                fontSize: 16,
                fontStyle: 'normal',
                fontWeight: 'normal',
                padding: '5px 20px'
            },
            tick: {
                lineColor: '#fff',
            },
            lineColor: '#fff',
            "labels": ["Mon", "Tue", "Wed", "Thur", "Fri", "Sat", "Sun"],
            item: {
                color: '#A3A3A3',
                rules: [{
                    rule: '"%v" == "25"',
                    color: "blue"
                }],
            },
            labelColor: 'red',
        },
        "scale-y": {
            "values": "0:20:5"
        },

        "series": [{
            "values": [22, 70, 51, 05, 25, 8, 40],
        }],


    };
    zingchart.render({
        id: "meetings-bar-chart",
        data: meetingOptions,
        height: "100%",
        width: "100%"
    });






    var myConfig = {
        "type": "bar",
        scaleY: {
            lineColor: 'none',
            tick: {
                visible: false
            },
            guide: {
                visible: false
            },
            item: {
                visible: false,

            }
        },


        "plot": {
            rules: [{
                rule: '"%v" == "40"',
                "gradientColors": "#fff #cbc3e3 #fff #cbc3e3 #fff #cbc3e3 #fff #cbc3e3 #fff #cbc3e3",
                gradientStops: "0.1 0.2 0.3 0.4 0.5 0.6 0.7 0.8 0.9 1.0",
            },
            {
                rule: '"%v" == "25"',
                // rule: '%v = 22 && %v = 22',
                backgroundColor: "rgba(171, 84, 219, 1)",
            },
            {
                rule: '"%v" !== "25" && "%v" !== "40"',
                // rule: '%v = 22 && %v = 22',
                backgroundColor: "rgba(171, 84, 219, 0.15)",
            },
            ],
            // "bar-max-width": "40px",
            // "backgroundColor": "rgba(171, 84, 219, 0.15)",
            borderRadius: 10,
            "tooltip": {
                "font-color": "#fff",
                // "font-family": "Arial",
                "font-size": "18px",
                "font-weight": "600",
                // "border-radius": "16px",
                // "shadow": false,
                // "box-shadow": "0 2px 4px 0px solid gray",
                // "padding": "15px 30px",
                "backgroundColor": "rgba(255,255,255,0)",
                "borderWidth": "0px",
                "shadow": false,
                // "height": "50px",
                // "width": "0px",
                // "padding": "0px",

                "text": "<div  class='tools' style='font-size: 18px; font-weight: 600'>$%v</div>",
                "html-mode": true
            },
            "hover-state": {
                "background-color": "rgba(171, 84, 219, 1)"
            }


        },
        "scale-x": {
            label: {
                backgroundColor: '#ffe6e6',
                borderColor: 'red',
                borderRadius: 3,
                borderWidth: 1,
                fontColor: 'red',
                fontFamily: 'Georgia',
                fontSize: 16,
                fontStyle: 'normal',
                fontWeight: 'normal',
                padding: '5px 20px'
            },
            tick: {
                lineColor: '#fff',
            },
            lineColor: '#fff',
            "labels": ["Mon", "Tue", "Wed", "Thur", "Fri", "Sat", "Sun"],
            item: {
                color: '#A3A3A3',
                rules: [{
                    rule: '"%v" == "25"',
                    color: "blue"
                }],
            },
            labelColor: 'red',
        },
        "scale-y": {
            "values": "0:20:5"
        },

        "series": [{
            "values": [22, 70, 51, 05, 25, 8, 40],
        }],


    };

    zingchart.render({
        id: "dashboard-earning-bars-chart",
        data: myConfig,
        height: "100%",
        width: "100%"
    });





    let chartConfig = {

        graphset: [{
            type: 'ring',

            backgroundColor: 'transparent',

            plot: {
                backgroundColor: 'transparent',
                borderWidth: '0px',

                slice: '60%',

                valueBox: {
                    visible: false,
                }
            },
            series: [{
                values: [parseInt(config.chartData.completeTime)],
                backgroundColor: '#03C977',
                lineColor: '#00BAF2',
                lineWidth: '1px',

            }, {
                // text: '+0.5%',
                values: [parseInt(config.chartData.pendingTime)],
                backgroundColor: '#FFB45C',
                lineColor: '#E80C60',
                lineWidth: '1px',

            }, {
                // text: '+1.5%',
                values: [parseInt(config.chartData.ScheduleTime)],
                backgroundColor: '#A29FA9',
                lineColor: '#9B26AF',
                lineWidth: '1px',

            }]
        }]
    };

    zingchart.render({
        id: 'donutChart',
        data: chartConfig,
        height: '180px',
        width: '100%',
    });


    // donut
    var donutOptions = {

        chart: {
            height: 350,
            type: 'area',
        },


        // title: {

        //     align: 'left',
        //     margin: 10,
        //     offsetX: 0,
        //     offsetY: 0,
        //     floating: false,
        //     style: {
        //         fontSize: '24px',
        //         color: '#BADA55'

        //     },

        // },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        series: [{
            name: 'series1',
            data: [0, 30, 10, 40, 20, 30, 10]
        }],


        theme: {

            palette: 'palette4',
            monochrome: {
                enabled: true,
                color: '#00A389',
                shadeTo: false,
                shadeIntensity: false
            },

        },

        chart: {
            id: 'vuechart-example',
            toolbar: {
                show: false
            },
        },
        legend: {
            show: true
        },
        grid: {
            borderColor: 'whitesmoke',
            xaxis: {
                lines: {
                    show: true

                }
            },
            yaxis: {
                lines: {
                    show: false
                }
            },

            column: {

                colors: ['transparent'],


            },
        },
        xaxis: {
            labels: {
                show: true,
                style: {
                    color: '#A3A3A3',
                    fontSize: '9px'
                }
            },
            axisBorder: {
                show: false
            },
            axisTicks: {
                show: false,
            },
            categories: ["Sep,10", "Sep,11", "Sep,12", "Sep,13", "Sep,14", "Sep,15"],

        },
        yaxis: {
            labels: {
                show: true,
                style: {
                    color: '#A3A3A3',
                    fontSize: '9px',
                }
            }
        },

        tooltip: {
            enabled: true,
            shared: false,
            fillSeriesColor: true
        },

    }

    var chart = new ApexCharts(
        document.querySelector(".curve-chart"),
        donutOptions
    );

    chart.render();


    // var donutOpt = {

    //     chart: {
    //         height: 350,
    //         type: 'area',
    //     },

    //     dataLabels: {
    //         enabled: false
    //     },
    //     stroke: {
    //         curve: 'smooth'
    //     },
    //     series: [{
    //         name: 'series1',
    //         data: [0, 30, 10, 40, 20, 30, 10]
    //     }],


    //     theme: {

    //         palette: 'palette4',
    //         monochrome: {
    //             enabled: true,
    //             color: '#795BF1',
    //             shadeTo: true,
    //             shadeIntensity: false,

    //         },

    //     },

    //     chart: {
    //         id: 'vuechart-example',
    //         toolbar: {
    //             show: false
    //         },

    //     },

    //     legend: {
    //         show: true
    //     },
    //     grid: {
    //         borderColor: 'whitesmoke',
    //         xaxis: {
    //             lines: {
    //                 show: true

    //             }
    //         },
    //         yaxis: {
    //             lines: {
    //                 show: false
    //             }
    //         },


    //     },
    //     xaxis: {
    //         labels: {
    //             show: false,
    //             style: {
    //                 color: '#A3A3A3',
    //                 fontSize: '9px'
    //             }
    //         },
    //         axisBorder: {
    //             show: false
    //         },
    //         axisTicks: {
    //             show: false,
    //         },
    //         categories: ["Sep,10", "Sep,11", "Sep,12", "Sep,13", "Sep,14", "Sep,15"],

    //     },
    //     yaxis: {
    //         labels: {
    //             show: false,
    //             style: {
    //                 color: '#A3A3A3',
    //                 fontSize: '9px',
    //             }
    //         }
    //     },

    //     tooltip: {
    //         enabled: true,
    //         shared: false,
    //         fillSeriesColor: true
    //     },

    // }

    // var chart = new ApexCharts(
    //     document.querySelector(".curves-chart"),
    //     donutOpt
    // );
    // chart.render();

    var optionsGet = {
        stroke: {
            curve: 'smooth'
        },
        colors: ['#795BF1', '#795BF1'],
        // fill: {
        //     type: 'gradient',
        //     gradient: {
        //         shadeIntensity: 1,
        //         opacityFrom: 0.10,
        //         opacityTo: 0.10,
        //         stops: [0, 80, 100]
        //     }
        // },
        series: [{
            name: 'series1',
            data: [0, 30, 10, 40, 20, 30, 10]
        }],
        grid: {
            borderColor: 'whitesmoke',
            xaxis: {
                lines: {
                    show: true

                }
            },
            yaxis: {
                lines: {
                    show: false
                }
            },


        },

        chart: {
            height: 150,
            type: 'area',
            id: 'vuechart-example',
            toolbar: {
                show: false
            },

        },

        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        xaxis: {
            labels: {
                show: false,
                style: {
                    color: '#A3A3A3',
                    fontSize: '9px'
                }
            },
            axisBorder: {
                show: false
            },
            axisTicks: {
                show: false,
            },
            categories: ["Sep,10", "Sep,11", "Sep,12", "Sep,13", "Sep,14", "Sep,15"],

        },
        yaxis: {
            labels: {
                show: false,
                style: {
                    color: '#A3A3A3',
                    fontSize: '9px',
                }
            }
        },
        tooltip: {
            x: {
                format: 'dd/MM/yy HH:mm'
            },
        },
    };

    var chart = new ApexCharts(document.querySelector("#chartCurve"), optionsGet);
    chart.render();


    // dashboard donut chart///

    let dashboardDonutChartOptions = {

        graphset: [{
            type: 'ring',
            backgroundColor: 'transparent',
            // title: {
            //     text: 'Monthly Page Views',
            //     padding: '15px',
            //     fontColor: '#1E5D9E',
            //     fontFamily: 'Lato',
            //     fontSize: '14px'
            // },
            // subtitle: {
            //     text: '06/10/20 - 07/11/20',
            //     padding: '5px',
            //     fontColor: '#777',
            //     fontFamily: 'Lato',
            //     fontSize: '12px'
            // },
            legend: {
                adjustLayout: true,
                align: 'center',
                backgroundColor: '#FBFCFE',
                borderWidth: '0px',
                item: {
                    cursor: 'pointer',
                    fontColor: '#777',
                    fontSize: '12px',
                    offsetX: '-6px'
                },
                marker: {
                    type: 'circle',
                    borderWidth: '0px',
                    cursor: 'pointer',
                    size: 5
                },
                mediaRules: [{
                    maxWidth: '500px',
                    visible: false
                }],
                toggleAction: 'remove',
                verticalAlign: 'bottom'
            },
            plot: {
                "plot": {
                    "slice": "50%"
                },
                valueBox: [{
                    type: 'all',
                    // text: '%t',
                    placement: 'out'

                },
                    // {
                    //     type: 'all',
                    //     text: '%npv%',
                    //     placement: 'in'
                    // }
                ],
                animation: {
                    effect: 'ANIMATION_EXPAND_VERTICAL',
                    sequence: 'ANIMATION_BY_PLOT_AND_NODE'
                },
                backgroundColor: '#FBFCFE',
                borderWidth: '0px',
                hoverState: {
                    cursor: 'hand',
                },
                slice: '60%'
            },
            plotarea: {
                margin: '70px 0px 10px 0px',
                backgroundColor: 'transparent',
                borderRadius: '10px',
                borderWidth: '0px'
            },
            scaleR: {
                refAngle: 270
            },
            // tooltip: {
            //     text: '<span style="color:%color">%npv%</span>',
            //     anchor: 'c',
            //     backgroundColor: 'none',
            //     borderWidth: '0px',
            //     fontSize: '12px',
            //     mediaRules: [{
            //         maxWidth: '500px',
            //         y: '54%'
            //     }],
            //     sticky: true,
            //     thousandsSeparator: ',',
            //     x: '50%',
            //     y: '50%'
            // },
            noData: {
                text: 'No Selection',
                alpha: .6,
                backgroundColor: '#20b2db',
                bold: true,
                fontSize: '18px',
                textAlpha: .9
            },
            series: [{
                // text: '+2.5%',
                values: [parseInt(config.chartData.completeTime)],
                backgroundColor: '#03C977',
                lineColor: '#00BAF2',
                lineWidth: '1px',
                marker: {
                    backgroundColor: '#00BAF2'
                }
            }, {
                // text: '+0.5%',
                values: [parseInt(config.chartData.pendingTime)],
                backgroundColor: '#FFB45C',
                lineColor: '#E80C60',
                lineWidth: '1px',
                marker: {
                    backgroundColor: '#E80C60'
                }
            }, {
                // text: '+1.5%',
                values: [parseInt(config.chartData.ScheduleTime)],
                backgroundColor: '#A29FA9',
                lineColor: '#9B26AF',
                lineWidth: '1px',
                marker: {
                    backgroundColor: '#9B26AF'
                }
            }]
        }]
    };

    zingchart.render({
        id: 'dashboard-donut-chart',
        data: dashboardDonutChartOptions,
        height: '500px',
        width: '100%',
    });
});