@extends('layouts.global')
@section('title')
    Edit User
@endsection
@section('content')
<div class="col-md-8">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('users.update', [$user->id]) }}" class="bg-white shadow-sm p-3" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <label for="name">Name</label>
        <input class="form-control" type="text" name="name" id="name" placeholder="Full Name" value="{{ $user->name }}">
        <br>
        <label for="username">username</label>
        <input type="text" name="username" id="username" class="form-control" placeholder="username" value="{{ $user->username }}" disabled>
        <br>
        <label for="">Status</label>
        <br>
        <input {{ $user->status == "ACTIVE" ? "checked" : "" }} value="ACTIVE" type="radio" class="form-control" id="active" name="status">
        <label for="active">Active</label>
        <input {{ $user->status == "INACTIVE" ? "checked" : "" }} value="INACTIVE" type="radio" class="form-control" id="inactive" name="status">
        <label for="inactive">Inactive</label>
        <br><br>
        <label for="">Roles</label>
        <br>
        <input type="checkbox" {{in_array("ADMIN", json_decode($user->roles)) ? "checked" : ""}} name="roles[]" id="ADMIN" value="ADMIN">
        <label for="ADMIN">Administrator</label>
        <input type="checkbox" {{in_array("STAFF", json_decode($user->roles)) ? "checked" : ""}} name="roles[]" id="STAFF" value="STAFF">
        <label for="STAFF">Staff</label>
        <input type="checkbox" {{in_array("CUSTOMER", json_decode($user->roles)) ? "checked" : ""}} name="roles[]" id="CUSTOMER" value="CUSTOMER">
        <label for="CUSTOMER">Customer</label>
        <br>
        <br>
        <label for="phone">Phone number</label>
        <br>
        <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
        <br>
        <label for="address">Address</label>
        <textarea name="address" id="address" class="form-control">{{ $user->address }}</textarea>
        <br>
        <label for="avatar">Avatar image</label>
        <br>
        Current avatar: <br>
        @if ($user->avatar)
            <img src="{{ asset('storage/'.$user->avatar) }}" alt="avatar" width="120px">
        @else
            No Avatar
        @endif
        <br>
        <input type="file" class="form-control" name="avatar" id="avatar">
        <small class="text-muted">Kosongkan jika tidak ingin mengubah avatar</small>
        <hr class="my-3">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" placeholder="user@email.com" value="{{ $user->email }}" disabled>
        <br>
        <input class="btn btn-primary" type="submit" value="Save">
    </form>
</div>
@endsection