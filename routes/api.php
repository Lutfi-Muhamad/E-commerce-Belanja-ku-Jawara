yang Ini <?php


            use App\Http\Controllers\API\AdminController;
            use App\Http\Controllers\API\ProductController;
            use App\Http\Controllers\API\CartController;
            use Illuminate\Support\Facades\Route;

            // Admin Routes (Auth)
            Route::post('login', [AdminController::class, 'login']);
            Route::post('register', [AdminController::class, 'register']);


            // Admin routes to manage products ini



            Route::group(['middleware' => ['auth:admin']], function () {
                Route::get('products', [ProductController::class, 'index']);  // View products for admin
                Route::post('products', [ProductController::class, 'store']);  // Add a new product
                Route::put('products/{id}', [ProductController::class, 'update']);  // Update a product
                Route::delete('products/{id}', [ProductController::class, 'destroy']);  // Delete a product
            });

            // User routes to view products
            Route::get('products/user', [ProductController::class, 'indexUser']);  // View products for users

            // Cart routes
            Route::middleware('auth:sanctum')->group(function () {
                Route::post('cart/{id}', [CartController::class, 'addToCart']);  // Add product to cart
                Route::get('cart', [CartController::class, 'showCart']);  // Show cart
                Route::put('cart/{id}', [CartController::class, 'updateQuantity']);  // Update product quantity in cart
                Route::delete('cart/{id}', [CartController::class, 'removeFromCart']);  // Remove product from cart
                Route::post('cart/checkout', [CartController::class, 'checkout']);  // Checkout
                Route::delete('cart', [CartController::class, 'clearCart']);  // Clear all products in cart
            });

            // Logout Route
            Route::middleware('auth:sanctum')->post('logout', [AdminController::class, 'logout']);
