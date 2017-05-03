<!-- 
	The Top Bar 
	It is position: fixed at the top of the screen
	It contains the button to show/hide the sidebar, the CEO's name,
	as well as several company logos
	-->

<div class="header">

	<!-- Left Aligned Items -->
	<div class="float-left height-full">
		<div class="table height-full">
			<div class="tr">

				<!-- Clicking this will show/hide the sidebar -->
				<div class="td v-align-middle pointer h-padded-more"
					data-slide-target="sidebar">
					<span class="color-bronze font-size-6qt">
						N.E.A.P.<br />
					</span>
					<span class="color-grey font-size-3qt">
						by HealthLinx<sup>&reg;<sup>
					</span>
				</div>

				<!-- The CEO's Name -->
				<div class="td v-align-middle font-size-875 color-grey bold h-padded-more">
					CEO: Patrick Cawley, M.D. MHM, FACHE | CNO: Jerry Mansfield PhD, RN
				</div>

			</div>
		</div>
	</div>

	<!-- Right Aligned Items -->
	<div class="float-right height-full v-center-inl">
		
		<!-- The Hospital Logo -->
		<div class="inblk v-align-middle height-full">
			<img class="height-full" src="<?php echo $SPECDIR; ?>/musc_logo.jpg" />
		</div>

		<!-- Healthlinx Logo -->
		<div class="inblk v-align-middle height-full h-padded-barely">
			<img class="height-full" src="<?php echo $TEMPLDIR; ?>/healthlinx_logo.gif" />
		</div>

	</div>

	<!-- The Search box that drops down, revealing the search form -->
	<?php include $PARTSDIR . '/searchbox.php'; ?>
	
</div>