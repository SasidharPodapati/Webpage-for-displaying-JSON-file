<?php
class ProcessJsonData{
	
	/**
	 * This function is to convert json file into php array
	 * */
	public function jsonToArray($filename){
		$jsonStr = file_get_contents($filename);
		$jsonArray = json_decode($jsonStr, true);
		return $jsonArray;
	}
	
	/**
	 * This function is to get the distinct filenames from nested array
	 * */
	function getFileNames($arr, $index)
	{
		$dll_filenames = array();
		foreach($arr as $k=>$v){
			if($index!=''){
				if(strtolower($index) == strtolower($v['filename'][0]) and !in_array($v['filename'], array_column($dll_filenames,'filename'))){
					$dll_filenames[] = array('filename'=>$v['filename'], 'description'=>$v['description']);	
				}
			}
			else{
				if(!in_array($v['filename'], array_column($dll_filenames,'filename'))){
					$dll_filenames[] = array('filename'=>$v['filename'], 'description'=>$v['description']);	
				}
			}
		}
		return $dll_filenames;
	}
	
	/**
	 * This function is to get the details of the dll file
	 * */
	function getFileDetails($jsonArr, $fileName){
		
		$dll_details = array();
		foreach($jsonArr as $key=>$value){
			if($value['filename'] == $fileName){
				$dll_details[$value['os']['versionMajor'].'.'.$value['os']['versionMinor']][] = $value;
			}
		}
		
		ksort($dll_details);
		
		$dlldetails = array();
		foreach($dll_details as $key=>$value){
			foreach($value as $val){
				$dlldetails[] = $val;
			}
		}
		return $dlldetails;
	}
	
	/**
	 * This function is to get the file names matching with search string
	 * */
	function getFileNameBySearch($arr, $index){
		$dll_filenames = array();
		foreach($arr as $k=>$v){
			if($index!=''){
				if (stripos(strtolower($v['filename']), strtolower($index)) !== false)
					if(!in_array($v['filename'], array_column($dll_filenames,'filename'))){
						$dll_filenames[] = array('filename'=>$v['filename'], 'description'=>$v['description']);		
					}	
			}
		}
		return $dll_filenames;
	}
}
?>






