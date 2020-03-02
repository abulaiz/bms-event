<div class="modal fade text-left" id="add-event" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
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
                <input type="text" name="full_name" placeholder="Nama Lengkap" class="form-control">
              </div>
              <label>Tempat Tanggal Lahir</label>
              <div class="form-group">
                <input type="date" name="ttl" placeholder="" class="form-control">
              </div>    
            </div>
            <div class="col-md-6">
              <label>Nama Panggilan</label>
              <div class="form-group">
                <input type="text" name="nick_name" placeholder="Nama Panggilan" class="form-control">
              </div>
              <label>Email</label>
              <div class="form-group">
                <input type="email" name="email" placeholder="Email" class="form-control">
              </div>    
            </div>
          </div>
          <label>Alamat</label>
          <div class="form-group">
            <textarea name="address" class="form-control" rows="3" placeholder="Alamat"></textarea>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label>WhatsApp / Phone</label>
              <div class="form-group">
                <input type="text" name="phone" placeholder="WhatsApp / Phone" class="form-control">
              </div>
              <label>Twitter</label>
              <div class="form-group">
                <input type="text" name="twitter" placeholder="Twitter" class="form-control">
              </div>    
              <label>Istansi</label>
              <div class="form-group">
                <input type="text" name="instansi" placeholder="Instansi" class="form-control">
              </div>    
            </div>
            <div class="col-md-6">
              <label>Instagram</label>
              <div class="form-group">
                <input type="text" name="instagram" placeholder="Instagram" class="form-control">
              </div>
              <label>Facebook</label>
              <div class="form-group">
                <input type="text" name="facebook" placeholder="Facebook" class="form-control">
              </div>    
              <label>Jabatan</label>
              <div class="form-group">
                <input type="text" name="jabatan" placeholder="Jabatan" class="form-control">
              </div>    
            </div>
          </div>   
          <label>Masa Kerja</label>
          <div class="form-group">
            <input type="text" name="masa" placeholder="Masa Kerja" class="form-control">
          </div>    
          <label>Kekuatan</label>
          <div class="form-group">
            <input type="text" name="kekuatan" placeholder="Kekuatan" class="form-control">
          </div>    
          <label>Kelemahan</label>
          <div class="form-group">
            <input type="text" name="kelemahan" placeholder="Kelemahan" class="form-control">
          </div>    
          <label>Peluang</label>
          <div class="form-group">
            <input type="text" name="peluang" placeholder="Peluang" class="form-control">
          </div>    
          <label>Tantangan</label>
          <div class="form-group">
            <input type="text" name="tantangan" placeholder="Tantangan" class="form-control">
          </div>    
          <label>Cerita Singkat</label>
          <div class="form-group">
            <textarea name="cerita" class="form-control" rows="3" placeholder="Cerita Singkat"></textarea>
          </div>
          <label>Harapan Terbesar Dalam Hidup</label>
          <div class="form-group">
            <textarea name="harapan_hidup" class="form-control" rows="3" placeholder="Harapan Terbesar Dalam Hidup"></textarea>
          </div>
          <label>Harapan Mengikuti Pelatihan</label>
          <div class="form-group">
            <textarea name="harapan_pelatihan" class="form-control" rows="3" placeholder="Harapan Mengikuti Pelatihan"></textarea>
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