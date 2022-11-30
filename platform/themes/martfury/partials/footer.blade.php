<footer class="ps-footer">
    <div class="ps-container">
        <h3>
            Hệ thống các cửa hàng của Lợi Phát
        </h3>
        <div class="ps-footer__widgets">

            @foreach(get_store() as $store)
                <aside class="widget widget_footer widget_contact-us">
                    <div class="widget_content">
                        <p><span class="showroom-table-title">{{$store->name}}</span></p>
                        <p></p>
                        <p><i class="far fa-phone fa-flip-horizontal"></i>Tel: {{$store->phone}}</p>
                        <p>{{$store->address}} <br><a href="mailto:{{$store->email}}">{{$store->email}}</a></p>
                        <p></p>
                    </div>
                </aside>
            @endforeach
            {{--                {!! dynamic_sidebar('footer_sidebar') !!}--}}
        </div>
        @if (Widget::group('bottom_footer_sidebar')->getWidgets())
            <div class="ps-footer__links" id="footer-links">
                {!! dynamic_sidebar('bottom_footer_sidebar') !!}
            </div>
        @endif
        <div class="ps-footer__copyright">
            <p>{{ theme_option('copyright') }}</p>
            @php $paymentMethods = array_filter(json_decode(theme_option('payment_methods', []), true)); @endphp
            @if ($paymentMethods)
                <div class="footer-payments">
                    <span>{{ __('We Using Safe Payment For') }}:</span>
                    <p class="d-sm-inline-block d-block">
                        @foreach($paymentMethods as $method)
                            @if (!empty($method))
                                <span><img src="{{ RvMedia::getImageUrl($method) }}" alt="payment method"></span>
                            @endif
                        @endforeach
                    </p>
                </div>
            @endif
        </div>
    </div>
</footer>
<div class="Rbtn-group left">

    <div class="Rbtn-group-content" id="Rbtn-group-content" style="display: none;">
    </div>
    <div class="Rbtn-default">
        <a rel="nofollow" class="Rbtn-menu" id="Rbtn-menu" onclick="toggleMenu()">
            <span class="Rbtn-menu-icon" id="Rbtn-menu-icon"></span>
            <span class="Ricon-close" id="Ricon-close"></span>
            <span class="Rbtn-over"></span>
            <span class="Rbtn-over"></span>
        </a>

        <div class="Rbtn-df-text" id="Rbtn-df-text" style="background-color:#f5791f!important;">
            Liên hệ nhanh
        </div>

    </div>

    <div class="Rbtn-list" id="Rbtn-list">
        <div class="Rbtn-call">
            <a rel="nofollow" href="tel: 0582121111" class="icon-call">
                <svg width="26" height="25" viewBox="0 0 26 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.94031 0.525758C5.08196 0.574157 5.30045 0.687111 5.4259 0.76782C6.19465 1.27622 8.3352 4.00768 9.03525 5.37145C9.43579 6.15013 9.5693 6.7271 9.44393 7.15478C9.31437 7.61474 9.09999 7.85684 8.14098 8.62748C7.75657 8.93812 7.39642 9.25687 7.33982 9.34161C7.19414 9.55143 7.07675 9.96296 7.07675 10.2535C7.08086 10.9273 7.51784 12.1498 8.09244 13.0899C8.53748 13.8202 9.33461 14.7562 10.1237 15.4744C11.0503 16.3217 11.8676 16.8986 12.7902 17.3546C13.9758 17.9436 14.7001 18.0929 15.2302 17.8468C15.3637 17.7863 15.5053 17.7056 15.5499 17.6693C15.5903 17.633 15.9019 17.2537 16.2418 16.8341C16.8972 16.011 17.047 15.8779 17.4961 15.7246C18.0667 15.5309 18.6493 15.5833 19.236 15.8819C19.6812 16.1119 20.6523 16.7131 21.2794 17.1488C22.1049 17.7258 23.8691 19.1621 24.1079 19.4486C24.5286 19.9651 24.6015 20.6267 24.3182 21.3571C24.0188 22.1276 22.8535 23.5721 22.0401 24.1894C21.3037 24.7462 20.7818 24.96 20.0939 24.9923C19.5274 25.0205 19.2927 24.9721 18.5684 24.6736C12.8873 22.3375 8.35139 18.8515 4.75011 14.0622C2.8686 11.5607 1.43617 8.9664 0.456916 6.27523C-0.113577 4.70574 -0.141881 4.02386 0.327435 3.22096C0.529795 2.88206 1.39166 2.04281 2.01883 1.57481C3.06282 0.800117 3.54431 0.513639 3.92872 0.432967C4.19172 0.376467 4.64893 0.420845 4.94031 0.525758V0.525758Z" fill="white">
                    </path>
                </svg>
            </a>
            <div class="text-call" style="background-color:#f5791f!important;">
                <a rel="nofollow" href="tel: 0582121111">Hotline Miền Nam</a>
            </div>
        </div>
        <div class="Rbtn-call">
            <a rel="nofollow" href="tel: 0986313886" class="icon-call">
                <svg width="26" height="25" viewBox="0 0 26 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.94031 0.525758C5.08196 0.574157 5.30045 0.687111 5.4259 0.76782C6.19465 1.27622 8.3352 4.00768 9.03525 5.37145C9.43579 6.15013 9.5693 6.7271 9.44393 7.15478C9.31437 7.61474 9.09999 7.85684 8.14098 8.62748C7.75657 8.93812 7.39642 9.25687 7.33982 9.34161C7.19414 9.55143 7.07675 9.96296 7.07675 10.2535C7.08086 10.9273 7.51784 12.1498 8.09244 13.0899C8.53748 13.8202 9.33461 14.7562 10.1237 15.4744C11.0503 16.3217 11.8676 16.8986 12.7902 17.3546C13.9758 17.9436 14.7001 18.0929 15.2302 17.8468C15.3637 17.7863 15.5053 17.7056 15.5499 17.6693C15.5903 17.633 15.9019 17.2537 16.2418 16.8341C16.8972 16.011 17.047 15.8779 17.4961 15.7246C18.0667 15.5309 18.6493 15.5833 19.236 15.8819C19.6812 16.1119 20.6523 16.7131 21.2794 17.1488C22.1049 17.7258 23.8691 19.1621 24.1079 19.4486C24.5286 19.9651 24.6015 20.6267 24.3182 21.3571C24.0188 22.1276 22.8535 23.5721 22.0401 24.1894C21.3037 24.7462 20.7818 24.96 20.0939 24.9923C19.5274 25.0205 19.2927 24.9721 18.5684 24.6736C12.8873 22.3375 8.35139 18.8515 4.75011 14.0622C2.8686 11.5607 1.43617 8.9664 0.456916 6.27523C-0.113577 4.70574 -0.141881 4.02386 0.327435 3.22096C0.529795 2.88206 1.39166 2.04281 2.01883 1.57481C3.06282 0.800117 3.54431 0.513639 3.92872 0.432967C4.19172 0.376467 4.64893 0.420845 4.94031 0.525758V0.525758Z" fill="white">
                    </path>
                </svg>
            </a>
            <div class="text-call" style="background-color:#f5791f!important;">
                <a rel="nofollow" href="tel: 0986313886">Hotline Miền Trung</a>
            </div>
        </div>
        <div class="Rbtn-call">
            <a rel="nofollow" href="tel: 0362651111" class="icon-call">
                <svg width="26" height="25" viewBox="0 0 26 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.94031 0.525758C5.08196 0.574157 5.30045 0.687111 5.4259 0.76782C6.19465 1.27622 8.3352 4.00768 9.03525 5.37145C9.43579 6.15013 9.5693 6.7271 9.44393 7.15478C9.31437 7.61474 9.09999 7.85684 8.14098 8.62748C7.75657 8.93812 7.39642 9.25687 7.33982 9.34161C7.19414 9.55143 7.07675 9.96296 7.07675 10.2535C7.08086 10.9273 7.51784 12.1498 8.09244 13.0899C8.53748 13.8202 9.33461 14.7562 10.1237 15.4744C11.0503 16.3217 11.8676 16.8986 12.7902 17.3546C13.9758 17.9436 14.7001 18.0929 15.2302 17.8468C15.3637 17.7863 15.5053 17.7056 15.5499 17.6693C15.5903 17.633 15.9019 17.2537 16.2418 16.8341C16.8972 16.011 17.047 15.8779 17.4961 15.7246C18.0667 15.5309 18.6493 15.5833 19.236 15.8819C19.6812 16.1119 20.6523 16.7131 21.2794 17.1488C22.1049 17.7258 23.8691 19.1621 24.1079 19.4486C24.5286 19.9651 24.6015 20.6267 24.3182 21.3571C24.0188 22.1276 22.8535 23.5721 22.0401 24.1894C21.3037 24.7462 20.7818 24.96 20.0939 24.9923C19.5274 25.0205 19.2927 24.9721 18.5684 24.6736C12.8873 22.3375 8.35139 18.8515 4.75011 14.0622C2.8686 11.5607 1.43617 8.9664 0.456916 6.27523C-0.113577 4.70574 -0.141881 4.02386 0.327435 3.22096C0.529795 2.88206 1.39166 2.04281 2.01883 1.57481C3.06282 0.800117 3.54431 0.513639 3.92872 0.432967C4.19172 0.376467 4.64893 0.420845 4.94031 0.525758V0.525758Z" fill="white">
                    </path>
                </svg>
            </a>
            <div class="text-call" style="background-color:#f5791f!important;">
                <a rel="nofollow" href="tel: 0362651111">Hotline Miền Bắc</a>
            </div>
        </div>
    </div>
</div>

<div id="contact1"n>
    <div class="item-contact">
        <div class="item-contact-wrap">
            <div class="elementor-icon-box-wrapper">
                <div class="elementor-icon-box-icon">
                    <a class="elementor-icon elementor-animation-" href="https://zalo.me/0986313886" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="31" height="11" viewBox="0 0 31 11" fill="none">
                            <path
                                d="M15.8625 3.2266V2.6416H17.5462V10.8602H16.5838C16.3932 10.8605 16.2103 10.7823 16.0751 10.6427C15.94 10.5031 15.8635 10.3134 15.8625 10.1153V10.1166C15.1597 10.6517 14.311 10.9395 13.44 10.9382C12.3517 10.9382 11.308 10.4888 10.5382 9.6887C9.76844 8.88863 9.33566 7.80341 9.335 6.6716C9.33566 5.53979 9.76844 4.45457 10.5382 3.6545C11.308 2.85443 12.3517 2.405 13.44 2.405C14.3106 2.40398 15.1588 2.69179 15.8613 3.2266H15.8625V3.2266ZM8.89875 0V0.2665C8.89875 0.7631 8.835 1.1687 8.52375 1.6445L8.48625 1.6887C8.38255 1.80964 8.28169 1.93318 8.18375 2.0592L2.78 9.113H8.89875V10.1114C8.89875 10.2098 8.88009 10.3073 8.84382 10.3983C8.80756 10.4892 8.75442 10.5718 8.68742 10.6413C8.62043 10.7109 8.54091 10.766 8.45342 10.8036C8.36592 10.8411 8.27216 10.8604 8.1775 10.8602H0.25V10.3896C0.25 9.8137 0.3875 9.5563 0.5625 9.2885L6.32125 1.872H0.49V0H8.9H8.89875ZM19.5875 10.8602C19.4284 10.8602 19.2758 10.7945 19.1632 10.6774C19.0507 10.5604 18.9875 10.4017 18.9875 10.2362V0H20.7887V10.8602H19.5875V10.8602ZM26.1163 2.353C26.6589 2.35283 27.1963 2.46383 27.6978 2.67965C28.1992 2.89548 28.6549 3.21191 29.0387 3.61088C29.4226 4.00984 29.7271 4.48353 29.935 5.0049C30.1428 5.52627 30.2498 6.0851 30.25 6.6495C30.2502 7.21389 30.1434 7.7728 29.9359 8.2943C29.7284 8.81579 29.4241 9.28967 29.0405 9.68888C28.6569 10.0881 28.2014 10.4048 27.7001 10.621C27.1988 10.8371 26.6614 10.9484 26.1187 10.9486C25.0227 10.9489 23.9715 10.4965 23.1963 9.69072C22.421 8.88497 21.9853 7.79195 21.985 6.6521C21.9847 5.51225 22.4197 4.41895 23.1945 3.61271C23.9693 2.80648 25.0202 2.35335 26.1163 2.353V2.353ZM13.4413 9.1819C13.7629 9.18951 14.0828 9.13019 14.3822 9.00743C14.6815 8.88466 14.9542 8.70092 15.1843 8.46701C15.4144 8.23309 15.5972 7.95371 15.7221 7.64528C15.8469 7.33685 15.9112 7.00559 15.9112 6.67095C15.9112 6.33631 15.8469 6.00505 15.7221 5.69662C15.5972 5.38819 15.4144 5.10881 15.1843 4.87489C14.9542 4.64098 14.6815 4.45724 14.3822 4.33447C14.0828 4.21171 13.7629 4.15239 13.4413 4.16C12.8104 4.17493 12.2103 4.44603 11.7692 4.9153C11.3281 5.38456 11.0812 6.01473 11.0812 6.67095C11.0812 7.32717 11.3281 7.95733 11.7692 8.4266C12.2103 8.89587 12.8104 9.16697 13.4413 9.1819V9.1819ZM26.1163 9.178C26.7611 9.178 27.3795 8.9116 27.8354 8.43742C28.2914 7.96323 28.5475 7.3201 28.5475 6.6495C28.5475 5.9789 28.2914 5.33577 27.8354 4.86158C27.3795 4.38739 26.7611 4.121 26.1163 4.121C25.4714 4.121 24.853 4.38739 24.3971 4.86158C23.9411 5.33577 23.685 5.9789 23.685 6.6495C23.685 7.3201 23.9411 7.96323 24.3971 8.43742C24.853 8.9116 25.4714 9.178 26.1163 9.178V9.178Z"
                                fill="#2288FF"></path>
                        </svg>
                    </a>
                </div>
                <div class="elementor-icon-box-content">
                    <div class="elementor-icon-box-title">
                        <a href="https://zalo.me/0986313886" target="_blank">
                            Chat Zalo
                        </a>
                    </div>
                    <p class="elementor-icon-box-description"> (7h30 - 22h00) </p>
                </div>
            </div>
        </div>
    </div>
    <div class="item-contact">
        <div class="item-contact-wrap">
            <div class="elementor-icon-box-wrapper">
                <div class="elementor-icon-box-icon">
                    <a class="elementor-icon elementor-animation-" href="https://www.messenger.com/t/107569808662644" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38" fill="none"><circle cx="19" cy="19" r="18" stroke="#EAEAEA" stroke-width="2"></circle><g clip-path="url(#clip0_1381_24315)"><path d="M19 11C14.494 11 11 14.302 11 18.76C11 21.092 11.956 23.108 13.512 24.5C13.642 24.616 13.722 24.78 13.726 24.956L13.77 26.38C13.7732 26.4848 13.8021 26.5872 13.8541 26.6782C13.9062 26.7692 13.9798 26.846 14.0684 26.9019C14.1571 26.9578 14.2582 26.991 14.3627 26.9987C14.4673 27.0064 14.5721 26.9883 14.668 26.946L16.256 26.246C16.39 26.186 16.542 26.176 16.684 26.214C17.414 26.414 18.19 26.522 19 26.522C23.506 26.522 27 23.22 27 18.762C27 14.304 23.506 11 19 11Z" fill="url(#paint0_radial_1381_24315)"></path><path d="M14.1958 21.0299L16.5458 17.3019C16.6342 17.1615 16.7507 17.041 16.888 16.948C17.0254 16.8549 17.1805 16.7914 17.3436 16.7613C17.5067 16.7312 17.6743 16.7353 17.8358 16.7733C17.9973 16.8113 18.1491 16.8823 18.2818 16.9819L20.1518 18.3839C20.2352 18.4464 20.3368 18.48 20.4411 18.4797C20.5454 18.4793 20.6467 18.445 20.7298 18.3819L23.2538 16.4659C23.5898 16.2099 24.0298 16.6139 23.8058 16.9719L21.4538 20.6979C21.3654 20.8383 21.2488 20.9588 21.1115 21.0518C20.9742 21.1449 20.819 21.2084 20.6559 21.2385C20.4928 21.2686 20.3252 21.2645 20.1637 21.2265C20.0022 21.1885 19.8504 21.1175 19.7178 21.0179L17.8478 19.6159C17.7643 19.5534 17.6627 19.5198 17.5584 19.5201C17.4541 19.5205 17.3528 19.5548 17.2698 19.6179L14.7458 21.5339C14.4098 21.7899 13.9698 21.3879 14.1958 21.0299V21.0299Z" fill="white"></path></g><defs><radialGradient id="paint0_radial_1381_24315" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(13.68 27) scale(17.6)"><stop stop-color="#0099FF"></stop><stop offset="0.6" stop-color="#A033FF"></stop><stop offset="0.9" stop-color="#FF5280"></stop><stop offset="1" stop-color="#FF7061"></stop></radialGradient><clipPath id="clip0_1381_24315"><rect width="16" height="16" fill="white" transform="translate(11 11)"></rect></clipPath></defs></svg>
                    </a>
                </div>
                <div class="elementor-icon-box-content">
                    <div class="elementor-icon-box-title">
                        <a href="https://www.messenger.com/t/107569808662644" target="_blank">
                            Messenger
                        </a>
                    </div>
                    <p class="elementor-icon-box-description"> (7h30 - 22h00) </p>
                </div>
            </div>
        </div>
    </div>
</div>



@if (is_plugin_active('newsletter') && theme_option('enable_newsletter_popup', 'yes') === 'yes')
    <div data-session-domain="{{ config('session.domain') ?? request()->getHost() }}"></div>
    <div class="ps-popup" id="subscribe" data-time="{{ (int)theme_option('newsletter_show_after_seconds', 10) * 1000 }}"
         style="display: none">
        <div class="ps-popup__content bg--cover"
             data-background="{{ RvMedia::getImageUrl(theme_option('newsletter_image')) }}"
             style="background-size: cover!important;"><a class="ps-popup__close" href="#"><i
                    class="icon-cross"></i></a>
            <form method="post" action="{{ route('public.newsletter.subscribe') }}"
                  class="ps-form--subscribe-popup newsletter-form">
                @csrf
                <div class="ps-form__content">
                    <h4>{{ __('Get 25% Discount') }}</h4>
                    <p>{{ __('Subscribe to the mailing list to receive updates on new arrivals, special offers and our promotions.') }}</p>
                    <div class="form-group">
                        <input class="form-control" name="email" type="email" placeholder="{{ __('Email Address') }}"
                               required>
                    </div>

                    @if (setting('enable_captcha') && is_plugin_active('captcha'))
                        <div class="form-group">
                            {!! Captcha::display() !!}
                        </div>
                    @endif

                    <div class="form-group">
                        <button class="ps-btn" type="submit">{{ __('Subscribe') }}</button>
                    </div>
                    <div class="ps-checkbox">
                        <input class="form-control" type="checkbox" id="dont_show_again" name="dont_show_again">
                        <label for="dont_show_again">{{ __("Don't show this popup again") }}</label>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endif

{!! Theme::get('bottomFooter') !!}

<div id="back2top"><i class="icon icon-arrow-up"></i></div>
<div class="ps-site-overlay"></div>
@if (is_plugin_active('ecommerce'))
    <div class="ps-search" id="site-search"><a class="ps-btn--close" href="#"></a>
        <div class="ps-search__content">
            <form class="ps-form--primary-search" action="{{ route('public.products') }}" method="post">
                <input class="form-control" name="q" value="{{ request()->query('q') }}" type="text"
                       placeholder="{{ __('Search for...') }}">
                <button><i class="aroma-magnifying-glass"></i></button>
            </form>
        </div>
    </div>
@endif
<div class="modal fade" id="product-quickview" tabindex="-1" role="dialog" aria-labelledby="product-quickview"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content"><span class="modal-close" data-dismiss="modal"><i class="icon-cross2"></i></span>
            <article class="ps-product--detail ps-product--fullwidth ps-product--quickview">
            </article>
        </div>
    </div>
</div>
<style>
    #contact1 {
        position: fixed;
        right: 25px;
        bottom: 80px;
        width: 180px;
        flex: unset;
        align-self: center;
    }

    .item-contact {
        border-style: solid;
        border-width: 1px;
        border-color: #d9d9d9;
        box-shadow: 6px 2px 5px 0 rgb(0 0 0 / 10%);
        transition: background .3s, border .3s, border-radius .3s, box-shadow .3s;
        margin: 0 0 16px;
        --e-column-margin-right: 0px;
        --e-column-margin-left: 0px;
        border-radius: 12px;
        background: #fff;
    }

    .item-contact-wrap {
        padding: 11px 20px;
        position: relative;
        width: 100%;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        -ms-flex-line-pack: start;
        align-content: flex-start;
    }
    .elementor-icon-box-wrapper {
        text-align: left;
        display: flex;
    }
    .elementor-icon-box-icon {
        margin-right: var(--icon-box-icon-margin,15px);
        margin-left: 0;
        margin-bottom: unset;
        flex: 0 0 auto;
    }
    .elementor-icon {
        font-size: 40px;
    }
    .elementor-icon i, .elementor-icon svg {
        width: 1em;
        height: 1em;
        position: relative;
        display: block;
    }
    .elementor-icon-box-content {
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
    }
    .elementor-icon-box-title, .elementor-icon-box-title a{
        font-size: 13px;
        font-weight: 700;
        line-height: 18px;
        color: #1d1d1f;
    }
    .elementor-icon-box-description {
        color: #86868b;
        font-size: 11px;
        line-height: 16px;
        margin-bottom: 0px;
    }
</style>

<script>
    window.trans = {
        "View All": "{{ __('View All') }}",
    }
    window.siteUrl = "{{ url('') }}";
</script>

{!! Theme::footer() !!}

@if (session()->has('success_msg') || session()->has('error_msg') || (isset($errors) && $errors->count() > 0) || isset($error_msg))
    <script type="text/javascript">
        $(document).ready(function () {
            @if (session()->has('success_msg'))
            window.showAlert('alert-success', '{{ session('success_msg') }}');
            @endif

            @if (session()->has('error_msg'))
            window.showAlert('alert-danger', '{{ session('error_msg') }}');
            @endif

            @if (isset($error_msg))
            window.showAlert('alert-danger', '{{ $error_msg }}');
            @endif

            @if (isset($errors))
            @foreach ($errors->all() as $error)
            window.showAlert('alert-danger', '{!! $error !!}');
            @endforeach
            @endif
        });



    </script>

    @endif
<script type="text/javascript">
    var flag = false;
    function toggleMenu() {
        let menuIcon = document.getElementById('Rbtn-menu-icon');
        let closeIcon = document.getElementById('Ricon-close');
        let dfText = document.getElementById('Rbtn-df-text');
        let groupText = document.getElementById('Rbtn-group-content');
        let showList = document.getElementById('Rbtn-list');
        let screenbg = document.getElementById('screen-bg');
        if (flag===false)
        {
            closeIcon.style.display = 'block';
            menuIcon.style.display = 'none';
            dfText.style.display = 'none';
            groupText.style.display = 'block';
            showList.style.display = 'block';
            flag = true;
        }
        else {
            closeIcon.style.display = 'none';
            menuIcon.style.display = 'block';
            dfText.style.display = 'block';
            groupText.style.display = 'none';
            showList.style.display = 'none';
            flag = false;
        }
    }
</script>
    </body>
</html>
