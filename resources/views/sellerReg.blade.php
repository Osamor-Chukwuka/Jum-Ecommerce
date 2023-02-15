<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
<!-- Scripts -->
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"
    integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<title>Jum / Seller</title>

{{-- STYLING FOR CREATING MULTI STEP FORM --}}
{{-- <style>
    .form-section {
        display: none;
    }

    .form-section.current {
        display: inline;
    }

    .parsley-errors-list {
        color: red;
    }
</style> --}}

<div class="container container-sm mt-4 ">
    <h1 class="border-bottom border-5 border-success">SELLER CENTER</h1>
    <p class="lead">Register and start selling today - create your own seller account</p>
</div>
<div class="m-4 bg-secondary bg-gradient">

    <div class="card px-5 py-3 mt-5 shadow">

        <div class="nav nav-fill my-3">
            
            <label class="nav-link shadow-sm step0    border ml-2 ">Step One</label>
            <label class="nav-link shadow-sm step1   border ml-2 ">Step Two</label>
            <label class="nav-link shadow-sm step2   border ml-2 ">Step Three</label>
        </div>
    </div>
    <form class="mx-3 text-white pb-3 employee-form" method="post" action="/seller/reg">
        @csrf
        <legend class="mt-4">Add Seller Account Information</legend>

        <div class="form-section">


            {{-- ROW FOR LABEL AND INPUT 1 --}}
            <div class="row g-0 g-lg-3 align-items-center">
                <div class=" col-auto col-lg-auto">
                    <label for="" class="col-form-label fw-bold">Shop Name *</label>
                </div>
                <div class="col-12 col-lg-auto">
                    <input name="shopName" type="text" id="" class="form-control" aria-describedby="passwordHelpInline">
                </div>
            </div>

            {{-- ROW FOR TEXT UNDER INPUT 1 --}}
            <div class="row g-3 allign-items-center text-white">
                <div class="col-auto">
                    <label for="" class="col-form-label fw-bold "   ></label>
                </div>
                <div class="col-lg-6 col-auto">
                    <p id="passwordHelpInline" class="form-text text-white">
                        Choose a unique name for your online shop: this is the name that will appear
                        on the Jumia marketplace! It is forbidden to use a registered trademark in your shop name
                        without the brand authorization
                    </p>
                </div>
            </div>

            {{-- ROW FOR LABEL AND INPUT 2 --}}
            <div class="row g-0 g-lg-3 align-items-center">
                <div class=" col-auto col-lg-auto">
                    <label for="" class="col-form-label fw-bold">Account Manager First and Last Name
                        *</label>
                </div>
                <div class="col-12 col-lg-auto">
                    <input name="accountManager" type="text" id="" class="form-control" aria-describedby="passwordHelpInline">
                </div>
            </div>

            {{-- ROW FOR TEXT UNDER INPUT 2 --}}
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

            {{-- ROW FOR LABEL AND INPUT 3 --}}
            <div class="row g-0 g-lg-3 align-items-center">
                <div class=" col-auto col-lg-auto">
                    <label for="" class="col-form-label fw-bold">Account manager phone number *</label>
                </div>
                <div class="col-12 col-lg-auto">
                    <input name="phoneNumber" type="text" id="" class="form-control" aria-describedby="passwordHelpInline">
                </div>
            </div>

            {{-- ROW FOR TEXT UNDER INPUT 3 --}}
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

            {{-- ROW FOR LABEL AND INPUT 4 --}}
            <div class="row g-0 g-lg-3 align-items-center">
                <div class=" col-auto col-lg-auto">
                    <label for="" class="col-form-label fw-bold">Additional phone number</label>
                </div>
                <div class="col-12 col-lg-auto">
                    <input name="phoneNumberTwo" type="text" id="" class="form-control" aria-describedby="passwordHelpInline">
                </div>
            </div>

            {{-- ROW FOR TEXT UNDER INPUT 4 --}}
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

            {{-- ROW FOR LABEL AND INPUT 5 --}}
            {{-- <div class="row g-0 g-lg-3 align-items-center">
                <div class=" col-auto col-lg-auto">
                    <label for="" class="col-form-label fw-bold">Email Address *</label>
                </div>
                <div class="col-12 col-lg-auto">
                    <input type="text" id="" class="form-control" aria-describedby="passwordHelpInline">
                </div>
            </div> --}}

            {{-- ROW FOR TEXT UNDER INPUT 5 --}}
            {{-- <div class="row g-3 allign-items-center text-white">
                <div class="col-auto">
                    <label for="" class="col-form-label fw-bold " hidden></label>
                </div>
                <div class="col-lg-6 col-auto">
                    <p id="passwordHelpInline" class="form-text text-white">
                        Your account will be linked to this email address and we will use it to send all our
                        communications.
                    </p>
                </div>
            </div> --}}

            {{-- ROW FOR LABEL AND INPUT 6 --}}
            {{-- <div class="row g-0 g-lg-3 align-items-center">
                <div class=" col-auto col-lg-auto">
                    <label for="" class="col-form-label fw-bold">Password *</label>
                </div>
                <div class="col-12 col-lg-auto">
                    <input type="text" id="" class="form-control" aria-describedby="passwordHelpInline">
                </div>
            </div> --}}

            {{-- ROW FOR TEXT UNDER INPUT 6 --}}
            {{-- <div class="row g-3 allign-items-center text-white">
                <div class="col-auto">
                    <label for="" class="col-form-label fw-bold " hidden></label>
                </div>
                <div class="col-lg-6 col-auto">
                    <p id="passwordHelpInline" class="form-text text-white">
                        At least 8 characters.
                    </p>
                </div>
            </div> --}}

            {{-- ROW FOR LABEL AND INPUT 7 --}}
            {{-- <div class="row g-0 g-lg-3 align-items-center">
                <div class=" col-auto col-lg-auto">
                    <label for="" class="col-form-label fw-bold">Retype Password *</label>
                </div>
                <div class="col-12 col-lg-auto">
                    <input type="text" id="" class="form-control" aria-describedby="passwordHelpInline">
                </div>
            </div>
        </div> --}}

        <div class="form-section">
            {{-- ROW FOR LABEL AND INPUT 8 --}}
            <div class="row g-0 g-lg-3 align-items-center pt-5">
                <div class=" col-auto col-lg-auto">
                    <label for="" class="col-form-label fw-bold">Address *</label>
                </div>
                <div class="col-12 col-lg-auto">
                    <input name="address" type="text" id="" class="form-control" aria-describedby="passwordHelpInline">
                </div>
            </div>

            {{-- ROW FOR TEXT UNDER INPUT 8 --}}
            <div class="row g-3 allign-items-center text-white">
                <div class="col-auto">
                    <label for="" class="col-form-label fw-bold " hidden></label>
                </div>
                <div class="col-lg-6 col-auto">
                    <p id="passwordHelpInline" class="form-text text-white">
                        If you are a Business Entity/Company, indicate the official address of the entity. If you are an
                        individual, indicate your address.
                    </p>
                </div>
            </div>

            {{-- ROW FOR LABEL AND INPUT 9 --}}
            <div class="row g-0 g-lg-3 align-items-center">
                <div class=" col-auto col-lg-auto">
                    <label for="" class="col-form-label fw-bold">City / Town *</label>
                </div>
                <div class="col-12 col-lg-auto">
                    <input name="city" type="text" id="" class="form-control" aria-describedby="passwordHelpInline">
                </div>
            </div>

            {{-- ROW FOR LABEL AND INPUT 10 --}}
            <div class="row g-0 g-lg-3 align-items-center pt-4">
                <div class=" col-auto col-lg-auto">
                    <label for="" class="col-form-label fw-bold">Country *</label>
                </div>
                <div class="col-12 col-lg-auto">
                    <select name="country" id="" class="">
                        <option value="Nigeria">Nigeria</option>
                    </select>
                </div>
            </div>

            {{-- ROW FOR LABEL AND INPUT 11 --}}
            <div class="row g-0 g-lg-3 align-items-center pt-4">
                <div class=" col-auto col-lg-auto">
                    <label for="" class="col-form-label fw-bold">Bank *</label>
                </div>
                <div class="col-12 col-lg-auto">
                    <select name="bank" id="" class="">
                        <option value="Fidelity">Fidelity</option>
                        <option value="Kuda">Kuda</option>
                    </select>
                </div>
            </div>

            {{-- ROW FOR LABEL AND INPUT 12 --}}
            <div class="row g-0 g-lg-3 align-items-center pt-4">
                <div class=" col-auto col-lg-auto">
                    <label for="" class="col-form-label fw-bold">Account number *</label>
                </div>
                <div class="col-12 col-lg-auto">
                    <input name="accountNumber" type="text" id="" class="form-control" aria-describedby="passwordHelpInline">
                    
                </div>
            </div>
        </div>

        <div class="form-navigation mt-3">
            <button type="button" class="previous btn btn-primary float-left">&lt; Previous</button>
            <button type="button" class="next btn btn-primary float-right">Next &gt;</button>
            <button type="submit" class="btn btn-success float-right">Submit</button>
        </div>

        {{-- <div>
            <button>CO</button>
        </div> --}}

    </form>
</div>
</div>

{{-- PARSELY JS SCRIPT TO CREATE THE MULTI STEP FORM --}}
<script>
    $(function(){
        var $sections=$('.form-section');
        function navigateTo(index){
            $sections.removeClass('current').eq(index).addClass('current');
            $('.form-navigation .previous').toggle(index>0);
            var atTheEnd = index >= $sections.length - 1;
            $('.form-navigation .next').toggle(!atTheEnd);
            $('.form-navigation [Type=submit]').toggle(atTheEnd);
     
            const step= document.querySelector('.step'+index);
            step.style.backgroundColor="#17a2b8";
            step.style.color="white";
        }
        function curIndex(){
            return $sections.index($sections.filter('.current'));
        }
        $('.form-navigation .previous').click(function(){
            navigateTo(curIndex() - 1);
        });
        $('.form-navigation .next').click(function(){
            $('.employee-form').parsley().whenValidate({
                group:'block-'+curIndex()
            }).done(function(){
                navigateTo(curIndex()+1);
            });
        });
        $sections.each(function(index,section){
            $(section).find(':input').attr('data-parsley-group','block-'+index);
        });
        navigateTo(0);
    });
</script>