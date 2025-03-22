@extends('layouts.main')
@section('title', 'Quản lý User')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title float-left">Bảng Quản lý User</h4>
                    <a href="{{route('user.create')}}" class="float-right btn btn-outline-secondary"
                       style="padding: 15px 15px;">
                    <span class="material-icons">
                        add
                    </span>
                        <p style="margin-bottom: 0px; float: right;font-weight: 900;">Thêm User</p>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                ID
                            </th>
                            <th>
                                User Name
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Telephone
                            </th>
                            <th>
                                Address
                            </th>
                            <th>
                                Date Of Birth
                            </th>
                            <th>
                                Avatar
                            </th>
                            <th>
                                Vai trò
                            </th>
                            <th>
                                Created_at
                            </th>
                            <th>
                                Updated_at
                            </th>
                            <th class="text-center">
                                Chức năng
                            </th>
                            </thead>
                            <tbody>
                            @foreach($user as $itemDataUser)
                                <tr>
                                    <td>
                                        {{$itemDataUser->id}}
                                    </td>
                                    <td>
                                        {{$itemDataUser->user_name}}
                                    </td>
                                    <td>
                                        {{$itemDataUser->email}}
                                    </td>
                                    <td>
                                        {{$itemDataUser->phone}}
                                    </td>
                                    <td>
                                        {{$itemDataUser->address}}
                                    </td>
                                    <td>
                                        {{$itemDataUser->date_of_birth}}
                                    </td>
                                    <td>
                                        <img src="{{secure_asset('image/'.$itemDataUser->avatar)}}" height="50px" width="50px">
                                    </td>
{{--                                    <th>--}}
                                        @if($itemDataUser->role_id == 1 )
                                            <th>
                                                admin
                                            </th>
                                            @endif
                                    @if($itemDataUser->role_id == 2 )
                                        <th>
                                            Nhân viên
                                        </th>
                                    @endif
                                    @if($itemDataUser->role_id == 3)
                                        <th>
                                            Khách hàng
                                        </th>
                                    @endif

{{--                                    </th>--}}
                                    <td>
                                        {{$itemDataUser->created_at}}
                                    </td>
                                    <td>
                                        {{$itemDataUser->updated_at}}
                                    </td>
                                    <td style="width: 2%">
                                        <a href="{{route('user.update', $itemDataUser->id)}}">
                                            <button class="btn btn-info">Edit</button>
                                        </a>
                                    </td>
                                    <td>
                                        <form method="post" class="delete_form"
                                              action="{{route('user.delete',$itemDataUser->id)}}">
                                            {{csrf_field()}}
                                            <input type="hidden" name="id"  data-id ="{{$itemDataUser->id }}" value="delete" id="get-id"/>
                                            <button type="submit" class="btn btn-danger">delete</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {!! $user->links() !!}
    </div>
    <script src="{{secure_asset('backend/js/postUser.js')}}"></script>
@endsection
