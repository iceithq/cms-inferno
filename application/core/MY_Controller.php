<?php

/**
 * cmsInferno
 *
 * Simply blog
 *
 * Copyright (c) 2024 cmsInferno. All rights reserved.
 *
 * cmsInferno and its user interface are protected by trademark
 * and other pending or existing intellectual property
 * rights in the Philippines.
 */
class MY_Controller extends CI_Controller
{

  var $layout;
  var $output;

  function __construct()
  {
    parent::__construct();
    $this->layout->set_theme(config_item('theme'));
    $this->layout->set_layout('layout');
    $this->output->enable_profiler(config_item('enable_profiler', false));
    $this->load->database();
  }
}

class MY_UserController extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->layout->set_theme(config_item('admin_theme'));
    $this->layout->set_layout('admin_layout');
  }
}
