@extends('master')

@section('content')
    <div class="content-wrapper">
        <div class="card p-3">
            <div class="card-body ">
                <h3 class="pb-3">Products</h3>
                <div class="row pb-4 ">
                    <div class="col-md-4">
                        <form action="{{route('dashboard.product.search')}}" method="GET">
                            @csrf
                            <div class="input-group">
                                <input type="search" name="query" class="form-control form-control-lg" placeholder="Search products" value="{{isset($query) ? $query : ''}}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-primary">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                       <form method="GET" action="{{route('dashboard.product.search_category')}}">
                           @csrf
                           <div class="d-flex">
                               <div class="form-group">
                                   <select class="form-control form-control-lg" name="category" required>
                                       <option value="">Select Category</option>
                                       @foreach($categories as $category)
                                           <option value="{{$category->id}}">{{$category->category_name}}</option>
                                       @endforeach
                                   </select>
                               </div>
                               <div class="form-group ml-1">
                                   <button type="submit" class="btn btn-lg btn-primary">
                                       <i class="fas fa-search"></i>
                                   </button>
                               </div>
                           </div>
                       </form>
                    <div class="col-md-4">
                        <button class="btn btn-primary btn-lg"><li class="fas fa-plus"></li> <a href="{{route('dashboard.products.create')}}" class="text-white text-decoration-none">Add Product</a></button>
                    </div>
                </div>
                <table class="table table-bordered table-responsive-sm">
                    <thead>
                    <tr>
                        <th class="text-center">Index</th>
                        <th class="text-center">Product Name</th>
                        <th class="text-center">Product Description</th>
                        <th class="text-center">Purchase Price</th>
                        <th class="text-center">Sale Price</th>
                        <th class="text-center">Profit %</th>
                        <th class="text-center">Product Image</th>
                        <th class="text-center">Stock</th>
                        <th class="text-center">Category Name</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $index=>$product)
                        <tr>
                            <td class="text-center">{{$index +1}}</td>
                            <td class="text-center">{{$product->product_name}}</td>
                            <td class="text-center">{{$product->product_description}}</td>
                            <td class="text-center">{{$product->purchase_price}}</td>
                            <td class="text-center">{{$product->sale_price}}</td>
                            <td class="text-center">{{$product->profit}} %</td>
                            <td class="text-center"> <img width="130px" class="img-thumbnail" src="{{$product->image}}" class="img"></td>
                            <td class="text-center">{{$product->stock}}</td>
                            <td class="text-center">{{$product->categories->category_name}}</td>
                            <td class="text-center">
                                <div class="row nav-row">
                                    <button class="btn btn-primary mr-1" style="margin-left: 80px"><i class="fas fa-pen"></i>
                                        <a class="text-white text-decoration-none"
                                           href="{{route('dashboard.products.edit',$product->id)}}">Update</a></button>
                                    <form method="POST" action="{{route('dashboard.products.destroy',$product->id)}}">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger mr-1"><i class="fas fa-trash"></i>
                                            <a class="text-white text-decoration-none">Delete</a></button>
                                    </form>
                                </div>

                           </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
