@extends('layouts.main')
@section('title', 'Thêm User')
@section('content')
    <div class="content">
        <p id="message_success"></p>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">CreateUser</h4>
                            <p class="card-category">User Profile</p>
                        </div>
                        <form action="{{route('user.post-create-user')}}" method='POST' class="w-70 m-auto form-user"
                              id="form-create-user" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="row col-md-12">
                                    <div class="col-md-6 m-auto">
                                        <div class="form-group">
                                            <label>UserName</label>
                                            <input type="text" class="form-control" name="name" id="name">
                                            <p id="errors_name" style="color: red;"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" id="email">
                                            <p id="errors_email" style="color: red;"></p>
                                        </div>
                                    </div>
                                    <div class="w-100">
                                        <p id="exist_email" style="color: red; margin-right: 17px; margin-bottom: 0px; float: right"></p>
                                    </div>
                                    <div class="row col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" name="password" id="password">
                                                <p id="errors_password" style="color: red;"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" >
                                                <p id="errors_confirmPassword" style="color: red;"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Địa chỉ</label>
                                                <input type="text" class="form-control" name="address" id="address" >
                                                <p id="errors_address" style="color: red;"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Telephone</label>
                                                <input type="tel" class="form-control" name="phone" id="phone" >
                                                <p id="errors_phone" style="color: red;"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Ngày sinh</label>
                                            <input id="datepicker" name="date_of_birth" >
                                            <p id="errors_date_of_birth" style="color: red"></p>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <img id="image" src=" " alt="your image" width="150px" class="mb-2"
                                                 style="display: none;"/>
                                            <input type="file" name="avatar" id="avatar" class="inputfile inputfile-1"
                                                   data-multiple-caption="{count} files selected" multiple/>
                                            <label for="avatar">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17"
                                                     viewBox="0 0 20 17">
                                                    <path
                                                        d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/>
                                                </svg>
                                                <span>Choose a file&hellip;</span></label>
                                            <input type="hidden" id="img" name="img">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check form-check-radio ml-5">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="role"
                                               id="exampleRadios1" value="1" >
                                        Đăng ký Admin
                                        <span class="circle">
                                             <span class="check"></span>
                                        </span>
                                    </label>

                                    <label class="form-check-label ml-5">
                                        <input class="form-check-input" type="radio" name="role"
                                               id="exampleRadios2" value="2">
                                        Đăng ký Nhân viên
                                        <span class="circle">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                                <div class="col-md-2 m-auto" style="margin-top: 30px!important;">
                                    <button type="submit" class="btn btn-primary btn-create-user" id="btn-create">Create
                                        User
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{secure_asset('backend/js/validate.js')}}"></script>
        <script src="{{secure_asset('backend/js/postUser.js')}}"></script>
@endsection

