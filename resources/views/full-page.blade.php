@include('layouts.app')

@php
     $images = explode('|', $allProducts->images);
@endphp


<section class="bg-light mt-5 pt-5">
    @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
    {{-- <h2>{{$allProducts}}</h2> --}}

    <div class="row my-3 allign-items-center  justify-content-center g-4">
        <div class="col-8 col-lg-4 col-xl-3 bg-white">
            <div class="mt-5">
                {{-- <div>{{$images->$images}}</div> --}}
                <img src="{{ asset('storage/images/houses/' . $images[0]) }}" alt="ebook cover" class="img-fluid"><hr>
                <span class="fw-bold">SHARE THIS PRODUCT</span>
            </div>
            <!-- {{-- <div class="card border-0">
                <div class="card-body text-center py-4">
                    <h4 class="card-title">Starter Edition</h4>
                    <p class="lead card-subtitle">eBook download only</p>
                    <p class="display-5 my-4 text-primary fw-bold">$12.99</p>
                    <p class="card-text mx-5 text-muted d-none d-lg-block">Lorem ipsum dolor
                    it amet consectetur adipisicing elit.</p>
                    <a href="#" class="btn btn-outline-primary btn-lg mt-3">Buy Now</a>
                </div>
            </div> --}} -->
        </div>

        <div class="col-9 col-lg-4 bg-white">
            <div class="card border-0 mt-4">
                <p class="h4">{{ $allProducts->name }} {{$allProducts->description}}</p>
                <p class="h4 mt-5 fw-bold">{{'N ' . $allProducts->price }} </p>
                <p class="text-secondary">In stock</p>
                <div>
                    <form action="" method="post">
                        @csrf
                        <input type="hidden" name="name" value="{{$allProducts->name}}">
                        <input type="hidden" name="price" value="{{$allProducts->price}}">
                        <input type="hidden" name="category_id" value="{{$allProducts->categories_id}}">
                        <input type="hidden" name="product_id" value="{{$allProducts->id}}">
                        <input type="hidden" name="description" value="{{$allProducts->description}}">
                        <button type="submit" class="btn btn-xl btn-success ">ADD TO CART</button>
                    </form>
                    
                </div>

                {{-- <div class="card-header text-center text-primary">Most Popular</div>
                <div class="card-body text-center py-5">
                    <h4 class="card-title">Complete Edition</h4>
                    <p class="lead card-subtitle">eBook download & all updates</p>
                    <p class="display-4 my-4 text-primary fw-bold">$18.99</p>
                    <p class="card-text mx-5 text-muted d-none d-lg-block">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <a href="#" class="btn btn-outline-primary btn-lg mt-3">Buy Now</a>
                </div> --}}
            </div>
        </div>
        
        <div class="col-8 col-lg-4 col-xl-3">
            <div class="card border-0 text-center">
                <p class="h6 fw-bold mt-3">DELIVERY & RETURNS</p>
                <p>Free delivery on products in Bingham University</p>

                <div class="border-top border-1">
                    <p class="mt-2 fw-bold">Choose your delivery location in Bingham</p>
                </div>

                <form action="">
                    <input class="input mb-3  py-2 px-5 " type="text" placeholder="Computer Large Hall">
                </form>

                <div class="border-bottom">
                    <h6 class="h6 fw-bold">Return Policy</h6>
                    <p class="small ">Free Return within 15 days for official store items and 7 days for other eligible items</p>
                </div>

                <h6 class="h6 fw-bold mt-3">Warranty</h6>
                <p class="small">1 Year</p>

                {{-- <h6 class="h6 fw-bold mt-3"></h6> --}}

                <div class="accordion mb-5" id="chapters">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading-1">
                            <button class="btn fw-bold" type="button" data-bs-toggle="collapse"
                            data-bs-target="#chapter-1" aria-expanded="false" aria-controls="chapter-1">
                            Seller Information
                            </button>
                        </h2>

                        <div id="chapter-1" class="accordion-collpase collapse show" aria-labelledby="heading-1" data-bs-parent="#chapters">
                            <div class="accordion-body">
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat id rem est. Earum iste, fugit necessitatibus
                                    enim in debitis perferendis totam, at tempora explicabo officiis temporibus et quas animi saepe!
                                </p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur error minima accusantium, facilis
                                    perferendis sint, sapiente adipisci quasi aliquam itaque consectetur! Praesentium sit nihil quas eveniet
                                    explicabo, voluptatibus error vero!
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="card-body text-center py-4">
                    <h4 class="card-title">Ultimate Edition</h4>
                    <p class="lead card-subtitle">download, updates & extras</p>
                    <p class="display-5 my-4 text-primary fw-bold">$24.99</p>
                    <p class="card-text mx-5 text-muted d-none d-lg-block">Lorem ipsum dolor
                    it amet consectetur adipisicing elit.</p>
                    <a href="#" class="btn btn-outline-primary btn-lg mt-3">Buy Now</a>
                </div> --}}
            </div>
        </div>
    </div>
</div>
</section>
