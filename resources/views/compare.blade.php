@extends('layouts.app', array('menu' => $menu, 'menuFooter' => $menuFooter, 'bootcamps' => $bootcamps))

@section('content')
<div class="row full-width">
    <div class="col-lg-12" 
        style="background-image: url('{{env('SITE_URL')}}/img/banner.jpg'); 
                height: 100vh; 
                width: 100%;
                background-size: cover;
                background-position: 20% 50%;">

    </div>
    <section class="title-banner">
        <h2 class="text-center">{{__('messages.about4Geeks')}}</h1>
        <h1 class="text-center">Compare {{$school1}} vs {{$school2}} vs {{$school3}}</h1>
    </section>
</div>

<div class="row full-width">
        <div class="col-md-12 table">

<article class="">
<!-- Menu Mobile -->
<ul class="menu-table-mobile">
        <li id="li-{{$school1}}">
            <div class="options-bootcamp-responsive">
                <div class="img-option" style="background-image:url('{{env('API_URL')}}/logos/{{$school1}}.png')">
                </div>
                <p class="text-center">{{$school1}}</p>
            </div>
        </li>
        <li id="li-{{$school2}}">
            <div class="options-bootcamp-responsive">
                <div class="img-option" style="background-image:url('{{env('API_URL')}}/logos/{{$school2}}.png')">
                </div>
                <p class="text-center">{{$school2}}</p>
                <div class="div-select" style="text-align: center;">
                    <select id="select1" class="custom-select" onchange="change()">
                        <option>{{$school2}}</option>
   
    
                            @foreach($dataSchools as $key => $com)
                                @if($key != '4geeks' && $key != $school2 && $key != $school3)
                                    <option value="{{$key}}">{{$key}}</option>
                                @endif
                            @endforeach
   
                    </select>
                </div>
            </div>
        </li>
        <li id="li-{{$school3}}">
            <div class="options-bootcamp-responsive">
                <div class="img-option" style="background-image:url('{{env('API_URL')}}/logos/{{$school3}}.png')">
                </div>
                <p class="text-center">{{$school3}}</p>
                <div class="div-select" style="text-align: center;">
                    <select id="select2" class="custom-select" onchange="change()">
                        <option>{{$school3}}</option>

                            @foreach($dataSchools as $key => $com)
                                @if($key != '4geeks' && $key != $school2 && $key != $school3)
                                    <option value="{{$key}}">{{$key}}</option>
                                @endif
                            @endforeach
                    </select>
                </div>
            </div>
        </li>
    </ul>
<!-- End Menu Mobile -->

    
    <table>
        <thead>
            <tr class="hidden-tableresponsive">
            <th colspan="2" class="span-columns"></th>
            <th colspan="2" class="span-columns">
                <p>{{__('messages.pickBootcamp')}}</p>
            </th>
            </tr>
            <tr>
                <th class="bg-grey">
                    <div>
                    <div class="img-first-table" style="background-image:url('{{env('SITE_URL')}}/img/codigo-10.png')">
                        </div>
                    </div>
                </th>
                <th>
                    <div class="bg-4geeks-school">
                        <div class="img-second-table" style="background-image:url('http://assets.breatheco.de/apis/img/images.php?blob&cat=logo&tags=4geeks,white')">
                        </div>
                        <div class="div-select" style="text-align: center;">
                            <select class="custom-select disable-icon-select" disabled="disabled">
                                <option selected>{{$school1}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="tg-4geeks-school"></div>
                </th>
                <th>
                    <div class="bg-other-school">
                        <div class="img-three-table" style="background-image:url('{{env('API_URL')}}/logos/{{$school2}}.png')">
                        </div>
                        <div class="div-select" style="text-align: center;">
                            <select id="selectDesktop1" class="custom-select" onchange="changeDesktop()">
                                <option selected>{{$school2}}</option>
                                    @foreach($dataSchools as $key => $com)
                                        @if($key != '4geeks' && $key != $school2 && $key != $school3)
                                            <option value="{{$key}}">{{$key}}</option>
                                        @endif
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="tg-other-school"></div>
                </th>
                <th class="default">
                    <div class="bg-other-school">
                    <div class="img-four-table" style="background-image:url('{{env('API_URL')}}/logos/{{$school3}}.png')">
                        </div>
                        <div class="div-select" style="text-align: center;">
                            <select id="selectDesktop2" class="custom-select" onchange="changeDesktop()">
                                <option selected>{{$school3}}</option>
                                    @foreach($dataSchools as $key => $com)
                                        @if($key != '4geeks' && $key != $school2 && $key != $school3)
                                            <option value="{{$key}}">{{$key}}</option>
                                        @endif
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="tg-other-school"></div>
                </th>
            </tr>
            <tr class="hidden-tableresponsive">
                <th class="bg-grey">
                </th>
                <th>
                    <div class="bg-grey-shape">
                        <div class="triangule-white1"></div>
                    </div>
                </th>
                <th>
                    <div class="bg-grey-shape">
                        <div class="triangule-white1"></div>
                    </div>
                </th>
                <th>
                    <div class="bg-grey-shape">
                        <div class="triangule-white1"></div>
                    </div>
                </th>
            </tr>
        </thead>
        

















        <tbody>
                <tr>
                    <td class="bg-grey first-col">
                        <div class="menu-title">
                            <p class="title">{{__('messages.price')}}</p>
                        </div>
                    </td>
                        @foreach($comparisonCombinationArray as $key => $com)
                            @if($key == $school1)
                            <td class="bg-white">
                                <div class="justify-text">
                                    <div>
                                        <p>Avg usd price monthly: {{$com->price->avg_usd_price_monthly}}</p>
                                        <p>Avg usd price upfront: {{$com->price->avg_usd_price_upfront}}</p>
                                        <p>Finance max length in months: {{$com->price->finance_max_length_in_months}} </p>
                                        <p>Finance min length in months: {{$com->price->finance_min_length_in_months}} </p>
                                    </div>
                                </div>
                            </td>
                            @endif
                        @endforeach
        
                        @foreach($comparisonCombinationArray as $key => $com)
                            @if($key == $school2)
                            <td class="bg-white">
                                <div class="justify-text">
                                    <div>
                                        <p>Avg usd price monthly: {{$com->price->avg_usd_price_monthly}} </p>
                                        <p>Avg usd price upfront: {{$com->price->avg_usd_price_upfront}} </p>
                                        <p>Finance max length in months: {{$com->price->finance_max_length_in_months}} </p>
                                        <p>Finance min length in months: {{$com->price->finance_min_length_in_months}} </p>
                                    </div>
                                </div>
                            </td>
                            @endif
                        @endforeach
        
                        @foreach($comparisonCombinationArray as $key => $com)
                            @if($key == $school3)
                            <td class="bg-white">
                                <div class="justify-text">
                                    <div>
                                        <p>Avg usd price monthly: {{$com->price->avg_usd_price_monthly}} </p>
                                        <p>Avg usd price upfront: {{$com->price->avg_usd_price_upfront}} </p>
                                        <p>Finance max length in months: {{$com->price->finance_max_length_in_months}} </p>
                                        <p>Finance min length in months: {{$com->price->finance_min_length_in_months}} </p>
                                    </div>
                                </div>
                            </td> 
                            @endif
                        @endforeach
                </tr>
                <tr>
                    <td class="bg-grey">
                        <div class="menu-title">
                            <p class="title">{{__('messages.focus')}}</p>
                        </div>
                    </td>
                    <td class="">
                        <div class="justify-text text-bg-grey">
                            <div>
                                <div>
                                    @foreach($comparisonCombinationArray as $key => $com)
                                        @if($key == $school1)
                                            @if (is_array($com->focus))
                                                @foreach($com->focus as $d)
                                                    <p> {{$d}} </p>
                                                @endforeach
                                            @else
                                                <p> {{$com->focus}} </p>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="">
                        <div class="justify-text text-bg-grey">
                            <div >
                                <div>    
                                    @foreach($comparisonCombinationArray as $key => $com)
                                        @if($key == $school2)
                                            @if (is_array($com->focus))
                                                @foreach($com->focus as $d)
                                                    <p>{{$d}} </p>
                                                @endforeach
                                            @else
                                                <p>{{$com->focus}}</p>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="">
                        <div class="justify-text text-bg-grey">
                            <div >
                                <div>    
                                    @foreach($comparisonCombinationArray as $key => $com)
                                        @if($key == $school3)
                                            @if (is_array($com->focus))
                                                @foreach($com->focus as $d)
                                                    <p>{{$d}} </p>
                                                @endforeach
                                            @else
                                                <p>{{$com->focus}}</p>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="bg-grey">
                        <div class="menu-title">
                            <p class="title">{{__('messages.timeCommitmen')}}</p>
                        </div>
                    </td>
                    @foreach($comparisonCombinationArray as $key => $com)
                        @if($key == $school1)
                            @foreach($com->time_commitment as $data)
                                <td class="bg-white">
                                    <div class="justify-text">
                                        <div>
                                            <p>{{$data}}</p>
                                        </div>
                                    </div>
                                </td>
                            @endforeach
                        @endif
                    @endforeach
        
                    @foreach($comparisonCombinationArray as $key => $com)
                        @if($key == $school2)
                            @foreach($com->time_commitment as $data)
                                <td class="bg-white">
                                    <div class="justify-text">
                                        <div>
                                            <p>{{$data}}</p>
                                        </div>
                                    </div>
                                </td>
                            @endforeach
                        @endif
                    @endforeach
        
                    @foreach($comparisonCombinationArray as $key => $com)
                        @if($key == $school3)
                            @foreach($com->time_commitment as $data)
                                <td class="bg-white">
                                    <div class="justify-text">
                                        <div>
                                            <p>{{$data}}</p>
                                        </div>
                                    </div>
                                </td>
                            @endforeach
                        @endif
                    @endforeach
                </tr>
                <tr>
                    <td class="bg-grey">
                        <div class="menu-title">
                            <p class="title">{{__('messages.learningStyle')}}</p>
                        </div>
                    </td>
        
                    @foreach($comparisonCombinationArray as $key => $com)
                        @if($key == $school1)
                            @php
                                $data = (array) $com;
                            @endphp    
                            <td class="">
                                <div class="justify-text text-bg-grey">
                                    <div>
                                        @if($data["learning-style"]->one_on_one_mentorship)
                                            <p>One on one mentorship</p>
                                        @endif
                                        @if($data["learning-style"]->online_exercises)
                                            <p>Online Exercises</p>
                                        @endif
                                        @if($data["learning-style"]->description)
                                            <p>{{$data["learning-style"]->description}}</p>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        @endif
                    @endforeach
        
                    @foreach($comparisonCombinationArray as $key => $com)
                        @if($key == $school2)
                            @php
                                $data = (array) $com;
                            @endphp    
                            <td class="">
                                <div class="justify-text text-bg-grey">
                                    <div>
                                        @if($data["learning-style"]->one_on_one_mentorship)
                                            <p>One on one mentorship</p>
                                        @endif
                                        @if($data["learning-style"]->online_exercises)
                                            <p>Online Exercises</p>
                                        @endif
                                        @if($data["learning-style"]->description)
                                            <p>{{$data["learning-style"]->description}}</p>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        @endif
                    @endforeach
        
                    @foreach($comparisonCombinationArray as $key => $com)
                        @if($key == $school3)
                            @php
                                $data = (array) $com;
                            @endphp    
                            <td class="">
                                <div class="justify-text text-bg-grey">
                                    <div>
                                        @if($data["learning-style"]->one_on_one_mentorship)
                                            <p>One on one mentorship</p>
                                        @endif
                                        @if($data["learning-style"]->online_exercises)
                                            <p>Online Exercises</p>
                                        @endif
                                        @if($data["learning-style"]->description)
                                            <p>{{$data["learning-style"]->description}}</p>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        @endif
                    @endforeach
                </tr>
                <tr>
                    <td class="bg-grey">
                        <div class="menu-title">
                        <p class="title">{{__('onlinePlatform')}}</p>
                        </div>
                    </td>
                    
                    @foreach($comparisonCombinationArray as $key => $com)
                        @if($key == $school1)
                        @php
                            $data = (array) $com;
                        @endphp
                            
                        <td class="bg-white">
                            <div class="justify-text">
                                <div class="online-platform">
                                @if($data["online-platform"])
                                    <i class="fas fa-check text-center"></i>
                                    <p>Propietary</p>
                                @endif
                                </div>
                            </div>
                        </td>        
                        @endif
                    @endforeach
        
                    @foreach($comparisonCombinationArray as $key => $com)
                        @if($key == $school2)
                        @php
                            $data = (array) $com;
                        @endphp
                            
                        <td class="bg-white">
                            <div class="justify-text">
                                <div class="online-platform">
                                @if($data["online-platform"])
                                    <i class="fas fa-check text-center"></i>
                                    <p>Propietary</p>
                                @endif
                                </div>
                            </div>
                        </td>        
                        @endif
                    @endforeach
        
                    @foreach($comparisonCombinationArray as $key => $com)
                        @if($key == $school3)
                        @php
                            $data = (array) $com;
                        @endphp
                            
                        <td class="bg-white">
                            <div class="justify-text">
                                <div class="online-platform">
                                @if($data["online-platform"])
                                    <i class="fas fa-check text-center"></i>
                                    <p>Propietary</p>
                                @endif
                                </div>
                            </div>
                        </td>        
                        @endif
                    @endforeach
                </tr>
                <tr>
                    <td class="bg-grey">
                        <div class="menu-title">
                            <p class="title">{{__('messages.syllabus')}}</p>
                        </div>
                    </td>
                    
                    <td class="">
                        <div class="justify-text text-bg-grey">
                            <div>
                                <p>{{__('messages.topic')}}:
                                    @foreach($comparisonCombinationArray as $key => $com)
                                        @if($key == $school1)
                                            @php
                                                $ultimo = end($com->syllabus->topics);
                                            @endphp
                                                @foreach($com->syllabus->topics as $i => $d)
                                                    @if($d != $ultimo)
                                                        {{$d}},
                                                    @else
                                                        {{$d}}
                                                    @endif
                                                @endforeach
                                        @endif
                                    @endforeach
                                </p>
                                <p>{{__('messages.skills')}}:
                                    @foreach($comparisonCombinationArray as $key => $com)
                                        @if($key == $school1)
                                        @php
                                            $ultimo = end($com->syllabus->skills);
                                        @endphp
                                                @foreach($com->syllabus->skills as $i => $d)
                                                    @if($d != $ultimo)
                                                        {{$d}},
                                                    @else
                                                        {{$d}}
                                                    @endif
                                                @endforeach
                                        @endif
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </td>
        
                    <td class="">
                        <div class="justify-text text-bg-grey">
                            <div>
                                <p>{{__('messages.topic')}}:
                                    @foreach($comparisonCombinationArray as $key => $com)
                                        @if($key == $school2)
                                            @php
                                                $ultimo = end($com->syllabus->topics);
                                            @endphp
                                                @foreach($com->syllabus->topics as $i => $d)
                                                    @if($d != $ultimo)
                                                        {{$d}},
                                                    @else
                                                        {{$d}}
                                                    @endif
                                                @endforeach
                                        @endif
                                    @endforeach
                                </p>
                                <p>{{__('messages.skills')}}:
                                    @foreach($comparisonCombinationArray as $key => $com)
                                        @if($key == $school2)
                                        @php
                                            $ultimo = end($com->syllabus->skills);
                                        @endphp
                                                @foreach($com->syllabus->skills as $i => $d)
                                                    @if($d != $ultimo)
                                                        {{$d}},
                                                    @else
                                                        {{$d}}
                                                    @endif
                                                @endforeach
                                        @endif
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </td>
        
                    <td class="">
                        <div class="justify-text text-bg-grey">
                            <div>
                                <p>{{__('messages.topic')}}:
                                    @foreach($comparisonCombinationArray as $key => $com)
                                        @if($key == $school3)
                                            @php
                                                $ultimo = end($com->syllabus->topics);
                                            @endphp
                                                @foreach($com->syllabus->topics as $i => $d)
                                                    @if($d != $ultimo)
                                                        {{$d}},
                                                    @else
                                                        {{$d}}
                                                    @endif
                                                @endforeach
                                        @endif
                                    @endforeach
                                </p>
                                <p>{{__('messages.skills')}}:
                                    @foreach($comparisonCombinationArray as $key => $com)
                                        @if($key == $school3)
                                        @php
                                            $ultimo = end($com->syllabus->skills);
                                        @endphp
                                                @foreach($com->syllabus->skills as $i => $d)
                                                    @if($d != $ultimo)
                                                        {{$d}},
                                                    @else
                                                        {{$d}}
                                                    @endif
                                                @endforeach
                                        @endif
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="bg-grey">
                        <div class="menu-title">
                            <p class="title">{{__('messages.mentors')}}</p>
                        </div>
                    </td>
                    <td class="bg-white">
                        <div class="justify-text">
                            <div>
                                @foreach($comparisonCombinationArray as $key => $com)
                                    @if($key == $school1)
                                        @if($com->mentors->industry_influencers)
                                        <p>{{__('messages.industryInfluencers')}}</p>
                                        @else
                                            <p>{{__('messages.noIndustryInfluencers')}}</p>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </td>
        
                    <td class="bg-white">
                        <div class="justify-text ">
                            <div>
                                @foreach($comparisonCombinationArray as $key => $com)
                                    @if($key == $school2)
                                        @if($com->mentors->industry_influencers)
                                            <p>{{__('messages.industryInfluencers')}}</p>
                                        @else
                                            <p>{{__('messages.noIndustryInfluencers')}}</p>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </td>
        
                    <td class="bg-white">
                        <div class="justify-text ">
                            <div>
                                @foreach($comparisonCombinationArray as $key => $com)
                                    @if($key == $school3)
                                        @if($com->mentors->industry_influencers)
                                            <p>{{__('messages.industryInfluencers')}}</p>
                                        @else
                                            <p>{{__('messages.noIndustryInfluencers')}}</p>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="bg-grey">
                        <div class="menu-title">
                            <p class="title">{{__('messages.jobGuarantee')}}</p>
                        </div>
                    </td>
                    <td class="">
                        <div class="justify-text text-bg-grey">
                            <div>
                                @foreach($comparisonCombinationArray as $key => $com)
                                    @if($key == $school1)
                                        @if($com->job_guarantee->refund)
                                            <p>{{__('messages.refund')}}: <i class="fas fa-check"></i></p>
                                        @else
                                            <p>{{__('messages.refund')}}: <i class="fas fa-times"></i></p>
                                        @endif
        
                                        @if($com->job_guarantee->defered)
                                            <p>{{__('messages.defered')}}: <i class="fas fa-check"></i></p>
                                        @else
                                            <p>{{__('messages.defered')}}: <i class="fas fa-times"></i></p>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </td>
                    <td class="">
                        <div class="justify-text text-bg-grey">
                            <div>
                                @foreach($comparisonCombinationArray as $key => $com)
                                    @if($key == $school2)
                                        @if($com->job_guarantee->refund)
                                            <p>{{__('messages.refund')}}: <i class="fas fa-check"></i></p>
                                        @else
                                            <p>{{__('messages.refund')}}: <i class="fas fa-times"></i></p>
                                        @endif
        
                                        @if($com->job_guarantee->defered)
                                            <p>{{__('messages.defered')}}: <i class="fas fa-check"></i></p>
                                        @else
                                            <p>{{__('messages.defered')}}: <i class="fas fa-times"></i></p>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </td>
                    <td class="">
                        <div class="justify-text text-bg-grey">
                            <div>
                                @foreach($comparisonCombinationArray as $key => $com)
                                    @if($key == $school3)
                                        @if($com->job_guarantee->refund)
                                            <p>{{__('messages.refund')}}: <i class="fas fa-check"></i></p>
                                        @else
                                            <p>{{__('messages.refund')}}: <i class="fas fa-times"></i></p>
                                        @endif
        
                                        @if($com->job_guarantee->defered)
                                            <p>{{__('messages.defered')}}: <i class="fas fa-check"></i></p>
                                        @else
                                            <p>{{__('messages.defered')}}: <i class="fas fa-times"></i></p>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="bg-grey">
                        <div class="menu-title">
                            <p class="title">{{__('messages.placementRate')}}</p>
                        </div>
                    </td>
                    <td class="bg-white">
                        <div class="justify-text">
                            <div>
                                @foreach($comparisonCombinationArray as $key => $com)
                                    @if($key == $school1)
                                        <p>{{$com->placement_rate}}</p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </td>
                    <td class="bg-white">
                        <div class="justify-text">
                            <div>
                                @foreach($comparisonCombinationArray as $key => $com)
                                    @if($key == $school2)
                                        <p>{{$com->placement_rate}}</p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </td>
                    <td class="bg-white">
                        <div class="justify-text">
                            <div>
                                @foreach($comparisonCombinationArray as $key => $com)
                                    @if($key == $school3)
                                        <p>{{$com->placement_rate}}</p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="bg-grey">
                        <div class="menu-title">
                            <p class="title">{{__('messages.postGraduateSupport')}}</p>
                        </div>
                    </td>
                    <td class="">
                        <div class="justify-text text-bg-grey">
                            <div>
                                @foreach($comparisonCombinationArray as $key => $com)
                                    @if($key == $school1)
                                        @if($com->post_graduate_support)
                                            <p>{{__('messages.jobSupport')}}</p>
                                        @else
                                            <p></p>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </td>
                    <td class="">
                        <div class="justify-text text-bg-grey">
                            <div>
                                @foreach($comparisonCombinationArray as $key => $com)
                                    @if($key == $school2)
                                        @if($com->post_graduate_support)
                                            <p>{{__('messages.jobSupport')}}</p>
                                        @else
                                            <p></p>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </td>
                    <td class="">
                        <div class="justify-text text-bg-grey">
                            <div>
                                @foreach($comparisonCombinationArray as $key => $com)
                                    @if($key == $school3)
                                        @if($com->post_graduate_support)
                                            <p>{{__('messages.jobSupport')}}</p>
                                        @else
                                            <p></p>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="bg-grey">
                        <div class="menu-title">
                            <p class="title">{{__('messages.preWork')}}</p>
                        </div>
                    </td>
                    <td class="">
                        <div class="justify-text">
                            <div>
                                @foreach($comparisonCombinationArray as $key => $com)
                                    @if($key == $school1)
                                        <p>{{__('messages.avgDays')}}: {{$com->pre_work->avg_length_in_days}}</p>
                                        @php
                                            $ultimo = end($com->pre_work->technologies);
                                        @endphp
                                        <p>{{__('messages.tecnologies')}}:
                                        @foreach($com->pre_work->technologies as $i => $t)
                                            @if($t != $ultimo)
                                                {{$t}},
                                            @else
                                                {{$t}}
                                            @endif
                                        @endforeach
                                        </p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </td>
                    
                    <td>
                        <div class="justify-text">
                            <div>
                                @foreach($comparisonCombinationArray as $key => $com)
                                    @if($key == $school2)
                                        <p>{{__('messages.avgDays')}}: {{$com->pre_work->avg_length_in_days}}</p>
                                        @php
                                            $ultimo = end($com->pre_work->technologies);
                                        @endphp
                                        <p>{{__('messages.tecnologies')}}:
                                        @foreach($com->pre_work->technologies as $i => $t)
                                            @if($t != $ultimo)
                                                {{$t}},
                                            @else
                                                {{$t}}
                                            @endif
                                        @endforeach
                                        </p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </td>
        
                    <td>
                        <div class="justify-text">
                            <div>
                                @foreach($comparisonCombinationArray as $key => $com)
                                    @if($key == $school3)
                                        <p>{{__('messages.avgDays')}}: {{$com->pre_work->avg_length_in_days}}</p>
                                        @php
                                            $ultimo = end($com->pre_work->technologies);
                                        @endphp
                                        <p>{{__('messages.tecnologies')}}:
                                        @foreach($com->pre_work->technologies as $i => $t)
                                            @if($t != $ultimo)
                                                {{$t}},
                                            @else
                                                {{$t}}
                                            @endif
                                        @endforeach
                                        </p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="bg-grey">
                        <div class="menu-title">
                            <p class="title">{{__('messages.scolarships')}}</p>
                        </div>
                    </td>
                    <td>
                        <div class="justify-text text-bg-grey">
                            <div>
                                @foreach($comparisonCombinationArray as $key => $com)
                                    @if($key == $school1)
                                        @if($com->scolarships->for_woman)
                                            <p>{{__('messages.forWoman')}}: <i class="fas fa-check"></i></p>
                                        @else
                                            <p>{{__('messages.forWoman')}}: <i class="fas fa-times"></i></p>
                                        @endif
        
                                        @if($com->scolarships->for_veterans)
                                            <p>{{__('messages.forMen')}}: <i class="fas fa-check"></i></p>
                                        @else
                                            <p>{{__('messages.forMen')}}: <i class="fas fa-times"></i></p>
                                        @endif
                                        <p>Other: {{$com->scolarships->other}}</p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="justify-text text-bg-grey">
                            <div>
                                @foreach($comparisonCombinationArray as $key => $com)
                                    @if($key == $school2)
                                        @if($com->scolarships->for_woman)
                                            <p>{{__('messages.forWoman')}}: <i class="fas fa-check"></i></p>
                                        @else
                                            <p>{{__('messages.forWoman')}}: <i class="fas fa-times"></i></p>
                                        @endif
        
                                        @if($com->scolarships->for_veterans)
                                            <p>{{__('messages.forMen')}}: <i class="fas fa-check"></i></p>
                                        @else
                                            <p>{{__('messages.forMen')}}: <i class="fas fa-times"></i></p>
                                        @endif
                                        <p>Other: {{$com->scolarships->other}}</p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="justify-text text-bg-grey">
                            <div>
                                @foreach($comparisonCombinationArray as $key => $com)
                                    @if($key == $school3)
                                        @if($com->scolarships->for_woman)
                                            <p>{{__('messages.forWoman')}}: <i class="fas fa-check"></i></p>
                                        @else
                                            <p>{{__('messages.forWoman')}}: <i class="fas fa-times"></i></p>
                                        @endif
        
                                        @if($com->scolarships->for_veterans)
                                            <p>{{__('messages.forMen')}}: <i class="fas fa-check"></i></p>
                                        @else
                                            <p>{{__('messages.forMen')}}: <i class="fas fa-times"></i></p>
                                        @endif
                                        <p>Other: {{$com->scolarships->other}}</p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="bg-grey">
                        <div class="menu-title">
                            <p class="title">{{__('messages.applicationProcess')}}</p>
                        </div>
                    </td>
                    <td class="bg-white">
                        <div class="justify-text">
                            <div>
                                @foreach($comparisonCombinationArray as $key => $com)
                                    @if($key == $school1)
                                            <p>{{__('messages.avgDays')}}: {{$com->application_process->avg_length_in_days}}</p>

                                        @if($com->application_process->includes_tests)
                                            <p>{{__('messages.includesTests')}}: <i class="fas fa-check"></i></p>
                                        @else
                                            <p>{{__('messages.forVeterans')}}: <i class="fas fa-times"></i></p>
                                        @endif
        
                                        @if($com->application_process->includes_interviews)
                                            <p>{{__('messages.includesInterviews')}}: <i class="fas fa-check"></i></p>
                                        @else
                                            <p>{{__('messages.includesInterviews')}}: <i class="fas fa-times"></i></p>
                                        @endif
        
                                        <p>{{__('messages.description')}}: {{$com->application_process->description}}</p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </td>
                    <td class="bg-white">
                        <div class="justify-text">
                            <div>
                                @foreach($comparisonCombinationArray as $key => $com)
                                    @if($key == $school2)
                                            <p>{{__('messages.avgDays')}}: {{$com->application_process->avg_length_in_days}}</p>

                                        @if($com->application_process->includes_tests)
                                            <p>{{__('messages.includesTests')}}: <i class="fas fa-check"></i></p>
                                        @else
                                            <p>{{__('forVeterans')}}: <i class="fas fa-times"></i></p>
                                        @endif
        
                                        @if($com->application_process->includes_interviews)
                                            <p>{{__('messages.includesInterviews')}}: <i class="fas fa-check"></i></p>
                                        @else
                                            <p>{{__('messages.includesInterviews')}}: <i class="fas fa-times"></i></p>
                                        @endif
        
                                        <p>{{__('messages.description')}}: {{$com->application_process->description}}</p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </td>
                    <td class="bg-white">
                        <div class="justify-text">
                            <div>
                                @foreach($comparisonCombinationArray as $key => $com)
                                    @if($key == $school3)
                                            <p>{{__('messages.avgDays')}}: {{$com->application_process->avg_length_in_days}}</p>

                                        @if($com->application_process->includes_tests)
                                            <p>{{__('messages.includesTests')}}: <i class="fas fa-check"></i></p>
                                        @else
                                            <p>{{__('forVeterans')}}: <i class="fas fa-times"></i></p>
                                        @endif
        
                                        @if($com->application_process->includes_interviews)
                                            <p>{{__('messages.includesInterviews')}}: <i class="fas fa-check"></i></p>
                                        @else
                                            <p>{{__('messages.includesInterviews')}}: <i class="fas fa-times"></i></p>
                                        @endif
        
                                        <p>{{__('messages.description')}}: {{$com->application_process->description}}</p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="bg-grey">
                        <div class="menu-title">
                            <p class="title">{{__('messages.reviews')}}</p>
                        </div>
                    </td>
                    <td>
                        <div class="justify-text text-bg-grey">
                            <div>
                                @foreach($comparisonCombinationArray as $key => $com)
                                    @if($key == $school1)
                                        <p>{{__('messages.switchUp')}}: {{$com->reviews->switch_up}}</p>
                                        <p>{{__('messages.courseReport')}}: {{$com->reviews->course_report}}</p>
                                        <p>{{__('messages.theWorse')}}: (hay 2 descripciones)</p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="justify-text text-bg-grey">
                            <div>
                                @foreach($comparisonCombinationArray as $key => $com)
                                    @if($key == $school2)
                                        <p>{{__('messages.switchUp')}}: {{$com->reviews->switch_up}}</p>
                                        <p>{{__('messages.courseReport')}}: {{$com->reviews->course_report}}</p>
                                        <p>{{__('messages.theWorse')}}: (hay 2 descripciones)</p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </td>
                    <td class="default">
                        <div class="justify-text text-bg-grey">
                            <div>
                                @foreach($comparisonCombinationArray as $key => $com)
                                    @if($key == $school3)
                                        <p>{{__('messages.switchUp')}}: {{$com->reviews->switch_up}}</p>
                                        <p>{{__('messages.courseReport')}}: {{$com->reviews->course_report}}</p>
                                        <p>{{__('messages.theWorse')}}: (hay 2 descripciones)</p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="bg-grey">
                        <div class="menu-title">
                            <p>{{__('messages.cities')}}</p>
                        </div>    
                    </td>
                    <td class="bg-white">
                        <div class="justify-text">
                            <div>
                                <p>
                                    @foreach($comparisonCombinationArray as $key => $com)
                                        @if($key == $school1)
                                        @php
                                            $ultimo = end($com->cities);
                                        @endphp
                                            @foreach($com->cities as $i => $d)
                                                @if($d != $ultimo)
                                                    {{$d}},
                                                @else
                                                    {{$d}}
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="bg-white">
                        <div class="justify-text">
                            <div>
                                <p>
                                    @foreach($comparisonCombinationArray as $key => $com)
                                        @if($key == $school2)
                                        @php
                                            $ultimo = end($com->cities);
                                        @endphp
                                            @foreach($com->cities as $i => $d)
                                                @if($d != $ultimo)
                                                    {{$d}},
                                                @else
                                                    {{$d}}
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="bg-white">
                        <div class="justify-text">
                            <div>
                                <p>
                                    @foreach($comparisonCombinationArray as $key => $com)
                                        @if($key == $school3)
                                        @php
                                            $ultimo = end($com->cities);
                                        @endphp
                                            @foreach($com->cities as $i => $d)
                                                @if($d != $ultimo)
                                                    {{$d}},
                                                @else
                                                    {{$d}}
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
    </table>
</article>
</div>
</div>

@endsection