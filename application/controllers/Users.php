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
class Users extends MY_UserController
{
  var $user_model;

  var $layout;
  var $input;
  var $form_validation;

  function __construct()
  {
    parent::__construct();
    $this->load->model('user_model');
  }

  function index()
  {
    $data['users'] = $this->user_model->find_all();
    $this->layout->view('users/index', $data);
  }

  function add()
  {
    if ($this->input->post()) {
      $user = user_form();
      user_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->user_model->save($user);
        redirect('users');
      }
    }
    $this->layout->view('users/add');
  }

  function edit($id)
  {
    if ($this->input->post()) {
      $user = user_form();
      user_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->user_model->update($user, $id);
        redirect('users');
      }
    }
    $data['user'] = $this->user_model->read($id);
    $this->layout->view('users/edit', $data);
  }

  function delete($id)
  {
    $this->user_model->delete($id);
    redirect('users');
  }
}
