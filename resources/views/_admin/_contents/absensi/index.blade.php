@extends('_admin._templates.master')
@section('title', 'Absensi | BMS')

@section('breadcrumbs')
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title">Data Absensi</h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">Absensi
            </li>
          </ol>
        </div>
      </div>
    </div>
@endsection

@section('body')
    <section>
          <div class="row">
            <div class="col-md-4">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Scan Kehadiran</h4>
                  <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body">
                    <div class="form-group">
                      <label>Attendance To</label>
                      <select class="selectizes">
                        <option value="">--Pilih Acara--</option>
                      </select>
                    </div>      
                    <div id="scan" v-show="displayed">
                      <p class="error">
                      @{{ errorMessage }}
                      </p>
                      <qrcode-stream @decode="onDecode" @init="onInit"></qrcode-stream>   
                      <p>
                      Last result: <b>@{{ decodedContent }}</b>
                      </p>
                      <p v-show="result_name != ''">Name : @{{ result_name }}</p>                       
                    </div>
                  </div>
                </div>
              </div>
            </div>            
            <div class="col-md-8" id="scan-history">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Riwayat Scan Kehadiran</h4>
                  <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body" v-show="displayed">
                    <ul class="list-group">
                      <li class="list-group-item d-flex justify-content-between lh-condensed" v-for="item in registrant">
                        <div>
                          <h6 class="my-0">@{{ item.participant.full_name }}</h6>
                          <small class="text-muted">@{{ item.created_at.substr(11, 5) }}</small>
                        </div>
                        <span class="text-muted">@{{ item.status == '1' ? 'Pagi' : 'Siang' }}</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        
        <div class="hidden rm">
          <p id="url-api-attendance-scan">{{ route('api.scan') }}</p>
          <p id="url-api-attendance-list">{{ route('api.scan.list', '0') }}</p>
          <p id="url-api-event-active">{{ route('api.event.active') }}</p>
        </div>

@endsection

@section('additionalScripts')
    <script src="https://unpkg.com/vue@2.6.10/dist/vue.min.js"></script>
    <script src="https://unpkg.com/vue-qrcode-reader@2.0.3/dist/vue-qrcode-reader.browser.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/vue-qrcode-reader@2.0.3/dist/vue-qrcode-reader.css">

    <link rel="stylesheet" type="text/css" href="{{URL::asset('admin/vendors/css/forms/selects/selectize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('admin/vendors/css/forms/selects/selectize.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('admin/css/plugins/forms/selectize/selectize.css')}}">
    <script src="{{URL::asset('admin/vendors/js/forms/select/selectize.min.js')}}" type="text/javascript"></script>

    <script type="text/javascript" src="{{ URL::asset('js/view/absensi/index.js?').uniqid() }}"></script>
    <script type="text/javascript" src="{{URL::asset('js/additional/cleanSelectize.js')}}"></script>
@endsection