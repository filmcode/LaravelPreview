@extends('adminlte::page')

@section('title', 'Grafica')

@section('content_header')
    <h1>Estadistica por usuario</h1>
@stop
@section('content')
<x-app-layout>
    <canvas id="myChart" class="mychart"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    <script>
        'use strict';
        const ctx = document.getElementById('myChart').getContext('2d');
        let labelsChart = @json($labels);
        console.log(labelsChart);
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($labels),
                datasets: [{
                    maxBarThickness: 80,
                    label: '',
                    data: @json($datos),
                    backgroundColor: [
                        '#007bff'
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        console.log(myChart);

    </script>
</x-app-layout>
@stop