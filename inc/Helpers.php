<?php

function selleradise_locate_template($slug, $name = null, $data = [])
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

    if ($data) {
        extract($data);
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
        if (file_exists(plugin_dir_path( dirname( __FILE__ ) ). $template_name)) {
            $located = plugin_dir_path( dirname( __FILE__ ) ). $template_name;
            break;
        }
        if (file_exists(STYLESHEETPATH . '/' . $template_name)) {
            $located = STYLESHEETPATH . '/' . $template_name;
            break;
        } elseif (file_exists(TEMPLATEPATH . '/' . $template_name)) {
            $located = TEMPLATEPATH . '/' . $template_name;
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


if (!function_exists('selleradise_plugin_assets')) {
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
}
