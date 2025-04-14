@extends('layouts.app')

@section('content')
    <style>
        .product-page-header {
            background-color: #2c2c2c;
            padding: 1.5rem;
            border-radius: 16px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.6);
            margin-bottom: 10px;
            color: #ffffff;
            line-height: 20px;
        }

        .card-container {
            background-color: #1e1e1e;
            padding: 2rem;
            border-radius: 16px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.7);
            max-width: 1000px;
            margin: auto;
        }

        .header-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            /* margin-bottom: 1.5rem; */
        }

        .header-bar h2 {
            font-size: 28px;
            color: #ffffff;
        }

        .add-btn {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 0.6rem 1.2rem;
            text-align: center;
            font-size: 16px;
            border-radius: 8px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .add-btn:hover {
            background-color: #388e3c;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 12px;
        }

        thead {
            background-color: #2c2c2c;
        }

        th,
        td {
            padding: 1rem;
            text-align: left;
        }

        th {
            color: #ffffff;
            font-weight: 600;
        }

        tbody tr {
            border-bottom: 1px solid #333;
            transition: background-color 0.3s ease;
            background-color: #292929;
        }

        /* tbody tr:hover {

                                            } */

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .btn {
            padding: 0.4rem 0.8rem;
            font-size: 14px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .btn-edit {
            background-color: #007bff;
            color: white;
        }

        .btn-edit:hover {
            background-color: #0056b3;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
        }

        .btn-delete:hover {
            background-color: #a71d2a;
        }

        .btn-update {
            background-color: #28a745;
            color: white;
        }

        .btn-update:hover {
            background-color: #1e7e34;
        }

        @media (max-width: 768px) {

            table,
            thead,
            tbody,
            th,
            td,
            tr {
                display: block;
            }

            thead {
                display: none;
            }

            td {
                position: relative;
                padding-left: 50%;
                text-align: right;
            }

            td::before {
                position: absolute;
                left: 1rem;
                top: 1rem;
                white-space: nowrap;
                font-weight: bold;
                content: attr(data-label);
                text-align: left;
                color: #aaa;
            }

            .action-buttons {
                justify-content: flex-end;
            }
        }

        /* Dark mode modal styling */
        .modal-content {
            background-color: #1e1e1e;
            color: #f1f1f1;
            border-radius: 10px;
        }

        .modal-header,
        .modal-body,
        .modal-footer {
            border-color: #333;
        }

        .modal-header .btn-close {
            filter: invert(1);
        }

        .modal-title {
            text-transform: capitalize !important;
        }

        .modal.right .modal-dialog {
            top: 0;
            right: 0;
            margin-right: 42px;
        }

        /* .modal-footer .btn {
                                                    background-color: #007bff;
                                                    color: white;
                                                    border-radius: 8px;
                                                    padding: 0.5rem 1rem;
                                                } */
        .badge {
            padding: 8px 8px;
        }

        .cancel-btn {
            margin-top: 10px;
            padding: 5px 10px;
            background-color: red;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .cancel-btn:hover {
            background-color: darkred;
            color: white;
        }

        .add-prod-mod {
            margin-top: 5px;
        }

        .add-prod-mod input,
        textarea {
            text-transform: capitalize;
        }

        .add-prod-mod label {
            margin-bottom: 5px;
        }

        .form-control {
            background-color: #2c2c2c;
            color: #ffffff;
            border: 1px solid #333;
            border-radius: 8px;
            padding: 0.5rem;
            transition: border-color 0.3s ease;
            background: #474747;
        }

        .form-control::placeholder {
            color: #aaa;
        }

        .tf-color {
            color: #2275fc !important;
        }

        .body-text {
            color: var(--Body-Text);
            font-size: 14px;
            font-weight: 400;
            line-height: 20px;
        }


        .tf-color-1 {
            color: #FF5200 !important;
        }

        tbody tr td {
            text-transform: capitalize;
        }

        /* Add these to your existing styles */
        @media (max-width: 1199px) {

            /* Tablet styles */
            table {
                font-size: 14px;
            }

            th,
            td {
                padding: 0.8rem;
            }

            .action-buttons {
                flex-wrap: wrap;
                gap: 0.3rem;
            }

            .btn {
                padding: 0.3rem 0.6rem;
                font-size: 12px;
            }
        }

        @media (max-width: 767px) {

            /* Mobile styles */
            .header-bar {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .header-bar h2 {
                font-size: 24px;
            }

            .add-btn {
                width: 100%;
                text-align: center;
            }

            .modal.right .modal-dialog {
                width: 100%;
                margin-right: 0;
            }

            .modal-body {
                padding: 1rem;
            }

            .upload-image .item.up-load {
                min-height: 180px;
            }

            .upload-image .uploadfile .icon {
                font-size: 30px;
            }

            .upload-image .uploadfile .body-text {
                font-size: 12px;
            }

            textarea {
                width: 100% !important;
            }
        }

        @media (max-width: 575px) {

            /* Small mobile devices */
            .product-page-header {
                padding: 1rem;
            }

            .card-body {
                padding: 0.5rem;
            }

            .modal-content {
                margin: 0.5rem;
            }

            .form-control,
            .add-prod-mod input,
            .add-prod-mod textarea,
            .add-prod-mod select {
                padding: 0.4rem;
                font-size: 14px;
            }

            .modal-footer .btn {
                padding: 0.4rem 0.8rem;
                font-size: 14px;
            }
        }

        .modal-content {
            display: flex;
            flex-direction: column;
            height: 90vh;
            /* adjust the height as needed */
        }

        .modal-header {
            position: sticky;
            top: 0;
            background-color: #2c2c2c;
            /* add background color to prevent content from showing behind the header */
            z-index: 1;
        }

        .modal-body {
            overflow-y: auto;
            padding: 1rem;
        }

        .modal-footer {
            position: sticky;
            bottom: 0;
            background-color: #2c2c2c;
            /* add background color to prevent content from showing behind the footer */
            z-index: 1;
        }

        .modal-body::-webkit-scrollbar {
            width: 8px;
        }

        .modal-body::-webkit-scrollbar-thumb {
            background-color: #888;
            border-radius: 4px;
        }

        .modal-body::-webkit-scrollbar-thumb:hover {
            background-color: #555;
        }

        #previewImage {
            max-width: 100px;
            max-height: 100px;
            width: auto;
            height: auto;
            display: block;
            margin: 0 auto;
            border-radius: 4px;
            object-fit: contain;
            /* Ensures aspect ratio is maintained */
        }

        .page-link {
            background: #2c2c2c;
            border: 1px solid #2c2c2c;
            color: rgb(0, 255, 140);
        }

        .page-item.active .page-link {
            /* background: #2c2c2c;
            border: 1px solid #2c2c2c; */
        }
        .page-link:hover {
            background: #2c2c2c;
            border: 1px solid #2c2c2c;
        }
        .page-item.disabled .page-link{
            pointer-events: none;
            cursor: not-allowed;
            background: #2c2c2c;
            border: 1px solid #2c2c2c;
            color: rgb(0, 255, 140);
        }
        .fw-semibold {
            color: rgb(0, 255, 140);
        }
        .fa-solid {
            color: rgb(0, 255, 140);
        }
    </style>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container-fluid">
        {{-- <div class="col-lg-12"> --}}
        <div class="row">
            <div class="col-md-12">
                {{-- <div class="card-container"> --}}
                <div class="card product-page-header">
                    <div class="header-bar dark">
                        <h2>Product Information</h2>
                        <a href="" class="add-btn" data-bs-toggle="modal" data-bs-target="#addproduct"><i
                                class="fa-solid fa-product-plus"></i> Add New Product</a>
                        {{-- {{ route('products.create') }} --}}
                    </div>
                </div>

                <div class="card-body">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Name <i class="fa-solid fa-signature"></i></th>
                                <th>Image <i class="fa-solid fa-images"></i></th>

                                <th>Size</th>
                                <th>Price</th>
                                <th>Weight</th>

                                {{-- <th>Category</th> --}}
                                <th>Quantity</th>
                                {{-- <th>Product Status</th> --}}
                                <th>Description</th>

                                <th>Discount <i class="fa-solid fa-percent"></i></th>
                                <th>SKU</th>
                                <th>Actions <i class="fa-solid fa-circle-exclamation"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>
                                        @if ($product->image)
                                            <img src="{{ asset($product->image) }}" alt="{{ $product->product_name }}"
                                                style="max-width: 80px; max-height: 80px;">
                                        @else
                                            <span class="text-muted">No image</span>
                                        @endif
                                    </td>

                                    <td>{{ $product->size }}</td>
                                    <td>RS {{ $product->price }}</td>
                                    <td>{{ $product->weight }}</td>

                                    {{-- <td>{{ $product->category }}</td> --}}
                                    <td>{{ $product->quantity }}</td>
                                    {{-- <td>
                                        @if ($product->alert_stock >= $product->quantity)
                                            <span class="badge bg-danger">Low In Stock {{ $product->alert_stock }}</span>
                                        @else
                                            <span class="badge bg-success">Medium In Stock
                                                {{ $product->alert_stock }}</span>
                                        @endif
                                    </td> --}}
                                    <td>{{ $product->description }}</td>

                                    <td>{{ $product->discount_price }}</td>
                                    <td>{{ $product->sku }}</td>
                                    <td data-label="Actions">
                                        <div class="action-buttons">
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#editproduct{{ $product->id }}" class="btn btn-edit">
                                                <i class="fa-solid fa-pen-to-square"></i> Edit
                                            </a>


                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-delete"
                                                    onclick="return confirm('Are you sure you want to delete this product?')">
                                                    <i class="fa-solid fa-trash"></i> Delete
                                                </button>
                                            </form>
                                            <a href="" class="btn btn-update"><i class="fa-solid fa-eye"></i>
                                                View</a>
                                            {{-- {{ route('products.show', $product->id) }} --}}
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal right fade" id="editproduct{{ $product->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title fs-5" id="exampleModalLabel"><i
                                                        class="fa fa-edit"></i> Edit product</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('products.update', $product->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label>Product Name</label>
                                                        <input type="text" name="product_name" class="form-control"
                                                            value="{{ $product->product_name }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label>Size</label>
                                                        <input type="number" name="size" class="form-control"
                                                            value="{{ $product->size }}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Weight</label>
                                                        <input type="number" name="weight" class="form-control"
                                                            value="{{ $product->weight }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label>Price</label>
                                                        <input type="number" name="price" class="form-control"
                                                            value="{{ $product->price }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="">Discount %</label>
                                                        <input type="number" name="discount_price" class="form-control"
                                                            value="{{ $product->discount_price }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label>Category</label>
                                                        <select name="category" class="form-control">
                                                            {{-- @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                            @endforeach --}}
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="">Quantity</label>
                                                        <input type="number" name="quantity" class="form-control"
                                                            value="{{ $product->quantity }}">
                                                    </div>

                                                    {{-- <div class="mb-3">
                                                        <label for="">Stock</label>
                                                        <input type="number" name="alert_stock" class="form-control" placeholder="Enter Stock">
                                                    </div> --}}

                                                    <div class="mb-3">
                                                        <label for="">Description</label>
                                                        <br>
                                                        <textarea class="form-control" name="description" id="" cols="62" rows="3">{{ $product->description }}</textarea>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="">Product Code</label>
                                                        <input type="text" name="sku" class="form-control"
                                                            value="{{ $product->sku }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <div class="body-title">Upload images <span
                                                                class="tf-color-1">*</span>
                                                        </div>
                                                        <div class="upload-image flex-grow">
                                                            <div class="item" id="imgpreview" style="display:none">
                                                                <img src="{{ $product->image }}" class="effect8"
                                                                    alt="">
                                                                <button type="button" id="cancelImage"
                                                                    class="cancel-btn">Remove Image</button>
                                                            </div>
                                                            <div id="upload-file" class="item up-load">
                                                                <label class="uploadfile" for="myFile">
                                                                    <span class="icon">
                                                                        <i class="icon-upload-cloud"></i>
                                                                    </span>
                                                                    <span class="body-text">Drop your images here or select
                                                                        <span class="tf-color">
                                                                            click to browse</span></span>
                                                                    <input type="file" id="myFile" name="image"
                                                                        accept="image/*">
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </form>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $products->links('pagination::bootstrap-5') }}
                    </div>

                </div>
                {{-- </div> --}}
            </div>
            {{-- <div class="col-md-4">
                    <div class="card-container">
                        <div class="header-bar">
                            <h2>Search</h2>
                            {{ route('products.create') }}
                        </div>

                        <div class="card-body">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> --}}
        </div>
        {{-- </div> --}}
    </div>

    <div class="modal right fade" id="addproduct" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="exampleModalLabel">Add product</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label>Product Name</label>
                            <input type="text" name="product_name" class="form-control"
                                placeholder="Enter Product Name" required>
                        </div>

                        <div class="mb-3">
                            <label>Size</label>
                            <input type="number" name="size" class="form-control"
                                placeholder="Enter Size(e.g. KG, Gaz, Litter, Dozen)" required>
                        </div>

                        <div class="form-group">
                            <label for="">Weight</label>
                            <input type="number" name="weight" class="form-control" placeholder="Enter Weight">
                        </div>

                        <div class="mb-3">
                            <label>Price</label>
                            <input type="number" name="price" class="form-control" placeholder="Enter Price"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="">Discount %</label>
                            <input type="number" name="discount_price" class="form-control"
                                placeholder="Enter Discount">
                        </div>

                        <div class="mb-3">
                            <label>Category</label>
                            <select name="category" class="form-control">
                                {{-- @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach --}}
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="">Quantity</label>
                            <input type="number" name="quantity" class="form-control" placeholder="Enter Quantity">
                        </div>

                        {{-- <div class="mb-3">
                            <label for="">Stock</label>
                            <input type="number" name="alert_stock" class="form-control" placeholder="Enter Stock">
                        </div> --}}

                        <div class="mb-3">
                            <label for="">Description</label>
                            <br>
                            <textarea class="form-control" name="description" id="" cols="62" rows="3"
                                placeholder="Enter Description"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="">Product Code</label>
                            <input type="text" name="sku" class="form-control" placeholder="Enter Product Code">
                        </div>

                        <div class="mb-3">
                            <div class="body-title">Upload images <span class="tf-color-1">*</span></div>
                            <div class="upload-image flex-grow">
                                <div class="item" id="imgpreview" style="display:none">
                                    <img class="effect8" alt="Preview">
                                    <button type="button" id="cancelImage" class="cancel-btn">Remove Image</button>
                                </div>
                                <div id="upload-file" class="item up-load">
                                    <label class="uploadfile" for="myFile">
                                        <span class="icon">
                                            <i class="icon-upload-cloud"></i>
                                        </span>
                                        <span class="body-text">Drop your images here or select
                                            <span class="tf-color">click to browse</span>
                                        </span>
                                        <input type="file" id="myFile" name="image" accept="image/*">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to initialize image preview functionality for a modal
            function initializeImagePreview(modalId) {
                const modal = document.getElementById(modalId);
                if (!modal) return;

                const fileInput = modal.querySelector('input[type="file"]');
                const imgPreview = modal.querySelector('#imgpreview');
                const previewImage = modal.querySelector('img.effect8');
                const cancelBtn = modal.querySelector('#cancelImage');
                const uploadFile = modal.querySelector('#upload-file');

                // If there's an existing image (edit mode), show it
                if (previewImage && previewImage.src && !previewImage.src.endsWith('#')) {
                    imgPreview.style.display = 'block';
                    uploadFile.style.display = 'none';
                }

                fileInput.addEventListener('change', function(e) {
                    if (fileInput.files && fileInput.files[0]) {
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            previewImage.src = e.target.result;
                            previewImage.style.maxWidth = '150px';
                            previewImage.style.maxHeight = '150px';
                            imgPreview.style.display = 'block';
                            uploadFile.style.display = 'none';
                        }

                        reader.readAsDataURL(fileInput.files[0]);
                    }
                });

                // Remove image functionality
                if (cancelBtn) {
                    cancelBtn.addEventListener('click', function() {
                        fileInput.value = ''; // Clear the file input
                        previewImage.src = '#';
                        imgPreview.style.display = 'none';
                        uploadFile.style.display = 'block';
                    });
                }
            }

            // Initialize for add product modal
            initializeImagePreview('addproduct');

            // Initialize for each edit product modal
            document.querySelectorAll('[id^="editproduct"]').forEach(modal => {
                initializeImagePreview(modal.id);
            });
        });
    </script>
@endsection
