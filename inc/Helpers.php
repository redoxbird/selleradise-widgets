<?php

/**
 * Slightly modified get_template_part().
 *
 * @param  string  $slug
 * @param  string  $name
 * @param  array  $args
 * @return mixed $template
 */

function selleradise_widgets_get_template_part($slug, $name = null, $args = [])
{

    $templates = [];
    $name = (string) $name;

    if ('' !== $name) {
        $templates[] = "{$slug}-{$name}.php";
    }

    $templates[] = "{$slug}.php";

    $template = selleradise_widgets_locate_template($templates, false);

    if (!$template) {
        return;
    }

    include $template;
}

function selleradise_widgets_locate_template($template_names, $load = false, $require_once = true, $args = array())
{
    $located = '';

    foreach ((array) $template_names as $template_name) {
        if (!$template_name) {
            continue;
        }
        if (file_exists(plugin_dir_path(dirname(__FILE__)) . $template_name)) {
            $located = plugin_dir_path(dirname(__FILE__)) . $template_name;
            break;
        }
        if (file_exists(get_stylesheet_directory() . '/' . $template_name)) {
            $located = get_stylesheet_directory() . '/' . $template_name;
            break;
        } elseif (file_exists(get_template_directory() . '/' . $template_name)) {
            $located = get_template_directory() . '/' . $template_name;
            break;
        } elseif (file_exists(ABSPATH . WPINC . '/theme-compat/' . $template_name)) {
            $located = ABSPATH . WPINC . '/theme-compat/' . $template_name;
            break;
        }
    }

    if ($load && '' !== $located) {
        load_template($located, $require_once, $args);
    }

    return $located;
}

/**
 * Get assets folder url.
 *
 * @param  string  $path
 * @return string
 */

function selleradise_plugin_assets($path)
{
    if (!$path) {
        return;
    }

    return SELLERADISE_WIDGETS_DIR_URI . '/assets/dist/' . $path;
}

/**
 * Get inline svg from a file.
 *
 * @param  string  $filename
 * @return string xml
 */

function selleradise_widgets_svg($filename)
{
    if (!$filename) {
        return;
    }

    $file_location = SELLERADISE_WIDGETS_DIR_PATH . 'assets/dist/svg/' . $filename . '.svg';

    if (!file_exists($file_location)) {
        return;
    }

    return file_get_contents($file_location);
}

if (!function_exists('selleradise_truncate')) {

/**
 * Truncates a string with a given length.
 *
 * @param  string  $string
 * @param  int  $length
 * @param  string  $append
 * @return string
 */

    function selleradise_truncate($string, $length = 100, $append = "&hellip;")
    {
        $string = trim($string);

        if (strlen($string) > $length) {
            $string = wordwrap($string, $length);
            $string = explode("\n", $string, 2);
            $string = $string[0] . $append;
        }

        return $string;
    }
}

if (!function_exists('selleradise_get_image_placeholder')) {

    function selleradise_get_image_placeholder()
    {
        return selleradise_plugin_assets('images/placeholder.png');
    }
}

if (!function_exists('selleradise_widgets_get_version')) {

    function selleradise_widgets_get_version()
    {
        $version = SELLERADISE_WIDGETS_VERSION;

        if (!function_exists('wp_get_environment_type')) {
            return $version;
        }

        switch (wp_get_environment_type()) {
            case 'local':
            case 'development':
                $version = time();
                break;
        }

        return $version;
    }
}

if (!function_exists('selleradise_is_normal_mode')) {

    function selleradise_is_normal_mode()
    {
        if (!class_exists('\Elementor\Plugin')) {
            return true;
        }

        if (\Elementor\Plugin::$instance->editor->is_edit_mode()) {
            return false;
        }

        return true;
    }
}
