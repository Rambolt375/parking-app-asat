@extends('layouts.app')

@section('title', 'SIJA Parking - Vehicle Type')
@section('breadcrumb', 'Vehicle Type')
@section('page-title', 'Vehicle Type')

@section('topbar-actions')
    <div class="search-box">
        <form action="{{ route('vehicle-types.index') }}" method="GET">
            <i class="fas fa-search search-icon"></i>
            <input type="text" name="search" placeholder="Type here..." value="{{ request('search') }}">
        </form>
    </div>
    <a href="{{ route('vehicle-types.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> ADD NEW VEHICLE TYPE
    </a>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="card-header-title">Vehicle Type <span>Data Table</span></h2>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>NO.</th>
                        <th>VEHICLE TYPE</th>
                        <th>FIRST HOUR CHARGES</th>
                        <th>NEXT HOURLY CHARGES</th>
                        <th>MAX COST PER DAY</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($vehicleTypes as $index => $vt)
                    <tr>
                        <td>{{ 1 + $index }}</td>
                        <td><strong style="text-transform: capitalize;">{{ $vt->jenis }}</strong></td>
                        <td>{{ number_format($vt->perjam_pertama, 0, ',', '.') }}</td>
                        <td>{{ number_format($vt->perjam_berikutnya, 0, ',', '.') }}</td>
                        <td>{{ number_format($vt->max_perhari, 0, ',', '.') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="empty-state">
                            Belum ada data vehicle type.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('assets/js/sweetalert.js') }}"></script>
<script>
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Good Job',
            text: '{{ session('success') }}',
            confirmButtonText: 'OK',
            confirmButtonColor: '#d81b60',
            customClass: {
                confirmButton: 'btn btn-primary'
            }
        });
    @endif
</script>
@endpush
@endsection
