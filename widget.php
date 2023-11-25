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
            'url',
            [
                'label' => esc_html__('URL to embed', 'adev-material-card'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'url',
                'placeholder' => esc_html__('https://your-link.com', 'adev-material-card'),
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
?>
        <div class="row active-with-click">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <article class="material-card Red">
                    <h2>
                        <span>Christopher Walken</span>
                        <strong>
                            <i class="fa fa-fw fa-star"></i>
                            The Deer Hunter
                        </strong>
                    </h2>
                    <div class="mc-content">
                        <div class="img-container">
                            <img class="img-responsive" src="https://material-cards.s3-eu-west-1.amazonaws.com/thumb-christopher-walken.jpg">
                        </div>
                        <div class="mc-description">
                            He has appeared in more than 100 films and television shows, including The Deer Hunter, Annie Hall, The Prophecy trilogy, The Dogs of War ...
                        </div>
                    </div>
                    <a class="mc-btn-action">
                        <i class="fa fa-bars"></i>
                    </a>
                    <div class="mc-footer">
                        <h4>
                            Social
                        </h4>
                        <a class="fa fa-fw fa-facebook"></a>
                        <a class="fa fa-fw fa-twitter"></a>
                        <a class="fa fa-fw fa-linkedin"></a>
                        <a class="fa fa-fw fa-google-plus"></a>
                    </div>
                </article>
            </div>
        </div>
        <script>
            jQuery(function($) {
                $('.material-card').materialCard({
                    icon_close: 'fa-chevron-left',
                    icon_open: 'fa-thumbs-o-up',
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
