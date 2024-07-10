<div class="py-12">
    <div class="mx-auto sm:px-6 lg:px-8">

        <head>
            <style>
                #Pagdiv {
                    width: 100%;
                    height: 550px;
                }
            </style>

            <!-- Resources -->


            <!-- Chart code -->
            <script>
                am5.ready(function() {
                    // Create root element
                    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
                    var rootPag = am5.Root.new("Pagdiv");



                    // Set themes
                    // https://www.amcharts.com/docs/v5/concepts/themes/
                    rootPag.setThemes([
                        am5themes_Animated.new(rootPag),
                        am5themes_Dark.new(rootPag),
                    ]);



                    // Create chart
                    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
                    var chartPag = rootPag.container.children.push(
                        am5percent.PieChart.new(rootPag, {
                            endAngle: 270,
                        })
                    );

                    chartPag._settings.paddingTop = -100;

                    // Create series
                    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
                    var seriesPag = chartPag.series.push(
                        am5percent.PieSeries.new(rootPag, {
                            valueField: "value",
                            categoryField: "category",
                            legendLabelText: "[{fill}]{category}[/]",
                            legendValueText: "[bold {fill}]{value}[/]",
                            endAngle: 270
                        })
                    );

                    seriesPag.get("colors").set("colors", [
                        am5.color(0x00D900),
                        am5.color(0xE1E100),
                        am5.color(0xD00000),
                    ]);



                    seriesPag.states.create("hidden", {
                        endAngle: -90
                    });


                    // Set data
                    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
                    seriesPag.data.setAll({!! $PagData !!});
                    seriesPag.labels.template.set("forceHidden", true);
                    seriesPag.ticks.template.set("forceHidden", true);


                    var legendPag = chartPag.children.push( 
                        am5.Legend.new(rootPag, {
                            centerY: am5.percent(50),
                            y: am5.percent(80),
                            layout: rootPag.verticalLayout,
                        })
                    );

                    legendPag.data.setAll(seriesPag.dataItems);

                    seriesPag.appear(1000, 100);

                }); // end am5.ready()
            </script>
        </head>

        <body>
            <div class="bg-white shadow-sm dark:bg-gray-900 sm:rounded-lg">
                <div class="p-6 text-gray-900 overflow-clip dark:text-gray-100">
                    <h1 class="text-2xl">Pagamentos de {{$mesEsc}} </h1>
                    <div id="Pagdiv"></div>
                </div>
            </div>
        </body>
    </div>
</div>
