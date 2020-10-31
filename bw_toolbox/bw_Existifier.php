<?php

namespace black_willow\bw_toolbox;

class BW_Existifier {

	/*/
	_BW_ALL_CAPS		:	core classes, never instantiated
	bw_Initial_Caps	:	Instantiable classes (bw_system, bw_framework, bw_data, bw_components,
	bw_Initial_Caps_Tag	:	HTML wrapper classes (bw_containers or bw_wrappers)
	bw_Initial_Caps	:	Abstract classes (bw_abstract)
	bw_all_lower_case	:	functions and procedures
	/*/

	private $my_root;

	public function __construct( $the_root = "black_willow" ) {
		$this->my_root = $the_root;
	}

     public function existify_the_class( $with_this_name_including_namespace ) {
          $the_name = &$with_this_name_including_namespace;
          if ( \class_exists( $the_name ) ) {
               return TRUE;
          }

		$the_namespaces = \explode( "\\", $the_name );
		$the_class_name = \array_pop( $the_namespaces );
		if ( $the_namespaces[0] === "" ) {
			array_shift( $the_namespaces );
		}
		if ( $the_namespaces[0] === "bw" ) {
			$the_include_path = "C:\\Web\\vhosts\\black_willow";
		} else {
			$the_include_path = getcwd();
		}
		$the_directory = \implode( "_", $the_namespaces );

          $the_file = "$the_include_path\\$the_namespaces[1] \\$the_class_name.php";
		//\line_out( __FILE__, __LINE__, $the_file );

          if ( \file_exists( $the_file ) ) {
               include $the_file;
			if ( ! isset( $GLOBALS[ 'FILES_IN_PROCESS' ] ) ) {
				$GLOBALS[ 'FILES_IN_PROCESS' ] = new \Ds\Map();
			}
			$GLOBALS[ "FILES_IN_PROCESS" ]->put( $the_file, "existify" );
          }
     }

	public function identify_and_existify_the_class( $with_this_name ) {

          $return_me = FALSE;

		// if it's already there, return.
		if ( class_exists( $with_this_name ) || function_exists( $with_this_name ) ) {
			return TRUE;
		}
		if ( preg_match( "/\b\_[A-Z]{2}\_[A-Z]*\b/", $with_this_name ) ) {
			if ( ! class_exists( $with_this_name ) ) {
				$return_me =  "bw_core/$with_this_name.php";
			}
		} else if ( preg_match( "/\b[A-Z]{2}\_[A-Z]\w*_Tag\b/", $with_this_name ) ) {
			if ( ! class_exists( $with_this_name ) ) {
				if ( file_exists( "bw_containers/$with_this_name.php" ) ) {
					$return_me = "bw_containers/$with_this_name.php";
				} else if ( file_exists( "bw_wrappers/$with_this_name.php" ) ) {
					$return_me =  "bw_wrappers/$with_this_name.php";
				}
			}
		} else if ( preg_match( "/\b[A-Z]{2}\_[A-Z]\w*\b/", $with_this_name ) ) {
			if ( ! class_exists( "\$with_this_name" ) ) {
				if ( file_exists( "bw_components/$with_this_name.php" ) ) {
					$return_me = "bw_components/$with_this_name.php";
				} else if ( file_exists( "bw_framework/$with_this_name.php" ) ) {
					$return_me = "bw_framework/$with_this_name.php";
				} else if ( file_exists( "bw_static/$with_this_name.php" ) ) {
					$return_me = "bw_static/$with_this_name.php";
				} else if ( file_exists( "bw_system/$with_this_name.php" ) ) {
					$return_me = "bw_system/$with_this_name.php";
				} else if ( file_exists( "bw_data/$with_this_name.php" ) ) {
					$return_me = "bw_components/$with_this_name.php";
				}
			}
		} else if ( preg_match( "/\b[a-z]{2}\_[A-Z][a-z]*s\b/", $with_this_name ) ) {
			if ( ! class_exists( $with_this_name ) ) {
				$return_me =  "bw_abstract/$with_this_name.php";
			}
		} else if ( preg_match( "/\b[a-z]{2}\_[a-z]*\b/", $with_this_name ) ) {
			if ( ! function_exists( $with_this_name ) ) {
				$return_me =  "bw_functions/$with_this_name.php";
			}
		}
          return $return_me;
	}

     public function existify_the_class_directory( $with_this_path, $html_or_return = "return" ) {
		$the_directory_path = &$with_this_path;
		$the_top_directory = \strstr( $the_directory_path, "/", TRUE );
		$the_pagename = \str_replace( "/", "_", $the_directory_path );
		$return_me = "";
		$the_directory = \opendir( $with_this_path );
          if ( ! null === $the_directory ) {
			$the_next_entry = \readdir( $the_directory );
               while ( ! null === $the_next_entry ) {
                    if ( ( strpos( $the_next_entry, "." ) === 0 ) OR ( strpos( $the_next_entry, "_" ) === 0 ) ) {
                         continue;
                    }
				if ( \is_dir( "$with_this_path/$the_next_entry" ) ) {
					$return_me .= $this->existify_the_class_directory( "$the_directory_path/$the_next_entry", "return" );
				}
                    switch ( $the_top_directory ) {
                         case "bw_init"           :    $the_namespace = "bw\\init";
                                                       break;
                         case "bw_system"         :    $the_namespace = "bw\\sys";
                                                       break;
                         case "bw_containers"     :    $the_namespace = "bw\\cons";
                                                       break;
                         case "bw_framework"      :    $the_namespace = "bw\\frame";
                                                       break;
                         case "bw_components"     :    $the_namespace = "bw\\coms";
                                                       break;
                         case "bw_static_pages"   :    $the_namespace = "bw\\stats";
                                                       break;
                         case "bw_core"           :    $the_namespace = "bw\\core";
                                                       break;
                         case "bw_toolbox"        :    $the_namespace = "bw\\tkit";
                                                       break;
                         case "bw_wrappers"       :    $the_namespace = "bw\\wraps";
                                                       break;
                         case "bw_factories"      :    $the_namespace = "bw\\facs";
                                                       break;
                         case "bw_functions"      :    $the_namespace = "bw\\funcs";
                                                       break;
                         case "bw_data"           :    $the_namespace = "bw\\data";
                                                       break;
                         case "bw_assets"         :    $the_namespace = "bw\\asset";
                                                       break;
                         case "bw_black_boxes"    :    $the_namespace = "bw\\bbox";
                                                       break;
                         case "bw_inline_tags"    :    $the_namespace = "bw\\tags";
                                                       break;
                         case "bw_errors"         :    $the_namespace = "bw\\errex";
                                                       break;
                         case "bw_toys"           :    $the_namespace = "bw\\toys";
                                                       break;
                         case "bw_widgets"        :    $the_namespace = "bw\\wdgt";
                                                       break;
                         case "bw_objects"        :    $the_namespace = "bw\\obj";
                                                       break;
                         default                  :    $the_namespace = "bw\\";
                    } // switch
				$the_extension = \substr( $the_next_entry, \strripos( $the_next_entry, "." ) + 1 );
				switch ( $the_extension ) {
					case "php"	:	$GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\$the_namespace\\$the_next_entry" ); break;
					case "ico"	:	$GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\bw\tags\\BW_Icon" ); break;
					case "svg"	:	$return_me .= "\n" . $GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_svg( "$the_top_directory/$the_next_entry", "insert" ); break;
					case "css"	:	$return_me .= "\n" .  $GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_css_file( "$with_this_path/$the_next_entry", "inline" ); break;
					case "apng"	:
					case "bmp"	:
					case "gif"	:
					case "jpg"	:
					case "jpeg"	:
					case "png"	:
					case "webp"	:	$GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\bw\tags\\BW_Image_Tag" );
									$the_tag = new \bw\tags\BW_Image_Tag( "inline", $the_next_entry );
									$return_me .= "\n" . $the_tag->get_my_node(); break;
					case "ico"	:	$GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\bw\tags\\BW_Icon" );
									$the_tag = new \bw\tags\BW_Icon( $the_next_entry );
									$return_me .= "\n" . $the_tag->get_my_node(); break;
					case "pdf"	:	$GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\bw\tags\\BW_PDF_Object" );
									$the_tag = new \obj\BW_PDF_Object( $the_next_entry );
									$return_me .= "\n" . $the_tag->get_my_node(); break;
					case "txt"	:	$GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\bw\wraps\\BW_Pre_Tag" );
									$the_tag = new \bw\wraps\BW_Pre_Tag( $the_next_entry );
									$return_me .= "\n" . $the_tag->get_my_node(); break;
					case "zip"	:	$GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\obj\\BW_Zip_Object" );
									$the_tag = new \bw\tags\BW_Zip_Object( $the_next_entry );
									$return_me .= "\n" . $the_tag->get_my_node(); break;
					case "mp3"	:
					case "ogg"	:
					case "wav"	:	$GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\bw\tags\\BW_Audio_Tag" );
									$the_tag = new \bw\tags\BW_Audio_Tag( $the_next_entry );
									$return_me .= "\n" . $the_tag->get_my_node(); break;
					case "mp4"	:
					case "mpg"	:
					case "mpeg"	:
					case "webm"	:	$GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\bw\tags\\BW_Video_Tag" );
									$the_tag = new \bw\tags\BW_Video_Tag( $the_next_entry );
									$return_me .= "\n" . $the_tag->get_my_node(); break;
					case "js"		:	$GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_class( "\\bw\tags\\BW_Script_Tag", "inline" );
									$the_tag = new \bw\tags\BW_Script_Tag( $the_next_entry );
									$return_me .= "\n" . $the_tag->get_my_node(); break;
					default		:	$return_me .= "\n##!-------------- $the_next_entry -------------->\n";
				} // switch
			} // while
		} else {
			$GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_exception( "\\bw\errex\\BW_No_Such_Directory_Error" );
			throw new BW_No_Such_Directory_Error( $the_directory_path );
		}
		if ( $html_or_return === "return" ) {
			return $return_me;
		} else {
			$GLOBALS[ "CODEPAGES" ]->put( $the_pagename, $return_me );
		}
	}
     public function existify_the_svg( $with_this_filename, $black_box_return_or_insert = "black_box" ) {

		$the_pagename = \str_replace( "/", "_", $with_this_filename );
		if ( $GLOBALS[ "FILES_IN_PROCESS" ]->hasKey( $with_this_filename ) ) {
			return TRUE;
		}
          if ( $GLOBALS[ "FILES_IN_PROCESS" ]->hasKey( $with_this_filename ) ) {
               return TRUE;
          }
          if ( ! \file_exists( $with_this_filename ) ) {
               return FALSE;
          }
          try {
               if ( $black_box_return_or_insert === "black_box" ) {
                    $the_svg = \file_get_contents( $with_this_filename );
                    $GLOBALS[ "MY_BODY_TAG" ]->set_my_innerHTML( $the_svg );
                    $GLOBALS[ "FILES_IN_PROCESS" ]->put( $with_this_filename, "body_tag" );
               } else if ( $black_box_return_or_insert === "return" ) {
                    $the_svg = \file_get_contents( $with_this_filename );
                    $GLOBALS[ "FILES_IN_PROCESS" ]->put( $with_this_filename, "return" );
                    return $the_svg;
               } else if ( $black_box_return_or_insert === "insert" ) {
				$the_svg = "\##svg id=\"the_{$the_pagename}_svg\">
					\n##use id=\"the_{$the_pagename}_use\" href=\"#the_{$the_pagename}_group\" />\n"
					. "\n##/svg>\n";
                    $GLOBALS[ "FILES_IN_PROCESS" ]->put( $with_this_filename, "insert" );
				return $the_svg;
               }
          } catch( Exception $yes_maybe ) {
              $GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_exception( "BW_Missing_SVG_File_Exception" );
              throw new \bw\errex\BW_Missing_SVG_File_Exception( "missing_svg_file" );
          }
     }

     public function existify_the_exception( $with_this_name ) {
			if ( $GLOBALS[ "FILES_IN_PROCESS" ]->hasKey( $with_this_name ) ) {
				return TRUE;
			}
          if ( ! \class_exists( "\\bw\errex\\$with_this_name" ) ) {
               if ( \file_exists( "bw_errors\\$with_this_name.php" ) ) {
                    include "bw_errors\\$with_this_name.php";
               } else {
                    include "bw_errors\\BW_Exceptions.php";
               }
          }
     }

     public function existify_the_css_file( $with_this_filename_including_path, $head_tag_return_or_inline ) {
		$the_filename = \substr( $with_this_filename_including_path, \strrpos( $with_this_filename_including_path, "/" ) + 1 );
          if( \file_exists( $with_this_filename_including_path ) ) {
			if ( $GLOBALS[ "FILES_IN_PROCESS" ]->hasKey( $the_filename ) ) {
				return TRUE;
			}
               $the_new_link = "\n##link rel='stylesheet' href='$with_this_filename_including_path'>\n";
               if ( $head_tag_return_or_inline === "head_tag" ) {
                    $GLOBALS[ "MY_HEAD_TAG" ]->set_my_innerHTML( $the_new_link );
				$return_me = TRUE;
				$GLOBALS[ "FILES_IN_PROCESS" ]->put( $the_filename, "head_tag" );
               } else if ( $head_tag_return_or_inline === "return" ) {
                    $return_me = $the_new_link;
				$GLOBALS[ "FILES_IN_PROCESS" ]->put( $the_filename, "return" );
               } else if ( $head_tag_return_or_inline === "inline" ) {
				$GLOBALS[ "FILES_IN_PROCESS" ]->put( $the_filename, "inline style attribute" );
				$return_me = "\n##style>" . \file_get_contents( $with_this_filename_including_path ) . "\n##/style>";
               }
			return $return_me;
          } else {
               $GLOBALS[ "MY_TOOLBOX" ]->get( "BW_Existifier" )->existify_the_exception( "BW_Missing_CSS_File_Exception" );
               throw new \bw\errex\BW_Missing_CSS_File_Exception( "bw_missing_css_file_handler" );
          }
     }
}
