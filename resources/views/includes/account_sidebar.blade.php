@php
    use Illuminate\Support\Facades\Cache;
    if (!Cache::has('settings')) {
    get_sidebar_setting();
    }
    $settings=Cache::get('settings');
@endphp

<div class="sidebar" data-color="{{$settings[1]->value}}" data-background-color="{{$settings[2]->value}}"
     data-image="{{$settings[3]->value}}">

    <div class="logo">
        <a href="{{url('/dashboard')}}" class="simple-text logo-mini">
            {{getInitials($settings[0]->value)}}
        </a>
        <a href="{{url('/dashboard')}}" class="simple-text logo-normal">
            {{$settings[0]->value}}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{{asset('assets/backend/img/faces/avatar.jpg')}}"/>
            </div>
            <div class="user-info">
                <a data-toggle="collapse" href="#collapseExample" class="username">
              <span>
                {{Auth::user()->name}}
                  <b class="caret"></b>
              </span>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/profile')}}">
                                <span class="sidebar-mini"> MP </span>
                                <span class="sidebar-normal"> My Profile </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/profile')}}">
                                <span class="sidebar-mini"> EP </span>
                                <span class="sidebar-normal"> Edit Profile </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav nav-sm" id="sidebar-menu">

            {{--dashboard--}}
            <li class="nav-item  nav-item-sm">
                <a class="nav-link" href="{{url('/dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <p> Dashboard </p>
                </a>
            </li>
            {{--dashboard--}}

            {{--Fiscal Year--}}
            <li class="nav-item  nav-item-sm">
                <a class="nav-link" href="{{url('/fiscal_year')}}">
                    <i class="material-icons">calendar_today</i>
                    <p> Fiscal Year </p>
                </a>
            </li>
            {{--Fiscal Year--}}

            {{--Student Fee--}}
            @if(\Illuminate\Support\Facades\Gate::check('invoice-list') || \Illuminate\Support\Facades\Gate::check('invoice-create') || \Illuminate\Support\Facades\Gate::check('studentfee-list') || \Illuminate\Support\Facades\Gate::check('student-payment-list'))
                <li class="nav-item ">
                    <a class="nav-link" data-toggle="collapse" href="#invoices">
                        <i class="material-icons">web</i>
                        <p> Student Fee
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="invoices">
                        <ul class="nav">
                            @can('invoice-create')
                                <li class="nav-item ">
                                    <a class="nav-link"
                                       href="{{route('invoices.create')}}">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal"> Generate Invoice </span>
                                    </a>
                                </li>
                            @endcan
                                @can('invoice-list')
                                    <li class="nav-item ">
                                        <a class="nav-link"
                                           href="{{url('payment/student/roll')}}">
                                            <span class="sidebar-mini"> &nbsp; </span>
                                            <span class="sidebar-normal"> Collect Fees </span>
                                        </a>
                                    </li>
                                @endcan
                            @can('invoice-list')
                                <li class="nav-item ">
                                    <a class="nav-link"
                                       href="{{route('invoices.index')}}">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal"> Invoices Information </span>
                                    </a>
                                </li>
                            @endcan
                            @can('studentfee-list')
                                <li class="nav-item ">
                                    <a class="nav-link"
                                       href="{{route('feetypes.index')}}">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal"> Fee Type </span>
                                    </a>
                                </li>
                            @endcan
                            @can('student-payement-list')
                                <li class="nav-item ">
                                    <a class="nav-link"
                                       href="{{route('student_payments.index')}}">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal"> Payment History </span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endif
            {{--Student Fee--}}

            {{--Group--}}
            <li class="nav-item  nav-item-sm">
                <a class="nav-link" href="{{url('/group')}}">
                    <i class="material-icons">view_headline</i>
                    <p> Predefined Group </p>
                </a>
            </li>
            {{--Group--}}

            {{--Day Book--}}
            <li class="nav-item  nav-item-sm">
                <a class="nav-link" href="{{url('/daybook')}}">
                    <i class="material-icons">today</i>
                    <p> Day Book </p>
                </a>
            </li>
            {{--Day Book--}}

            {{--Journal--}}
            @can('journal-list')
                <li class="nav-item ">
                    <a class="nav-link" data-toggle="collapse" href="#journal">
                        <i class="material-icons">web</i>
                        <p> Journal
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="journal">
                        <ul class="nav">
                            @can('journal-list')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('journals')}}">
                                        <span class="sidebar-mini"> JL </span>
                                        <span class="sidebar-normal"> Journal Detail </span>
                                    </a>
                                </li>
                            @endcan
                            @can('journal-create')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('/journals/create')}}">
                                        <span class="sidebar-mini">JC</span>
                                        <span class="sidebar-normal"> Journal Create </span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endif
            {{--Journal--}}

            {{--Ledger--}}
            @if(\Illuminate\Support\Facades\Gate::check('ledger-list') || \Illuminate\Support\Facades\Gate::check('ledger-create'))
                <li class="nav-item ">
                    <a class="nav-link" data-toggle="collapse" href="#ledger">
                        <i class="material-icons">dvr</i>
                        <p> Ledger
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="ledger">
                        <ul class="nav">
                            @can('ledger-list')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('/ledger')}}">
                                        <span class="sidebar-mini"> LD </span>
                                        <span class="sidebar-normal"> Ledger Detail </span>
                                    </a>
                                </li>
                            @endcan
                            @can('ledger-create')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('/ledgerlist')}}">
                                        <span class="sidebar-mini"> CL </span>
                                        <span class="sidebar-normal"> Create Ledger </span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endif
            {{--Ledger--}}

            {{--Trial Balance--}}
            @can('trial-balance-list')
                <li class="nav-item ">
                    <a class="nav-link" href="{{url('/trial_balance')}}">
                        <i class="material-icons">all_inclusive</i>
                        <p> Trial Balance </p>
                    </a>
                </li>
            @endcan
            {{--Trial Balance--}}

            {{--Profit/Loss--}}
            @can('profit-loss-list')
                <li class="nav-item ">
                    <a class="nav-link" href="{{url('/profit_loss')}}">
                        <i class="material-icons">insert_chart</i>
                        <p> Profit/Loss </p>
                    </a>
                </li>
            @endcan
            {{--Profit/Loss--}}

            {{--Balance Sheet--}}
            @can('balance-sheet-list')
                <li class="nav-item ">
                    <a class="nav-link" href="{{url('/balance_sheet')}}">
                        <i class="material-icons">chrome_reader_mode</i>
                        <p> Balance Sheet </p>
                    </a>
                </li>
            @endcan
            {{--Balance Sheet--}}


        </ul>
    </div>
</div>