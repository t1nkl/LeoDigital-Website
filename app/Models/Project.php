<?php

namespace App\Models;

use App\Traits\CustomCrudTrait;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Backpack\CRUD\ModelTraits\SpatieTranslatable\HasTranslations;

class Project extends Model
{
	use CustomCrudTrait;
	use Sluggable, SluggableScopeHelpers;
    use HasTranslations;

     /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

	protected $table = 'projects';
	protected $primaryKey = 'id';
	public $timestamps = true;
	protected $guarded = ['id'];
    protected $translatable = ['title', 'description', 'content'];
	// protected $fillable = [];
	// protected $hidden = [];
    // protected $dates = [];
  	// public $timestamps = true;

  	/**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'slug_or_title',
            ],
        ];
    }

	/*
	|--------------------------------------------------------------------------
	| FUNCTIONS
	|--------------------------------------------------------------------------
	*/

    public static function getProjects()
    {
        return self::published()->get();
    }

	/*
	|--------------------------------------------------------------------------
	| RELATIONS
	|--------------------------------------------------------------------------
	*/

	/*
	|--------------------------------------------------------------------------
	| SCOPES
	|--------------------------------------------------------------------------
	*/

	public function scopePublished($query)
    {
        return $query->where('status', 'PUBLISHED')->orderBy('rgt');
    }

	/*
	|--------------------------------------------------------------------------
	| ACCESORS
	|--------------------------------------------------------------------------
	*/

	// The slug is created automatically from the "title" field if no slug exists.
    public function getSlugOrTitleAttribute()
    {
        if ($this->slug != '') {
            return $this->slug;
        }

        return str_slug($this->title);
    }

	/*
	|--------------------------------------------------------------------------
	| MUTATORS
	|--------------------------------------------------------------------------
	*/

    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = "uploads";
        $destination_path = "KEYS/".$this->getSlugOrTitleAttribute();
        $image_width = 570;
        $image_height = 381;

        if ($value==null) {
            // delete the image from disk
            \Storage::disk($disk)->delete($this->image);

            // set null in the database column
            $this->attributes[$attribute_name] = null;
        }

        // if a base64 was sent, store it in the db
        if (starts_with($value, 'data:image'))
        {
            // 0. Make the image
            $image = \Image::make($value)->resize($image_width, $image_height, function ($constraint) {
                $constraint->aspectRatio();
            });
            // 1. Generate a filename.
            $filename = md5($value.time()).'.png';

            // 2. Store the image on disk.
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());

            // 3. Save the path to the database
            $this->attributes[$attribute_name] = '/'.$disk.'/'.$destination_path.'/'.$filename;
        }
    }

    public function setBannerAttribute($value)
    {
        $attribute_name = "banner";
        $disk = "uploads";
        $destination_path = "KEYS/".$this->getSlugOrTitleAttribute();
        $image_width = 1600;
        $image_height = NULL;

        if ($value==null) {
            // delete the image from disk
            \Storage::disk($disk)->delete($this->image);

            // set null in the database column
            $this->attributes[$attribute_name] = null;
        }

        // if a base64 was sent, store it in the db
        if (starts_with($value, 'data:image'))
        {
            // 0. Make the image
            $image = \Image::make($value)->resize($image_width, $image_height, function ($constraint) {
                $constraint->aspectRatio();
            });
            // 1. Generate a filename.
            $filename = md5($value.time()).'.png';

            // 2. Store the image on disk.
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());

            // 3. Save the path to the database
            $this->attributes[$attribute_name] = '/'.$disk.'/'.$destination_path.'/'.$filename;
        }
    }

    public function setPdfAttribute($value)
    {
        $attribute_name = "pdf";
        $disk = "uploads";
        $destination_path = "KEYS/".$this->getSlugOrTitleAttribute();

        $this->uploadPdfToDisk($value, $attribute_name, $disk, $destination_path);
    }

    public function setKeysPhotoAttribute($value)
    {
        $attribute_name = "keys_photo";
        $disk = "uploads";
        $destination_path = "KEYS/".$this->getSlugOrTitleAttribute();

        $this->uploadImageToDisk($value, $attribute_name, $disk, $destination_path);
    }

}
