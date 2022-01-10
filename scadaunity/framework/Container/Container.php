<?php
namespace ScadaUnity\Framework\Container;

use Psr\Container\ContainerInterface;
use ReflectionClass;
use ScadaUnity\Framework\Container\Exception\DependencyIsNotInstanciableException;

class Container implements ContainerInterface
{
    private array $instance = [];

    public function set($id, $concrete = null)
    {
        if ($concrete === null) {
            $concrete = $id;
        }

        $this->instance[$id] = $concrete;
    }

    public function get(string $id)
    {
        if (!$this->has($id)) {
            $this->set($id);
        }
        $concrete = $this->instance[$id];
        return $this->resolve($concrete);
    }

    public function has(string $id):bool
    {
        return isset($this->instance[$id]);
    }

    private function resolve($concrete){
        $reflection = new ReflectionClass($concrete);
        if (!$reflection->isInstantiable()) {
            throw new \DependencyIsNotInstanciableException("Classe {$concrete} não pode ser instanciada", 500);

        }
    }

}
