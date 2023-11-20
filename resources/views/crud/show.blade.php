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
                                <h1>Item Details</h1>
                            </div>
                            <div class="col-12 col-lg-6 col-sm-6 col-sm-12 text-end">
                                <a href="{{ route('crud.index') }}" class="btn btn-sm btn-primary">All Items</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                       <h5>Title</h5>
                       <p>{{ $item->title }}</p>

                       <h5>Details</h5>
                       <p>{{ $item->details }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection