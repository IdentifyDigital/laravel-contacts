<?php


namespace IdentifyDigital\Contacts;

use Illuminate\Support\ServiceProvider;
use IdentifyDigital\Contacts\Models\Address;
use IdentifyDigital\Contacts\Observers\AddressObserver;

class ContactsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/Config/contacts.php' => config_path('contacts.php'),
        ]);
        $this->publishes([
            __DIR__ . '/Seeds/CountriesTableSeeder.php' => database_path('seeds/CountriesTableSeeder.php'),
        ], 'countries-seeds');

        $this->loadMigrationsFrom(__DIR__.'/Migrations');

        Address::observe(AddressObserver::class);
    }


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

}
