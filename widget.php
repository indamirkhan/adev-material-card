<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor materialCard Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class ADEV_Material_Cards extends \Elementor\Widget_Base
{

    /**
     * Get widget name.
     *
     * Retrieve materialCard widget name.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'adevmc';
    }

    /**
     * Get widget title.
     *
     * Retrieve materialCard widget title.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('ADEV Material Cards', 'adev-material-card');
    }

    /**
     * Get widget icon.
     *
     * Retrieve materialCard widget icon.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-image-box';
    }

    /**
     * Get custom help URL.
     *
     * Retrieve a URL where the user can get more information about the widget.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget help URL.
     */
    public function get_custom_help_url()
    {
        return 'https://developers.elementor.com/docs/widgets/';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the materialCard widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['basic'];
    }

    /**
     * Get widget keywords.
     *
     * Retrieve the list of keywords the materialCard widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget keywords.
     */
    public function get_keywords()
    {
        return ['oembed', 'url', 'link'];
    }

    /**
     * Register materialCard widget controls.
     *
     * Add input fields to allow the user to customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'adev-material-card'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'open_icon',
            [
                'label' => esc_html__('Open Icon', 'textdomain'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa fa-bars',
                    'library' => 'fa-solid',
                ]
            ]
        );
        $this->add_control(
            'close_icon',
            [
                'label' => esc_html__('Close Icon', 'textdomain'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa fa-times',
                    'library' => 'fa-solid',
                ],
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'card_image',
            [
                'label' => esc_html__('Choose Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'card_title',
            [
                'label' => esc_html__('Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('John Doe', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );
        $repeater->add_control(
            'card_subtitle',
            [
                'label' => esc_html__('Sub Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('CEO', 'textdomain'),
                'placeholder' => esc_html__('Type your subtitle here', 'textdomain'),
            ]
        );
        $repeater->add_control(
            'card_description',
            [
                'label' => esc_html__('Description', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('He has appeared in more than 100 films and television shows, including The Deer Hunter, Annie Hall, The Prophecy trilogy, The Dogs of War.', 'textdomain'),
                'placeholder' => esc_html__('Type your description here', 'textdomain'),
            ]
        );
        $repeater->add_control(
            'card_color',
            [
                'label' => esc_html__('Card Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'solid',
                'options' => [
                    'Red' => __('Red', 'plugin-domain'),
                    'Pink' => __('Pink', 'plugin-domain'),
                    'Purple' => __('Purple', 'plugin-domain'),
                    'Deep-Purple' => __('Deep-Purple', 'plugin-domain'),
                    'Indigo' => __('Indigo', 'plugin-domain'),
                    'Blue' => __('Blue', 'plugin-domain'),
                    'Light-Blue' => __('Light-Blue', 'plugin-domain'),
                    'Cyan' => __('Cyan', 'plugin-domain'),
                    'Teal' => __('Teal', 'plugin-domain'),
                    'Green' => __('Gren', 'plugin-domain'),
                ],
            ]
        );
        $repeater->add_control(
            'link_fb',
            [
                'label' => esc_html__('Facebook', 'textdomain'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => 'https://facebook.com',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'link_tw',
            [
                'label' => esc_html__('Twitter', 'textdomain'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => 'https://twitter.com',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'link_ln',
            [
                'label' => esc_html__('Linkedin', 'textdomain'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => 'https://linkedin.com',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'link_ig',
            [
                'label' => esc_html__('Instagram', 'textdomain'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => 'https://instagram.com',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'material_card',
            [
                'label' => esc_html__('Card List', 'textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'card_title' => esc_html__('John Doe', 'textdomain'),
                        'card_subtitle' => esc_html__('CEO', 'textdomain'),
                        'card_description' => esc_html__('He has appeared in more than 100 films and television shows, including The Deer Hunter, Annie Hall, The Prophecy trilogy, The Dogs of War...', 'textdomain'),
                    ],
                    [
                        'card_title' => esc_html__('Sara Jones', 'textdomain'),
                        'card_subtitle' => esc_html__('Web Developer', 'textdomain'),
                        'card_description' => esc_html__('He has won two Academy Awards, for his roles in the mystery drama Mystic River (2003) and the biopic Milk (2008). Penn began his acting career in television with a brief appearance in a 1974 episode of Little House on the', 'textdomain'),
                    ],
                    [
                        'card_title' => esc_html__('Jack Reacher', 'textdomain'),
                        'card_subtitle' => esc_html__('UI/UX Desighner', 'textdomain'),
                        'card_description' => esc_html__('He rose to international fame with his role as the Man with No Name in Sergio Leone Dollars trilogy of spaghetti Westerns during the 1960s...', 'textdomain'),
                    ],
                ],
                'title_field' => '{{{ card_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'typography_section',
            [
                'label' => __('Typography Controls', 'plugin-name'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => _('Title', 'plugin-domain'),
                'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .material-card h2 .main_title',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'label' => _('Sub-Title', 'plugin-domain'),
                'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_2,
                'selector' => '{{WRAPPER}} .material-card h2 .sub_title',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typo',
                'label' => _('Description', 'plugin-domain'),
                'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_2,
                'selector' => '{{WRAPPER}} .material-card .mc-description',
            ]
        );
        $this->end_controls_section();
    }

    /**
     * Render materialCard widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        if ($settings['material_card']) {
            echo '<div class="row active-with-click">';
            foreach ($settings['material_card'] as $item) { ?>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <article class="material-card <?php echo $item['card_color']; ?>">
                        <h2>
                            <span class="main_title"><?php echo $item['card_title']; ?></span>
                            <span class="sub_title">
                                <i class="fa fa-fw fa-star"></i>
                                <?php echo $item['card_subtitle']; ?>
                            </span>
                        </h2>
                        <div class="mc-content">
                            <div class="img-container">
                                <img class="img-responsive" src="<?php echo $item['card_image']['url'] ?>">
                            </div>
                            <div class="mc-description">
                                <?php echo $item['card_description']; ?>
                            </div>
                        </div>
                        <a class="mc-btn-action">
                            <i class="<?php echo $settings['open_icon']['value'] ?>"></i>
                        </a>
                        <div class="mc-footer">
                            <h4>
                                Social
                            </h4>
                            <?php
                            $target_fb = $item['link_fb']['is_external'] ? ' target="_blank"' : '';
                            $target_tw = $item['link_tw']['is_external'] ? ' target="_blank"' : '';
                            $target_ln = $item['link_ln']['is_external'] ? ' target="_blank"' : '';
                            $target_ig = $item['link_ig']['is_external'] ? ' target="_blank"' : '';
                            $nofollow_fb = $item['link_fb']['nofollow'] ? ' rel="nofollow"' : '';
                            $nofollow_tw = $item['link_tw']['nofollow'] ? ' rel="nofollow"' : '';
                            $nofollow_ln = $item['link_ln']['nofollow'] ? ' rel="nofollow"' : '';
                            $nofollow_ig = $item['link_ig']['nofollow'] ? ' rel="nofollow"' : '';
                            ?>
                            <a class="adev-social-icon text-center" href="<?php echo $item['link_fb']['url'] ?>" <?php echo $target_fb . $nofollow_fb ?>>
                                <i class="fab fa-facebook" aria-hidden="true"></i>
                            </a>
                            <a class="adev-social-icon text-center" href="<?php echo $item['link_tw']['url'] ?>" <?php echo $target_tw . $nofollow_tw ?>>
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="adev-social-icon text-center" href="<?php echo $item['link_ln']['url'] ?>" <?php echo $target_ln . $nofollow_ln ?>>
                                <i class="fab fa-linkedin"></i>
                            </a>
                            <a class="adev-social-icon text-center" href="<?php echo $item['link_ig']['url'] ?>" <?php echo $target_ig . $nofollow_ig ?>>
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </article>
                </div>
        <?php }
            echo '</div>';
        }
        ?>
        <script>
            jQuery(function($) {
                $('.material-card').materialCard({
                    icon_open: '<?php echo $settings['open_icon']['value'] ?>',
                    icon_close: '<?php echo $settings['close_icon']['value'] ?>',
                    icon_spin: 'fa-spin-fast',
                    card_activator: 'click'
                });

                //        $('.active-with-click .material-card').materialCard();

                window.setTimeout(function() {
                    $('.material-card:eq(1)').materialCard('open');
                }, 2000);

                $('.material-card').on('shown.material-card show.material-card hide.material-card hidden.material-card', function(event) {
                    console.log(event.type, event.namespace, $(this));
                });

            });
        </script>
<?php
    }
}
