<div class="modal fade text-left" id="edit-event" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <label class="modal-title text-text-bold-600" id="myModalLabel33">Tambah Event</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="#">
        <div class="modal-body">
          <label>Nama Kegiatan</label>
          <div class="form-group">
            <input type="text" placeholder="Nama Kegiatan" class="form-control">
          </div>
          <label>Tanggal Mulai Kegiatan</label>
          <div class="form-group">
            <input type="date" placeholder="Tanggal Mulai Kegiatan" class="form-control">
          </div>
          <label>Tanggal Selesai Kegiatan</label>
          <div class="form-group">
            <input type="date" placeholder="Tanggal Selesai Kegiatan" class="form-control">
          </div>
          <label>Tempat Kegiatan</label>
          <div class="form-group">
            <input type="text" placeholder="Tempat Kegiatan" class="form-control">
          </div>
          <label>Deskripsi Kegiatan</label>
          <div class="form-group">
            <textarea class="form-control" id="description" rows="3" placeholder="Deskripsi Kegiatan"></textarea>
          </div>
          <label>Gambar</label>
          <div class="form-group">
            <div class="custom-file">
            <input type="file" class="custom-file-input" id="inputGroupFile01">
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
          </div>
          </div>
          <label>Instansi</label>
          <div class="form-group">
            <input type="text" placeholder="Instansi" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
          value="Batal">
          <input type="submit" class="btn btn-outline-primary btn-lg" value="Tambah">
        </div>
      </form>
    </div>
  </div>
</div>