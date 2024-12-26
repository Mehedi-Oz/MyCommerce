@extends('admin.master')

@section('title')
    Manage Unit
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
                                <th>Unit Name</th>
                                <th>Unit Code</th>
                                <th>Unit Description</th>
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i=1; @endphp
                            @foreach($units as $unit)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$unit->created_at}}</td>
                                    <td>{{$unit->name}}</td>
                                    <td>{{$unit->code}}</td>
                                    <td style="text-align: justify; width: 400px">{{$unit->description}}</td>
                                    <td>{{$unit->status==1? 'Published':'Unpublished'}}</td>
                                    <td>
                                        <a href="{{route('unit.edit', ['id'=>$unit->id])}}"
                                           class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        @if($unit->status==1)
                                            <a href="{{route('unit.status', ['id'=>$unit->id])}}"
                                               class="btn btn-warning btn-sm">
                                                <i class="fa-solid fa-eye-slash"></i></a>
                                        @else
                                            <a href="{{route('unit.status', ['id'=>$unit->id])}}"
                                               class="btn btn-success btn-sm">
                                                <i class="fa-solid fa-eye"></i></a>
                                        @endif

                                        <form action="{{route('unit.delete')}}" method="post" style="display: inline;">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$unit->id}}">
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Delete This Unit? Action Cannot be Undone!')">
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
