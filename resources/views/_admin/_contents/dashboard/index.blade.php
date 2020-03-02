@extends('_admin._templates.master')
@section('title', 'Dashboard | BMS')

@section('breadcrumbs')
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title">Dashboard</h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">Dashboard
            </li>
          </ol>
        </div>
      </div>
    </div>
@endsection

@section('body')

@endsection

@section('additionalScripts')
  
@endsection