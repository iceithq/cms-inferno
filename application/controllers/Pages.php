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
class Pages extends MY_UserController
{
  var $page_model;

  var $layout;
  var $input;
  var $form_validation;

  function __construct()
  {
    parent::__construct();
    $this->load->model('page_model');
  }

  function index()
  {
    $data['pages'] = $this->page_model->find_all();
    $this->layout->view('pages/index', $data);
  }

  function add()
  {
    if ($this->input->post()) {
      $page = page_form();
      page_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->page_model->save($page);
        redirect('pages');
      }
    }
    $this->layout->view('pages/add');
  }

  function edit($id)
  {
    if ($this->input->post()) {
      $page = page_form();
      page_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->page_model->update($page, $id);
        redirect('pages');
      }
    }
    $data['page'] = $this->page_model->read($id);
    $this->layout->view('pages/edit', $data);
  }

  function delete($id)
  {
    $this->page_model->delete($id);
    redirect('pages');
  }
}
