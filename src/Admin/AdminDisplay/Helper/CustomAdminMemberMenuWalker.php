<?php
declare(strict_types=1);
namespace MedixSolutionSuite\Admin\AdminDisplay\Helper;


/**
 * Description of CustomAdminWalker
 *
 * @author dibya
 */
class CustomAdminMemberMenuWalker extends \Walker_Nav_Menu {
     function start_lvl(&$output, $depth = 0, $args = array()) {
        $output .= '<ul class="mss-sub-menu">';
    }

    function end_lvl(&$output, $depth = 0, $args = array()) {
        $output .= '</ul>';
    }

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $class_names = join(' ', $item->classes);
        $output .= sprintf(
            '<li class="%s"><a href="%s">%s</a>',
            esc_attr($class_names),
            esc_url($item->url),
            esc_html($item->title)
        );
    }

    function end_el(&$output, $item, $depth = 0, $args = array()) {
        $output .= '</li>';
    }
}
