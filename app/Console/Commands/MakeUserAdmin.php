<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeUserAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'presto:MakeUserAdmin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rendi un utente admin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $email=$this->ask("Inserisci l'email dell'utente che vuoi rendere admin");
        $user=User::where('email', $email)->first();
        if (!$user) {
            $this->error('Utente non trovato');
            return;
        }
            $user->is_admin=true;
            $user->is_revisor=true;
            $user->save();
            $this->info("L'utente {$user->name} e' ora admin.");
            
    }
}
