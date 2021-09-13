<?php 
//定義介面 
interface User{ 
function getDiscount(); 
function getUserType(); 
} 
//VIP使用者 介面實現 
class VipUser implements User{ 
// VIP 使用者折扣係數 
private $discount = 0.8; 
function getDiscount() { 
return $this->discount; 
} 
function getUserType() { 
return "VIP使用者"; 
} 
} 
class Goods{ 
var $price = 100; 
var $vc; 
//定義 User 介面型別引數，這時並不知道是什麼使用者 
function run(User $vc){ 
$this->vc = $vc; 
$discount = $this->vc->getDiscount(); 
$usertype = $this->vc->getUserType(); 
echo $usertype."商品價格：".$this->price*$discount; 
} 
} 
$display = new Goods(); 
$display ->run(new VipUser); //可以是更多其他使用者型別 
