<div id="header">	
	<div class="logo">
		<a href="index.php"><img src="images/logo.png" ></a>
	</div>
	<svg height="0">
		<!-- THE mask -->
		<mask id="mask-firefox">
			<image width="160" height="160" xlink:href="images/logo.png" filter="url(#filter)">
		</mask>

		<!-- the filter to make the image white -->
		<filter id="filter">
			<feFlood flood-color="white">
			<feComposite in2="SourceAlpha" operator="in">
		</filter>
	</svg>
	<img src="images/banner.jpg">
</div>	
