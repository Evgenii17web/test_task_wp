<?php

namespace task3\tags;

use Elementor\Modules\DynamicTags\Module as ModuleAlias;
use ElementorPro\Modules\DynamicTags\Tags\Base\Tag;
use ElementorPro\Modules\DynamicTags\Module;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class position extends Tag {

	/**
	 * Get dynamic tag name
	 *
	 * @return string
	 */
	public function get_name(): string {
		return 'Author Position';
	}

	/**
	 * Get dynamic tag title
	 * @return string
	 */
	public function get_title(): string {
		return 'Author Position';
	}

	/**
	 * Get dynamic tag group
	 *
	 * @return string
	 */
	public function get_group(): string {
		return Module::AUTHOR_GROUP;
	}

	/**
	 * Get dynamic tag category
	 *
	 * @return array
	 */
	public function get_categories(): array {
		return [ ModuleAlias::TEXT_CATEGORY ];
	}

	/**
	 * Render dynamic tag
	 *
	 * @return void
	 */
	public function render() {
		$author_position = get_the_author_meta( 'position' );
		echo wp_kses_post( $author_position );
	}
}
