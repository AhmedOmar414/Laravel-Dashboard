@extends('master')

@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h3 class="mb-4">Add Category</h3>
                <form action="{{route('dashboard.categories.store')}}" method="POST">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="category_name">Category Name</label>
                        <input type="text" class="form-control" value="{{old('category_name')}}" id="category_name" name="category_name" aria-describedby="addon-wrapping" required/>
                    </div>
                    <div class="form-group mb-4 mt-4">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
