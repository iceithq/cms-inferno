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
class Menus extends MY_UserController
{
  var $admin_service;
  var $menu_model;

  var $form_validation;
  var $layout;
  var $input;

  function __construct()
  {
    parent::__construct();
    $this->load->model('menu_model');
    $this->load->library('admin_service');
  }

  function index()
  {
    // $data['menus'] = $this->menu_model->find_all();
    $data['menus'] = $this->admin_service->get_menus();
    $this->layout->view('menus/index', $data);
  }

  function add()
  {
    if ($this->input->post()) {
      $menu = menu_form();
      menu_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->menu_model->save($menu);
        redirect('menus');
      }
    }
    $this->layout->view('menus/add');
  }

  function edit($id)
  {
    if ($this->input->post()) {
      $menu = menu_form();
      menu_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->menu_model->update($menu, $id);
        redirect('menus');
      }
    }
    $data['menu'] = $this->menu_model->read($id);
    $this->layout->view('menus/edit', $data);
  }

  function delete($id)
  {
    $this->menu_model->delete($id);
    redirect('menus');
  }
}
