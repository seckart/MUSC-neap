<?php 
	$PageTitle = "The Index Page";
	include './partials/document_header.php';
?>
	
<h1 class="title">
	Outcome &amp; Financial Impact Opportunities Snapshot
</h1>

<p>
	The Outcome &amp; Financial Impact ("FI") Opportunities Snapshot is provided to summarize under or outperformance in the "Top 5" Vertical Measurements:
</p>

<ul>
	<li>RN Engagement</li>
	<li>Patient Satisfaction</li>
	<li>NSIs</li>
	<li>Research and Education</li>
	<li>Certification</li>
</ul>

<p>
	It also summarizes both the "potential" and "hypothesized" Vertical and Horizontal Financial Impact ("FI") Opportunities available to the hospital.
</p>

<p>
	A four-year projection is always used because Magnet<sup>&reg;</sup> redesignation occurs in four-year increments.
</p>
 

<div class="table top-mg-more"> 

	<div class="tr">
		
		<div class="td v-top bot-pd">
			<!-- The First Table (Vertical Outcome Snapshot) -->
			<?php include $PARTSDIR . '/tables/vertical-outcome.php'; ?>
		</div>
		<div class="td fixed-width-185 v-top">
			<!-- Vertical Arrow Chart To the Right of the table -->
			<img class="v-middle" 
				src="<?php echo $TEMPLDIR; ?>/vertical-arrow.png" alt="" />
		</div>
	</div>
	<div class="tr">
		<div class="td bot-pd">
			<!-- The Third Table (Combined Financial Impact) -->
			<?php include $PARTSDIR . '/tables/vertical-fi.php'; ?>
		</div>
		<div class="td fixed-width-185 v-top">&nbsp;</div>
	</div>
	<div class="tr">
		<div class="td v-top bot-pd">
			<!-- The Second Table (Horizontal Outcome Snapshot) -->
			<?php include $PARTSDIR . '/tables/horizontal-outcome.php'; ?>
		</div>
		<div class="td fixed-width-185 v-top">
			<!-- Horizontal Arrow Chart To the Right of the table -->
			<img class="v-middle" 
				src="<?php echo $TEMPLDIR; ?>/horizontal-vertical-chart.png" alt="" />
		</div>
	</div>
	<div class="tr">
		<div class="td bot-pd">
			<!-- The Third Table (Combined Financial Impact) -->
			<?php include $PARTSDIR . '/tables/combined-fi.php'; ?>
		</div>
		<div class="td fixed-width-185 v-top">&nbsp;</div>
	</div>

</div>



<?php include $DOCFOOTER; ?>
