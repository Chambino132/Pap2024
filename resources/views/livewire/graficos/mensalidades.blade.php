<div class="py-12">
    <div class="mx-auto sm:px-6 lg:px-8">

        <head>
            <style>
                #Mendiv {
                  width: 100%;
                  height: 500px;
                }
                </style>
                
                <!-- Chart code -->
                <script>
                am5.ready(function() {
                
                
                // Create root element
                // https://www.amcharts.com/docs/v5/getting-started/#Root_element
                var rootMen = am5.Root.new("Mendiv");
                
                // Set themes
                // https://www.amcharts.com/docs/v5/concepts/themes/
                rootMen.setThemes([
                    am5themes_Animated.new(rootMen),
                    am5themes_Dark.new(rootMen),
                ]);
                
                // Create chart
                // https://www.amcharts.com/docs/v5/charts/xy-chart/
                var chartMen = rootMen.container.children.push(
                  am5xy.XYChart.new(rootMen, {
                    panX: false,
                    panY: false,
                    wheelX: "panX",
                    wheelY: "zoomX",
                    paddingLeft: 0,
                    layout: rootMen.verticalLayout
                  })
                );
                
                // Add scrollbar
                // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
                chartMen.set(
                  "scrollbarX",
                  am5.Scrollbar.new(rootMen, {
                    orientation: "horizontal"
                  })
                );
                
                
                // Create axes
                // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
                var xRendererMen = am5xy.AxisRendererX.new(rootMen, {
                  minorGridEnabled: true,
                  minGridDistance: 60
                });
                var xAxisMen = chartMen.xAxes.push(
                  am5xy.CategoryAxis.new(rootMen, {
                    categoryField: "mensalidade",
                    renderer: xRendererMen,
                    tooltip: am5.Tooltip.new(rootMen, {})
                  })
                );
                xRendererMen.grid.template.setAll({
                  location: 1
                })
                
                xAxisMen.data.setAll({!!$menData!!});
                
                var yAxisMen = chartMen.yAxes.push(
                  am5xy.ValueAxis.new(rootMen, {
                    min: 0,
                    extraMax: 0.1,
                    renderer: am5xy.AxisRendererY.new(rootMen, {
                      strokeOpacity: 0.1
                    })
                  })
                );
                
                
                // Add series
                // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
                
                var series1Men = chartMen.series.push(
                  am5xy.ColumnSeries.new(rootMen, {
                    name: "Clientes",
                    xAxis: xAxisMen,
                    yAxis: yAxisMen,
                    valueYField: "clientes",
                    categoryXField: "mensalidade",
                    tooltip: am5.Tooltip.new(rootMen, {
                      pointerOrientation: "horizontal",
                      labelText: "{name} in {categoryX}: {valueY} {info}"
                    })
                  })
                );
                
                series1Men.columns.template.setAll({
                  tooltipY: am5.percent(10),
                  templateField: "columnSettings"
                });
                
                series1Men.data.setAll({!!$menData!!});
                
                // var series2Men = chartMen.series.push(
                //   am5xy.LineSeries.new(rootMen, {
                //     name: "Expectativas",
                //     xAxis: xAxisMen,
                //     yAxis: yAxisMen,
                //     valueYField: "expectativa",
                //     categoryXField: "mensalidade",
                //     tooltip: am5.Tooltip.new(rootMen, {
                //       pointerOrientation: "horizontal",
                //       labelText: "{name} in {categoryX}: {valueY} {info}"
                //     })
                //   })
                // );
                
                // series2Men.strokes.template.setAll({
                //   strokeWidth: 3,
                //   templateField: "strokeSettings"
                // });
                
                
                // series2Men.data.setAll({!!$menData!!});
                
                // series2Men.bullets.push(function () {
                //   return am5.Bullet.new(rootMen, {
                //     sprite: am5.Circle.new(rootMen, {
                //       strokeWidth: 3,
                //       stroke: series2Men.get("stroke"),
                //       radius: 5,
                //       fill: rootMen.interfaceColors.get("background")
                //     })
                //   });
                // });
                
                chartMen.set("cursor", am5xy.XYCursor.new(rootMen, {}));
                
                // Add legend
                // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
                // var legendMen = chartMen.children.push(
                //   am5.Legend.new(rootMen, {
                //     centerX: am5.p50,
                //     x: am5.p50
                //   })
                // );
                // legendMen.data.setAll(chartMen.series.values);
                
                // Make stuff animate on load
                // https://www.amcharts.com/docs/v5/concepts/animations/
                chartMen.appear(1000, 100);
                series1Men.appear();
                
                
                }); // end am5.ready()
                </script>

        </head>

        <body>

            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-900 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="mb-2 text-2xl">Mensalidades</h1>
                    <div id="Mendiv"></div>
                </div>
            </div>

        </body>
    </div>
</div>
