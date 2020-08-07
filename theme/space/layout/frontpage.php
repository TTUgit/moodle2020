<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * A two column layout for the space theme.
 *
 * @package   theme_space
 * @copyright 2018 - 2019 Marcin Czaja
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

user_preference_allow_ajax_update('drawer-open-nav', PARAM_ALPHA);
require_once($CFG->libdir . '/behat/lib.php');
// MODIFICATION Start: Require own locallib.php.
require_once($CFG->dirroot . '/theme/space/locallib.php');
// MODIFICATION END.

$extraclasses = [];

$teammember = theme_space_get_setting('teammemberno');
if ($teammember == 1) {
    $teammemberperrow = ' col-md-4 col-lg-2';
}
if ($teammember == 2) {
    $teammemberperrow = ' col-md-4 col-lg-3';
}
if ($teammember == 3) {
    $teammemberperrow = ' col-md-4 col-lg-4';
}

$logos = theme_space_get_setting('logosperrow');
if ($logos == 1) {
    $logosno = 'col-md-4 col-lg-2';
}
if ($logos == 2) {
    $logosno = 'col-md-4 col-lg-3';
}
if ($logos == 3) {
    $logosno = 'col-md-4 col-lg-4';
}

$isslider = false;
if (theme_space_get_setting('sliderenabled', true) == true || theme_space_get_setting('fpblock11', true) == true || theme_space_get_setting('fpblock12', true) == true || theme_space_get_setting('fpblock13', true) == true || theme_space_get_setting('FPLogos', true) == true || theme_space_get_setting('FPTeam', true) == true) {
    $isslider = true;
}

//Simple content builder
$pluginsettings = get_config("theme_space");
for ($i = 1; $i <= 13; $i++) {
    ${"slotblock". $i} = theme_space_get_setting("slotblock" . $i);
}

$showfpblock1hr = theme_space_get_setting('showfpblock1hr');
$showfpblock2hr = theme_space_get_setting('showfpblock2hr');
$showfpblock4hr = theme_space_get_setting('showfpblock4hr');
$showfpblock6hr = theme_space_get_setting('showfpblock6hr');
$showfpblock7hr = theme_space_get_setting('showfpblock7hr');
$showfpblock8hr = theme_space_get_setting('showfpblock8hr');
$showfpblock10hr = theme_space_get_setting('showfpblock10hr');
$showfpblock11hr = theme_space_get_setting('showfpblock11hr');
$showfpblock12hr = theme_space_get_setting('showfpblock12hr');
$showfpblockteamhr = theme_space_get_setting('showfpblockteamhr');

$heroshadowtype = $pluginsettings->heroshadowtype;
if ($heroshadowtype == 1) {
    $heroshadowstyle = 'c-hero-shadow-gradient';   
}
if ($heroshadowtype == 2) {
    $heroshadowstyle = 'c-hero-shadow-img';
}

//Simple content builder 
$contentBuilderArray = array();

for ($i = 1; $i <= 13; $i++) {
    ${"slotblock". $i} = $pluginsettings->{"slotblock" . $i};

    for ($j = 1; $j <= 13; $j++) {
        if( ${"slotblock" . $j} == "$i") { ${"slot" . $i . "block" . $j} = true; } else { ${"slot" . $i . "block" . $j}  = false;} 
    }
}

//End

//End

//Top bar style
$topbarstyle = theme_space_get_setting('topbarstyle');
$pluginsettings = get_config("theme_space");
for ($i = 1; $i <= 6; $i++) {
    if( $topbarstyle == "topbarstyle-" . $i) { ${"topbarstyle" . $i} = $topbarstyle; } else { ${"topbarstyle" . $i} = false; }
}
//end

$siteurl = $CFG->wwwroot;
$bodyattributes = $OUTPUT->body_attributes($extraclasses);
$blockshtml = $OUTPUT->blocks('side-pre');
$blockshtml3 = $OUTPUT->blocks('maintopwidgets');
$hasblocks = strpos($blockshtml, 'data-block=') !== false;
$regionmainsettingsmenu = $OUTPUT->region_main_settings_menu();


$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'output' => $OUTPUT,
    'sidepreblocks' => $blockshtml,
    'maintopwidgets' => $blockshtml3,
    'hasblocks' => $hasblocks,
    'bodyattributes' => $bodyattributes,
    'regionmainsettingsmenu' => $regionmainsettingsmenu,
    'hasregionmainsettingsmenu' => !empty($regionmainsettingsmenu),
    'teammemberperrow' => $teammemberperrow,
    'logosno' => $logosno,
    'topbarstyle1' => $topbarstyle1,
    'topbarstyle2' => $topbarstyle2,
    'topbarstyle3' => $topbarstyle3,
    'topbarstyle4' => $topbarstyle4,  
    'topbarstyle5' => $topbarstyle5, 
    'topbarstyle6' => $topbarstyle6,     
    'topbarstyle1' => $topbarstyle1,
    'topbarstyle2' => $topbarstyle2,
    'topbarstyle3' => $topbarstyle3,
    'topbarstyle4' => $topbarstyle4,  
    'topbarstyle5' => $topbarstyle5, 
    'topbarstyle6' => $topbarstyle6,     
    'slot1block1' => $slot1block1,
    'slot1block2' => $slot1block2,
    'slot1block3' => $slot1block3,
    'slot1block4' => $slot1block4,
    'slot1block5' => $slot1block5,
    'slot1block6' => $slot1block6,
    'slot1block7' => $slot1block7,
    'slot1block8' => $slot1block8,
    'slot1block9' => $slot1block9,
    'slot1block10' => $slot1block10,
    'slot1block11' => $slot1block11,
    'slot1block12' => $slot1block12,
    'slot1block13' => $slot1block13,
    'slot2block1' => $slot2block1,
    'slot2block2' => $slot2block2,
    'slot2block3' => $slot2block3,
    'slot2block4' => $slot2block4,
    'slot2block5' => $slot2block5,
    'slot2block6' => $slot2block6,
    'slot2block7' => $slot2block7,
    'slot2block8' => $slot2block8,
    'slot2block9' => $slot2block9,
    'slot2block10' => $slot2block10,
    'slot2block11' => $slot2block11,
    'slot2block12' => $slot2block12,
    'slot2block13' => $slot2block13,
    'slot3block1' => $slot3block1,
    'slot3block2' => $slot3block2,
    'slot3block3' => $slot3block3,
    'slot3block4' => $slot3block4,
    'slot3block5' => $slot3block5,
    'slot3block6' => $slot3block6,
    'slot3block7' => $slot3block7,
    'slot3block8' => $slot3block8,
    'slot3block9' => $slot3block9,
    'slot3block10' => $slot3block10,
    'slot3block11' => $slot3block11,
    'slot3block12' => $slot3block12,
    'slot3block13' => $slot3block13,
    'slot4block1' => $slot4block1,
    'slot4block2' => $slot4block2,
    'slot4block3' => $slot4block3,
    'slot4block4' => $slot4block4,
    'slot4block5' => $slot4block5,
    'slot4block6' => $slot4block6,
    'slot4block7' => $slot4block7,
    'slot4block8' => $slot4block8,
    'slot4block9' => $slot4block9,
    'slot4block10' => $slot4block10,
    'slot4block11' => $slot4block11,
    'slot4block12' => $slot4block12,
    'slot4block13' => $slot4block13,
    'slot5block1' => $slot5block1,
    'slot5block2' => $slot5block2,
    'slot5block3' => $slot5block3,
    'slot5block4' => $slot5block4,
    'slot5block5' => $slot5block5,
    'slot5block6' => $slot5block6,
    'slot5block7' => $slot5block7,
    'slot5block8' => $slot5block8,
    'slot5block9' => $slot5block9,
    'slot5block10' => $slot5block10,
    'slot5block11' => $slot5block11,
    'slot5block12' => $slot5block12,
    'slot5block13' => $slot5block13,
    'slot6block1' => $slot6block1,
    'slot6block2' => $slot6block2,
    'slot6block3' => $slot6block3,
    'slot6block4' => $slot6block4,
    'slot6block5' => $slot6block5,
    'slot6block6' => $slot6block6,
    'slot6block7' => $slot6block7,
    'slot6block8' => $slot6block8,
    'slot6block9' => $slot6block9,
    'slot6block10' => $slot6block10,
    'slot6block11' => $slot6block11,
    'slot6block12' => $slot6block12,
    'slot6block13' => $slot6block13,
    'slot7block1' => $slot7block1,
    'slot7block2' => $slot7block2,
    'slot7block3' => $slot7block3,
    'slot7block4' => $slot7block4,
    'slot7block5' => $slot7block5,
    'slot7block6' => $slot7block6,
    'slot7block7' => $slot7block7,
    'slot7block8' => $slot7block8,
    'slot7block9' => $slot7block9,
    'slot7block10' => $slot7block10,
    'slot7block11' => $slot7block11,
    'slot7block12' => $slot7block12,
    'slot7block13' => $slot7block13,
    'slot8block1' => $slot8block1,
    'slot8block2' => $slot8block2,
    'slot8block3' => $slot8block3,
    'slot8block4' => $slot8block4,
    'slot8block5' => $slot8block5,
    'slot8block6' => $slot8block6,
    'slot8block7' => $slot8block7,
    'slot8block8' => $slot8block8,
    'slot8block9' => $slot8block9,
    'slot8block10' => $slot8block10,
    'slot8block11' => $slot8block11,
    'slot8block12' => $slot8block12,
    'slot8block13' => $slot8block13,
    'slot9block1' => $slot9block1,
    'slot9block2' => $slot9block2,
    'slot9block3' => $slot9block3,
    'slot9block4' => $slot9block4,
    'slot9block5' => $slot9block5,
    'slot9block6' => $slot9block6,
    'slot9block7' => $slot9block7,
    'slot9block8' => $slot9block8,
    'slot9block9' => $slot9block9, 
    'slot9block10' => $slot9block10, 
    'slot9block11' => $slot9block11,
    'slot9block12' => $slot9block12,
    'slot9block13' => $slot9block13,
    'slot10block1' => $slot10block1,
    'slot10block2' => $slot10block2,
    'slot10block3' => $slot10block3,
    'slot10block4' => $slot10block4,
    'slot10block5' => $slot10block5,
    'slot10block6' => $slot10block6,
    'slot10block7' => $slot10block7,
    'slot10block8' => $slot10block8,
    'slot10block9' => $slot10block9, 
    'slot10block10' => $slot10block10,
    'slot10block11' => $slot10block11,
    'slot10block12' => $slot10block12,
    'slot10block13' => $slot10block13,
    'slot11block1' => $slot11block1,
    'slot11block2' => $slot11block2,
    'slot11block3' => $slot11block3,
    'slot11block4' => $slot11block4,
    'slot11block5' => $slot11block5,
    'slot11block6' => $slot11block6,
    'slot11block7' => $slot11block7,
    'slot11block8' => $slot11block8,
    'slot11block9' => $slot11block9, 
    'slot11block10' => $slot11block10,
    'slot11block11' => $slot11block11,
    'slot11block12' => $slot11block12,
    'slot11block13' => $slot11block13,
    'slot12block1' => $slot12block1,
    'slot12block2' => $slot12block2,
    'slot12block3' => $slot12block3,
    'slot12block4' => $slot12block4,
    'slot12block5' => $slot12block5,
    'slot12block6' => $slot12block6,
    'slot12block7' => $slot12block7,
    'slot12block8' => $slot12block8,
    'slot12block9' => $slot12block9, 
    'slot12block10' => $slot12block10,
    'slot12block11' => $slot12block11,
    'slot12block12' => $slot12block12,
    'slot132block13' => $slot12block13,
    'slot13block1' => $slot13block1,
    'slot13block2' => $slot13block2,
    'slot13block3' => $slot13block3,
    'slot13block4' => $slot13block4,
    'slot13block5' => $slot13block5,
    'slot13block6' => $slot13block6,
    'slot13block7' => $slot13block7,
    'slot13block8' => $slot13block8,
    'slot13block9' => $slot13block9, 
    'slot13block10' => $slot13block10,
    'slot13block11' => $slot13block11,
    'slot13block12' => $slot13block12,
    'slot13block13' => $slot13block13,
    'showfpblock1hr' => $showfpblock1hr, 
    'showfpblock2hr' => $showfpblock2hr, 
    'showfpblock4hr' => $showfpblock4hr, 
    'showfpblock6hr' => $showfpblock6hr, 
    'showfpblock7hr' => $showfpblock7hr, 
    'showfpblock8hr' => $showfpblock8hr, 
    'showfpblock11hr' => $showfpblock11hr, 
    'showfpblock12hr' => $showfpblock12hr,  
    'showfpblock10hr' => $showfpblock10hr, 
    'showfpblockteamhr' => $showfpblockteamhr, 
    'heroshadowstyle' => $heroshadowstyle, 
    'isslider' => $isslider,
    'siteurl' => $siteurl
];

$themesettings = new \theme_space\util\theme_settings();

$templatecontext = array_merge($templatecontext, $themesettings->footer_items());
$templatecontext = array_merge($templatecontext, $themesettings->hero());
$templatecontext = array_merge($templatecontext, $themesettings->blockcategories());
$templatecontext = array_merge($templatecontext, $themesettings->block1());
$templatecontext = array_merge($templatecontext, $themesettings->block2());
$templatecontext = array_merge($templatecontext, $themesettings->block3());
$templatecontext = array_merge($templatecontext, $themesettings->block4());
$templatecontext = array_merge($templatecontext, $themesettings->block10());
$templatecontext = array_merge($templatecontext, $themesettings->block11());
$templatecontext = array_merge($templatecontext, $themesettings->block12());
$templatecontext = array_merge($templatecontext, $themesettings->team());
$templatecontext = array_merge($templatecontext, $themesettings->logos());
$templatecontext = array_merge($templatecontext, $themesettings->customnav());
$templatecontext = array_merge($templatecontext, $themesettings->sidebar_custom_block());
$templatecontext = array_merge($templatecontext, $themesettings->top_bar_custom_block());
$templatecontext = array_merge($templatecontext, $themesettings->siemaSlider());
$templatecontext = array_merge($templatecontext, $themesettings->head_elements());
$templatecontext = array_merge($templatecontext, $themesettings->fonts());
$templatecontext = array_merge($templatecontext, $contentBuilderArray);

echo $OUTPUT->render_from_template('theme_space/frontpage', $templatecontext);
