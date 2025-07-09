<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class StudentPermissionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->model->student->user->name,
            'profile' => $this->model->student->image != null ? asset(request()->root(). '/storage/'.$this->model->student->image) : asset(request()->root(). '/public/admin_assets/dist/images/profile/user-1.jpg'),
            'class' => $this->model->classroom->name,
            'date' => Carbon::parse($this->created_at)->translatedFormat('d F Y'),
            'status' => $this->status->label(),
            'proof' => $this->proof != null && Storage::exists(request()->root(). '/storage/'.$this->proof) ? asset(request()->root(). '/storage/'.$this->proof) : asset(request()->root(). '/public/admin_assets/dist/images/empty/no-data.png'),
        ];
    }
}
