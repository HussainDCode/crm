@extends('layouts.app')

@section('title', 'Dashboard')

@section('breadcrumbs')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-6 col-lg-3">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title text-muted mb-1">Total Products</h6>
                        <h4 class="mb-0">{{ $totalProducts }}</h4>
                    </div>
                    <div class="bg-primary bg-opacity-10 p-3 rounded">
                        <i class="bi bi-box-seam text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title text-muted mb-1">Total Categories</h6>
                        <h4 class="mb-0">{{ $totalCategories }}</h4>
                    </div>
                    <div class="bg-success bg-opacity-10 p-3 rounded">
                        <i class="bi bi-tags text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title text-muted mb-1">Total Brands</h6>
                        <h4 class="mb-0">{{ $totalBrands }}</h4>
                    </div>
                    <div class="bg-info bg-opacity-10 p-3 rounded">
                        <i class="bi bi-shop text-info"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title text-muted mb-1">Total Users</h6>
                        <h4 class="mb-0">{{ $totalUsers }}</h4>
                    </div>
                    <div class="bg-warning bg-opacity-10 p-3 rounded">
                        <i class="bi bi-people text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header">
                <h6 class="card-title mb-0">Recent Products</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentProducts as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name ?? 'N/A' }}</td>
                                <td>{{ number_format($product->price, 2) }}</td>
                                <td>
                                    <span class="badge bg-{{ $product->status ? 'success' : 'secondary' }}">
                                        {{ $product->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header">
                <h6 class="card-title mb-0">Recent Activity</h6>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    @foreach($recentActivities as $activity)
                    <li class="list-group-item px-0 py-2">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <img src="{{ $activity->user->avatar_url ?? 'https://ui-avatars.com/api/?name='.urlencode($activity->user->name).'&background=random' }}"
                                     class="rounded-circle" width="40" height="40" alt="User">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">{{ $activity->user->name }}</h6>
                                <p class="mb-0 text-muted small">{{ $activity->description }}</p>
                                <small class="text-muted">{{ $activity->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
