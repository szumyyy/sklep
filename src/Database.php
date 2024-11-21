<?php

declare(strict_types=1);

namespace App;

require_once("Exception/StorageException.php");
require_once("Exception/NotFoundException.php");

use App\Exception\ConfigurationException;
use App\Exception\StorageException;
use App\Exception\NotFoundException;
use PDO;
use PDOException;
use Throwable;

class Database
{
  private PDO $conn;

  public function __construct(array $config)
  {
    try {
      $this->validateConfig($config);
      $this->createConnection($config);
    } catch (PDOException $e) {
      throw new StorageException('Connection error');
    }
  }

  public function getProduct(int $id): array
  {
    try {
      $query = "SELECT * FROM products WHERE id = $id";
      $result = $this->conn->query($query);
      $product = $result->fetch(PDO::FETCH_ASSOC);
    } catch (Throwable $e) {
      throw new StorageException('Nie udało się pobrać produktu', 400, $e);
    }

    if (!$product) {
      throw new NotFoundException("Produkt o id: $id nie istnieje");
    }

    return $product;
  }

  public function getProducts(): array
  {
    try {
      $query = "SELECT * FROM products";
      $result = $this->conn->query($query);
      return $result->fetchAll(PDO::FETCH_ASSOC);
    } catch (Throwable $e) {
      throw new StorageException('Nie udało się pobrać danych o produktach', 400, $e);
    }
  }

  public function createProduct(array $data): void
  {
    try {
      $name = $this->conn->quote($data['name']);
      $description = $this->conn->quote($data['description']);
      $price = $this->conn->quote($data['price']);
      $stock = $this->conn->quote($data['stock']);
      $image = $this->conn->quote($data['image']);
      $created_at = $this->conn->quote(date('Y-m-d H:i:s'));
      $updated_at = $this->conn->quote(date('Y-m-d H:i:s'));

      $query = "
        INSERT INTO products(name, description, price, stock, image, created_at, updated_at)
        VALUES($name, $description, $price, $stock, $image, $created_at, $updated_at)
      ";

      $this->conn->exec($query);
    } catch (Throwable $e) {
      throw new StorageException('Nie udało się utworzyć nowego produktu', 400, $e);
    }
  }

  private function createConnection(array $config): void
  {
    $dsn = "mysql:dbname={$config['database']};host={$config['host']}";
    $this->conn = new PDO(
      $dsn,
      $config['user'],
      $config['password'],
      [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      ]
    );
  }

  private function validateConfig(array $config): void
  {
    if (
      empty($config['database'])
      || empty($config['host'])
      || empty($config['user'])
      || empty($config['password'])
    ) {
      throw new ConfigurationException('Storage configuration error');
    }
  }
}
