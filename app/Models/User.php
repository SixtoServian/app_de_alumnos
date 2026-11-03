<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

#[Fillable([
    'name',
    'email',
    'password',
    'is_admin',
    'phone',
    'professional_url',
    'photo_path',
])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean',
        ];
    }

    /** URL pública de la foto de perfil */
    protected function photoUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->photo_path
                ? Storage::disk('public')->url($this->photo_path)
                : null,
        );
    }

    /** URL de WhatsApp usando el prefijo configurado en .env */
    protected function whatsappUrl(): Attribute
    {
        return Attribute::make(
            get: function () {
                if (! $this->phone) {
                    return null;
                }

                $prefix = env('WHATSAPP_COUNTRY_CODE', '+54');
                $digits = preg_replace('/\D/', '', $this->phone);

                return 'https://wa.me/'.$prefix.$digits;
            },
        );
    }
}