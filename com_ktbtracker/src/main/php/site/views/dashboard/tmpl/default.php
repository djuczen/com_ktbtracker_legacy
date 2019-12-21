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
use Joomla\CMS\Language\Text;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Router\Route;


HTMLHelper::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_ktbtracker/helpers/html');

KTBTrackerHelper::loadBootstrap();
HTMLHelper::_('behavior.multiselect');
HTMLHelper::_('formbehavior.chosen', 'select');


$user			= Factory::getUser();
$userId			= $user->id;

dump($this->stats, 'stats');
dump($this->cycle, 'cycle');
dump($this->cycles, 'cycles');
KTBTrackerHelper::getPrevDate();
KTBTrackerHelper::getNextDate();
KTBTrackerHelper::getThisWeekDate();
KTBTrackerHelper::getPrevWeekDate();
KTBTrackerHelper::getNextWeekDate();
KTBTrackerHelper::getWeekDates();
KTBTrackerHelper::getWeekDates(KTBTrackerHelper::getPrevWeekDate());
KTBTrackerHelper::getWeekDates(KTBTrackerHelper::getNextWeekDate());
KTBTrackerHelper::getWeekDates('2016-07-20');
dump(KTBTrackerHelper::getWeekDays());

$stats = $this->stats;

$icons = array(
    'miles'         => 'com_ktbtracker/noun_run_2404347.png',
    'pushups'       => 'com_ktbtracker/noun_push up_660576.png',
    'situps'        => 'com_ktbtracker/noun_Exercise Partner_2401356.png',
    'burpees'       => 'com_ktbtracker/noun_squatting_77784.png',
    'kicks'         => 'com_ktbtracker/noun_Kicking_1926293.png',
    'poomsae'       => 'com_ktbtracker/noun_Karate_2799191.png',
    'self_defense'  => 'com_ktbtracker/noun_fighter_642314.png',
    'sparring'      => 'com_ktbtracker/noun_taekwondo_655105.png',
    'jumps'         => 'com_ktbtracker/noun_skipping_637493.png',
    'pullups'       => 'com_ktbtracker/noun_Pull Up Bar_659117.png',
    'rolls_falls'   => 'com_ktbtracker/noun_Gymnastic Beam_655095.png',
    'class_saturday' => 'com_ktbtracker/noun_Class_2620898.png',
    'class_weekday' => 'com_ktbtracker/noun_Class_2620898.png',
    'class_sparring' => 'com_ktbtracker/noun_Class_2620898.png',
    'class_pmaa'    => 'com_ktbtracker/noun_Class_2620898.png',
    'class_masterq' => 'com_ktbtracker/noun_Class_2620898.png',
    'class_dreamteam' => 'com_ktbtracker/noun_Class_2620898.png',
    'class_hyperpro' => 'com_ktbtracker/noun_Class_2620898.png',
    'meditation'    => 'com_ktbtracker/noun_meditate_127690.png',
    'raok'          => 'com_ktbtracker/noun_help_1682050.png',
    'mentor'        => 'com_ktbtracker/noun_Mentor_14634.png',
    'mentee'        => 'com_ktbtracker/noun_Mentor_14634.png',
    'leadership'    => 'com_ktbtracker/noun_Class_2509734.png',
    'leadership2'   => 'com_ktbtracker/noun_Class_2509734.png',
    'journals'      => 'com_ktbtracker/noun_journal_1835002.png',
    
);
?>
<div class="fluid-container">
    <form action="<?php echo Route::_('index.php?option=com_ktbtracker'); ?>" method="post" id="adminForm" name="adminForm">
<?php 
    foreach ($stats->requirements as $i => $requirement): 
        $tracked = $stats->tracking->$requirement; 
        $progress_actual = min(max($stats->progress->$requirement, 0.0), 1.0) * 100.0;
        $progress_width = (int) $progress_actual;
        $icon_file = 'com_ktbtracker/noun_check list_2899842.png';
        if (substr($requirement, 0, 4) == 'class') $icon_file = 'com_ktbtracker/noun_Class_2620898.png';
        if (substr($requirement, 0, 9) == 'leadership') $icon_file = 'com_ktbtracker/noun_Class_2509734.png';
        if (in_array($requirement, $icons)) $icon_file = $icons[$requirement];
        if ($i % 4 == 0)
        {
            if ($i > 0) echo "        </div>";
            echo "        <div class=\"row\">";
        } ?>
			<div class="col-6 col-md-4 col-lg-3 p-1">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-4 text center">
								<?php echo HTMLHelper::_('image', $icons[$requirement], $requirement, array('height' => '48', 'width' => '48'), true); ?>
							</div>
							<div class="col-8">
        						<h5 class="card-title display-1"><?php echo HTMLHelper::_('ktbtracker.formatted', $tracked, null, 0); ?></h5>
        						<h6 class="card-subtitle"><?php echo Text::_('COM_KTBTRACKER_FIELD_' . strtoupper($requirement) . '_SHORT'); ?></h6>
							</div>
						</div>
						<div class="row">
							<div class="col">
        						<div class="card-text progress">
        							<div class="progress-bar" role="progressbar" style="width: <?php echo $progress_width; ?>"
        								aria-valuenow="<?php echo $progress_width; ?>" aria-valuemin="0" aria-valuemax="100"
        								title="<?php echo $progress_actual; ?>%"></div>
        						</div>
							</div>
						</div>
					</div>
				</div>
			</div>
<?php endforeach; ?>
		</div>
    	<input type="hidden" name="task" value=""/>
    	<input type="hidden" name="boxchecked" value="0"/>
    	<?php echo HTMLHelper::_('form.token'); ?>
    </form>
</div>