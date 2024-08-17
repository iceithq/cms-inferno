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
class Uploads extends MY_UserController
{

  var $upload_model;
  var $folder_model;

  var $input;
  var $layout;
  var $form_validation;
  var $upload;

  function __construct()
  {
    parent::__construct();
    $this->load->model('upload_model');
    $this->load->model('folder_model');
  }

  function index()
  {
    $data['folders'] = $this->folder_model->find_all();
    $data['uploads'] = $this->upload_model->find_no_folder();
    $this->layout->view('uploads/index', $data);
  }

  function add()
  {
    if ($this->input->post()) {
      $upload = upload_form();
      upload_form_validate();
      $this->load->library('upload', upload_config());
      if ($this->form_validation->run() != FALSE) {
        if ($this->upload->do_upload('userfile')) {
          $upload_data = $this->upload->data();
          $image_url = $upload_data['file_name'];
          $upload['url'] = $image_url;
          $image_file = FCPATH . 'uploads/' . $image_url;
          // resize_image($image_file, $upload_data['file_type']);
        } else {
          // print_pre($this->upload->display_errors());
        }
        // print_pre($upload);
        $this->upload_model->save($upload);
        redirect('uploads');
      } else {
        print_pre(validation_errors());
      }
    }
    $this->layout->view('uploads/add');
  }

  function add_minimal($folder_id)
  {
    if ($this->input->post()) {
      $upload = upload_minimal_form($folder_id);
      // upload_form_validate();
      $this->load->library('upload', upload_config());
      // if ($this->form_validation->run() != FALSE) {
      if ($this->upload->do_upload('userfile')) {
        $upload_data = $this->upload->data();
        $image_url = $upload_data['file_name'];
        $upload['url'] = $image_url;
        $upload['title'] = $image_url;
        $image_file = FCPATH . 'media/' . $image_url;
        // resize_image($image_file, $upload_data['file_type']);

        $this->upload_model->save($upload);
        redirect('folders/show/' . $folder_id);
      } else {
        // print_pre($this->upload->display_errors());
      }
      // print_pre($upload);
      // $this->upload_model->save($upload);
      // redirect('uploads');
      // } else {
      //   print_pre(validation_errors());
      // }
    }
    $this->layout->view('uploads/add');
  }

  function edit($id)
  {
    if ($this->input->post()) {
      $upload = upload_form();
      upload_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->upload_model->update($upload, $id);
        redirect('uploads');
      }
    }
    $data['upload'] = $this->upload_model->read($id);
    $this->layout->view('uploads/edit', $data);
  }

  function delete($id)
  {
    $this->upload_model->delete($id);
    redirect('uploads');
  }
}
