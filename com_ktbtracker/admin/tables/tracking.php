<?php
/**
 * @package		Joomla.Administrator
 * @subpackage 	com_ktbtracker
 * 
 * @copyright	Copyright (C) 2012-@COPYR_YEAR@ David Uczen Photography, Inc. All Rights Reserved.
 * @license		Licensed Materials - Property of David Uczen Photography, Inc.; see LICENSE.txt
 * 
 * $Id$
 */

defined('JPATH_PLATFORM') or die;


/**
 * KTB Tracker component table for tracking (Administration).
 *
 * The Tracking table class extends the Joomla! JTable and handles all CRUD processing
 * for the <code>#__ktbtracker_tracking</code> table.
 */
class KTBTrackerTableTracking extends JTable
{
	/**
	 * Object constructor to set table and key fields.  In most cases this will
	 * be overridden by child classes to explicitly set the table and key fields
	 * for a particular database table.
	 *
	 * @param   string     $table  Name of the table to model.
	 * @param   string     $key    Name of the primary key field in the table.
	 * @param   JDatabase  &$db    JDatabase connector object.
	 *
	 * @since   11.1
	 */
	public function __construct(&$db)
	{
		parent::__construct('#__ktbtracker_tracking', 'id', $db);
	}
	
}


// Pure PHP - no closing required
