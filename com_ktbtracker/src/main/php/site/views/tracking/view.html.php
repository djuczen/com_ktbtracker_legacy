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
use Joomla\CMS\MVC\View\HtmlView;
use Joomla\CMS\Router\Route;


/**
 * KTBTracker component HTML view for candidate list (Site).
 *
 * @since	1.0.0
 */
class KTBTrackerViewTracking extends HtmlView
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
		$this->state		 = $this->get('State'); dump($this->state, "State");
		
		$this->candidate     = $this->get('Candidate');
		$this->cycle         = $this->get('Cycle');
		$this->stats         = $this->get('Statistics');
		
		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			Factory::getApplication()->enqueueMessage(implode("\n", $errors), 'error');
			return false;
		}
		
		// Determine previous/next week links
		$baseURI = 'index.php?option=com_ktbtracker&view=tracking&canid='.(int) $this->candidate->id;
		$this->prevLink = Route::_($baseURI . '&trackingDate=' .
		    KTBTrackerHelper::getPrevWeekDate($this->items[3]->tracking_date), false);
		$this->nextLink = Route::_($baseURI . '&trackingDate=' .
		    KTBTrackerHelper::getNextWeekDate($this->items[3]->tracking_date), false);

		// Include any component stylesheets/scripts ...
		$document = Factory::getDocument();
		$document->addScript('com_ktbtracker/material.min.js');
		$document->addStyleSheet('com_ktbtracker/material.min.css');

		parent::display($tpl);
	}
	
}