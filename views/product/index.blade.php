@extends('layout');
@section('dashboard-content');

    @if(Session::get('deleted'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ Session::get('deleted') }} </strong>
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(Session::get('deleted-failed'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ Session::get('deleted-failed') }} </strong>
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            All Products
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                <tr>
                    <th> Product Name </th>
                    <th> Product Price </th>
                    <th> Product Discount </th>
                    <th> Product Category </th>
                    <th> Product Photo </th>
                    <th> Action </th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th> Product Name </th>
                    <th> Product Price </th>
                    <th> Product Discount </th>
                    <th> Product Category </th>
                    <th> Product Photo </th>
                    <th> Action </th>
                </tr>
                </tfoot>
                <tbody>

                @foreach($products as $product)

                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->discount }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td><img src="{{ $product->photo }}" width="100" height="100"></td>
                        <td>
                            <a href="{{ URL::to('edit-product') }}/{{ $product->id }}" class="btn btn-outline-primary btn-sm">Edit</a>
                            |
                            <a href="{{ URL::to('delete-product') }}/{{ $product->id }}" class="btn btn-outline-danger btn-sm" onclick="checkDelete()">Delete</a>
                        </td>
                    </tr>


                @endforeach


                </tbody>
            </table>
        </div>
    </div>

    <script>
        function checkDelete(){
            var check = confirm('Are you sure you want to Delete this?');
            if(check){
                return true;
            }
            return false;
        }
    </script>

@stop;
