<div class="modal fade text-left" id="print-report" tabindex="-1" role="dialog" aria-labelledby="myModalLabel77" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <label class="modal-title text-text-bold-600" id="myModalLabel77">Cetak Laporan</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Tanggal Awal</label>
          <input type="date" onchange="window.setPreference()" id="started_date_d" class="form-control">
        </div>
        <div class="form-group">
          <label>Tanggal Akhir</label>
          <input type="date" onchange="window.setPreference()" id="ended_date_d" class="form-control">
        </div>        
      </div>
      <div class="modal-footer">
        <a href="{{ route('report.event') }}" target="blank" class="btn btn-success" id="print_date">Cetak</a>
      </div>

    </div>
  </div>
</div>