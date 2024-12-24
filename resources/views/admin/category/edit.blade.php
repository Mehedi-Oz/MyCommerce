@extends('admin.master')

@section('title')
    Update Category
@endsection

@section('body')

    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update A Product Category</h4> <span
                        class="text-success"> {{session('message')}} </span>

                    <form class="form-horizontal p-t-20" action="{{route('category.update', ['id'=>$category->id])}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
{{--                        <input type="hidden" name="id" id="{{$category->id}}">--}}


                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">
                                Category Name
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputuname3" rows="5"
                                       placeholder="category name"
                                       name="name" value="{{$category->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">
                                Category Description
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                            <textarea class="form-control" id="exampleInputEmail3" name="description" rows="5"
                                      placeholder="description">{{$category->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">Category Image</label>
                            <div class="col-sm-9">
                                <input type="file" id="input-file-now" class="dropify" name="image"/>
                                <img src="{{asset($category->image)}}"
                                     style="height: 150px; width: 150px; margin-top: 5px">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword4" class="col-sm-3 control-label">Publication Status</label>
                            <div class="col-sm-9">
                                <label class="me-3"><input type="radio" name="status"
                                                           {{$category->status == 1 ? 'checked' : ''}} value="1">Published</label>
                                <label class=""><input type="radio" name="status"
                                                       {{$category->status == 2 ? 'checked' : ''}}  value="2">Unpublished</label>
                            </div>
                        </div>
                        <div class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">Create
                                    Category
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection