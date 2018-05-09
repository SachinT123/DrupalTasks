<?php
/**
* 	@file
*	Contains \Drupal\module_1\Controller\CustomController class
*/

namespace Drupal\module_1\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
*	Returns responses for Custom Module 1
*/

class CustomController extends ControllerBase {
	
	public function PageContent() {
		return array(
		'#markup' => t('Welcome to the custom page... <br> Platea laboris? Ullam cupidatat dignissim ab molestie, impedit, quod unde, modi eveniet. Auctor culpa ullamcorper ridiculus, eros lectus? Fugiat metus, maxime, minus nam pellentesque, libero commodo lacus orci, magnam molestie curabitur laudantium! Suspendisse culpa, aptent luctus assumenda vulputate architecto irure, nobis euismod, aut ad! Ultricies natoque commodo cumque. Porttitor, iaculis. <br> Consequat libero veritatis reprehenderit, aute exercitation excepteur eu pariatur auctor quasi pellentesque blandit saepe, dolorum? Earum provident ridiculus, veniam nostrum laboris dolor praesentium. Magnam, provident? Dicta, sunt? Tortor, debitis a, congue exercitation augue diam, ea inceptos neque nesciunt laoreet ultrices sem tincidunt? Dictum vulputate egestas laudantium tempor iaculis adipisicing fermentum.'),
		);
	}	
}