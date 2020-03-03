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
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">BMS Statistics</h4>
      </div>
      <div class="card-content collapse show">
        <div class="card-body chartjs">
          <div class="row">
            <div class="col-4">
              <select class="selectizes">
                <option value="event" selected>Events</option>
                <option value="participant">Participants</option>
              </select>
            </div>
            <div class="col-4">
              <select class="selectizes">
                @php
                  $year = date('Y');
                @endphp
                @for ($i=0; $i < 3; $i++)
                  <option value="{{$year}}" {{$retVal = ($year == date('Y')) ? 'selected' : ' ' }}>{{$year--}}</option>
                @endfor
              </select>
            </div>
            <div class="col-4">
              <select class="selectizes">
                <option value="line" selected>Line</option>
                <option value="bar">Bar</option>
                <option value="radar">Radar</option>
              </select>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-12">
            <div class="modal-body">
              <div class="loader-wrapper" id="loader">
                <div class="loader-container">
                  <div class="ball-spin-fade-loader loader-blue">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                  </div>
                </div>
              </div>              
              <div id="chart">
                <canvas id="line-chart" height="500"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="hidden rm">
  <p id="url-api-event">{{ route('api.statistic.event') }}</p>
  <p id="url-api-participant">{{ route('api.statistic.participant') }}</p>
</div>

@endsection

@section('additionalScripts')
  <script src="{{ URL::asset('admin/vendors/js/charts/chart.min.js')}}" type="text/javascript"></script>
  <script src="{{ URL::asset('admin/vendors/js/charts/utils.js')}}" type="text/javascript"></script>

  <link rel="stylesheet" type="text/css" href="{{URL::asset('admin/css/plugins/loaders/loaders.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{URL::asset('admin/css/core/colors/palette-loader.css')}}">

  <link rel="stylesheet" type="text/css" href="{{URL::asset('admin/vendors/css/forms/selects/selectize.css')}}">
  <link rel="stylesheet" type="text/css" href="{{URL::asset('admin/vendors/css/forms/selects/selectize.default.css')}}">
  <link rel="stylesheet" type="text/css" href="{{URL::asset('admin/css/plugins/forms/selectize/selectize.css')}}">
  <script src="{{URL::asset('admin/vendors/js/forms/select/selectize.min.js')}}" type="text/javascript"></script>  

  <script type="text/javascript" src="{{ URL::asset('js/view/dashboard/index.js?').uniqid() }}"></script>

  <script type="text/javascript" src="{{URL::asset('js/additional/cleanSelectize.js')}}"></script>

@endsection