<header class="header">
    <div class="container">
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-lg-2 col-4">
                <a href="{{routeLink('home')}}">
                    <div class="header-logo"></div>
                </a>
            </div>
            <div class="col-lg-5 d-none d-xl-flex ">
                <ul class="d-flex justify-content-between w-100">
                    <li class="header-item position-relative">
                        <a href="https://sunnygeorgia.travel/{{session()->get('locale')}}">
                            {{__('main.Travel')}}
                        </a>
                    </li>

                    @if(count($categories) > 0)
                        @foreach($categories as $category)
                            @if(isset($category['title'][session()->get('locale')]))
                                <li class="header-item position-relative">
                                    <a href="{{routeLink('categories.show', ['slug_path' => $category['slug_path']])}}">
                                        {{$category['title'][session()->get('locale')]}}
                                    </a>

                                    @if(count($category['children']) > 0)
                                        <ul class="header-list">
                                            @foreach($category['children'] as $child)
                                                <li>
                                                    @include('shared.categories', ['child' => $child, 'children' => $child['children']])
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endif
                        @endforeach
                    @endif
                </ul>
            </div>
            <div class="col-lg-3 col-6 d-flex justify-content-xl-between justify-content-end align-items-center">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-search d-flex justify-content-center align-items-center mx-3">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.5781 16.8594L14.3594 12.6406C15.3086 11.2344 15.8008 9.47656 15.5547 7.57812C15.0977 4.34375 12.4609 1.74219 9.26172 1.32031C4.48047 0.722656 0.4375 4.76562 1.03516 9.54688C1.45703 12.7461 4.05859 15.3828 7.29297 15.8398C9.19141 16.0859 10.9492 15.5938 12.3906 14.6445L16.5742 18.8633C17.1367 19.3906 18.0156 19.3906 18.5781 18.8633C19.1055 18.3008 19.1055 17.4219 18.5781 16.8594ZM3.77734 8.5625C3.77734 6.10156 5.78125 4.0625 8.27734 4.0625C10.7383 4.0625 12.7773 6.10156 12.7773 8.5625C12.7773 11.0586 10.7383 13.0625 8.27734 13.0625C5.78125 13.0625 3.77734 11.0586 3.77734 8.5625Z"
                                fill="white"
                            />
                        </svg>
                    </div>
                    <div class="header-lang d-flex d-none d-sm-flex justify-content-center align-items-center">
                        @foreach(config('locales') as $prefix => $locale)
                            @if(app()->getLocale() !== $prefix && ($prefix == 'en' || $prefix == 'ru'))
                                <a rel="alternate" hreflang="{{$prefix}}"
                                   href="{{routeLink('locale', ['locale' => $prefix])}}"
                                >
                                    @if($prefix == 'ru')
                                        {!! file_get_contents('images/svg/en.svg') !!}
                                    @endif
                                    @if($prefix == 'en')
                                        {!! file_get_contents('images/svg/ru.svg') !!}
                                    @endif
                                </a>
                            @endif
                        @endforeach
                    </div>
                    <div class="themeBtn d-xl-none d-none d-sm-flex mx-3">
                        <div class="btn"></div>
                    </div>
                    <div class="header-burger d-flex d-xl-none align-items-center justify-content-center">
                        <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0 1.625C0 1.02734 0.492188 0.5 1.125 0.5H14.625C15.2227 0.5 15.75 1.02734 15.75 1.625C15.75 2.25781 15.2227 2.75 14.625 2.75H1.125C0.492188 2.75 0 2.25781 0 1.625ZM2.25 7.25C2.25 6.65234 2.74219 6.125 3.375 6.125H16.875C17.4727 6.125 18 6.65234 18 7.25C18 7.88281 17.4727 8.375 16.875 8.375H3.375C2.74219 8.375 2.25 7.88281 2.25 7.25ZM14.625 14H1.125C0.492188 14 0 13.5078 0 12.875C0 12.2773 0.492188 11.75 1.125 11.75H14.625C15.2227 11.75 15.75 12.2773 15.75 12.875C15.75 13.5078 15.2227 14 14.625 14Z"
                                fill="#A0AEBF"/>
                        </svg>
                    </div>
                </div>
                <div id="theme-switch"
                     class="header-switch d-xl-flex d-none justify-content-between align-items-center px-1">
                    <div class="active-switch"></div>
                    <svg class="night_btn" width="12" height="13" viewBox="0 0 12 13" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0.875 6.75C0.875 3.38672 3.60938 0.625 6.97266 0.625C7.30078 0.625 7.79297 0.679688 8.09375 0.734375C8.36719 0.789062 8.42188 1.14453 8.17578 1.28125C6.69922 2.12891 5.76953 3.71484 5.76953 5.4375C5.76953 8.44531 8.47656 10.7148 11.457 10.168C11.7305 10.1133 11.8945 10.4141 11.7305 10.6328C10.582 12.0273 8.85938 12.875 6.97266 12.875C3.60938 12.875 0.875 10.1406 0.875 6.75Z"
                            fill="white"
                        />
                    </svg>
                    <svg class="day_btn" width="16" height="15" viewBox="0 0 16 15" fill="none"
                         xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M8 5.125C6.52344 5.125 5.375 6.30078 5.375 7.72266C5.375 9.14453 6.52344 10.375 8 10.375C9.44922 10.375 10.5977 9.19922 10.5977 7.75C10.5977 6.32812 9.44922 5.125 8 5.125ZM14.918 10.2383L13.1953 7.75L14.918 5.26172C15.082 4.98828 14.9453 4.66016 14.6445 4.60547L11.6641 4.05859L11.1172 1.07812C11.0625 0.777344 10.7344 0.640625 10.4883 0.804688L8 2.55469L5.48438 0.832031C5.21094 0.667969 4.88281 0.804688 4.82812 1.10547L4.30859 4.08594L1.32812 4.63281C1.02734 4.6875 0.890625 5.01562 1.05469 5.26172L2.77734 7.75L1.05469 10.2656C0.890625 10.5117 1.02734 10.8398 1.32812 10.8945L4.30859 11.4414L4.85547 14.4219C4.91016 14.7227 5.23828 14.8594 5.48438 14.6953L8 12.9727L10.4883 14.6953C10.7344 14.8594 11.0625 14.7227 11.1172 14.4219L11.6641 11.4414L14.6445 10.8945C14.9453 10.8398 15.082 10.5117 14.918 10.2383ZM8 11.25C6.05859 11.25 4.5 9.66406 4.5 7.75C4.5 5.83594 6.08594 4.27734 8 4.27734C9.88672 4.27734 11.4727 5.86328 11.4727 7.75C11.4727 9.69141 9.91406 11.25 8 11.25Z"
                            fill="white"
                        />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="menu">
    <div class="menu-close"></div>
    <div class="menu-item">
        <div class="menu-item-sup d-flex ">
            <div class="header-user d-none d-sm-flex justify-content-center align-items-center me-3">
                <svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7.875 9.25C10.3359 9.25 12.375 7.24609 12.375 4.75C12.375 2.28906 10.3359 0.25 7.875 0.25C5.37891 0.25 3.375 2.28906 3.375 4.75C3.375 7.24609 5.37891 9.25 7.875 9.25ZM9.63281 10.9375H6.08203C2.70703 10.9375 0 13.6797 0 17.0547C0 17.7227 0.527344 18.25 1.19531 18.25H14.5195C15.1875 18.25 15.75 17.7227 15.75 17.0547C15.75 13.6797 13.0078 10.9375 9.63281 10.9375Z"
                        fill="#A0AEBF"/>
                </svg>
            </div>
            <div class="themeBtn d-sm-none d-flex me-3">
                <div class="btn"></div>
            </div>
            <div class="header-lang d-flex justify-content-center align-items-center">
                @foreach(config('locales') as $prefix => $locale)
                    @if(app()->getLocale() !== $prefix && ($prefix == 'en' || $prefix == 'ru'))
                        <a rel="alternate" hreflang="{{$prefix}}"
                           href="{{routeLink('locale', ['locale' => $prefix])}}"
                        >
                            @if($prefix == 'ru')
                                {!! file_get_contents('images/svg/en.svg') !!}
                            @endif
                            @if($prefix == 'en')
                                {!! file_get_contents('images/svg/ru.svg') !!}
                            @endif
                        </a>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="">
            @if(count($categories) > 0)
                @foreach($categories as $category)
                    @if(isset($category['title'][session()->get('locale')]))
                        <div class="menu-title">
                            @if(count($category['children']) > 0)
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="menu-title__text">
                                        {{$category['title'][session()->get('locale')]}}
                                    </span>
                                    <svg class="arrow" width="20" height="12" viewBox="0 0 20 12" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2 2L10 10L18 2" stroke="" stroke-width="3" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                    </svg>
                                </div>

                                <ul class="mt-3">
                                    @foreach($category['children'] as $child)
                                        <li>
                                            @include('shared.categories', ['child' => $child, 'children' => $child['children']])
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <div class="d-flex justify-content-between align-items-center">
                                    <a class="menu-title__text"
                                       href="{{routeLink('categories.show', ['slug_path' => $category['slug_path']])}}">
                                        {{$category['title'][session()->get('locale')]}}
                                    </a>
                                </div>
                            @endif
                        </div>
                    @endif
                @endforeach
            @endif
        </div>

        <div class="d-flex align-items-center mt-4">
            <a href="#">
                <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10.9763 36.3244L11.6574 36.6649C14.4345 38.3167 17.6094 39.1801 20.8405 39.1622C30.7877 39.1395 38.9606 30.9473 38.9606 21.0001C38.9606 16.1929 37.0513 11.5763 33.6561 8.1732C30.2655 4.7349 25.6331 2.79724 20.8054 2.79724C10.9037 2.79724 2.75684 10.9452 2.75684 20.8458C2.75684 20.9241 2.75684 21.0013 2.75797 21.0796C2.7878 24.4457 3.72927 27.7409 5.48229 30.6147L5.93632 31.2957L4.12013 37.993L10.9763 36.3244V36.3244Z"
                        fill="#00E676"
                    />
                    <path
                        d="M35.6771 6.12998C31.8119 2.18653 26.5097 -0.0258028 20.9885 0.000227126H20.9533C9.58277 0.000262686 0.225912 9.35716 0.225912 20.7277C0.225912 20.781 0.22705 20.8333 0.22705 20.8867C0.269879 24.5018 1.20575 28.0503 2.95137 31.2163L0 42L10.9994 39.1622C14.038 40.8304 17.4541 41.6903 20.9204 41.6595C32.333 41.597 41.6887 32.1868 41.6819 20.7731C41.7091 15.2893 39.5467 10.0155 35.6771 6.12998ZM20.9885 38.1406C17.9159 38.1566 14.8974 37.3323 12.2594 35.7568L11.5783 35.4162L5.02861 37.119L6.73129 30.6487L6.27726 29.9676C4.59068 27.2444 3.69714 24.1046 3.6971 20.9014C3.6971 11.4549 11.4705 3.68147 20.917 3.68147C30.3635 3.68147 38.1369 11.4549 38.1369 20.9014C38.1369 26.8495 35.055 32.3912 30.0014 35.5298C27.3286 37.2419 24.2194 38.1483 21.0453 38.1406M31.023 25.5406L29.7744 24.9731C29.7744 24.9731 27.9582 24.1785 26.8231 23.6109C26.7096 23.6109 26.596 23.4974 26.4825 23.4974C26.2026 23.5043 25.9292 23.5825 25.6879 23.7245C25.4461 23.8663 25.5744 23.838 23.9852 25.6541C23.8774 25.8664 23.6561 25.9993 23.4177 25.9947H23.3042C23.1335 25.9661 22.9754 25.8871 22.8501 25.7677L22.2826 25.5406C21.0647 25.0251 19.9497 24.2945 18.9907 23.3839C18.7636 23.1569 18.4231 22.9298 18.1961 22.7028C17.3557 21.8978 16.6301 20.9811 16.0394 19.9785L15.9258 19.7515C15.8272 19.6128 15.7506 19.4596 15.6988 19.2974C15.6691 19.1008 15.7093 18.9 15.8123 18.7299C15.9156 18.5596 16.2664 18.1623 16.6069 17.8218C16.9475 17.4813 16.9475 17.2542 17.1745 17.0272C17.2911 16.8652 17.3718 16.68 17.4109 16.4842C17.4501 16.2884 17.4469 16.0865 17.4015 15.892C16.8725 14.4232 16.2662 12.9834 15.5853 11.5786C15.4028 11.2947 15.1184 11.0916 14.7907 11.011H13.5421C13.315 11.011 13.088 11.1245 12.861 11.1245L12.7475 11.238C12.5205 11.3515 12.2934 11.5786 12.0664 11.6921C11.8394 11.8056 11.7259 12.1462 11.4988 12.3732C10.7053 13.376 10.2662 14.6134 10.2502 15.892C10.2628 16.7915 10.4558 17.6793 10.8177 18.5029L10.9313 18.8434C11.9505 21.0226 13.376 22.9874 15.1313 24.6325L15.5853 25.0866C15.9157 25.3603 16.2197 25.6643 16.4934 25.9947C18.8454 28.0413 21.6389 29.517 24.655 30.3082C24.9955 30.4217 25.4496 30.4217 25.7901 30.5352H26.9252C27.5185 30.506 28.0988 30.3512 28.6279 30.0812C28.906 29.9552 29.1716 29.8031 29.4225 29.6271L29.6495 29.4001C29.8766 29.1731 30.1036 29.0595 30.3306 28.8325C30.5525 28.6349 30.7437 28.4053 30.8982 28.1515C31.1161 27.6429 31.2693 27.1094 31.3522 26.5623V25.7677C31.2502 25.676 31.1355 25.5996 31.0117 25.5406"
                        fill="white"
                    />
                </svg>
            </a>
            <a href="#" class="d-block mx-3">
                <svg width="39" height="38" viewBox="0 0 39 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M19.6816 38C30.175 38 38.6816 29.4934 38.6816 19C38.6816 8.5066 30.175 0 19.6816 0C9.18824 0 0.681641 8.5066 0.681641 19C0.681641 29.4934 9.18824 38 19.6816 38Z"
                        fill="#7B519D"
                    />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M14.8279 9.99678C15.3608 10.6587 15.8391 11.366 16.3277 12.0623C17.303 13.4509 17.3788 14.7211 15.8096 15.7572C14.9287 16.3391 14.8901 17.1537 15.2766 18.0054C16.3413 20.3535 17.9817 22.1666 20.3683 23.2287C21.4241 23.6985 22.3708 23.6923 23.1176 22.5931C23.5125 22.0111 23.9798 21.4247 24.8428 21.4716C25.968 21.5328 29.7284 24.2649 30.1253 25.3438C30.2896 25.7902 30.2789 26.2348 30.1262 26.689C29.2755 29.2188 27.1949 30.2667 24.7314 29.2632C17.3817 26.2694 12.2651 21.0008 9.14215 13.7484C8.96433 13.3349 8.89324 12.8755 8.82943 12.6429C8.81282 10.9918 10.4036 9.05752 11.9824 8.49892C13.5013 7.9611 14.1042 9.09773 14.8279 9.99678ZM29.3718 18.1286C28.5565 12.8266 26.0353 10.3814 20.6951 9.7062C20.2019 9.64357 19.4596 9.82731 19.446 9.12356C19.4319 8.38805 20.1632 8.56528 20.6569 8.5591C25.6864 8.49691 30.3489 12.8823 30.5208 17.9753C30.4655 18.3596 30.7858 19.1546 29.9246 19.2042C29.344 19.2373 29.4393 18.5679 29.3718 18.1286Z"
                          fill="white"
                    />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M27.9081 17.0915C27.9695 17.6014 28.2098 18.2747 27.5022 18.3939C26.7595 18.5183 26.8349 17.7679 26.727 17.2858C25.9951 14.0111 24.8032 12.8709 21.5549 12.3318C21.0814 12.253 20.3443 12.4095 20.4665 11.6047C20.5573 11.0082 21.1891 11.2237 21.5581 11.1738C24.6767 11.1474 27.5152 13.8196 27.9081 17.0915Z"
                          fill="white"
                    />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M25.3569 16.7907C25.3485 17.1311 25.3116 17.4653 24.9478 17.5904C24.4041 17.7783 24.2745 17.383 24.2098 16.9806C23.9942 15.6373 23.2021 14.9303 21.8625 14.7961C21.4989 14.7599 21.2043 14.5292 21.2458 14.178C21.3038 13.6913 21.737 13.6472 22.1484 13.6622C23.6534 13.6381 25.3929 15.3392 25.3569 16.7907Z"
                          fill="white"
                    />
                </svg>
            </a>
            <a href="#">
                <svg width="39" height="38" viewBox="0 0 39 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M19.6816 38C30.175 38 38.6816 29.4934 38.6816 19C38.6816 8.5066 30.175 0 19.6816 0C9.18824 0 0.681641 8.5066 0.681641 19C0.681641 29.4934 9.18824 38 19.6816 38Z"
                        fill="#34AADF"
                    />
                    <path
                        d="M8.58935 18.8352C8.58935 18.8352 18.0893 14.9364 21.3841 13.5636C22.6471 13.0145 26.9304 11.2572 26.9304 11.2572C26.9304 11.2572 28.9073 10.4884 28.7425 12.3555C28.6876 13.1243 28.2483 15.815 27.809 18.7254C27.15 22.8439 26.4361 27.3468 26.4361 27.3468C26.4361 27.3468 26.3263 28.6098 25.3928 28.8294C24.4593 29.0491 22.9217 28.0607 22.6471 27.841C22.4274 27.6763 18.5286 25.2052 17.1009 23.9971C16.7165 23.6676 16.2772 23.0087 17.1558 22.2399C19.1327 20.4277 21.4939 18.1763 22.9217 16.7486C23.5807 16.0896 24.2396 14.552 21.4939 16.419C17.5951 19.1098 13.7512 21.6358 13.7512 21.6358C13.7512 21.6358 12.8726 22.1849 11.2252 21.6907C9.57773 21.1965 7.65577 20.5375 7.65577 20.5375C7.65577 20.5375 6.33793 19.7139 8.58935 18.8352Z"
                        fill="white"
                    />
                </svg>
            </a>
        </div>
    </div>
</div>

<div class="search">
    <svg class="search__close" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
         viewBox="0 0 330 330" style="enable-background:new 0 0 330 330;" xml:space="preserve">
            <path id="XMLID_29_" d="M165,0C120.926,0,79.492,17.163,48.328,48.327c-64.334,64.333-64.334,169.011-0.002,233.345
                C79.49,312.837,120.926,330,165,330c44.072,0,85.508-17.163,116.672-48.328c64.334-64.334,64.334-169.012,0-233.345
                C250.508,17.163,209.072,0,165,0z M239.246,239.245c-2.93,2.929-6.768,4.394-10.607,4.394c-3.838,0-7.678-1.465-10.605-4.394
                L165,186.213l-53.033,53.033c-2.93,2.929-6.768,4.394-10.607,4.394c-3.838,0-7.678-1.465-10.605-4.394
                c-5.859-5.857-5.859-15.355,0-21.213L143.787,165l-53.033-53.033c-5.859-5.857-5.859-15.355,0-21.213
                c5.857-5.857,15.355-5.857,21.213,0L165,143.787l53.031-53.033c5.857-5.857,15.355-5.857,21.213,0
                c5.859,5.857,5.859,15.355,0,21.213L186.213,165l53.033,53.032C245.104,223.89,245.104,233.388,239.246,239.245z"/>
        </svg>
    <div class="container">
        <div class="row search-row d-flex justify-content-center">
            <div class="col-lg-6 col-sm-8">
                <div class="position-relative d-block">
                    <div class="search__icon"></div>
                    {!! Form::open(['url' => routeLink('posts.search'), 'method' => 'GET']) !!}
                    {!! Form::text('q', null, ['class' => 'search__inp', 'placeholder' => __('posts.search')]) !!}
                    {!! Form::close() !!}
                </div>
                <div class="search-result">
                    <span class="search-result__text">What are you looking for?</span>
                    <span class="noResults">No results</span>
                    <ul class="search-item">
                        <li>
                            <a href="#" class="search-item__title">Four Face Masks That I Use ALL The Time & Why I Love
                                Them</a>
                            <p class="search-item__text">fatigat rogabo; quisque praefixo regis. Ego morbo cursu
                                diruerent adfatur; frontem est Erysicthone radii, comas ubi femina vultus pariter
                                crura</p>
                        </li>
                        <li>
                            <a href="#" class="search-item__title">My Current Routine & Top Five Skincare Tips</a>
                            <p class="search-item__text">adit Saucius et deripit iacuit porreximus flamma Aere arcus
                                portis femineo raptoresque erat vetustas Se mater Et quin ab flatibus</p>
                        </li>
                        <li>
                            <a href="#" class="search-item__title">What I Do When My Skin is Freaking Out</a>
                            <p class="search-item__text">saevo cortice, facinus argumenta apte natalis, terra nunc
                                longa. Nulla festam pares, dici factas fraudare timetis; quamquam e fractae solebat</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End header -->
