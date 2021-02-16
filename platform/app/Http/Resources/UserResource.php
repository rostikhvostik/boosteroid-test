<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class UserResource
 * @package App\Http\Resources
 * @property int $id
 * @property string $email
 * @property string $name
 * @property int $last_duration
 * @property int $total_duration
 * @property string $last_ip_address
 */
class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'email' => $this->email,
            'total_duration' => $this->total_duration,
        ];
    }
}
