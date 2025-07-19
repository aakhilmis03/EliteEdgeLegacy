@extends('admin.layouts.template')
@section('content')
<div class="card card-default">
    <div class="card-header">
        <h2>Update Property</h2>
        <a href="{{url('admin/property/listing')}}" class="btn mdi">Back</a>
    </div>
    <div class="card-body">
        <form method="post" action="{{url('admin/property/update/'.$result->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <label for="example-url-input">Type</label>
                    <div class="form-group">
                        <select class="form-control multiple-select" name="type">
                            <option value="Residential" {{ $result->type=='Residential' ? 'selected' : '' }}>Residential</option>
                            <option value="Residential Plots" {{ $result->type=='Residential Plots' ? 'selected' : '' }} >Residential Plots</option>
                            <option value="Commercial" {{ $result->type=='Commercial' ? 'selected' : '' }}>Commercial</option>
                            <option value="SCO" {{ $result->type=='SCO' ? 'selected' : '' }}>SCO</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="example-text-input">Title</label>
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" value="{{ $result->title }}"
                            autocomplete="off">
                        @error('title')
                        <span class="help-block">{{$errors->first('title')}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="example-text-input">Url Slug</label>
                    <div class="form-group">
                        <input type="text" name="slug" class="form-control" value="{{ $result->slug }}"
                            placeholder="Enter slug" autocomplete="off" required>
                        @error('slug')
                        <span class="help-block">{{$errors->first('slug')}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="example-text-input">Price</label>
                    <div class="form-group">
                        <input type="text" name="price" class="form-control" value="{{$result->price}}"
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
                            value="{{$result->filter_price}}" placeholder="Enter Filter price" autocomplete="off"
                            required>
                        @error('filter_price')
                        <span class="help-block">{{$errors->first('filter_price')}}</span>
                        @enderror
                    </div>
                </div>


                <div class="col-sm-12">
                    <label for="example-text-input">Price Per Sq.ft.</label>
                    <div class="form-group">
                        <input type="text" name="price_sqft" class="form-control" value="{{$result->price_sqft}}"
                            placeholder="Enter price per sq.ft." autocomplete="off" required>
                        @error('price_sqft')
                        <span class="help-block">{{$errors->first('price_sqft')}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="example-text-input">Area ( Size)</label>
                    <div class="form-group">
                        <input type="text" name="area" class="form-control" value="{{$result->area}}" autocomplete="off"
                            placeholder="Enter area ( size )" required>
                        @error('area')
                        <span class="help-block">{{$errors->first('area')}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="example-text-input">Project RERA Reg</label>
                    <div class="form-group">
                        <input type="text" name="rera_reg" class="form-control" value="{{$result->rera_reg}}"
                            placeholder="Enter project rera reg" autocomplete="off" required>
                        @error('rera_reg')
                        <span class="help-block">{{$errors->first('rera_reg')}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="example-text-input">Short Overview</label>
                    <div class="form-group">
                        <input type="text" name="short_overview" class="form-control"
                            value="{{$result->short_overview}}" placeholder="Enter short overview" autocomplete="off"
                            required>
                        @error('short_overview')
                        <span class="help-block">{{$errors->first('short_overview')}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="example-text-input">Overview</label>
                    <div class="form-group">
                        <textarea name="overview" class="form-control TextEditor" placeholder="Enter overview">{{$result->overview}}</textarea>
                        @error('overview')
                        <span class="help-block">{{$errors->first('overview')}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="example-text-input">Video Url</label>
                    <div class="form-group">
                        <input type="text" name="video_url" class="form-control" value="{{$result->video_url}}"
                            placeholder="Enter video url" autocomplete="off" required>
                        @error('video_url')
                        <span class="help-block">{{$errors->first('video_url')}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="example-text-input">Location Map Url</label>
                    <div class="form-group">
                        <input type="text" name="map_url" class="form-control" value="{{$result->map_url}}"
                            placeholder="Enter map url" autocomplete="off" required>
                        @error('map_url')
                        <span class="help-block">{{$errors->first('map_url')}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="example-url-input">City</label>
                    <div class="form-group">
                        <select class="form-control multiple-select" name="city" required
                            onchange="return get_location_data(this.value);">
                            <option value="">select</option>
                            @foreach ($city as $key)
                            <option value="{{$key->id}}" {{ $result->city==$key->id ? 'selected' : '' }}>{{$key->title}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-sm-12">
                    <label for="example-url-input">Location</label>
                    <div class="form-group">
                        <select class="form-control multiple-select" name="location" required id="locationSelect">
                            <option value="">select</option>
                            @foreach ($locationData as $key)
                            <option value="{{$key->id}}" {{ $result->location==$key->id ? 'selected' : '' }}>
                                {{$key->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @php
                $location_advantage = (!empty($result->location_advantage))?explode(',',$result->location_advantage):array();
                @endphp
                <div class="col-sm-12">
                    <label for="example-text-input">Location Advantage</label>
                    <div class="form-group">
                        <div class="row" style="width: 100%;"></div>
                        <table class="table table-bordered locationAdvantageTable">
                            <tbody>
                                @foreach ($location_advantage as $key)
                                <tr>
                                    <td><input type="text" name="location_advantage[]" class="form-control"
                                            autocomplete="off" placeholder="Location Advantage" value="{{$key}}"
                                            required></td>
                                    <td class="text-center" style="width: 5%;"><a href="javascript:void(0);"
                                            class="closeInput"><i class="mdi mdi-close text-danger"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
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
                @php
                $key_highlights = (!empty($result->key_highlights))?explode(',', $result->key_highlights):array();
                @endphp
                <div class="col-sm-12">
                    <label for="example-text-input">Key Highlights</label>
                    <div class="form-group">
                        <table class="table table-bordered KeyHighlightsTable">
                            <tbody>
                                @foreach ($key_highlights as $key)
                                <tr>
                                    <td><input type="text" name="key_highlights[]" class="form-control"
                                            autocomplete="off" placeholder="Key Highlights" value="{{$key}}" required>
                                    </td>
                                    <td class="text-center" style="width: 5%;"><a href="javascript:void(0);"
                                            class="closeInput"><i class="mdi mdi-close text-danger"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
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
                @php
                $amenities_array = (!empty($result->amenities))?explode(',', $result->amenities):array();
                @endphp
                <div class="col-sm-12">
                    <label for="example-url-input">Amenities</label>
                    <div class="form-group">
                        <div style="border:1px solid #ddd; padding:5px;">
                            @foreach ($amenities as $key)
                            <div style="display: inline-block; padding: 5px 10px; width:24%;">
                                <input type="checkbox" required id="amenities{{$key->id}}" name="amenities[]"
                                    value="{{$key->id}}" {{ in_array($key->id,$amenities_array) ? 'checked' : '' }}>
                                <lebel for="amenities{{$key->id}}"> {{$key->title}}</lebel>
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
                            <option value="{{$key->id}}" {{ $result->property_status==$key->id ? 'selected' : '' }}>
                                {{$key->title}}</option>
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
                            <option value="{{$key->id}}" {{ $result->builder==$key->id ? 'selected' : '' }}>
                                {{$key->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="example-text-input">Image</label>
                    <div class="form-group">
                        <input type="file" name="image" class="form-control" autocomplete="off">
                        <input type="hidden" name="old_img" value="{{ $result->image }}">
                        @if(!empty($result->image))
                        <div class="galleryImg" id="main_img">
                            <img src="{{ url('uploads/property/'.$result->image) }}" width="100"
                                class="rounded avatar-lg">
                        </div>
                        @endif
                        @error('image')
                        <span class="help-block">{{$errors->first('image')}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="example-text-input">Brochure ( upload PDF file only)</label>
                    <div class="form-group">
                        <input type="file" name="brochure" class="form-control" autocomplete="off" accept=".pdf">
                        <input type="hidden" name="old_brochure" value="{{ $result->brochure }}">
                        @if(!empty($result->brochure))
                        <a href="{{ url('uploads/property/'.$result->brochure) }}" target="_blank">View Brochure</a>
                        @endif
                        @error('coin_image')
                        <span class="help-block">{{$errors->first('brochure')}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="example-url-input">Image Gallery</label>
                    <div class="form-group">

                        <table class="table table-bordered inputBox">
                            <tr>
                                <td colspan="2">
                                    <div class="row">
                                        @foreach ($gallery as $key)
                                        <div class="col-lg-3 col-xl-3 galleryImg">
                                            <div class="card card-default p-4">
                                                <div class="media text-secondary" data-toggle="modal"
                                                    data-target="#modal-contact">
                                                    <img src="{{ url('uploads/property/'.$key->image) }}"
                                                        class="mr-3 img-fluid rounded" alt="Avatar Image">
                                                    <div class="galleryDesc" style="position: absolute;">
                                                        <a href="{{ url('admin/property/destroy_gallery/'.$key->id.'/'.$result->id) }}"
                                                            onclick="return confirm('Are You Sure Want to Delete This')" style="background: #fff; border: 1px solid #f80000;"><i
                                                                class="mdi mdi-close text-danger"></i></a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </td>
                            </tr>
                        </table>
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
                            <tbody>
                            @foreach ($unitPrice as $key)
                            <tr>
                                <td><input type="text" value="{{$key->unit_type}}" class="form-control" disabled></td>
                                <td><input type="text" value="{{$key->unit_area}}" class="form-control" disabled></td>
                                <td><input type="text" value="{{$key->unit_price}}" class="form-control" disabled></td>
                                <td style="width: 5%;"><a href="{{ url('admin/property/destroy_unit_data/'.$key->id.'/'.$result->id) }}" onclick="return confirm('Are You Sure Want to Delete This')"><i class="mdi mdi-close text-danger"></i></a></td>
                            </tr>
                            @endforeach
                            </tbody>
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
                            <tbody>
                                @foreach ($QueAnsData as $key)
                                <tr>
                                    <td>{{$key->question}}</td>
                                    <td>{{$key->answer}}</td>
                                    <td><a href="{{ url('admin/property/destroy_que_ans_data/'.$key->id.'/'.$result->id) }}"  onclick="return confirm('Are You Sure Want to Delete This')"><i
                                    class="mdi mdi-close text-danger"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
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
                        <select class="form-control multiple-select" name="hot_property" required>
                            <option value="no" {{ $result->hot_property=='no' ? 'selected' : '' }}>No</option>
                            <option value="yes" {{ $result->hot_property=='yes' ? 'selected' : '' }}>Yes</option>
                        </select>
                    </div>  
                </div>
                <div class="col-sm-4">
                    <label for="example-url-input">New Launched Project</label>
                    <div class="form-group">
                        <select class="form-control multiple-select" name="new_launched">
                            <option value="no" {{ $result->new_launched=='no' ? 'selected' : '' }}>No</option>
                            <option value="yes" {{ $result->new_launched=='yes' ? 'selected' : '' }}>Yes</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <label for="example-url-input">Sequence No.</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="sequence" value="{{ $result->sequence }}">
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="example-url-input">Status</label>
                    <div class="form-group">
                        <select class="form-control multiple-select" name="status">
                            <option value="1" {{ $result->status=='1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $result->status=='0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group mt-1">
                        <label for="lname"></label><br>
                        <button type="submit" class="btn btn-primary btn-pill">Submit</button>
                    </div>
                </div>
        </form>
    </div>
</div>
@endsection