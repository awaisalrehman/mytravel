<?php
if(!$user->hasPermission('car_create')) return;
?>
@if(!empty($services) and $services->total())
    <div class="bravo-profile-list-services">
        @include('Car::frontend.blocks.list-car.style_1', ['rows'=>$services,'desc'=>' ','title'=>!empty($view_all) ? __('Car by :name',['name'=>$user->first_name]) :'','col'=>4])
        <div class="container mt-3">
            @if(!empty($view_all))
                <div class="review-pag-wrapper">
                    <div class="review-pag-text mb-1">
                        {{ __("Showing :from - :to of :total total",["from"=>$services->firstItem(),"to"=>$services->lastItem(),"total"=>$services->total()]) }}
                    </div>
                    <div class="bravo-pagination">
                        {{$services->appends(request()->query())->links()}}
                    </div>
                </div>
            @else
                <div class="text-center mt30"><a class="btn btn-sm btn-primary" href="{{route('user.profile.services',['id'=>$user->user_name ?? $user->id,'type'=>'car'])}}">{{__('View all (:total)',['total'=>$services->total()])}}</a></div>
            @endif
        </div>
    </div>
@endif
