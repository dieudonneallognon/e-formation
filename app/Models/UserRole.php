<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserRole.
 *
 * @property int $id
 * @property string $name
 * @method static \Database\Factories\UserRoleFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRole query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRole whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRole whereName($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 */
class UserRole extends Model
{
    use HasFactory;

    /**
     * The admin role constant value.
     *
     * @var string
     */
    public const ADMIN_ROLE = 'admin';

    /**
     * The formator role constant value.
     *
     * @var string
     */
    public const FORMATOR_ROLE = 'formator';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Returns the number of distincts roles.
     *
     * @return int
     */
    public static function number()
    {
        return count([self::ADMIN_ROLE, self::FORMATOR_ROLE]);
    }

    /**
     * Get all of the users for the UserRole.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class, 'role_id', 'id');
    }
}
