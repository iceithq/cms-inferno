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
class Posts extends MY_UserController
{

  var $post_model;

  var $input;
  var $layout;
  var $form_validation;

  function __construct()
  {
    parent::__construct();
    $this->load->model('post_model');
  }

  function index()
  {
    $data['posts'] = $this->post_model->find_all();
    $this->layout->view('posts/index', $data);
  }

  function add()
  {
    if ($this->input->post()) {
      $post = post_form();
      post_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->post_model->save($post);
        redirect('posts');
      }
    }
    $this->layout->view('posts/add');
  }

  function edit($id)
  {
    if ($this->input->post()) {
      $post = post_form();
      post_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->post_model->update($post, $id);
        redirect('posts');
      }
    }
    $data['post'] = $this->post_model->read($id);
    $this->layout->view('posts/edit', $data);
  }

  function delete($id)
  {
    $this->post_model->delete($id);
    redirect('posts');
  }
}
