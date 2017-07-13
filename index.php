<?php

$action = $_REQUEST['action'];
$index = $_REQUEST['key'];
$dllName = $_REQUEST['dll'];
$dllFile = $_REQUEST['file'];

$file_name = "data.json";

include('data.php');


$json = new ProcessJsonData();
$json_arr = $json->jsonToArray($file_name);

$file_names = $json->getFileNames($json_arr,$index);

$dll_details = $json->getFileDetails($json_arr,$dllFile);

$dll_detailsarr = $json->getFileNameBySearch($json_arr,$dllName);

//echo "<pre>";print_r($dll_detailsarr);echo "</pre>";

//echo "<pre>";print_r($file_names);echo "</pre>";

//echo "<pre>";print_r($dll_details);echo "</pre>";

?>

<html>
	<head>
		<style>
			
			html {
			  	text-align: center;
			}
			body
			{
				width:100%;
				height:100%;
				margin-left:auto;
				margin-right:auto;
				margin: 0px;
			}
			ol, ul {
				list-style: none;
			}
			li {
				display: list-item;
				text-align: -webkit-match-parent;
			}
			section.search-letters > div.section-content > article > ul.letters > li:first-of-type {
				padding: 0 0.575em 0 0;
			}
			section.search-letters > div.section-content > article > ul.letters > li {
				font-size: 1.125em;
				font-weight: 600;
				text-transform: uppercase;
				border-right: 0.1em solid #228B22;
				display: inline-block;
				padding: 0 0.575em 0 0.475em;
			}
			.bg-black {
				background-color: #2d2d2d;
			}
			tr:nth-child(even) {
				background: #CCC
			}
			tr:nth-child(odd) {
				background: #FFF
			}
			a:hover, a:active {
    			color: #4CAF50;
			}
			a {
				text-decoration: none; 
			}
			.tab{
				width:50%; 
				text-align:right; 
				padding-right:30px;
			}
		</style>
	</head>
	<body>
		<div style="background-color: #bfbfbf;height:auto; min-height:100%;text-align:center" >
	<?php  include('header.php');?>	
	
	<!-- Starting letter results-->
	<?php if($index != ''):?>
	<?php if(count($file_names)):?>
	<br/>
	<h3>DLL FILES STARTING WITH THE LETTER <span style="color:#228B22"><?php echo strtoupper($index);?></span></h3>
	<table cellpadding=10 cellspacing=0 border=0 width=100%>
		<tr>
			<td class="tab"><b>FileName</b></td>
			<td><b>Description</b></td>
		</tr>
	<?php foreach($file_names as $key=>$value):?>		
		<tr>
			<td class="tab">
				<a href="/Tilftest/index.php?file=<?php echo $value['filename'];?>">
				<?php echo $value['filename'];?>
				</a>
			</td>
			<td><?php echo $value['description'];?></td>
		</tr>
	<?php endforeach;?>
	</table>
	<?php else:?>
	<br/><br/>
	<h3>NO DLL FILES STARTING WITH THE LETTER <span style="color:#FF4500"><?php echo strtoupper($index);?></span></h3>
	<?php endif;?>
	<?php endif;?>
	
	<!-- Search string matching results-->
	<?php if($dllName != ''):?>
	<?php if(count($dll_detailsarr)):?>
	<br/>
	<h3>DLL FILES MATHING WITH THE STRING <span style="color:#228B22"><?php echo strtoupper($dllName);?></span></h3>
	<table cellpadding=5 cellspacing=0 border=0 width=100%>
		<tr>
			<td class="tab"><b>FileName</b></td>
			<td><b>Description</b></td>
		</tr>
	<?php foreach($dll_detailsarr as $key=>$value):?>		
		<tr>
			<td class="tab">
				<a href="/Tilftest/index.php?file=<?php echo $value['filename'];?>">
				<?php echo $value['filename'];?>
				</a>
			</td>
			<td><?php echo $value['description'];?></td>
		</tr>
	<?php endforeach;?>
	</table>
	<?php else:?>
	<br/><br/>
	<h3>NO DLL FILES MATHING WITH THE STRING <span style="color:#FF4500"><?php echo strtoupper($dllName);?></span></h3>
	<?php endif;?>
	<?php endif;?>
	
	<!-- Dll File details-->
	<?php if($dllFile != ''):?>
	<?php if(count($dll_details)):?>
	<br/>
	<h4>FileName: <span style="color:#228B22"><?php echo $dllFile;?></span></h4>
	<table cellpadding=5 cellspacing=0 border=0 width=100%>
		<tr>
			<td><b>OS</b></td>
			<td><b>Bits</b></td>
			<td><b>Version</b></td>
			<td><b>File Size</b></td>
			<td><b>Companyname</b></td>
			<td><b>Description</b></td>
			<td><b>Checksums</b></td>
		</tr>
	<?php foreach($dll_details as $key=>$value):?>		
		<tr>
			<td><?php echo $value['os']['name'];?></td>
			<td><?php echo $value['bits'].'bit ';?></td>
			<td><?php echo $value['os']['versionMajor'].'.'.$value['os']['versionMinor'];?></td>
			<td><?php echo $value['filesize'];?></td>
			<td><?php echo $value['companyname'];?></td>
			<td><?php echo $value['description'];?></td>
			<td><?php echo $value['md5'];?></td>
		</tr>
	<?php endforeach;?>
	</table>
	<?php else:?>
	<br/><br/>
	<h3>NO DLL FILES MATHING WITH THE STRING <span style="color:#FF4500"><?php echo strtoupper($dllName);?></span></h3>
	<?php endif;?>
	<?php endif;?>
	
	</div>
	</body>	
</html>
