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
use Joomla\CMS\MVC\Controller\BaseController;


// Register KTA Black Belt helper class
JLoader::register('KTBTrackerHelper', JPATH_ROOT .'/components/com_ktbtracker/helpers/helper.php');

// Start our master controller
$controller = BaseController::getInstance('KTBTracker');
$controller->execute(Factory::getApplication()->input->get('task'));
$controller->redirect();

// Pure PHP - no closing required
