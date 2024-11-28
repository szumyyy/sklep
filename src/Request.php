<?php

declare(strict_types=1);

namespace App;

class Request
{
  private array $get = [];
  private array $post = [];
  private array $server = [];

  public function __construct(array $get, array $post, array $server, array $files)
  {
    $this->get = $get;
    $this->post = $post;
    $this->server = $server;
    $this->files = $files;
  }

  public function isPost(): bool
  {
    return $this->server['REQUEST_METHOD'] === 'POST';
  }

  public function isGet(): bool
  {
    return $this->server['REQUEST_METHOD'] === 'GET';
  }

  public function hasPost(): bool
  {
    return !empty($this->post);
  }

  public function getParam(string $name, $default = null)
  {
    return $this->get[$name] ?? $default;
  }

  public function postParam(string $name, $default = null)
  {
    return $this->post[$name] ?? $default;
  }

  public function fileParam(string $name, $default = null)
    {
        return $this->files[$name] ?? $default;
    }
}