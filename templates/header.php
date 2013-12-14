<header class="contact vcard clearfix" itemscope itemtype="http://schema.org/Person"><!-- header -->
<?php if(isset($resume_data['picture-url']) && !empty($resume_data['picture-url'])) : ?>

<figure class="right image-container"><!-- figure -->
	<img src="<?php echo $resume_data['picture-url']; ?>" alt="alt-caption" name="photo" itemprop="image" />
	<?php if(isset($resume_data['headline']) && !empty($resume_data['headline'])) : ?><figcaption><?php echo $resume_data['headline']; ?></figcaption><?php endif; ?>

	<a href="https://twitter.com/<?php echo $resume_data['primary-twitter-account']->providerAccountName; ?>" class="twitter-follow-button" data-show-count="false" data-lang="en">Follow @<?php echo $resume_data['primary-twitter-account']->providerAccountName; ?></a>
</figure><!-- /figure -->
<?php endif; ?>

<hgroup role="banner"><!-- hgroup -->
	<h1 class="fn n" itemprop="name"><span class="given-name" itemprop="givenName"><?php echo $resume_data['first-name']; ?></span> <span class="family-name" itemprop="familyName"><?php echo $resume_data['last-name']; ?></span></h1>
	<h2 class="role" itemprop="jobTitle"><?php echo $resume_data['industry']; ?></h2>
	<h3 class="url"><a href="<?php bloginfo('url'); ?>" title="Link to: <?php bloginfo('name'); ?>" itemprop="url"><?php echo implode('<wbr />.', explode('.', str_replace('http://', '', get_bloginfo('url')))); ?></a></h3>
</hgroup><!-- /hgroup -->

<p><a class="email" href="mailto:<?php echo $resume_data['email-address']; ?>" title="Email <?php echo $resume_data['first-name']; ?> <?php echo $resume_data['last-name']; ?>" itemprop="email"><?php echo $resume_data['email-address']; ?></a></p>
<p><a class="tel" itemprop="telephone" href="tel:1<?php echo str_replace('-', '', $resume_data['phone-numbers']->values[0]->phoneNumber); ?>"><?php echo $resume_data['phone-numbers']->values[0]->phoneNumber; ?></a></p>
<address class="adr" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"><span class="street-address" itemprop="streetAddress"><?php echo $resume_data['address']->street_number; ?> <?php echo $resume_data['address']->route; ?></span> <span class="locality" itemprop="addressLocality"><?php echo $resume_data['address']->locality; ?></span>, <abbr title="<?php echo $resume_data['address']->region; ?>" class="region" itemprop="addressRegion"><?php echo $resume_data['address']->region_abbr; ?></abbr> <span class="postal-code" itemprop="postalCode"><?php echo $resume_data['address']->postal_code; ?></span></address>

</header><!-- /header -->