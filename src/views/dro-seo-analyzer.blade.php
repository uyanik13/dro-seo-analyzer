
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google-site-verification" content="MLX5bx8JUS_8LHghN-Wgz0x4jpYBOYWPsZo0B0Te_XY" />
    <meta name="geo.placename" content="İstanbul" /><meta name="geo.position" content="41.063246;28.997317" /><meta name="geo.region" content="TR" />
    <input type="hidden" id="meta_csrf"  value="{{csrf_token()}}">
    <title>Dijitalreaklam.org SEO Analyzer</title>
    <meta name="description" content="dro seo analyzer seo desription"/>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.8.10/tailwind.min.css" />

</head>

<body>




        <div class="px-32 px">
                <div class="py-5 px-4">
                    <div class="flex flex-wrap -mx-4">
                    <div class="w-full lg:w-1/1 px-4 mb-4 lg:mb-0">
                        <div class="h-full border rounded shadow">
                        <div class="flex items-center justify-between py-3 px-4 border-b">
                            <h3 class="text-lg font-heading">{{$seoInfo['url']}}</h3>
                            <span class="py-1 px-3 text-sm text-white font-semibold bg-green-500 rounded-full">{{$seoInfo['loadtime']}} {{__('lang.sec')}} </span>
                        </div>
                        </div>
                    </div>


                    </div>
                </div>

                <div class="py-2 px-4">
                    <div class="flex flex-wrap -mx-4">
                    <div class="w-full lg:w-1/3 px-4 mb-4 lg:mb-0">
                        <div class="h-full border rounded shadow">
                        <div class="flex items-center justify-between py-3 px-4 border-b">
                            <h3 class="text-lg font-heading">{{__('lang.title')}} </h3>
                            <span class="py-1 px-3 text-sm text-white font-semibold bg-green-500 rounded-full">({{strlen($seoInfo['title'])}})</span>
                        </div>
                        <div class="flex flex-col p-4">
                            <span>{{$seoInfo['title']}}</span>
                        </div>
                        </div>
                    </div>
                    <div class="w-full lg:w-1/3 px-4 mb-4 lg:mb-0">
                        <div class="h-full border rounded shadow">
                        <div class="flex items-center justify-between px-4 py-3 border-b">
                            <h3 class="text-lg font-heading">{{__('lang.description')}} </h3>
                            <span class="py-1 px-3 text-sm text-white font-semibold bg-green-500 rounded-full">({{strlen($seoInfo['description'])}})</span>
                        </div>
                            <div class="flex flex-col p-4">
                            <span>{{$seoInfo['description']}}</span>
                            </div>
                        </div>
                    </div>

                    <div class="w-full lg:w-1/3 px-4 mb-4 lg:mb-0">
                        <div class="h-full border rounded shadow">
                        <div class="flex items-center justify-between px-4 py-3 border-b">
                            <h3 class="text-lg font-heading">{{__('lang.point')}} </h3>
                        <span class="py-1 px-3 text-sm text-white font-semibold bg-red-500 rounded-full">{{$seoInfo['points']['allPoints']}}/100</span>
                        </div>
                        <div class="flex flex-col p-4">
                           @if ($seoInfo['points']['allPoints'] < 100)
                             <h5 class="text-xl mb-3 font-heading font-semibold">{{__('lang.you_need_to_fix_your_errors')}}</h5>
                           @else
                            <h5 class="text-xl mb-3 font-heading font-semibold">{{__('lang.congrats_you_have_successfull_website')}}</h5>
                           @endif
                        </div>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="py-8 px-4">
                    <div class="flex flex-wrap -mx-4">
                    <div class="w-full lg:w-1/1 px-4 mb-4 lg:mb-0">
                        <div class="h-full border rounded shadow">
                        <div class="flex items-center justify-between py-3 px-4 border-b">
                            <h3 class="text-lg font-heading">{{__('lang.headers')}}</h3>
                        </div>
                        </div>
                    </div>
                    </div>

                    <div class="py-2 px-4">

                    <div class="flex flex-wrap -mx-4">

                        <div class="w-full lg:w-1/3 px-4 mb-4 lg:mb-0">
                        <div class="h-full border rounded shadow">
                            <div class="flex items-center justify-between py-3 px-4 border-b">
                            <h3 class="text-lg font-heading">{{__('lang.h1')}} </h3>
                            <span class="py-1 px-3 text-sm text-white font-semibold bg-green-500 rounded-full">({{$seoInfo['full_page']['headers']['h1']['count']}})</span>
                            </div>
                            <div class="flex flex-col p-4">
                                @foreach ($seoInfo['full_page']['headers']['h1']['headers'] as $item)
                                    <li>{{$item}}</li>
                                    @endforeach

                            </div>
                        </div>
                        </div>

                        <div class="w-full lg:w-1/3 px-4 mb-4 lg:mb-0">
                        <div class="h-full border rounded shadow">
                            <div class="flex items-center justify-between px-4 py-3 border-b">
                            <h3 class="text-lg font-heading">{{__('lang.h2')}} </h3>
                            <span class="py-1 px-3 text-sm text-white font-semibold bg-green-500 rounded-full">({{$seoInfo['full_page']['headers']['h2']['count']}})</span>
                            </div>
                            <div class="flex flex-col p-4">
                            @foreach ($seoInfo['full_page']['headers']['h2']['headers'] as $item)
                                    <li>{{$item}}</li>
                                    @endforeach

                            </div>
                        </div>
                        </div>

                    <div class="w-full lg:w-1/3 px-4 mb-4 lg:mb-0">
                        <div class="h-full border rounded shadow">
                            <div class="flex items-center justify-between px-4 py-3 border-b">
                            <h3 class="text-lg font-heading">{{__('lang.h3')}} </h3>
                            <span class="py-1 px-3 text-sm text-white font-semibold bg-green-500 rounded-full">({{$seoInfo['full_page']['headers']['h3']['count']}})</span>
                            </div>
                            <div class="flex flex-col p-4">
                            @foreach ($seoInfo['full_page']['headers']['h3']['headers'] as $item)
                                    <li>{{$item}}</li>
                                    @endforeach

                            </div>
                        </div>
                        </div>

                    </div>
                </div>

                <div class="py-2 px-4">
                    <div class="flex flex-wrap -mx-4">

                        <div class="w-full lg:w-1/3 px-4 mb-4 lg:mb-0">
                        <div class="h-full border rounded shadow">
                            <div class="flex items-center justify-between py-3 px-4 border-b">
                            <h3 class="text-lg font-heading">{{__('lang.h4')}} </h3>
                            <span class="py-1 px-3 text-sm text-white font-semibold bg-green-500 rounded-full">({{$seoInfo['full_page']['headers']['h4']['count']}})</span>
                            </div>
                            <div class="flex flex-col p-4">
                                @foreach ($seoInfo['full_page']['headers']['h4']['headers'] as $item)
                                    <li>{{$item}}</li>
                                    @endforeach

                            </div>
                        </div>
                        </div>

                        <div class="w-full lg:w-1/3 px-4 mb-4 lg:mb-0">
                        <div class="h-full border rounded shadow">
                            <div class="flex items-center justify-between px-4 py-3 border-b">
                            <h3 class="text-lg font-heading">{{__('lang.h5')}} </h3>
                            <span class="py-1 px-3 text-sm text-white font-semibold bg-green-500 rounded-full">({{$seoInfo['full_page']['headers']['h5']['count']}})</span>
                            </div>
                            <div class="flex flex-col p-4">
                            @foreach ($seoInfo['full_page']['headers']['h5']['headers'] as $item)
                                    <li>{{$item}}</li>
                                    @endforeach

                            </div>
                        </div>
                        </div>

                        <div class="w-full lg:w-1/3 px-4 mb-4 lg:mb-0">
                            <div class="h-full border rounded shadow">
                                <div class="flex items-center justify-between px-4 py-3 border-b">
                                <h3 class="text-lg font-heading">{{__('lang.h6')}} </h3>
                                <span class="py-1 px-3 text-sm text-white font-semibold bg-green-500 rounded-full">({{$seoInfo['full_page']['headers']['h6']['count']}})</span>
                                </div>
                                <div class="flex flex-col p-4">
                                @foreach ($seoInfo['full_page']['headers']['h6']['headers'] as $item)
                                        <li>{{$item}}</li>
                                        @endforeach

                                </div>
                            </div>
                            </div>

                        </div>
                    </div>

                    <div class="py-8 px-4">
                        <div class="flex flex-wrap -mx-4">
                        <div class="w-full lg:w-1/4 px-4 mb-6 lg:mb-0">
                            <div class="h-full">
                            <div class="flex justify-between items-end mb-2">
                            <h3 class="text-lg font-heading font-semibold">{{__('lang.keywords')}}</h3>
                                <span class="text-5xl leading-none text-blue-700">{{count($seoInfo['full_page']['keywords'])}}</span>
                            </div>
                            <div class="w-full h-4 bg-gray-300 rounded">
                            <div class="h-full bg-blue-500" style="width: {{count($seoInfo['full_page']['keywords'])/2,5}}%;"></div>
                            </div>
                            </div>
                        </div>
                        <div class="w-full lg:w-1/4 px-4 mb-6 lg:mb-0">
                            <div class="h-full">
                            <div class="flex justify-between items-end mb-2">
                                <h3 class="text-lg font-heading font-semibold">{{__('lang.word_count')}}</h3>
                            <span class="text-5xl leading-none text-red-500">{{$seoInfo['full_page']['word_count']}}</span>
                            </div>
                            <div class="w-full h-4 bg-gray-300 rounded">
                            <div class="h-full bg-red-500" style="width: {{$seoInfo['full_page']['word_count']/50}}%;"></div>
                            </div>
                            </div>
                        </div>
                        <div class="w-full lg:w-1/4 px-4 mb-6 lg:mb-0">
                            <div class="h-full">
                            <div class="flex justify-between items-end mb-2">
                                <h3 class="text-lg font-heading font-semibold">{{__('lang.images')}}</h3>
                                <span class="text-5xl leading-none text-purple-500">{{$seoInfo['full_page']['images']['count']}}</span>
                            </div>
                            <div class="w-full h-4 bg-gray-300 rounded">
                            <div class="h-full bg-purple-500" style="width: {{$seoInfo['full_page']['images']['count']}}%;"></div>
                            </div>
                            </div>
                        </div>
                        <div class="w-full lg:w-1/4 px-4 mb-6 lg:mb-0">
                            <div class="h-full">
                            <div class="flex justify-between items-end mb-2">
                                <h3 class="text-lg font-heading font-semibold">{{__('lang.points')}}</h3>
                                <span class="text-5xl leading-none text-green-500">{{$seoInfo['points']['allPoints']}}</span>
                            </div>
                            <div class="w-full h-4 bg-gray-300 rounded">
                            <div class="h-full bg-green-500" style="width: {{$seoInfo['points']['allPoints']}}%;"></div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
               </div>
             </div>




</body>
</html>
