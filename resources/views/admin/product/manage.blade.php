@extends('admin.master')

@section('title')
    Manage Product
@endsection

@section('body')

    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Table</h4>
                    <h6 class="card-subtitle">Data table example</h6>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-striped table-border table-hover text-center">
                            <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Date</th>
                                <th>Product Name</th>
                                <th>Product Description</th>
                                <th>Product Image</th>
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i=1; @endphp
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$product->created_at}}</td>
                                    <td>{{$product->name}}</td>
                                    <td style="text-align: justify; width: 500px">{{$product->description}}</td>
                                    <td>
                                        <img src="{{asset($product->image)}}" style="height: 60px; width: 60px"
                                             alt="{{$product->name}}">
                                    </td>
                                    <td>{{$product->status==1? 'Published':'Unpublished'}}</td>
                                    <td>
                                        <a href="{{route('product.edit', ['id'=>$product->id])}}"
                                           class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        @if($product->status==1)
                                            <a href="{{route('product.status', ['id'=>$product->id])}}"
                                               class="btn btn-warning btn-sm">
                                                <i class="fa fa-lock"></i></a>
                                        @else
                                            <a href="{{route('product.status', ['id'=>$product->id])}}"
                                               class="btn btn-success btn-sm">
                                                <i class="fa fa-globe"></i></a>
                                        @endif

                                        <form action="{{route('product.delete')}}" method="post" style="display: inline;">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$product->id}}">
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Delete This Product? Action Cannot be Undone!')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
