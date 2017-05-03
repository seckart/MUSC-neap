<?php include '../../partials/document_header.php'; ?>

	<h1 class="title">
		Internal Vertical Moderate Risk
	</h1>

    <p>Out of 30+ categories assessed:</p>

    <ul>
        <li>3 were considered Vertical "High Risk"</li>
        <li>8 were considered Vertical "Moderate Risk"</li>
        <li>8 were considered Vertical "Low Risk"</li>
        <li>11 were considered Vertical "Strengths" or "No Risk"</li>
    </ul>

    <p>
        The following are areas of Vertical Moderate Risk assessed according to: Risk,
        Theme, Magnet<sup>&reg;</sup> Requirement, Observations/Gap(s) and Recommendations:
    </p>

    <br>

	<object 
		class="pdfobj blk margin-zero-auto"
		data="<?php echo $ATTACHDIR; ?>/mypdf.pdf" 
		type="application/pdf" 
		width="800" 
		height="1000">
			<embed src="<?php echo $ATTACHDIR; ?>/mypdf.pdf" type="application/pdf" />
	</object>

	<br>
	<br>

<?php include $DOCFOOTER; ?>