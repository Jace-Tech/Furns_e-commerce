const app = angular.module('shop', [])

// Cart Controller
app.controller("cart", $scope => {
    $scope.cartItems = []

    // Get All Data
    $scope.getCartItems = async () => {
        const request = await fetch(`./assets/handlers/api/cart.php`)
        const response = await request.json()
        $scope.cartItems = response
        console.log($scope.cartItems)
    }

    $scope.getCartItems()

    // Add New Item
    $scope.addItemToCart = async (id) => {
        const request = await fetch(`./assets/handlers/cart.php?id=${id}`);
        const response = await request.json()
        console.log(response)
    }

})

