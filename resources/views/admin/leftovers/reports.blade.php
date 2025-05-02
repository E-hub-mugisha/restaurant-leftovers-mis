@extends('layouts.app')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Leftovers Reports</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Leftovers Reports</li>
    </ol>
    <div class="container">
        <h2>Leftovers Report: {{ $startDate->format('d M, Y') }} - {{ $endDate->format('d M, Y') }}</h2>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Menu Item</th>
                    <th>Total Quantity</th>
                    <th>Total Discount</th>
                    <th>Wastage Reduction</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leftovers as $leftover)
                <tr>
                    <td>{{ $leftover->menu->name }}</td> <!-- Assuming you have a 'name' attribute in the 'menus' table -->
                    <td>{{ $leftover->total_quantity }}</td>
                    <td>{{ $leftover->total_discount }}</td>
                    <td>{{ $leftover->wastage_reduction }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Export Buttons -->
        <div class="d-flex justify-content-end mt-3">
            <form action="{{ route('leftovers.report.export') }}" method="POST">
                @csrf
                <input type="hidden" name="start_date" value="{{ $startDate }}">
                <input type="hidden" name="end_date" value="{{ $endDate }}">
                <button type="submit" name="format" value="pdf" class="btn btn-danger me-2">Export as PDF</button>
                <button type="submit" name="format" value="excel" class="btn btn-success">Export as Excel</button>
            </form>
        </div>
    </div>
</div>
@endsection