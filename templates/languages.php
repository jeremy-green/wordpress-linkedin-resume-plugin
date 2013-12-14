<section class="resume-section languages" itemscope itemtype="http://schema.org/ItemList" id="languages"><!-- languages -->
	<h4 class="resume-title" itemprop="name">Languages</h4>
	<div class="resume-item">
        <ul>
<?php foreach ($viewData['values'] as $value) : ?>
		  <li class="htitle" itemprop="itemListElement"><?php echo $value->language->name; ?></li>
<?php endforeach; ?>
        </ul>
	</div>
</section><!-- /languages -->
