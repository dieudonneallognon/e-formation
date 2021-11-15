<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Category.
 *
 * @property int $id
 * @property string $name
 * @method static \Database\Factories\CategoryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Formation[] $formations
 * @property-read int|null $formations_count
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
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
 * @property-read \App\Models\Formation $user
 */
	class Chapter extends \Eloquent {}
}

namespace App\Models{
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
 * @property int $user_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\FormationCategoryLink[] $categoryLinks
 * @property-read int|null $category_links_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Chapter[] $chapters
 * @property-read int|null $chapters_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Formation whereUserId($value)
 */
	class Formation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\FormationCategoryLink
 *
 * @property int $id
 * @property int $formation_id
 * @property int $category_id
 * @method static \Illuminate\Database\Eloquent\Builder|FormationCategoryLink newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormationCategoryLink newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FormationCategoryLink query()
 * @method static \Illuminate\Database\Eloquent\Builder|FormationCategoryLink whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormationCategoryLink whereFormationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FormationCategoryLink whereId($value)
 */
	class FormationCategoryLink extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User.
 *
 * @property int $id
 * @property string $firstName
 * @property string $lastName
 * @property string $email
 * @property string $password
 * @property int $role_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Formation[] $formation
 * @property-read int|null $formation_count
 * @property-read \App\Models\UserRole $role
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
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
	class UserRole extends \Eloquent {}
}

