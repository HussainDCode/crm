@extends('layouts.app')

@section('content')
    <style>
        .order-page-header {
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
            box-shadow: 10px 20px 20px rgba(0, 0, 0, 0.9);
            max-width: 1200px;
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
            background-color: #343a40;
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
            background-color: #1f2123;
            color: wheat;
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
            .order-page-header {
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


        .page-link:hover {
            background: #2c2c2c;
            border: 1px solid #2c2c2c;
        }

        .page-item.disabled .page-link {
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

        :root,
        [data-bs-theme=dark] {
            --bs-body-bg: #212529;
            --bs-body-color: #f8f9fa;
            --bs-border-color: #343a40;
            --bs-emphasis-color: #fff;
            --bs-emphasis-color-rgb: 255, 255, 255;
            --bs-secondary-bg: #343a40;
            --bs-secondary-bg-rgb: 52, 58, 64;
            --bs-tertiary-bg: #495057;
            --bs-tertiary-bg-rgb: 73, 80, 87;
        }

        .table {
            --bs-table-color-type: initial;
            --bs-table-bg-type: initial;
            --bs-table-color-state: initial;
            --bs-table-bg-state: initial;
            --bs-table-color: var(--bs-emphasis-color);
            --bs-table-bg: var(--bs-body-bg);
            --bs-table-border-color: var(--bs-border-color);
            --bs-table-accent-bg: transparent;
            --bs-table-striped-color: var(--bs-emphasis-color);
            --bs-table-striped-bg: rgba(var(--bs-emphasis-color-rgb), 0.05);
            --bs-table-active-color: var(--bs-emphasis-color);
            --bs-table-active-bg: rgba(var(--bs-emphasis-color-rgb), 0.1);
            --bs-table-hover-color: var(--bs-emphasis-color);
            --bs-table-hover-bg: rgba(var(--bs-emphasis-color-rgb), 0.075);
            width: 100%;
            margin-bottom: 1rem;
            vertical-align: top;
            border-color: var(--bs-table-border-color);
        }

        /* .table-bordered > :not(caption) > * > * {
                                                    text-align: center;
                                                } */
        .form-control,
        .form-control:focus {
            background-color: #222;
            color: white;
            border-color: rgb(0, 255, 140);
        }

        .form-control:disabled,
        .form-control[readonly] {
            background-color: #333;
        }

        .form-check-input:checked {
            background-color: rgb(0, 255, 140);
            border-color: rgb(0, 255, 140);
        }

        legend {
            color: rgb(0, 255, 140);
        }

        .header-bar1 {
            justify-content: center !important;
        }

        .calculator-btn,
        .save-btn,
        .logOut-btn {
            border: none;
            background-color: #343a40 !important;
            color: wheat !important;
        }

        .calculator-btn:hover {
            background-color: rgb(0, 255, 140) !important;
            color: black !important;
        }

        .save-btn:hover {
            background-color: rgb(0, 255, 140) !important;
            color: black !important;
        }

        .logOut-btn:hover {
            background-color: #ff0033 !important;
            color: white !important;
        }

        .customer-det {
            text-transform: capitalize;
        }

        .swal2-popup.custom-swal-popup {
            background-color: #2c2c2c;
            /* Light dark background */
        }

        .swal2-title.custom-swal-title {
            color: rgb(0, 255, 140);
            /* Custom text color */
        }

        .swal2-icon.custom-swal-icon.swal2-success {
            color: red !important;
            /* Red icon color */
            border-color: red !important;
        }

        .swal2-icon.custom-swal-icon.swal2-success [class^="swal2-success-line"] {
            background-color: red !important;
        }

        .swal2-icon.custom-swal-icon.swal2-success .swal2-success-ring {
            border: 4px solid red !important;
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
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8">
                    <div class="card-container container-fluid">
                        <div class="card order-page-header">
                            <div class="header-bar dark">
                                <h2>Create Order</h2>
                                <a href="" class="add-btn" data-bs-toggle="modal" data-bs-target="#addorder"><i
                                        class="fa-solid fa-order-plus"></i> Add New order</a>
                                {{-- {{ route('orders.create') }} --}}
                            </div>
                        </div>
                        <form action="{{ route('orders.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product Name</th>
                                            {{-- <th>Image</th> --}}
                                            <th>Quantity</th>
                                            {{-- <th>Weight</th> --}}
                                            <th>Price</th>
                                            <th>Discount <i class="fa-solid fa-percent"></i></th>
                                            <th>Total</th>
                                            <th>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-success add_more"><i
                                                        class="fa fa-plus-circle"></i></a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="addMoreProduct">
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <select name="product_id[]" class="form-control product_id">
                                                    <option value="" selected disabled>Select Product</option>
                                                    @foreach ($products as $product)
                                                        <option data-price="{{ $product->price }}"
                                                            value="{{ $product->id }}">
                                                            {{ $product->product_name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>

                                            <td>
                                                <input type="number" name="quantity[]" class="form-control quantity"
                                                    placeholder="Enter Quantity">
                                            </td>

                                            <td>
                                                <input type="number" name="price[]" class="form-control price"
                                                    placeholder="Enter Price">
                                            </td>
                                            <td>
                                                <input type="number" name="discount[]" class="form-control discount"
                                                    placeholder="Enter discount">
                                            </td>
                                            <td>
                                                <input type="number" name="total_amount[]"
                                                    class="form-control total_amount" placeholder="Total" readonly>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-container">
                        <div class="header-bar header-bar1">
                            <h2>Total: <strong class="total">0.00</strong></h2>
                        </div>

                        <div class="card-body my-3 text-wheat">
                            <div class="panel">
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-between align-items-center p-3 mb-3">
                                            <div class="d-flex gap-2">
                                                <button class="calculator-btn btn btn-success" type="button" id="printOrder">
                                                    <i class="fas fa-print me-2"></i>Print
                                                </button>
                                                <button class="calculator-btn btn btn-success" id="orderHistory">
                                                    <i class="fas fa-history me-2"></i>History
                                                </button>
                                            </div>
                                        </div>

                                        <table class="table table-dark table-striped table-hover">
                                            <tr>
                                                <td>
                                                    <label for="customer_name" class="form-label">Customer Name</label>
                                                    <input type="text" name="customer_name"
                                                        class="form-control customer-det bg-dark text-white border-success"
                                                        id="customer_name" placeholder="Enter Customer Name" required>
                                                </td>
                                                <td>
                                                    <label for="customer_phone" class="form-label">Customer Phone No</label>
                                                    <input type="number" name="customer_phone"
                                                        class="form-control bg-dark text-white border-success"
                                                        id="customer_phone" placeholder="Enter Customer Phone No" required>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div class="col-md-12">
                                        <fieldset class="border p-3 rounded border-success">
                                            <legend class="float-none w-auto px-2">Payment Method</legend>
                                            <div class="d-flex flex-wrap gap-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="payment_method"
                                                        id="cash" value="cash" checked>
                                                    <label class="form-check-label" for="cash">Cash</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="payment_method"
                                                        id="card" value="card">
                                                    <label class="form-check-label" for="card">Card</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="payment_method"
                                                        id="debt" value="debt">
                                                    <label class="form-check-label" for="debt">Debt</label>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="paid_amount" class="form-label">Payment</label>
                                        <input type="number" name="paid_amount" id="paid_amount"
                                            class="form-control bg-dark text-white border-success"
                                            placeholder="Enter Payment Amount" required>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="balance" class="form-label">Return Payment</label>
                                        <input type="number" name="balance" id="balance"
                                            class="form-control bg-dark text-white border-success" placeholder="0.00"
                                            readonly disabled>
                                    </div>
                                    <hr style="margin-top: 1rem;">
                                    <div class="d-flex justify-content-between align-items-center p-3 text-wheat">
                                        <div class="d-flex gap-2">
                                            <button class="calculator-btn btn btn-success">
                                                <i class="fas fa-calculator me-2"></i>Calculator
                                            </button>
                                            <button type="submit" class="save-btn btn btn-success">
                                                <i class="fas fa-save me-2"></i>Save
                                            </button>
                                        </div>

                                        <div>
                                            <a href="javascript:void(0);" class="logOut-btn btn btn-success">
                                                <i class="fas fa-sign-out-alt me-2"></i>Log Out
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal">
        <div id="print">
            @include('reports.receipt')
        </div>
    </div>


@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // <option value="" selected disabled>Select Product<\/option>/
            $('.add_more').on('click', function() {
                let product = $('.product_id').first().html();
                let numberofrow = $('.addMoreProduct tr').length + 1;
                let tr = `<tr>
                    <td class="no">${numberofrow}</td>
                    <td>
                        <select class="form-control product_id" name="product_id[]">
                            ${product.replace('<option value="" selected disabled>Select Product</option>', '')}
                        </select>
                    </td>
                    <td><input type="number" name="quantity[]" class="form-control quantity" placeholder="Enter Quantity"></td>
                    <td><input type="number" name="price[]" class="form-control price" placeholder="Enter Price"></td>
                    <td><input type="number" name="discount[]" class="form-control discount" placeholder="Enter Discount"></td>
                    <td><input type="number" name="total_amount[]" class="form-control total_amount" placeholder="Total" readonly></td>
                    <td><a href="javascript:void(0);" class="btn btn-sm btn-danger delete"><i class="fa fa-times"></i></a></td>
                    </tr>`;
                $('.addMoreProduct').append(tr);
                // <td><img src="" alt=""></td>
                // <td><input type="number" name="weight[]" class="form-control weight" placeholder="Enter Weight"></td>

            });

            // Delete row
            $('.addMoreProduct').on('click', '.delete', function() {
                $(this).closest('tr').remove();
                updateRowNumbers();
                calculateGrandTotal(); // Add this to update the total after deletion
            });

            // Update price when product is selected
            $('.addMoreProduct').on('change', '.product_id', function() {
                let row = $(this).closest('tr');
                let price = $(this).find('option:selected').data('price') || 0;
                row.find('.price').val(price);
                calculateRowTotal(row);
            });

            // Calculate total on quantity, price, or discount input
            $('.addMoreProduct').on('keyup change', '.quantity, .price, .discount', function() {
                let row = $(this).closest('tr');
                calculateRowTotal(row);
                calculateGrandTotal(); // Add this to update the total
            });

            function calculateRowTotal(row) {
                let price = parseFloat(row.find('.price').val()) || 0;
                let quantity = parseFloat(row.find('.quantity').val()) || 0;
                let discount = parseFloat(row.find('.discount').val()) || 0;

                let total_amount = (price * quantity) - ((price * quantity) * discount / 100);
                row.find('.total_amount').val(total_amount.toFixed(2));
            }

            function updateRowNumbers() {
                $('.addMoreProduct tr').each(function(index) {
                    $(this).find('td:first').text(index + 1);
                });
            }

            function calculateGrandTotal() {
                let grandTotal = 0;
                $('.total_amount').each(function() {
                    let amount = parseFloat($(this).val()) || 0;
                    grandTotal += amount;
                });
                // Update both the text and data attribute
                $('.total').text(grandTotal.toFixed(2));
                $('.total').data('total', grandTotal);
            }


            function calculateRowTotal(row) {
                let price = parseFloat(row.find('.price').val()) || 0;
                let quantity = parseFloat(row.find('.quantity').val()) || 0;
                let discount = parseFloat(row.find('.discount').val()) || 0;

                let total_amount = (price * quantity) - ((price * quantity) * discount / 100);
                row.find('.total_amount').val(total_amount.toFixed(2));

                calculateGrandTotal(); // Add this to update the total
            }

            // Calculate grand total on page load
            $('#paid_amount').on('keyup change', function() {
                let paidAmount = parseFloat($(this).val()) || 0;
                let grandTotal = parseFloat($('.total').text()) || 0;
                let balance = paidAmount - grandTotal;
                $('#balance').val(balance.toFixed(2));
            });
        });

        $('form').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        // Show success message
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 3000,
                            toast: true,
                            customClass: {
                                popup: 'custom-swal-popup',
                                title: 'custom-swal-title',
                                icon: 'custom-swal-icon'
                            }
                        });

                        // Store order ID for printing
                        localStorage.setItem('last_order_id', response.order_id);

                        // If the print button was clicked, automatically show receipt
                        if (window.printAfterSave) {
                            window.printAfterSave = false;
                            printReceipt(response.order_id);
                        }
                    }
                },
                error: function(xhr) {
                    let errorMsg = 'Error creating order';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMsg = xhr.responseJSON.message;
                    }

                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: errorMsg,
                        showConfirmButton: false,
                        timer: 5000,
                        toast: true
                    });
                }
            });
        });

        // Print button functionality
        $('#printOrder').on('click', function(e) {
            e.preventDefault();

            // Check if we need to save the order first
            const formHasChanges = $('form').serialize() !== $('form').data('original-state');
            const lastOrderId = localStorage.getItem('last_order_id');

            if (formHasChanges) {
                // Need to save first, then print
                window.printAfterSave = true;
                $('form').submit();
            } else if (lastOrderId) {
                // Already saved, just print
                printReceipt(lastOrderId);
            } else {
                // No order to print
                Swal.fire({
                    position: 'top-end',
                    icon: 'warning',
                    title: 'Please save an order first',
                    showConfirmButton: false,
                    timer: 3000,
                    toast: true
                });
            }
        });

        // Function to open receipt window and load data
        function printReceipt(orderId) {
            // Open a new window
            const receiptWindow = window.open('', 'Receipt', 'width=800,height=800,left=' +
                ((screen.width - 800) / 2) + ',top=' + ((screen.height - 800) / 2));

            // Fetch the receipt data
            $.ajax({
                url: '/orders/receipt/' + orderId,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Check if data exists
                    if (!data) {
                        receiptWindow.close();
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Error: No data received',
                            showConfirmButton: false,
                            timer: 3000,
                            toast: true
                        });
                        return;
                    }

                    // Load the receipt template into the new window
                    $.get('/receipt-template', function(template) {
                        receiptWindow.document.write(template);

                        // Fill in the receipt data
                        $(receiptWindow.document).ready(function() {
                            try {
                                // Fill customer and order info
                                $(receiptWindow.document).find('#customer-name').text(data.order
                                    .name || 'N/A');
                                $(receiptWindow.document).find('#customer-phone').text(data
                                    .order.phone || 'N/A');
                                $(receiptWindow.document).find('#order-id').text(data.order
                                    .id || 'N/A');
                                $(receiptWindow.document).find('#order-date').text(data.order
                                    .created_at ?
                                    new Date(data.order.created_at).toLocaleString() : 'N/A'
                                    );

                                // Fill items
                                let itemsHtml = '';
                                if (data.orderDetails && data.orderDetails.length > 0) {
                                    data.orderDetails.forEach(function(item) {
                                        itemsHtml += `
                                <tr>
                                    <td>${item.product_name || 'N/A'}</td>
                                    <td>${item.quantity || '0'}</td>
                                    <td>₱${parseFloat(item.unitprice || 0).toFixed(2)}</td>
                                    <td>${item.discount || '0'}%</td>
                                    <td>₱${parseFloat(item.amount || 0).toFixed(2)}</td>
                                </tr>
                                `;
                                    });
                                } else {
                                    itemsHtml = '<tr><td colspan="5">No items found</td></tr>';
                                }
                                $(receiptWindow.document).find('#receipt-items').html(
                                itemsHtml);

                                // Fill totals
                                $(receiptWindow.document).find('#total-amount').text('₱' +
                                    parseFloat(data.transaction?.tansaction_amount || 0)
                                    .toFixed(2));
                                $(receiptWindow.document).find('#paid-amount').text('₱' +
                                    parseFloat(data.transaction?.paid_amount || 0).toFixed(
                                        2));
                                $(receiptWindow.document).find('#change-amount').text('₱' +
                                    parseFloat(data.transaction?.balance || 0).toFixed(2));

                                // Fill footer
                                $(receiptWindow.document).find('#payment-method').text(
                                    data.transaction?.payment_method ?
                                    (data.transaction.payment_method.charAt(0)
                                    .toUpperCase() +
                                        data.transaction.payment_method.slice(1)) : 'N/A'
                                );
                                $(receiptWindow.document).find('#served-by').text(data.user ||
                                    'N/A');
                            } catch (e) {
                                console.error('Error processing receipt data:', e);
                            }
                        });
                    });
                },
                error: function(xhr, status, error) {
                    receiptWindow.close();
                    console.error('AJAX error:', xhr.responseText);
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Error loading receipt: ' + error,
                        showConfirmButton: false,
                        timer: 3000,
                        toast: true
                    });
                }
            });
        }

        // Store the original form state for comparison
        $(document).ready(function() {
            $('form').data('original-state', $('form').serialize());
        });

        // Check for success message
        @if (Session::has('success-swal'))
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: "{{ Session::get('success-swal') }}",
                showConfirmButton: false,
                timer: 5000,
                toast: true,
                customClass: {
                    popup: 'custom-swal-popup',
                    title: 'custom-swal-title',
                    icon: 'custom-swal-icon'
                }
            });
        @endif

        // Check for error message
        @if (Session::has('error-swal'))
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: "{{ Session::get('error-swal') }}",
                showConfirmButton: false,
                timer: 5000,
                toast: true
            });
        @endif
    </script>
@endsection
