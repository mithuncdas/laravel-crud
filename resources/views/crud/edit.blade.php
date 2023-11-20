@extends('crud::layouts.app')
@section('title')
    List
@endsection
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-12 col-lg-6 col-sm-6 col-sm-12">
                                <h1>Update Item</h1>
                            </div>
                            <div class="col-12 col-lg-6 col-sm-6 col-sm-12 text-end">
                                <a href="{{ route('crud.index') }}" class="btn btn-sm btn-primary">All Items</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(Session::has('item_updated_succssuflly'))
                            <div class="alert alert-success">
                                {{ Session::get('item_updated_succssuflly') }}
                            </div>
                        @endif
                        <form action="{{ route('crud.update',$item->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title" class="form-label">Title <span class="text-danger">*</span> </label>
                                <input type="text" id="title" class="form-control" name="title" value="{{ $item->title }}">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mt-4">
                                <label for="details" class="form-label">Details <span class="text-danger">*</span> </label>
                               <textarea name="details" id="details" class="form-control" cols="30" rows="3">{{ $item->details }}</textarea>
                                @error('details')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm mt-4">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection