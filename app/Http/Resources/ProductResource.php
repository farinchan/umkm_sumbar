<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'short_description' => $this->short_description,
            'price' => $this->price,
            'discount' => $this->discount,
            'stock' => $this->stock,
            'status' => $this->status,
            'weight' => $this->weight,
            'size' => $this->size,
            'brand' => $this->brand,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_keywords' => $this->meta_keywords,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            "kontol" => "kontol",
            'image' => $this->productImage->map(function ($image) {
                return [
                    'id' => $image->id,
                    'image' => $image->image,
                    'created_at' => $image->created_at,
                    'updated_at' => $image->updated_at,
                ];
            }),
            'rating' => [
                'rate' => round($this->productReview->average('rating'), 1),
                'count' => $this->productReview->count(),
            ],
            'category' => [
                'id' => $this->productCategory->id,
                'name' => $this->productCategory->name,
                'slug' => $this->productCategory->slug,
                'parent_id' => $this->productCategory->parent_id,
            ],
            'visitor' => $this->productViewer->count(),
            'shop' => [
                'id' => $this->shop->id,
                'name' => $this->shop->name,
                'slug' => $this->shop->slug,
                'description' => $this->shop->description,
                'address' => $this->shop->address,
                'phone' => $this->shop->phone,
                'email' => $this->shop->email,
                'status' => $this->shop->status,
            ],
            "share" => [
                "facebook" => "https://www.facebook.com/sharer/sharer.php?u=" . url()->current(),
                "twitter" => "https://twitter.com/intent/tweet?url=" . url()->current(),
                "linkedin" => "https://www.linkedin.com/shareArticle?mini=true&url=" . url()->current(),
                "whatsapp" => "https://api.whatsapp.com/send?text=" . url()->current(),
                "telegram" => "https://t.me/share/url?url=" . url()->current(),
                "pinterest" => "https://pinterest.com/pin/create/button/?url=" . url()->current(),
                "email" => "mailto:?subject=" . $this->name . "&body=" . url()->current(),
            ],  

        ];
    }
}
