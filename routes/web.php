<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;

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
    return view('welcome');
});

Route::get('/insertSql', function () {
    DB::insert("insert into students(name, date_of_birth, gpa, advisor) values(?,?,?,?)",["Nurzhas", "2002-05-13", 3.5, "Kurmangazy"]);
});

Route::get('/selectSql', function () {
    $results = DB::select("select * from students");

    foreach ($results as $students) {
    	echo "Name is " .$students->name;
    	echo "<br>";
    	echo "Date of birth is " .$students->date_of_birth;
    	echo "<br>";
    	echo "GPA is " .$students->gpa;
    	echo "<br>";
    	echo "Advisor is " .$students->advisor;
    	echo "<br> <br>";
    }
});

Route::get('/updateSql', function () {
    DB::update("update students set name = ?, date_of_birth = ?, gpa = ?, advisor = ? where id = ?",["Nurzhas", "2002-01-14", 3.6, "Marzhan",3]);
});

Route::get('/deleteSql', function () {
    DB::insert("delete from students where id = ?",[3]);
});



Route::get('/insertModel', function () {
	$student = new Student;
	$student -> name = "Sevda";
	$student -> date_of_birth ="2002-12-13";
	$student -> gpa = 3.9;
	$student -> advisor = "Zhangir";
	$student -> save();
});

Route::get('/selectModel', function () {
    $results = Student::all();

    foreach ($results as $students) {
    	echo "Name is " .$students->name;
    	echo "<br>";
    	echo "Date of birth is " .$students->date_of_birth;
    	echo "<br>";
    	echo "GPA is " .$students->gpa;
    	echo "<br>";
    	echo "Advisor is " .$students->advisor;
    	echo "<br> <br>";
    }
});

Route::get('/updateModel', function () {
	$student = Student::find(10);
	$student -> name = "Sevda";
	$student -> date_of_birth ="2001-12-13";
	$student -> gpa = 3.7;
	$student -> advisor = "Zhangir";
	$student -> save();
});

Route::get('/deleteModel', function () {
	Student::where('id',9)->delete();
});