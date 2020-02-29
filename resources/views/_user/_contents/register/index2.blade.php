@extends('_user._templates.master')
@section('title', 'Register | BMS')

@section('header')
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
        	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
			<div class="container">
				<div class="banner_content text-center">
					<h2>Register</h2>
					<div class="page_link">
						<a href="/">Home</a>
						<a href="{{ route('register') }}">Register</a>
					</div>
				</div>
			</div>
        </div>
    </section>
@endsection

@section('body')
    <section class="contact_area p_120">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                        <div class="col-md-12">
                            <h5>Data Diri</h5>
                            <div class="form-group">
                                <input type="text" class="form-control" id="full-name" name="full_name" placeholder="Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nick-name" name="nick_name" placeholder="Nama Panggilan">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="ttl" name="ttl" placeholder="Tempat Tanggal Lahir">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="address" id="address" rows="1" placeholder="Alamat"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Whatsapp / Phone">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Instagram">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Twitter">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h5>Data Pekerjaan</h5>
                            <div class="form-group">
                                <input type="text" class="form-control" id="instansi" name="instansi" placeholder="Instansi">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="masa-jabatan" name="masa_jabatan" placeholder="Masa Jabatan">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h5>Analisa Personal</h5>
                            <div class="form-group">
                                <input type="text" class="form-control" id="kekuatan" name="kekuatan" placeholder="Kekuatan">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="kelemahan" name="kelemahan" placeholder="Kelemahan">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="peluang" name="peluang" placeholder="Peluang">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="tantangan" name="tantangan" placeholder="Tantangan">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h5>Cerita Singkat Tentang Pribadi</h5>
                            <div class="form-group">
                                <textarea class="form-control" name="cerita" id="cerita" rows="1" placeholder="Cerita Singkat Pribadi"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h5>Harapan</h5>
                            <div class="form-group">
                                <textarea class="form-control" name="harapan_hidup" id="harapan-hidup" rows="1" placeholder="Harapan Terbesar Dalam Hidup"></textarea>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="harapan_event" id="harapan-event" rows="1" placeholder="Harapan Mengikuti Pelatihan"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" value="submit" class="btn submit_btn">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection