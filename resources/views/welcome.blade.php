@include('layouts.app')


<section id="pricing" class="bg-light mt-5 pt-5 mb-5 pb-5">

    <div class="jumbotron">
        <h1 class="animate__animated animate__bounceInDown" id="header_title">Bingham University E-commerce</h1>
    </div>

    <div class="container-lg">
        <div class="text-center">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <h2 class="mt-3">Products Categories</h2>
            <p class="lead text-muted">Choose a Category to see its products</p>
        </div>

        @if (count($Categories) == 0)
            <p>
                No categories Found
            </p>
        @endif

        <div class="row my-5 mb-5">
            @foreach ($Categories as $category)
                <x-categories-card :category="$category" />
            @endforeach
        </div>

</section>

@include('layouts.footer')
<style>
    /* Custom CSS */
    .jumbotron {
      background-image: url('https://ocdn.eu/images/pulscms/ZjI7MDA_/bb6b0f53264a0ae1d90067153c065aeb.jpg');
      /* opacity: 0; */
      filter: brightness(30%);
      background-size: cover;
      background-position: center;
      height: 400px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .jumbotron h1 {
      color: white;
      text-align: center;
    }

    #header_title{
        filter: brightness(90%);
        color: white
    }
  </style>