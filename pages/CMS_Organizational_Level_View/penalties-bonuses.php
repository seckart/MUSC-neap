<?php include '../../partials/document_header.php'; ?>

	<h1 class="title">Penalties &amp; Bonuses</h1>

	<p>
		This section provides an overview of facility-wide hospital outcomes and performance. In addition to star rating and CMS incentives, HealthLinx<sup>&reg;</sup> maintains a history of CMS data to reflect year-over-year trends.
	</p>

	<p>
		The HCAHPS Summary Star Rating combines all information about specific aspects of patient experience of care, as sourced by the HCAHPS Survey of hospital inpatients.
	</p>

	<p>
		In addition, CMS provides three outcomes-based financial incentives to hospitals. They are:
	</p>
	
	<ul>
		<li>Value-Based Purchasing incentive</li>
		<li>Readmissions reduction</li>
		<li>Hospital-Acquired Conditions reduction</li>
	</ul>
	
	<p>
		The three are collectively referred to as CMS Incentives. CMS refers to negative amounts as “reductions” but in plainer terms they are penalties and will be referred to as such within HealthLinx<sup>&reg;</sup>. For FY2016, the incentive ranges from a total penalty of 5.75% to a total bonus of 1.75%. Therefore the total “swing range” for FY2016 is 7.5%. For FY2017, this swing range increases to 8% and will stay there under current rules. This bonus/penalty hits every year.
	</p>
	
	<p>
		Data is pulled from CMS’s data portal site and from other private and proprietary data sources. The penalty/bonus percentages are typically available to the public. The dollar amounts for penalty/bonus and opportunity are calculated from non-public sources and are thus estimates.
	</p>

	<img src="<?php echo $SPECDIR; ?>/current-summary.png" alt=""/>

	<br />
	<br />
	
	<div class="bold">Penalties/Bonuses: History and Details</div class="bold">

	<img src="<?php echo $SPECDIR; ?>/history-details.png" alt=""/>

	<h4 class="section-header">Value-Based Purchasing (VBP)</h4>

	<p>
		A percentage is withheld from a hospital’s total Medicare payments: 1.5% for FY2015, 1.75% for FY2016 and 2% for FY2017 and beyond. This withholding goes into a pool that all participating hospitals have the opportunity to access based on their outcomes (performance). The rest of this section uses FY2016 in all examples.
	</p>

	<p>
		Roughly speaking, hospitals performing right at the national average will earn back their withheld 1.75% for a net effect of 0%. Those performing above average will earn back their withheld 1.75% plus receive a bonus corresponding to their rank above average, up to an additional 1.75%. Those performing below average will receive back less than 1.75% (effectively a penalty).
	</p>

	<p>
		For the sake of consistency, HealthLinx<sup>&reg;</sup>’ calculations follow CMS and other industry standards. That is, an average hospital has a VBP % of zero. A below average hospital has a VBP % below zero (i.e., a VBP penalty) and an above average hospital has a VBP % above zero (i.e., a VBP bonus). To further clarify, a bottom performing hospital would have a VBP % of -1.75% while a top performing hospital would have a VBP % of 1.75%.
	</p>

	<p>
		NOTE: Due to certain adjustment factors and the nature of the math used to generate the score distribution, every year there are typically a few hospitals that exceed the maximum bonus percentage.
	</p>

	<h4 class="section-header">Readmissions Reduction</h4>

	<p>
		Hospitals with poor readmissions performance can receive a reduction (effectively a penalty) of up to 3%. HealthLinx<sup>&reg;</sup> treats a penalty as a negative number, so a hospital can have a readmissions % from 0% (best) to -3% (worst).
	</p>
	
	<h4 class="section-header">Hospital-Acquired Conditions (HAC) Reduction</h4>

	<p>
		Hospitals with poor HAC performance (in the bottom quartile) receive a reduction (effectively a penalty) of precisely 1%. All others receive no reduction. HealthLinx<sup>&reg;</sup> treats a penalty as a negative number, so a hospital can have a HAC penalty of either 0% (best) or -1% (worst). Unlike other incentives, this one is all or nothing.
	</p>

	<div class="bold underline">Further Reading &amp; Information </div>

	<div class="italic">
		VBP
	</div>

	<a class="hover_under color-orange" 
		href="https://www.cms.gov/Medicare/Quality-Initiatives-Patient-Assessment-Instruments/hospital-value-based-purchasing/index.html?redirect=/hospital-value-based-purchasing/">
		https://www.cms.gov/Medicare/Quality-Initiatives-Patient-Assessment-Instruments/hospital-value-based-purchasing/index.html?redirect=/hospital-value-based-purchasing/
	</a>

	<br />
	<br />

	<div class="italic">
		Readmission
	</div>

	<a class="hover_under color-orange" 
		href="https://www.cms.gov/medicare/medicare-fee-for-service-payment/acuteinpatientpps/readmissions-reduction-program.html ">
		https://www.cms.gov/medicare/medicare-fee-for-service-payment/acuteinpatientpps/readmissions-reduction-program.html
	</a>

	<br />
	<br />

	<div class="italic">
		HAC
	</div>

	<a class="hover_under color-orange" 
		href="https://www.cms.gov/Medicare/Medicare-Fee-for-Service-Payment/AcuteInpatientPPS/HAC-Reduction-Program.html">
		https://www.cms.gov/Medicare/Medicare-Fee-for-Service-Payment/AcuteInpatientPPS/HAC-Reduction-Program.html
	</a>

	<a class="hover_under color-orange" 
		href="https://data.medicare.gov/Hospital-Compare/Hospital-Acquired-Condition-Reduction-Program/yq43-i98g">
		https://data.medicare.gov/Hospital-Compare/Hospital-Acquired-Condition-Reduction-Program/yq43-i98g
	</a>

	<br />
	<br />

	<div class="bold">DISCLAIMER</div class="bold">

	<p>
		The data and information presented is intended to serve only as a guide and basis for general comparisons and evaluation of CMS data. All raw data was obtained from the Centers for Medicare & Medicaid Services (CMS). Variations in aggregated data can result from computational analysis and rounding. Derived conclusions and analysis generated from this data are not to be considered attributable to CMS.
	</p>



<?php include $DOCFOOTER; ?>