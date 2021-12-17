<?php

if (!function_exists('selleradise_widgets_get_template_part')) {
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

if (!function_exists('selleradise_widgets_svg')) {
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
