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



if (!function_exists('selleradise_get_color_contrast')) {

    /**
     * Adjust the brightness of a given color.
     *
     * @param string $hexColor
     * @param string $blackColor
     * @return int contrast ratio
     */

    function selleradise_get_color_contrast($hexColor, $blackColor = "#000000")
    {

        // hexColor RGB
        $R1 = hexdec(substr($hexColor, 1, 2));
        $G1 = hexdec(substr($hexColor, 3, 2));
        $B1 = hexdec(substr($hexColor, 5, 2));

        // Black RGB
        // $blackColor = "#000000";

        $R2BlackColor = hexdec(substr($blackColor, 1, 2));
        $G2BlackColor = hexdec(substr($blackColor, 3, 2));
        $B2BlackColor = hexdec(substr($blackColor, 5, 2));

        // Calc contrast ratio
        $L1 = 0.2126 * pow($R1 / 255, 2.2) +
        0.7152 * pow($G1 / 255, 2.2) +
        0.0722 * pow($B1 / 255, 2.2);

        $L2 = 0.2126 * pow($R2BlackColor / 255, 2.2) +
        0.7152 * pow($G2BlackColor / 255, 2.2) +
        0.0722 * pow($B2BlackColor / 255, 2.2);

        $contrastRatio = 0;
        if ($L1 > $L2) {
            $contrastRatio = (float) (($L1 + 0.05) / ($L2 + 0.05));
        } else {
            $contrastRatio = (float) (($L2 + 0.05) / ($L1 + 0.05));
        }

        return $contrastRatio;
    }
}

