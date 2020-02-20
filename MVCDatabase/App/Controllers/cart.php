<?php 
    namespace App\Controllers;
    use Core\Controller;
    use App\Models\cart as cartModel;
    use Core\View;
    use App\Models\Home as homeModel;


    class cart extends \Core\Controller {
        
        public function __construct() {
            $menuContentData = homeModel::getDataFromDB('cms_pages');
            $categoryData = homeModel::getDataFromDB('categories');
            $parentCategories = homeModel::getDataFromDB('parentCategory');
            View::renderTemplate('menu.html', ['menuLabels' => $menuContentData, 'categories' => $categoryData, 'parentCategories' => $parentCategories]);
        }


        public function addToCart() {
            $cartDetail = (array)json_decode($_POST['cartDetails']);
            $cartData = cartModel::isCartExistAndActive($_SESSION['userID']);

            if($cartData != null) {
                $_SESSION['cartID'] = $cartData['cartID'];
                $isProductExist = cartModel::isProductExists($cartDetail['productID']);
                
                if($isProductExist != null) {
                    $price = ($cartData['totalAmount'] + ($cartDetail['quantity'] * $cartDetail['totalAmount']));
                    $updateCartData = cartModel::prepareUpdateCartData($price);
                    $updateCartItemData = cartModel::prepareUpdateCartItemData($cartDetail['quantity'] + $isProductExist['quantity']);
                    cartModel::updateCartItemData('cart', $updateCartData, 'cartID', $_SESSION['cartID']);
                    cartModel::updateCartItemData('cartitem', $updateCartItemData, 'productID' ,$cartDetail['productID']);
                } else {
                    $cartItemData = cartModel::prepareCartItemData($_SESSION['cartID'], $cartDetail);
                    cartModel::insertCartData('cartitem', $cartItemData);  
                    $updateData = cartModel::prepareUpdateCartData(($cartDetail['quantity'] * $cartDetail['totalAmount']) + $cartData['totalAmount']);
                    cartModel::updateCartItemData('cart', $updateData, 'cartID', $_SESSION['cartID']);
                }
            } else {
                $cartData = cartModel::prepareCartData($_SESSION['userID'], $cartDetail);
                $cartID = cartModel::insertCartData('cart', $cartData);
                $cartItemData = cartModel::prepareCartItemData($cartID, $cartDetail);
                cartModel::insertCartData('cartitem', $cartItemData);
            }
        }

        public function displayCart() {
            View::renderTemplate("/User/viewCart.html");
        }

    }


?>
