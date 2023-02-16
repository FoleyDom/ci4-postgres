<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

class Pages extends BaseController
{
  public function index($page = 'index')
  {

    $data['title'] = ucfirst($page);

    return view('templates/header', $data)
      . view('pages/' . $page)
      . view('templates/footer');
  }

  public function view($page = 'This is passed dynamically')
  {
    if (!is_file(APPPATH . '/Views/pages/' . $page . '.php')) {
      throw new PageNotFoundException($page);
    }

    $data['title'] = ucfirst($page);

    return view('templates/header', $data)
      . view('pages/' . $page)
      . view('templates/footer');
  }
}
