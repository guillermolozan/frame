<?php //á

// $HEAD['INCLUDE']['extra']="<script>
//   (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
//   (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
//   m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
//   })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

//   ga('create', 'UA-8528932-5', 'educadores.gob.pe');
//   ga('send', 'pageview');
// </script>";
$HEAD['INCLUDES']['css'][]='css/custom.css';
// prin($HEAD);
web_render_header($HEAD,$SERVER);

web_render_edit_toolbar($SELECTORS);

