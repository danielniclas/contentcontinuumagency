<?php
namespace AtonQodef\Modules\Shortcodes\ImageGallery;

use AtonQodef\Modules\Shortcodes\Lib\ShortcodeInterface;

class ImageGallery implements ShortcodeInterface{

	private $base;

	/**
	 * Image Gallery constructor.
	 */
	public function __construct() {
		$this->base = 'qodef_image_gallery';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	/**
	 * Maps shortcode to Visual Composer. Hooked on vc_before_init
	 *
	 * @see qode_core_get_carousel_slider_array_vc()
	 */
	public function vcMap() {

		vc_map(array(
			'name'                      => esc_html__('Select Image Gallery', 'aton'),
			'base'                      => $this->getBase(),
			'category' 					=> 'by SELECT',
			'icon'                      => 'icon-wpb-image-gallery extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array(
				array(
					'type'			=> 'attach_images',
					'heading'		=> esc_html__('Images', 'aton'),
					'param_name'	=> 'images',
					'description'	=> esc_html__('Select images from media library', 'aton')
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Gallery Type', 'aton'),
					'admin_label' => true,
					'param_name'  => 'type',
					'value'       => array(
						esc_html__('Slider', 'aton')		=> 'slider',
						esc_html__('Image Grid', 'aton')	=> 'image_grid'
					),
					'description' => esc_html__('Select gallery type', 'aton'),
					'save_always' => true
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Image Size', 'aton'),
					'param_name'	=> 'image_size',
					'description'	=> esc_html__('Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size', 'aton'),
					'dependency'	=> array(
						'element'	=> 'type',
						'value'		=> array(
							'image_grid'
						)
					)
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Slide duration', 'aton'),
					'admin_label'	=> true,
					'param_name'	=> 'autoplay',
					'value'			=> array(
						esc_html__('3', 'aton')			=> '3',
						esc_html__('5', 'aton')			=> '5',
						esc_html__('10', 'aton')		=> '10',
						esc_html__('Disable', 'aton')	=> '0'
					),
					'save_always'	=> true,
					'dependency'	=> array(
						'element'	=> 'type',
						'value'		=> array(
							'slider'
						)
					),
					'description' => esc_html__('Auto rotate slides each X seconds', 'aton'),
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Column Number', 'aton'),
					'param_name'	=> 'column_number',
					'value'			=> array(2, 3, 4, 5),
					'save_always'	=> true,
					'dependency'	=> array(
						'element' 	=> 'type',
						'value'		=> array(
							'image_grid'
						)
					),
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('On Click', 'aton'),
					'param_name'	=> 'on_click',
					'value'			=> array(
						esc_html__('Open Pretty Photo', 'aton')		=> 'photo',
						esc_html__('Open Custom Link', 'aton')		=> 'link'
					),
					'save_always'	=> true,
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__('Custom Links', 'aton'),
					"param_name" => "custom_links",
					"description" => esc_html__('Enter links for each image here. Divide links with comma.', 'aton'),
					"dependency" => array( 'element' => 'on_click', 'value' => 'link' )
				),
                array(
                    'type'        => 'dropdown',
                    'heading'     => esc_html__('Target', 'aton'),
                    'param_name'  => 'target',
                    'admin_label' => true,
                    'value'       => array(
                        esc_html__('Self', 'aton')  => '_self',
                        esc_html__('Blank', 'aton') => '_blank'
                    ),
                    'dependency' => array( 'element' => 'on_click', 'value' => 'link' )
                ),
				array(
					"type" => "textfield",
					"heading" => esc_html__('Slider height (px)', 'aton'),
					"param_name" => "height",
					'dependency' 	=> array(
						'element' => 'type',
						'value' => array(
							'slider'
						)
					)
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Grayscale Images', 'aton'),
					'param_name' => 'grayscale',
					'value' => array(
						esc_html__('No', 'aton') => 'no',
						esc_html__('Yes', 'aton') => 'yes'
					),
					'save_always'	=> true,
					'dependency'	=> array(
						'element'	=> 'type',
						'value'		=> array(
							'image_grid'
						)
					)
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Show Navigation Arrows', 'aton'),
					'param_name' 	=> 'navigation',
					'value' 		=> array(
						'Yes'		=> 'yes',
						'No'		=> 'no'
					),
					'dependency' 	=> array(
						'element' => 'type',
						'value' => array(
							'slider'
						)
					),
					'save_always'	=> true
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Show Pagination', 'aton'),
					'param_name' 	=> 'pagination',
					'value' 		=> array(
						'Yes' 		=> 'yes',
						'No'		=> 'no'
					),
					'save_always'	=> true,
					'dependency'	=> array(
						'element' => 'type',
						'value' => array(
							'slider'
						)
					)
				)
			)
		));

	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @param $content string shortcode content
	 * @return string
	 */
	public function render($atts, $content = null) {

		$args = array(
			'images'			=> '',
			'image_size'		=> 'thumbnail',
			'type'				=> 'slider',
			'autoplay'			=> '3',
			'on_click'			=> '',
			'custom_links' 		=> '',
			'target' 		    => '_self',
			'height' 			=> '',
			'column_number'		=> '',
			'grayscale'			=> '',
			'navigation'		=> 'no',
			'pagination'		=> 'yes'
		);

		$params = shortcode_atts($args, $atts);
		$params['slider_data'] = $this->getSliderData($params);
		$params['image_size'] = $this->getImageSize($params['image_size']);
		$params['images'] = $this->getGalleryImages($params);
		$params['slider_styles'] = $this->getImageSliderStyle($params);
		$params['custom_links'] = $this->getImageLinks($params);
		$params['columns'] = 'qodef-gallery-columns-' . $params['column_number'];
		$params['gallery_classes'] = ($params['grayscale'] == 'yes') ? 'qodef-grayscale' : '';

		if ($params['type'] == 'image_grid') {
			$template = 'gallery-grid';
		} elseif ($params['type'] == 'slider') {
			$template = 'gallery-slider';
		}

		$html = aton_qodef_get_shortcode_module_template_part('templates/' . $template, 'image-gallery', '', $params);

		return $html;

	}

	/**
	 * Return images for gallery
	 *
	 * @param $params
	 * @return array
	 */
	private function getGalleryImages($params) {
		$image_ids = array();
		$images = array();
		$i = 0;

		if ($params['images'] !== '') {
			$image_ids = explode(',', $params['images']);
		}

		$image_links_array = $this->getImageLinks($params);

		foreach ($image_ids as $id) {

			$image['image_id'] = $id;
			$image_original = wp_get_attachment_image_src($id, 'full');
			$image['url'] = $image_original[0];
			$image['title'] = get_the_title($id);
			if(!empty($image_links_array[$i]) && $image_links_array[$i] != '') {
				$image_link = $image_links_array[$i];
			}
			else {
				$image_link = false;
			}

			$image['link'] = $image_link;

			$images[$i] = $image;
			$i++;
		}

		return $images;

	}

	/**
	 * Return image size or custom image size array
	 *
	 * @param $image_size
	 * @return array
	 */
	private function getImageSize($image_size) {

		$image_size = trim($image_size);

		//Find digits
		preg_match_all( '/\d+/', $image_size, $matches );
		if(in_array( $image_size, array('thumbnail', 'thumb', 'medium', 'large', 'full'))) {
			return $image_size;
		} elseif(!empty($matches[0])) {
			return array(
				$matches[0][0],
				$matches[0][1]
			);
		} else {
			return 'thumbnail';
		}

	}

	private function getImageLinks($params) {
		$custom_links_array = array();

		if($params['custom_links'] != '') {
            $links = str_replace(' ','',$params['custom_links']);
            $custom_links_array = explode(',', strip_tags($links));
		}

		return $custom_links_array;
	}

	private function getImageSliderStyle($params) {
		$styles = array();

		if($params['height'] != '') {
			$styles [] = 'height: ' .$params['height'] . 'px';
		}

		return implode(';', $styles);
	}

	/**
	 * Return all configuration data for slider
	 *
	 * @param $params
	 * @return array
	 */
	private function getSliderData($params) {

		$slider_data = array();

		$slider_data['data-autoplay'] = ($params['autoplay'] !== '') ? $params['autoplay'] : '';
		$slider_data['data-navigation'] = ($params['navigation'] !== '') ? $params['navigation'] : '';
		$slider_data['data-pagination'] = ($params['pagination'] !== '') ? $params['pagination'] : '';

		return $slider_data;

	}

}