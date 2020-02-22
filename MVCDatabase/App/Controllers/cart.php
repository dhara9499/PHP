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
            if(isset($_SESSION['cartID'])) { //check if cart exist
                $productData = cartModel::isProductExists($cartDetail['productID']);
                $cartData = cartModel::getCartData($_SESSION['cartID']);
                if($productData != null) { //check if product exist
                    $quantity = $productData['quantity'] + $cartDetail['quantity'];
                    $preparedItemData = cartModel::prepareUpdateCartItemData($quantity);
                    cartModel::updateCartItemData('cartitem', $preparedItemData, 'productID', $productData['productID']);
                    $totalAmount = $cartData['totalAmount'] + ($cartDetail['price'] * $cartDetail['quantity']);
                    $preparedData = cartModel::prepareUpdateCartData($totalAmount);
                    cartModel::updateCartItemData('cart', $preparedData, 'cartID', $_SESSION['cartID']);

                } else { //create new product 
                    $cartItemData = cartModel::prepareCartItemData($_SESSION['cartID'], $cartDetail);
                    cartModel::insertCartData('cartitem', $cartItemData);
                    $totalAmount = $cartData['totalAmount'] + ($cartDetail['price'] * $cartDetail['quantity']);
                    $preparedData = cartModel::prepareUpdateCartData($totalAmount);
                    cartModel::updateCartItemData('cart', $preparedData, 'cartID', $_SESSION['cartID']);
                }
                
            } else { // create new cart and add product
                $cartInsertData = cartModel::prepareCartData($_SESSION['userID'], $cartDetail);
                $cartID = cartModel::insertCartData('cart', $cartInsertData);
                $cartItemInsertData = cartModel::prepareCartItemData($cartID, $cartDetail);
                cartModel::insertCartData('cartitem', $cartItemInsertData);
                $_SESSION['cartID'] = $cartID;
            
            }
            
            
        }
        
        public function displayCart() {
            if(isset($_SESSION['cartID'])) {
                $userCartData = cartModel::getCartItemDataFromDB($_SESSION['cartID']);
                View::renderTemplate("/User/viewCart.html", ['userCartData' => $userCartData]);    
            } else {
                View::renderTemplate("/User/viewCart.html");
            }
        }

        public function getCount() {
            if(isset($_SESSION['cartID'])) {
                cartModel::getCartItemCount($cartID);
            }
            
        }
    }


?>
