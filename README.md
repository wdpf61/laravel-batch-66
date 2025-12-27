migration 

php artisan make:migration create_customers_table
php artisan migrate

to delete all database 
php artisan migrate:rollback 

php artisan make:factory CustomerFactory
php artisan make:model Customer
php artisan db:seed

php artisan storage:link
php artisan lang:publish

php artisan make:controller namecontroller --resource
route::resource("student", StudentController::class)

soft delete 
in model 
use SoftDeletes;

in database add column deleted_at

User::withTrashed()->get();
User::onlyTrashed()->get();
User::onlyTrashed()->restore();
User::withTrashed()->find(1)->restore();
User::withTrashed()->find(1)->forceDelete();

conditional activation
class="{{ Route::is("dashboard.patient")?"active":"" }}"
class="{{ request()->is("dashboard/admin")?"active":"" }}"

search 
 $customers = Customer::when($request->search, function($query) use($request) {
          return $query->whereAny([
            "name",
            "email",
             "id",
             "phone"
        ], "LIKE" , "%".$request->search."%" );

        })->orderBy("id", "desc")->paginate(8);
  {{ $customers->appends(request()->query())->links() }}


DB::enableQueryLog();
// run code
dd(DB::getQueryLog());

ajax 

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
    }
});

$.ajax({
    url: '/get-cities/' + countryId,
    type: 'GET',
    success: function (data) {
        let options = '<option value="">Select City</option>';
        data.forEach(function (city) {
            options += `<option value="${city.id}">${city.name}</option>`;
        });
        $('#city').html(options);
    }
});

Auth 

composer require laravel/ui
php artisan ui bootstrap --auth
npm install
npm run dev


composer require laravel/breeze --dev
php artisan breeze:install


composer require laravel/fortify
php artisan vendor:publish --provider="Laravel\Fortify\FortifyServiceProvider"
Enable Features (config/fortify.php)
'features' => [
    Features::registration(),
    Features::resetPasswords(),
    Features::emailVerification(),
    Features::twoFactorAuthentication(),
],

FortifyServiceProvider.php
use Laravel\Fortify\Fortify;
public function boot()
{
    Fortify::loginView(function () {
        return view('auth.login');
    });
}

composer require laravel/jetstream
php artisan jetstream:install livewire
php artisan jetstream:install livewire --teams




// // Basic SELECT * FROM users
    // $users = DB::table('users')->get();

    // // Selecting specific columns
    // $users = DB::table('users')->select('id', 'name', 'email')->get();

    // // WHERE clause
    // $users = DB::table('users')->where('status', 'active')->get();

    // // WHERE with multiple conditions
    // $users = DB::table('users')
    //     ->where('status', 'active')
    //     ->where('role', 'admin')
    //     ->get();

    // // OR WHERE
    // $users = DB::table('users')
    //     ->where('status', 'active')
    //     ->orWhere('role', 'admin')
    //     ->get();

    // // WHERE IN
    // $users = DB::table('users')
    //     ->whereIn('role', ['admin', 'editor', 'user'])
    //     ->get();

    // // WHERE NOT IN
    // $users = DB::table('users')
    //     ->whereNotIn('role', ['guest', 'banned'])
    //     ->get();

    // // WHERE BETWEEN
    // $users = DB::table('orders')
    //     ->whereBetween('total', [100, 500])
    //     ->get();

    // // WHERE NOT BETWEEN
    // $users = DB::table('orders')
    //     ->whereNotBetween('total', [100, 500])
    //     ->get();

    // // ORDER BY
    // $users = DB::table('users')->orderBy('created_at', 'desc')->get();

    // // GROUP BY with COUNT
    // $counts = DB::table('orders')
    //     ->select('status', DB::raw('COUNT(*) as count'))
    //     ->groupBy('status')
    //     ->get();

    // // LIMIT and OFFSET (Pagination)
    // $users = DB::table('users')->limit(10)->offset(20)->get();

    // // JOIN
    // $users = DB::table('users')
    //     ->join('profiles', 'users.id', '=', 'profiles.user_id')
    //     ->select('users.*', 'profiles.bio')
    //     ->get();

    // // LEFT JOIN
    // $users = DB::table('users')
    //     ->leftJoin('profiles', 'users.id', '=', 'profiles.user_id')
    //     ->select('users.*', 'profiles.bio')
    //     ->get();

    // // RIGHT JOIN
    // $users = DB::table('users')
    //     ->rightJoin('profiles', 'users.id', '=', 'profiles.user_id')
    //     ->select('users.*', 'profiles.bio')
    //     ->get();

    // // EXISTS
    // $exists = DB::table('users')->where('email', 'john@example.com')->exists();

    // // DOESN'T EXIST
    // $notExists = DB::table('users')->where('email', 'nonexistent@example.com')->doesntExist();

    // // INSERT
    // DB::table('users')->insert([
    //     'name' => 'John Doe',
    //     'email' => 'john@example.com',
    //     'password' => bcrypt('password')
    // ]);

    // // INSERT GET ID
    // $id = DB::table('users')->insertGetId([
    //     'name' => 'Jane Doe',
    //     'email' => 'jane@example.com',
    //     'password' => bcrypt('password')
    // ]);

    // // UPDATE
    // DB::table('users')
    //     ->where('id', $id)
    //     ->update(['email' => 'jane.doe@example.com']);

    // // INCREMENT
    // DB::table('users')->where('id', $id)->increment('login_attempts');

    // // DECREMENT
    // DB::table('users')->where('id', $id)->decrement('login_attempts');

    // // DELETE
    // DB::table('users')->where('id', $id)->delete();

    // // RAW QUERIES
    // $users = DB::select("SELECT * FROM users WHERE status = ?", ['active']);
