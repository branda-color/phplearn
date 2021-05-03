<?php
class Container
{
    protected $bindings = [];
    //綁定接口和生成實例的函數
    public function bind($abstract, $concrete = null, $shared = false)
    {
        if (!$concrete instanceof Closure) {
            $concrete  = $this->getClosure($abstract, $concrete);
        }
        $this->bindings[$abstract] = compact('concrete', 'shared');
    }

    //默認生成實例的回調函數
    protected function getClosure($abstract, $concrete)
    {
        return function ($c) use ($abstract, $concrete) {
            $method = ($abstract == $concrete) ? 'build' : 'make';
            return $c->method($concrete);
        };
    }

    public function make($abstract)
    {
        $concrete = $this->getConcrete($abstract);
        if ($this->isBuildable($concrete, $abstract)) {
            $object = $this->build($concrete);
        } else {
            $object = $this->make($concrete);
        }
        return $object;
    }

    protected function isBuildable($concrete, $abstract)
    {

        return $concrete === $abstract || $concrete instanceof Closure;
    }

    protected function getConcrete($abstract)
    {
        if (!isset($this->bindings[$abstract])) {

            return $abstract;
        }
        return $this->bindings[$abstract]['concrete'];
    }

    //實例化對象
    public function build($concrete)
    {

        if ($concrete instanceof Closure) {
            return $concrete($this);
        }

        //讀取某個class內的方法或屬性(用映射的)
        $reflector = new ReflectionClass($concrete);

        if (!$reflector->isInstantiable()) { //isInstantiable檢查類是否可實例化
            echo $message = "target [$concrete] is not instantible";
        }

        $constructor = $reflector->getConstructor(); //獲取已反射的纇的構造函數

        if (is_null($constructor)) {
            return new $concrete;
        }

        $despendencies = $constructor->getParameters(); //獲取已反射的纇的參數
        $instances = $this->getDependencies($despendencies);
        return $reflector->newInstanceArgs($instances); //創建一個類的新實例，給出的參數將傳遞到纇的構造函數
    }

    protected function getDependencies($parameters)
    {
        $despendencies = [];
        foreach ($parameters as $parameter) {
            $despendency = $parameter->getClass();
            if (is_null($despendency)) {
                $despendencies[] = null;
            } else {
                $despendencies[] = $this->resloveClass($parameter);
            }
            return (array)$despendencies;
        }
    }
    protected function resloveClass(ReflectionParameter $parameter)
    {
        return $this->make($parameter->getClass()->name);
    }
}

class Traveller
{
    protected $trafficTool;
    public function __construct(Visit $trafficTool)
    {
        $this->trafficTool = $trafficTool;
    }

    public function visitTibet()
    {
        $this->trafficTool->go();
    }
}

//實例化Ioc容器
$app = new Container();

//完成容器填充
$app->bind("Visit", "Train");
$app->bind("traveller", "Traveller");
//通過容器實現依賴注入，完成類的實例化
$tra = $app->make("traveller");
$tra->visitTibet();
