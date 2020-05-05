<!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">{{$title}}</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="{{route('home')}}">Home</a></li>
                                <li><a href="{{route($active.'.index')}}">{{$title}}</a></li>
                                <li><span>{{$activeList}}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>