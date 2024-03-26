<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\PropertyTypeController;
use App\Http\Controllers\Backend\PropertyController;
use App\Http\Controllers\Agent\AgentPropertyController;
use App\Http\Controllers\Backend\StateController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\WishlistController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

//Homepage frontend 
Route::get('/', [UserController::class, 'Index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/login',[UserController::class, 'Sign_in']) ;
Route::get('/', [UserController::class, 'home'])->name('home');

Route::middleware('auth')->group(function () {
    //Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
   // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
   // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/user/profile', [UserController::class, 'UserProfile'])->name('user.profile');

    Route::post('/user/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');

    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');


     // User WishlistAll Route 
    Route::controller(WishlistController::class)->group(function(){

        Route::get('/user/wishlist', 'UserWishlist')->name('user.wishlist'); 
        Route::get('/get-wishlist-property', 'GetWishlistProperty'); 
        Route::get('/wishlist-remove/{id}', 'WishlistRemove');


});
});

require __DIR__.'/auth.php';


//admin group middleware start (protected)

Route::middleware(['auth','role:admin'])->group(function(){

 Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

 Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

 Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');


 Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');

 Route::get('/admin/allagent',[AdminController::class,'AdminAllAgent'])->name('admin.allagent');

 Route::get('/admin/addagent',[AdminController::class,'AdminAddAgent'])->name('admin.addagent');
 Route::post('/admin/addagent/submit', [AdminController::class, 'addagent'])->name('admin.addagent.submit');

}); //end grp admin middleware


//agent  group middleware start (protected)

Route::middleware(['auth','role:agent'])->group(function(){

 Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');

 Route::get('/agent/logout', [AgentController::class, 'AgentLogout'])->name('agent.logout');

 Route::get('/agent/profile', [AgentController::class, 'AgentProfile'])->name('agent.profile');


 Route::post('/agent/profile/store', [AgentController::class, 'AgentProfileStore'])->name('agent.profile.store');

 

}); //end agent middleware



Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');
Route::get('/agent/login', [AgentController::class, 'AgentLogin'])->name('agent.login');

Route::get('/', [AdminController::class, 'AdminGoBack'])->name('home');
Route::get('/', [AgentController::class, 'AgentGoBack'])->name('home');


Route::middleware(['auth','role:admin'])->group(function(){

    // property type all route
    Route::controller(PropertyTypeController::class)->group(function(){
        Route::get('/all/type','AllType')->name('all.type');
        Route::get('/add/type','AddType')->name('add.type');
        Route::post('/store/type','StoreType')->name('store.type');
        Route::get('/edit/type/{id}','EditType')->name('edit.type');
        Route::post('/update/type','UpdateType')->name('update.type');
        Route::get('/delete/type/{id}','DeleteType')->name('delete.type');
        

    });
    
    //facility routes
    Route::controller(PropertyTypeController::class)->group(function(){
        Route::get('/all/facility','AllFacility')->name('all.facility');
        Route::get('/add/facility','AddFacility')->name('add.facility');
        Route::post('/store/facility','StoreFacility')->name('store.facility');
        //Route::get('/edit/facility/{id}','EditFacility')->name('edit.facility');
        //Route::post('/update/type','UpdateType')->name('update.type');
        //Route::get('/delete/type/{id}','DeleteType')->name('delete.type');
        

    });

     // Property All Route 
    Route::controller(PropertyController::class)->group(function(){
        Route::get('/all/property', 'AllProperty')->name('all.property'); 
        Route::get('/add/property', 'AddProperty')->name('add.property'); 
        Route::post('/store/property', 'StoreProperty')->name('store.property');
        Route::get('/edit/property/{id}', 'EditProperty')->name('edit.property'); 
        Route::post('/update/property', 'UpdateProperty')->name('update.property');
        Route::post('/update/property/thumbnail', 'UpdatePropertyThumbnail')->name('update.property.thumbnail');

        
    
    });

     // State  All Route 
    Route::controller(StateController::class)->group(function(){

        Route::get('/all/state', 'AllState')->name('all.state'); 
        Route::get('/add/state', 'AddState')->name('add.state');
        Route::post('/store/state', 'StoreState')->name('store.state');  
        //Route::get('/edit/type/{id}', 'EditType')->name('edit.type');
        //Route::post('/update/type', 'UpdateType')->name('update.type');
        //Route::get('/delete/type/{id}', 'DeleteType')->name('delete.type');  

});

   
   }); //end grp admin middleware


//agent  group middleware start

Route::middleware(['auth','role:agent'])->group(function(){
        //agent property add
   Route::controller(AgentPropertyController::class)->group(function(){
       Route::get('/agent/all/property','AgentAllProperty')->name('agent.all.property');
       Route::get('/agent/add/property', 'AgentAddProperty')->name('agent.add.property'); 
       Route::post('/agent/store/property', 'AgentStoreProperty')->name('agent.store.property');
       Route::get('/agent/edit/property/{id}', 'AgentEditProperty')->name('agent.edit.property'); 
       Route::post('/agent/update/property', 'AgentUpdateProperty')->name('agent.update.property');

       Route::get('/agent/property/message/', 'AgentPropertyMessage')->name('agent.property.message');  
       Route::get('/agent/message/details/{id}', 'AgentMessageDetails')->name('agent.message.details'); 

 });
   
   }); //end agent middleware



   

  // Frontend Property Details All Route
  Route::get('/property/details/{id}/{slug}', [IndexController::class, 'PropertyDetails']);

  // Wishlist Add Route 
  Route::post('/add-to-wishList/{property_id}', [WishlistController::class, 'AddToWishList']); 

  // Home Page Buy Seach Option
  Route::post('/buy/property/search', [IndexController::class, 'BuyPropertySeach'])->name('buy.property.search');

  // Home Page Rent Seach Option
  Route::post('/rent/property/search', [IndexController::class, 'RentPropertySeach'])->name('rent.property.search');

  // Get All Rent Property 
  Route::get('/rent/property', [IndexController::class, 'RentProperty'])->name('rent.property');

  // Get All Buy Property 
  Route::get('/buy/property', [IndexController::class, 'BuyProperty'])->name('buy.property');

  // Get All Buy Property 
  Route::get('/featured/property', [IndexController::class, 'FeaturedProperty'])->name('featured.property');

   // Send Message from Property Details Page 
   Route::post('/property/message', [IndexController::class, 'PropertyMessage'])->name('property.message');