<?php

namespace black_willow\bw_toys;

abstract class bw_Basic_Shapes {

     public static function get_me_a_new_circle( $the_id = "ill_need_a_new_id", $the_className = "basic shapes circle", $the_r = 100, $the_cx = 100, $the_cy = 100 ) {
          return "\n##use id='$the_id' class='$the_className' href='#the_bw_circle' r='{$the_r}px' cx='{$the_cx}px' cy='{$the_cy}px' />\n";
     }
     public static function get_me_a_new_ellipse( $the_id, $the_className = "basic shapes ellipse", $the_rx = 100, $the_ry = 50, $the_cx = 100, $the_cy = 100 ) {
          return "\n##use id='$the_id' class='$the_className' href='#the_bw_ellipse' rx='{$the_rx}px' ry='{$the_ry}px' cx='{$the_cx}px' cy='{$the_cy}px' />\n";
     }
     public static function get_me_a_new_text( $the_id, $the_className = "basic shapes text", $the_text = "the_text_goes_here" ) {
          return "\n##use id='$the_id' class='$the_className' href='#the_bw_text' />$the_text##/text>\n";
     }
     public static function get_me_a_new_rectangle( $the_id, $the_className = "basic shapes rectangle", $the_width = 100, $the_height = 50, $the_x = 100, $the_y = 100, $the_rx = 0 ) {
          return "\n##use id='$the_id' class='$the_className' href='#the_bw_rectangle' rx='{$the_rx}px' ry='{$the_ry}px' cx='{$the_cx}px' cy='{$the_cy}px' />\n";
     }
}