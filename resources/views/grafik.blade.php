@extends('layouts.app')

@section('title', 'Grafik Barang')

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="myChart" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection

@section('custom_scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const source = @json($chart)

        const data = {
            labels: source.map(e => e.label),
            datasets: [{
                    label: 'Jumlah',
                    data: source.map(e => e.jumlah_total),
                    backgroundColor: 'rgb( 93, 109, 126)',
                },
                {
                    label: 'Baik',
                    data: source.map(e => e.jumlah_baik),
                    backgroundColor: 'rgb( 82, 190, 128 )',
                },
                {
                    label: 'Rusak',
                    data: source.map(e => e.jumlah_rusak),
                    backgroundColor: 'rgb( 244, 208, 63 )',
                },
                {
                    label: 'Hilang',
                    data: source.map(e => e.jumlah_hilang),
                    backgroundColor: 'rgb( 236, 112, 99 )',
                }
            ]
        }

        const config = {
            type: 'bar',
            data: data,
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Grafik Barang'
                    }
                }
            },
        };

        const myChart = new Chart(ctx, config);
    </script>

@endsection
