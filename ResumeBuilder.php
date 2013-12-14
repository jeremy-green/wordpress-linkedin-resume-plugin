<?php
//require 'View.php';

class ResumeBuilder
{
	protected $linkedinArr = array(
	'apikey' => 'API_KEY',
	'fields' => array(
			'picture-url',
			'headline',
			'first-name',
			'last-name',
			'industry',
			'email-address',
			'phone-numbers',
			'main-address',
			'summary',
			'date-of-birth',
			'positions',
			'educations',
			'skills',
			'publications',
			'languages',
			'certifications',
			'primary-twitter-account',
			'twitter-accounts',
			'im-accounts',
			'associations',
			'last-modified-timestamp',
			'projects',
		)
	);

	public function __construct()
	{
		$this->createResumeAdminPage();
	}
	private function createResumeAdminPage()
	{
		add_menu_page('Resume', 'Resume', 'edit_pages', 'resume_menu', array($this, 'resumeAdminMenu'));
		add_submenu_page('resume_menu', 'LinkedIn', 'LinkedIn', 'edit_pages', 'linkedin_menu', array($this, 'resumeSubMenu'));
	}
	public function resumeAdminMenu()
	{
		echo View::render('templates/main.php');
	}
	public function resumeSubMenu()
	{
		echo View::render('templates/linkedin.php', $this->linkedinArr);
	}
}