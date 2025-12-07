<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageUploadService
{
    /**
     * Store temporary image during session (before fundraiser is created)
     */
    public function storeTemporaryImage(UploadedFile $file): string
    {
        // Store in temp folder
        $path = $file->store('fundraisers/temp', 'public');

        return $path;
    }

    /**
     * Move temporary image to permanent storage
     */
    public function moveTemporaryToPermanent(string $tempPath, int $fundraiserId): string
    {
        // Generate new path
        $filename = basename($tempPath);
        $permanentPath = "fundraisers/{$fundraiserId}/{$filename}";

        // Copy file to permanent location
        $tempFullPath = storage_path('app/public/' . $tempPath);
        $permanentFullPath = storage_path('app/public/' . $permanentPath);

        // Create directory if it doesn't exist
        $directory = dirname($permanentFullPath);
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }

        // Copy file
        copy($tempFullPath, $permanentFullPath);

        // Delete temp file
        Storage::disk('public')->delete($tempPath);

        return $permanentPath;
    }

    /**
     * Upload and process fundraiser image
     */
    public function uploadFundraiserImage(UploadedFile $file, int $fundraiserId): string
    {
        // Generate unique filename
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $path = "fundraisers/{$fundraiserId}/{$filename}";

        // Store original image
        $file->storeAs("fundraisers/{$fundraiserId}", $filename, 'public');

        return $path;
    }

    /**
     * Delete image from storage
     */
    public function deleteImage(string $path): bool
    {
        if (Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->delete($path);
        }

        return false;
    }

    /**
     * Delete all images for a fundraiser
     */
    public function deleteFundraiserImages(int $fundraiserId): bool
    {
        $directory = "fundraisers/{$fundraiserId}";

        if (Storage::disk('public')->exists($directory)) {
            return Storage::disk('public')->deleteDirectory($directory);
        }

        return false;
    }

    /**
     * Clean up temporary images older than 24 hours
     */
    public function cleanupTempImages(): int
    {
        $tempPath = 'fundraisers/temp';
        $count = 0;

        if (!Storage::disk('public')->exists($tempPath)) {
            return 0;
        }

        $files = Storage::disk('public')->files($tempPath);

        foreach ($files as $file) {
            // Check if file is older than 24 hours
            $lastModified = Storage::disk('public')->lastModified($file);
            if (time() - $lastModified > 86400) { // 24 hours
                Storage::disk('public')->delete($file);
                $count++;
            }
        }

        return $count;
    }

    /**
     * Get image URL
     */
    public function getImageUrl(string $path): string
    {
        return asset('storage/' . $path);
    }

    /**
     * Validate image file
     */
    public function validateImage(UploadedFile $file): array
    {
        $errors = [];

        // Check file size (5MB max)
        if ($file->getSize() > 5242880) {
            $errors[] = 'Image must not exceed 5MB';
        }

        // Check mime type
        $allowedMimes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($file->getMimeType(), $allowedMimes)) {
            $errors[] = 'Image must be JPG, PNG, or GIF format';
        }

        return $errors;
    }
}
