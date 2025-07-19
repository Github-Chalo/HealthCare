@extends('admin.app')

@section('title','Dashboard')

@section('content')

<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
  <div class="breadcrumb-title pe-3">  
  
    Dashboard
    
</div>

</div>


{{-- cards for admins,patients --}}
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Admin Management</h5>
                <p class="card-text">Manage admin users and their permissions.</p>
                <a href="" class="btn btn-primary">Go to Admins</a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Patient Management</h5>
                <p class="card-text">Manage patient records and appointments.</p>
                <a href="{{ route('admin.users') }}" class="btn btn-primary">Go to Patients</a>
            </div>
        </div>
    </div>
</div>

@endsection