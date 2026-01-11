<?php

namespace App\Listeners;

use App\Events\MakeUser;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Hash;

class CreateUserListener
{
    use InteractsWithQueue;
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(MakeUser $event): void
    {
       $customer= $event->customer;
    //    dd( $customer);

        $user = new User();
        $user->name = $customer->name;
        $user->email = $customer->email;
        $user->mobile = $customer->phone;
        $user->password = Hash::make(12345678);
        $user->save();
        $customer->user_id= $user->id;
        $customer->save();
    }
}
