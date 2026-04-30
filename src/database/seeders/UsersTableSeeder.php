<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '一般ユーザ1',
            'email' => 'general1@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
        ];
        User::create($param);

        $param = [
            'name' => '一般ユーザ2',
            'email' => 'general2@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
        ];
        User::create($param);

        $param = [
            'name' => '管理者1',
            'email' => 'admin1@gmail.com',
            'email_verified_at' => Carbon::now(),
            'role' => 'admin',
            'password' => Hash::make('password'),
        ];
        User::create($param);

        $param = [
            'name' => '店舗代表1',
            'email' => 'owner1@gmail.com',
            'email_verified_at' => Carbon::now(),
            'role' => 'owner',
            'password' => Hash::make('password'),
        ];
        User::create($param);

        $param = [
            'name' => '店舗代表2',
            'email' => 'owner2@gmail.com',
            'email_verified_at' => Carbon::now(),
            'role' => 'owner',
            'password' => Hash::make('password'),
        ];
        User::create($param);

        $param = [
            'name' => '店舗代表3',
            'email' => 'owner3@gmail.com',
            'email_verified_at' => Carbon::now(),
            'role' => 'owner',
            'password' => Hash::make('password'),
        ];
        User::create($param);

        $param = [
            'name' => '店舗代表4',
            'email' => 'owner4@gmail.com',
            'email_verified_at' => Carbon::now(),
            'role' => 'owner',
            'password' => Hash::make('password'),
        ];
        User::create($param);

        $param = [
            'name' => '店舗代表5',
            'email' => 'owner5@gmail.com',
            'email_verified_at' => Carbon::now(),
            'role' => 'owner',
            'password' => Hash::make('password'),
        ];
        User::create($param);

        $param = [
            'name' => '店舗代表6',
            'email' => 'owner6@gmail.com',
            'email_verified_at' => Carbon::now(),
            'role' => 'owner',
            'password' => Hash::make('password'),
        ];
        User::create($param);

        $param = [
            'name' => '店舗代表7',
            'email' => 'owner7@gmail.com',
            'email_verified_at' => Carbon::now(),
            'role' => 'owner',
            'password' => Hash::make('password'),
        ];
        User::create($param);

        $param = [
            'name' => '店舗代表8',
            'email' => 'owner8@gmail.com',
            'email_verified_at' => Carbon::now(),
            'role' => 'owner',
            'password' => Hash::make('password'),
        ];
        User::create($param);

        $param = [
            'name' => '店舗代表9',
            'email' => 'owner9@gmail.com',
            'email_verified_at' => Carbon::now(),
            'role' => 'owner',
            'password' => Hash::make('password'),
        ];
        User::create($param);

        $param = [
            'name' => '店舗代表10',
            'email' => 'owner10@gmail.com',
            'email_verified_at' => Carbon::now(),
            'role' => 'owner',
            'password' => Hash::make('password'),
        ];
        User::create($param);

        $param = [
            'name' => '店舗代表11',
            'email' => 'owner11@gmail.com',
            'email_verified_at' => Carbon::now(),
            'role' => 'owner',
            'password' => Hash::make('password'),
        ];
        User::create($param);

        $param = [
            'name' => '店舗代表12',
            'email' => 'owner12@gmail.com',
            'email_verified_at' => Carbon::now(),
            'role' => 'owner',
            'password' => Hash::make('password'),
        ];
        User::create($param);

        $param = [
            'name' => '店舗代表13',
            'email' => 'owner13@gmail.com',
            'email_verified_at' => Carbon::now(),
            'role' => 'owner',
            'password' => Hash::make('password'),
        ];
        User::create($param);

        $param = [
            'name' => '店舗代表14',
            'email' => 'owner14@gmail.com',
            'email_verified_at' => Carbon::now(),
            'role' => 'owner',
            'password' => Hash::make('password'),
        ];
        User::create($param);

        $param = [
            'name' => '店舗代表15',
            'email' => 'owner15@gmail.com',
            'email_verified_at' => Carbon::now(),
            'role' => 'owner',
            'password' => Hash::make('password'),
        ];
        User::create($param);

        $param = [
            'name' => '店舗代表16',
            'email' => 'owner16@gmail.com',
            'email_verified_at' => Carbon::now(),
            'role' => 'owner',
            'password' => Hash::make('password'),
        ];
        User::create($param);


        $param = [
            'name' => '店舗代表17',
            'email' => 'owner17@gmail.com',
            'email_verified_at' => Carbon::now(),
            'role' => 'owner',
            'password' => Hash::make('password'),
        ];
        User::create($param);

        $param = [
            'name' => '店舗代表18',
            'email' => 'owner18@gmail.com',
            'email_verified_at' => Carbon::now(),
            'role' => 'owner',
            'password' => Hash::make('password'),
        ];
        User::create($param);

        $param = [
            'name' => '店舗代表19',
            'email' => 'owner19@gmail.com',
            'email_verified_at' => Carbon::now(),
            'role' => 'owner',
            'password' => Hash::make('password'),
        ];
        User::create($param);

        $param = [
            'name' => '店舗代表20',
            'email' => 'owner20@gmail.com',
            'email_verified_at' => Carbon::now(),
            'role' => 'owner',
            'password' => Hash::make('password'),
        ];
        User::create($param);

    }
}
