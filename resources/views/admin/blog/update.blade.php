@extends('admin.layouts.template')
@section('content')
<div class="card card-default">
   <div class="card-header">
      <h2>Update Blog</h2>
      <a href="{{url('admin/blog/listing')}}" class="btn mdi" >Back</a>
   </div>
   <div class="card-body">
      <form method="post" action="{{url('admin/blog/update/'.$result->id)}}" enctype="multipart/form-data">
         @csrf
         <div class="row">
               <div class="col-sm-12">
                  <div class="form-group">
                     <label for="category">Category</label>
                     <select class="multiple-select form-control" name="category_id" required>
                        <option value="">-- select --</option>
                        @foreach ($category as $val)
                        <option value="{{$val->id}}" {{$result->category_id==$val->id ? 'selected' : ''}}>{{$val->title}}</option>
                        @endforeach
                     </select>
                     @error('category_id')
                           <span class="invalid-feedback">{{$errors->first('display_in')}}</span>
                     @enderror
                  </div>
               </div>
               <div class="col-sm-12">
                  <div class="form-group">
                     <label for="title">Title</label>
                     <input type="text" class="form-control" placeholder="Enter Title" name="title" value="{{ $result->title }}" required>
                     @error('title')
                           <span class="invalid-feedback">{{$errors->first('title')}}</span>
                     @enderror
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label for="image">Image</label>
                     <img src="{{url('uploads/blog/'.$result->image)}}" style="max-width: 80px;">
                     <input type="file" class="form-control" value="" name="image" >
                     <input type="hidden" name="old_img" value="{{ $result->image }}" >
                     @error('image')
                        <span class="invalid-feedback">{{$errors->first('image')}}</span>
                     @enderror
                  </div>
               </div>
               <div class="col-sm-12">
                  <div class="form-group">
                     <label for="short_description">Short Description</label>
                     <textarea name="short_description" class="form-control" placeholder="Enter short description">{{ $result->short_description }}</textarea>
                     @error('short_description')
                           <span class="invalid-feedback">{{$errors->first('short_description')}}</span>
                     @enderror
                  </div>
               </div>
               <div class="col-sm-12">
                  <div class="form-group">
                     <label for="description">Description</label>
                     <textarea name="description" class="form-control TextEditor" placeholder="Enter description">{{ $result->description }}</textarea>
                     @error('description')
                           <span class="invalid-feedback">{{$errors->first('description')}}</span>
                     @enderror
                  </div>
               </div>
               <div class="col-sm-12">
                  <div class="form-group">
                     <label for="display_in">Display In</label>
                     <?php
                     $dispaly_in = array();
                     if(!empty($result->display_in))
                     {
                        $dispaly_in = explode(',',$result->display_in);
                     }
                     ?>
                     <select class="multiple-select form-control" name="display_in[]" multiple="multiple" required>
                        <option value="Latest" {{ in_array('Latest',$dispaly_in) ? 'selected' : '' }}>Latest</option>
                        <option value="Top Story" {{ in_array('Top Story',$dispaly_in) ? 'selected' : '' }}>Top Story</option>
                        <option value="Top Deals" {{ in_array('Top Deals',$dispaly_in) ? 'selected' : '' }}>Top Deals</option>
                        <option value="Market Insights" {{ in_array('Market Insights',$dispaly_in) ? 'selected' : '' }}>Market Insights</option>
                        <option value="Video Showcase" {{ in_array('Video Showcase',$dispaly_in) ? 'selected' : '' }}>Video Showcase</option>
                        <option value="Featured Articles" {{ in_array('Featured Articles',$dispaly_in) ? 'selected' : '' }}>Featured Articles</option>
                     </select>
                     @error('display_in')
                           <span class="invalid-feedback">{{$errors->first('display_in')}}</span>
                     @enderror
                  </div>
               </div>
               <div class="col-sm-12">
                  <div class="form-group">
                     <label for="status">Status</label>
                     <select name="status" class="form-control"  required>
                        <option value="">-- select --</option>
                        <option value="Active" {{ $result->status=='Active' ? 'selected' : '' }}>Active</option>
                        <option value="Inactive" {{ $result->status=='Inactive' ? 'selected' : '' }}>Inactive</option>
                     </select>
                     @error('status')
                        <span class="invalid-feedback">{{$errors->first('status')}}</span>
                     @enderror
                  </div>
               </div>
               <div class="col-sm-12">
                  <div class="form-group mt-1">
                     <label for="lname"></label><br>
                     <button type="submit" class="btn btn-primary btn-pill">Submit</button>
                  </div>
               </div>
         </div>
      </form>
   </div>
</div>
@endsection