<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

/**
 * Extending Class Helper for Image compressing system purpose with GD extension on PHP.
 *
 * @see https://www.php.net/manual/en/book.image.php
 * @see https://www.php.net/manual/en/function.imagewebp.php
 * @see https://www.php.net/manual/en/function.imagepng.php
 * @see https://www.php.net/manual/en/function.imagejpeg.php
 * @see https://www.php.net/manual/en/function.imagepng.php
 * @see https://www.abstractapi.com/guides/how-to-compress-images-in-php
 * @see https://phppot.com/php/php-compress-image/
 * @package hummatech
 * @author cakadi190
 */
class ImageCompressing
{
    /**
     * Image Compressing action (but not copy the image)
     *
     * @param UploadedFile $request
     * @param string $targetPath
     * @param array{name:string, duplicate:bool, quality:int} $options The compress option
     * @return \Illuminate\Support\Collection<array-key, mixed>
     */
    public static function process($fileName, UploadedFile $request, string $targetPath, array $options = [])
    {
        $number = 1;
        $fileName = $options['name'] ?? $fileName.$number++;
        $originalFileExt = $request->getClientOriginalExtension();

        $uploadImage = $request->storeAs("{$targetPath}", "{$fileName}.{$originalFileExt}", 'public');
        $compressTargetImage = "storage/{$uploadImage}";

        $options['targetPath'] = $targetPath;
        $options['name'] = $fileName;
        $options['extension'] = $originalFileExt;
        $options['original_uploaded_file'] = $compressTargetImage;

        $compressResult = self::processCompressImage($compressTargetImage, $options);

        return collect([
            ...$compressResult,
            ...$options,
        ]);
    }

    /**
     * Process image compressing
     *
     * @param string $imagePath
     * @param array $options
     */
    public static function processCompressImage(string $imagePath, array $options = [])
    {
        $imageInfo = self::getFileInfo($imagePath);
        if ($imageInfo['mime'] == 'image/gif') {
            $imageLayer = imagecreatefromgif($imagePath);
        } elseif ($imageInfo['mime'] == 'image/jpeg') {
            $imageLayer = imagecreatefromjpeg($imagePath);
        } elseif ($imageInfo['mime'] == 'image/png') {
            $imageLayer = imagecreatefrompng($imagePath);
        }

        $filename = "{$options['targetPath']}/{$options['name']}.webp";
        $filePath = public_path("storage/{$filename}");
        imagewebp($imageLayer, $filePath, $options['quality'] ?? 50);

        if (!isset($options['duplicate']) || !$options['duplicate']) {
            unlink($options['original_uploaded_file']);
            $files = $filename;
        } else {
            $filenameOriginal = "{$options['targetPath']}/{$options['name']}.jpg";
            $filePathOriginal = public_path("storage/{$filenameOriginal}");
            imagejpeg($imageLayer, $filePathOriginal, $options['quality'] ?? 50);

            $files = [
                $filename,
                $filenameOriginal,
            ];
        }

        return [
            'files' => $files,
        ];
    }

    /**
     * Getting file info
     *
     * @param UploadedFile $request
     * @return array
     */
    public static function getFileInfo(string $imageTarget)
    {
        return getimagesize($imageTarget);
    }
}
