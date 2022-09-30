@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')


    <section class="section">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        {{-- <div class="main-content" style="min-height: 506px;"> --}}
        <section class="section">
            <div class="section-header">
                <h1>Ringkasan Bisnis</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item">Ringkasan Bisnis</div>
                </div>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Grafik Laba Rugi</h4>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div>
                                        <canvas id="myChart1"></canvas>
                                    </div>

                                </div>
                            </div>
                            {{-- <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                        <canvas id="myChart" width="429" height="214" style="display: block; height: 143px; width: 286px;" class="chartjs-render-monitor"></canvas>
                      </div> --}}
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Laporan Perubahan Modal</h4>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div>
                                        <canvas id="myChart2"></canvas>
                                    </div>

                                </div>
                            </div>
                            {{-- <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                        <canvas id="myChart" width="429" height="214" style="display: block; height: 143px; width: 286px;" class="chartjs-render-monitor"></canvas>
                      </div> --}}
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Grafik Piutang Usaha</h4>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div>
                                        <canvas id="myChart3"></canvas>
                                    </div>

                                </div>
                            </div>
                            {{-- <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                        <canvas id="myChart" width="429" height="214" style="display: block; height: 143px; width: 286px;" class="chartjs-render-monitor"></canvas>
                      </div> --}}
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Grafik Perubahan Arus Kas</h4>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div>
                                        <canvas id="myChart4"></canvas>
                                    </div>

                                </div>
                            </div>
                            {{-- <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                        <canvas id="myChart" width="429" height="214" style="display: block; height: 143px; width: 286px;" class="chartjs-render-monitor"></canvas>
                      </div> --}}
                        </div>
                    </div>

                </div>


            </div>
        </section>
    </section>
@endsection

@push('script')
    <script>
        new Chart(
            document.getElementById('myChart1'), {
                type: 'line',
                data: {
                    labels: [
                        'January',
                        'February',
                        'March',
                        'April',
                        'May',
                        'June',
                        'July',
                        'August',
                        'September',
                        'October',
                        'November',
                        'December',
                    ],
                    datasets: [{
                        label: 'Laba / Rugi',
                        backgroundColor: 'rgb(51, 102, 0)',
                        borderColor: 'rgb(51, 102, 0)',
                        data: {{ $labarugi }},
                    }]
                },
                options: {},
            })


            new Chart(
            document.getElementById('myChart2'), {
                type: 'line',
                data: {
                    labels: [
                        'January',
                        'February',
                        'March',
                        'April',
                        'May',
                        'June',
                        'July',
                        'August',
                        'September',
                        'October',
                        'November',
                        'December',
                    ],
                    datasets: [{
                        label: 'Perubahan Modal',
                        backgroundColor: 'rgb(76, 153, 0)',
                        borderColor: 'rgb(76, 153, 0)',
                        data: {{ $perubahanmodal }},
                    }]
                },
                options: {},
            })

            new Chart(
            document.getElementById('myChart3'), {
                type: 'line',
                data: {
                    labels: [
                        'January',
                        'February',
                        'March',
                        'April',
                        'May',
                        'June',
                        'July',
                        'August',
                        'September',
                        'October',
                        'November',
                        'December',
                    ],
                    datasets: [{
                        label: 'Piutang Usaha',
                        backgroundColor: 'rgb(102, 204, 0)',
                        borderColor: 'rgb(102, 204, 0)',
                        data: {{ $piutangusaha }},
                    }]
                },
                options: {},
            })

            new Chart(
            document.getElementById('myChart4'), {
                type: 'line',
                data: {
                    labels: [
                        'January',
                        'February',
                        'March',
                        'April',
                        'May',
                        'June',
                        'July',
                        'August',
                        'September',
                        'October',
                        'November',
                        'December',
                    ],
                    datasets: [{
                        label: 'Perubahan Aruskas',
                        backgroundColor: 'rgb(128, 255, 0)',
                        borderColor: 'rgb(128, 255, 0)',
                        data: {{ $perubahanaruskas }},
                    }]
                },
                options: {},
            })
    </script>
@endpush
