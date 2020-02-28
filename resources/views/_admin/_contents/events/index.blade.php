@extends('_admin._templates.master')
@section('title', 'Events | BMS')

@section('breadcrumbs')
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title">Data Event</h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">Events
            </li>
          </ol>
        </div>
      </div>
    </div>
    <div class="content-header-right col-md-6 col-12">
      <a class="btn btn-success float-right" data-backdrop="static" data-keyboard="false" href="#" data-toggle="modal" data-target="#add-event">
        <i class="fa fa-plus mr-1"></i>Buat Event</a>
    </div>
@endsection

@section('body')
    <section id="configuration">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Data Event</h4>
                  <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                    <table class="table table-striped table-bordered zero-configuration" id="datatable">
                      <thead>
                        <tr>
                          <th>Nama Kegiatan</th>
                          <th>Tempat Kegiatan</th>
                          <th>Instansi</th>
                          <th>Status</th>
                          <th>Action</th>
                          <th>Hidden</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        
    @include('_admin._contents.events._modals.add')
    @include('_admin._contents.events._modals.edit')

    <div class="hidden rm">
      <p id="url-api-events">{{ route('api.event.index') }}</p>
    </div>

    <form id="form-delete" action="{{ route('api.event.destroy', 0) }}" method="post">
        <input type="hidden" name="_method" value="delete" />
        <button type="submit" id="button-delete" style="display: none;">Delete</button>
    </form> 
@endsection

@section('additionalScripts')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/vendors/css/tables/datatable/datatables.min.css') }}">
    <script src="{{ URL::asset('admin/vendors/js/tables/datatable/datatables.min.js') }}" type="text/javascript"></script>

  <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/vendors/css/forms/icheck/icheck.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/vendors/css/forms/icheck/custom.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/css/plugins/forms/checkboxes-radios.css')}}">    
    <script type="text/javascript" src="{{ URL::asset('admin/vendors/js/forms/icheck/icheck.min.js') }}"></script>
    
    <script type="text/javascript" src="{{ URL::asset('user/js/jquery.form.js') }}"></script>
    
    <script type="text/javascript" src="{{ URL::asset('js/view/events/index.js?').uniqid() }}"></script>
@endsection