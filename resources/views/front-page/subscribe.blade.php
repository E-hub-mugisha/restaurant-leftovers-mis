@extends('layouts.guest')

@section('content')
<div class="container mt-4">
    <h3>Subscribe for Leftover Alerts</h3>

    <form action="{{ route('leftovers.subscribe') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="frequency">Receive updates:</label>
            <select name="frequency" id="frequency" class="form-control" required>
                <option value="daily">Daily</option>
                <option value="weekly">Weekly</option>
            </select>
        </div>

        <button class="btn btn-success mt-2">Subscribe</button>
    </form>
</div>
@endsection
