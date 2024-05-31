<div class="py-12">
    <div class="mx-auto sm:px-6 lg:px-8">

        <head>
            <style>
                #Entradasdiv {
                    width: 100%;
                    height: 500px;
                }
            </style>

            <!-- Resources -->
            
            <!-- Chart code -->
            
            
        </head>

        <body>
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-900 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- {{$EntradasData}} --}}
                    <h1 class="mb-2 text-2xl">Entradas de {{$mesEsc}}</h1>
                    {{-- <select wire:model.live='mes' wire:change='$dispatch("dataUpdate")' class="border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                        <option value="01">Janeirio</option>
                        <option value="02">Fevereiro</option>
                        <option value="03">Março</option>
                        <option value="04">Abril</option>
                        <option value="05">Maio</option>
                        <option value="06">Junho</option>
                        <option value="07">Julho</option>
                        <option value="08">Agosto</option>
                        <option value="09">Setembro</option>
                        <option value="10">Outubro</option>
                        <option value="11">Novembro</option>
                        <option value="12">Dezembro</option>
                    </select>
                    {{$mes}}
                    <select wire:model.live='ano' wire:change='$dispatch("dataUpdate")' class="border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                    @foreach ($anos as $item)
                        @foreach ($item as $value)
                        <option value="{{$value}}">{{$value}} </option>
                        @endforeach
                    @endforeach
                    </select>
                    {{$ano}} --}} 
                    <div id="Entradasdiv"></div>
                </div>
            </div>
            
            <script>

                var rootEntrada; 
                var dataEntradas;
                
                
                am5.ready( function () {
                    
                    
                        
                        // Create root element
                        // https://www.amcharts.com/docs/v5/getting-started/#Root_element
                        rootEntradas = am5.Root.new("Entradasdiv");

                        // Set themes
                        // https://www.amcharts.com/docs/v5/concepts/themes/
                        rootEntradas.setThemes([
                            am5themes_Animated.new(rootEntradas),
                            am5themes_Responsive.new(rootEntradas),
                            am5themes_Dark.new(rootEntradas)
                        ]);


                        // Create chart
                        // https://www.amcharts.com/docs/v5/charts/xy-chart/
                        var chartEntradas = rootEntradas.container.children.push(am5xy.XYChart.new(rootEntradas, {
                            panX: false,
                            panY: false,
                            paddingLeft: 0,
                            wheelX: "panX",
                            wheelY: "zoomX",
                            layout: rootEntradas.verticalLayout
                        }));


                        // Add legend
                        // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
                        var legendEntradas = chartEntradas.children.push(
                            am5.Legend.new(rootEntradas, {
                                centerX: am5.p50,
                                x: am5.p50
                            })
                        );

                        
                        dataEntradas = {!!$EntradasData!!};

                        // Create axes
                        // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
                        var xRendererEntradas = am5xy.AxisRendererX.new(rootEntradas, {
                            cellStartLocation: 0.1,
                            cellEndLocation: 0.9,
                            minorGridEnabled: true
                        })

                        var xAxisEntradas = chartEntradas.xAxes.push(am5xy.CategoryAxis.new(rootEntradas, {
                            categoryField: "semana",
                            renderer: xRendererEntradas,
                            tooltip: am5.Tooltip.new(rootEntradas, {})
                        }));

                        xRendererEntradas.grid.template.setAll({
                            location: 1
                        })

                        xAxisEntradas.data.setAll(dataEntradas);

                        var yAxisEntradas = chartEntradas.yAxes.push(am5xy.ValueAxis.new(rootEntradas, {
                            renderer: am5xy.AxisRendererY.new(rootEntradas, {
                                strokeOpacity: 0.1
                            })
                        }));


                        // Add series
                        // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
                        function makeSeries(name, fieldName) {
                            

                            var seriesEntradas = chartEntradas.series.push(am5xy.ColumnSeries.new(rootEntradas, {
                                name: name,
                                xAxis: xAxisEntradas,
                                yAxis: yAxisEntradas,
                                valueYField: fieldName,
                                categoryXField: "semana",
                                dateField: "data"
                            }));
                            

                            seriesEntradas.columns.template.setAll({
                                tooltipText: "{name} {date}:{valueY}",
                                width: am5.percent(90),
                                tooltipY: 0,
                                strokeOpacity: 0
                            });
                            
                            seriesEntradas.data.setAll(dataEntradas);

                            // Make stuff animate on load
                            // https://www.amcharts.com/docs/v5/concepts/animations/
                            seriesEntradas.appear();

                            seriesEntradas.bullets.push(function() {
                                return am5.Bullet.new(rootEntradas, {
                                    locationY: 0,
                                    sprite: am5.Label.new(rootEntradas, {
                                        text: "{valueY}",
                                        fill: rootEntradas.interfaceColors.get("alternativeText"),
                                        centerY: 0,
                                        centerX: am5.p50,
                                        populateText: true
                                    })
                                });
                            });

                            legendEntradas.data.push(seriesEntradas);
                        }

                        makeSeries("Segunda-Feira", "2");
                        makeSeries("Terça-Feira", "3");
                        makeSeries("Quarta-Feira", "4");
                        makeSeries("Quinta-Feira", "5");
                        makeSeries("Sexta-Feira", "6");
                        makeSeries("Sabado", "7");

                        // Make stuff animate on load
                        // https://www.amcharts.com/docs/v5/concepts/animations/
                        chartEntradas.appear(1000, 100);

                }); // end am5.ready()
                
            </script>
        </body>
    </div>
</div>
