<?php

namespace App\Http\Uploads;

use Intervention\Image\Facades\Image;

trait HandlesImagesUploads
{
    public function resizeAndSaveSupplies($uploaded_image)
    {
        $ext = $uploaded_image->getClientOriginalExtension();
        $name = sha1_file($uploaded_image);
        $img = Image::make($uploaded_image);

        $img->save('storage/supplies/pictures/' . $name . '.' . $ext);
        return $name . '.' . $ext;
    }
    public function resizeAndSaveAvatar($uploaded_image)
    {
        $ext = $uploaded_image->getClientOriginalExtension();
        $name = sha1_file($uploaded_image);
        $img = Image::make($uploaded_image);

        $img->save('storage/profil/avatar/' . $name . '.' . $ext);
        return $name . '.' . $ext;
    }
    public function resizeAndSavePictures($uploaded_image)
    {
        $ext = $uploaded_image->getClientOriginalExtension();
        $name = sha1_file($uploaded_image);
        $img = Image::make($uploaded_image);

        $img->save('storage/profil/pictures/' . $name . '.' . $ext);
        return $name . '.' . $ext;
    }
    public function resizeAndSavePlan($uploaded_image)
    {
        $ext = $uploaded_image->getClientOriginalExtension();
        $name = sha1_file($uploaded_image);
        $img = Image::make($uploaded_image);

        $img->save('storage/plans/images/' . $name . '.' . $ext);
        return $name . '.' . $ext;
    }
    public function resizeAndSaveFabric($uploaded_image)
    {
        $ext = $uploaded_image->getClientOriginalExtension();
        $name = sha1_file($uploaded_image);
        $img = Image::make($uploaded_image);

        $img->save('storage/technical/fabric/' . $name . '.' . $ext);
        return $name . '.' . $ext;
    }
    public function resizeAndSaveStep($uploaded_image)
    {
        $ext = $uploaded_image->getClientOriginalExtension();
        $name = sha1_file($uploaded_image);
        $img = Image::make($uploaded_image);

        $img->save('storage/plans/steps/' . $name . '.' . $ext);
        return $name . '.' . $ext;
    }
    public function resizeAndSaveGradation($uploaded_image)
    {
        $ext = $uploaded_image->getClientOriginalExtension();
        $name = sha1_file($uploaded_image);
        $img = Image::make($uploaded_image);

        $img->save('storage/technical/gradation/' . $name . '.' . $ext);
        return $name . '.' . $ext;
    }
}
