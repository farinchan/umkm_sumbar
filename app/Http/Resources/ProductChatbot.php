<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductChatbot extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'short_description' => $this->short_description,
            'price' => $this->price,
            'discount' => $this->discount,
            'stock' => $this->stock,
            'status' => $this->status,
            'weight' => $this->weight,
            'size' => $this->size,
            'brand' => $this->brand,
            'link' => route('product', $this->slug),
            'rating' => [
                'rate' => round($this->productReview->average('rating'), 1),
                'count' => $this->productReview->count(),
            ],
            'shop' => [
                'name' => $this->shop->name,
                'link' => route('shop-detail', $this->shop->slug),
            ],
            'category' => [
                'name' => $this->productCategory->name,
            ],

            
        ];
    }
}
