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
                                <h1>All Items</h1>
                            </div>
                            <div class="col-12 col-lg-6 col-sm-6 col-sm-12 text-end">
                                <a href="{{ route('crud.create') }}" class="btn btn-sm btn-primary">Add Item</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Details</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(Session::has('item_deleted_succssuflly'))
                                        <div class="alert alert-success">
                                            {{ Session::get('item_deleted_succssuflly') }}
                                        </div>
                                    @endif
                                    @forelse ($items as $item)
                                         <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->details }}</td>
                                            <td>
                                                <a href="{{ route('crud.show',$item->id) }}" class="btn btn-sm btn-success">show</a>
                                                <a href="{{ route('crud.edit',$item->id) }}" class="btn btn-sm btn-warning">edit</a>
                                                <a href="{{ route('crud.destroy',$item->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center"> <strong>No item found</strong> </td>
                                        </tr>
                                    @endforelse
                                    
                                </tbody>
                            </table>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection