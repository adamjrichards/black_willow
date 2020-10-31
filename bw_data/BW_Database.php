<?php

namespace black_willow\bw_data;

class BW_Database extends \black_willow\bw_core\_BW_SOURCE {

     public $my_schema = "base_code";
     protected $my_prefix = "bcode_";
     protected $my_hostname = "lotus";
     protected $my_port_number = 3306;
     private $my_username = "lotus";
     private $my_password = "c5zhhrn=qkhy";
     public $my_socket = "MYSQL";
     public $my_namespace = "Raingarden";
     protected $my_connection_string;

     function __construct( $the_params_map ) {
          if ( $the_params_map[ $the_schema ] !== "" ) {
               $this->my_schema = $the_params_map[ $the_schema ];
          }
          if ( $the_params_map[ $the_prefix ] !== "" ) {
               $this->my_prefix = $the_params_map[ $the_prefix ];
          }
          if ( $the_params_map[ $the_hostname ] !== "" ) {
               $this->my_hostname = $the_params_map[ $the_hostname ];
          }
          if ( $the_params_map[ $the_port_number ] !== "" ) {
               $this->my_port_number = $the_params_map[ $the_port_number ];
          }
          if ( $the_params_map[ $the_username ] !== "" ) {
               $this->my_username = $the_params_map[ $the_username ];
          }
          if ( $the_params_map[ $the_password ] !== "" ) {
               $this->my_password = $the_params_map[ $the_password ];
          }
          if ( $the_params_map[ $the_socket ] !== "" ) {
              $this->my_socket = $the_params_map[ $the_socket ];
          }
          if ( $the_params_map[ $the_namespace ] !== "" ) {
              $this->my_namespace = $the_params_map[ $the_namespace ];
          }
          parent::__construct( $the_params_map );
     }
}

class BW_Connection_String {

     public $my_schema = "base_code";
     protected $my_hostname = "lotus";
     protected $my_port_number = 3306;
     private $my_username = "lotus";
     private $my_password = "c5zhhrn=qkhy";
     public $my_socket = "MYSQL";
     public $my_persistence = TRUE;
     private $my_connection_string = "";

     function __construct( $the_params_map ) {
          $this->my_hostname = $the_params_map[ "the_hostname" ];
          $this->my_username = $the_params_map[ "the_username" ];
          $this->my_password = $the_params_map[ "the_password" ];
          $this->my_schema = $the_params_map[ "the_schema" ];
          $this->my_port_number = $the_params_map[ "the_port_number" ];
          $this->my_persistence = $the_params_map[ "the_persistence" ];
          $this->my_connection_string =  "'$this->my_persistence$this->my_hostname', '$this->my_username', '$this->my_password', '$this->my_schema', $this->my_port_number";
     }
     function get_my_connection_string() {
          return $this->my_connection_string;
     }
}

class BW_Database_Connection  {

     private $my_connection = "";

     function __construct( $the_params_map ) {

          if( $the_params_map[ "the_persistence" ] === TRUE ) {
               $the_hostname = "p:" . $the_params_map[ 'the_hostname' ];
          } else {
               $the_hostname = $the_params_map[ 'the_hostname' ];
          }
          $my_connection_string = new Connection_String( $the_params_map );
          $my_connection_string = $my_connection_string->get_my_connection_string();
          $my_connection = new mysqli( $the_hostname,
                                       $the_params_map[ 'the_username' ],
                                       $the_params_map[ 'the_password' ],
                                       $the_params_map[ 'the_schema' ],
                                       $the_params_map[ 'the_port_number' ] );
     }
     function get_my_connection() {
          return $this->my_connection;
     }
}

function get_me_a_new_database_connection( $the_params_map = DEFAULT_DATABASE_CONNECTION_PARAMETERS ) {

     if( ! is_array( $the_params_map[0] ) ) {
          $the_new_parameter_array = [
          'the_hostname' => $the_params_map[ 0 ],
          'the_username' => $the_params_map[ 1 ],
          'the_password' => $the_params_map[ 2 ],
          'the_schema'=> $the_params_map[ 3 ],
          'the_port_number' => $the_params_map[ 4 ],
          'the_socket' => $the_params_map[ 5 ],
          'the_persistence' => $the_params_map[ 6 ] ];
     }
     $the_connection = new Database_Connection( $the_new_parameter_array );
     return $the_connection;
}
const DEFAULT_DATABASE_CONNECTION_PARAMETERS = [
          'the_hostname' => 'lotus',
          'the_username' => 'lotus',
          'the_password' => 'c5zhhrn=qkhy',
          'the_schema'=>'base_code',
          'the_port_number' => 3306,
          'the_socket' => 'MYSQL',
          'the_persistence' => TRUE ];

$the_new_database_connection = get_me_a_new_database_connection( DEFAULT_DATABASE_CONNECTION_PARAMETERS );



