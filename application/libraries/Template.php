<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Template {

   private $Theme;
   private $Layout;
   private $data = array();

   function __construct(){
        $this->CI =& get_instance();
        $this->Theme = 'theme-sufee';
        $this->Layout = 'landing';
   }

   function _AppView($contentView=null){
      return $contentView.'.php';
   }
   
   function _GetThemeLayout($theme=null, $layout=null){
      return $theme.'/'.$layout.'/';
   }

   // NATIVE LAYOUT
   function DisplayView( $LayoutType = 'dashboard', $FileContentPath = null , $data=null ){
      /* 
      * SPLIT ELEMENT INTO EACH PARTS
      * 
      * 1.META CHARSET & HTTP EQUIV
      * 2.META NAME
      * 3.FAVICON
      * 4.CSS VENDOR
      * 5.CSS MAIN
      * 6.PANEL LEFT
      * 7.PANEL RIGHT - HEADER
      * 8.PANEL RIGHT - HEADER USER INFO
      * 9.BREADCRUMB
      * 10.CONTENT
      * 11.JS VENDOR
      * 12.JS CUSTOM LOADED
      */

      // DEFINE EACH ELEMENT
      define('LAYOUT','Layout');
      define('META_CHARSET','meta_charset');
      define('META_NAME','meta_name');
      define('FAVICON','favicon');
      define('CSS_VENDOR','css_vendor');
      define('CSS_MAIN','css_main');
      define('SIDEBAR','sidebar');
      define('HEADER','header_search');
      define('HEADER_USER','header_user_info');
      define('BREADCRUMB','breadcrumb');
      define('CONTENT','content-template');
      define('JS_VENDOR','js_vendor');
      define('JS_CUSTOM','js_custom');

      // Check if compatible layout type
      if($LayoutType == 'dashboard' ) {
         $layout = 'dashboard';
         $data['HEADER_USER'] = $this->CI->load->view($this->_GetThemeLayout($this->Theme,$layout).HEADER_USER, $data, TRUE);
      } else {
         $layout = 'landing';
         $data['HEADER_USER'] = $this->CI->load->view($this->_GetThemeLayout($this->Theme,$layout).HEADER_USER, $data, TRUE);
      } 
      
      // SPLIT
      $data['META_CHARSET'] = $this->CI->load->view($this->_GetThemeLayout($this->Theme,$layout).META_CHARSET, $data, TRUE);
      $data['META_NAME'] = $this->CI->load->view($this->_GetThemeLayout($this->Theme,$layout).META_NAME, $data, TRUE);
      $data['FAVICON'] = $this->CI->load->view($this->_GetThemeLayout($this->Theme,$layout).FAVICON, $data, TRUE);
      $data['CSS_VENDOR'] = $this->CI->load->view($this->_GetThemeLayout($this->Theme,$layout).CSS_VENDOR, $data, TRUE);
      $data['CSS_MAIN'] = $this->CI->load->view($this->_GetThemeLayout($this->Theme,$layout).CSS_MAIN, $data, TRUE);
      $data['SIDEBAR'] = $this->CI->load->view($this->_GetThemeLayout($this->Theme,$layout).SIDEBAR, $data, TRUE);
      $data['HEADER'] = $this->CI->load->view($this->_GetThemeLayout($this->Theme,$layout).HEADER, $data, TRUE);
      // $data['BREADCRUMB'] = $this->CI->load->view($this->_GetThemeLayout($this->Theme,$layout).BREADCRUMB, $data, TRUE);
      $data['JS_VENDOR'] = $this->CI->load->view($this->_GetThemeLayout($this->Theme,$layout).JS_VENDOR, $data, TRUE);
      // $data['JS_CUSTOM'] = $this->CI->load->view($this->_GetThemeLayout($this->Theme,$layout).JS_CUSTOM, $data, TRUE);
      
      // DYNAMIC CONTENT VIEW
      $data['CONTENT'] = $this->CI->load->view($this->_AppView($FileContentPath), $data, TRUE);

      // RENDER
      return $this->CI->load->view($this->_GetThemeLayout($this->Theme,$layout).LAYOUT, $data);

   }




}

/* End of file Templates.php */