<?php 



/**
 * @file
 * Contains \Drupa\module_1\Plugin\Block\TestBlock.
 *
 */

namespace Drupal\module_1\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;
 
/**
* Provide a custom block
*
* @Block(
* 	id = "test_block",
* 	admin_label = @Translation("Test Block"),
*	category = @Translation("Module 1 Custom Block"),
* 	)
* 
*/


class TestBlock extends BlockBase {
	
	public function build() {
		$nids = \Drupal::entityQuery('node')->condition('type','blogs')->execute();
		$nodes = \Drupal::entityTypeManager()
			->getStorage('node')
			->loadMultiple($nids);

		$nodeTitle = array();

		foreach ($nodes as $key => $value) {
			$nodeTitle[] = array('title' => $nodes[$key]->getTitle(), 'url' => $nodes[$key]->url('canonical'));
		}

		// kint($nodes);
		// die();
		return array('#theme' => 'blog_template','#var' => $nodeTitle);
		
	}
}







 ?>