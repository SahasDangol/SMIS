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
                {{ucwords(Auth::user()->name)}}
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
                        {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="{{url('/profile')}}">--}}
                        {{--<span class="sidebar-mini"> EP </span>--}}
                        {{--<span class="sidebar-normal"> Edit Profile </span>--}}
                        {{--</a>--}}
                        {{--</li>--}}
                    </ul>
                </div>
            </div>
        </div>

        <!-- search form (Optional) -->
        {{--<form action="#" method="get" class="sidebar-form">--}}

                {{--<input type="text" name="q" id="search_sidebar" class="form-control" placeholder="Search..."/>--}}
        {{--<input type="text" id="search">--}}
        {{--<ul id="myMenu">--}}
            {{--<li>test</li>--}}
            {{--<li>foo</li>--}}
            {{--<li>bar</li>--}}
            {{--<li>hello</li>--}}
            {{--<li>--}}
                {{--<ul>--}}
                    {{--<li>john</li>--}}
                    {{--<li>smith</li>--}}
                    {{--<li>hello</li>--}}
                    {{--<li>world</li>--}}
                    {{--<li>bar</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li>one</li>--}}
            {{--<li>two</li>--}}
            {{--<li>three</li>--}}
        {{--</ul>--}}
                {{--<span class="input-group-btn">--}}
            {{--<button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>--}}
          {{--</span>--}}

        {{--</form>--}}
        <!-- /.search form -->
        <ul class="nav nav-md" id="sidebar-menu search_ul">

            {{--dashboard--}}
            <li class="nav-item  nav-item-sm">
                <a class="nav-link" href="{{url('/dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <p> Dashboard </p>
                </a>
            </li>
            {{--dashboard--}}

            {{--Front Office--}}
            @if(\Illuminate\Support\Facades\Gate::check('visitor-list') || \Illuminate\Support\Facades\Gate::check('enquiry-list') || \Illuminate\Support\Facades\Gate::check('complaint-list'))
                <li class="nav-item ">
                    <a class="nav-link" data-toggle="collapse" href="#front">
                        <i class="material-icons">class</i>
                        <p> Front Office
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="front">
                        <ul class="nav">
                            @can('enquiry-list')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('/enquiry/')}}">
                                        <span class="sidebar-mini">&nbsp;</span>
                                        <span class="sidebar-normal"> Enquiries </span>
                                    </a>
                                </li>
                            @endcan
                            @can('visitor-list')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('visitors')}}">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal"> Visitor Book </span>
                                    </a>
                                </li>
                            @endcan
                            @can('complaint-list')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('/complain/')}}">
                                        <span class="sidebar-mini">&nbsp;</span>
                                        <span class="sidebar-normal"> Complaint </span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endif
            {{--Front Office--}}

            {{--RuleBook--}}
            @if(\Illuminate\Support\Facades\Gate::check('permission-list') || \Illuminate\Support\Facades\Gate::check('role-list') || \Illuminate\Support\Facades\Gate::check('user-list'))
                <li class="nav-item ">
                    <a class="nav-link" data-toggle="collapse" href="#rbac">
                        <i class="material-icons">recent_actors</i>
                        <p> Rule Book
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="rbac">
                        <ul class="nav">
                            @can('permission-list')
                                <li class="nav-item ">
                                    <a class="nav-link" data-toggle="collapse" href="#permission">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal"> Manage Permission
                                <b class="caret"></b>
                                </span>
                                    </a>
                                    <div class="collapse" id="permission">
                                        <ul class="nav">
                                            <li class="nav-item ">
                                                <a class="nav-link" href="{{route('permissions.index')}}">
                                                    <span class="sidebar-mini"> &nbsp; </span>
                                                    <span class="sidebar-normal"> Add Permissions </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endcan
                            @can('role-list')
                                <li class="nav-item ">
                                    <a class="nav-link" data-toggle="collapse" href="#roles">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal"> Manage Role
                                <b class="caret"></b>
                                </span>
                                    </a>
                                    <div class="collapse" id="roles">
                                        <ul class="nav">
                                            <li class="nav-item ">
                                                <a class="nav-link" href="{{route('roles.index')}}">
                                                    <span class="sidebar-mini"> &nbsp; </span>
                                                    <span class="sidebar-normal"> All Roles </span>
                                                </a>
                                            </li>
                                            <li class="nav-item ">
                                                <a class="nav-link" href="{{route('roles.create')}}">
                                                    <span class="sidebar-mini"> &nbsp; </span>
                                                    <span class="sidebar-normal"> Add Roles </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endcan
                            @can('user-list')
                                <li class="nav-item ">
                                    <a class="nav-link" data-toggle="collapse" href="#user">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal"> Manage User
                                <b class="caret"></b>
                                </span>
                                    </a>
                                    <div class="collapse" id="user">
                                        <ul class="nav">
                                            <li class="nav-item ">
                                                <a class="nav-link" href="{{url('/users')}}">
                                                    <span class="sidebar-mini"> &nbsp; </span>
                                                    <span class="sidebar-normal"> All Users </span>
                                                </a>
                                            </li>
                                            <li class="nav-item ">
                                                <a class="nav-link" href="{{url('/users')}}">
                                                    <span class="sidebar-mini"> &nbsp; </span>
                                                    <span class="sidebar-normal"> Add Users </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endif
            {{--RuleBook--}}

            {{--Administration--}}
            @if(\Illuminate\Support\Facades\Gate::check('department-list') || \Illuminate\Support\Facades\Gate::check('designation-list') || \Illuminate\Support\Facades\Gate::check('academics-year-list') || \Illuminate\Support\Facades\Gate::check('database-backup-list'))
                <li class="nav-item ">
                    <a class="nav-link" data-toggle="collapse" href="#other">
                        <i class="material-icons">work</i>
                        <p> Administration
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="other">
                        <ul class="nav">
                            @can('academics-year-list')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('/academics_year')}}">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal"> Academics Year </span>
                                    </a>
                                </li>
                            @endcan
                            @can('setting-list')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('/settings/edit')}}">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal"> System Setting </span>
                                    </a>
                                </li>
                            @endcan
                            @can('department-list')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('/departments')}}">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal"> Department </span>
                                    </a>
                                </li>
                            @endcan
                            @can('designation-list')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('/designations')}}">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal"> Designation </span>
                                    </a>
                                </li>
                            @endcan
                            @can('database-backup-list')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('/database_backup')}}">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal"> Database Backup </span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endif
            {{--Administration--}}

            {{--Human Resources--}}
            @can('hr-list')
                <li class="nav-item ">
                    <a class="nav-link" href="{{url('/staff')}}">
                        <i class="material-icons">supervisor_account</i>
                        <p> Staff Information </p>
                    </a>
                </li>
            @endcan
            {{--Human Resources--}}

            {{--Academics--}}
            @if(\Illuminate\Support\Facades\Gate::check('routine-list') || \Illuminate\Support\Facades\Gate::check('classroom-list') || \Illuminate\Support\Facades\Gate::check('section-list'))
                <li class="nav-item ">
                    <a class="nav-link" data-toggle="collapse" href="#academics">
                        <i class="material-icons">build</i>
                        <p> Academics
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="academics">
                        <ul class="nav">

                            @can('classroom-list')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('classrooms.index')}}">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal"> Manage Class</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('/sections/')}}">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal"> Manage Section </span>
                                    </a>
                                </li>
                            @endcan
                            @can('subject-assign-list')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('assign_class_teacher')}}">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal"> Manage Class Teacher </span>
                                    </a>
                                </li>
                            @endcan


                        </ul>
                    </div>
                </li>
            @endif
            {{--Academics--}}

            {{--Subject--}}
            @if(\Illuminate\Support\Facades\Gate::check('routine-list') || \Illuminate\Support\Facades\Gate::check('classroom-list') || \Illuminate\Support\Facades\Gate::check('section-list'))
                <li class="nav-item ">
                    <a class="nav-link" data-toggle="collapse" href="#subject">
                        <i class="material-icons">import_contacts</i>
                        <p> Subject
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="subject">
                        <ul class="nav">
                            @can('subject-list')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('subject.index')}}">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal"> Manage Subject </span>
                                    </a>
                                </li>
                            @endcan
                            @can('subjectteacher-list')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('subject_teacher.index')}}">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal"> Manage Subject Teacher </span>
                                    </a>
                                </li>
                            @endcan
                            @can('subject-assign-list')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('subject_assign')}}">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal"> Manage Optional Subject </span>
                                    </a>
                                </li>
                            @endcan
                            @can('syllabus-list')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('syllabus.index')}}">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal"> Manage Syllabus </span>
                                    </a>
                                </li>
                            @endcan
                            @can('routine-list')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('/routines/')}}">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal"> Manage Routine</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endif
            {{--Subject--}}

            {{--Students--}}
            @if(\Illuminate\Support\Facades\Gate::check('student-list') || \Illuminate\Support\Facades\Gate::check('student-create') || \Illuminate\Support\Facades\Gate::check('student-history-list'))
                <li class="nav-item ">
                    <a class="nav-link" data-toggle="collapse" href="#students">
                        <i class="material-icons">person</i>
                        <p> Student Information
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="students">
                        <ul class="nav">
                            @can('student-list')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('/student')}}">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal"> Student Detail </span>
                                    </a>
                                </li>
                            @endcan
                            @can('student-create')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('/student/create')}}">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal"> Student Admission </span>
                                    </a>
                                </li>
                            @endcan
                            @can('student-edit')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('students/swap_sections')}}">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal"> Student Section Swap </span>
                                    </a>
                                </li>
                            @endcan
                            @can('student-edit')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('students/manage_roll_no')}}">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal"> Manage Roll No. </span>
                                    </a>
                                </li>
                            @endcan
                            @can('student-history-list')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('/students/history')}}">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal"> Student History </span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endif
            {{--Students--}}

            {{--Students Leave Applicatiom--}}
            @hasanyrole('Student|Teacher')
            @can('student-leave-application-create')
                <li class="nav-item ">
                    <a class="nav-link" href="{{url('students_leave/create')}}">
                        <i class="material-icons">wc</i>
                        <p> Student Leave Application</p>
                    </a>
                </li>
            @elsecan('student-leave-application-list')
                <li class="nav-item ">
                    <a class="nav-link" href="{{url('students_leave')}}">
                        <i class="material-icons">wc</i>
                        <p>Leave Application</p>
                    </a>
                </li>
            @endcan
            @endhasanyrole
            {{--Students Leave Applicatiom--}}

            {{--Guardians--}}
            @if(\Illuminate\Support\Facades\Gate::check('guardian-list') || \Illuminate\Support\Facades\Gate::check('guardian-create'))
                <li class="nav-item ">
                    <a class="nav-link" data-toggle="collapse" href="#guardians">
                        <i class="material-icons">wc</i>
                        <p> Guardian Information
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="guardians">
                        <ul class="nav">
                            @can('guardian-create')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('/guardian/create')}}">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal"> Add Guardian </span>
                                    </a>
                                </li>
                            @endcan
                            @can('guardian-list')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('/guardian')}}">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal"> Guardian Detail </span>
                                    </a>
                                </li>
                            @endcan


                        </ul>
                    </div>
                </li>
            @endif
            {{--Guardians--}}

            {{--Attendance--}}
            @if(\Illuminate\Support\Facades\Gate::check('student-attendance-create') || \Illuminate\Support\Facades\Gate::check('staff-attendance-create') || \Illuminate\Support\Facades\Gate::check('exam-attendance-list'))
                <li class="nav-item ">
                    <a class="nav-link" data-toggle="collapse" href="#attendance">
                        <i class="material-icons">spellcheck</i>
                        <p> Attendance
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="attendance">
                        <ul class="nav">
                            @can('student-attendance-create')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('/students/attendance')}}">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal"> Student Attendance </span>
                                    </a>
                                </li>
                            @endcan

                            @can('staff-attendance-create')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('/staff/attendance/create')}}">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal"> Staff Attendance </span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endif
            {{--Attendance--}}

            {{--Examination--}}
            @if(\Illuminate\Support\Facades\Gate::check('exam-list') || \Illuminate\Support\Facades\Gate::check('mark-create') || \Illuminate\Support\Facades\Gate::check('marksheet-list') || \Illuminate\Support\Facades\Gate::check('exam-routine-list'))
                <li class="nav-item ">
                    <a class="nav-link" data-toggle="collapse" href="#exam">
                        <i class="material-icons">cast_for_education</i>
                        <p> Examinations
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="exam">
                        <ul class="nav">
                            @can('exam-list')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('/exams/list')}}">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal"> Exam List </span>
                                    </a>
                                </li>
                            @endcan
                            @can('exam-routine-list')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('/exams/routine')}}">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal"> Exam Routine </span>
                                    </a>
                                </li>
                            @endcan
                            @can('mark-create')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('marksheet/create')}}">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal"> Marks Register</span>
                                    </a>
                                </li>
                            @endcan
                            @can('marksheet-list')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('overall/marksheet')}}">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal"> Overall Marksheet</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('marksheet/index')}}">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal"> Subject Wise Marksheet</span>
                                    </a>
                                </li>
                            @endcan
                            @can('grade-list')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('/exams/grade')}}">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal"> Marks Grade</span>
                                    </a>
                                </li>
                            @endcan

                        </ul>
                    </div>
                </li>
            @endif
            {{--Examination--}}

            {{--Account--}}
            @if(\Illuminate\Support\Facades\Gate::check('day-book-list')  )
                <li class="nav-item ">
                    <a class="nav-link" href="{{url('daybook')}}">
                        <i class="material-icons">account_balance</i>
                        <p> Account</p>
                    </a>
                </li>
            @endif
            {{--Account--}}


            {{--Library--}}
            @if(\Illuminate\Support\Facades\Gate::check('book-list')  )
                <li class="nav-item ">
                    <a class="nav-link" href="{{url('library')}}">
                        <i class="material-icons">library_books</i>
                        <p> Library</p>
                    </a>
                </li>
            @endif
            {{--Library--}}

            {{--Inventory--}}
            @if(\Illuminate\Support\Facades\Gate::check('item-list') || \Illuminate\Support\Facades\Gate::check('purchase-list') || \Illuminate\Support\Facades\Gate::check('sale-list'))
                <li class="nav-item ">
                    <a class="nav-link" data-toggle="collapse" href="#inventory">
                        <i class="material-icons">business</i>
                        <p> Inventory
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="inventory">
                        <ul class="nav">
                            @can('item-list')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('/item')}}">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal"> Manage Item </span>
                                    </a>
                                </li>
                            @endcan
                            @can('purchase-list')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('/purchase')}}">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal">Purchase List </span>
                                    </a>
                                </li>
                            @endcan
                            @can('sale-list')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('/sale')}}">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal">Sales List </span>
                                    </a>
                                </li>
                            @endcan

                        </ul>
                    </div>
                </li>
            @endif
            {{--Inventory--}}

            {{--Transportation--}}
            @if(\Illuminate\Support\Facades\Gate::check('route-list') || \Illuminate\Support\Facades\Gate::check('vehicle-list'))
                <li class="nav-item ">
                    <a class="nav-link" data-toggle="collapse" href="#transport">
                        <i class="material-icons">commute</i>
                        <p> Transportation
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="transport">
                        <ul class="nav">
                            @can('vehicle-list')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('/transports/vehicles')}}">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal"> Manage Vehicles </span>
                                    </a>
                                </li>
                            @endcan
                            @can('route-list')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('/transports/routes')}}">
                                        <span class="sidebar-mini"> &nbsp; </span>
                                        <span class="sidebar-normal">Manage Route </span>
                                    </a>
                                </li>
                            @endcan

                        </ul>
                    </div>
                </li>
            @endif
            {{--Transportation--}}

            {{--FrontEnd--}}
            @if(\Illuminate\Support\Facades\Gate::check('notice-list') || \Illuminate\Support\Facades\Gate::check('news-and-event-list') || \Illuminate\Support\Facades\Gate::check('gallery-list'))
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#frontend">
                        <i class="material-icons">class</i>
                        <p>
                            Front End
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse " id="frontend">
                        <ul class="nav">
                            {{--Notice--}}
                            @can('notice-list')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('/notice')}}">
                                        <span class="sidebar-mini">&nbsp;</span>
                                        <span class="sidebar-normal">Notice</span>
                                    </a>
                                </li>
                            @endcan
                            {{--Notice--}}
                            {{----News & Events----}}
                            @can('news-and-event-list')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('/news_and_events')}}">
                                        <span class="sidebar-mini">&nbsp;</span>
                                        <span class="sidebar-normal">News & Events</span>
                                    </a>
                                </li>
                            @endcan
                            {{----News & Events----}}
                            @can('gallery-list')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('/gallery')}}">
                                        <span class="sidebar-mini">&nbsp;</span>
                                        <span class="sidebar-normal">Gallery</span>
                                    </a>
                                </li>
                            @endcan @can('faq-list')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('/faq')}}">
                                        <span class="sidebar-mini">&nbsp;</span>
                                        <span class="sidebar-normal">FAQ</span>
                                    </a>
                                </li>
                            @endcan @can('quick-link-list')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('/quick_links')}}">
                                        <span class="sidebar-mini">&nbsp;</span>
                                        <span class="sidebar-normal">Quick Links</span>
                                    </a>
                                </li>
                            @endcan @can('content-list')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('/content')}}">
                                        <span class="sidebar-mini">&nbsp;</span>
                                        <span class="sidebar-normal">Contents</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endif
            {{--FrontEnd--}}

            {{--Report--}}
            @if(\Illuminate\Support\Facades\Gate::check('report-list'))
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#report">
                        <i class="material-icons">class</i>
                        <p>
                            Reports
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse " id="report">
                        <ul class="nav">
                            {{--Notice--}}

                            <li class="nav-item ">
                                <a class="nav-link" href="{{url('/report/classroom')}}">
                                    <span class="sidebar-mini">&nbsp;</span>
                                    <span class="sidebar-normal">Class Report</span>
                                </a>
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link" href="{{url('/report/students')}}">
                                    <span class="sidebar-mini">&nbsp;</span>
                                    <span class="sidebar-normal">Student Report</span>
                                </a>
                            </li>

                            {{--<li class="nav-item ">--}}
                            {{--<a class="nav-link" href="{{url('/gallery')}}">--}}
                            {{--<span class="sidebar-mini">&nbsp;</span>--}}
                            {{--<span class="sidebar-normal">Terminal Report</span>--}}
                            {{--</a>--}}
                            {{--</li>--}}

                            {{--<li class="nav-item ">--}}
                            {{--<a class="nav-link" href="{{url('/report/classroutine')}}">--}}
                            {{--<span class="sidebar-mini">&nbsp;</span>--}}
                            {{--<span class="sidebar-normal">Class Routine Report</span>--}}
                            {{--</a>--}}
                            {{--</li>--}}

                            <li class="nav-item ">
                                <a class="nav-link" href="{{url('/report/examroutine')}}">
                                    <span class="sidebar-mini">&nbsp;</span>
                                    <span class="sidebar-normal">Exam Routine Report</span>
                                </a>
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link" href="{{url('/report/fee')}}">
                                    <span class="sidebar-mini">&nbsp;</span>
                                    <span class="sidebar-normal">Fees Report</span>
                                </a>
                            </li>

                            {{--<li class="nav-item ">--}}
                            {{--<a class="nav-link" href="{{url('/report/payment_history')}}">--}}
                            {{--<span class="sidebar-mini">&nbsp;</span>--}}
                            {{--<span class="sidebar-normal">Student Payment Report</span>--}}
                            {{--</a>--}}
                            {{--</li>--}}

                            {{--<li class="nav-item ">--}}
                            {{--<a class="nav-link" href="{{url('/report/transaction')}}">--}}
                            {{--<span class="sidebar-mini">&nbsp;</span>--}}
                            {{--<span class="sidebar-normal">Transaction Report</span>--}}
                            {{--</a>--}}
                            {{--</li>--}}

                            <li class="nav-item ">
                                <a class="nav-link" href="{{url('/report/student/attendance')}}">
                                    <span class="sidebar-mini">&nbsp;</span>
                                    <span class="sidebar-normal">Student Attendance Report</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{url('/report/guardian')}}">
                                    <span class="sidebar-mini">&nbsp;</span>
                                    <span class="sidebar-normal">Guardian Report</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{url('/report/parent')}}">
                                    <span class="sidebar-mini">&nbsp;</span>
                                    <span class="sidebar-normal">Parent Report</span>
                                </a>
                            </li>
                            {{--<li class="nav-item ">--}}
                            {{--<a class="nav-link" href="{{url('/report/bank')}}">--}}
                            {{--<span class="sidebar-mini">&nbsp;</span>--}}
                            {{--<span class="sidebar-normal">Bank Report</span>--}}
                            {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item ">--}}
                            {{--<a class="nav-link" href="{{url('/gallery')}}">--}}
                            {{--<span class="sidebar-mini">&nbsp;</span>--}}
                            {{--<span class="sidebar-normal">Income Report</span>--}}
                            {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item ">--}}
                            {{--<a class="nav-link" href="{{url('/gallery')}}">--}}
                            {{--<span class="sidebar-mini">&nbsp;</span>--}}
                            {{--<span class="sidebar-normal">Expense Report</span>--}}
                            {{--</a>--}}
                            {{--</li>--}}

                            <li class="nav-item ">
                                <a class="nav-link" href="{{url('/report/transportation')}}">
                                    <span class="sidebar-mini">&nbsp;</span>
                                    <span class="sidebar-normal">Transportation Report</span>
                                </a>
                            </li>
                            {{--<li class="nav-item ">--}}
                            {{--<a class="nav-link" href="{{url('/report/daybook')}}">--}}
                            {{--<span class="sidebar-mini">&nbsp;</span>--}}
                            {{--<span class="sidebar-normal">Daybook Report</span>--}}
                            {{--</a>--}}
                            {{--</li>--}}
                        </ul>
                    </div>
                </li>
            @endif
            {{--Report--}}
        </ul>
    </div>
</div>
{{--@section('script')--}}


       {{--<script type="text/javascript">--}}
           {{--jQuery("#search").keyup(function () {--}}
               {{--var filter = jQuery(this).val();--}}
               {{--jQuery("ul li").each(function () {--}}
                   {{--if (jQuery(this).text().search(new RegExp(filter, "i")) < 0) {--}}
                       {{--jQuery(this).hide();--}}
                   {{--} else {--}}
                       {{--jQuery(this).show()--}}
                   {{--}--}}
               {{--});--}}
           {{--});--}}
    {{--</script>--}}
    {{--@stop--}}
