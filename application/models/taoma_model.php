<?php
	/**
	* 
	*/
	class taoma_model extends CI_Model
	{
		
		public function Timmacuoi($tenid,$tenbang,$chuoi,$limit)
		{
			$ketqua="";
			$khong="0";
			if($tenid!="MAKH"||$tenid!="id"||$tenid!="MADM"||$tenid!="MACTH")
			{
				$max=$limit-2;
			}
			else {
				$max=$limit-9;
			}
			$im="";
			$sel="select ".$tenid." from ".$tenbang. " where ".$tenid." like '".$chuoi."%' order by ".$tenid." desc limit 1";
			$result = $this->db->query($sel);
			foreach ($result->result() as $row)
			{
				$im=$row->$tenid;
			}
			if ($im=="")
			{
				$im=1;
				for ($i=0; $i <$limit ; $i++) { 
					# code...
					$ketqua.=$khong;
				}
				$ketqua.=$im;


			}
			else
			{
				$im=substr($im,-(strlen($im)-2));
				$im=intval($im);
				$im+=1;
				for ($i=0; $i <$limit ; $i++) { 
					# code...
					$ketqua.=$khong;
				}
				$ketqua.=$im;
			}
			$ketqua=substr($ketqua,-$max);//lấy $max kí tự từ dưới lên;
			$chuoi.=$ketqua;
			//echo "$chuoi";
			return $chuoi;
		}
	}
?>