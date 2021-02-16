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
    /**
     * @OA\Schema(
     *     schema="User",
     *     @OA\Property(property="email", type="string"),
     *     @OA\Property(property="total_duration", type="integer"),
     * ),
     */
    public function toArray($request)
    {
        return [
            'email' => $this->email,
            'total_duration' => $this->total_duration,
        ];
    }
}

/**
 * @OA\Schema(
 *     schema="UserResourceCollection",
 *     @OA\Property(
 *         property="data",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/User"),
 *     ),
 *     @OA\Property(
 *         property="links",
 *         type="object",
 *         allOf={
 *             @OA\Schema(
 *                 @OA\Property(
 *                      property="first",
 *                      type="string",
 *                      description="Link to the first page",
 *                      example="/api/users?page=1"
 *                 ),
 *                 @OA\Property(
 *                      property="last",
 *                      type="string",
 *                      description="Link to the last page",
 *                      example="/api/users?page=100"
 *                 ),
 *                 @OA\Property(
 *                      property="next",
 *                      type="string",
 *                      description="Link to the next page",
 *                      example="/api/users?page=2"
 *                 ),
 *                 @OA\Property(
 *                      property="prev",
 *                      type="string",
 *                      description="Link to the previous page",
 *                      example=null
 *                 )
 *             )
 *         },
 *     ),
 *     @OA\Property(
 *         property="meta",
 *         type="object",
 *         allOf={
 *             @OA\Schema(
 *                 @OA\Property(
 *                      property="current_page",
 *                      type="integer",
 *                      description="Current page number",
 *                      example=1
 *                 ),
 *                 @OA\Property(
 *                      property="from",
 *                      type="integer",
 *                      description="From element index on page",
 *                      example=1
 *                 ),
 *                 @OA\Property(
 *                      property="last_page",
 *                      type="integer",
 *                      description="Last page number",
 *                      example=100
 *                 ),
 *                 @OA\Property(
 *                     property="links",
 *                     type="array",
 *                     @OA\Items(
 *                         type="object",
 *                         description="Link",
 *                         @OA\Property(property="active", type="boolean", example=false),
 *                         @OA\Property(property="label", type="string", enum={"Previous", 1, "Next"}, default="Previous"),
 *                         @OA\Property(property="url", type="string", example="/api/users?page=1"),
 *                     )
 *                 ),
 *                 @OA\Property(
 *                      property="path",
 *                      type="string",
 *                      description="Entity base path",
 *                      example="/api/users"
 *                 ),
 *                 @OA\Property(
 *                      property="per_page",
 *                      type="integer",
 *                      description="Elements number on one page",
 *                      example=100
 *                 ),
 *                 @OA\Property(
 *                      property="to",
 *                      type="integer",
 *                      description="To element index on page",
 *                      example=100
 *                 ),
 *                 @OA\Property(
 *                      property="total",
 *                      type="integer",
 *                      description="Total elements count",
 *                      example=10000
 *                 )
 *             )
 *         },
 *     ),
 * )
 */
