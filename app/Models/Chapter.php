<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo as BelongsTo;

/**
 * App\Models\Chapter.
 *
 * @property int $id
 * @property string $number
 * @property string $title
 * @property string $content
 * @property int $formation_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ChapterFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter query()
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter whereFormationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Chapter extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'chapters';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number',
        'title',
        'formation_id',
    ];

    /**
     * Get the formation that owns the Chapter.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(Formation::class, 'formation_id', 'id');
    }
}
