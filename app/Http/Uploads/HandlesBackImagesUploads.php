<?php

namespace App\Http\Uploads;

use Intervention\Image\Facades\Image;

trait HandlesBackImagesUploads
{
    public function resizeAndSaveBack($uploaded_back_image)
    {
        $ext = $uploaded_back_image->getClientOriginalExtension();
        $name = sha1_file($uploaded_back_image);
        $img = Image::make($uploaded_back_image);

        $img->fit(1920, 550);
        $img->save('img-redimensions/back/' . $name . '.' . $ext);
        return $name . '.' . $ext;
    }

    public function resizeAndSaveBackFull($uploaded_back_image)
    {
        $ext = $uploaded_back_image->getClientOriginalExtension();
        $name = sha1_file($uploaded_back_image);
        $img = Image::make($uploaded_back_image);

        $img->fit(2560, 600);
        $img->save('img-redimensions/back/' . 'full-' . $name . '.' . $ext);
        return $name . '.' . $ext;
    }

    public function resizeAndSaveBackTiny($uploaded_back_image)
    {
        $ext = $uploaded_back_image->getClientOriginalExtension();
        $name = sha1_file($uploaded_back_image);
        $img = Image::make($uploaded_back_image);

        $img->fit(140, 140);
        $img->save('img-redimensions/back/' . 'tiny-' . $name . '.' . $ext);
        return $name . '.' . $ext;
    }

    public function srcsetBackFull($uploaded_back_image)
    {
        $ext_back = $uploaded_back_image->getClientOriginalExtension();
        $name_back = sha1_file($uploaded_back_image);
        $img = Image::make($uploaded_back_image);
        $img->fit(2560, 600);

        $full_srcset_back_640_path = 'img-redimensions/back/srcset/' . 'full-640-' . $name_back . '.' . $ext_back;
        $full_srcset_back_768_path = 'img-redimensions/back/srcset/' . 'full-768-' . $name_back . '.' . $ext_back;
        $full_srcset_back_1024_path = 'img-redimensions/back/srcset/' . 'full-1024-' . $name_back . '.' . $ext_back;
        $full_srcset_back_1280_path = 'img-redimensions/back/srcset/' . 'full-1280-' . $name_back . '.' . $ext_back;
        $full_srcset_back_1520_path = 'img-redimensions/back/srcset/' . 'full-1520-' . $name_back . '.' . $ext_back;
        $full_srcset_back_2040_path = 'img-redimensions/back/srcset/' . 'full-2040-' . $name_back . '.' . $ext_back;
        $full_srcset_back_2560_path = 'img-redimensions/back/srcset/' . 'full-2560-' . $name_back . '.' . $ext_back;

        Image::make($img)->fit( 640, 200)->save($full_srcset_back_640_path);
        Image::make($img)->fit(2560, 500)->save($full_srcset_back_2560_path);
        Image::make($img)->fit(2040, 414)->save($full_srcset_back_2040_path);
        Image::make($img)->fit(1520,314)->save($full_srcset_back_1520_path);
        Image::make($img)->fit(1280,280)->save($full_srcset_back_1280_path);
        Image::make($img)->fit(1024,245)->save($full_srcset_back_1024_path);
        Image::make($img)->fit(758,225)->save($full_srcset_back_768_path);

        return [
            '640' => $full_srcset_back_640_path,
            '768' => $full_srcset_back_768_path,
            '1024' => $full_srcset_back_1024_path,
            '1280' => $full_srcset_back_1280_path,
            '1520' => $full_srcset_back_1520_path,
            '2040' => $full_srcset_back_2040_path,
            '2560' => $full_srcset_back_2560_path,
        ];
    }

    public function srcsetBackTiny($uploaded_back_image)
    {
        $ext_back = $uploaded_back_image->getClientOriginalExtension();
        $name_back = sha1_file($uploaded_back_image);
        $img = Image::make($uploaded_back_image);
        $img->fit(140, 140);

        $tiny_srcset_back_640_path = 'img-redimensions/back/srcset/' . 'tiny-640-' . $name_back . '.' . $ext_back;
        $tiny_srcset_back_768_path = 'img-redimensions/back/srcset/' . 'tiny-768-' . $name_back . '.' . $ext_back;
        $tiny_srcset_back_1024_path = 'img-redimensions/back/srcset/' . 'tiny-1024-' . $name_back . '.' . $ext_back;
        $tiny_srcset_back_1280_path = 'img-redimensions/back/srcset/' . 'tiny-1280-' . $name_back . '.' . $ext_back;
        $tiny_srcset_back_1520_path = 'img-redimensions/back/srcset/' . 'tiny-1520-' . $name_back . '.' . $ext_back;
        $tiny_srcset_back_2040_path = 'img-redimensions/back/srcset/' . 'tiny-2040-' . $name_back . '.' . $ext_back;
        $tiny_srcset_back_2560_path = 'img-redimensions/back/srcset/' . 'tiny-2560-' . $name_back . '.' . $ext_back;

        Image::make($img)->resize(140, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($tiny_srcset_back_2560_path);
        Image::make($img)->resize(140, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($tiny_srcset_back_2040_path);
        Image::make($img)->resize(108, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($tiny_srcset_back_1520_path);
        Image::make($img)->resize(108, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($tiny_srcset_back_1280_path);
        Image::make($img)->resize(108, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($tiny_srcset_back_1024_path);
        Image::make($img)->resize(108, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($tiny_srcset_back_768_path);
        Image::make($img)->resize(108, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($tiny_srcset_back_640_path);

        return [
            '640' => $tiny_srcset_back_640_path,
            '768' => $tiny_srcset_back_768_path,
            '1024' => $tiny_srcset_back_1024_path,
            '1280' => $tiny_srcset_back_1280_path,
            '1520' => $tiny_srcset_back_1520_path,
            '2040' => $tiny_srcset_back_2040_path,
            '2560' => $tiny_srcset_back_2560_path,
        ];
    }
}
