<section class="resume-section skills" itemscope itemtype="http://schema.org/ItemList" id="skills"><!-- skills -->
	<h4 class="resume-title" itemprop="name">Skills</h4>
	<div class="resume-item">
        <ul>
<?php foreach ($viewData['values'] as $value) : ?>
		  <li class="htitle" itemprop="itemListElement"><?php echo $value->skill->name; ?></li>
<?php endforeach; ?>
        </ul>
	</div>
</section><!-- /skills -->
