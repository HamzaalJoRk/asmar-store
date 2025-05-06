@extends('front.layouts.master')

@section('title') 
    @lang('translation.index') 
@endsection

@section('body')
    <body data-sidebar="dark" data-layout-scrollable="true">
@endsection

@section('content')
    {{-- عرض الإعلان فقط إذا كانت الحالة مفعل --}}
    @if($advertisement && $advertisement->active && $advertisement->getFirstMediaUrl('image'))
        <div class="text-center mb-4">
            {{-- تنسيق الصورة كإعلان --}}
            <div class="advertisement-container" style="position: relative; display: inline-block; width: 100%; max-width: 600px;">
                <img src="{{ $advertisement->getFirstMediaUrl('image') }}" alt="Advertisement" class="img-fluid rounded" style="width: 100%; height: auto; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                
                {{-- النص تحت الصورة --}}
                @if($advertisement->description)
                    <div class="advertisement-text" style="position: absolute; bottom: 10px; left: 50%; transform: translateX(-50%); background: rgba(0, 0, 0, 0.6); color: white; padding: 10px; font-size: 1.2rem; border-radius: 5px;">
                        {{ $advertisement->description }}
                    </div>
                @endif
            </div>
        </div>
    @endif

    {{-- شريط البحث --}}
    <div class="app-search d-lg-block mb-4 animate__animated animate__fadeInDown">
        <div class="position-relative">
            <input type="text" class="form-control" id="searchInput" placeholder="@lang('translation.Search')">
            <span class="bx bx-search-alt"></span>
        </div>
    </div>

    {{-- قائمة التصنيفات --}}
    <div class="row">
        <div class="form-group products">
            <div class="form-row">
                <div class="w-100">
                    <ul class="products_list" id="products_list">
                        @isset($categories)
                            @foreach($categories as $category)
                                <li class="col-4 pr-0 pl-0">
                                    <a href="{{ route('front.game.category', $category->id) }}"
                                       class="product_group @if(!$category->active || $category->games->count() == 0) disabled @endif"
                                       data-group="soulchill">
                                        <div class="name_wrp" 
                                             style="background-image:url({{ asset('storage/' . $category->image) }});">
                                            <div class="icon">
                                                <img src="{{ $category->image }}" alt="{{ $category->name }}" width="60">
                                            </div>
                                        </div>
                                        <span class="d-block mt-2 mb-2">{{$category->name}}</span>
                                    </a>
                                </li>
                            @endforeach
                        @endisset
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{-- إضافة حركة عند الكتابة في شريط البحث --}}
    <script>
        $(document).ready(function () {
            // الحركة عند الكتابة
            $('#searchInput').on('input', function () {
                $(this).addClass('animate__animated animate__pulse');
                setTimeout(() => {
                    $(this).removeClass('animate__animated animate__pulse');
                }, 500);
            });

            // فحص النص المدخل في البحث لعرض أو إخفاء التصنيفات
            $('#searchInput').on('keyup', function () {
                var value = $(this).val().toLowerCase();
                $('#products_list li').filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endsection




    {{-- <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group " data-group="talktalk">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/ahlan_background.png);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/talktalk_icon.png"></div>
            </div>
            <span class="d-block mt-2 mb-2">Talk Talk</span>
            <div class="keywords" style="display:none;">talk تولك محادثة جواهر كوينز شحن شات</div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group " data-group="hawa">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/hawa_background.png);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/hawa_icon.png">
                </div>
            </div>
            <span class="d-block mt-2 mb-2">Hawa Chat</span>
            <div class="keywords" style="display:none;">Hawa Ghat </div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group disabled" data-group="hiya">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/hiya_background.png);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/hiya_icon.png">
                </div>
            </div>
            <span class="d-block mt-2 mb-2">Hiya</span>
            <div class="keywords" style="display:none;">هيا hiya حواهر كوينز محادثة شات video chat
                فيديو</div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group " data-group="ahlan">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/ahlan_background.png);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/ahlan_icon.png"></div>
            </div>
            <span class="d-block mt-2 mb-2"> Ahlan chat</span>
            <div class="keywords" style="display:none;">ahlan, أهلا, اهلا, live, لايف, شات</div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group " data-group="oohla">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/oohla_background.jpg);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/oohla_icon.png"></div>
            </div>
            <span class="d-block mt-2 mb-2">Oohla</span>
            <div class="keywords" style="display:none;">oohla, chat, أوهلا اوهلا</div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group " data-group="binmo">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/binmo_background.png);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/binmo_icon.png"></div>
            </div>
            <span class="d-block mt-2 mb-2">binmo</span>
            <div class="keywords" style="display:none;">بينمو.شات.صوت</div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group " data-group="Ludo">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/ludo_background.png);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/ludo_icon.png">
                </div>
            </div>
            <span class="d-block mt-2 mb-2">Ludo</span>
            <div class="keywords" style="display:none;">لودو شات محادثة دردشة</div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group " data-group="likee">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/likee_background.png);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/likee_icon-new.png"></div>
            </div>
            <span class="d-block mt-2 mb-2">Likee</span>
            <div class="keywords" style="display:none;">likee,لايكي,ليكي, شات</div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group " data-group="yoyo">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/yoyo_background.png);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/yoyo_icon.png">
                </div>
            </div>
            <span class="d-block mt-2 mb-2">YoYo Topup</span>
            <div class="keywords" style="display:none;">yoyo يويو كوينز شحن coins</div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group disabled" data-group="4fun">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/4fun_background.jpg);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/4fun_icon.png">
                </div>
            </div>
            <span class="d-block mt-2 mb-2">4fun Chat</span>
            <div class="keywords" style="display:none;">4funدردشي صوتيه4fun Chat</div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group " data-group="pubgtr">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/pubg_background.png);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/pubgtr_icon.png"></div>
            </div>
            <span class="d-block mt-2 mb-2">PUBG TR</span>
            <div class="keywords" style="display:none;">pubg tr بابج تركيا player unknown شدات uc
            </div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group " data-group="haki">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/haki_backgrounds.jpg);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/haki_icon.png">
                </div>
            </div>
            <span class="d-block mt-2 mb-2">Haki Chat</span>
            <div class="keywords" style="display:none;">haki,chat, هاكي شات محادثة دردشة coins</div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group " data-group="azal">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/azal_background.jpg);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/azal_icon.png">
                </div>
            </div>
            <span class="d-block mt-2 mb-2">Azal Live</span>
            <div class="keywords" style="display:none;">azal live أزل coins كوينز شحن محادثة دردشة
                أزال</div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group disabled" data-group="kafu">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/kafu_background.jpg);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/kafu_icon.png">
                </div>
            </div>
            <span class="d-block mt-2 mb-2">Kafu Chat</span>
            <div class="keywords" style="display:none;">Kafo كفو شات kafo Chat</div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group " data-group="yoho">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/yoho_background.jpg);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/yoho_icon.png">
                </div>
            </div>
            <span class="d-block mt-2 mb-2">Yoho</span>
            <div class="keywords" style="display:none;">Yoho يوهو شات chat محادثة yoho</div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group " data-group="pubg">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/pubg_background.png);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/pubg_icon.png">
                </div>
            </div>
            <span class="d-block mt-2 mb-2">Pubg Mobile</span>
            <div class="keywords" style="display:none;">pubg,بابج,العاب,بوبج, ألعاب</div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group " data-group="mr7ba">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/mr7ba_background.jpg);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/mr7ba_icon.png"></div>
            </div>
            <span class="d-block mt-2 mb-2">Mrhba Chat</span>
            <div class="keywords" style="display:none;">Mrhba مرحبا شات Mrhba Chat</div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group disabled" data-group="partystar">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/partystar_background.png);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/partystar_icon.png"></div>
            </div>
            <span class="d-block mt-2 mb-2">Party Star</span>
            <div class="keywords" style="display:none;">Party Star محادثة دردشة</div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group " data-group="uplive">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/uplive_background.jpg);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/uplive_icon.png"></div>
            </div>
            <span class="d-block mt-2 mb-2">UpLive</span>
            <div class="keywords" style="display:none;">uplive اب لايف محادثة دردشة</div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group disabled" data-group="lama">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/lama_background.png);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/lama_icon.png">
                </div>
            </div>
            <span class="d-block mt-2 mb-2">LAMA CHAT</span>
            <div class="keywords" style="display:none;">LAMA لما شات دردشي LAMA</div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group " data-group="lami">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/partystar_background.png);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/lami_icon.png">
                </div>
            </div>
            <span class="d-block mt-2 mb-2">Lami CHAT</span>
            <div class="keywords" style="display:none;">لامي شات دردشي صوتيه لامي</div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group " data-group="lightchat">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/lightchat_background.png);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/lightchat_icon.png"></div>
            </div>
            <span class="d-block mt-2 mb-2">Lightchat</span>
            <div class="keywords" style="display:none;">lightchat,light chat, لايتشات</div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group " data-group="ligo">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/ligo_background.jpg);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/ligo_icon.png">
                </div>
            </div>
            <span class="d-block mt-2 mb-2">Ligo Live</span>
            <div class="keywords" style="display:none;">ligo,ligolive, live, chat, ليجو لايف</div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group " data-group="livu">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/livu_background.jpg);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/livu_icon.png">
                </div>
            </div>
            <span class="d-block mt-2 mb-2">LivU</span>
            <div class="keywords" style="display:none;">livu ليفو لايف يو لايفو محادثة شات فيديو
            </div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group " data-group="newstate">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/newstate_background.jpg);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/newstate_icon.png"></div>
            </div>
            <span class="d-block mt-2 mb-2">New State</span>
            <div class="keywords" style="display:none;">pubg mobile new state pubg new state
                newstate بابج نيو ستات لعبة ألعاب</div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group disabled" data-group="aswat">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/aswat_background.jpg);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/aswat_icon.png"></div>
            </div>
            <span class="d-block mt-2 mb-2">ASWAT Chat</span>
            <div class="keywords" style="display:none;">ASWAT Chatاصوات شات ASWATCha</div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group disabled" data-group="yalla">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/telegram_background.png);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/yalla_icon.png"></div>
            </div>
            <span class="d-block mt-2 mb-2">Yalla Live</span>
            <div class="keywords" style="display:none;">yalla, يالله, يلا, live, لايف, شات</div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group " data-group="bella">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/bella_background.png);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/bella_icon.png"></div>
            </div>
            <span class="d-block mt-2 mb-2">Bella Chat</span>
            <div class="keywords" style="display:none;">bella chat بيلا شات محادثة دردشة بلا</div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group disabled" data-group="syriana">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/syriana_background.png);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/syriana_icon.png"></div>
            </div>
            <span class="d-block mt-2 mb-2">Syriana</span>
            <div class="keywords" style="display:none;">Syriana, 3g, 4g, سيريانا سوريانا</div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group " data-group="tumile">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/tumile_background.jpg);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/tumile_icon.png"></div>
            </div>
            <span class="d-block mt-2 mb-2">Tumile</span>
            <div class="keywords" style="display:none;">tumile توميل محادثة شات فيديو</div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group " data-group="mixu">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/tumile_background.jpg);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/mixu_icon.png">
                </div>
            </div>
            <span class="d-block mt-2 mb-2">MixU </span>
            <div class="keywords" style="display:none;">ميكس يو</div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group " data-group="soulfa">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/soulfa_background.jpg);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/soulfa_icon.png"></div>
            </div>
            <span class="d-block mt-2 mb-2">soulfa</span>
            <div class="keywords" style="display:none;">سولفا لايف</div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group " data-group="freefiretr">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/freefire_background.png);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/freefire_icon.png"></div>
            </div>
            <span class="d-block mt-2 mb-2">Free Fire TR</span>
            <div class="keywords" style="display:none;">free fire freefire فري فاير تركي فريفاير
            </div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group " data-group="bigo">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/elux_background.png);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/bigo_icon.png">
                </div>
            </div>
            <span class="d-block mt-2 mb-2">Bigo Live</span>
            <div class="keywords" style="display:none;">bigo,بيغو, شات</div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group " data-group="google" data-filter="turkey">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/google_background.png);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/google_icon-tr.png"></div>
            </div>
            <span class="d-block mt-2 mb-2">Google TR</span>
            <div class="keywords" style="display:none;">google,جوجل,بطاقات,غوغل,تركي</div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group " data-group="freefire">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/freefire_background.png);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/freefire_icon.png"></div>
            </div>
            <span class="d-block mt-2 mb-2">Free Fire</span>
            <div class="keywords" style="display:none;">فري فاير,جارينا,Freefire, free fire, ألعاب,
                العاب</div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group " data-group="itunes" data-filter="turkey">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/itunes_background.png);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/itunes_icon-tr.png"></div>
            </div>
            <span class="d-block mt-2 mb-2">iTunes TR</span>
            <div class="keywords" style="display:none;">itunes, turkey, تركي, apple, gift
                card,بطاقات, تركيا, آي تونز</div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group " data-group="tiktok">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/shahid_background.jpg);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/tiktok_icon.png"></div>
            </div>
            <span class="d-block mt-2 mb-2">TikTok</span>
            <div class="keywords" style="display:none;">tiktok تيكتوك محادثة تكتوك</div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group " data-group="netflix">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/fsn_background.jpg);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/netflix_icon.png"></div>
            </div>
            <span class="d-block mt-2 mb-2">Netflix </span>
            <div class="keywords" style="display:none;">netflix chill نتفلكس نتفليكس نيتفلكس تلفزيون
                افلام مسلسلات</div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group " data-group="itunes" data-filter="USA">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/itunes_background.png);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/itunes_icon-us.png"></div>
            </div>
            <span class="d-block mt-2 mb-2">iTunes US</span>
            <div class="keywords" style="display:none;">itunes, usa, أمريكية, apple, gift
                card,بطاقات, آي تونز</div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group " data-group="jawaker">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/jawaker_background.jpg);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/jawaker_icon.png"></div>
            </div>
            <span class="d-block mt-2 mb-2">Jawaker</span>
            <div class="keywords" style="display:none;">جواكر، jawaker,, ألعاب, العاب, جوكر</div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group disabled" data-group="bein">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/bein_background.jpg);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/bein_icon.png">
                </div>
            </div>
            <span class="d-block mt-2 mb-2">beIN</span>
            <div class="keywords" style="display:none;">bein, بين, بي ان, مباريات, فك تشفير, اشتراك
            </div>
        </a>
    </li>

    <li class="col-4 pr-0 pl-0">
        <a href="#" class="product_group disabled" data-group="razer" data-filter="global">
            <div class="name_wrp"
                style="background-image:url(https://alza3eem.shop/img/products/backgrounds/razer_background.jpg);">
                <div class="icon"><img src="https://alza3eem.shop/img/products/icons/razer_icon-global.png"></div>
            </div>
            <span class="d-block mt-2 mb-2">Razer Global</span>
            <div class="keywords" style="display:none;">razer, rixity, pin, رازر, بطاقات, أكواد,
                USA, أمريك, أمريكية, أميركية أميركا</div>
        </a>
    </li> --}}