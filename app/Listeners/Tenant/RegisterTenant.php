<?php

namespace App\Listeners\Tenant;

use App\Events\Tenant\TenantIdentified;
use App\Tenant\Database\DatabaseManager;
use App\Tenant\Manager;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RegisterTenant
{
  
  protected $db;

  public function __construct(DatabaseManager $db)
  {
    $this->db = $db;
  }
    /**
     * Handle the event.
     *
     * @param  TenantIdentified  $event
     * @return void
     */
    public function handle(TenantIdentified $event)
    {
        /* global aar ajillaj bgaa bootstrap deer achaallaj bgaa 
        app methodiig ajilluulj tuunii setTenant iig ashiglaj 
        TenantIdentified iin event hiigdesn utgiig tawij bna 
        ingesneet manager class utgatai bolj bna*/
        app(Manager::class)->setTenant($event->tenant);
        /* tenant insert hiih ued DatabaseManager iin 
        createConnection ajillaj db config iig beldeh bolno*/
        $this->db->createConnection($event->tenant);
    }
}
