<div class="modal fade text-left" id="edit-event" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <label class="modal-title text-text-bold-600" id="myModalLabel33">Ubah Data Event</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-update" action="{{ route('api.event.update', '0') }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="modal-body">
          <label>Nama Kegiatan</label>
          <div class="form-group">
            <input type="text" name="name" placeholder="Nama Kegiatan" class="form-control">
          </div>
          <label>Jenis Kegiatan</label>
          <div class="row skin skin-square mb-1">
            <div class="col-md-3">
              <fieldset>
                <input type="radio" name="type" checked value="1" id="edit-type-umum">
                <label for="edit-type-umum">Umum</label>
              </fieldset>
            </div>
            <div class="col-md-3">
              <fieldset>
                <input type="radio" name="type" value="2" id="edit-type-private">
                <label for="edit-type-private">In House</label>
              </fieldset>
            </div>            
          </div>    
          <div class="row">
            <div class="col-md-6">
              <label>Tanggal Mulai Kegiatan</label>
              <div class="form-group">
                <input type="date" name="started_date" placeholder="Tanggal Mulai Kegiatan" class="form-control">
              </div>
              <label>Tanggal Selesai Kegiatan</label>
              <div class="form-group">
                <input type="date" name="ended_date" placeholder="Tanggal Selesai Kegiatan" class="form-control">
              </div>
              <label>Tempat Kegiatan</label>
              <div class="form-group">
                <input type="text" name="place" placeholder="Tempat Kegiatan" class="form-control">
              </div>
              <label>Instansi</label>
              <div class="form-group">
                <input name="agency" type="text" placeholder="Instansi" class="form-control">
              </div>              
            </div>
            <div class="col-md-6">
              <center>
                  <img id="edit-event-image" onclick="window._triger(this)" src="{{ URL::asset('noimage.jpg') }}" style="height: 360px; max-width: 360px;">
              </center>
              <center>
                   <a onclick="window._triger(this)" class="btn btn-primary ml-1 text-white" style="margin-top: 10px;">
                      <i class="fa fa-file-image-o mr-1"></i> Ubah Gambar
                  </a>    
              </center>
              <input type="file" style="display: none;" accept="image/*" onchange="window.previewFile(this)" name="image">  
            </div>
          </div>

          <label>Deskripsi Kegiatan</label>
          <div class="form-group">
            <textarea name="description" class="form-control" rows="3" placeholder="Deskripsi Kegiatan"></textarea>
          </div>          
        </div>
        <div class="modal-footer">
          <input type="reset" class="btn btn-outline-primary" data-dismiss="modal"
          value="Batal">
          <input type="submit" class="btn btn-primary" value="Simpan">
        </div>
      </form>
    </div>
  </div>
</div>