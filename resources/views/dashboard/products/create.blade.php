@extends('master')

@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body ml-2 mr-2">
                <h3 class="mb-5">Add New Product</h3>
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{$error}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endforeach
                @endif
                <form method="POST" action="{{route('dashboard.products.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="product_name">Product Name</label>
                        <input type="text" class="form-control" id="product_name" value="{{old('product_name')}}" name="product_name" aria-describedby="addon-wrapping" required/>
                    </div>
                    <div class="form-group mb-4">
                        <label for="product_description">Product Description</label>
                        <textarea  class="form-control" value="{{old('product_description')}}" id="product_description" name="product_description" aria-describedby="addon-wrapping" required></textarea>
                    </div>
                    <div class="form-group mb-4">
                        <label for="purchase_price">Purchase Price</label>
                        <input type="number" class="form-control" value="{{old('purchase_price')}}" id="purchase_price" name="purchase_price" aria-describedby="addon-wrapping" required/>
                    </div>
                    <div class="form-group mb-4">
                        <label for="sale_price">Sale Price</label>
                        <input type="number" class="form-control" value="{{old('sale_price')}}" id="sale_price" name="sale_price" aria-describedby="addon-wrapping" required/>
                    </div>
                    <label for="file" style="cursor: pointer;">Upload Image</label><br>
                    <input class="mb-2" class="thumbnail" type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)"><br>
                    <img class="mb-2" id="output" width="200" />
                    <script>
                        var loadFile = function(event) {
                            var image = document.getElementById('output');
                            image.src = URL.createObjectURL(event.target.files[0]);
                        };
                    </script>
                    <div class="form-group mb-4">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock" aria-describedby="addon-wrapping" required/>
                    </div>
                    <label for="select">Category</label><br>
                    <select class="form-control form-control-lg w-25" name="category">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                    </select >
                    <div class="form-group mb-4 mt-4">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Add</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
