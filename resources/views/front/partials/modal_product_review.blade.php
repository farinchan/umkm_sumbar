<!-- Modal -->
<div class="modal fade" id="addReview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Review - {{ $product->name }} </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @php
                $review = \App\Models\ProductReview::where('product_id', $product->id)
                    ->where('user_id', auth()->id())
                    ->first();

            @endphp
            @if ($review)
                <form action="{{ route('product-review-update', $product->slug) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="write_review">
                            <div class="rating_submit">
                                <div class="form-group">
                                    <label class="d-block">Penilaiian Saya</label>
                                    <span class="rating mb-0">
                                        <input type="radio" class="rating-input" id="5_star" name="rating"
                                            @if ($review->rating == 5) checked @endif
                                            value="5"><label for="5_star" class="rating-star"></label>
                                        <input type="radio" class="rating-input" id="4_star" name="rating"
                                            @if ($review->rating == 4) checked @endif
                                            value="4"><label for="4_star" class="rating-star"></label>
                                        <input type="radio" class="rating-input" id="3_star"
                                            name="rating" @if ($review->rating == 3) checked @endif
                                            value="3"><label for="3_star" class="rating-star"></label>
                                        <input type="radio" class="rating-input" id="2_star"
                                            name="rating" @if ($review->rating == 2) checked @endif
                                            value="2"><label for="2_star" class="rating-star"></label>
                                        <input type="radio" class="rating-input" id="1_star"
                                            name="rating" @if ($review->rating == 1) checked @endif
                                            value="1"><label for="1_star" class="rating-star"></label>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Review</label>
                                <textarea class="form-control" style="height: 180px;" name="review"
                                    placeholder="Tambahkan review kamu untuk membantu meningkatkan produk ini">
                                {{ $review->review }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            @else
                <form action="{{ route('product-review', $product->slug) }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="write_review">
                            <div class="rating_submit">
                                <div class="form-group">
                                    <label class="d-block">Penilaiian Saya</label>
                                    <span class="rating mb-0">
                                        <input type="radio" class="rating-input" id="5_star"
                                            name="rating" value="5"><label for="5_star"
                                            class="rating-star"></label>
                                        <input type="radio" class="rating-input" id="4_star"
                                            name="rating" value="4"><label for="4_star"
                                            class="rating-star"></label>
                                        <input type="radio" class="rating-input" id="3_star"
                                            name="rating" value="3"><label for="3_star"
                                            class="rating-star"></label>
                                        <input type="radio" class="rating-input" id="2_star"
                                            name="rating" value="2"><label for="2_star"
                                            class="rating-star"></label>
                                        <input type="radio" class="rating-input" id="1_star"
                                            name="rating" value="1"><label for="1_star"
                                            class="rating-star"></label>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Review</label>
                                <textarea class="form-control" style="height: 180px;" name="review"
                                    placeholder="Tambahkan review kamu untuk membantu meningkatkan produk ini"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            @endif

        </div>
    </div>
</div>
