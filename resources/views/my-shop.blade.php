{{-- PRODUCTS --}}
@fragment('product')
@include('layouts.app')

<section id="pricing" class="bg-light mt-1 pt-5">
    <div class="card px-5 py-3 mt-5 shadow">
        <div class="nav nav-fill my-3">
            <label class="nav-link shadow-sm step0    border ml-2 "><a href="{{route('shop_products')}}"> My Products</a></label>
            <label class="nav-link shadow-sm step1   border ml-2 "><a href="{{route('shop_orders')}}">Orders</a></label>
            <label class="nav-link shadow-sm step2   border ml-2 "><a href="{{route('shop_delivered')}}"> Delivered</a></label>
        </div>
    </div>
    
    <h1>My shop Products</h1>
</section>

@include('layouts.footer')
@endfragment



{{-- ORDERS --}}

@fragment('orders')
@include('layouts.app')

<section id="pricing" class="bg-light mt-1 pt-5">
    <div class="card px-5 py-3 mt-5 shadow">
        <div class="nav nav-fill my-3">
            <label class="nav-link shadow-sm step0    border ml-2 "><a href="{{route('shop_products')}}"> My Products</a></label>
            <label class="nav-link shadow-sm step1   border ml-2 "><a href="{{route('shop_orders')}}">Orders</a></label>
            <label class="nav-link shadow-sm step2   border ml-2 "><a href="{{route('shop_delivered')}}"> Delivered</a></label>
        </div>
    </div>
    
    <h1>My shop Orders</h1>
</section>

@include('layouts.footer')
@endfragment




{{-- DELIVERED --}}

@fragment('delivered')
@include('layouts.app')

<section id="pricing" class="bg-light mt-1 pt-5">
    <div class="card px-5 py-3 mt-5 shadow">
        <div class="nav nav-fill my-3">
            <label class="nav-link shadow-sm step0    border ml-2 "><a href="{{route('shop_products')}}"> My Products</a></label>
            <label class="nav-link shadow-sm step1   border ml-2 "><a href="{{route('shop_orders')}}">Orders</a></label>
            <label class="nav-link shadow-sm step2   border ml-2 "><a href="{{route('shop_delivered')}}"> Delivered</a></label>
        </div>
    </div>
    
    <h1>My shop Delivered</h1>
</section>

@include('layouts.footer')
@endfragment