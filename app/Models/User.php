<?php


// use Illuminate\Contracts\Auth\MustVerifyEmail;

namespace App\Models;

use App\Models\Roles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'roles_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role()
    {
        return $this->belongsTo(Roles::class, 'roles_id');
    }

    public function hasRole(string $role): bool
    {
        return $this->role && $this->role->role_name === $role;
    }

    public function hasAnyRole(array $roles): bool
    {
        return $this->role && in_array($this->role->role_name, $roles);
    }

    public function isOwner(): bool
    {
        return $this->hasRole('owner');
    }

    public function canManageUsers(): bool
    {
        return $this->isOwner() || $this->hasRole('admin');
    }
}
