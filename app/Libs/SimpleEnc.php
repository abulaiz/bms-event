<?php 
  	
  	namespace App\Libs;

	class SimpleEnc
	{

		private $pattern = "xyzwWXYZabcdN34567OPQefglmnopHIV0128JKqrstuvABCDEhijkFGLMRSTU9";

		private function div($x, $y) {
			$sisa = $x % $y;
			return ($x-$sisa) / $y;			
		}

		private function getPos($chr) {
			$pattern = $this->pattern;
			for ($i=0; $i < strlen($pattern); $i++) { 
				if($chr==$pattern[$i])
					return $i;
			}
		}

		private function maskText($x, $length){
			if($length < 5){
				for($i=0, $j=0; $i< (5 - $length); $i++, $j+=4){
					$pref = substr($x, 0, $j);
					$intr = $this->pattern[rand(0,61)].$this->pattern[rand(0,61)];
					$suff = substr($x, $j);
					$x = $pref.$intr.$suff;
				}	
			}
			$pattern_length = strlen($this->pattern);
			$ret = $this->pattern[$length % $pattern_length].$x;
			$ret = ($this->div($length, $pattern_length)+1).$ret;
		 	return $ret;	
		}

		public function encrypt($x){
			$x .= '';
			$length = strlen($x);
			$out = "";
			for($i=0; $i<strlen($x); $i++){
				$rr = ord($x[$i]);
				$p = rand(2,5);
				$s = $this->div($rr, $p);
				$out .= $this->pattern[$s]."".$this->pattern[ ($p*10) + ($rr%$p) ];
			}
			$out = $this->maskText($out, $length);
		 	return $out;		
		}

		private function getText($x, $length){
			$real = [
				[2],
				[2, 6],
				[2, 6, 8],
				[2, 4, 6, 8],
			];
			$txt = "";
			$ptt = $real[$length - 1];
			for($i=0; $i<count($ptt); $i++){
				$txt .= substr($x, $ptt[$i], 2);
			}
			return $txt;
		}

		public function decrypt($x) {
			$in = "";
			try {
				$length =  $this->getPos($x[1]) + ( ((int)$x[0]-1) * strlen($this->pattern));
				$x = substr($x, 2);
				if($length < 5){
					$x = $this->getText($x, $length);
				}			
				for($i=0; $i<strlen($x); $i+=2){
					$ii = $this->getPos($x[$i]);
					$iii = $this->getPos($x[$i+1]);

					$sisa = $iii % 10;
					$p = ($iii - $sisa) / 10;
					$num = ($ii*$p)+$sisa;
					$in .= chr($num);
				}				
			} catch (Exception $e) {
				return null;
			}

			return $in;
		}

		public function attch_enc($id, $filename){
			$u = $this->encrypt($user_id);
			$i = $this->encrypt($filename);
			$ul = strlen($u);
			$r_pos = rand(2, 9);
			$str = substr($i, 0, $r_pos) . $u . substr($i, $r_pos) ."_".$ul.chr($r_pos+64);
			return $str; 
		}

		public function attch_dec($code){
			$x = explode('_', $code);
			if( count($x) != 2 ) return null;
			$r_pos = ord($x[1][ strlen($x[1]) - 1 ]) - 64;
			$ul = substr($x[1], 0, strlen($x[1]) - 1);

			$u = '';
			try {
				$u = $this->decrypt( substr($x[0], $r_pos, $ul) );
				$i = $this->decrypt( substr($x[0], 0, $r_pos).substr($x[0], $r_pos+$ul) );
			} catch (Exception $e) {
				return null;
			}

			return (object)['id' => $u, 'filename' => $i];
		}
	}
