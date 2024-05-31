<div class="py-12">
    <div class="mx-auto sm:px-6 lg:px-8">

        <head>
            <style>
                #Entradas {
                    width: 100%;
                    height: 500px;
                    max-width: 100%
                }
            </style>


        </head>

        <body>
            <div class="bg-white shadow-sm dark:bg-gray-900 sm:rounded-lg">
                <div class="p-6 text-gray-900 overflow-clip dark:text-gray-100">
                    <h1 class="text-2xl">Entradas de Hoje </h1>
                    <div id="Entradas"></div>
                </div>
            </div>
            <script>
                am5.ready(function() {


                    // Create root element
                    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
                    var rootHoje = am5.Root.new("Entradas");


                    // Set themes
                    // https://www.amcharts.com/docs/v5/concepts/themes/
                    rootHoje.setThemes([
                        am5themes_Animated.new(rootHoje)
                    ]);


                    // Create chart
                    // https://www.amcharts.com/docs/v5/charts/xy-chart/
                    var chartHoje = rootHoje.container.children.push(am5xy.XYChart.new(rootHoje, {
                        panX: true,
                        panY: true,
                        wheelX: "panX",
                        wheelY: "zoomX",
                        pinchZoomX: true,
                        paddingLeft: 0
                    }));


                    // Add cursor
                    // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
                    var cursorHoje = chartHoje.set("cursor", am5xy.XYCursor.new(rootHoje, {
                        behavior: "none"
                    }));
                    cursorHoje.lineY.set("visible", false);


                    // // // Generate random data
                    var date = new Date();
                    date.setHours(0, 0, 0, 0);
                    var value = 100;

                   
                    function generateData() {
                        value = Math.round((Math.random() * 10 - 5) + value);
                        am5.time.add(date, "day", 1);
                        // console.log(date);
                        return {
                            date: date.getTime(),
                            value: value
                        };
                    }
                    
                    function generateDatas(values) {
                      var data = [];
                    //   for (var i = 0; i < count; ++i) {
                    //     data.push(generateData());
                    //   }

                        values.forEach(element => {
                            var date = new Date(element.date)
                            
                            data.push({
                                date: date.getTime(),
                                value: element.value
                            })
                        });
                      return data;
                    }

                    // Create axes
                    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
                    var xAxisHoje = chartHoje.xAxes.push(am5xy.DateAxis.new(rootHoje, {
                        maxDeviation: 0.2,
                        baseInterval: {
                            timeUnit: "hour",
                            count: 1
                        },
                        renderer: am5xy.AxisRendererX.new(rootHoje, {
                            minorGridEnabled: true
                        }),
                        tooltip: am5.Tooltip.new(rootHoje, {})
                    }));

                    var yAxisHoje = chartHoje.yAxes.push(am5xy.ValueAxis.new(rootHoje, {
                        renderer: am5xy.AxisRendererY.new(rootHoje, {
                            pan: "zoom"
                        })
                    }));


                    // Add series
                    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
                    var seriesHoje = chartHoje.series.push(am5xy.LineSeries.new(rootHoje, {
                        name: "Series",
                        xAxis: xAxisHoje,
                        yAxis: yAxisHoje,
                        valueYField: "value",
                        valueXField: "date",
                        tooltip: am5.Tooltip.new(rootHoje, {
                            labelText: "{valueY}"
                        })
                    }));


                    // Add scrollbar
                    // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
                    chartHoje.set("scrollbarX", am5.Scrollbar.new(rootHoje, {
                        orientation: "horizontal"
                    }));


                    // Set data
                    var data = generateDatas({!!$Graf!!});
                    seriesHoje.data.setAll(data);

                    // Make stuff animate on load
                    // https://www.amcharts.com/docs/v5/concepts/animations/
                    seriesHoje.appear(1000);
                    chartHoje.appear(1000, 100);

                }); // end am5.ready()
            </script>
        </body>
    </div>
</div>
