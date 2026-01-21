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


Gate and policy

php artisan make:policy CustomerPolicy --model=Customer

email 
php artisan make:mail UserNotification

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


fetch function 

<meta name="csrf-token" content="{{ csrf_token() }}">
const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

fetch( `${url}`, {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrfToken,
        'Accept': 'application/json'
    },
    body: JSON.stringify({
        name: 'John Doe',
        email: 'john@example.com'
    })
})
.then(res =>res.json())
.then(data => console.log(data))
.catch(err => console.error(err));





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


Api 
php artisan install:api
php artisan make:controller Api/CustomerController --api

Sanctum 

composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
php artisan migrate
user HasApiTokens in user Model
https://www.itsolutionstuff.com/post/laravel-11-rest-api-authentication-using-sanctum-tutorialexample.html


Notification 

php artisan notifications:table
php artisan migrate

php artisan make:notification OrderCreated

return ['mail', 'database'];

use Notifiable;
$user = User::find(1);
$user->notify(new OrderCreated($order));

auth()->user()->notifications;
auth()->user()->readNotifications;
auth()->user()->unreadNotifications;
auth()->user()->unreadNotifications->markAsRead();
auth()->user()->unreadNotifications->count();

$notification = auth()->user()->notifications()->find($id);
$notification->update([
    'read_at' => null,
]);

public function markAsRead($id)
{
        auth()->user()
            ->unreadNotifications
            ->where('id', $id)
            ->first()
            ?->markAsRead();

        return back();
}


@foreach(auth()->user()->unreadNotifications as $notification)
    <div>
        <strong>{{ $notification->data['message'] }}</strong>

        <a href="{{ $notification->data['url'] }}">View</a>

        <form action="{{ route('notification.read', $notification->id) }}" method="POST">
            @csrf
            <button>Mark as read</button>
        </form>
    </div>
@endforeach


