@include('layouts.app')
<section id="pricing" class="bg-white mt-5 pt-5">
    <div class="container-lg">


        <div class="row my-5 allign-items-center justify-content-center g-0">

            <div class="col-12 col-lg-10">
                <div class="card border-primary border-2">
                    <div class="card-header text-center text-primary bg-white"><big class="h4">Add a Product</big> </div>
                    <div class="card-body text-center py-5 bg-light">
                        <form action="/add" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label h5">Name of Product</label>
                                <input type="text" name="name" class="form-control" id="name" aria-describedby="name" value="{{old('name')}}">
                                <div id="name" class="form-text">Product's name</div>
                                @error('name')
                                    <p class="text-danger text-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label h5">Price</label>
                                <input type="text" name="price" class="form-control" id="price" value="{{old('price')}}">
                                <div id="price" class="form-text">Set the price for the Product</div>
                                @error('price')
                                    <p class="text-danger text-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label h5">Description</label>
                                <textarea name="description" class="form-control" id="descrption" rows="3">{{old('description')}}</textarea>
                                <div id="description" class="form-text">Describe the Product</div>
                                @error('description')
                                    <p class="text-danger text-500 text-xs mt-1">{{$message}}</p>
                                @enderror

                            </div>

                            <div class="mb-3 select">
                                <label for="category" class="form-label h5">Category</label>
                                <select class="select w-100 py-2" name="category" id="">
                                    <option value="1">Phones</option>
                                    <option value="2">Kitchen</option>
                                    <option value="3">Books</option>
                                    <option value="4">Men Wears</option>
                                    <option value="5">Women Wears</option>
                                    <option value="6">Accessories</option>
                                </select>
                                <div id="category" class="form-text">What is the Product Category</div>
                                @error('category')
                                    <p class="text-danger text-500 text-xs mt-1">{{$message}}</p>
                                @enderror

                            </div>

                            <button type="submit" name="submit" class="btn btn-primary">add Product</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
