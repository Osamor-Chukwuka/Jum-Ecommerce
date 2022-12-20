@include('layouts.app')


<section id="pricing" class="bg-light mt-5 pt-5">
    <div class="container-lg">
        {{-- <div class="text-center">
            <h2>Pricing Plans</h2>
            <p class="lead text-muted">Choose a pricing plan to suit you</p>
        </div>
         --}}
        @if(count($relationship) == 0)
            <p>
                No Product Found in this Category
            </p>
        @endif
        
        <div class="row my-5 ">
            @foreach($relationship as $relation)
                <x-products-card :relation="$relation"/>
            @endforeach
        </div>
        
</section>

@include('layouts.footer')
