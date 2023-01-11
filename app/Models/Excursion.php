<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\Support\File;


class Excursion extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $connection = 'site';

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('gallery')
            ->acceptsFile(function (File $file) {
                return $file->mimeType === 'image/jpg' ||
                    $file->mimeType === 'image/jpeg' ||
                    $file->mimeType === 'image/png';
            })
            ->useDisk('excursions');
    }

}
