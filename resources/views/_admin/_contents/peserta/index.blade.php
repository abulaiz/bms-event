@extends('_admin._templates.master')
@section('title', 'Peserta | BMS')

@section('breadcrumbs')
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title">Data Peserta</h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">Peserta
            </li>
          </ol>
        </div>
      </div>
    </div>
@endsection

@section('body')
    <section id="configuration">
      <div class="row">
        <div class="col-12" id="removed-info">
          <div class="alert alert-icon-left mb-2 bg-info" role="alert">
            <span class="alert-icon"><i class="fa fa-info-circle"></i></span>
            Pilih Acara terlebih dahulu.
          </div>       
        </div>
        <div class="col-12">
            <select class="selectizes">
              <option value="">--Pilih Acara--</option>
            </select> 
        </div>   
        <div class="col-12">
          <div class="loader-wrapper" id="table-loader">
            <div class="loader-container">
              <div class="ball-beat loader-info">
                <div></div>
                <div></div>
                <div></div>
              </div>
            </div>
          </div>       
          <div class="card" id="table-card" style="opacity: 0;">
            <div class="card-header" style="padding-bottom: unset;">
              <h4 class="card-title">Data Peserta</h4>
              <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
            </div>
            <div class="card-content collapse show">
              <div class="card-body">
                <p>Status Acara : <strong id="event-status-caption">Cooming Soon</strong></p>
                <div class="table-responsive table-data">
                  <table class="table table-bordered table-hover" id="datatable">
                    <thead>
                      <tr>
                        <th>Nama Lengkap</th>
                        <th>No. HP / WA</th>
                        <th>Email</th>
                        <th>Instansi</th>
                        <th>Jabatan</th>
                        <th>Kehadiran</th>
                        <th>Action</th>
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
      </div>    
    </section>

    <div class="hidden rm">
      <p id="url-api-event-list">{{ route('api.event.list') }}</p>
      <p id="url-api-participant-index">{{ route('api.participant.index', '0') }}</p>
      <p id="url-api-participant-delete">{{ route('api.participant.delete') }}</p>
      <p id="url-nametag-show">{{ route('nametag.show', '0') }}</p>
      <p id="url-api-certicicate-send">{{ route('api.certificate.send', '0') }}</p>
    </div>    
@endsection

@section('additionalScripts')
  <link rel="stylesheet" type="text/css" href="{{URL::asset('admin/css/plugins/loaders/loaders.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{URL::asset('admin/css/core/colors/palette-loader.css')}}">

  <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/vendors/css/tables/datatable/datatables.min.css') }}">
  <script src="{{ URL::asset('admin/vendors/js/tables/datatable/datatables.min.js') }}" type="text/javascript"></script>

  <link rel="stylesheet" type="text/css" href="{{URL::asset('admin/vendors/css/forms/selects/selectize.css')}}">
  <link rel="stylesheet" type="text/css" href="{{URL::asset('admin/vendors/css/forms/selects/selectize.default.css')}}">
  <link rel="stylesheet" type="text/css" href="{{URL::asset('admin/css/plugins/forms/selectize/selectize.css')}}">
  <script src="{{URL::asset('admin/vendors/js/forms/select/selectize.min.js')}}" type="text/javascript"></script>  


  <script type="text/javascript" src="{{ URL::asset('js/view/peserta/index.js?').uniqid() }}"></script>
  <script type="text/javascript" src="{{URL::asset('js/additional/cleanSelectize.js')}}"></script>
@endsection