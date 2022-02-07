@extends('master')

@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body ml-2 mr-2">
                <h3 class="mb-5">Update Your Category</h3>
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
                <form method="POST" action="{{route('dashboard.categories.update',$data->id)}}">
                    {{ method_field('PUT') }}
                    @csrf
                    <div class="form-group mb-4">
                        <label for="category_name">Category Name</label>
                        <input type="text" value="{{$data->category_name}}" id="category_name" class="form-control" name="category_name" aria-describedby="addon-wrapping" required/>
                    </div>
                    <div class="form-group mb-4">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-pen"></i> Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
