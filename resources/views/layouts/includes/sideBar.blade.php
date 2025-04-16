<style>
    #sidebar ul.lead {
        width: fit-content;
        border-bottom: 1px solid #ccc;
        transition: transform 0.3s ease-in-out;
    }

    #sidebar ul li a {
        display: block;
        padding: 10px 15px;
        color: #ababab;
        text-decoration: none;
        font-size: 18px;
        transition: background-color 0.3s ease-in-out;
        width: 30vh;
    }

    #sidebar ul li a:hover {
        color: #f8f9fa;
        background: #333;
        border-radius: 5px;
    }

    #sidebar ul li a i {
        margin-right: 10px;
    }

    #sidebar ul li.active>a, a[aria-expanded="true"] {
        background-color: #333;
        color: white;
        border-radius: 5px;
    }

    .fa-solid {
        color: rgb(0, 255, 140);
    }
</style>

<div class="active" id="sidebar">
    <ul class="list-unstyled lead">
        <li class="active">
            <a href="/home"  target="_blank" rel="noopener noreferrer"><i class="fa fa-home"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('orders.order') }}" target="_blank" rel="noopener noreferrer"><i class="fa fa-box"></i> Orders</a>
        </li>
        <li>
            <a href="{{ route('transactions.index') }}" target="_blank" rel="noopener noreferrer"><i class="fa-solid fa-wallet"></i> Transactions</a>
        </li>
        <li>
            <a href="{{ route('products.product') }}" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-product-hunt"></i> Products</a>
        </li>
        <li>
            <a href="{{ route('users.index') }}" target="_blank" rel="noopener noreferrer"><i class="fa fa-user"></i> User</a>
        </li>
    </ul>
</div>
