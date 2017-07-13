<?php

?>
<!-- Search Section of the webpage-->
<section class="header-search search bg-black">
	<div class="section-content wrap" style="padding-top:15px;padding-bottom:5px;">
		<form method="get" action="/Tilftest/index.php/action=details">
			<input type="text" name="dll" placeholder="Enter DLL file name" style="width:400px;padding:10px;border-radius:10px;">
			<button style="padding:10px;border-radius:10px;">Search DLL file</button>
		</form>
	</div>
</section>

<!-- Index Section of the webpage-->
<section class="search-letters bg-beige-light">
	<div class="section-content wrap">
		<h2>Select the starting letter of the DLL file</h2>
		<article class="clearfix">
			<ul class="letters">
				<?php foreach(range('a','z') as $Letters):?>
				<li><a href="/Tilftest/index.php?key=<?php echo $Letters;?>"><?php echo $Letters;?></a></li>
				<?php endforeach;?>
			</ul>
		</article>
	</div>
</section>
