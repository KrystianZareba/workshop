@extends('layouts.page')

@section('title')
    Statystyki
@endsection

@section('page-content')
    <div id="chart"></div>
@endsection

@section('scripts')
    <script>
        const options = {
            chart: {
                type: 'line',
                height: 500,
                events: {
                    scrolled: function(chartContext, {xaxis}) {
                        getChartData(xaxis.min - 1)
                    }
                }
            },
            dataLabels: {
                enabled: false
            },
            series: [],
            noData: {
                text: 'Wczytywanie...'
            }
        }

        const chart = new ApexCharts(document.querySelector("#chart"), options);

        chart.render();

        let correctedOffset = 0;

        const getChartData = offset => {
            correctedOffset += offset

            fetch(`/statistics/data/${correctedOffset}`, {
                headers: {
                    "X-CSRF-Token": "{{ csrf_token() }}"
                }
            }).then(data => data.json().then(data => {
                chart.updateSeries([
                    {
                        name: 'Zysk',
                        data: data.repair
                    },
                    {
                        name: "Koszt części",
                        data: data.parts
                    }
                ]);
            }));
        }

        getChartData(0)
    </script>
@endsection
