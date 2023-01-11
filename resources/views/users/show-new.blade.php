@extends('layouts.app')

@section('content')
    <div class="author">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="author__title">Published by Author
                        <span class="author__title-num">{{ $posts_count }}</span>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="author-item">
                        <img
                            src="{{asset('images/png/user.png')}}"
                            alt="user.png"
                            class="author-item__img"
                        >
                        <div class="author-item-info">
                            <p class="author__name">{{ $user->name }}</p>
                            <p class="author__workplace">Makeup Artist</p>
                            <p class="author__text">Lorem markdownum illic venturi instructa nobis Echidnae, cum quid
                                magna fatebor. Levat placetque Lorem markdownum illic venturi instructa nobis Echidnae,
                                cum quid </p>
                        </div>
                        <div class="d-flex flex-sm-column flex-lg-row">
                            <div class="author-item-contact me-5">
                                <p class="contact__title">Legal Stuff</p>
                                <ul>
                                    <li class="li"><a href="#" class="contact__link">Privacy Notice</a></li>
                                    <li class="li"><a href="#" class="contact__link">Cookie Policy</a></li>
                                    <li class="li"><a href="#" class="contact__link">Terms Of Use</a></li>
                                </ul>
                            </div>
                            <div class="author-item-contact">
                                <p class="contact__title">Social Media</p>
                                <ul>
                                    <li><a href="#" class="contact__link d-flex align-items-center">
                                            <svg class="d-block me-1" width="16" height="16" viewBox="0 0 42 42"
                                                 fill="red" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M10.9763 36.3244L11.6574 36.6649C14.4345 38.3167 17.6094 39.1801 20.8405 39.1622C30.7877 39.1395 38.9606 30.9473 38.9606 21.0001C38.9606 16.1929 37.0513 11.5763 33.6561 8.1732C30.2655 4.7349 25.6331 2.79724 20.8054 2.79724C10.9037 2.79724 2.75684 10.9452 2.75684 20.8458C2.75684 20.9241 2.75684 21.0013 2.75797 21.0796C2.7878 24.4457 3.72927 27.7409 5.48229 30.6147L5.93632 31.2957L4.12013 37.993L10.9763 36.3244V36.3244Z"
                                                    fill="none" stroke="#718096"/>
                                                <path
                                                    d="M35.6771 6.12998C31.8119 2.18653 26.5097 -0.0258028 20.9885 0.000227126H20.9533C9.58277 0.000262686 0.225912 9.35716 0.225912 20.7277C0.225912 20.781 0.22705 20.8333 0.22705 20.8867C0.269879 24.5018 1.20575 28.0503 2.95137 31.2163L0 42L10.9994 39.1622C14.038 40.8304 17.4541 41.6903 20.9204 41.6595C32.333 41.597 41.6887 32.1868 41.6819 20.7731C41.7091 15.2893 39.5467 10.0155 35.6771 6.12998ZM20.9885 38.1406C17.9159 38.1566 14.8974 37.3323 12.2594 35.7568L11.5783 35.4162L5.02861 37.119L6.73129 30.6487L6.27726 29.9676C4.59068 27.2444 3.69714 24.1046 3.6971 20.9014C3.6971 11.4549 11.4705 3.68147 20.917 3.68147C30.3635 3.68147 38.1369 11.4549 38.1369 20.9014C38.1369 26.8495 35.055 32.3912 30.0014 35.5298C27.3286 37.2419 24.2194 38.1483 21.0453 38.1406M31.023 25.5406L29.7744 24.9731C29.7744 24.9731 27.9582 24.1785 26.8231 23.6109C26.7096 23.6109 26.596 23.4974 26.4825 23.4974C26.2026 23.5043 25.9292 23.5825 25.6879 23.7245C25.4461 23.8663 25.5744 23.838 23.9852 25.6541C23.8774 25.8664 23.6561 25.9993 23.4177 25.9947H23.3042C23.1335 25.9661 22.9754 25.8871 22.8501 25.7677L22.2826 25.5406C21.0647 25.0251 19.9497 24.2945 18.9907 23.3839C18.7636 23.1569 18.4231 22.9298 18.1961 22.7028C17.3557 21.8978 16.6301 20.9811 16.0394 19.9785L15.9258 19.7515C15.8272 19.6128 15.7506 19.4596 15.6988 19.2974C15.6691 19.1008 15.7093 18.9 15.8123 18.7299C15.9156 18.5596 16.2664 18.1623 16.6069 17.8218C16.9475 17.4813 16.9475 17.2542 17.1745 17.0272C17.2911 16.8652 17.3718 16.68 17.4109 16.4842C17.4501 16.2884 17.4469 16.0865 17.4015 15.892C16.8725 14.4232 16.2662 12.9834 15.5853 11.5786C15.4028 11.2947 15.1184 11.0916 14.7907 11.011H13.5421C13.315 11.011 13.088 11.1245 12.861 11.1245L12.7475 11.238C12.5205 11.3515 12.2934 11.5786 12.0664 11.6921C11.8394 11.8056 11.7259 12.1462 11.4988 12.3732C10.7053 13.376 10.2662 14.6134 10.2502 15.892C10.2628 16.7915 10.4558 17.6793 10.8177 18.5029L10.9313 18.8434C11.9505 21.0226 13.376 22.9874 15.1313 24.6325L15.5853 25.0866C15.9157 25.3603 16.2197 25.6643 16.4934 25.9947C18.8454 28.0413 21.6389 29.517 24.655 30.3082C24.9955 30.4217 25.4496 30.4217 25.7901 30.5352H26.9252C27.5185 30.506 28.0988 30.3512 28.6279 30.0812C28.906 29.9552 29.1716 29.8031 29.4225 29.6271L29.6495 29.4001C29.8766 29.1731 30.1036 29.0595 30.3306 28.8325C30.5525 28.6349 30.7437 28.4053 30.8982 28.1515C31.1161 27.6429 31.2693 27.1094 31.3522 26.5623V25.7677C31.2502 25.676 31.1355 25.5996 31.0117 25.5406"
                                                    fill="#718096"/>
                                            </svg>
                                            WhatsApp</a></li>
                                    <li><a href="#" class="contact__link d-flex align-items-center">
                                            <svg class="d-block me-1" width="18" height="18" viewBox="0 0 39 38"
                                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M19.6816 38C30.175 38 38.6816 29.4934 38.6816 19C38.6816 8.5066 30.175 0 19.6816 0C9.18824 0 0.681641 8.5066 0.681641 19C0.681641 29.4934 9.18824 38 19.6816 38Z"
                                                    fill="none" stroke="#718096"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M14.8279 9.99678C15.3608 10.6587 15.8391 11.366 16.3277 12.0623C17.303 13.4509 17.3788 14.7211 15.8096 15.7572C14.9287 16.3391 14.8901 17.1537 15.2766 18.0054C16.3413 20.3535 17.9817 22.1666 20.3683 23.2287C21.4241 23.6985 22.3708 23.6923 23.1176 22.5931C23.5125 22.0111 23.9798 21.4247 24.8428 21.4716C25.968 21.5328 29.7284 24.2649 30.1253 25.3438C30.2896 25.7902 30.2789 26.2348 30.1262 26.689C29.2755 29.2188 27.1949 30.2667 24.7314 29.2632C17.3817 26.2694 12.2651 21.0008 9.14215 13.7484C8.96433 13.3349 8.89324 12.8755 8.82943 12.6429C8.81282 10.9918 10.4036 9.05752 11.9824 8.49892C13.5013 7.9611 14.1042 9.09773 14.8279 9.99678ZM29.3718 18.1286C28.5565 12.8266 26.0353 10.3814 20.6951 9.7062C20.2019 9.64357 19.4596 9.82731 19.446 9.12356C19.4319 8.38805 20.1632 8.56528 20.6569 8.5591C25.6864 8.49691 30.3489 12.8823 30.5208 17.9753C30.4655 18.3596 30.7858 19.1546 29.9246 19.2042C29.344 19.2373 29.4393 18.5679 29.3718 18.1286Z"
                                                      fill="#718096"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M27.9081 17.0915C27.9695 17.6014 28.2098 18.2747 27.5022 18.3939C26.7595 18.5183 26.8349 17.7679 26.727 17.2858C25.9951 14.0111 24.8032 12.8709 21.5549 12.3318C21.0814 12.253 20.3443 12.4095 20.4665 11.6047C20.5573 11.0082 21.1891 11.2237 21.5581 11.1738C24.6767 11.1474 27.5152 13.8196 27.9081 17.0915Z"
                                                      fill="#718096"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M25.3569 16.7907C25.3485 17.1311 25.3116 17.4653 24.9478 17.5904C24.4041 17.7783 24.2745 17.383 24.2098 16.9806C23.9942 15.6373 23.2021 14.9303 21.8625 14.7961C21.4989 14.7599 21.2043 14.5292 21.2458 14.178C21.3038 13.6913 21.737 13.6472 22.1484 13.6622C23.6534 13.6381 25.3929 15.3392 25.3569 16.7907Z"
                                                      fill="#718096"/>
                                            </svg>
                                            Viber</a></li>
                                    <li><a href="#" class="contact__link d-flex align-items-center">
                                            <svg class="d-block me-1" width="18" height="18" viewBox="0 0 39 38"
                                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M19.6816 38C30.175 38 38.6816 29.4934 38.6816 19C38.6816 8.5066 30.175 0 19.6816 0C9.18824 0 0.681641 8.5066 0.681641 19C0.681641 29.4934 9.18824 38 19.6816 38Z"
                                                    fill="#718096"
                                                />
                                                <path
                                                    d="M8.58935 18.8352C8.58935 18.8352 18.0893 14.9364 21.3841 13.5636C22.6471 13.0145 26.9304 11.2572 26.9304 11.2572C26.9304 11.2572 28.9073 10.4884 28.7425 12.3555C28.6876 13.1243 28.2483 15.815 27.809 18.7254C27.15 22.8439 26.4361 27.3468 26.4361 27.3468C26.4361 27.3468 26.3263 28.6098 25.3928 28.8294C24.4593 29.0491 22.9217 28.0607 22.6471 27.841C22.4274 27.6763 18.5286 25.2052 17.1009 23.9971C16.7165 23.6676 16.2772 23.0087 17.1558 22.2399C19.1327 20.4277 21.4939 18.1763 22.9217 16.7486C23.5807 16.0896 24.2396 14.552 21.4939 16.419C17.5951 19.1098 13.7512 21.6358 13.7512 21.6358C13.7512 21.6358 12.8726 22.1849 11.2252 21.6907C9.57773 21.1965 7.65577 20.5375 7.65577 20.5375C7.65577 20.5375 6.33793 19.7139 8.58935 18.8352Z"
                                                    fill="white"
                                                />
                                            </svg>
                                            Telegram</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($posts as $post)

                    <div class="col-lg-4 col-md-6">
                        @include('shared._post-card-author', $post)
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    {{ $posts->links('shared._pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection
