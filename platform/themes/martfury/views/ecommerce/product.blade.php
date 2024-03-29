@php
    Theme::set('stickyHeader', 'false');
    Theme::set('topHeader', Theme::partial('header-product-page', compact('product')));
    Theme::set('bottomFooter', Theme::partial('footer-product-page', compact('product')));
    Theme::set('pageId', 'product-page');
    Theme::set('headerMobile', Theme::partial('header-mobile-product'));
@endphp

<div class="ps-page--product">
    <div class="ps-container">
    </div>
    <div class="ps-page__container">
        <div class="ps-page__left">
            <div class="ps-product--detail ps-product--fullwidth">
                <div class="ps-product__header">
                    <div class="ps-product__thumbnail" data-vertical="true">
                        <figure>
                            <div class="ps-wrapper">
                                <div class="ps-product__gallery" data-arrow="true">
                                    @foreach ($productImages as $img)
                                        <div class="item">
                                            <a href="{{ RvMedia::getImageUrl($img) }}">
                                                <img src="{{ RvMedia::getImageUrl($img) }}" alt="{{ $product->name }}"/>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </figure>
                        <div class="ps-product__variants" data-item="4" data-md="4" data-sm="4" data-arrow="false">
                            @foreach ($productImages as $img)
                                <div class="item">
                                    <img src="{{ RvMedia::getImageUrl($img, 'thumb') }}" alt="{{ $product->name }}"/>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="ps-product__info">
                        <h1>{{ $product->name }}</h1>
                        <div class="ps-product__meta">
                            @if ($product->brand_id)
                                <p>{{ __('Brand') }}: <a
                                        href="{{ $product->brand->url }}">{{ $product->brand->name }}</a></p>
                            @endif

                            @if (EcommerceHelper::isReviewEnabled())
                                @if ($product->reviews_count > 0)
                                    <div class="rating_wrap">
                                        <a href="#tab-reviews">
                                            <div class="rating">
                                                <div class="product_rate"
                                                     style="width: {{ $product->reviews_avg * 20 }}%"></div>
                                            </div>
                                            <span
                                                class="rating_num">({{ $product->reviews_count }} {{ __('reviews') }})</span>
                                        </a>
                                    </div>
                                @else
                                    <div class="rating_wrap">
                                        <a href="#tab-reviews">
                                            <div class="rating">
                                                <div class="product_rate" style="width: 0%"></div>
                                            </div>
                                            <span class="rating_num">(0 {{ __('reviews') }})</span>
                                        </a>
                                    </div>
                                @endif
                            @endif
                        </div>
                        @if($product->price > 0)
                            <h4 class="ps-product__price @if ($product->front_sale_price !== $product->price) sale @endif">
                                <span>{{ format_price($product->front_sale_price_with_taxes) }}</span> @if ($product->front_sale_price !== $product->price)
                                    <del>{{ format_price($product->price_with_taxes) }} </del> @endif</h4>
                        @endif
                        <div class="ps-product__desc">
                            @if (is_plugin_active('marketplace') && $product->store_id)
                                <p>{{ __('Sold By') }}: <a
                                        href="{{ $product->store->url }}"><strong>{{ $product->store->name }}</strong></a>
                                </p>
                            @endif
                            <div class="ps-list--dot">
                                {!! clean($product->description) !!}
                            </div>
                        </div>
                        @php $flashSale = $product->latestFlashSales()->first(); @endphp

                        @if ($flashSale)
                            <div class="ps-product__countdown">
                                <figure>
                                    <figcaption> {{ __("Don't Miss Out! This promotion will expires in") }}</figcaption>
                                    <ul class="ps-countdown" data-time="{{ $flashSale->end_date }}">
                                        <li><span class="days"></span>
                                            <p>{{ __('Days') }}</p>
                                        </li>
                                        <li><span class="hours"></span>
                                            <p>{{ __('Hours') }}</p>
                                        </li>
                                        <li><span class="minutes"></span>
                                            <p>{{ __('Minutes') }}</p>
                                        </li>
                                        <li><span class="seconds"></span>
                                            <p>{{ __('Seconds') }}</p>
                                        </li>
                                    </ul>
                                </figure>
                                <figure>
                                    <figcaption>{{ __('Sold Items') }}</figcaption>
                                    <div class="ps-product__progress-bar ps-progress"
                                         data-value="{{ $flashSale->pivot->quantity > 0 ? ($flashSale->pivot->sold / $flashSale->pivot->quantity) * 100 : 0 }}">
                                        <div class="ps-progress__value"><span
                                                style="width: {{ $flashSale->pivot->quantity > 0 ? $flashSale->pivot->sold / $flashSale->pivot->quantity : 0 }}%;"></span>
                                        </div>
                                        <p><b>{{ $flashSale->pivot->sold }}
                                                /{{ $flashSale->pivot->quantity }}</b> {{ __('Sold') }}</p>
                                    </div>
                                </figure>
                            </div>
                        @endif

                        @if ($product->variations()->count() > 0)
                            <div class="pr_switch_wrap">
                                {!! render_product_swatches($product, [
                                    'selected' => $selectedAttrs,
                                    'view'     => Theme::getThemeNamespace() . '::views.ecommerce.attributes.swatches-renderer'
                                ]) !!}
                            </div>
                            <div class="number-items-available mb-3">
                                @if ($product->isOutOfStock())
                                    <span class="text-danger">({{ __('Out of stock') }})</span>
                                @else
                                    @if (!$productVariation)
                                        <span class="text-danger">({{ __('Not available') }})</span>
                                    @else
                                        @if ($productVariation->isOutOfStock())
                                            <span class="text-danger">({{ __('Out of stock') }})</span>
                                        @elseif  (!$productVariation->with_storehouse_management || $productVariation->quantity < 1)
                                            <span class="text-success">({{ __('Available') }})</span>
                                        @elseif ($productVariation->quantity)
                                            <span class="text-success">
                                                        @if ($productVariation->quantity != 1)
                                                    ({{ __(':number products available', ['number' => $productVariation->quantity]) }}
                                                    )
                                                @else
                                                    ({{ __(':number product available', ['number' => $productVariation->quantity]) }})
                                                @endif
                                                    </span>
                                        @endif
                                    @endif
                                @endif
                            </div>
                        @endif
                        <form class="add-to-cart-form" method="POST" action="{{ route('public.cart.add-to-cart') }}">
                            @csrf
                            {!! apply_filters(ECOMMERCE_PRODUCT_DETAIL_EXTRA_HTML, null) !!}
                            <div class="ps-product__shopping">
                                @if (EcommerceHelper::isCartEnabled())
                                    <figure>
                                        <figcaption>{{ __('Quantity') }}</figcaption>
                                        <div class="form-group--number product__qty">
                                            <button class="up" type="button"><i class="icon-plus"></i></button>
                                            <button class="down" type="button"><i class="icon-minus"></i></button>
                                            <input class="form-control qty-input" type="text" name="qty" value="1"
                                                   placeholder="1" readonly>
                                        </div>
                                    </figure>
                                    <input type="hidden" name="id" class="hidden-product-id"
                                           value="{{ ($product->is_variation || !$product->defaultVariation->product_id) ? $product->id : $product->defaultVariation->product_id }}"/>
                                    <button
                                        class="ps-btn ps-btn--black @if ($product->isOutOfStock()) btn-disabled @endif"
                                        type="submit"
                                        @if ($product->isOutOfStock()) disabled @endif>{{ __('Add to cart') }}</button>
                                    @if (EcommerceHelper::isQuickBuyButtonEnabled())
                                        <button class="ps-btn @if ($product->isOutOfStock()) btn-disabled @endif"
                                                type="submit" name="checkout"
                                                @if ($product->isOutOfStock()) disabled @endif>{{ __('Buy Now') }}</button>
                                    @endif
                                    <div class="ps-product__actions">
                                        <a class="js-add-to-wishlist-button" href="#"
                                           data-url="{{ route('public.wishlist.add', $product->id) }}"><i
                                                class="icon-heart"></i></a>
                                        <a class="js-add-to-compare-button" href="#"
                                           data-url="{{ route('public.compare.add', $product->id) }}"
                                           title="{{ __('Compare') }}"><i class="icon-chart-bars"></i></a>
                                    </div>
                                @else
                                    <a class="ps-btn" href="tel:0362651111">Liên hệ ngay</a>
                                @endif

                            </div>
                        </form>
                        <div class="ps-product__specification">
                            @if ($product->sku)
                                <p><strong>{{ __('SKU') }}:</strong> <span id="product-sku">{{ $product->sku }}</span>
                                </p>
                            @endif
                            @if ($product->categories->count())
                                <p class="categories"><strong> {{ __('Categories') }}:</strong>
                                    @foreach($product->categories as $category)
                                        <a href="{{ $category->url }}">{{ $category->name }}</a>@if (!$loop->last)
                                            ,@endif
                                    @endforeach
                                </p>
                            @endif

                            @if ($product->tags->count())
                                <p class="tags"><strong> {{ __('Tags') }}:</strong>
                                    @foreach($product->tags as $tag)
                                        <a href="{{ $tag->url }}">{{ $tag->name }}</a>@if (!$loop->last),@endif
                                    @endforeach
                                </p>
                            @endif
                        </div>
                        <div class="ps-product__sharing">
                            <a class="facebook"
                               href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($product->url) }}"
                               target="_blank"><i class="fa fa-facebook"></i></a>
                            <a class="linkedin"
                               href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode($product->url) }}&summary={{ rawurldecode(strip_tags($product->description)) }}"
                               target="_blank"><i class="fa fa-linkedin"></i></a>
                            <a class="twitter"
                               href="https://twitter.com/intent/tweet?url={{ urlencode($product->url) }}&text={{ strip_tags($product->description) }}"
                               target="_blank"><i class="fa fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
                <div class="ps-product__content ps-tab-root">
                    <ul class="ps-tab-list">
                        <li class="active"><a href="#tab-description">{{ __('Description') }}</a></li>
                        {{--                                @if (EcommerceHelper::isReviewEnabled())--}}
                        {{--                                    <li><a href="#tab-reviews">{{ __('Reviews') }} ({{ $product->reviews_count }})</a></li>--}}
                        {{--                                @endif--}}
                        @if (is_plugin_active('marketplace') && $product->store_id)
                            <li><a href="#tab-vendor">{{ __('Vendor') }}</a></li>
                        @endif
                    </ul>
                    <div class="ps-tabs">
                        <div class="ps-tab active" id="tab-description">
                            <div class="ps-document">
                                <div>
                                    {!! clean($product->content) !!}
                                </div>
                                @if (theme_option('facebook_comment_enabled_in_product', 'yes') == 'yes')
                                    <br/>
                                    {!! apply_filters(BASE_FILTER_PUBLIC_COMMENT_AREA, Theme::partial('comments')) !!}
                                @endif
                                @if (EcommerceHelper::isReviewEnabled())
                                    <hr>
                                    <div id="tab-reviews">
                                        <h3>{{ __('Reviews') }} {{ $product->name }}</h3>
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <div class="ps-block--average-rating">
                                                    <div class="ps-block__header">
                                                        <h3>{{ number_format($product->reviews_avg, 2) }}</h3>
                                                        @if ($product->reviews_count > 0)
                                                            <div class="rating_wrap">
                                                                <div class="rating">
                                                                    <div class="product_rate"
                                                                         style="width: {{ $product->reviews_avg * 20 }}%"></div>
                                                                </div>
                                                                <span
                                                                    class="rating_num">({{ $product->reviews_count }} {{ __('reviews') }})</span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="ps-block__star"><span>{{ __('5 Star') }}</span>
                                                        @php
                                                            $stars = $product->reviews->where('star', 5)->count();
                                                            if ($stars > 0) {
                                                                $stars = $stars / $product->reviews_count * 100;
                                                            }
                                                        @endphp
                                                        <div class="ps-progress" data-value="{{ $stars }}"><span></span>
                                                        </div>
                                                        <span>{{ ((int) ($stars * 100)) / 100 }}%</span>
                                                    </div>
                                                    <div class="ps-block__star"><span>{{ __('4 Star') }}</span>
                                                        @php
                                                            $stars = $product->reviews->where('star', 4)->count();
                                                            if ($stars > 0) {
                                                                $stars = $stars / $product->reviews_count * 100;
                                                            }
                                                        @endphp
                                                        <div class="ps-progress" data-value="{{ $stars }}"><span></span>
                                                        </div>
                                                        <span>{{ ((int) ($stars * 100)) / 100 }}%</span>
                                                    </div>
                                                    <div class="ps-block__star"><span>{{ __('3 Star') }}</span>
                                                        @php
                                                            $stars = $product->reviews->where('star', 3)->count();
                                                            if ($stars > 0) {
                                                                $stars = $stars / $product->reviews_count * 100;
                                                            }
                                                        @endphp
                                                        <div class="ps-progress" data-value="{{ $stars }}"><span></span>
                                                        </div>
                                                        <span>{{ ((int) ($stars * 100)) / 100 }}%</span>
                                                    </div>
                                                    <div class="ps-block__star"><span>{{ __('2 Star') }}</span>
                                                        @php
                                                            $stars = $product->reviews->where('star', 2)->count();
                                                            if ($stars > 0) {
                                                                $stars = $stars / $product->reviews_count * 100;
                                                            }
                                                        @endphp
                                                        <div class="ps-progress" data-value="{{ $stars }}"><span></span>
                                                        </div>
                                                        <span>{{ ((int) ($stars * 100)) / 100 }}%</span>
                                                    </div>
                                                    <div class="ps-block__star"><span>{{ __('1 Star') }}</span>
                                                        @php
                                                            $stars = $product->reviews->where('star', 1)->count();
                                                            if ($stars > 0) {
                                                                $stars = $stars / $product->reviews_count * 100;
                                                            }
                                                        @endphp
                                                        <div class="ps-progress" data-value="{{ $stars }}"><span></span>
                                                        </div>
                                                        <span>{{ ((int) ($stars * 100)) / 100 }}%</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                {!! Form::open(['route' => 'public.reviews.create', 'method' => 'post', 'class' => 'ps-form--review form-review-product']) !!}
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                {{--                                                        <h4>{{ __('Submit Your Review') }}</h4>--}}
                                                @if (!auth('customer')->check())
                                                    <p class="text-danger">{{ __('Please') }} <a
                                                            href="{{ route('customer.login') }}"><b>{{ __('login') }}</b></a> {{ __('to write review!') }}
                                                    </p>
                                                @endif
                                                <div class="form-group form-group__rating">
                                                    <label
                                                        for="review-star">{{ __('Your rating of this product') }}</label>
                                                    <select name="star" class="ps-rating" data-read-only="false"
                                                            id="review-star">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" name="comment" id="txt-comment"
                                                              rows="6" placeholder="{{ __('Write your review') }}"
                                                              @if (!auth('customer')->check()) disabled @endif></textarea>
                                                </div>

                                                <div class="form-group submit">
                                                    <button
                                                        class="ps-btn @if (!auth('customer')->check()) btn-disabled @endif"
                                                        type="submit"
                                                        @if (!auth('customer')->check()) disabled @endif>{{ __('Submit Review') }}</button>
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="block--product-reviews">
                                                    <div class="block__header">
                                                        <h2>{{ $product->reviews_count }} {{ __('reviews for ":product"', ['product' => $product->name]) }}</h2>
                                                    </div>
                                                    <div class="block__content" id="app">
                                                        <product-reviews-component
                                                            url="{{ route('public.ajax.product-reviews', $product->id) }}"></product-reviews-component>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        {{--                                @if (EcommerceHelper::isReviewEnabled())--}}
                        {{--                                    <div class="ps-tab" id="tab-reviews">--}}
                        {{--                                        <div class="row">--}}
                        {{--                                            <div class="col-lg-5">--}}
                        {{--                                                <div class="ps-block--average-rating">--}}
                        {{--                                                    <div class="ps-block__header">--}}
                        {{--                                                        <h3>{{ number_format($product->reviews_avg, 2) }}</h3>--}}
                        {{--                                                        @if ($product->reviews_count > 0)--}}
                        {{--                                                            <div class="rating_wrap">--}}
                        {{--                                                                <div class="rating">--}}
                        {{--                                                                    <div class="product_rate" style="width: {{ $product->reviews_avg * 20 }}%"></div>--}}
                        {{--                                                                </div>--}}
                        {{--                                                                <span class="rating_num">({{ $product->reviews_count }} {{ __('reviews') }})</span>--}}
                        {{--                                                            </div>--}}
                        {{--                                                        @endif--}}
                        {{--                                                    </div>--}}
                        {{--                                                    <div class="ps-block__star"><span>{{ __('5 Star') }}</span>--}}
                        {{--                                                        @php--}}
                        {{--                                                            $stars = $product->reviews->where('star', 5)->count();--}}
                        {{--                                                            if ($stars > 0) {--}}
                        {{--                                                                $stars = $stars / $product->reviews_count * 100;--}}
                        {{--                                                            }--}}
                        {{--                                                        @endphp--}}
                        {{--                                                        <div class="ps-progress" data-value="{{ $stars }}"><span></span></div><span>{{ ((int) ($stars * 100)) / 100 }}%</span>--}}
                        {{--                                                    </div>--}}
                        {{--                                                    <div class="ps-block__star"><span>{{ __('4 Star') }}</span>--}}
                        {{--                                                        @php--}}
                        {{--                                                            $stars = $product->reviews->where('star', 4)->count();--}}
                        {{--                                                            if ($stars > 0) {--}}
                        {{--                                                                $stars = $stars / $product->reviews_count * 100;--}}
                        {{--                                                            }--}}
                        {{--                                                        @endphp--}}
                        {{--                                                        <div class="ps-progress" data-value="{{ $stars }}"><span></span></div><span>{{ ((int) ($stars * 100)) / 100 }}%</span>--}}
                        {{--                                                    </div>--}}
                        {{--                                                    <div class="ps-block__star"><span>{{ __('3 Star') }}</span>--}}
                        {{--                                                        @php--}}
                        {{--                                                            $stars = $product->reviews->where('star', 3)->count();--}}
                        {{--                                                            if ($stars > 0) {--}}
                        {{--                                                                $stars = $stars / $product->reviews_count * 100;--}}
                        {{--                                                            }--}}
                        {{--                                                        @endphp--}}
                        {{--                                                        <div class="ps-progress" data-value="{{ $stars }}"><span></span></div><span>{{ ((int) ($stars * 100)) / 100 }}%</span>--}}
                        {{--                                                    </div>--}}
                        {{--                                                    <div class="ps-block__star"><span>{{ __('2 Star') }}</span>--}}
                        {{--                                                        @php--}}
                        {{--                                                            $stars = $product->reviews->where('star', 2)->count();--}}
                        {{--                                                            if ($stars > 0) {--}}
                        {{--                                                                $stars = $stars / $product->reviews_count * 100;--}}
                        {{--                                                            }--}}
                        {{--                                                        @endphp--}}
                        {{--                                                        <div class="ps-progress" data-value="{{ $stars }}"><span></span></div><span>{{ ((int) ($stars * 100)) / 100 }}%</span>--}}
                        {{--                                                    </div>--}}
                        {{--                                                    <div class="ps-block__star"><span>{{ __('1 Star') }}</span>--}}
                        {{--                                                        @php--}}
                        {{--                                                            $stars = $product->reviews->where('star', 1)->count();--}}
                        {{--                                                            if ($stars > 0) {--}}
                        {{--                                                                $stars = $stars / $product->reviews_count * 100;--}}
                        {{--                                                            }--}}
                        {{--                                                        @endphp--}}
                        {{--                                                        <div class="ps-progress" data-value="{{ $stars }}"><span></span></div><span>{{ ((int) ($stars * 100)) / 100 }}%</span>--}}
                        {{--                                                    </div>--}}
                        {{--                                                </div>--}}
                        {{--                                            </div>--}}
                        {{--                                            <div class="col-lg-7">--}}
                        {{--                                                {!! Form::open(['route' => 'public.reviews.create', 'method' => 'post', 'class' => 'ps-form--review form-review-product']) !!}--}}
                        {{--                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">--}}
                        {{--                                                    <h4>{{ __('Submit Your Review') }}</h4>--}}
                        {{--                                                    @if (!auth('customer')->check())--}}
                        {{--                                                        <p class="text-danger">{{ __('Please') }} <a href="{{ route('customer.login') }}">{{ __('login') }}</a> {{ __('to write review!') }}</p>--}}
                        {{--                                                    @endif--}}
                        {{--                                                    <div class="form-group form-group__rating">--}}
                        {{--                                                        <label for="review-star">{{ __('Your rating of this product') }}</label>--}}
                        {{--                                                        <select name="star" class="ps-rating" data-read-only="false" id="review-star">--}}
                        {{--                                                            <option value="0">0</option>--}}
                        {{--                                                            <option value="1">1</option>--}}
                        {{--                                                            <option value="2">2</option>--}}
                        {{--                                                            <option value="3">3</option>--}}
                        {{--                                                            <option value="4">4</option>--}}
                        {{--                                                            <option value="5">5</option>--}}
                        {{--                                                        </select>--}}
                        {{--                                                    </div>--}}
                        {{--                                                    <div class="form-group">--}}
                        {{--                                                        <textarea class="form-control" name="comment" id="txt-comment" rows="6" placeholder="{{ __('Write your review') }}" @if (!auth('customer')->check()) disabled @endif></textarea>--}}
                        {{--                                                    </div>--}}

                        {{--                                                    <div class="form-group submit">--}}
                        {{--                                                        <button class="ps-btn @if (!auth('customer')->check()) btn-disabled @endif" type="submit" @if (!auth('customer')->check()) disabled @endif>{{ __('Submit Review') }}</button>--}}
                        {{--                                                    </div>--}}
                        {{--                                                {!! Form::close() !!}--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}

                        {{--                                        <div class="row">--}}
                        {{--                                            <div class="col-12">--}}
                        {{--                                                <div class="block--product-reviews">--}}
                        {{--                                                    <div class="block__header">--}}
                        {{--                                                        <h2>{{ $product->reviews_count }} {{ __('reviews for ":product"', ['product' => $product->name]) }}</h2>--}}
                        {{--                                                    </div>--}}
                        {{--                                                    <div class="block__content" id="app">--}}
                        {{--                                                        <product-reviews-component url="{{ route('public.ajax.product-reviews', $product->id) }}"></product-reviews-component>--}}
                        {{--                                                    </div>--}}
                        {{--                                                </div>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                @endif--}}

                        @if (is_plugin_active('marketplace') && $product->store_id)
                            <div class="ps-tab" id="tab-vendor">
                                <h4>{{ $product->store->name }}</h4>
                                <div>
                                    {!! clean($product->store->content) !!}
                                </div>

                                <a href="{{ $product->store->url }}"
                                   class="more-products">{{ __('More Products from :store',  ['store' => $product->store->name]) }}</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-page__right">
            <aside class="widget widget_product widget_features">
                <h3>Liên hệ</h3>
                @foreach(get_store() as $store)
                    <p><i class="icon-network"></i> <b>{{$store->name}}</b><br> <a
                            href="tel:{{$store->phone}}">{{$store->phone}}</a></p>
                @endforeach
                {{--                        @for ($i = 1; $i <= 5; $i++)--}}
                {{--                            @if (theme_option('product_feature_' . $i . '_title'))--}}
                {{--                                <p><i class="{{ theme_option('product_feature_' . $i . '_icon') }}"></i> {{ theme_option('product_feature_' . $i . '_title') }}</p>--}}
                {{--                            @endif--}}
                {{--                        @endfor--}}
            </aside>
            <aside class="widget">
                <div class="ps-list--dot">
                    <ul>
                        <li>Bảo Hành 1 năm, lỗi 1 đổi 1 trong vòng 5 ngày</li>
                        <li>Giao hàng toàn quốc</li>
                        <li>Mức giá cạnh tranh nhất!</li>
                        <li>Sản xuất trên dây truyền hiện đại</li>
                        <li>Nhận thiết kế theo yêu cầu của khách hàng</li>
                    </ul>
                </div>
            </aside>
            @if (is_plugin_active('ads'))
                <aside class="widget">
                    {!! AdsManager::display('product-sidebar') !!}
                </aside>
            @endif
            {!! dynamic_sidebar('product_sidebar') !!}
        </div>
    </div>
    @php
        $crossSellProducts = get_cross_sale_products($product, 7);
    @endphp
    @if (count($crossSellProducts) > 0)
        {!! Theme::partial('cross-sell-products', compact('crossSellProducts')) !!}
    @endif

    <div class="ps-section--default" id="products">
        <div class="ps-section__header">
            <h3>{{ __('Related products') }}</h3>
        </div>
        <related-products-component
            url="{{ route('public.ajax.related-products', $product->id) }}?limit=6"></related-products-component>
    </div>
</div>
