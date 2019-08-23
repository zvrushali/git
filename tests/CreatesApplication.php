<?php

namespace Tests;

<<<<<<< HEAD
use Illuminate\Support\Facades\Hash;
=======
>>>>>>> d1cb5ffb453ba83f73b8ec0964c6d505c698d739
use Illuminate\Contracts\Console\Kernel;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

<<<<<<< HEAD
        Hash::setRounds(4);

=======
>>>>>>> d1cb5ffb453ba83f73b8ec0964c6d505c698d739
        return $app;
    }
}
