<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class SongResource
 * @package App\Http\Resources
 * @property int $id
 * @property string $email
 * @property string $name
 * @property int $last_duration
 * @property int $total_duration
 * @property string $last_ip_address
 */
class SongResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'name' => $this->name,
            'last_duration' => $this->last_duration,
            'total_duration' => $this->total_duration,
            'last_ip_address' => $this->last_ip_address,
        ];
    }
}
