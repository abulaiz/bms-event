<div class="modal fade text-left" id="detail-peserta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <label class="modal-title text-text-bold-600" id="myModalLabel33">Detail Peserta</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-add" action="" method="POST">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <label>Nama Lengkap</label>
              <div class="form-group">
                <input type="text" name="full_name" disabled placeholder="Nama Lengkap" class="form-control">
              </div>
              <label>Tempat Lahir</label>
              <div class="form-group">
                <input type="text" name="place_of_birth" placeholder="" class="form-control" disabled>
              </div>    
            </div>
            <div class="col-md-6">
              <label>Nama Panggilan</label>
              <div class="form-group">
                <input type="text" name="nick_name" placeholder="Nama Panggilan" class="form-control" disabled>
              </div>
              <label>Tanggal Lahir</label>
              <div class="form-group">
                <input type="text" name="date_of_birth" placeholder="" class="form-control" disabled>
              </div>      
            </div>
            <div class="col-md-6">
              <label>Email</label>
              <div class="form-group">
                <input type="email" name="email" placeholder="Email" class="form-control" disabled>
              </div>    
            </div>            
          </div>
          <label>Alamat</label>
          <div class="form-group">
            <textarea disabled name="address" class="form-control" rows="3" placeholder="Alamat"></textarea>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label>WhatsApp / Phone</label>
              <div class="form-group">
                <input type="text" name="phone" placeholder="WhatsApp / Phone" class="form-control" disabled>
              </div>
              <label>Twitter</label>
              <div class="form-group">
                <input type="text" name="twitter" placeholder="Twitter" class="form-control" disabled>
              </div>    
              <label>Istansi</label>
              <div class="form-group">
                <input type="text" name="agency" placeholder="Instansi" class="form-control" disabled>
              </div>    
            </div>
            <div class="col-md-6">
              <label>Instagram</label>
              <div class="form-group">
                <input type="text" name="instagram" placeholder="Instagram" class="form-control" disabled>
              </div>
              <label>Facebook</label>
              <div class="form-group">
                <input type="text" name="facebook" placeholder="Facebook" class="form-control" disabled>
              </div>    
              <label>Jabatan</label>
              <div class="form-group">
                <input type="text" name="position" placeholder="Jabatan" class="form-control" disabled>
              </div>    
            </div>
          </div>   
          <label>Masa Kerja</label>
          <div class="form-group">
            <input type="text" name="years_of_service" placeholder="Masa Kerja" class="form-control" disabled>
          </div>    
          <label>Kekuatan</label>
          <div class="form-group">
            <input type="text" name="strength" placeholder="Kekuatan" class="form-control" disabled>
          </div>    
          <label>Kelemahan</label>
          <div class="form-group">
            <input type="text" name="weakness" placeholder="Kelemahan" class="form-control" disabled>
          </div>    
          <label>Peluang</label>
          <div class="form-group">
            <input type="text" name="opportunity" placeholder="Peluang" class="form-control" disabled>
          </div>    
          <label>Tantangan</label>
          <div class="form-group">
            <input type="text" name="challenge" placeholder="Tantangan" class="form-control" disabled>
          </div>    
          <label>Cerita Singkat</label>
          <div class="form-group">
            <textarea name="short_story" class="form-control" rows="3" disabled  placeholder="Cerita Singkat"></textarea>
          </div>
          <label>Harapan Terbesar Dalam Hidup</label>
          <div class="form-group">
            <textarea name="hope_in_life" class="form-control" rows="3" disabled  placeholder="Harapan Terbesar Dalam Hidup"></textarea>
          </div>
          <label>Harapan Mengikuti Pelatihan</label>
          <div class="form-group">
            <textarea name="hope_in_training" class="form-control" rows="3" disabled  placeholder="Harapan Mengikuti Pelatihan"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <input type="reset" class="btn btn-outline-success" data-dismiss="modal"
          value="Tutup">
        </div>
      </form>
    </div>
  </div>
</div>