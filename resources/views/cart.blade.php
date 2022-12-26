@include('layouts.app')

<section class="bg-light mt-2 pt-5">

    <div class="row my-3 allign-items-center  justify-content-center g-4">
        @if(count($showCart) == 0)
            <p>
                No Product Found in this Category
            </p>
        @endif

        <div class="col-8 col-lg-2 col-xl-2 fixed-left">
            <div class="card border-0 ">
                <p class="h6 ps-2 fw-bold mt-3 border-bottom ">CART SUMMARY {{'('. $lencart .')'}}</p>
        
                <div class="row allign-items-start fw-bold">
                    <div class="col-lg-5">
                        <p class="pt-3 ps-2">Subtotal:</p>
                    </div>
        
                    <div class="col pt-3">
                        <h4 class="fw-bold">{{$totalPrice}}</h4>
                    </div>
                </div>
            </div>
            {{--                 
        
                <div class="border-top border-1">
                    <p class="mt-2 fw-bold">Choose your delivery location in Bingham</p>
                </div> 
            --}}
        
            <div class="bg-white mb-3 border-top">
                <form action="">
                    <button class="btn ms-3 mt-3 mb-3 btn-success btn-lg px-5">CHECKOUT</button>
                </form>
            </div>
        
            <div class="my-3 bg-light"></div>
        
            <div class="mt-4 bg-white">
                <h6 class="h6 fw-bold pt-2 ps-2">Returns are easy</h6>
                <p class="small ps-2">Free Return within 15 days for official store items and 7 days for other eligible
                    items</p>
            </div>
        
            {{-- <h6 class="h6 fw-bold mt-3">Warranty</h6>
            <p class="small">1 Year</p>
        
            <h6 class="h6 fw-bold mt-3"></h6>
        
            <div class="accordion mb-5" id="chapters">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading-1">
                        <button class="btn fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#chapter-1"
                            aria-expanded="false" aria-controls="chapter-1">
                            Seller Information
                        </button>
                    </h2>
        
                    <div id="chapter-1" class="accordion-collpase collapse show" aria-labelledby="heading-1"
                        data-bs-parent="#chapters">
                        <div class="accordion-body">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat id rem est. Earum iste,
                                fugit necessitatibus
                                enim in debitis perferendis totam, at tempora explicabo officiis temporibus et quas
                                animi saepe!
                            </p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur error minima
                                accusantium, facilis
                                perferendis sint, sapiente adipisci quasi aliquam itaque consectetur! Praesentium sit
                                nihil quas eveniet
                                explicabo, voluptatibus error vero!
                            </p>
                        </div>
                    </div>
                </div>
            </div> --}}

            
        </div>

        
        
        
        @foreach($showCart as $showCartt)
            <x-cart-card :showCartt="$showCartt"/>
        @endforeach

        

        
    </div>
</section>
