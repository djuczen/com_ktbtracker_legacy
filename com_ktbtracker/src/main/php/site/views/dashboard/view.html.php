<?php
/**
 * @package		Joomla.Site
 * @subpackage 	com_ktbtracker
 * 
 * @copyright	Copyright (C) 2012-${COPYR_YEAR} David Uczen Photography, Inc. All Rights Reserved.
 * @license		Licensed Materials - Property of David Uczen Photography, Inc.; see LICENSE.txt
 * 
 * $Id$
 */

defined('JPATH_PLATFORM') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\MVC\View\HtmlView;


/**
 * KTBTracker component HTML view for main dashboard (Site).
 *
 * @since	1.0.0
 */
class KTBTrackerViewDashboard extends HtmlView
{
 	/**
 	 * Display the the HTML dashboard.
 	 * 
 	 * @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
 	 * 
 	 * @return	void
 	 * 
 	 * @since	1.0.0
 	 */
 	function display($tpl = null)
 	{
 		$app		= Factory::getApplication();
 		
 		// Assign data to the view
 		$this->state = $this->get('State');
 		$this->stats = $this->get('LifetimeStatistics');
 		$this->cycle = $this->get('CurrentCycle');
 		$this->cycles = $this->get('CurrentCandidateCycles');
 		
 		// Check for errors.
 		if (count($errors = $this->get('Errors'))) {
 			$app->enqueueMessage(implode('<br />', $errors), 'error');
 			return false;
 		}
 		
 		// Include any component stylesheets/scripts ...
 		HTMLHelper::script('com_ktbtracker/bootstrap-material-design.min.js', array('relative' => true), array());
 		HTMLHelper::stylesheet('com_ktbtracker/bootstrap-material-design.min.css', array('relative' => true), array());
 		HTMLHelper::stylesheet('https://fonts.googleapis.com/icon?family=Material+Icons');
 		
 		// Display the view
 		parent::display($tpl);
 	}
 	
}

// Pure PHP - no closing required
