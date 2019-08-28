<?php

namespace App\Console\Commands;
use DB;
use App\Notifications\SMSNotification;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;
use App\User;
class UserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'custom:User';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Point added to Users account';

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
     * @return mixed
     */
    public function handle()
    {
          $data = DB::table('results')->select('user_id')->whereDate('created_at',Date('Y-m-d'))->where('flag', 1)->get();
          DB::table('results')->whereDate('created_at',Date('Y-m-d'))->where('flag', 1)->update(array('points'=>10));
          //$user=new User();
          
          foreach ($data as $value) 
           {
           //$phone=DB::table('users')->select('phone')->where('id',$value->user_id)->get();
           $user=User::where('id',$value->user_id)->get();;
          // $status="fail";
          
           $status=$user->notify(new SMSNotification($user));
          
       }
          $this->info('Point has added to user account!'.$user->id);
    }
}
