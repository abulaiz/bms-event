@extends('_user._templates.master')
@section('title', 'Register | '.$event->name)

@section('header')
    <div class="hero-wrap hero-bread" style="background-image: url({{URL::asset('user/images/bg_6.jpg')}});">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span>Register</span></p>
            <h1 class="mb-0 bread">{{ $event->name }}</h1>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('body')
<section class="ftco-section">
      <div class="container">
		<div class="alert alert-success" style="display: none;" role="alert" id="alert-container">
		  <h4 class="alert-heading">Berhasil !</h4>
		  <p>Anda telah berhasil terdaftar pada acara {{ $event->name }}.</p>
		  <hr>
		  <p class="mb-0">Silahkan cek inbox atau spam email anda untuk mendapatkan e-ticket yang akan digunakan pada acara tersebut.</p>
		</div>        	
        <div class="row justify-content-center" id="form-container">
          <div class="col-xl-10 ftco-animate">
			<form id="form-register" action="{{ route('event.register.store') }}" method="POST" class="billing-form">
				@csrf
				<input type="hidden" name="event_id" value="{{ $event->id }}">
				<h3 class="mb-4 billing-heading">Data Diri</h3>
	        	<div class="row align-items-end">
	          		<div class="col-md-6">
	            		<div class="form-group">
	            			<label for="firstname">Nama Lengkap</label>
	              			<input type="text" name="full_name" class="form-control" placeholder="Nama Lengkap">
	            		</div>
	            	</div>
	            	<div class="col-md-6">
	            		<div class="form-group">
	            			<label for="lastname">Nama Panggilan</label>
	              			<input type="text" class="form-control" name="nick_name" placeholder="Nama Panggilan">
	            		</div>
                	</div>
                	<div class="col-md-6">
	            		<div class="form-group">
	            			<label for="firstname">Tempat Lahir</label>
	              			<input type="text" class="form-control" name="place_of_birth" placeholder="Tempat Lahir">
	            		</div>
	            	</div>
                	<div class="col-md-6">
	            		<div class="form-group">
	            			<label for="firstname">Tanggal Lahir</label>
	              			<input type="date" class="form-control" name="date_of_birth" placeholder="Tanggal Lahir">
	            		</div>
	            	</div>	            	
	            	<div class="col-md-6">
	            		<div class="form-group">
	            			<label for="lastname">Email</label>
	              			<input type="email" name="email" class="form-control" placeholder="Email">
	            		</div>
                	</div>
                	<div class="w-100"></div>
		        	<div class="col-md-12">
		        		<div class="form-group">
		        			<label for="country">Alamat</label>
		        			<textarea class="form-control" name="address" id="address" rows="5" placeholder="Alamat"></textarea>
		        		</div>
		        	</div>
		        	<div class="w-100"></div>
		        	<div class="col-md-6">
		        		<div class="form-group">
	            			<label for="streetaddress">WhatsApp / Phone</label>
	              			<input type="text" name="phone" class="form-control" placeholder="WhatsApp / Phone">
	            		</div>
		        	</div>
		        	<div class="col-md-6">
		        		<div class="form-group">
                    		<label for="streetaddress">Instagram</label>
	              			<input type="text" name="instagram" class="form-control" placeholder="Instagram">
	            		</div>
		        	</div>
		        	<div class="w-100"></div>
		        	<div class="col-md-6">
		        		<div class="form-group">
	            			<label for="towncity">Twitter</label>
	              			<input type="text" name="twitter" class="form-control" placeholder="Twitter">
	            		</div>
		        	</div>
		        	<div class="col-md-6">
		        		<div class="form-group">
		        			<label for="postcodezip">Facebook</label>
	             			<input type="text" name="facebook" class="form-control" placeholder="Facebook">
	            		</div>
		        	</div>
				</div>
				<h3 class="mb-4 billing-heading">Data Pekerjaan</h3>
	        	<div class="row align-items-end">
	        		<div class="col-md-6">
	        			<div class="form-group">
	        				<label for="firstname">Instansi</label>
	             			<input type="text" name="agency" class="form-control" placeholder="Instansi">
	        			</div>
	        		</div>
	        		<div class="col-md-6">
	        			<div class="form-group">
	        				<label for="lastname">Jabatan</label>
	             			<input type="text" name="position" class="form-control" placeholder="Jabatan">
	        			</div>
            		</div>
            		<div class="col-md-12">
	        			<div class="form-group">
	        				<label for="firstname">Masa Kerja</label>
	             			<input type="text" name="years_of_service" class="form-control" placeholder="Masa Kerja">
	        			</div>
	        		</div>
		        </div>    
				<h3 class="mb-4 billing-heading">Analisa Personal</h3>
	        	<div class="row align-items-end">
	        		<div class="col-md-12">
	        			<div class="form-group">
	        				<label for="firstname">Kekuatan</label>
	             			<input type="text" name="strength" class="form-control" placeholder="Kekuatan">
	        			</div>
	        		</div>
	        		<div class="col-md-12">
	        			<div class="form-group">
	        				<label for="lastname">Kelemahan</label>
	             			<input type="text" name="weakness" class="form-control" placeholder="Kelemahan">
	        			</div>
            		</div>
            		<div class="col-md-12">
	        			<div class="form-group">
	        				<label for="firstname">Peluang</label>
	             			<input type="text" name="opportunity" class="form-control" placeholder="Peluang">
	        			</div>
	        		</div>
					<div class="col-md-12">
	        			<div class="form-group">
	        				<label for="firstname">Tantangan</label>
	             			<input type="text" name="challenge" class="form-control" placeholder="Tantangan">
	        			</div>
	        		</div>
		        </div>    
				<h3 class="mb-4 billing-heading">Cerita Singkat Tentang Pribadi</h3>
	        	<div class="row align-items-end">
	        		<div class="col-md-12">
	        			<div class="form-group">
	        				<label for="firstname">Cerita Singkat</label>
							<textarea class="form-control" name="short_story" rows="5" placeholder="Cerita Singkat"></textarea>
	        			</div>
	        		</div>
		        </div>    
				<h3 class="mb-4 billing-heading">Harapan</h3>
	        	<div class="row align-items-end">
	        		<div class="col-md-12">
	        			<div class="form-group">
	        				<label for="firstname">Harapan Terbesar Dalam Hidup</label>
							<textarea class="form-control" name="hope_in_life" rows="5" placeholder="Harapan Terbesar Dalam Hidup"></textarea>
	        			</div>
	        		</div>
					<div class="col-md-12">
	        			<div class="form-group">
	        				<label for="firstname">Harapan Mengikuti Pelatihan</label>
							<textarea class="form-control" name="hope_in_training" rows="5" placeholder="Harapan Mengikuti Pelatihan"></textarea>
	        			</div>
	        		</div>
					<div class="col-md-12">
						<button class="btn btn-primary py-3 px-4" type="submit">Register</button>
	        		</div>
		        </div> 
	        </form><!-- END -->
          </div> <!-- .col-md-8 -->
          <div class="col-xl-10">        	
          </div>
        </div>
      </div>
    </section> <!-- .section -->
@endsection

@section('additionalScripts')
	<script type="text/javascript" src="{{ URL::asset('user/js/jquery.form.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/view/landing_page/register.js?').uniqid() }}"></script>
@endsection