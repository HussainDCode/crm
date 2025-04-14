@extends('layouts.app')

@section('content')
{{-- <div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('User Information') }}</div>

                <div class="card-body">
                    <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    <p><strong>Role:</strong> {{ Auth::user()->role }}</p>
                    <p><strong>Created At:</strong> {{ Auth::user()->created_at->format('d-m-Y H:i:s') }}</p>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<style>
    /* Product Cards */
    .product-card {
        transition: all 0.3s ease;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .product-card .card-img-top {
        height: 180px;
        object-fit: cover;
    }

    .product-card .card-title {
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 0.25rem;
    }

    .product-card .card-text {
        font-size: 0.875rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .product-badge .badge {
        font-size: 0.65rem;
        font-weight: 500;
        padding: 0.35em 0.65em;
    }

    .product-actions .btn {
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0;
    }

    .product-rating {
        white-space: nowrap;
    }

    /* Responsive adjustments */
    @media (max-width: 1199.98px) {
        .product-card .card-img-top {
            height: 160px;
        }
    }

    @media (max-width: 991.98px) {
        .product-card .card-img-top {
            height: 200px;
        }
    }

    @media (max-width: 767.98px) {
        .product-card .card-img-top {
            height: 150px;
        }
    }
</style>

<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h6>Products Management</h6>
                    <a href="" class="btn btn-primary btn-sm">
                        {{-- {{ route('admin.products.create') }} --}}
                        <i class="fas fa-plus me-1"></i> Add New Product
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <!-- Products Grid -->
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6>Products</h6>
                    <div class="d-flex">
                        <div class="input-group input-group-sm me-2" style="width: 200px;">
                            <input type="text" class="form-control" placeholder="Search products...">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        <div class="btn-group">
                            <button class="btn btn-sm btn-outline-secondary" type="button" title="Grid View">
                                <i class="fas fa-th-large"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-secondary" type="button" title="List View">
                                <i class="fas fa-list"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Product Card 1 -->
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                            <div class="card product-card h-100">
                                <div class="position-relative">
                                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="Product Image">
                                    <div class="product-badge position-absolute top-0 end-0 m-2">
                                        <span class="badge bg-success">In Stock</span>
                                    </div>
                                    <div class="product-actions position-absolute top-0 start-0 m-2">
                                        <button class="btn btn-sm btn-light rounded-circle">
                                            <i class="fas fa-heart"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <div>
                                            <span class="text-muted small">Electronics</span>
                                            <h6 class="card-title mb-1">Wireless Headphones</h6>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-link text-dark" type="button"
                                                data-bs-toggle="dropdown">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Edit</a></li>
                                                <li><a class="dropdown-item" href="#">View</a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <p class="card-text small text-muted mb-2">Noise cancelling wireless headphones with
                                        30hr battery</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">$129.99</h5>
                                        <div class="product-rating small text-warning">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <span class="text-muted ms-1">(24)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent border-top-0">
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-sm btn-outline-primary">Quick Edit</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Product Card 2 -->
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                            <div class="card product-card h-100">
                                <div class="position-relative">
                                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="Product Image">
                                    <div class="product-badge position-absolute top-0 end-0 m-2">
                                        <span class="badge bg-danger">Out of Stock</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <div>
                                            <span class="text-muted small">Clothing</span>
                                            <h6 class="card-title mb-1">Cotton T-Shirt</h6>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-link text-dark" type="button"
                                                data-bs-toggle="dropdown">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Edit</a></li>
                                                <li><a class="dropdown-item" href="#">View</a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <p class="card-text small text-muted mb-2">100% cotton premium t-shirt available in
                                        multiple colors</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">$24.99</h5>
                                        <div class="product-rating small text-warning">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <span class="text-muted ms-1">(42)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent border-top-0">
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-sm btn-outline-primary">Quick Edit</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Add more product cards here -->
                    </div>

                    <!-- Pagination -->
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center mt-4">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Filter Sidebar -->
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h6>Filters</h6>
                </div>
                <div class="card-body">
                    <form id="filter-form">
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select class="form-select" name="category">
                                <option value="">All Categories</option>
                                <option value="electronics">Electronics</option>
                                <option value="clothing">Clothing</option>
                                <option value="home">Home & Garden</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price Range</label>
                            <div class="input-group">
                                <input type="number" class="form-control" placeholder="Min" name="min_price">
                                <input type="number" class="form-control" placeholder="Max" name="max_price">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status">
                                <option value="">All Status</option>
                                <option value="active">Active</option>
                                <option value="draft">Draft</option>
                                <option value="archived">Archived</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Apply Filters</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Edit Modal -->
<div class="modal fade" id="quickEditModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Quick Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Quick edit form would go here -->
                <p>Quick edit form content would be loaded here dynamically</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection
