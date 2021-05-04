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
            return $c->$method($concrete);
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
            echo $message = "Target [$concrete] is not instantiable";
        }

        $constructor = $reflector->getConstructor(); //獲取已反射的纇的構造函數

        if (is_null($constructor)) {
            return new $concrete;
        }


        $dependencies = $constructor->getParameters(); //獲取已反射的纇的參數
        $instances = $this->getDependencies($dependencies);
        return $reflector->newInstanceArgs($instances); //創建一個類的新實例，給出的參數將傳遞到纇的構造函數
    }

    protected function getDependencies($parameters)
    {
        $dependencies = [];
        foreach ($parameters as $parameter) {
            $dependency = $parameter->getClass();
            if (is_null($dependency)) {
                $dependencies[] = NULL;
            } else {
                $dependencies[] = $this->resolveClass($parameter);
            }
        }

        return (array)$dependencies;
    }

    protected function resolveClass(ReflectionParameter $parameter)
    {
        return $this->make($parameter->getClass()->name);
    }
}
interface Pay
{
    public function pay();
}

class PayBill
{

    private $payMethod;

    public function __construct(Pay $payMethod)
    {
        $this->payMethod = $payMethod;
    }

    public function  payMyBill()
    {
        $this->payMethod->pay();
    }
}

//實例化Ioc容器
$app = new Container();
$app->bind("Pay", "Alipay"); //Pay 为接口， Alipay 是 class Alipay
$app->bind("tryToPayMyBill", "PayBill"); //tryToPayMyBill可以当做是Class PayBill 的服务别名

//通过字符解析，或得到了Class PayBill 的实例
$paybill = $app->make("tryToPayMyBill");

//因为之前已经把Pay 接口绑定为了 Alipay，所以调用pay 方法的话会显示 'pay bill by alipay '
$paybill->payMyBill();
