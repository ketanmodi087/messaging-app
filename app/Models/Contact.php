<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'contact_user_id',
        'phone'
    ];

    /**
     * Get the user that owns the contact.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the messages for the contact.
     */
    public function messages()
    {
        return $this->hasMany(Message::class, 'contact_id');
    }

    /**
     * Get the contact user associated with the contact.
     */
    public function contactUser()
    {
        return $this->belongsTo(User::class, 'contact_user_id');
    }
}
