<?php 

namespace Drupal\module_1\Plugin\Block;


use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;

/**
* Provide a custom block
*
* @Block(
* 	id = "blog_block",
* 	admin_label = @Translation("Blog Block"),
*	category = @Translation("Module 1 Custom Block"),
* 	)
* 
*/

class BlogBlock extends BlockBase
{
	/**
	* {@inheritdoc}
	*/
	public function build() {
		$nids = \Drupal::entityQuery('node')->condition('type','blogs')->execute();
		$nodes = \Drupal::entityTypeManager()
			->getStorage('node')
			->loadMultiple($nids);
		$nodeTitle = array();
		$options = ['absolute' => TRUE];
		foreach ($nodes as $key => $value) {
			
			$link = \Drupal\Core\Url::fromRoute('entity.node.canonical', ['node' => $nodes[$key]->id(), ], $options);

			$nodeTitle[] = array('title' => $nodes[$key]->getTitle(), 'url' => $link);

		}

		// kint($nodes);
		// die();
		return array('#theme' => 'links','#links' => $nodeTitle);
		
	}	
}



 ?>