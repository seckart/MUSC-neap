<?php include_once('../../partials/document_header.php'); ?>

<!-- These Javascript Files only pertain to the Search.php page -->
<script language="JavaScript" src="./settings.js"></script>
<script language="JavaScript" src="./search.js"></script>

<h1 class="title">
	Search the NEAP Report
</h1>

<p class="bold font-size-125">
	Enter one or more keywords to search for across the entire report.
</p>

<p>
	Note that '*' and '?' wildcards are supported.
</p>

<hr />


<div class="zoom_form">
	<!-- This is where the search form and results will appear -->
	<script language="JavaScript">ZoomSearch();</script>
</div>


<?php include $DOCFOOTER; ?>