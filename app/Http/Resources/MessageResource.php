<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
        'id' => $this->id,
        'subject' => $this->message_subject,
        'body' => $this->message_body,
        'author' => $this->author->name,
        'created_at' => (string) $this->created_at,
        'updated_at' => (string) $this->updated_at,
      ];
    }
}
