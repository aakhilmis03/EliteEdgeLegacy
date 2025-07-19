@extends('admin.layouts.template')

@section('content')


                    <!-- User Sessions Bounce -->
                    <div class="row  justify-content-center">
                        <div class="col-xl-5">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h2 class="mb-5">Change Password</h2>
                                </div>
                                <div class="card-body">
                                    <form metnod="post" action="{{url('updatePassword')}}">
                                        @csrf
                                        <div class="form-group mb-4">
                                            <label for="oldPassword">Old Password</label>
                                            <input type="password" class="form-control" id="oldPassword" name="old_password" required>
                                            @error('old_password')
                                                <span class="help-block">{{$errors->first('old_password')}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="newPassword">New password</label>
                                            <input type="password" class="form-control" id="newPassword" name="new_password" required>
                                            @error('new_password')
                                                <span class="help-block">{{$errors->first('new_password')}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="conPassword">Confirm password</label>
                                            <input type="password" class="form-control" id="conPassword" name="confirm_password" required data-parsley-equalto="#newPassword"
                                            data-parsley-error-message="new passwod and confirm password not matched." >
                                            @error('confirm_password')
                                                <span class="help-block">{{$errors->first('confirm_password')}}</span>
                                            @enderror
                                        </div>
                                        <div class="d-flex justify-content-start mt-6">
                                            <button type="submit" class="btn btn-primary mb-2 btn-pill">Update Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>

@endsection
