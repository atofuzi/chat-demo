<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ChatRoomCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $array = $this->collection->map(function ($chatRoom) use ($request) {
            return [
                'id' => $chatRoom['id'],
                'name' => $chatRoom['name'],
                'is_active' => $chatRoom['is_active'],
                'created_at' => $chatRoom['created_at'],
                'updated_at' => $chatRoom['updated_at'],
                'profile_image' => $this->getChatRoomIcon($request->user()),
            ];
        });
        return $array->all();
    }

    private function getChatRoomIcon ($loginUser) {
        if( $loginUser->isOperator() ) {
            return '/img/operator-icon.ping';
        } else {
            return '/img/salesman-icon.ping';
        }
    }
}
