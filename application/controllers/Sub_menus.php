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
class Sub_menus extends MY_UserController
{

  var $sub_menu_model;
  var $menu_model;

  var $input;
  var $layout;
  var $form_validation;

  function __construct()
  {
    parent::__construct();
    $this->load->model('sub_menu_model');
    $this->load->model('menu_model');
  }

  // function index() {
  //   $data['sub_menus'] = $this->sub_menu_model->find_all();
  //   $this->layout->view('sub_menus/index', $data);
  // }

  function add()
  {
    if ($this->input->post()) {
      $sub_menu = sub_menu_form();
      sub_menu_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->sub_menu_model->save($sub_menu);
        redirect('menus');
      }
    }
    $menus = $this->menu_model->find_all();
    $data['menus'] = menus_for_dropdown($menus);
    $this->layout->view('sub_menus/add', $data);
  }

  function edit($id)
  {
    if ($this->input->post()) {
      $sub_menu = sub_menu_form();
      sub_menu_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->sub_menu_model->update($sub_menu, $id);
        redirect('menus');
      }
    }
    $data['sub_menu'] = $this->sub_menu_model->read($id);
    $menus = $this->menu_model->find_all();
    $data['menus'] = menus_for_dropdown($menus);
    $this->layout->view('sub_menus/edit', $data);
  }

  function delete($id)
  {
    $this->sub_menu_model->delete($id);
    redirect('sub_menus');
  }
}
