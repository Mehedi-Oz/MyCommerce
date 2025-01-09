@extends('admin.master')

@section('title')
    Update Product
@endsection

@section('body')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Product</h4>
                    <p class="text-success">{{ session('message') }}</p>

                    <form class="form-horizontal p-t-20" action="{{ route('product.update', ['id' => $product->id]) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">
                                Category Name
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <select name="category_id" id="categoryID" class="form-control">
                                    <option value="" disabled selected>--select a category--</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
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
                                <select name="subcategory_id" id="subcategoryID" class="form-control">
                                    <option value="" disabled selected>--select a subcategory--</option>
                                    @foreach ($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}"
                                            {{ $subcategory->id == $product->subcategory_id ? 'selected' : '' }}>
                                            {{ $subcategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">
                                Brand Name
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <select name="brand_id" id="" class="form-control">
                                    <option value="" disabled selected>--select a brand--</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}"
                                            {{ $brand->id == $product->brand_id ? 'selected' : '' }}>
                                            {{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">
                                Unit Name
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <select name="unit_id" id="" class="form-control">
                                    <option value="" disabled selected>--select a unit--</option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}"
                                            {{ $unit->id == $product->unit_id ? 'selected' : '' }}>{{ $unit->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">
                                Product Name
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputuname3"
                                    placeholder="product name" required name="name" value="{{ $product->name }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">
                                Product Code
                                <span class="text-danger"> (must be unique)* </span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputuname3"
                                    placeholder="product code" required name="code" value="{{ $product->code }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">
                                Product Model
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputuname3"
                                    placeholder="product model" name="model" value="{{ $product->model }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">
                                Stock Amount
                                <span class="text-danger"> * </span>
                            </label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="exampleInputuname3"
                                    placeholder="stock amount" required name="stock_amount"
                                    value="{{ $product->stock_amount }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">
                                Product Price
                                <span class="text-danger"> * </span>
                            </label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="number" class="form-control" placeholder="regular price (taka)" required
                                        name="regular_price" value="{{ $product->regular_price }}">
                                    <input type="number" class="form-control" placeholder="selling price (taka)"
                                        required name="selling_price" value="{{ $product->selling_price }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">
                                Short Description
                            </label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="exampleInputEmail3" rows="2" name="short_description"
                                    placeholder="short description">{{ $product->short_description }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">
                                Long Description
                            </label>
                            <div class="col-sm-9">
                                <textarea class="form-control summernote" id="exampleInputEmail3" rows="5" name="long_description"
                                    placeholder="long description">{{ $product->long_description }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">Featured Image</label>
                            <div class="col-sm-9">
                                <input type="file" id="input-file-now" class="dropify" name="image"
                                    accept="image/*" />
                                <img src="{{ asset($product->image) }}" alt=""
                                    style="height: 100px; width: 100px; margin-top: 10px">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">Other Images</label>
                            <div class="col-sm-9">
                                <input type="file" id="input-file-now" class="dropify" name="other_image[]"
                                    accept="image/*" multiple />
                                @foreach ($product->otherImages as $otherImage)
                                    <img src="{{ asset($otherImage->image) }}" alt=""
                                        style="height: 100px; width: 100px; margin-top: 10px">
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword4" class="col-sm-3 control-label">Publication Status</label>
                            <div class="col-sm-9">
                                <label class="me-3"><input type="radio" name="status" value="1"
                                        {{ $product->status == 1 ? 'checked' : '' }}>Published</label>
                                <label class=""><input type="radio" name="status" value="2"
                                        {{ $product->status == 2 ? 'checked' : '' }}>Unpublished</label>
                            </div>
                        </div>

                        <div class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">Update
                                    Product
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
