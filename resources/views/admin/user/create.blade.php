@extends('admin.layouts.template')
@section('content')
<div class="card card-default">
   <div class="card-header">
      <h2>User Create</h2>
      <a href="{{url('admin/user/listing')}}" class="btn mdi" >Back</a>
   </div>
   <div class="card-body">
      <form method="post" action="{{url('admin/user/store')}}" enctype="multipart/form-data">
         @csrf
         <div class="row">
               <div class="col-sm-12">
                  <div class="form-group">
                     <label for="title">Name</label>
                     <input type="text" class="form-control" placeholder="Enter name" name="name" required>
                     @error('name')
                           <span class="invalid-feedback">{{$errors->first('name')}}</span>
                     @enderror
                  </div>
               </div>
               <div class="col-sm-12">
                  <div class="form-group">
                     <label for="title">Email</label>
                     <input type="text" class="form-control" placeholder="Enter email" name="email" required>
                     @error('email')
                           <span class="invalid-feedback">{{$errors->first('email')}}</span>
                     @enderror
                  </div>
               </div>
               <div class="col-sm-12">
                  <div class="form-group">
                     <label for="title">Password</label>
                     <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
                     @error('pwd')
                           <span class="invalid-feedback">{{$errors->first('pwd')}}</span>
                     @enderror
                  </div>
               </div>
               <div class="col-sm-12">
                  <div class="form-group">
                     <label for="title">Confirm Password</label>
                     <input type="password" class="form-control" placeholder="Enter confirm password" name="cpwd" id="cpwd" data-parsley-equalto="#pwd"
                     data-parsley-error-message="passwod and confirm password not matched."  required>
                     @error('cpwd')
                           <span class="invalid-feedback">{{$errors->first('cpwd')}}</span>
                     @enderror
                  </div>
               </div>
               <div class="col-sm-12">
                  <div class="form-group">
                     <label for="status">Status</label>
                     <select name="status" class="form-control"  required>
                        <option value="">-- select --</option>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
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
         <!-- <div class="form-footer pt-5 border-topxxx">
            <button type="submit" class="btn btn-primary btn-pill">Submit</button>
         </div> -->
      </form>
   </div>
</div>
@endsection