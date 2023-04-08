<?php

namespace App\Http\Uploads;

use Intervention\Image\Facades\Image;

trait HandlesImagesUploads
{
    public function resizeAndSave($uploaded_image)
    {
        $ext = $uploaded_image->getClientOriginalExtension();
        $name = sha1_file($uploaded_image);
        $img = Image::make($uploaded_image);

        $img->fit(200, 200);
        $img->save('img-redimensions/avatars/' . $name . '.' . $ext);
        return $name . '.' . $ext;
    }

    public function resizeAndSaveFull($uploaded_image)
    {
        $ext = $uploaded_image->getClientOriginalExtension();
        $name = sha1_file($uploaded_image);
        $img = Image::make($uploaded_image);

        $img->fit(500, 500);
        $img->save('img-redimensions/avatars/' . 'full-' . $name . '.' . $ext);
        return $name . '.' . $ext;
    }

    public function resizeAndSaveThumb($uploaded_image)
    {
        $ext = $uploaded_image->getClientOriginalExtension();
        $name = sha1_file($uploaded_image);
        $img = Image::make($uploaded_image);

        $img->fit(150, 150);
        $img->save('img-redimensions/avatars/' . 'thumbnail-' . $name . '.' . $ext);
        return $name . '.' . $ext;
    }

    public function resizeAndSaveTiny($uploaded_image)
    {
        $ext = $uploaded_image->getClientOriginalExtension();
        $name = sha1_file($uploaded_image);
        $img = Image::make($uploaded_image);

        $img->fit(140, 140);
        $img->save('img-redimensions/avatars/' . 'tiny-' . $name . '.' . $ext);
        return $name . '.' . $ext;
    }

    public function srcsetThumb($uploaded_image)
    {
        $ext = $uploaded_image->getClientOriginalExtension();
        $name = sha1_file($uploaded_image);
        $thumbnail_srcset_1280_path = 'img-redimensions/avatars/srcset/' . 'thumbnail-1280-' . $name . '.' . $ext;
        $thumbnail_srcset_1520_path = 'img-redimensions/avatars/srcset/' . 'thumbnail-1520-' . $name . '.' . $ext;
        $thumbnail_srcset_2040_path = 'img-redimensions/avatars/srcset/' . 'thumbnail-2040-' . $name . '.' . $ext;
        $thumbnail_srcset_2560_path = 'img-redimensions/avatars/srcset/' . 'thumbnail-2560-' . $name . '.' . $ext;

        Image::make($uploaded_image)->resize(150, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($thumbnail_srcset_2560_path);
        Image::make($uploaded_image)->resize(135, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($thumbnail_srcset_2040_path);
        Image::make($uploaded_image)->resize(115, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($thumbnail_srcset_1520_path);
        Image::make($uploaded_image)->resize(115, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($thumbnail_srcset_1280_path);

        return
            [
                '1280' => $thumbnail_srcset_1280_path,
                '1520' => $thumbnail_srcset_1520_path,
                '2040' => $thumbnail_srcset_2040_path,
                '2560' => $thumbnail_srcset_2560_path,
                ];
    }
    public function srcsetFull($uploaded_image){
        $ext = $uploaded_image->getClientOriginalExtension();
        $name = sha1_file($uploaded_image);

        $full_srcset_640_path = 'img-redimensions/avatars/srcset/' . 'full-640-' . $name . '.' . $ext;
        $full_srcset_768_path = 'img-redimensions/avatars/srcset/' . 'full-768-' . $name . '.' . $ext;
        $full_srcset_1024_path = 'img-redimensions/avatars/srcset/' . 'full-1024-' . $name . '.' . $ext;
        $full_srcset_1280_path = 'img-redimensions/avatars/srcset/' . 'full-1280-' . $name . '.' . $ext;
        $full_srcset_1520_path = 'img-redimensions/avatars/srcset/' . 'full-1520-' . $name . '.' . $ext;
        $full_srcset_2040_path = 'img-redimensions/avatars/srcset/' . 'full-2040-' . $name . '.' . $ext;
        $full_srcset_2560_path = 'img-redimensions/avatars/srcset/' . 'full-2560-' . $name . '.' . $ext;


        Image::make($uploaded_image)->resize(500, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($full_srcset_2560_path);
        Image::make($uploaded_image)->resize(414, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($full_srcset_2040_path);
        Image::make($uploaded_image)->resize(314, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($full_srcset_1520_path);
        Image::make($uploaded_image)->resize(280, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($full_srcset_1280_path);
        Image::make($uploaded_image)->resize(245, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($full_srcset_1024_path);
        Image::make($uploaded_image)->resize(225, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($full_srcset_768_path);
        Image::make($uploaded_image)->resize(200, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($full_srcset_640_path);

        return [
            '640' => $full_srcset_640_path,
            '768' => $full_srcset_768_path,
            '1024' => $full_srcset_1024_path,
            '1280' => $full_srcset_1280_path,
            '1520' => $full_srcset_1520_path,
            '2040' => $full_srcset_2040_path,
            '2560' => $full_srcset_2560_path,
        ];
    }

    public function srcsetTiny($uploaded_image){
        $ext = $uploaded_image->getClientOriginalExtension();
        $name = sha1_file($uploaded_image);

        $tiny_srcset_640_path = 'img-redimensions/avatars/srcset/' . 'tiny-640-' . $name . '.' . $ext;
        $tiny_srcset_768_path = 'img-redimensions/avatars/srcset/' . 'tiny-768-' . $name . '.' . $ext;
        $tiny_srcset_1024_path = 'img-redimensions/avatars/srcset/' . 'tiny-1024-' . $name . '.' . $ext;
        $tiny_srcset_1280_path = 'img-redimensions/avatars/srcset/' . 'tiny-1280-' . $name . '.' . $ext;
        $tiny_srcset_1520_path = 'img-redimensions/avatars/srcset/' . 'tiny-1520-' . $name . '.' . $ext;
        $tiny_srcset_2040_path = 'img-redimensions/avatars/srcset/' . 'tiny-2040-' . $name . '.' . $ext;
        $tiny_srcset_2560_path = 'img-redimensions/avatars/srcset/' . 'tiny-2560-' . $name . '.' . $ext;


        Image::make($uploaded_image)->resize(140, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($tiny_srcset_2560_path);
        Image::make($uploaded_image)->resize(140, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($tiny_srcset_2040_path);
        Image::make($uploaded_image)->resize(108, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($tiny_srcset_1520_path);
        Image::make($uploaded_image)->resize(108, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($tiny_srcset_1280_path);
        Image::make($uploaded_image)->resize(108, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($tiny_srcset_1024_path);
        Image::make($uploaded_image)->resize(108, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($tiny_srcset_768_path);
        Image::make($uploaded_image)->resize(108, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($tiny_srcset_640_path);

        return [
            '640' => $tiny_srcset_640_path,
            '768' => $tiny_srcset_768_path,
            '1024' => $tiny_srcset_1024_path,
            '1280' => $tiny_srcset_1280_path,
            '1520' => $tiny_srcset_1520_path,
            '2040' => $tiny_srcset_2040_path,
            '2560' => $tiny_srcset_2560_path,
            ];
    }
}
