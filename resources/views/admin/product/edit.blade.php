@extends('admin.master')

@section('title')
    Update Product
@endsection

@section('body')

    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Product</h4> <span class="text-success"> {{session('message')}} </span>

                    <form class="form-horizontal p-t-20" action="{{route('product.update', ['id'=>$product->id])}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">
                                Category Name
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <select class="form-control" name="category_id">
                                    <option value="" disabled selected> --Select Category--</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"  {{$category->id==$product->category_id? 'selected' : ""}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">
                                Sub Category Name
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <select class="form-control" name="subcategory_id">
                                    <option value="" disabled selected> --Select Sub Category--</option>
                                    @foreach($sub_categories as $sub_category)
                                        <option value="{{$sub_category->id}}">{{$sub_category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">
                                Brand Name
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <select class="form-control" name="brand_id">
                                    <option value="" disabled selected> --Select Brand--</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">
                                Unit Name
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <select class="form-control" name="unit_id">
                                    <option value="" disabled selected> --Select Unit--</option>
                                    @foreach($units as $unit)
                                        <option value="{{$unit->id}}">{{$unit->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">
                                Product Name
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id=""
                                       placeholder="product name"
                                       name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">
                                Product Code
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id=""
                                       placeholder="product code"
                                       name="code">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">
                                Product Model
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id=""
                                       placeholder="product model"
                                       name="model">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">
                                Product Stock Amount
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id=""
                                       placeholder="product stock amount"
                                       name="stock_amount">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">
                                Product Price
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="number" class="form-control" id="" placeholder="regular price"
                                           name="regular_price">
                                    <input type="number" class="form-control" id="" placeholder="selling price"
                                           name="selling_price">
                                </div>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">
                                Short Description
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                            <textarea class="form-control" id="exampleInputEmail3" rows="2" name="short_description"
                                      placeholder="short description"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">
                                Long Description
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                            <textarea class="form-control" id="exampleInputEmail3" rows="3" name="long_description"
                                      placeholder="long description"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">Feature Image
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="file" id="input-file-now" class="dropify" name="image"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">Other Image</label>
                            <div class="col-sm-9">
                                <input type="file" id="input-file-now" class="dropify" name="other_image"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword4" class="col-sm-3 control-label">Publication Status</label>
                            <div class="col-sm-9">
                                <label class="me-3"><input type="radio" name="status" value="1">Published</label>
                                <label class=""><input type="radio" name="status" value="2">Unpublished</label>
                            </div>
                        </div>
                        <div class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">Update Product
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
