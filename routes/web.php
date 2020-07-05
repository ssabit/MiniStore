<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

/*Route::group(['middleware'=>'verified'],function (){


    Route::get('/inbox', function (){
        echo "inbox";}
    )->name('inbox');

    Route::get('/calender', function (){
        echo "calender";}
    )->name('calender');

    Route::get('/typography', function (){
        echo "typography";}
    )->name('typography');

});*/
//employee route
Route::get('/add/employee', 'EmployeeController@index')->name('add.employee');
Route::post('/store/employee', 'EmployeeController@StoreEmployee')->name('store.employee');
Route::get('/all/employee', 'EmployeeController@AllEmployees')->name('all.employee');
Route::get('/view-employee/{id}', 'EmployeeController@ViewEmployee');
Route::get('/delete-employee/{id}', 'EmployeeController@DeleteEmployee');
Route::get('/edit-employee/{id}', 'EmployeeController@EditEmployee');
Route::post('/update-employee/{id}', 'EmployeeController@UpdateEmployee');
//customers route
Route::get('/add/customer', 'CustomerController@index')->name('add.customer');
Route::post('/store/customer', 'CustomerController@StoreCustomer')->name('store.customer');
Route::get('/all/customer', 'CustomerController@AllCustomer')->name('all.customer');
Route::get('/view-customer/{id}', 'CustomerController@ViewCustomer');
Route::get('/delete-customer/{id}', 'CustomerController@DeleteCustomer');
Route::get('/edit-customer/{id}', 'CustomerController@EditCustomer');
Route::post('/update-customer/{id}', 'CustomerController@UpdateCustomer');

//Suppyers route
Route::get('/add/supplier', 'SupplierController@index')->name('add.supplier');
Route::post('/store/supplier', 'SupplierController@StoreSupplier')->name('store.supplier');
Route::get('/all/supplier', 'SupplierController@AllSupplier')->name('all.supplier');
Route::get('/view-supplier/{id}', 'SupplierController@ViewSupplier');
Route::get('/delete-supplier/{id}', 'SupplierController@DeleteSupplier');
Route::get('/edit-supplier/{id}', 'SupplierController@EditSupplier');
Route::post('/update-supplier/{id}', 'SupplierController@UpdateSupplier');
//Salary route
Route::get('/add/advance/salary', 'AdvanceSalaryController@AddAdvanceSalary')->name('add.advancesalary');
Route::post('/store/advance/salary', 'AdvanceSalaryController@StoreAdvanceSalary')->name('store.advancesalary');
Route::get('/all/advance/salary', 'AdvanceSalaryController@AllSalary')->name('all.advancesalary');
Route::get('/pay/advance/salary', 'SalaryController@PaySalary')->name('pay.salary');
//Category route
Route::get('/add/category', 'CategoryController@AddCategory')->name('add.category');
Route::post('/store/category', 'CategoryController@StoreCategory')->name('store.category');
Route::get('/all/category', 'CategoryController@AllCategory')->name('all.category');
Route::get('/delete/category/{id}', 'CategoryController@DeleteCategory');
Route::get('/edit/category/{id}', 'CategoryController@EditCategory');
Route::post('/update-category/{id}', 'CategoryController@UpdateCategory');
//Product route
Route::get('/add/product', 'ProductController@AddProduct')->name('add.product');
Route::post('/store/product', 'ProductController@StoreProduct')->name('store.product');
Route::get('/all/product', 'ProductController@AllProduct')->name('all.product');
Route::get('/delete-product/{id}', 'ProductController@DeleteProduct');
Route::get('/view-product/{id}', 'ProductController@ViewProduct');
Route::get('/edit-product/{id}', 'ProductController@EditProduct');
Route::post('/update-product/{id}', 'ProductController@UpdateProduct');
//Excel import export
Route::get('/import-product', 'ProductController@ImportProduct')->name('import.product');
Route::get('/export', 'ProductController@export')->name('export');
Route::post('/import', 'ProductController@import')->name('import');

//Expense route
Route::get('/add/expense', 'ExpenseController@AddExpense')->name('add.expense');
Route::post('/store/expense', 'ExpenseController@StoreExpense')->name('store.expense');
Route::get('/today/expense', 'ExpenseController@TodayExpense')->name('today.expense');
Route::get('/yearly/expense', 'ExpenseController@YearlyExpense')->name('yearly.expense');
Route::get('/monthly/expense', 'ExpenseController@MonthlyExpense')->name('monthly.expense');
Route::get('/edit-today-expense/{id}', 'ExpenseController@EditTodayExpense');
Route::post('/update-expense/{id}', 'ExpenseController@UpdateExpense');
//Monthly Expense route
Route::get('/expense/january', 'ExpenseController@JanuaryExpense')->name('january.expense');
Route::get('/expense/february', 'ExpenseController@FebruaryExpense')->name('february.expense');
Route::get('/expense/march', 'ExpenseController@MarchExpense')->name('march.expense');
Route::get('/expense/april', 'ExpenseController@AprilExpense')->name('april.expense');
Route::get('/expense/may', 'ExpenseController@MayExpense')->name('may.expense');
Route::get('/expense/june', 'ExpenseController@JuneExpense')->name('june.expense');
Route::get('/expense/july', 'ExpenseController@JulyExpense')->name('july.expense');
Route::get('/expense/august', 'ExpenseController@AugustExpense')->name('august.expense');
Route::get('/expense/september/', 'ExpenseController@SeptemberExpense')->name('september.expense');
Route::get('/expense/october/', 'ExpenseController@OctoberExpense')->name('october.expense');
Route::get('/expense/novembar', 'ExpenseController@NovembarExpense')->name('novembar.expense');
Route::get('/expense/december', 'ExpenseController@DecemberExpense')->name('december.expense');

//Attendance Route
Route::get('/take/attendance', 'AttendanceController@TakeAttendance')->name('take.attendance');
Route::post('/insert/attendance', 'AttendanceController@InsertAttendance')->name('insert.attendance');
Route::get('/all/attendance', 'AttendanceController@AllAttendance')->name('all.attendance');
Route::get('/edit/attendance/{edit_date}', 'AttendanceController@EditAttendance');
Route::post('/update-attendance', 'AttendanceController@UpdateAttendance');
Route::get('/view-attendance/{edit_date}', 'AttendanceController@ViewAttendance');
//Settings Route
Route::get('/website/setting', 'SettingController@Setting')->name('setting');
Route::post('/update-website/{id}', 'SettingController@UpdateWebsite');

//POS Route
Route::get('/pos', 'PosController@index')->name('pos');
Route::get('/pos-done/{id}', 'PosController@PosDone');

//Cart Route
Route::post('/add-cart', 'CartController@index');
Route::post('/cart-update/{rowId}', 'CartController@CartUpdate');
Route::get('/cart-remove/{rowId}', 'CartController@CartRemove');
Route::post('/invoice', 'CartController@CreateInvoice');
Route::post('/final-invoice', 'CartController@FinalInvoice');
//Orders
Route::get('/pending/order', 'OrderController@PendingOrder')->name('pending.orders');
Route::get('/success/order', 'OrderController@SuccessOrder')->name('success.orders');
Route::get('/view-order-status/{id}', 'OrderController@ViewOrder');

