@extends('_user._templates.master')
@section('title', 'Register | BMS')

@section('header')
    <div class="hero-wrap hero-bread" style="background-image: url('user/images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span>Register</span></p>
            <h1 class="mb-0 bread">Register</h1>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('body')
<section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-10 ftco-animate">
			<form action="#" class="billing-form">
				<h3 class="mb-4 billing-heading">Data Diri</h3>
	        	<div class="row align-items-end">
	          		<div class="col-md-6">
	            		<div class="form-group">
	            			<label for="firstname">Nama Lengkap</label>
	              			<input type="text" class="form-control" placeholder="Nama Lengkap">
	            		</div>
	            	</div>
	            	<div class="col-md-6">
	            		<div class="form-group">
	            			<label for="lastname">Nama Panggilan</label>
	              			<input type="text" class="form-control" placeholder="Nama Panggilan">
	            		</div>
                	</div>
                	<div class="col-md-6">
	            		<div class="form-group">
	            			<label for="firstname">Tempat Tanggal Lahir</label>
	              			<input type="date" class="form-control" placeholder="Tempat Tanggal Lahir">
	            		</div>
	            	</div>
	            	<div class="col-md-6">
	            		<div class="form-group">
	            			<label for="lastname">Email</label>
	              			<input type="email" class="form-control" placeholder="Email">
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
	              			<input type="text" class="form-control" placeholder="WhatsApp / Phone">
	            		</div>
		        	</div>
		        	<div class="col-md-6">
		        		<div class="form-group">
                    		<label for="streetaddress">Instagram</label>
	              			<input type="text" class="form-control" placeholder="Instagram">
	            		</div>
		        	</div>
		        	<div class="w-100"></div>
		        	<div class="col-md-6">
		        		<div class="form-group">
	            			<label for="towncity">Twitter</label>
	              			<input type="text" class="form-control" placeholder="Twitter">
	            		</div>
		        	</div>
		        	<div class="col-md-6">
		        		<div class="form-group">
		        			<label for="postcodezip">Facebook</label>
	             			<input type="text" class="form-control" placeholder="Facebook">
	            		</div>
		        	</div>
				</div>
				<h3 class="mb-4 billing-heading">Data Pekerjaan</h3>
	        	<div class="row align-items-end">
	        		<div class="col-md-6">
	        			<div class="form-group">
	        				<label for="firstname">Instansi</label>
	             			<input type="text" class="form-control" placeholder="Instansi">
	        			</div>
	        		</div>
	        		<div class="col-md-6">
	        			<div class="form-group">
	        				<label for="lastname">Jabatan</label>
	             			<input type="text" class="form-control" placeholder="Jabatan">
	        			</div>
            		</div>
            		<div class="col-md-12">
	        			<div class="form-group">
	        				<label for="firstname">Masa Kerja</label>
	             			<input type="text" class="form-control" placeholder="Masa Kerja">
	        			</div>
	        		</div>
		        </div>    
				<h3 class="mb-4 billing-heading">Analisa Personal</h3>
	        	<div class="row align-items-end">
	        		<div class="col-md-12">
	        			<div class="form-group">
	        				<label for="firstname">Kekuatan</label>
	             			<input type="text" class="form-control" placeholder="Kekuatan">
	        			</div>
	        		</div>
	        		<div class="col-md-12">
	        			<div class="form-group">
	        				<label for="lastname">Kelemahan</label>
	             			<input type="text" class="form-control" placeholder="Kelemahan">
	        			</div>
            		</div>
            		<div class="col-md-12">
	        			<div class="form-group">
	        				<label for="firstname">Peluang</label>
	             			<input type="text" class="form-control" placeholder="Peluang">
	        			</div>
	        		</div>
					<div class="col-md-12">
	        			<div class="form-group">
	        				<label for="firstname">Tantangan</label>
	             			<input type="text" class="form-control" placeholder="Tantangan">
	        			</div>
	        		</div>
		        </div>    
				<h3 class="mb-4 billing-heading">Cerita Singkat Tentang Pribadi</h3>
	        	<div class="row align-items-end">
	        		<div class="col-md-12">
	        			<div class="form-group">
	        				<label for="firstname">Cerita Singkat</label>
							<textarea class="form-control" name="cerita" id="cerita" rows="5" placeholder="Cerita Singkat"></textarea>
	        			</div>
	        		</div>
		        </div>    
				<h3 class="mb-4 billing-heading">Harapan</h3>
	        	<div class="row align-items-end">
	        		<div class="col-md-12">
	        			<div class="form-group">
	        				<label for="firstname">Harapan Terbesar Dalam Hidup</label>
							<textarea class="form-control" name="harapan_hidup" id="harapan-hidup" rows="5" placeholder="Harapan Terbesar Dalam Hidup"></textarea>
	        			</div>
	        		</div>
					<div class="col-md-12">
	        			<div class="form-group">
	        				<label for="firstname">Harapan Mengikuti Pelatihan</label>
							<textarea class="form-control" name="harapan_pelatihan" id="harapan-pelatihan" rows="5" placeholder="Harapan Mengikuti Pelatihan"></textarea>
	        			</div>
	        		</div>
					<div class="col-md-12">
						<a href="#"class="btn btn-primary py-3 px-4">Register</a>
	        		</div>
		        </div> 
	        </form><!-- END -->
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->
@endsection