<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
//    use HasFactory;
     protected $fillable = [
        'user_id',
        'socials',
        'summary',
        'description',
         'feature',
         ];


     public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
     {
         return $this->belongsTo(User::class);
     }

//    protected function data(): Attribute
//    {
//        return Attribute::make(
//            get: fn ($value) => json_decode($value, true),
//            set: fn ($value) => json_encode($value),
//        );
//    }
}
