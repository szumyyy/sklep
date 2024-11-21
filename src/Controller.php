<?php

declare(strict_types=1);

namespace App;

require_once("src/Exception/ConfigurationException.php");

use App\Exception\ConfigurationException;
use App\Exception\NotFoundException;

require_once("Database.php");
require_once("View.php");

class Controller
{
  private const DEFAULT_ACTION = 'list';

  private static array $configuration = [];

  private Database $database;
  private array $request;
  private View $view;

  public static function initConfiguration(array $configuration): void
  {
    self::$configuration = $configuration;
  }

  public function __construct(array $request)
  {
    if (empty(self::$configuration['db'])) {
      throw new ConfigurationException('Configuration error');
    }
    $this->database = new Database(self::$configuration['db']);

    $this->request = $request;
    $this->view = new View();
  }

  public function run(): void
  {
    switch ($this->action()) {
      case 'create':
        $page = 'create';

        $data = $this->getRequestPost();
        if (!empty($data)) {
          $productData = [
            'name' => $data['name'],
            'description' => $data['description']
          ];
          dump($productData);
          $this->database->createProduct($productData);
          header('Location: /sklep/?before=created');
          exit;
        }

        break;
      case 'show':
        $page = 'show';

        $data = $this->getRequestGet();
        $productId = (int) ($data['id'] ?? null);

        if (!$productId) {
          header('Location: /?error=missingProductId');
          exit;
        }

        try {
          $product = $this->database->getProduct($productId);
        } catch (NotFoundException $e) {
          header('Location: /?error=productNotFound');
          exit;
        }

        $viewParams = [
          'product' => $product
        ];
        break;
      default:
        $page = 'list';
        $data = $this->getRequestGet();

        $viewParams = [
          'products' => $this->database->getProducts(),
          'before' => $data['before'] ?? null,
          'error' => $data['error'] ?? null
        ];
        break;
    }

    $this->view->render($page, $viewParams ?? []);
  }

  private function action(): string
  {
    $data = $this->getRequestGet();
    return $data['action'] ?? self::DEFAULT_ACTION;
  }

  private function getRequestGet(): array
  {
    return $this->request['get'] ?? [];
  }

  private function getRequestPost(): array
  {
    return $this->request['post'] ?? [];
  }
}
