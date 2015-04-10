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

namespace OCA\ActivityGraph\AppInfo;


use \OCP\AppFramework\App;
use \OCP\IContainer;

use \OCA\ActivityGraph\Controller\PageController;


class Application extends App {


	public function __construct (array $urlParams=array()) {
		parent::__construct('activitygraph', $urlParams);

		$container = $this->getContainer();

		/**
		 * Controllers
		 */
		$container->registerService('PageController', function(IContainer $c) {
			return new PageController(
				$c->query('AppName'), 
				$c->query('Request'),
				$c->query('UserId')
			);
		});


		/**
		 * Core
		 */
		$container->registerService('UserId', function(IContainer $c) {
			return \OCP\User::getUser();
		});		
		
	}


}