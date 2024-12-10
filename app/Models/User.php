<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'surname',
        'email',
        'password',
        'is_active',
        'enable2fa',
        'suspended',
        'country',
        'state',
        'usertype',
        'image',
		'is_active',
		'show_proposal',
		'intro'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function isActive()
    {
        if($this->is_active=='active'){
            return true;
        }else{
            return false;
        }
        
        
    }

    public function userdetail(){
        return $this->belongsTo(UserDetail::class,'id','user_id');
    }

    public function bankinfo(){
        return $this->belongsTo(BankInformation::class,'id','user_id');
    }

    public function speakerReviewsApproved(){
        return $this->hasMany(Review::class,'reviewed_id','id')
		->where('approved_speaker', 1)
                ->where('approved_admin', 1);
    }
	
    public function speakerReviews(){
        return $this->hasMany(Review::class,'reviewed_id','id');
    }

    public function userReviews(){
        return $this->belongsTo(Review::class,'reviewer_id','id'); 
    }

    public function averageRating()
    {
        $totalRating = $this->speakerReviews()->sum('rating');
        $numberOfFeedbacks = $this->speakerReviews()->count();
        return $numberOfFeedbacks > 0 ? $totalRating / $numberOfFeedbacks : 0;
    }

    public function getLowestPrice()
    {
        return $this->services()->min('price');
    }

   
    public function getHighestPrice()
    {
        return $this->services()->max('price');
    }
	
	public function getLowestPriceLocal()
    {
        return $this->services()->min('local_price');
    }

   
    public function getHighestPriceLocal()
    {
        return $this->services()->max('local_price');
    }

    /**
     * Define the relationship with the services table.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function services()
    {
        return $this->hasMany(ServicePrice::class, 'user_id');
    }

    public function speakerpackages(){
        return $this->hasMany(EventPackage::class,'user_id','id');
    }



    public function speakerBooking(){
        return $this->hasMany(Booking::class,'speaker_id','id');
    }

    public function userBooking(){
        return $this->hasMany(Booking::class,'user_id','id');
    }


    public function getBookedDates()
    {
        // Fetch dates based on room id and booking status (pending or approved)
        $bookedDates = Booking::where('speaker_id', $this->id)
            ->whereIn('status', ['pending', 'approved'])
            ->pluck('datetime')
            ->toArray();

        // Merge the dates into a single array
        $allBookedDates = [];
        foreach ($bookedDates as $dates) {
            $allBookedDates = array_merge($allBookedDates, json_decode($dates, true));
        }

        return $allBookedDates;
    }

    public function myReviewForthisSpeaker($id){
        return Review::where('reviewer_id',$this->id)->where('reviewed_id',$id)->first();
    }


    
}
