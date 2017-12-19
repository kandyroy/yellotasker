<?php

namespace App;
use Auth;
use Session;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
   
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     /**
     * The primary key used by the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name','last_name','email', 'role_type','status','password'];  // All field of user table here    


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function expiredTask()
    {

        return $this->belongsToMany('App\Models\Tasks', 'saveTask','userId','taskId')->with('taskPostedUser');
         
    }
    
    public function saveTask()
    {

        return $this->belongsToMany('App\Models\Tasks', 'saveTask','userId','taskId')->with('taskPostedUser')->groupBy('saveTask.taskId')->orderBy('saveTask.id','desc')->select('id');
         
    }

   
    public function reportedDetails()
    {
        return $this->hasMany('App\Models\Complains','postedUserId')->with('reportedUser');
    }

    public function openTask()
    {
        return $this->hasMany('App\Models\Tasks','userId')->where('status','open')->with('taskPostedUser');
    }
    public function postedTask()
    {
        return $this->hasMany('App\Models\Tasks','userId')->where('status','open')->with('taskPostedUser');
    }
    public function pendingTask()
    {
        return $this->hasMany('App\Models\Tasks','userId')->with('taskPostedUser')->where('status','pending');
    }
    public function assignedTask()
    {
        return $this->hasMany('App\Models\Tasks','userId')->with('taskPostedUser');
    }
    public function completedTask()
    {
        return $this->hasMany('App\Models\Tasks','userId')->with('taskPostedUser')->where('status','completed');
    }
    public function offer_task()
    {
       // return $this->hasMany('App\Models\Offers','interestedUsreId')->with('mytask');

         return $this->belongsToMany('App\Models\Tasks', 'offers','interestedUsreId','taskId')->with('taskPostedUser')->groupBy('offers.taskId')->orderBy('offers.id','desc');
    }

     public function offers_pending()
    {
       // return $this->hasMany('App\Models\Offers','interestedUsreId')->with('mytask');

         return $this->belongsToMany('App\Models\Tasks', 'offers','interestedUsreId','taskId')->with('taskPostedUser')->groupBy('offers.taskId')->orderBy('offers.id','desc');
    }

      public function offers_accepting()
    {
       // return $this->hasMany('App\Models\Offers','interestedUsreId')->with('mytask');

         return $this->belongsToMany('App\Models\Tasks', 'offers','interestedUsreId','taskId')->with('taskPostedUser')->groupBy('offers.taskId')->orderBy('offers.id','desc');
    }

    

    public function myOffer()
    {
       // return $this->hasMany('App\Models\Offers','interestedUsreId')->with('mytask');

         return $this->belongsToMany('App\Models\Tasks', 'offers','interestedUsreId','taskId')->with('taskPostedUser')->groupBy('offers.taskId')->orderBy('offers.id','desc');
    }

   

    

}
