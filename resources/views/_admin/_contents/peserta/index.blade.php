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
    <div class="content-header-right col-md-6 col-12">
        <select class="select2 form-control relative col-md-5 col-12 float-right p-0">
            <option value="">All</option>
            <option value="PP">Pelatihan Pernikahan</option>
        </select>
    </div>
@endsection

@section('body')
    <section id="configuration">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Data Peserta</h4>
              <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
            </div>
            <div class="card-content collapse show">
              <div class="card-body card-dashboard">
                <table class="table table-striped table-bordered zero-configuration" id="datatable">
                  <thead>
                    <tr>
                      <th>Nama Lengkap</th>
                      <th>No. HP / WA</th>
                      <th>Email</th>
                      <th>Instansi</th>
                      <th>Jabatan</th>
                      <th>Status Kehadiran</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td><a href="#">Tachibana Kanade</a></td>
                        <td>081234567890</td>
                        <td>best@waifu.net</td>
                        <td>Anime</td>
                        <td>Waifu</td>
                        <td><i class="fa fa-check success"></i></td>
                        <td class="action-menu"">
                                <button type="button" class="btn btn-outline-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                <div class="dropdown-menu" x-placement="bottom-start">   
                                    <a data-backdrop="static" data-keyboard="false" class="dropdown-item">Generate ID Card</a>
                                    <a data-backdrop="static" data-keyboard="false" class="dropdown-item">Kirim E-Serifikat</a>
                                </div>
                        </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection

@section('additionalScripts')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/vendors/css/forms/selects/select2.min.css') }}">
    <script src="{{ URL::asset('admin/vendors/js/forms/select/select2.full.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('admin/js/scripts/forms/select/form-select2.js') }}" type="text/javascript"></script>
@endsection