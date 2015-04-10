<?php
/**
 * ownCloud - activitygraph
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author iMalinoski <malinoski.iuri@gmail.com>
 * @copyright iMalinoski 2015
 */



//namespace OCA\ActivityGraph\AppInfo;

OC::$CLASSPATH['OC_ActivityGraph_DAO'] = 'activitygraph/lib/DAO.php';
OC::$CLASSPATH['OC_ActivityGraph_Hooks'] = 'activitygraph/lib/hooks.php';

OCP\Util::connectHook('OC_Filesystem', 'post_create', 'OC_ActivityGraph_Hooks', 'fileCreate');

\OCP\App::addNavigationEntry(array(
    // the string under which your app will be referenced in owncloud
    'id' => 'activitygraph',

    // sorting weight for the navigation. The higher the number, the higher
    // will it be listed in the navigation
    'order' => 10,

    // the route that will be shown on startup
    'href' => \OCP\Util::linkToRoute('activitygraph.page.index'),

    // the icon that will be shown in the navigation
    // this file needs to exist in img/
    'icon' => \OCP\Util::imagePath('activitygraph', 'app.svg'),

    // the title of your application. This will be used in the
    // navigation or on the settings page of your app
    'name' => \OC_L10N::get('activitygraph')->t('Activity Graph')
)); 