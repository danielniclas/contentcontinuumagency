<?php

namespace AtonQodef\Modules\Shortcodes\BlogList;

use AtonQodef\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class BlogList
 */
class BlogList implements ShortcodeInterface {
	/**
	* @var string
	*/
	private $base;
	
	function __construct() {
		$this->base = 'qodef_blog_list';
		
		add_action('vc_before_init', array($this,'vcMap'));

		//Category filter
		add_filter( 'vc_autocomplete_qodef_blog_list_category_callback', array( &$this, 'blogListCategoryAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array

		//Category render
		add_filter( 'vc_autocomplete_qodef_blog_list_category_render', array( &$this, 'blogListCategoryAutocompleteRender', ), 10, 1 ); // Get suggestion(find). Must return an array

	}
	
	public function getBase() {
		return $this->base;
	}
	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('Select Blog List', 'aton'),
			'base' => $this->base,
			'icon' => 'icon-wpb-blog-list extended-custom-icon',
			'category' => 'by SELECT',
			'allowed_container_element' => 'vc_row',
			'params' => array(
					array(
						'type' => 'dropdown',
						'holder' => 'div',
						'class' => '',
						'heading' => esc_html__('Type', 'aton'),
						'param_name' => 'type',
						'value' => array(
							esc_html__('Boxes', 'aton') => 'boxes',
							esc_html__('Masonry', 'aton') => 'masonry',
							esc_html__('Minimal', 'aton') => 'minimal',
							esc_html__('Image in box', 'aton') => 'image_in_box'
						),
						'description' => '',
                        'save_always' => true
					),
					array(
						'type' => 'textfield',
						'holder' => 'div',
						'class' => '',
						'heading' => esc_html__('Number of Posts', 'aton'),
						'param_name' => 'number_of_posts',
						'description' => ''
					),
					array(
						'type' => 'dropdown',
						'holder' => 'div',
						'class' => '',
						'heading' => esc_html__('Number of Columns', 'aton'),
						'param_name' => 'number_of_columns',
						'value' => array(
							esc_html__('One', 'aton') => '1',
							esc_html__('Two', 'aton') => '2',
							esc_html__('Three', 'aton') => '3',
							esc_html__('Four', 'aton') => '4'
						),
						'description' => '',
						'dependency' => Array('element' => 'type', 'value' => array('boxes')),
                        'save_always' => true
					),
					array(
						'type' => 'dropdown',
						'holder' => 'div',
						'class' => '',
						'heading' => esc_html__('Order By', 'aton'),
						'param_name' => 'order_by',
						'value' => array(
							esc_html__('Title', 'aton') => 'title',
							esc_html__('Date', 'aton') => 'date'
						),
						'save_always' => true,
						'description' => ''
					),
					array(
						'type' => 'dropdown',
						'holder' => 'div',
						'class' => '',
						'heading' => esc_html__('Order', 'aton'),
						'param_name' => 'order',
						'value' => array(
							esc_html__('ASC', 'aton') => 'ASC',
							esc_html__('DESC', 'aton') => 'DESC'
						),
						'save_always' => true,
						'description' => ''
					),
					array(
						'type' => 'autocomplete',
						'heading' => esc_html__('Category Slug', 'aton'),
						'param_name' => 'category',
						'description' => esc_html__('Leave empty for all or use comma for list', 'aton'),
						'admin_label' => true
					),
                    array(
                        'type' => 'dropdown',
                        'class' => '',
                        'heading' => esc_html__('Show Image', 'aton'),
                        'param_name' => 'show_image',
                        'value' => array(
                            '' => '',
                            esc_html__('Yes', 'aton') => 'yes',
                            esc_html__('No', 'aton') => 'no'
                        ),
                        'description' => '',
                        'dependency' => Array('element' => 'type', 'value' => array('boxes')),
                        'group' => esc_html__('Layout Options', 'aton')
                    ),
                    array(
                        'type' => 'dropdown',
                        'holder' => 'div',
                        'class' => '',
                        'heading' => esc_html__('Image Size', 'aton'),
                        'param_name' => 'image_size',
                        'value' => array(
                            esc_html__('Original', 'aton') => 'original',
                            esc_html__('Landscape', 'aton') => 'landscape',
                            esc_html__('Square', 'aton') => 'square'
                        ),
                        'description' => '',
                        'dependency' => Array('element' => 'show_image', 'value' => array('yes')),
                        'save_always' => true,
                        'group' => esc_html__('Layout Options', 'aton')
                    ),
					array(
						'type' => 'textfield',
						'holder' => 'div',
						'class' => '',
						'heading' => esc_html__('Text length', 'aton'),
						'param_name' => 'text_length',
						'description' => esc_html__('Number of characters', 'aton')
					),
					array(
						'type' => 'dropdown',
						'class' => '',
						'heading' => esc_html__('Title Tag', 'aton'),
						'param_name' => 'title_tag',
						'value' => array(
							''   => '',
							esc_html__('h2', 'aton') => 'h2',
							esc_html__('h3', 'aton') => 'h3',
							esc_html__('h4', 'aton') => 'h4',
							esc_html__('h5', 'aton') => 'h5',
							esc_html__('h6', 'aton') => 'h6',
						),
						'description' => ''
					),
                    array(
                        'type' => 'dropdown',
                        'class' => '',
                        'heading' => esc_html__('Show Date', 'aton'),
                        'param_name' => 'show_date',
                        'value' => array(
                            '' => '',
                            esc_html__('Yes', 'aton') => 'yes',
                            esc_html__('No', 'aton') => 'no'
                        ),
                        'description' => '',
                        'dependency' => Array('element' => 'type', 'value' => array('boxes', 'masonry', 'image_in_box', 'minimal')),
                        'group' => esc_html__('Layout Options', 'aton')
                    ),
                    array(
                        'type' => 'dropdown',
                        'class' => '',
                        'heading' => esc_html__('Show Category', 'aton'),
                        'param_name' => 'show_category',
                        'value' => array(
                            '' => '',
                            esc_html__('Yes', 'aton') => 'yes',
                            esc_html__('No', 'aton') => 'no'
                        ),
                        'description' => '',
                        'dependency' => Array('element' => 'type', 'value' => array('boxes', 'masonry', 'image_in_box')),
                        'group' => esc_html__('Layout Options', 'aton')
                    ),
                    array(
                        'type' => 'dropdown',
                        'class' => '',
                        'heading' => esc_html__('Show Author', 'aton'),
                        'param_name' => 'show_author',
                        'value' => array(
                            '' => '',
                            esc_html__('Yes', 'aton') => 'yes',
                            esc_html__('No', 'aton') => 'no'
                        ),
                        'description' => '',
                        'dependency' => Array('element' => 'type', 'value' => array('boxes', 'masonry', 'image_in_box')),
                        'group' => esc_html__('Layout Options', 'aton')
                    ),
                    array(
                        'type' => 'dropdown',
                        'class' => '',
                        'heading' => esc_html__('Show Share', 'aton'),
                        'param_name' => 'show_share',
                        'value' => array(
                            '' => '',
                            esc_html__('Yes', 'aton') => 'yes',
                            esc_html__('No', 'aton') => 'no'
                        ),
                        'description' => '',
                        'dependency' => Array('element' => 'type', 'value' => array('boxes', 'masonry', 'image_in_box')),
                        'group' => esc_html__('Layout Options', 'aton')
                    ),
                    array(
                        'type' => 'dropdown',
                        'class' => '',
                        'heading' => esc_html__('Show Comments', 'aton'),
                        'param_name' => 'show_comments',
                        'value' => array(
                            '' => '',
                            esc_html__('Yes', 'aton') => 'yes',
                            esc_html__('No', 'aton') => 'no'
                        ),
                        'description' => '',
                        'dependency' => Array('element' => 'type', 'value' => array('boxes', 'masonry', 'image_in_box')),
                        'group' => esc_html__('Layout Options', 'aton')
                    ),
                    array(
                        'type' => 'dropdown',
                        'class' => '',
                        'heading' => esc_html__('Show Likes', 'aton'),
                        'param_name' => 'show_likes',
                        'value' => array(
                            '' => '',
                            esc_html__('Yes', 'aton') => 'yes',
                            esc_html__('No', 'aton') => 'no'
                        ),
                        'description' => '',
                        'dependency' => Array('element' => 'type', 'value' => array('boxes', 'masonry', 'image_in_box')),
                        'group' => esc_html__('Layout Options', 'aton')
                    ),
                    array(
                        'type' => 'dropdown',
                        'class' => '',
                        'heading' => esc_html__('Show Read More', 'aton'),
                        'param_name' => 'show_read_more',
                        'value' => array(
                            '' => '',
                            esc_html__('Yes', 'aton') => 'yes',
                            esc_html__('No', 'aton') => 'no'
                        ),
                        'description' => '',
                        'dependency' => Array('element' => 'type', 'value' => array('boxes', 'masonry', 'image_in_box')),
                        'group' => esc_html__('Layout Options', 'aton')
                    )
				)
		) );

	}
	public function render($atts, $content = null) {
		
		$default_atts = array(
			'type' => 'boxes',
            'number_of_posts' => '',
            'number_of_columns' => '',
            'show_image' => 'yes',
            'image_size' => 'original',
            'order_by' => '',
            'order' => '',
            'category' => '',
            'title_tag' => 'h5',
			'text_length' => '90',
            'show_date' => 'yes',
            'show_category' => 'yes',
            'show_author' => 'yes',
            'show_share' => 'yes',
            'show_comments' => 'yes',
            'show_likes' => 'yes',
            'show_read_more' => 'no'
        );
		
		$params = shortcode_atts($default_atts, $atts);
		extract($params);
		$params['holder_classes'] = $this->getBlogHolderClasses($params);
	
		$queryArray = $this->generateBlogQueryArray($params);
		$query_result = new \WP_Query($queryArray);
		$params['query_result'] = $query_result;
		

		$params['thumb_image_size'] = $this->generateImageSize($params);
		$params['info_bottom_class'] = $this->getInfoBottomClass($params);

		$html ='';
        $html .= aton_qodef_get_shortcode_module_template_part('templates/blog-list-holder', 'blog-list', '', $params);
		return $html;
		
	}

	/**
	   * Generates holder classes
	   *
	   * @param $params
	   *
	   * @return string
	*/
	private function getBlogHolderClasses($params){
		$holderClasses = '';
		
		$columnNumber = $this->getColumnNumberClass($params);
		
		if(!empty($params['type'])){
			switch($params['type']){
				case 'image_in_box':
					$holderClasses = 'qodef-image-in-box';
				break;
				case 'boxes' : 
					$holderClasses = 'qodef-boxes';
				break;	
				case 'masonry' : 
					$holderClasses = 'qodef-masonry';
				break;
				case 'minimal' :
					$holderClasses = 'qodef-minimal';
				break;	
				default: 
					$holderClasses = 'qodef-boxes';
			}
		}
		
		$holderClasses .= ' '.$columnNumber;
		
		return $holderClasses;
		
	}

	/** 
	   * Generates column classes for boxes type
	   *
	   * @param $params
	   *
	   * @return string
	*/
	private function getColumnNumberClass($params){
		
		$columnsNumber = '';
		$type = $params['type'];
		$columns = $params['number_of_columns'];
		
        if ($type == 'boxes') {
            switch ($columns) {
                case 1:
                    $columnsNumber = 'qodef-one-column';
                    break;
                case 2:
                    $columnsNumber = 'qodef-two-columns';
                    break;
                case 3:
                    $columnsNumber = 'qodef-three-columns';
                    break;
                case 4:
                    $columnsNumber = 'qodef-four-columns';
                    break;
                default:
					$columnsNumber = 'qodef-one-column';
                    break;
            }
        }
		return $columnsNumber;
	}

    /**
     * Generates classes for section info bottom
     *
     * @param $params
     *
     * @return string
     */
    private function getInfoBottomClass($params){

        $class = '';

        if($params['show_author'] != 'yes' && $params['show_coments'] != 'yes' && $params['show_likes'] != 'yes') {
            $class .= 'qodef-no-info-left ';
        }
        else {
            if( aton_qodef_options()->getOptionValue('enable_social_share') != 'yes'
                || aton_qodef_options()->getOptionValue('enable_social_share_on_post') != 'yes'
                || $params['show_share'] != 'yes') {
                $class .= 'qodef-no-info-share ';
            }
        }

        return $class;
    }

	/**
	   * Generates query array
	   *
	   * @param $params
	   *
	   * @return array
	*/
	public function generateBlogQueryArray($params){
		
		$queryArray = array(
			'orderby' => $params['order_by'],
			'order' => $params['order'],
			'posts_per_page' => $params['number_of_posts'],
			'category_name' => $params['category']
		);
		return $queryArray;
	}

	/**
	   * Generates image size option
	   *
	   * @param $params
	   *
	   * @return string
	*/
	private function generateImageSize($params){
		$thumbImageSize = '';
		$imageSize = $params['image_size'];

        if($params['type'] == 'minimal') {
            $thumbImageSize = array('50', '50');
        } else if ($imageSize !== '' && $imageSize == 'landscape') {
            $thumbImageSize .= 'aton_qodef_landscape';
        } else if($imageSize === 'square'){
			$thumbImageSize .= 'aton_qodef_square';
		} else if ($imageSize !== '' && $imageSize == 'original') {
            $thumbImageSize .= 'full';
        }

		return $thumbImageSize;
	}

	/**
	 * Filter categories
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function blogListCategoryAutocompleteSuggester( $query ) {
		global $wpdb;
		$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT a.slug AS slug, a.name AS category_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'category' AND a.name LIKE '%%%s%%'", stripslashes( $query ) ), ARRAY_A );

		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data          = array();
				$data['value'] = $value['slug'];
				$data['label'] = ( ( strlen( $value['category_title'] ) > 0 ) ? esc_html__( 'Category', 'aton' ) . ': ' . $value['category_title'] : '' );
				$results[]     = $data;
			}
		}

		return $results;

	}

	/**
	 * Find categories by slug
	 * @since 4.4
	 *
	 * @param $query
	 *
	 * @return bool|array
	 */
	public function blogListCategoryAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get category
			$category = get_term_by( 'slug', $query, 'category' );
			if ( is_object( $category ) ) {

				$category_slug = $category->slug;
				$category_title = $category->name;

				$category_title_display = '';
				if ( ! empty( $category_title ) ) {
					$category_title_display = esc_html__( 'Category', 'aton' ) . ': ' . $category_title;
				}

				$data          = array();
				$data['value'] = $category_slug;
				$data['label'] = $category_title_display;

				return ! empty( $data ) ? $data : false;
			}

			return false;
		}

		return false;
	}
	
}
