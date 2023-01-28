<?php

Class Navbar {
    var $navbar_data = array();

    function set($name, $value)
    {
        $this->navbar_data[$name] = $value;
    }

    function load($navbar = '', $view = '', $view_data = array(), $return = FALSE)
    {
        $this->CI =& get_instance();
        $this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
        return $this->CI->load->view($navbar, $this->navbar_data, $return);
    }

}