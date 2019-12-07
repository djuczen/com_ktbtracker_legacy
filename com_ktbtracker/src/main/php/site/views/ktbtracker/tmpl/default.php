<?php
/**
 * @package		Joomla.Component
 * @subpackage 	com_ktbtracker
 *
 * @copyright	Copyright (C) 2012-${COPYR_YEAR} David Uczen Photography, Inc. All Rights Reserved.
 * @license		Licensed Materials - Property of David Uczen Photography, Inc.; see LICENSE.txt
 */

defined('JPATH_PLATFORM') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

?>

<div class="card">
    <?php echo HTMLHelper::image('com_ktbtracker/welcome_card.jpg', '', array('class' => 'card-image-top'), true); ?>
    <div class="card-body">
        <h5 class="card-title">Welcome</h5>
        <p class="card-text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Mauris sagittis pellentesque lacus eleifend lacinia...
        </p>
        <a class="btn btn-primary" href="#">
            Get Started
        </a>
    </div>
</div>
