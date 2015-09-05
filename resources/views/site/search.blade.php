@extends('master')

@section('meta')
<title>Search</title>
@stop



@section('container')
<div class="" style="background:rgb(234,234,234);margin: 0px 0px 15px 0px">
    <div class="container">
        <div class="row-fluid" style="padding:20px 0px 20px 0px;">
        Below are the results for <m>"{{$query}}"</m> 
        </div>       
    </div>
</div>



<div class="container" id="mainframe" style="min-height:400px;">
    <div class="col-md-9 pad0" style="padding-right:15px;">
		<div style="border-bottom: 1px solid #dbdbdb;padding-bottom:10px;margin-bottom:0px" class="review-container-head"> SEARCH RESULTS </div>
		@if(count($exact)=='0' && count($partial)=='0')
		<div class="row-fluid " style="padding-top:10px">			
				Sorry, No results found for movies.
		</div>
		@endif		
        <ul style="list-style: none;padding-left: 15px;padding-right: 15px;margin-top:10px;">
		
            <?php $i = 0; ?>
            @foreach ($exact as $movie)
            <?php $i++; ?>
            <li>
                <div class="row pad0" style="border-bottom: 1px solid #dbdbdb;margin-bottom:10px;padding-bottom:10px">
                    <div class="col-sm-2 left pad0" style="margin-right:15px">
                        <a href="{{Config::get('url.home')}}movie/{{$movie->fl_id}}/{{\Helpers\Helper::cleanUrl($movie->fl_name)}}" title="{{$movie->fl_name}}">
                            <img class="lazy img-responsive" src="{{Config::get('url.home')}}berdict/img/default_poster.jpg" data-original="{{Config::get('url.web')}}public/uploads/movie/{{$movie->fl_year}}/{{$movie->fl_image}}" style="width:120px;height:178px;">
                        </a>
						@if(Auth::check())
						@if(Auth::user()->usr_level==2)
						<?php $check = DB::table('user_suggestions')->where('us_fl_id', $movie->fl_id)->get(); ?>
						{{$movie->fl_rating}}					
						@if($check)
						<div class="row-fluid" style="margin-top:0px;">
							<div class="col-sm-12 pad0" style="margin-top:10px">
								<button data-id="{{$movie->fl_id}}" id="suggestionAdd-{{$movie->fl_id}}" rel="tooltip" data-placement="top" title="Add To Suggestions" data-original-title="Add To Suggestions"  style="display: none;" class="col-sm-12 btn watch-add suggestionAdd"> <span class="glyphicon glyphicon-plus-sign"></span> </button>
								<button data-id="{{$movie->fl_id}}" id="suggestionDel-{{$movie->fl_id}}" rel="tooltip" data-placement="top" title="Remove from Suggestions" data-original-title="Remove from Suggestions" class="col-sm-12 btn watch-added suggestionDel"> <span class="glyphicon glyphicon-plus-sign"></span> </button>
							</div>
						</div>
						@else
						<div class="row-fluid" style="margin-top:0px;">
							<div class="col-sm-12 pad0" style="margin-top:10px">
								<button data-id="{{$movie->fl_id}}" id="suggestionAdd-{{$movie->fl_id}}" rel="tooltip" data-placement="top" title="Add To Suggestions" data-original-title="Add To Suggestions" style="" class="col-sm-12 btn watch-add suggestionAdd"> <span class="glyphicon glyphicon-plus-sign"></span> </button>
								<button data-id="{{$movie->fl_id}}" id="suggestionDel-{{$movie->fl_id}}" rel="tooltip" data-placement="top" title="Remove from Suggestions" data-original-title="Remove from Suggestions" style="display: none;" class="col-sm-12 btn watch-added suggestionDel"> <span class="glyphicon glyphicon-plus-sign"></span> </button>
							</div>
						</div>
						@endif
						@endif
						@endif							
                    </div>
                    <div class="col-md-9 pad0" style="">
                        <div class="row-fluid">
                            <div class="col-md-12 pad0">                                
                                <h2 class="watch-title">
                                    <a style="font-size:19px;" href="{{Config::get('url.home')}}movie/{{$movie->fl_id}}/{{\Helpers\Helper::cleanUrl($movie->fl_name)}}" title="{{$movie->fl_name}}">
                                        {{$movie->fl_name}} <span style="font-size:12px;">({{$movie->fl_year}})</span>
                                </h2>
                                </a>                                
                            </div>                         
                            <div class="col-md-12 pad0 watch-details" style="line-height: 20px; margin-top:10px;">
                                {{$movie->fl_outline}}
                            </div>
                            <div class="col-md-12 pad0 watch-details" style="line-height: 20px; margin-top:10px;">
                                <m>Director: </m> {{$movie->fl_dir_ar_id}}															</div>
                            <div class="col-md-12 pad0 watch-details" style="line-height: 20px; margin-top:0px;">
                                <m>Stars: </m> {{$movie->fl_stars}}															</div>
                            <div class="col-md-12 pad0 watch-details" style="line-height: 20px; margin-top:0px;">
                                <m>Genre: </m>  {{$movie->fl_genre}}														</div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="grid_4 column omega ta-right" style="width:50px">
                        <div class="search-result-stars ln24 clearfix">
                            <div class="right">
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="clear"></div>
                    </div>
                </div>
            </li>
            @endforeach		
		
            <?php $i = 0; ?>
            @foreach ($partial as $movie)
            <?php $i++; ?>
            <li>
                <div class="row pad0" style="border-bottom: 1px solid #dbdbdb;margin-bottom:10px;padding-bottom:10px">
                    <div class="col-sm-2 left pad0" style="margin-right:15px">
                        <a href="{{Config::get('url.home')}}movie/{{$movie->fl_id}}/{{\Helpers\Helper::cleanUrl($movie->fl_name)}}" title="{{$movie->fl_name}}">
                            <img class="lazy img-responsive" src="{{Config::get('url.home')}}berdict/img/default_poster.jpg" data-original="{{Config::get('url.web')}}public/uploads/movie/{{$movie->fl_year}}/{{$movie->fl_image}}" style="width:120px;height:178px;">
						</a>
						@if(Auth::check())
						@if(Auth::user()->usr_level==2)
						<?php $check = DB::table('user_suggestions')->where('us_fl_id', $movie->fl_id)->get(); ?>
						{{$movie->fl_rating}}							
						@if($check)
						<div class="row-fluid" style="margin-top:0px;">
							<div class="col-sm-12 pad0" style="margin-top:10px">
								<button data-id="{{$movie->fl_id}}" id="suggestionAdd-{{$movie->fl_id}}" rel="tooltip" data-placement="top" title="Add To Suggestions" data-original-title="Add To Suggestions"  style="display: none;" class="col-sm-12 btn watch-add suggestionAdd"> <span class="glyphicon glyphicon-plus-sign"></span> </button>
								<button data-id="{{$movie->fl_id}}" id="suggestionDel-{{$movie->fl_id}}" rel="tooltip" data-placement="top" title="Remove from Suggestions" data-original-title="Remove from Suggestions" class="col-sm-12 btn watch-added suggestionDel"> <span class="glyphicon glyphicon-plus-sign"></span> </button>
							</div>
						</div>
						@else
						<div class="row-fluid" style="margin-top:0px;">
							<div class="col-sm-12 pad0" style="margin-top:10px">
								<button data-id="{{$movie->fl_id}}" id="suggestionAdd-{{$movie->fl_id}}" rel="tooltip" data-placement="top" title="Add To Suggestions" data-original-title="Add To Suggestions" style="" class="col-sm-12 btn watch-add suggestionAdd"> <span class="glyphicon glyphicon-plus-sign"></span> </button>
								<button data-id="{{$movie->fl_id}}" id="suggestionDel-{{$movie->fl_id}}" rel="tooltip" data-placement="top" title="Remove from Suggestions" data-original-title="Remove from Suggestions" style="display: none;" class="col-sm-12 btn watch-added suggestionDel"> <span class="glyphicon glyphicon-plus-sign"></span> </button>
							</div>
						</div>
						@endif
						@endif
						@endif	
					</div>
                    <div class="col-md-9 pad0" style="">
                        <div class="row-fluid">
                            <div class="col-md-12 pad0">                                
                                <h2 class="watch-title">
                                    <a style="font-size:19px;" href="{{Config::get('url.home')}}movie/{{$movie->fl_id}}/{{\Helpers\Helper::cleanUrl($movie->fl_name)}}" title="{{$movie->fl_name}}">
                                        {{$movie->fl_name}} <span style="font-size:12px;">({{$movie->fl_year}})</span>
                                </h2>
                                </a>                                
                            </div>                         
                            <div class="col-md-12 pad0 watch-details" style="line-height: 20px; margin-top:10px;">
                                {{$movie->fl_outline}}
                            </div>
                            <div class="col-md-12 pad0 watch-details" style="line-height: 20px; margin-top:10px;">
                                <m>Director: </m> {{$movie->fl_dir_ar_id}}															</div>
                            <div class="col-md-12 pad0 watch-details" style="line-height: 20px; margin-top:0px;">
                                <m>Stars: </m> {{$movie->fl_stars}}															</div>
                            <div class="col-md-12 pad0 watch-details" style="line-height: 20px; margin-top:0px;">
                                <m>Genre: </m>  {{$movie->fl_genre}}														</div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="grid_4 column omega ta-right" style="width:50px">
                        <div class="search-result-stars ln24 clearfix">
                            <div class="right">
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="clear"></div>
                    </div>
                </div>
            </li>
            @endforeach


        </ul>
        <div class="search-pagination-top bb" style="margin-top:10px;">
            <?php echo $partial->render(); ?>
        </div>
    </div>
	
	<div class="col-md-3 pad0">
	<div style="border-bottom: 1px solid #dbdbdb;padding-bottom:10px;margin-bottom:0px" class="review-container-head"> Results for Users </div>
		@if(count($people)=='0')
		<div class="row-fluid " style="padding-top:10px">			
				Sorry, No results found for users.
		</div>
		@endif
		@foreach($people as $user)
		<div class="row-fluid res-review" style="padding-top:10px">
			<div class="res-review-header col-md-12 pad0" style="">
				<div class="res-review-header col-md-12 pad0" style="width:100%;height:45px;">
					<div class="res-review-user col-md-10 pad0">
						<a class="left" href="{{Config::get('url.home')}}{{$user->username}}">
							<img class="lazy img-responsive " src="{{Config::get('url.home')}}berdict/img/default.jpg" data-original="{{Config::get('url.web')}}public/user_uploads/1000/{{$user->id}}/{{$user->usr_image}}" alt="" style="height: 45px; width: 45px; display: inline;">
						</a>
						<div style="font-size: 13px;" class="res-review-user-details">
							<a href="{{Config::get('url.home')}}{{$user->username}}">{{$user->usr_fname.' '.$user->usr_lname}}</a>  
						</div>
					</div>
					<div class="res-review-rating col-md-2 pad0">
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div> 
	
	
	
</div>



@stop