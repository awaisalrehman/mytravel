<div class="row">
    <div class="col-lg-4 col-xl-3 col-md-12">
        @include('Hotel::frontend.layouts.search.filter-search')
    </div>
    <div class="col-lg-8 col-xl-9 col-md-12">
        <div class="bravo-list-item">
            <div class="d-flex justify-content-between align-items-center mb-4 topbar-search">
                <h3 class="font-size-21 font-weight-bold mb-0 text-lh-1">
                    @if($rows->total() > 1)
                        {{ __(":count hotels found",['count'=>$rows->total()]) }}
                    @else
                        {{ __(":count hotel found",['count'=>$rows->total()]) }}
                    @endif
                </h3>
                <div class="control">
                    @include('Hotel::frontend.layouts.search.orderby')
                </div>
            </div>
            <div class="list-item">
                <div class="row">
                    @if($rows->total() > 0)
                        @foreach($rows as $row)
                            @php $layout = setting_item("hotel_layout_item_search",'list') @endphp
                            @if($layout == "list")
                                <div class="col-lg-12 col-md-12">
                                    @include('Hotel::frontend.layouts.search.loop-list')
                                </div>
                            @else
                                <div class="col-lg-4 col-md-12">
                                    @include('Hotel::frontend.layouts.search.loop-grid',['wrap_class'=>'mb-3'])
                                </div>
                            @endif
                        @endforeach
                    @else
                        <div class="col-lg-12">
                            {{__("Hotel not found")}}
                        </div>
                    @endif
                </div>
            </div>
            @if($rows->total() > 0)
                <div class="text-center text-md-left font-size-14 mb-3 text-lh-1 mt-2">{{ __("Showing :from - :to of :total Hotels",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()]) }}</div>
            @endif
            {{$rows->appends(request()->query())->links()}}
        </div>
    </div>
</div>
