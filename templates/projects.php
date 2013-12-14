<section class="resume-section projects" id="projects"><!-- projects -->
	<h4 class="resume-title">Projects</h4>
	<div class="resume-item">

<?php foreach ($viewData['values'] as $value) : ?>
		<div class="vcard"><!-- project -->
			<h5 class="htitle"><a href="<?php echo $value->url; ?>"><?php echo $value->name ?></a></h5>
			<p class="description"><?php echo $value->description; ?></p>
		</div><!-- /project -->
<?php endforeach; ?>

	</div>
</section><!-- /projects -->
