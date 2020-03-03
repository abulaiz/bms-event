<div class="modal fade text-left" id="detail-event" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <label class="modal-title text-text-bold-600" id="myModalLabel33">Detail Event</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <center>
                  <img onclick="_triger(this)" src="{{ URL::asset('noimage.jpg') }}" style="height: 360px; max-width: 360px;">
              </center>
            </div>
            <div class="col-md-6">
              <label>Nama Kegiatan</label>
              <div class="form-group">
                <input type="text" name="name" placeholder="Nama Kegiatan" class="form-control" disabled>
              </div>
              <label>Tanggal Mulai Kegiatan</label>
              <div class="form-group">
                <input type="date" name="started_date" placeholder="Tanggal Mulai Kegiatan" class="form-control" disabled>
              </div>
              <label>Tanggal Selesai Kegiatan</label>
              <div class="form-group">
                <input type="date" name="ended_date" placeholder="Tanggal Selesai Kegiatan" class="form-control" disabled>
              </div>
              <label>Jenis Kegiatan</label>
              <div class="form-group">
                <input type="text" name="name" placeholder="Nama Kegiatan" class="form-control" disabled>
              </div>
              <label>Tempat Kegiatan</label>
              <div class="form-group">
                <input type="text" name="place" placeholder="Tempat Kegiatan" class="form-control" disabled>
              </div>           
            </div>
          </div>
          <label>Jumlah Pendaftar</label>
          <div class="form-group">
            <input name="participant" type="text" placeholder="Jumlah Pendaftar" class="form-control" disabled>
          </div>   
          <label>Instansi</label>
          <div class="form-group">
            <input name="agency" type="text" placeholder="Instansi" class="form-control" disabled>
          </div>
          <label>Deskripsi Kegiatan</label>
          <div class="form-group">
            <textarea name="description" class="form-control" rows="3" placeholder="Deskripsi Kegiatan" disabled></textarea>
          </div>          
        </div>
        <div class="modal-footer">
          <input type="reset" class="btn btn-outline-success" value="Generate ID Card">
          <input type="submit" class="btn btn-success" value="Kirim E-Sertifikat">
        </div>
      </form>
    </div>
  </div>
</div>