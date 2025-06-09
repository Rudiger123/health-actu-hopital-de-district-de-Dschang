<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;

class NewsletterSubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subscriptions = [
            [
                'email' => 'dr.kamga@hopital-dschang.cm',
                'is_subscribed' => true,
                'unsubscribe_token' => Str::random(64),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'email' => 'infirmiere.marie@hopital-dschang.cm',
                'is_subscribed' => true,
                'unsubscribe_token' => Str::random(64),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'email' => 'pharmacien.pierre@hopital-dschang.cm',
                'is_subscribed' => true,
                'unsubscribe_token' => Str::random(64),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'email' => 'admin.hopital@hopital-dschang.cm',
                'is_subscribed' => true,
                'unsubscribe_token' => Str::random(64),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'email' => 'labo.analyses@hopital-dschang.cm',
                'is_subscribed' => true,
                'unsubscribe_token' => Str::random(64),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'email' => 'urgence.medicale@hopital-dschang.cm',
                'is_subscribed' => true,
                'unsubscribe_token' => Str::random(64),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'email' => 'pediatrie@hopital-dschang.cm',
                'is_subscribed' => true,
                'unsubscribe_token' => Str::random(64),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'email' => 'chirurgie@hopital-dschang.cm',
                'is_subscribed' => true,
                'unsubscribe_token' => Str::random(64),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'email' => 'radiologie@hopital-dschang.cm',
                'is_subscribed' => true,
                'unsubscribe_token' => Str::random(64),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'email' => 'direction@hopital-dschang.cm',
                'is_subscribed' => true,
                'unsubscribe_token' => Str::random(64),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('newsletter_subscriptions')->insert($subscriptions);
    }
}
