@extends('user.layout_profile')
@section('right_content')
    <div class="row py-2">
        <div class="approved-posts-count text-center col-md-4 col-sm-12">
            <a href="">
                <svg width="100px" height="100px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <defs>
                            <path id="check-a"
                                d="M4.29289322,0.292893219 C4.68341751,-0.0976310729 5.31658249,-0.0976310729 5.70710678,0.292893219 C6.09763107,0.683417511 6.09763107,1.31658249 5.70710678,1.70710678 L1.90917969,5.46118164 C1.5186554,5.85170593 0.885490417,5.85170593 0.494966125,5.46118164 C0.104441833,5.07065735 0.104441833,4.43749237 0.494966125,4.04696808 L4.29289322,0.292893219 Z">
                            </path>
                            <path id="check-c"
                                d="M10.7071068,13.2928932 C11.0976311,13.6834175 11.0976311,14.3165825 10.7071068,14.7071068 C10.3165825,15.0976311 9.68341751,15.0976311 9.29289322,14.7071068 L0.292893219,5.70710678 C-0.0976310729,5.31658249 -0.0976310729,4.68341751 0.292893219,4.29289322 L4.29289322,0.292893219 C4.68341751,-0.0976310729 5.31658249,-0.0976310729 5.70710678,0.292893219 C6.09763107,0.683417511 6.09763107,1.31658249 5.70710678,1.70710678 L2.41421356,5 L10.7071068,13.2928932 Z">
                            </path>
                        </defs>
                        <g fill="none" fill-rule="evenodd" transform="rotate(-90 11 7)">
                            <g transform="translate(1 1)">
                                <mask id="check-b" fill="#ffffff">
                                    <use xlink:href="#check-a"></use>
                                </mask>
                                <use fill="#D8D8D8" fill-rule="nonzero" xlink:href="#check-a"></use>
                                <g fill="#d7ff47" mask="url(#check-b)">
                                    <rect width="24" height="24" transform="translate(-7 -5)"></rect>
                                </g>
                            </g>
                            <mask id="check-d" fill="#ffffff">
                                <use xlink:href="#check-c"></use>
                            </mask>
                            <use fill="#000000" fill-rule="nonzero" xlink:href="#check-c"></use>
                            <g fill="#0cb800" mask="url(#check-d)">
                                <rect width="24" height="24" transform="translate(-6 -4)"></rect>
                            </g>
                        </g>
                    </g>
                </svg>
                <h2 class="fw-bold fs-1 mb-1">9</h2>
                <p class="fw-bold fs-4 mb-2">Tin đã đăng</p>
            </a>
        </div>
        <div class="pending-posts-count text-center col-md-4 col-sm-12">
            <a href="">
                <svg fill="#005875" height="100px" width="60px" version="1.1" id="Capa_1"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 297 297"
                    xml:space="preserve" stroke="#005875">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <g>
                            <path
                                d="M251.01,277.015h-17.683l-0.002-31.558c0-31.639-17.358-60.726-48.876-81.901c-3.988-2.682-6.466-8.45-6.466-15.055 s2.478-12.373,6.464-15.053c31.52-21.178,48.878-50.264,48.88-81.904V19.985h17.683c5.518,0,9.992-4.475,9.992-9.993 c0-5.518-4.475-9.992-9.992-9.992H45.99c-5.518,0-9.992,4.475-9.992,9.992c0,5.519,4.475,9.993,9.992,9.993h17.683v31.558 c0,31.642,17.357,60.728,48.875,81.903c3.989,2.681,6.467,8.448,6.467,15.054s-2.478,12.373-6.466,15.053 c-31.519,21.177-48.876,50.263-48.876,81.903v31.558H45.99c-5.518,0-9.992,4.475-9.992,9.993c0,5.519,4.475,9.992,9.992,9.992 h205.02c5.518,0,9.992-4.474,9.992-9.992C261.002,281.489,256.527,277.015,251.01,277.015z M83.657,245.456 c0-33.425,25.085-55.269,40.038-65.314c9.583-6.441,15.304-18.269,15.304-31.642s-5.721-25.2-15.305-31.642 c-14.952-10.046-40.037-31.89-40.037-65.315V19.985h129.686l-0.002,31.558c0,33.424-25.086,55.269-40.041,65.317 c-9.581,6.441-15.301,18.269-15.301,31.64s5.72,25.198,15.303,31.642c14.953,10.047,40.039,31.892,40.041,65.314v31.558h-3.312 c-8.215-30.879-50.138-64.441-55.377-68.537c-3.616-2.828-8.694-2.826-12.309,0c-5.239,4.095-47.163,37.658-55.378,68.537h-3.311 V245.456z M189.033,277.015h-81.067c6.584-15.391,25.383-34.873,40.534-47.76C163.652,242.142,182.45,261.624,189.033,277.015z">
                            </path>
                            <path
                                d="M148.497,191.014c2.628,0,5.206-1.069,7.064-2.928c1.868-1.858,2.928-4.437,2.928-7.064s-1.06-5.206-2.928-7.065 c-1.858-1.857-4.436-2.927-7.064-2.927c-2.628,0-5.206,1.069-7.064,2.927c-1.859,1.859-2.928,4.438-2.928,7.065 s1.068,5.206,2.928,7.064C143.291,189.944,145.869,191.014,148.497,191.014z">
                            </path>
                            <path
                                d="M148.5,138.019c5.519,0,9.992-4.474,9.992-9.992v-17.664c0-5.518-4.474-9.993-9.992-9.993s-9.992,4.475-9.992,9.993v17.664 C138.508,133.545,142.981,138.019,148.5,138.019z">
                            </path>
                        </g>
                    </g>
                </svg>
                <h2 class="fw-bold fs-1 mb-1">9</h2>
                <p class="fw-bold fs-4 mb-2">Tin chờ duyệt</p>
            </a>
        </div>
        <div class="rejected-posts-count text-center col-md-4 col-sm-12">
            <a href="">
                <svg width="60px" height="100px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <defs>
                            <style>
                                .cls-1 {
                                    fill: #ff9d2e;
                                }

                                .cls-2 {
                                    fill: #db0000;
                                }
                            </style>
                        </defs>
                        <g data-name="6. Box Denied" id="_6._Box_Denied">
                            <path class="cls-1"
                                d="M10,1h6a0,0,0,0,1,0,0V6.13a.87.87,0,0,1-.87.87H10.87A.87.87,0,0,1,10,6.13V1A0,0,0,0,1,10,1Z">
                            </path>
                            <path class="cls-2"
                                d="M11,26H3a3,3,0,0,1-3-3V3A3,3,0,0,1,3,0H23a3,3,0,0,1,3,3v8a1,1,0,0,1-2,0V3a1,1,0,0,0-1-1H3A1,1,0,0,0,2,3V23a1,1,0,0,0,1,1h8a1,1,0,0,1,0,2Z">
                            </path>
                            <path class="cls-2" d="M7,22H5a1,1,0,0,1,0-2H7a1,1,0,0,1,0,2Z"></path>
                            <path class="cls-2"
                                d="M23,32a9,9,0,1,1,9-9A9,9,0,0,1,23,32Zm0-16a7,7,0,1,0,7,7A7,7,0,0,0,23,16Z"></path>
                            <circle class="cls-1" cx="23" cy="23" r="5"></circle>
                            <path class="cls-2"
                                d="M24.41,23l1.3-1.29a1,1,0,0,0-1.42-1.42L23,21.59l-1.29-1.3a1,1,0,0,0-1.42,1.42L21.59,23l-1.3,1.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L23,24.41l1.29,1.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z">
                            </path>
                        </g>
                    </g>
                </svg>
                <h2 class="fw-bold fs-1 mb-1">9</h2>
                <p class="fw-bold fs-4 mb-2">Tin bị từ chối</p>
            </a>
        </div>
    </div>
@endsection
