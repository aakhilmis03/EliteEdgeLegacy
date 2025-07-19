@extends('admin.layouts.template')
@section('content')
<div class="card card-default">
    <div class="card-header">
        <h2>Create Property</h2>
        <a href="{{url('admin/property/listing')}}" class="btn mdi">Back</a>
    </div>
    <div class="card-body">
        <form method="post" action="{{url('admin/property/store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <label for="example-url-input">Type</label>
                    <div class="form-group">
                        <select class="form-control multiple-select" name="type">
                            <option value="Residential">Residential</option>
                            <option value="Residential Plots">Residential Plots</option>
                            <option value="Commercial">Commercial</option>
                            <option value="SCO">SCO</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="example-text-input">Title</label>
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" value="{{old('title')}}"
                            placeholder="Enter property title" autocomplete="off" required>
                        @error('title')
                        <span class="help-block">{{$errors->first('title')}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="example-text-input">Price</label>
                    <div class="form-group">
                        <input type="text" name="price" class="form-control" value="{{old('price')}}"
                            placeholder="Enter price" autocomplete="off" required>
                        @error('price')
                        <span class="help-block">{{$errors->first('price')}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="example-text-input">Filter Price</label>
                    <div class="form-group">
                        <input type="number" data-parsley-type="digits" name="filter_price" class="form-control"
                            value="{{old('filter_price')}}" placeholder="Enter Filter price" autocomplete="off"
                            required>
                        @error('filter_price')
                        <span class="help-block">{{$errors->first('filter_price')}}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-12">
                    <label for="example-text-input">Price Per Sq.ft.</label>
                    <div class="form-group">
                        <input type="text" name="price_sqft" class="form-control" value="{{old('price_sqft')}}"
                            placeholder="Enter price per sq.ft." autocomplete="off" required>
                        @error('price_sqft')
                        <span class="help-block">{{$errors->first('price_sqft')}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="example-text-input">Area ( Size)</label>
                    <div class="form-group">
                        <input type="text" name="area" class="form-control" value="{{old('area')}}" autocomplete="off"
                            placeholder="Enter area ( size )" required>
                        @error('area')
                        <span class="help-block">{{$errors->first('area')}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="example-text-input">Project RERA Reg</label>
                    <div class="form-group">
                        <input type="text" name="rera_reg" class="form-control" value="{{old('rera_reg')}}"
                            placeholder="Enter project rera reg" autocomplete="off" required>
                        @error('rera_reg')
                        <span class="help-block">{{$errors->first('rera_reg')}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="example-text-input">Short Overview</label>
                    <div class="form-group">
                        <input type="text" name="short_overview" class="form-control" value="{{old('short_overview')}}"  placeholder="Enter short overview" autocomplete="off" required>
                        @error('short_overview')
                        <span class="help-block">{{$errors->first('short_overview')}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="example-text-input">Overview</label>
                    <div class="form-group">
                        <textarea name="overview" class="form-control TextEditor" placeholder="Enter overview">{{old('overview')}}</textarea>
                        @error('overview')
                        <span class="help-block">{{$errors->first('overview')}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="example-text-input">Video Url</label>
                    <div class="form-group">
                        <input type="text" name="video_url" class="form-control" value="{{old('video_url')}}"  placeholder="Enter video url" autocomplete="off" required>
                        @error('video_url')
                        <span class="help-block">{{$errors->first('video_url')}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="example-text-input">Location Map Url</label>
                    <div class="form-group">
                        <input type="text" name="map_url" class="form-control" value="{{old('map_url')}}"
                            placeholder="Enter map url" autocomplete="off" required>
                        @error('map_url')
                        <span class="help-block">{{$errors->first('map_url')}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="example-text-input">Location Advantage</label>
                    <div class="form-group">
                        <div class="row" style="width: 100%;"></div>
                        <table class="table table-bordered locationAdvantageTable">
                            <tbody></tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-right">
                                        <a href="javascript:void(0)"
                                            class="badge badge-outline-success addLocationAdvantageBlock">
                                            <i class="mdi mdi-plus"></i> Add
                                        </a>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    @error('location_advantage')
                    <span class="help-block">{{$errors->first('location_advantage')}}</span>
                    @enderror
                </div>
                <div class="col-sm-12">
                    <label for="example-text-input">Key Highlights</label>
                    <div class="form-group">
                        <div class="row" style="width: 100%;"></div>
                        <table class="table table-bordered KeyHighlightsTable">
                            <tbody></tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-right">
                                        <a href="javascript:void(0)"
                                            class="badge badge-outline-success addKeyHighlightsBlock">
                                            <i class="mdi mdi-plus"></i> Add
                                        </a>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    @error('key_highlights')
                    <span class="help-block">{{$errors->first('key_highlights')}}</span>
                    @enderror
                </div>
                <div class="col-sm-12">
                    <label for="example-url-input">City</label>
                    <div class="form-group">
                        <select class="form-control multiple-select city" name="city" required   onchange="return get_location_data(this.value);">
                            <option value="">select</option>
                            @foreach ($city as $key)
                            <option value="{{$key->id}}">{{$key->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="example-url-input">Location</label>
                    <div class="form-group">
                        <select class="form-control multiple-select" name="location" required id="locationSelect">
                            <option value="">select</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-12">
                    <label for="example-url-input">Amenities</label>
                    <div class="form-group">

                        <div style="border:1px solid #ddd; padding:5px;">
                            @foreach ($amenities as $key)
                            <div style="display: inline-block; padding: 5px 10px; width:24%;">
                                <input type="checkbox" required id="amenities_{{$key->id}}" name="amenities[]"
                                    value="{{$key->id}}">
                                <label for="amenities_{{$key->id}}"> {{$key->title}}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="example-url-input">Property Status</label>
                    <div class="form-group">
                        <select class="form-control multiple-select" name="property_status" required>
                            <option value="">select</option>
                            @foreach ($property_status as $key)
                            <option value="{{$key->id}}">{{$key->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="example-url-input">Builder</label>
                    <div class="form-group">
                        <select class="form-control multiple-select" name="builder" required>
                            <option value="">select</option>
                            @foreach ($builder as $key)
                            <option value="{{$key->id}}">{{$key->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="example-text-input">Image</label>
                    <div class="form-group">
                        <input type="file" name="image" class="form-control" autocomplete="off" required>
                        @error('image')
                        <span class="help-block">{{$errors->first('image')}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="example-text-input">Brochure ( upload PDF file
                        only)</label>
                    <div class="form-group">
                        <input type="file" name="brochure" class="form-control" autocomplete="off">
                        @error('coin_image')
                        <span class="help-block">{{$errors->first('brochure')}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="example-url-input">Image Gallery</label>
                    <div class="form-group">

                        <table class="table table-bordered PropertyGalleryTable">
                            <tbody></tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-right">
                                        <a href="javascript:void(0)"
                                            class="badge badge-outline-success addGalleryImage">
                                            <i class="mdi mdi-plus"></i> Add
                                        </a>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="example-url-input">Price Table</label>
                    <div class="form-group">
                        <table class="table table-bordered PriceTable">
                            <thead>
                                <th>Unit Type</th>
                                <th>Area</th>
                                <th>Price*</th>
                                <th></th>
                            </thead>
                            <tbody></tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" class="text-right">
                                        <a href="javascript:void(0)" class="badge badge-outline-success addPriceTable">
                                            <i class="mdi mdi-plus"></i> Add
                                        </a>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="example-url-input">Questions and Answers</label>
                    <div class="form-group">
                        <table class="table table-bordered QueAnsTable">
                            <thead>
                                <tr>
                                    <th>Questions</th>
                                    <th>Answers</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" class="text-right">
                                        <a href="javascript:void(0)" class="badge badge-outline-success addQueAnsTable">
                                            <i class="mdi mdi-plus"></i> Add
                                        </a>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
                <div class="col-sm-4">
                    <label for="example-url-input">Hot Project</label>
                    <div class="form-group">
                        <select class="form-control multiple-select" name="hot_property">
                            <option value="no">No</option>
                            <option value="yes">Yes</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <label for="example-url-input">New Launched Project</label>
                    <div class="form-group">
                        <select class="form-control multiple-select" name="new_launched">
                            <option value="no">No</option>
                            <option value="yes">Yes</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <label for="example-url-input">Sequence No.</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="sequence" >
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="example-url-input">Status</label>
                    <div class="form-group">
                        <select class="form-control multiple-select" name="status" required>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group mt-1">
                        <label for="lname"></label><br>
                        <button type="submit" class="btn btn-primary btn-pill">Submit</button>
                    </div>
                </div>
            </div>
            <!-- <div class="form-footer pt-5 border-topxxx">
            <button type="submit" class="btn btn-primary btn-pill">Submit</button>
         </div> -->
        </form>
    </div>
</div>
@endsection