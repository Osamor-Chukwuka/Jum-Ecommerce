@include('layouts.app')

<section class="bg-light mt-2 pt-5">

    <div class="row my-3 allign-items-center  justify-content-center g-4">
        <div class="col-8 col-lg-7 col-xl-7">
            <div class="mt-4 bg-white">
                <p class="h3 pt-3 ps-3 mb-3">Cart</p>

                <div class="col-auto col-lg-2 col-xl-9">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="{{ asset('images/ebook-cover.png') }}" alt="ebook cover" class="img-fluid">
                        </div>
                        <div class="col-md- col-lg-5 ml-auto d-flex align-items-center mt-4 mt-md-0">
                            <ul class="list-unstyled">
                                <li>
                                    <p class="fw-bold">Iphone 11 Black 25Gb</p>
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
                <button class="fw-bold ms-3 mt-2 h6 border-0 bg-white text-success mb-3"><i class="bi bi-trash3-fill"></i>
                    REMOVE</button>
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
                <p class="h4 mt-5 ms-5 pb-4 fw-bold">N2,000</p>

                <div class="btn-group">
                    <button class="text-success h1 border-0 bg-white"><i class="bi bi-file-plus-fill "></i></button>
                    <p class="fw-bold mt-2 mx-3">1</p>
                    <button class="text-success h1 border-0 bg-white"><i class="bi bi-file-minus-fill "></i></button>
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

        <div class="col-8 col-lg-2 col-xl-2">
            <div class="card border-0 ">
                <p class="h6 ps-2 fw-bold mt-3 border-bottom ">CART SUMMARY</p>

                <div class="row allign-items-start fw-bold">
                    <div class="col-lg-5">
                        <p class="pt-3 ps-2">Subtotal:</p>
                    </div>

                    <div class="col pt-3">
                        <h4 class="fw-bold">N30,000</h4>
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
                    </div> --}}
        </div>
    </div>
</section>
