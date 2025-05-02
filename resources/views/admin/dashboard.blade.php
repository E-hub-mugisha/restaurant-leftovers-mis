@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <div class="page-pretitle">Overview</div>
            <h2 class="page-title">Dashboard</h2>
        </div>
    </div>

    <!-- Stat Cards -->
    <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-sm-4 text-center">
                            <i class="teal fas fa-shopping-cart fa-2x"></i>
                        </div>
                        <div class="col-sm-8">
                            <p class="detail-subtitle">Total Leftovers</p>
                            <span class="number">{{ $totalLeftovers }}</span>
                        </div>
                    </div>
                    <hr />
                    <div class="stats">
                        <i class="fas fa-calendar"></i> For this Week
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-sm-4 text-center">
                            <i class="olive fas fa-money-bill-alt fa-2x"></i>
                        </div>
                        <div class="col-sm-8">
                            <p class="detail-subtitle">Total Users</p>
                            <span class="number">{{ $userCount }}</span>
                        </div>
                    </div>
                    <hr />
                    <div class="stats">
                        <i class="fas fa-calendar"></i> For this Month
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-sm-4 text-center">
                            <i class="violet fas fa-eye fa-2x"></i>
                        </div>
                        <div class="col-sm-8">
                            <p class="detail-subtitle">Total Feedback</p>
                            <span class="number">{{ $menuFeedbackCount }}</span>
                        </div>
                    </div>
                    <hr />
                    <div class="stats">
                        <i class="fas fa-stopwatch"></i> For this Month
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-sm-4 text-center">
                            <i class="orange fas fa-envelope fa-2x"></i>
                        </div>
                        <div class="col-sm-8">
                            <p class="detail-subtitle">Support Requests</p>
                            <span class="number">75</span>
                        </div>
                    </div>
                    <hr />
                    <div class="stats">
                        <i class="fas fa-envelope-open-text"></i> For this Week
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts -->
    <div class="row">
        <div class="col-md-6 mt-4">
            <div class="card">
                <div class="content">
                    <h5 class="mb-0">Leftover Overview</h5>
                    <p class="text-muted">Available vs Reserved</p>
                    <canvas id="trafficflow"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-4">
            <div class="card">
                <div class="content">
                    <h5 class="mb-0">Sales Overview</h5>
                    <p class="text-muted">Reservations this year</p>
                    <canvas id="reservationsChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Top Visitors Table -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="content">
                    <h5 class="mb-0">Top Visitors by Country</h5>
                    <p class="text-muted">Visitor stats this year</p>
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Joined At</th>
                                    <th>Reservations</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $index => $user)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->format('M d, Y') }}</td>
                                    <td>{{ $user->reservations_count ?? 0 }}</td>
                                    <td>
                                        <a href="{{ route('admin.users.reservations', $user->id) }}" class="btn btn-sm btn-info">View</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">No users found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js & DataTables -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        // Leftovers Chart
        const leftoversChart = new Chart(document.getElementById('trafficflow').getContext('2d'), {
            type: 'bar',
            data: {
                labels: ['Available', 'Reserved'],
                datasets: [{
                    label: 'Leftover Meals',
                    data: [{{ $summaryLeftovers - $summaryLeftoversReserved }}, {{ $summaryLeftoversReserved }}],
                    backgroundColor: ['#4caf50', '#f44336'],
                    borderColor: ['#388e3c', '#c62828'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                    title: {
                        display: true,
                        text: 'Leftovers Summary'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Quantity'
                        }
                    }
                }
            }
        });

        // Reservations Chart
        const reservationsChart = new Chart(document.getElementById('reservationsChart').getContext('2d'), {
            type: 'line',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: 'Reservations',
                    data: {!! json_encode($data) !!},
                    fill: true,
                    borderColor: 'rgb(75, 192, 192)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Monthly Reservations'
                    }
                }
            }
        });

        // DataTables
        $('#dataTables-example').DataTable();
    });
</script>
@endsection
