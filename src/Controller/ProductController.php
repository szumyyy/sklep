<?php

declare(strict_types=1);

namespace App\Controller;

use App\Exception\NotFoundException;

class ProductController extends AbstractController
{
  public function createAction()
  {
    if ($this->request->hasPost()) {
      $productData = [
        'name' => $this->request->postParam('name'),
        'description' => $this->request->postParam('description')
      ];
      $this->database->createProduct($productData);
      $this->redirect('/sklep/', ['before' => 'created']);
    }

    $this->view->render('create');
  }

  public function showAction()
  {
    $productId = (int) $this->request->getParam('id');

    if (!$productId) {
      $this->redirect('/sklep/', ['error' => 'missingProductId']);
    }

    try {
      $product = $this->database->getProduct($productId);
    } catch (NotFoundException $e) {
      $this->redirect('/sklep/', ['error' => 'productNotFound']);
    }

    $this->view->render(
      'show',
      ['product' => $product]
    );
  }

  public function listAction()
  {
    $this->view->render(
      'list',
      [
        'products' => $this->database->getProducts(),
        'before' => $this->request->getParam('before'),
        'error' => $this->request->getParam('error')
      ]
    );
  }

  public function editAction()
  {

    if ($this->request->isPost()) {
      $productId = (int) $this->request->postParam('id');
      $productData = [
        'name' => $this->request->postParam('name'),
        'description' => $this->request->postParam('description')
      ];
      $this->database->editProduct($productId, $productData);
      $this->redirect('/sklep/', ['before' => 'edited']);
    }

    $productId = (int) $this->request->getParam('id');
    if (!$productId) {
      $this->redirect('/sklep/', ['error' => 'missingProductId']);
    }

    try {
      $product = $this->database->getProduct($productId);
    } catch (NotFoundException $e) {
      $this->redirect('/sklep/', ['error' => 'productNotFound']);
    }

    $this->view->render('edit', ['product' => $product]);
  }
}
