<?php

namespace App\Models\Project;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // ഒരു പ്രൊജക്റ്റിന് ഒരുപാട് സെക്ഷൻസ് ഉണ്ടാകാം
    public function sections(): HasMany
    {
        return $this->hasMany(Section::class);
    }
}
