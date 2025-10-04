<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'avatar',
        'language',
        'timezone',
        'is_active',
        'last_login_at',
        'email_verified_at',
        'profile_data',
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
        'last_login_at' => 'datetime',
        'profile_data' => 'array',
        'is_active' => 'boolean',
        'password' => 'hashed',
    ];

    /**
     * Activity log options
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'email', 'is_active'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }

    /**
     * Get the user's full name with Arabic support
     */
    public function getFullNameAttribute(): string
    {
        return $this->name;
    }

    /**
     * Get user's preferred language
     */
    public function getLanguageAttribute($value): string
    {
        return $value ?? app()->getLocale();
    }

    /**
     * Check if user is super admin
     */
    public function isSuperAdmin(): bool
    {
        return $this->hasRole('super_admin');
    }

    /**
     * Check if user is admin
     */
    public function isAdmin(): bool
    {
        return $this->hasAnyRole(['super_admin', 'admin']);
    }

    /**
     * Check if user can manage content
     */
    public function canManageContent(): bool
    {
        return $this->hasAnyRole(['super_admin', 'admin', 'content_manager', 'editor']);
    }

    /**
     * Get user's avatar URL
     */
    public function getAvatarUrlAttribute(): string
    {
        if ($this->avatar) {
            return asset('storage/' . $this->avatar);
        }
        
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=7F9CF5&background=EBF4FF';
    }

    /**
     * Relationship with pages created by user
     */
    public function pages()
    {
        return $this->hasMany(Page::class, 'created_by');
    }

    /**
     * Relationship with posts created by user
     */
    public function posts()
    {
        return $this->hasMany(Post::class, 'created_by');
    }

    /**
     * Relationship with media uploaded by user
     */
    public function mediaUploads()
    {
        return $this->hasMany(Media::class, 'uploaded_by');
    }

    /**
     * Scope for active users
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for users with specific role
     */
    public function scopeWithRole($query, $role)
    {
        return $query->whereHas('roles', function ($q) use ($role) {
            $q->where('name', $role);
        });
    }

    /**
     * Get user's timezone
     */
    public function getTimezoneAttribute($value): string
    {
        return $value ?? config('app.timezone', 'UTC');
    }

    /**
     * Update last login timestamp
     */
    public function updateLastLogin(): void
    {
        $this->update(['last_login_at' => now()]);
    }

    /**
     * Check if user has Arabic as preferred language
     */
    public function prefersArabic(): bool
    {
        return $this->language === 'ar';
    }

    /**
     * Get localized user data
     */
    public function getLocalizedData(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'language' => $this->language,
            'avatar_url' => $this->avatar_url,
            'is_active' => $this->is_active,
            'roles' => $this->roles->pluck('name'),
            'last_login' => $this->last_login_at?->format('Y-m-d H:i:s'),
        ];
    }
}