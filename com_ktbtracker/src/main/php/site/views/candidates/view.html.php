<?php
/**
 * @package		Joomla.Component
 * @subpackage 	com_ktbtracker
 * 
 * @copyright	Copyright (C) 2012-${COPYR_YEAR} David Uczen Photography, Inc. All Rights Reserved.
 * @license		Licensed Materials - Property of David Uczen Photography, Inc.; see LICENSE.txt
 */

defined('JPATH_PLATFORM') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\MVC\View\HtmlView;


/**
 * KTBTracker component HTML view for candidate list (Site).
 *
 * @since	1.0.0
 */
class KTBTrackerViewCandidates extends HtmlView
{
	protected $items;
	
	protected $pagination;
	
	protected $state;
	
	
	/**
	 * Execute and display a template script.
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  mixed  A string if successful, otherwise a Error object.
	 *
	 * @see     fetch()
	 * @since   12.2
	 */
	public function display($tpl = null)
	{	
		$this->items		 = $this->get('Items');
		$this->pagination	 = $this->get('Pagination');
		$this->state		 = $this->get('State');
		
		$this->cycle		 = KTBTrackerHelper::getCycle($this->items[0]->cycleid);
		
		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			Factory::getApplication()->enqueueMessage(implode("\n", $errors), 'error');
			return false;
		}
		
		// Include any component stylesheets/scripts ...
		HTMLHelper::script('com_ktbtracker/bootstrap-material-design.min.js', array('relative' => true), array());
        HTMLHelper::stylesheet('com_ktbtracker/bootstrap-material-design.min.css', array('relative' => true), array());
        HTMLHelper::stylesheet('https://fonts.googleapis.com/icon?family=Material+Icons');

			
		parent::display($tpl);
	}
	
}