<section class="resume-section educations" id="educations"><!-- educations -->
	<h4 class="resume-title">Educations</h4>
	<div class="resume-item">

<?php foreach ($viewData['values'] as $value) : ?>
		<div class="vcard"><!-- school -->
			<h5 class="org fn" itemscope itemtype="http://schema.org/EducationalOrganization"><span itemprop="name"><?php echo $value->schoolName ?></span></h5>
			<?php if (!empty($value->fieldOfStudy)) : ?><h6><?php echo $value->degree; ?>, <?php echo $value->fieldOfStudy; ?></h6><?php endif; ?>
			<?php
			$endTime = isset($value->endDate) ? $value->endDate->year : date('Y');
			?><p><time><?php echo $value->startDate->year; ?></time> &mdash; <time><?php echo $endTime; ?></time></p>
			<p class="description"><?php echo $value->notes; ?></p>
		</div><!-- /school -->
<?php endforeach; ?>

	</div>
</section><!-- /educations -->
