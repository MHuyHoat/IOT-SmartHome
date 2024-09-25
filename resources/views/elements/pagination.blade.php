@if ($paginator->hasPages())

        <nav class="wrap-pagination">

                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                <div class="item-control pagination-prev">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_650_79390)">
                                <path d="M5.293 13.7071C5.4816 13.8892 5.7342 13.99 5.9964 13.9878C6.2586 13.9855 6.50941 13.8803 6.69482 13.6949C6.88023 13.5095 6.9854 13.2587 6.98767 12.9965C6.98995 12.7343 6.88916 12.4817 6.707 12.2931L3.414 9.00008L15 9.00008C15.2652 9.00008 15.5196 8.89472 15.7071 8.70719C15.8946 8.51965 16 8.2653 16 8.00008C16 7.73486 15.8946 7.48051 15.7071 7.29297C15.5196 7.10544 15.2652 7.00008 15 7.00008L3.414 7.00008L6.707 3.70708C6.80251 3.61483 6.87869 3.50449 6.9311 3.38249C6.98351 3.26048 7.0111 3.12926 7.01225 2.99648C7.0134 2.8637 6.9881 2.73202 6.93782 2.60913C6.88754 2.48623 6.81329 2.37458 6.71939 2.28069C6.6255 2.18679 6.51385 2.11254 6.39095 2.06226C6.26806 2.01198 6.13638 1.98668 6.0036 1.98783C5.87082 1.98898 5.7396 2.01657 5.61759 2.06898C5.49559 2.12139 5.38525 2.19757 5.293 2.29308L0.293 7.29308C0.105528 7.48061 0.000213076 7.73492 0.0002131 8.00008C0.000213123 8.26525 0.105528 8.51955 0.293 8.70708L5.293 13.7071Z"
                                      fill="#101010"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_650_79390">
                                    <rect width="16" height="16" fill="white"
                                          transform="translate(16 16) rotate(180)"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                </div>
                @else
                <div class="item-control pagination-prev">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_650_79390)">
                                <path d="M5.293 13.7071C5.4816 13.8892 5.7342 13.99 5.9964 13.9878C6.2586 13.9855 6.50941 13.8803 6.69482 13.6949C6.88023 13.5095 6.9854 13.2587 6.98767 12.9965C6.98995 12.7343 6.88916 12.4817 6.707 12.2931L3.414 9.00008L15 9.00008C15.2652 9.00008 15.5196 8.89472 15.7071 8.70719C15.8946 8.51965 16 8.2653 16 8.00008C16 7.73486 15.8946 7.48051 15.7071 7.29297C15.5196 7.10544 15.2652 7.00008 15 7.00008L3.414 7.00008L6.707 3.70708C6.80251 3.61483 6.87869 3.50449 6.9311 3.38249C6.98351 3.26048 7.0111 3.12926 7.01225 2.99648C7.0134 2.8637 6.9881 2.73202 6.93782 2.60913C6.88754 2.48623 6.81329 2.37458 6.71939 2.28069C6.6255 2.18679 6.51385 2.11254 6.39095 2.06226C6.26806 2.01198 6.13638 1.98668 6.0036 1.98783C5.87082 1.98898 5.7396 2.01657 5.61759 2.06898C5.49559 2.12139 5.38525 2.19757 5.293 2.29308L0.293 7.29308C0.105528 7.48061 0.000213076 7.73492 0.0002131 8.00008C0.000213123 8.26525 0.105528 8.51955 0.293 8.70708L5.293 13.7071Z"
                                      fill="#101010"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_650_79390">
                                    <rect width="16" height="16" fill="white"
                                          transform="translate(16 16) rotate(180)"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                </div>
                @endif
            <ul class="pagination justify-content-center">
                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="page-item"><a class="page-link disable">{{ $element }}</a></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active"><a class="page-link active">{{ $page }}</a></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </ul>
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                <div class="item-control pagination-next">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_650_79393)">
                                <path d="M10.707 2.29292C10.5184 2.11076 10.2658 2.00997 10.0036 2.01225C9.7414 2.01452 9.49059 2.11969 9.30518 2.3051C9.11977 2.49051 9.0146 2.74132 9.01233 3.00352C9.01005 3.26572 9.11084 3.51832 9.293 3.70692L12.586 6.99992L0.999999 6.99992C0.734783 6.99992 0.480429 7.10528 0.292892 7.29281C0.105356 7.48035 -1.00055e-06 7.7347 -1.04692e-06 7.99992C-1.0933e-06 8.26514 0.105356 8.51949 0.292892 8.70703C0.480428 8.89456 0.734782 8.99992 0.999999 8.99992L12.586 8.99992L9.293 12.2929C9.19749 12.3852 9.12131 12.4955 9.0689 12.6175C9.01649 12.7395 8.9889 12.8707 8.98775 13.0035C8.98659 13.1363 9.0119 13.268 9.06218 13.3909C9.11246 13.5138 9.18671 13.6254 9.2806 13.7193C9.3745 13.8132 9.48615 13.8875 9.60904 13.9377C9.73194 13.988 9.86362 14.0133 9.9964 14.0122C10.1292 14.011 10.2604 13.9834 10.3824 13.931C10.5044 13.8786 10.6148 13.8024 10.707 13.7069L15.707 8.70692C15.8945 8.51939 15.9998 8.26509 15.9998 7.99992C15.9998 7.73476 15.8945 7.48045 15.707 7.29292L10.707 2.29292Z"
                                      fill="#101010"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_650_79393">
                                    <rect width="16" height="16" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                </div>
                @else
                <div class="item-control pagination-next">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_650_79393)">
                            <path d="M10.707 2.29292C10.5184 2.11076 10.2658 2.00997 10.0036 2.01225C9.7414 2.01452 9.49059 2.11969 9.30518 2.3051C9.11977 2.49051 9.0146 2.74132 9.01233 3.00352C9.01005 3.26572 9.11084 3.51832 9.293 3.70692L12.586 6.99992L0.999999 6.99992C0.734783 6.99992 0.480429 7.10528 0.292892 7.29281C0.105356 7.48035 -1.00055e-06 7.7347 -1.04692e-06 7.99992C-1.0933e-06 8.26514 0.105356 8.51949 0.292892 8.70703C0.480428 8.89456 0.734782 8.99992 0.999999 8.99992L12.586 8.99992L9.293 12.2929C9.19749 12.3852 9.12131 12.4955 9.0689 12.6175C9.01649 12.7395 8.9889 12.8707 8.98775 13.0035C8.98659 13.1363 9.0119 13.268 9.06218 13.3909C9.11246 13.5138 9.18671 13.6254 9.2806 13.7193C9.3745 13.8132 9.48615 13.8875 9.60904 13.9377C9.73194 13.988 9.86362 14.0133 9.9964 14.0122C10.1292 14.011 10.2604 13.9834 10.3824 13.931C10.5044 13.8786 10.6148 13.8024 10.707 13.7069L15.707 8.70692C15.8945 8.51939 15.9998 8.26509 15.9998 7.99992C15.9998 7.73476 15.8945 7.48045 15.707 7.29292L10.707 2.29292Z"
                                  fill="#101010"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_650_79393">
                                <rect width="16" height="16" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                    </a>
                </div>
                @endif

        </nav>
@endif
