@props(['category'])


<div class="col-auto col-lg-2 col-xl-2">
    <div class="card border-0">
        <div class="card-body text-center py-4">
            {{-- <h4 class="card-title">Starter Edition</h4>
            <p class="lead card-subtitle">eBook download only</p> --}}
            <div class="">
                @if ($category->category == 'Books')
                    <img src="{{ asset('storage/images/categories/' . $category->category . '.png') }}" alt="ebook cover"
                        class="img-fluid">
                    <hr>
                @else
                    <img src="{{ asset('storage/images/categories/' . $category->category . '.jpg') }}" alt="ebook cover"
                        class="img-fluid">
                    <hr>
                @endif

            </div>
            {{-- <form action="/category/products/{{$category->id}}">
                <button class="p border-0" type="submit"><p class="display-7 lead my-4 text-secondary fw-bold">{{$category->category}}</p></button>
                
            </form> --}}
            <a class="p text-black" href="/category/products/{{ $category->id }}">
                <p class="display-7 lead my-4 text-secondary fw-bold">{{ $category->category }}</p>
            </a>

            {{-- <p class="display-6 my-4 text-primary fw-bold">$12.99</p> --}}
            {{-- <p class="card-text mx-5 text-muted d-none d-lg-block">Lorem ipsum dolor
            it amet consectetur adipisicing elit.</p> --}}
            {{-- <a href="#" class="btn btn-outline-primary btn-lg mt-3">Buy Now</a> --}}
        </div>
    </div>
</div>
