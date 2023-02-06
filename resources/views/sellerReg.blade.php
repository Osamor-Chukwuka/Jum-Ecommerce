<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
<!-- Scripts -->
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
<title>Jum / Seller</title>

<div class="container container-sm mt-4 ">
    <h1 class="border-bottom border-5 border-success">SELLER CENTER</h1>
    <p class="lead">Register and start selling today - create your own seller account</p>

   <div class="m-4 bg-secondary bg-gradient">
        <form class="mx-3 text-white pb-3">
            <legend class="mt-4">Add Seller Account Information</legend>

            {{-- ROW FOR LABEL AND INPUT 1--}}
            <div class="row g-0 g-lg-3 align-items-center">
                <div class=" col-auto col-lg-auto">
                    <label for="" class="col-form-label fw-bold">Shop Name *</label>
                </div>
                <div class="col-12 col-lg-auto">
                    <input type="text" id="" class="form-control" aria-describedby="passwordHelpInline">
                </div>
            </div>

            {{-- ROW FOR TEXT UNDER INPUT 1--}}
            <div class="row g-3 allign-items-center text-white">
                <div class="col-auto">
                    <label for="" class="col-form-label fw-bold " hidden></label>
                </div>
                <div class="col-lg-6 col-auto">
                    <p id="passwordHelpInline" class="form-text text-white">
                        Choose a unique name for your online shop: this is the name that will appear
                        on the Jumia marketplace! It is forbidden to use a registered trademark in your shop name without the brand authorization
                    </p>
                </div>
            </div>

            {{-- ROW FOR LABEL AND INPUT 2--}}
            <div class="row g-0 g-lg-3 align-items-center">
                <div class=" col-auto col-lg-auto">
                    <label for="" class="col-form-label fw-bold">Account Manager First and Last Name *</label>
                </div>
                <div class="col-12 col-lg-auto">
                    <input type="text" id="" class="form-control" aria-describedby="passwordHelpInline">
                </div>
            </div>

            {{-- ROW FOR TEXT UNDER INPUT 2--}}
            <div class="row g-3 allign-items-center text-white">
                <div class="col-auto">
                    <label for="" class="col-form-label fw-bold " hidden></label>
                </div>
                <div class="col-lg-6 col-auto">
                    <p id="passwordHelpInline" class="form-text text-white">
                        Your name or the name of the person in your team who will manage
                         your account. This is the contact we will primarily use to contact you.
                    </p>
                </div>
            </div>

            {{-- ROW FOR LABEL AND INPUT 3--}}
            <div class="row g-0 g-lg-3 align-items-center">
                <div class=" col-auto col-lg-auto">
                    <label for="" class="col-form-label fw-bold">Account manager phone number *</label>
                </div>
                <div class="col-12 col-lg-auto">
                    <input type="text" id="" class="form-control" aria-describedby="passwordHelpInline">
                </div>
            </div>

            {{-- ROW FOR TEXT UNDER INPUT 3--}}
            <div class="row g-3 allign-items-center text-white">
                <div class="col-auto">
                    <label for="" class="col-form-label fw-bold " hidden></label>
                </div>
                <div class="col-lg-6 col-auto">
                    <p id="passwordHelpInline" class="form-text text-white">
                        When we need to contact you urgently, this is the number we will call.
                    </p>
                </div>
            </div>

            {{-- ROW FOR LABEL AND INPUT 4--}}
            <div class="row g-0 g-lg-3 align-items-center">
                <div class=" col-auto col-lg-auto">
                    <label for="" class="col-form-label fw-bold">Additional phone number</label>
                </div>
                <div class="col-12 col-lg-auto">
                    <input type="text" id="" class="form-control" aria-describedby="passwordHelpInline">
                </div>
            </div>

            {{-- ROW FOR TEXT UNDER INPUT 4--}}
            <div class="row g-3 allign-items-center text-white">
                <div class="col-auto">
                    <label for="" class="col-form-label fw-bold " hidden></label>
                </div>
                <div class="col-lg-6 col-auto">
                    <p id="passwordHelpInline" class="form-text text-white">
                        Another number where we can reach you ?
                    </p>
                </div>
            </div>

            {{-- ROW FOR LABEL AND INPUT 5--}}
            <div class="row g-0 g-lg-3 align-items-center">
                <div class=" col-auto col-lg-auto">
                    <label for="" class="col-form-label fw-bold">Email Address *</label>
                </div>
                <div class="col-12 col-lg-auto">
                    <input type="text" id="" class="form-control" aria-describedby="passwordHelpInline">
                </div>
            </div>

            {{-- ROW FOR TEXT UNDER INPUT 5--}}
            <div class="row g-3 allign-items-center text-white">
                <div class="col-auto">
                    <label for="" class="col-form-label fw-bold " hidden></label>
                </div>
                <div class="col-lg-6 col-auto">
                    <p id="passwordHelpInline" class="form-text text-white">
                        Your account will be linked to this email address and we will use it to send all our communications.
                    </p>
                </div>
            </div>

            {{-- ROW FOR LABEL AND INPUT 6--}}
            <div class="row g-0 g-lg-3 align-items-center">
                <div class=" col-auto col-lg-auto">
                    <label for="" class="col-form-label fw-bold">Password *</label>
                </div>
                <div class="col-12 col-lg-auto">
                    <input type="text" id="" class="form-control" aria-describedby="passwordHelpInline">
                </div>
            </div>

            {{-- ROW FOR TEXT UNDER INPUT 6--}}
            <div class="row g-3 allign-items-center text-white">
                <div class="col-auto">
                    <label for="" class="col-form-label fw-bold " hidden></label>
                </div>
                <div class="col-lg-6 col-auto">
                    <p id="passwordHelpInline" class="form-text text-white">
                        At least 8 characters.
                    </p>
                </div>
            </div>

            {{-- ROW FOR LABEL AND INPUT 7--}}
            <div class="row g-0 g-lg-3 align-items-center">
                <div class=" col-auto col-lg-auto">
                    <label for="" class="col-form-label fw-bold">Retype Password *</label>
                </div>
                <div class="col-12 col-lg-auto">
                    <input type="text" id="" class="form-control" aria-describedby="passwordHelpInline">
                </div>
            </div>



        </form>
   </div>
</div>
