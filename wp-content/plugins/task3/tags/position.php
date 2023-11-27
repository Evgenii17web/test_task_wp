<?php
namespace task3\tags;

use Elementor\Modules\DynamicTags\Module as ModuleAlias;
use ElementorPro\Modules\DynamicTags\Tags\Base\Tag;
use ElementorPro\Modules\DynamicTags\Module;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class position extends Tag {

	public function get_name() {
		return 'Author Position';
	}

	public function get_title() {
		return 'Author Position';
	}

	public function get_group() {
		return Module::AUTHOR_GROUP;
	}

	public function get_categories() {
		return [ ModuleAlias::TEXT_CATEGORY ];
	}

	public function render() {
		$author_position = get_the_author_meta('position');
		echo wp_kses_post($author_position);
	}
}
