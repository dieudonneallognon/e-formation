<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo as BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany as BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany as HasMany;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

/**
 * App\Models\Formation.
 *
 * @property int $id
 * @property string $designation
 * @property string $description
 * @property string $type
 * @property string $image
 * @property string $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\FormationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Formation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Formation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Formation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Formation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formation whereDesignation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formation whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formation wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formation whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Formation extends Model
{
    use HasFactory;

    /**
     * The Formation image name pattern.
     *
     * @var string
     */
    const IMAGE_PATTERN = 'image-formations-?.?';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'formations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'designation',
        'description',
        'type',
        'image',
        'price',
        'user_id'
    ];

    public static function boot()
    {
        parent::boot();
        self::deleting(function ($formation) { // before delete() method call this
            $formation->chapters()->each(function ($chapter) {
                $chapter->delete(); // <-- direct deletion
            });

            $formation->categoryLinks()->each(function ($link) {
                $link->delete();
            });
            // do the rest of the cleanup...
        });
    }

    public function getImage() {
        return (Str::contains($this->image, 'https'))
            ? $this->image
            : asset("storage/$this->image");
    }

    /**
     * Get the user that owns the Formation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get all of the chapters for the Formation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function chapters(): HasMany
    {
        return $this->hasMany(Chapter::class, 'formation_id', 'id');
    }


    /**
     * The categories that belong to the Formation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'formations_categories', 'formation_id', 'category_id');
    }
}
