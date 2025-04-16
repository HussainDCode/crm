<style>
    .btn-outline {
        border: 1px solid #343a40;
        color: #343a40;
        background-color: transparent;
        padding: 5px 20px;
        font-size: 16px;
        transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
        margin-left: 5px;
        font-family: sans-serif;
    }

    .btn-outline:hover {
        background-color: #343a40;
        border-radius: 0px;
        color: white;
    }

    .btn-outline i {
        margin-right: 5px;
    }

    .btn-outline:focus {
        outline: none;
        box-shadow: 0 0 0 0.2rem rgba(35, 41, 47, 0.5);
    }

    /* .btn-outline:active {
        background-color: #343a40;
        color: white;
    } */

    .fa,
    .fa-brands {
        color: rgb(0, 255, 140);
    }

    .btn-outline.active {
        background-color: #343a40;
        color: white;
        border: 1px solid #343a40;
    }
</style>

<a href="#" class="btn btn-outline" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-sliders"></i></a>
<a href="/home" class="btn btn-outline"><i class="fa fa-home"></i> Home</a>
<a href="{{ route('users.index') }}"
    class="btn btn-outline {{ Request::is('users') || Request::is('users/*') ? 'active' : '' }}"><i
        class="fa fa-user"></i> Users</a>
<a href="{{ route('products.product') }}"
    class="btn btn-outline {{ Request::is('products') || Request::is('products/*') ? 'active' : '' }}"><i
        class="fa-brands fa-product-hunt"></i> Products</a>
<a href="{{ route('orders.order') }}"
    class="btn btn-outline {{ Request::is('orders') || Request::is('orders/*') ? 'active' : '' }}"><i
        class="fa fa-box"></i> Orders</a>
{{-- <a href="#" class="btn btn-outline {{ Request::is('orders') || Request::is('orders/*') ? 'active' : '' }}"><i class="fa fa-wallet"></i> Transactions</a>
<a href="#" class="btn btn-outline {{ Request::is('orders') || Request::is('orders/*') ? 'active' : '' }}"><i class="fa fa-laptop"></i> Cashier</a> --}}


<script>
    const currentUrl = window.location.pathname;
    const links = document.querySelectorAll('.btn-outline');

    links.forEach(link => {
        if (link.href.includes(currentUrl)) {
            link.classList.add('active');
        }
    });
</script>
