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

		$node = array();
		foreach ($nodes as $key => $value) {
			$file_id = $value->get('field_image')->getValue()[0]['target_id'];
			$file_path = file_load($file_id)->getFileUri();
			$style = \Drupal::entityTypeManager()->getStorage('image_style')->load('thumbnail');
			$img_url = $style->buildUrl($file_path);
			$node[] = array('title' => $nodes[$key]->getTitle(), 'url' => $nodes[$key]->url('canonical'), 'img' => $img_url, );
		}

		// kint($a);
		// die();
		return array('#theme' => 'blog_template','#var' => $node);
		
	}
}







 ?>