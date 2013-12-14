<section class="resume-section certifications" itemscope itemtype="http://schema.org/ItemList" id="certifications"><!-- certifications -->
	<h4 class="resume-title" itemprop="name">Certifications</h4>
	<div class="resume-item">
        <ul>
<?php foreach ($viewData['values'] as $value) : ?>
		  <li class="htitle" itemprop="itemListElement"><?php echo $value->name; ?></li>
<?php endforeach; ?>
        </ul>
	</div>
</section><!-- /certifications -->
