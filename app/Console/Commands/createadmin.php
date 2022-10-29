<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class createadmin extends Command
{
    protected $signature = 'create:admin';

    protected $description = 'this command creates admin account';

     public function handle()
    {
        if (!User::where('email','=','sayedravi4@gmail.com')->first()){
            User::create([
                'name'=>'Sayed',
                'email'=>'sayedravi4@gmail.com',
                'password'=> Hash::make('php@123'),
                'role' => 'admin',
            ]);
            $this->info('Admin created Successfully');
        }else{
            $this->info('Already Exist');
        }
    }
}
