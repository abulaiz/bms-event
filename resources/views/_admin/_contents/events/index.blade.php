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
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td><a href="#">Pelatihan Pernikahan</a></td>
                            <td>Bandung</td>
                            <td>KUA Kecamatan Banjaran</td>
                            <td>Coming Soon</td>
                            <td class="action-menu"">
                                    <button type="button" class="btn btn-outline-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                    <div class="dropdown-menu" x-placement="bottom-start">
                                        <a data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#edit-event" class="dropdown-item">Edit</a>    
                                        <a data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#detail" class="dropdown-item">Detail</a>
                                        <a data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#detail" class="dropdown-item">Hapus</a>
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
        
    @include('_admin._contents.events._modals.add')
    @include('_admin._contents.events._modals.edit')

@endsection

@section('additionalScripts')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/vendors/css/tables/datatable/datatables.min.css') }}">
    <script src="{{ URL::asset('admin/vendors/js/tables/datatable/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('admin/js/scripts/tables/datatables/datatable-basic.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#datatable').DataTable();
        });
        
    </script>
@endsection