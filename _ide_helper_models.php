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
 * App\Models\Icon
 *
 * @property int $id
 * @property string $ios
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Icon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Icon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Icon whereIos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Icon whereUpdatedAt($value)
 */
	class Icon extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Ingredient
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ingredient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ingredient whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ingredient whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ingredient whereUpdatedAt($value)
 */
	class Ingredient extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Coffee
 *
 * @property int $id
 * @property string $name
 * @property int $cup_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Cup $cup
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Ingredient[] $ingredients
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Coffee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Coffee whereCupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Coffee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Coffee whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Coffee whereUpdatedAt($value)
 */
	class Coffee extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Cup
 *
 * @property int $id
 * @property string $name
 * @property int $volume
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cup whereVolume($value)
 */
	class Cup extends \Eloquent {}
}

