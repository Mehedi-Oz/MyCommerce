@extends('admin.master')

@section('title')
    Update Sub-Category
@endsection

@section('body')

    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Product Sub-Category</h4> <span
                        class="text-success"> {{session('message')}} </span>

                    <form class="form-horizontal p-t-20"
                          action="{{route('subcategory.update', ['id'=>$subcategory->id])}}" method="post"
                          enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">
                                Category Name
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <select class="form-control" name="category_id">
                                    <option value="" disabled selected> --Select Category-- </option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">
                                SubCategory Name
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputuname3"
                                       placeholder="sub-category name"
                                       name="name" value="{{$subcategory->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">
                                SubCategory Description
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                            <textarea class="form-control" id="exampleInputEmail3" name="description" rows="5"
                                      placeholder="description">{{$subcategory->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">SubCategory Image</label>
                            <div class="col-sm-9">
                                <input type="file" id="input-file-now" class="dropify" name="image"/>
                                <img src="{{asset($subcategory->image)}}"
                                     style="height: 150px; width: 150px; margin-top: 5px">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword4" class="col-sm-3 control-label">Publication Status</label>
                            <div class="col-sm-9">
                                <label class="me-3"><input type="radio" name="status"
                                                           {{$subcategory->status == 1 ? 'checked' : ''}} value="1">Published</label>
                                <label class=""><input type="radio" name="status"
                                                       {{$subcategory->status == 2 ? 'checked' : ''}}  value="2">Unpublished</label>
                            </div>
                        </div>
                        <div class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">Create
                                    Sub-Category
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
