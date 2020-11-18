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
        $this->loadMigrationsFrom(__DIR__.'/Migrations');
//        $this->registerSeedsFrom(__DIR__.'/Seeds');

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
