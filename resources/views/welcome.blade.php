@include('layouts.app')


<section id="pricing" class="bg-light mt-5 pt-5">
    <div class="container-lg">
        <div class="text-center">
            <h2>Pricing Plans</h2>
            <p class="lead text-muted">Choose a pricing plan to suit you</p>
        </div>
        
        @if(count($Categories) == 0)
            <p>
                No categories Found
            </p>
        @endif
        
        <div class="row my-5 ">
            @foreach($Categories as $category)
                <x-categories-card :category="$category"/>
            @endforeach
        </div>
        
</section>

@include('layouts.footer')
