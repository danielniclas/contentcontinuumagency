<?php

class AtonQodefLatestPosts extends AtonQodefWidget {
	protected $params;
	public function __construct() {
		parent::__construct(
			'qodef_latest_posts_widget', // Base ID
			esc_html__('Select Latest Post', 'aton'), // Name
			array( 'description' => esc_html__( 'Display posts from your blog', 'aton' ), ) // Args
		);

		$this->setParams();
	}

	protected function setParams() {
		$this->params = array(
            array(
                'name' => 'title',
                'type' => 'textfield',
                'title' => esc_html__('Widget Title', 'aton')
            ),
			array(
				'name' => 'number_of_posts',
				'type' => 'textfield',
				'title' => esc_html__('Number of posts', 'aton')
			),
			array(
				'name' => 'order_by',
				'type' => 'dropdown',
				'title' => esc_html__('Order By', 'aton'),
				'options' => array(
					'title' => esc_html__('Title', 'aton'),
					'date' => esc_html__('Date', 'aton')
				)
			),
			array(
				'name' => 'order',
				'type' => 'dropdown',
				'title' => esc_html__('Order', 'aton'),
				'options' => array(
					'ASC' => esc_html__('ASC', 'aton'),
					'DESC' => esc_html__('DESC', 'aton')
				)
			),
			array(
				'name' => 'category',
				'type' => 'textfield',
				'title' => esc_html__('Category Slug', 'aton')
			)
		);
	}

	public function widget($args, $instance) {
		extract($args);

		//prepare variables
		$content        = '';
		$params         = array();
		$params['type'] = 'minimal';
		//is instance empty?
		if(is_array($instance) && count($instance)) {
			//generate shortcode params
			foreach($instance as $key => $value) {
				$params[$key] = $value;
			}
		}

        extract($instance);

        print $args['before_widget'];
        print $args['before_title'].$title.$args['after_title'];

		echo '<div class="widget qodef-latest-posts-widget">';
		
		echo aton_qodef_execute_shortcode('qodef_blog_list', $params);

		echo '</div>'; //close qodef-latest-posts-widget

        print $args['after_widget'];
	}
}
