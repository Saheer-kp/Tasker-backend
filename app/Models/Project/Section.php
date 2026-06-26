<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'project_id'];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    // ഒരു സെക്ഷന്റെ കീഴിൽ ഒരുപാട് ടാസ്കുകൾ ഉണ്ടാകാം
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
