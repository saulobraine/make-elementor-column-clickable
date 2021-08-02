<?php

namespace Braine;

class Braine_ClickableColumn_Widget_Loader
{
    private static $_instance = null;

    public static function instance()
    {
        if (is_null(self::$_instance)):
      self::$_instance = new self();
        endif;

        return self::$_instance;
    }

    public function include_widgets_files()
    {
        require_once(__DIR__ . '/column-braine/column-braine.php');
    }

    public function register_elements()
    {
        $this->include_widgets_files();

        \Elementor\Plugin::instance()->elements_manager->register_element_type(new Widgets\ClickableColumn_Braine());
    }
 

    public function init()
    {
        add_action('elementor/elements/elements_registered', [$this, 'register_elements'], 99);
    }

    public function __construct()
    {
        add_action('plugins_loaded', [$this, 'init']);
    }
}

Braine_ClickableColumn_Widget_Loader::instance();
