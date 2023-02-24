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
    <div class="container">
        <div class="row ">
            <div class="col-lg-2 mx-5">
                <div class="card border-0 mb-3 mt-3">
                    <div class="card-body text-center py-4">
                        {{-- <h4 class="card-title">Starter Edition</h4>
                        <p class="lead card-subtitle">eBook download only</p> --}}
                        <div class="">
                            <img src="{{asset('images/ebook-cover.png')}}" alt="ebook cover" class="img-fluid"><hr>
                        </div>
                        {{-- <form action="/category/products/{{$category->id}}">
                            <button class="p border-0" type="submit"><p class="display-7 lead my-4 text-secondary fw-bold">{{$category->category}}</p></button>
                            
                        </form> --}}
                        <a class="p text-black" href="/products/full/">
                            <p class="display-7 text-secondary fw-bold">NAme</p>
                            {{-- <p class="display-7 lead my-4 text-secondary fw-bold">{{$relation->price}}</p> --}}
                        </a>
                        
                        <p class="h4 text-primary fw-bold">NPrice</p>
                        <button class="btn  btn-success">Buy Now</button>
                        {{-- <p class="card-text mx-5 text-muted d-none d-lg-block">Lorem ipsum dolor
                        it amet consectetur adipisicing elit.</p> --}}
                        {{-- <a href="#" class="btn btn-outline-primary btn-lg mt-3">Buy Now</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    
    <div class="container">
        <h1>Ordered</h1>
        <div class="row ">
            <div class="col-lg-2 mx-5">
                <div class="card border-0 mb-3 mt-3">
                    <div class="card-body text-center py-4">
                        {{-- <h4 class="card-title">Starter Edition</h4>
                        <p class="lead card-subtitle">eBook download only</p> --}}
                        <div class="">
                            <img src="{{asset('images/ebook-cover.png')}}" alt="ebook cover" class="img-fluid"><hr>
                        </div>
                        {{-- <form action="/category/products/{{$category->id}}">
                            <button class="p border-0" type="submit"><p class="display-7 lead my-4 text-secondary fw-bold">{{$category->category}}</p></button>
                            
                        </form> --}}
                        <a class="p text-black" href="/products/full/">
                            <p class="display-7 text-secondary fw-bold">NAme</p>
                            {{-- <p class="display-7 lead my-4 text-secondary fw-bold">{{$relation->price}}</p> --}}
                        </a>
                        
                        <p class="h4 text-primary fw-bold">NPrice</p>
                        <button class="btn  btn-success">Buy Now</button>
                        {{-- <p class="card-text mx-5 text-muted d-none d-lg-block">Lorem ipsum dolor
                        it amet consectetur adipisicing elit.</p> --}}
                        {{-- <a href="#" class="btn btn-outline-primary btn-lg mt-3">Buy Now</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    
    <div class="container">
        <h1>Delivered</h1>
        <div class="row ">
            <div class="col-lg-2 mx-5">
                <div class="card border-0 mb-3 mt-3">
                    <div class="card-body text-center py-4">
                        {{-- <h4 class="card-title">Starter Edition</h4>
                        <p class="lead card-subtitle">eBook download only</p> --}}
                        <div class="">
                            <img src="{{asset('images/ebook-cover.png')}}" alt="ebook cover" class="img-fluid"><hr>
                        </div>
                        {{-- <form action="/category/products/{{$category->id}}">
                            <button class="p border-0" type="submit"><p class="display-7 lead my-4 text-secondary fw-bold">{{$category->category}}</p></button>
                            
                        </form> --}}
                        <a class="p text-black" href="/products/full/">
                            <p class="display-7 text-secondary fw-bold">NAme</p>
                            {{-- <p class="display-7 lead my-4 text-secondary fw-bold">{{$relation->price}}</p> --}}
                        </a>
                        
                        <p class="h4 text-primary fw-bold">NPrice</p>
                        <button class="btn  btn-success">Buy Now</button>
                        {{-- <p class="card-text mx-5 text-muted d-none d-lg-block">Lorem ipsum dolor
                        it amet consectetur adipisicing elit.</p> --}}
                        {{-- <a href="#" class="btn btn-outline-primary btn-lg mt-3">Buy Now</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('layouts.footer')
@endfragment