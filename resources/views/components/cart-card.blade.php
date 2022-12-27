@props(['showCartt'])

<div class="col-8 col-lg-7 col-xl-7">
    <div class="mt-4 bg-white">
        <p class="h3 pt-3 ps-3 mb-3">Cart</p>

        <a href="" class="check">
            <div class="col-auto col-lg-2 col-xl-9">
                <div class="row">
                    <div class="col-md-2">
                        <img src="{{ asset('images/ebook-cover.png') }}" alt="ebook cover" class="img-fluid">
                    </div>
                    <div class="col-md- col-lg-5 ml-auto d-flex align-items-center mt-4 mt-md-0">
                        <ul class="list-unstyled">
                            <li>
                                <p class="fw-bold">{{ $showCartt->name }}</p>
                            </li>
                            <li>
                                <p>Seller: chukss</p>
                            </li>
                            <li>
                                In stock
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </a>

        <form action="cart/delete" method="POST">
            @csrf
            <input type="text" name="id" hidden value= {{$showCartt->id}}>
            <input type="text" name="users_id" hidden value= {{$showCartt->users_id}}>
            <button class="fw-bold ms-3 mt-2 h6 border-0 bg-white text-success mb-3"><i class="bi bi-trash3-fill"></i>
            REMOVE
            </button>
        </form>
        
    </div>
    <!-- <div class="card border-0">
        <div class="card-body text-center py-4">
            <h4 class="card-title">Starter Edition</h4>
            <p class="lead card-subtitle">eBook download only</p>
            <p class="display-5 my-4 text-primary fw-bold">$12.99</p>
            <p class="card-text mx-5 text-muted d-none d-lg-block">Lorem ipsum dolor
            it amet consectetur adipisicing elit.</p>
            <a href="#" class="btn btn-outline-primary btn-lg mt-3">Buy Now</a>
        </div>
    </div> -->
</div>

<div class="col-9 col-lg-2">

    <div class="card border-0 bg-white pb-5 mt-4">
        <p class="h4"></p>
        <p class="h4 mt-5 ms-5 pb-4 fw-bold">{{ $showCartt->price }}</p>

        <div class="btn-group">
            <form action="cart/product/add_quantity" method="post">
                @csrf
                <input type="text" name="id" hidden value="{{$showCartt->id}}">
                <button class="text-success h1 border-0 bg-white"><i class="bi bi-file-plus-fill "></i></button>
            </form>
            <p class="fw-bold mt-2 mx-3">{{$showCartt->quantity}}</p>
            <form action="cart/product/decrease_quantity" method="post">
                @csrf
                <input name="id" type="text" hidden value="{{$showCartt->id}}">
                <button class="text-success h1 border-0 bg-white"><i class="bi bi-file-minus-fill "></i></button>
            </form>
            
        </div>

        <!-- <div class="card-header text-center text-primary">Most Popular</div>
        <div class="card-body text-center py-5">
            <h4 class="card-title">Complete Edition</h4>
            <p class="lead card-subtitle">eBook download & all updates</p>
            <p class="display-4 my-4 text-primary fw-bold">$18.99</p>
            <p class="card-text mx-5 text-muted d-none d-lg-block">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <a href="#" class="btn btn-outline-primary btn-lg mt-3">Buy Now</a>
        </div> -->
    </div>
</div>


<style>
    .check{
        text-decoration: none;
        color: black;
    }

    .check:hover{
        color: green;
    }
</style>