@extends('admin.master')

@section('title')
    Manage Brand
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
                                <th>Brand Name</th>
                                <th>Brand Description</th>
                                <th>Brand Image</th>
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i=1; @endphp
                            @foreach($brands as $brand)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$brand->created_at}}</td>
                                    <td>{{$brand->name}}</td>
                                    <td style="text-align: justify; width: 500px">{{$brand->description}}</td>
                                    <td>
                                        <img src="{{asset($brand->image)}}" style="height: 60px; width: 60px"
                                             alt="{{$brand->name}}">
                                    </td>
                                    <td>{{$brand->status==1? 'Published':'Unpublished'}}</td>
                                    <td>
                                        <a href="{{route('brand.edit', ['id'=>$brand->id])}}"
                                           class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        @if($brand->status==1)
                                            <a href="{{route('brand.status', ['id'=>$brand->id])}}"
                                               class="btn btn-warning btn-sm">
                                                <i class="fa-solid fa-eye-slash"></i></a>
                                        @else
                                            <a href="{{route('brand.status', ['id'=>$brand->id])}}"
                                               class="btn btn-success btn-sm">
                                                <i class="fa-solid fa-eye"></i></a>
                                        @endif

                                        <form action="{{route('brand.delete')}}" method="post" style="display: inline;">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$brand->id}}">
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Delete This Brand? Action Cannot be Undone!')">
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
