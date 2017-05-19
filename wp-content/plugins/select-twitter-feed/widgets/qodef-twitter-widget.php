<?php
if(!defined('ABSPATH')) exit;

class QodefTwitterWidget extends WP_Widget {
    private $params;

    public function __construct() {
        parent::__construct(
            'qodef_twitter_widget',
            esc_html__('Select Twitter Widget','select-twitter-feed' ),
            array( 'description' => esc_html__( 'Display tweets', 'select-twitter-feed' ) )
        );

        $this->setParams();
    }

    private function setParams() {
        $this->params = array(
            array(
                'name' => 'title',
                'type' => 'textfield',
                'title' => esc_html__('Title', 'select-twitter-feed')
            ),
            array(
                'name' => 'user_id',
                'type' => 'textfield',
                'title' => esc_html__('User ID', 'select-twitter-feed')
            ),
            array(
                'name' => 'count',
                'type' => 'textfield',
                'title' => esc_html__('Number of tweets', 'select-twitter-feed')
            ),
            array(
                'name' => 'show_tweet_time',
                'type' => 'dropdown',
                'title' => esc_html__('Show tweet time', 'select-twitter-feed'),
                'options' => array(
                    'no' => esc_html__('No','select-twitter-feed'),
                    'yes' => esc_html__('Yes', 'select-twitter-feed')
                )
            ),
            array(
                'name' => 'transient_time',
                'type' => 'textfield',
                'title' => esc_html__('Tweets Cache Time', 'select-twitter-feed')
            )
        );
    }

    public function form($instance) {
        foreach ($this->params as $param_array) {
            $param_name = $param_array['name'];
            ${$param_name} = isset( $instance[$param_name] ) ? esc_attr( $instance[$param_name] ) : '';
        }

        foreach ($this->params as $param) {
            switch($param['type']) {
                case 'textfield':
                    ?>
                    <p>
                        <label for="<?php echo esc_attr($this->get_field_id( $param['name'] )); ?>"><?php echo
                            esc_html($param['title']); ?></label>
                        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( $param['name'] )); ?>" name="<?php echo esc_attr($this->get_field_name( $param['name'] )); ?>" type="text" value="<?php echo esc_attr( ${$param['name']} ); ?>" />
                    </p>
                    <?php
                    break;
                case 'dropdown':
                    ?>
                    <p>
                        <label for="<?php echo esc_attr($this->get_field_id( $param['name'] )); ?>"><?php echo
                            esc_html($param['title']); ?></label>
                        <?php if(isset($param['options']) && is_array($param['options']) && count($param['options'])) { ?>
                            <select class="widefat" name="<?php echo esc_attr($this->get_field_name( $param['name'] )); ?>" id="<?php echo esc_attr($this->get_field_id( $param['name'] )); ?>">
                                <?php foreach ($param['options'] as $param_option_key => $param_option_val) {
                                    $option_selected = '';
                                    if(${$param['name']} == $param_option_key) {
                                        $option_selected = 'selected';
                                    }
                                    ?>
                                    <option <?php echo esc_attr($option_selected); ?> value="<?php echo esc_attr($param_option_key); ?>"><?php echo esc_attr($param_option_val); ?></option>
                                <?php } ?>
                            </select>
                        <?php } ?>
                    </p>

                    <?php
                    break;
            }
        }
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        foreach ($this->params as $param) {
            $param_name = $param['name'];

            $instance[$param_name] = sanitize_text_field($new_instance[$param_name]);
        }

        return $instance;
    }

    public function widget($args, $instance) {
        extract($instance);

        print $args['before_widget'];

        if(!empty($title)) {
            print $args['before_title'].$title.$args['after_title'];
        }

        $user_id = !empty($user_id) ? $user_id : '';
        $count = !empty($count) ? $count : '';
        $transient_time = !empty($transient_time) ? $transient_time : 0;

        $twitter_api = QodefTwitterApi::getInstance();

        if($twitter_api->hasUserConnected()) {
            $response = $twitter_api->fetchTweets($user_id, $count, array(
                'transient_time' => $transient_time,
                'transient_id' => 'qodef_twitter_'.$args['widget_id']
            ));

            if($response->status) {
                if(is_array($response->data) && count($response->data)) { ?>
                    <ul class="qodef-twitter-widget">
                    <?php foreach($response->data as $tweet) { ?>
                        <li>
                            <div class="qodef-tweet-icon-holder">
                                <span class="qodef-social-twitter"></span>
                            </div>
                            <div class="qodef-tweet-content-holder">
                                <div class="qodef-tweet-text">
                                    <?php echo wp_kses_post($twitter_api->getHelper()->getTweetText($tweet)); ?>
                                </div>
                                <?php if($show_tweet_time == 'yes') { ?>
                                    <div class="qodef-tweet-time">

                                        <a target="_blank" href="<?php echo esc_url($twitter_api->getHelper()->getTweetURL($tweet)); ?>">
                                            <?php echo wp_kses_post($twitter_api->getHelper()->getTweetTime($tweet)); ?>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </li>
                    <?php } ?>
                    </ul>
                <?php }
            } else {
                echo esc_html($response->message);
            }
        } else {
            esc_html_e('It seams that you haven\'t connected with your Twitter account', 'select-twitter-feed');
        }

        print $args['after_widget'];
    }
}

function qodef_twitter_widget_load(){
    register_widget('QodefTwitterWidget');
}

add_action('widgets_init', 'qodef_twitter_widget_load');