<section class="resume-section publications" id="publications"><!-- publications -->
	<h4 class="resume-title">Publications</h4>
	<div class="resume-item">

<?php foreach($viewData['values'] as $value) : ?>
		<h5 class="htitle"><?php echo $value->title; ?></h5>
		<?php
		$time = strtotime($value->date->year . '-' . $value->date->month . '-' . $value->date->day);
		?><p><time datetime="<?php echo date('c', $time); ?>"><?php echo date('F Y', $time); ?></time></p>
<?php endforeach; ?>

	</div>
</section><!-- /publications -->
