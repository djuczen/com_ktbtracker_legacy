<?php
/**
 * @package		Joomla.Administrator
 * @subpackage 	com_ktbtracker
 * 
 * @copyright	Copyright (C) 2012-${COPYR_YEAR} David Uczen Photography, Inc. All Rights Reserved.
 * @license		Licensed Materials - Property of David Uczen Photography, Inc.; see LICENSE.txt
 */

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\View\HtmlView;
use Joomla\CMS\Toolbar\Toolbar;
use Joomla\CMS\Toolbar\ToolbarHelper;

defined('JPATH_PLATFORM') or die;


/**
 * KTBTracker component HTML view class for cycle lists (Administration).
 * 
 * @since	1.0.0
 */
 class KTBTrackerViewCycles extends HtmlView
 {
 	/**
 	 * Display the the HTML list of cycles
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
 		$this->state		= $this->get('State');
 		$this->items 		= $this->get('Items');
 		$this->pagination	= $this->get('Pagination');
 		$this->filterForm	= $this->get('FilterForm');
 		$this->activeFilters = $this->get('ActiveFilters');
 		
 		// For non-modal views, add a sidebar and toolbar
 	 	if ($this->getLayout() !== 'modal')
 	 	{
 			KTBTrackerHelper::addSubmenu('cycles');
 			$this->sidebar = JHtmlSidebar::render();
 			$this->addToolBar();
 		}
 		
 		// Check for errors.
 		if (count($errors = $this->get('Errors')))
 		{
 			$app->enqueueMessage(implode('<br />', $errors), 'error');
 			return false;
 		}
 		
 		// Display the view
 		parent::display($tpl);
 	}
 	
 	/**
 	 * Add the page title and toolbar.
 	 * 
 	 * @return	void
 	 * 
 	 * @since	1.0.0
 	 */
 	protected function addToolBar()
 	{
 		$canDo = KTBTrackerHelper::getActions();
 		$user = Factory::getUser();
 		
 		ToolbarHelper::title(Text::_('COM_KTBTRACKER_MANAGER_CYCLES'), 'users');
 		
		ToolbarHelper::addNew('cycle.add');
	
		ToolbarHelper::editList('cycle.edit');
		ToolbarHelper::checkin('cycles.checkin', 'JTOOLBAR_CHECKIN', true);
		ToolbarHelper::deleteList('', 'cycles.delete');
 		
 		if ($user->authorise('core.admin', 'com_ktbtracker') || $user->authorise('core.options', 'com_ktbtracker'))
 		{
 			ToolbarHelper::preferences('com_ktbtracker');
 		}
 	}
 }
 
// Pure PHP - no closing required
