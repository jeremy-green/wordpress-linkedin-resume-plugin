<section class="resume-section positions" id="positions"><!-- positions -->
	<h4 class="resume-title">Positions</h4>
	<div class="resume-item">

<?php foreach ($viewData['values'] as $value) : ?>
		<div class="vcard"><!-- company -->
			<h5 class="title"><?php echo $value->title; ?></h5>
			<h6 class="org fn" itemscope itemtype="http://schema.org/Corporation"><span itemprop="name"><?php echo $value->company->name ?></span></h6>
			<?php if(!empty($value->company->ticker)) : ?>
<meta itemprop="tickerSymbol" content="<?php echo $value->company->ticker; ?>" /><?php endif; ?>
			<?php $startTime = strtotime($value->startDate->year . '-' . $value->startDate->month); $endTime = isset($value->endDate) ? strtotime($value->endDate->year . '-' . $value->endDate->month) : strtotime(date('c')); ?>

			<p><time datetime="<?php echo date('c', $startTime); ?>"><?php echo date('F Y', $startTime); ?></time> &mdash; <time datetime="<?php echo date('c', $endTime); ?>"><?php echo date('F Y', $endTime); ?></time></p>
			<p class="description"><ul><?php echo implode('<li>', explode("•", $value->summary)); ?></ul></p>
		</div><!-- /company -->
<?php endforeach; ?>

	</div>
</section><!-- positions -->
