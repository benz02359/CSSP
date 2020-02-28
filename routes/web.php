<?php
use App\Notifications\NewPost;
use App\User;
use App\Post;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/test', function () {
//    return view('web.testvue');
//});

//Route::get('/solution', function () {
//    return view('web.testvue');
//});
//Route::get('/', 'HomeController@index')->name('home');
/*Route::get('/', function () {
    return view('web.home');
});*/

Route::get('/web', function () {
    return view('web.home');
});

/*Route::get('/testsms', function () {
    return view('cssp.sms');
});*/
Route::post('sms','SmsController@sendSms');

Route::get('send','MailController@send')->name('send');

Route::get('/newpost', function () {
    $user = User::find(1);
    dd($user);
    $post = post::find(1);
    dd($post);

    $user->notify(new NewPost($post));

    $admin = User::where('admin', 1)->first();
    $admin->notify(new NewUser($user));

    Notifications::route('mail','benz02359@gmail.con')->notify(new NewPost($post));
        
});

Route::resource('/',('HomeController'));


Auth::routes();
{
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');

/*Route::middleware(['admin'])->group(function () {
Route::get('registeradmin', 'Auth\RegisterController@registeradmin')->name('registeradmin');
Route::get('registerstaff', 'Auth\RegisterController@registerstaff')->name('registerstaff');
Route::get('registeragent', 'Auth\RegisterController@registeragent')->name('registeragent');
Route::get('registerforadmin', 'Auth\RegisterController@registerforadmin')->name('registerforadmin');
});*/

Route::get('registeruser', 'Auth\RegisterController@registeruser')->name('registeruser');

//Route::post('regisadmin', 'Auth\RegisterController@regisadmin');


Route::post('register', 'Auth\RegisterController@register');


// Password Reset Routes...
/*Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');*/
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
}
/*Route::get('registeradmin', 'Auth\RegisterController@registeradmin')->name('registeradmin');
Route::get('registerstaff', 'Auth\RegisterController@registerstaff')->name('registerstaff');
Route::get('registeragent', 'Auth\RegisterController@registeragent')->name('registeragent');
Route::get('registeruser', 'Auth\RegisterController@registeruser')->name('registeruser');*/




//Route::get('/home', 'HomeController@index')->name('home');

//Web
//Route::get('/contact', 'HomeController@contact')->name('contact');
//Route::get('/solutions', 'SolutionController@index')->name('solution');
//Route::get('/report', 'HomeController@report')->name('report');

//Route::get('/forums', 'ForumsController@index')->name('forums');
//Route::get('/help', 'HomeController@help')->name('help');
//Route::get('/submit', 'HomeController@submit')->name('submit');

//Route::get('admin', 'HomeController@solution')->name('admin');

Route::middleware(['auth'])->group(function () {
Route::get('/approval', 'HomeController@approval')->name('approval');

Route::middleware(['approved'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('tags','TagController');
    Route::resource('posts','PostsController');
    Route::get('/news','PostsController@indexnews');
    Route::get('/posts/create/createquestion','PostsController@createquestion')->name('createquestion');
    Route::get('/posts/create/createtalk','PostsController@createtalk')->name('createtalk');
    Route::get('/posts/create/createnews','PostsController@createnews')->name('createnews');
    Route::get('/search','PostsController@search');
    Route::get('/searchcate','PostsController@searchcate');
    Route::resource('userprofile','UserprofileController' );
    Route::get('/changePassword','HomeController@showChangePasswordForm');
    Route::post('/changePassword','HomeController@changePassword')->name('changePassword');
});
Route::middleware(['admin'])->group(function () {
    
    Route::get('registeradmin', 'Auth\RegisterController@registeradmin')->name('registeradmin');
    Route::get('registerforadmin', 'Auth\RegisterController@registerforadmin')->name('registerforadmin');
    //Approve
    Route::get('/users', 'UserController@index')->name('admin.users.index');
    Route::get('/users/{user_id}/approve', 'UserController@approve')->name('admin.users.approve');
    //Dimiss
    Route::get('/users/{user_id}/dimiss', 'UserController@dimiss')->name('admin.users.dimiss');

    //Regis
    
    Route::get('registerstaff', 'Auth\RegisterController@registerstaff')->name('registerstaff');
    Route::get('registeragent', 'Auth\RegisterController@registeragent')->name('registeragent');
    Route::get('registeruserbyagent', 'Auth\RegisterController@registeruserbyagent')->name('registeruserbyagent');
    

    //Appointment
    Route::resource('comment','CommentController');

    //Appointment
    Route::resource('appointment','AppointmentController');

    //Work
    Route::resource('work','WorkController');

    //Staff
    Route::resource('staffs','StaffController');

    //List
    Route::resource('userlist','UserlistController');
    
    //AllUserList
    Route::resource('alluserlist','AllUserlistController');
    Route::PUT('userlist/{user_id}/updateapprove','UserController@updateapprove');
    //Company
    Route::resource('companies','CompanyController');
    Route::get('/companies/{company_id}/editp', 'CompanyController@editp');
    

    //Sale
    Route::resource('sales','SaleController');

    //Department
    Route::resource('departments','DepartmentController');

    //Program
    Route::resource('programs','ProgramController');

    //HQ
    Route::resource('hq','HQController');

    //Tag
    // Route::resource('tags','TagController');
    //Route::post('/tags','TagController@store')->name('tags.store');

    //Cate
    Route::resource('categories','CategoryController');
    Route::POST('categories/addcate','CategoryController@addcate');

    //Report
    Route::resource('report','ReportController');
    Route::get('reportprogram','ReportController@showprogram');

    Route::get('report1','PDFController@report1');
    Route::get('report2','PDFController@report2');
    Route::get('report1/pdf','PDFController@pdf1');
    Route::get('report11','PDFController@report11');
    Route::get('report22','PDFController@report22');
});
});



//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/adminpage', 'AdminController@index');
Route::get('/aboutpage', 'AboutController@index');
//Route::get('/solutionpage', 'SolutionController@index');


//Vue
//Route::resource('testvues','Testvuecontroller');

//Solution
//Route::resource('solutions','SolutionController');
//Route::resource('solutions/{id}','SolutionController@view');
//Route::resource('vsolutions','SolutionController@view');

//Posts
Route::resource('posts','PostsController');
//Route::get('posts/createquestion','PostsController');
/*Route::get('/posts/createquestion', function () {
    return view('web.createquestion');
});
Route::get('/posts/createtalk', function () {
    return view('web.createtalk');
});
Route::get('/posts/createnews', function () {
    return view('web.createnews');
});*/

//forums
Route::resource('forums','ForumsController');


//Route::get('/userprofile/edit','UserprofileController@edit' );

