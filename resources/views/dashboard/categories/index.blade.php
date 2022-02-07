@extends('master')

@section('content')
    <div class="content-wrapper">
        <div class="card p-3">
            <div class="card-body ">
                <h3 class="pb-3">Categories</h3>
                <div class="row pb-4">
                    <div class="col-md-4">
                        <form action="{{route('dashboard.category.search')}}" method="GET">
                            @csrf
                            <div class="input-group">
                                <input type="search" name="query" class="form-control form-control-lg" placeholder="Search categories" value="{{isset($query) ? $query : ''}}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-primary">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary btn-lg"><a href="{{route('dashboard.categories.create')}}" class="text-white text-decoration-none">Add Category</a></button>
                        </div>
                </div>
                <table class="table table-bordered table-responsive-sm w-50">
                    <thead>
                    <tr>
                        <th class="text-center">Index</th>
                        <th class="text-center">Category Name</th>
                        <th class="text-center">Related Products</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $index=>$category)
                        <tr>
                            <td class="text-center">{{$index+1}}</td>
                            <td class="text-center">{{$category->category_name}}</td>
                            <td class="text-center"><a href="{{route('dashboard.product.show_related',$category->id)}}" class="btn btn-primary">Show ({{$category->product->count()}}) Product</a></td>
                            <td class="text-center">
                                <div class="row nav-row ">
                                    <button class="btn btn-primary mr-1" style="margin-left:70px"><i class="fas fa-pen"></i>
                                        <a class="text-white text-decoration-none" href="{{route('dashboard.categories.edit',$category->id)}}">Update</a></button>
                                    <form action="{{route('dashboard.categories.destroy',$category->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mr-1"><i class="fas fa-trash"></i>Delete</button>
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
