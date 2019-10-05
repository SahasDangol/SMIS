<?php


use App\Http\Controllers\BsdateController;
use App\Http\Controllers\CompressController;
use App\Permission;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Modules\Account\Entities\FiscalYear;
use Modules\Account\Entities\Group;
use Modules\Account\Entities\ItemOfJournal;
use Modules\Account\Entities\Ledger;
use Modules\Account\Entities\ListOfLedger;
use Modules\LeaveApplication\Entities\LeaveApplication;
use Modules\Setting\Entities\AcademicsYear;
use Modules\Setting\Entities\Content;
use Modules\Setting\Entities\Setting;
use Modules\Staff\Entities\Staff;
use Modules\Student\Entities\Student;
use Modules\StudentFee\Entities\Invoice;
use Modules\StudentFee\Entities\StudentPayment;


/*if ( ! function_exists('_lang')){
    function _lang($string=''){
        //Get Target language
        $target_lang = get_option('language');

        if($target_lang == ""){
            $target_lang = "language";
        }

//        if(file_exists(resource_path() . "/language/$target_lang.php")){
//            include(resource_path() . "/language/$target_lang.php");
//        }else{
//            include(resource_path() . "/language/language.php");
//        }

        if (array_key_exists($string,$language)){
            return $language[$string];
        }else{
            return $string;
        }
    }
}*/
if (!function_exists('get_nepali_month_name')) {
    function get_nepali_month_name($m)
    {
        $n_month = false;
        switch ($m) {
            case "01":
                $n_month = 'बैशाख';
                break;
            case "02":
                $n_month = 'जेष्ठ';
                break;
            case "03":
                $n_month = 'असार';
                break;
            case "04":
                $n_month = 'श्रावण';
                break;
            case "05":
                $n_month = 'भाद्र';
                break;
            case "06":
                $n_month = 'आश्विन';
                break;
            case "07":
                $n_month = 'कार्तिक';
                break;
            case "08":
                $n_month = 'मंसिर';
                break;
            case "09":
                $n_month = 'पुष';
                break;
            case "10":
                $n_month = 'माघ';
                break;
            case "11":
                $n_month = 'फाल्गुन';
                break;
            case "12":
                $n_month = 'चैत्र';
                break;
        }

        return $n_month;

    }
}

if (!function_exists('get_nepali_date')) {
    function get_nepali_date($date)
    {
        $bsdate = new BsdateController();
        return $bsdate->eng_to_nep($date);

    }
}

if (!function_exists('get_english_date')) {
    function get_english_date($date)
    {
        $bsdate = new BsdateController();
        return $bsdate->nep_to_eng($date);

    }
}

if (!function_exists('get_option')) {
    function get_option($name)
    {
        $setting = DB::table('settings')->where('name', $name)->get();
        if (!$setting->isEmpty()) {
            return $setting[0]->value;
        }
        return "";

    }
}

if (!function_exists('get_count')) {
    function get_count($table_name)
    {
        $count = DB::table($table_name)->select('id')->count();

        return $count;

    }
}


if (!function_exists('get_academic_year')) {
    function get_academic_year()
    {
        $year = AcademicsYear::select('id')->orderBy('id', 'desc')
            ->where('working_status', 1)
            ->first();
        if ($year) {
            return $year->id;
        }
        return response("There is no Sessions running.");
    }
}

if (!function_exists('get_academic_session')) {
    function get_academic_session()
    {
        $sessions = AcademicsYear::select('id','working_status','year')
            ->orderBy('id', 'desc')
            ->where('status', 1)
            ->paginate('5');
        return $sessions;
    }
}

if (!function_exists('get_fiscal_year')) {
    function get_fiscal_year()
    {
        $year = FiscalYear::where('working_status', 1)->orderBy('id', 'desc')->first();
        if (!empty($year)) {
            return $year->id;
        } else {
            return null;
        }
    }
}



if (!function_exists('getGrade')) {
    function getGrade($grades)
    {
        $total_credit=0;
       foreach ($grades as $grade){
           if ($grade['grade']==0){
               return 0;
           }
           $total_credit+=$grade['grade']*$grade['credit_hour'];
       }
       return $total_credit/$grades->sum('credit_hour');
    }
}

if (!function_exists('get_sidebar_setting')) {
    function get_sidebar_setting()
    {
        Cache::remember('settings',720, function () {
            return Setting::select('value')
                ->where('name', 'data_color')//1
                ->orWhere('name','data_background_color')//2
                ->orWhere('name','background_image')//3
                ->orWhere('name','site_title')//0
                ->get();
        });
//        $settings = Setting::select('value')
//        ->where('name', 'data_color')//1
//        ->orWhere('name','data_background_color')//2
//        ->orWhere('name','background_image')//3
//        ->orWhere('name','site_title')//0
//        ->get();
//
//    return $settings;
    }
}

/*-----------------------------------------------------------
-----------------Get School Information---------------------
-------------------------------------------------------------*/
if (!function_exists('get_school_info')) {
    function get_school_info($name)
    {
        $settings = Setting::select('value')->where('name', $name)->first();
        if (!empty($settings)) {
            return $settings->value;
        } else {
            return "";
        }
    }
}
/*-------------------End Of School Information-----------------------*/

if (!function_exists('create_option')) {
    function create_option($table, $value, $display, $selected = "", $where = NULL)
    {
        $options = "";
        $condition = "";
        if ($where != NULL) {
            $condition .= "WHERE ";
            foreach ($where as $key => $v) {
                $condition .= $key . "'" . $v . "' ";
            }
        }

        $query = DB::select("SELECT $value, $display FROM $table $condition");
        foreach ($query as $d) {
            if ($selected != "" && $selected == $d->$value) {
                $options .= "<option value='" . $d->$value . "' selected='true'>" . ucwords($d->$display) . "</option>";
            } else {
                $options .= "<option value='" . $d->$value . "'>" . ucwords($d->$display) . "</option>";
            }
        }

        echo $options;
    }
}

if (!function_exists('get_class_name')) {
    function get_class_name($id)
    {
        $class = DB::table('classrooms')->where('id', $id)->get();
        if (!$class->isEmpty()) {
            return $class[0]->class_name;
        }
        return "";

    }
}

if (!function_exists('get_section_name')) {
    function get_section_name($id)
    {
        $class = DB::table('sections')->where('id', $id)->get();
        if (!$class->isEmpty()) {
            return $class[0]->section_name;
        }
        return "";

    }
}

if (!function_exists('get_fee_type_select')) {
    function get_fee_type_select($class = "", $fee_id = "")
    {
        $fee_types = \Modules\StudentFee\Entities\FeeType::all();

        $select = "<select name='fee_type[]' id='$fee_id' class='fees $class' data-style='select-with-transition' required>";
        $select .= "<option value='' selected disabled>" . 'Select One' . "</option>";

        foreach ($fee_types as $fee_type) {
            $selected = $fee_id == $fee_type->id ? "selected" : "";
            $select .= "<option value='" . $fee_type->id . "' $selected>" . $fee_type->fee_type . "</option>";
        }
        $select .= "</select>";

        return $select;
    }
}
if (!function_exists('get_ledger_list_select2')) {
    function get_ledger_list_select2($class = "", $fee_id = "")
    {
        $ledger_lists = \Modules\Account\Entities\ListOfLedger::all();

        $select = "<select name='ledger_list[]' id='$fee_id' class='ledgers $class' data-style='select-with-transition'>";
        $select .= "<option value='' selected disabled>" . 'Select One' . "</option>";

        foreach ($ledger_lists as $ledger_list) {
            $selected = $fee_id == $ledger_list->id ? "selected" : "";
            $select .= "<option value='" . $ledger_list->id . "' $selected>" . $ledger_list->name . "</option>";
        }
        $select .= "</select>";

        return $select;
    }
}

if (!function_exists('get_ledger_list_select')) {
    function get_ledger_list_select($class = "", $fee_id = "")
    {
        $ledger_lists = \Modules\Account\Entities\ListOfLedger::all();

        $select = "<select name='ledger_list[]' id='$fee_id' class='ledgers $class' data-style='select-with-transition' required>";
        $select .= "<option value='' selected disabled>" . 'Select One' . "</option>";

        foreach ($ledger_lists as $ledger_list) {
            $selected = $fee_id == $ledger_list->id ? "selected" : "";
            $select .= "<option value='" . $ledger_list->id . "' $selected>" . $ledger_list->name . "</option>";
        }
        $select .= "</select>";

        return $select;
    }
}

if (!function_exists('get_to_by_select')) {
    function get_to_by_select($class = "", $status = "")
    {
        $select = "<select  class='to_by1 $class' data-style='select-with-transition'>";
        $select .= "<option value='' selected disabled>" . 'Select One' . "</option>";
        $by = "By";
        $to = "To";

        if ($status == "dr") {
            $select .= "<option value='" . $by . "' selected>" . $by . "</option>";
            $select .= "<option value='" . $to . "' >" . $to . "</option>";
        } elseif ($status == "cr") {
            $select .= "<option value='" . $by . "' >" . $by . "</option>";
            $select .= "<option value='" . $to . "' selected>" . $to . "</option>";
        } else {
            $select .= "<option value='" . $by . "' >" . $by . "</option>";
            $select .= "<option value='" . $to . "' >" . $to . "</option>";
        }
        $select .= "</select>";

        return $select;
    }
}

if (!function_exists('get_payment_history')) {
    function get_payment_history($id)
    {
        $history = StudentPayment::where("invoice_id", $id)->where('status', 1)->get();
        return $history;
    }
}

if (!function_exists('get_total_due')) {
    function get_total_due($id)
    {
        $invoice = Invoice::find($id);
        return $invoice->total;
    }
}

if (!function_exists('get_paid_due')) {
    function get_paid_due($id)
    {
        $invoice = Invoice::find($id);
        return $invoice->paid;
    }
}

if (!function_exists('get_total_payment_to_be_collected')) {
    function get_total_payment_to_be_collected()
    {
        $invoice = Invoice::select('date','total','paid')->get();

        $current_year = date("Y");
        $current_month = date("m");
        $expected_money = 0.00;

        foreach ($invoice as $money) {
            $date = $money->date;

            $year = $date[0] . $date[1] . $date[2] . $date[3];

            $month = $date[5] . $date[6];

            if ($year <= $current_year) {
                if ($month < $current_month && $money->paid == 0) {
                    $expected_money = $expected_money + $money->total - $money->paid;
                }
                if ($month == $current_month) {
                    $expected_money = $expected_money + $money->total;
                }

            }
        }
        return $expected_money;
    }
}

if (!function_exists('get_collected_payment')) {
    function get_collected_payment()
    {

        $invoice = StudentPayment::select('date','amount');

        $current_year = date("Y");
        $current_month = date("m");
        $paid_money = 0.00;

        foreach ($invoice as $money) {
            $date = $money->date;

            $year = $date[0] . $date[1] . $date[2] . $date[3];

            $month = $date[5] . $date[6];

            if ($year == $current_year && $month == $current_month) {
                $paid_money = $paid_money + $money->amount;
            }
        }

        return $paid_money;
    }
}

if (!function_exists('getTeacherCount')) {
    function getTeacherCount()
    {
        $staff = Staff::select('id')->whereHas('designations', function ($q) {
            $q->where('name', 'Teacher');
        })->where('status',1)->count();
        return $staff;
    }
}

if (!function_exists('getReceptionistCount')) {
    function getReceptionistCount()
    {
        $staff = Staff::select('id')->whereHas('designations', function ($q) {
            $q->where('name', 'Receptionist');
        })->where('status',1)->count();
        return $staff;
    }
}

if (!function_exists('get_user_detail')) {
    function get_user_detail($id)
    {
        $user = User::where('id', $id)->first();

        $roles = $user->getRoleNames();


        foreach ($roles as $role) {
            if ($role == "Student") {
                $students = User::select('*')
                    ->join('students', 'students.user_id', '=', 'users.id')
                    ->where('users.status', 1)
                    ->where('students.user_id', $id)
                    ->get();

                $datas = [
                    'data' => $students,
                    'role' => 'Student'
                ];

                return $datas;
            } else {
                $staffs = User::select('*')
                    ->join('staffs', 'staffs.user_id', '=', 'users.id')
                    ->where('users.status', 1)
                    ->where('staffs.user_id', $id)
                    ->get();

                $datas = [
                    'data' => $staffs,
                    'role' => 'Staff'
                ];
                return $datas;
            }
        }
    }
}

if (!function_exists('permission_list')) {
    function permission_list($id)
    {
        $permissions = Permission::where('group_id', $id)->get();

        return $permissions;
    }
}

if (!function_exists('get_contents')) {
    function get_content_titles()
    {
        $contents = Content::all('id', 'title');
        return $contents;
    }
}

if (!function_exists('get_contents')) {
    function get_content($title)
    {
        $content = Content::where('title', $title)->first();

        return $content;

    }
}

if (!function_exists('notification_count')) {
    function notification_count()
    {
        $applications = LeaveApplication::select('id')->where('read_status', 0)->where('status', 1)->get();
        $counter = 0;
        $notices = array();
        foreach ($applications as $application) {
            $roles = Auth::user()->getRoleNames();

            foreach ($roles as $role) {
                if ($role == "Student") {

                    $counter = 0;
                    $notices = [];
                } elseif ($role == "Teacher") {
                    if (Auth::user()->staffs->id == $application->students->sections->class_teachers->id) {
                        $notices[$counter] = $application->id;
                        $counter = $counter + 1;
                    }
                }
            }
        }

        $datas = [
            'count' => $counter,
            'id' => $notices
        ];
        return $datas;
    }
}

if (!function_exists('unread_notification_title')) {
    function unread_notification_title($id)
    {
        $subjects = LeaveApplication::select('subject')->where('id', $id)->where('read_status', 0)->where('status', 1)->first();
        if (!empty($subjects))
            return $subjects;
        else
            return null;
    }
}

if (!function_exists('get_class_teacher')) {
    function get_class_teacher($id)
    {
        $subjects = LeaveApplication::select('subject')->where('id', $id)->where('read_status', 0)->where('status', 1)->first();

        return $subjects;
    }
}

if (!function_exists('get_total_remaining_specific_student_payment')) {
    function get_total_remaining_specific_student_payment($id)
    {
        $payments_remaining = Invoice::select('*', 'invoices.id as id')
            ->join('students', 'invoices.student_id', '=', 'students.id')
            ->join('student_sessions', 'students.id', '=', 'student_sessions.student_id')
//                ->join('classrooms','classrooms.id','=','student_sessions.classroom_id')
//                ->join('sections','sections.id','=','student_sessions.section_id')
            ->where('student_sessions.session_id', get_academic_year())
//            ->where('invoices.session_id', get_academic_year())
            ->where('invoices.status', 0)
//            ->where('invoices.paid', 0.00)
            ->where('invoices.student_id', $id)
            ->orderBy('invoices.id', 'DESC')
            ->get();


        if ($payments_remaining) {
            $total_amount = 0;
            foreach ($payments_remaining as $aa) {
                $total_amount = $total_amount + floatval($aa->total) - floatval($aa->paid) - floatval($aa->discount);
            }
            return $total_amount;
        } else {
            return "kei ni xaena";
        }
    }
}

if (!function_exists('calculate_grade')) {
    function calculate_grade($marks,$grades)
    {
        if ($marks == 100){
            return 'A+';
        }
        return $grades->where('from','<=',$marks)->where('upto','>',$marks)->first()->name ?? null;
    }
}
if (!function_exists('calculate_grade_point')) {
    function calculate_grade_point($percentage,$grades)
    {
        $marks = $percentage;
        foreach ($grades as $grade) {
            if ($marks >= $grade->from && $marks < $grade->upto) {
                return $grade->grade_point;
            }
        }
        return $grades->sortByDesc('grade_point')->first()->grade_point;
    }
}

//Advance Account

if (!function_exists('get_journal_items')) {
    function get_journal_items($id)
    {
        $subjects = ItemOfJournal::where('journal_id', $id)->where('status', 1)->get();
        if (!empty($subjects))
            return $subjects;
        else
            return null;
    }
}

if (!function_exists('get_ledgers')) {
    function get_ledgers($id, $from = "", $to = "")
    {
        $ledgers = Ledger::whereBetween('date', [$from, $to])->where('ledger_id', $id)->where('status', 1)->get();

        $total_debit = 0;
        $total_credit = 0;
        $balance = 0;

        foreach ($ledgers as $ledger) {
            $total_debit = $ledger->debit + $total_debit;
            $total_credit = $ledger->credit + $total_credit;
        }

        $balance = $total_debit - $total_credit;

        $datas = [
            'data' => $ledgers,
            'total_debit' => $total_debit,
            'total_credit' => $total_credit,
            'balance' => $balance
        ];
        return $datas;

    }
}

if (!function_exists('get_ledger_list')) {
    function get_ledger_list($id)
    {
        $lists = ListOfLedger::where('under', $id)->where('status', 1)->get();

        return $lists;

    }
}

if (!function_exists('get_level_one')) {
    function get_level_one($id)
    {
        $lists = Group::where('parent_id', $id)->where('level', '1')->where('status', 1)->get();

        return $lists;

    }
}

if (!function_exists('get_level_two')) {
    function get_level_two($id)
    {
        $lists = Group::where('parent_id', $id)->where('level', '2')->where('status', 1)->get();

        return $lists;

    }
}

if (!function_exists('get_trial_balance')) {
    function get_trial_balance($from, $to)
    {
        $b = 0;
        $d = 0;
        $individual_debit = [];
        $individual_credit = [];
        $debits = [];
        $credits = [];

        $groups = Group::where('status', 1)->where('level', '0')->get();

        foreach ($groups as $group) {
            $debits[$group->id] = 0;
            $credits[$group->id] = 0;

            foreach (get_level_one($group->id) as $level1) {
                $individual_debit[$level1->id] = 0;
                $individual_credit[$level1->id] = 0;

                foreach (get_ledger_list($level1->id) as $list) {
                    $credit = 0;
                    $debit = 0;
                    $a = get_ledgers($list->id, $from, $to)['balance'];
                    if ($a < 0) {
                        $credit = $a * (-1);
                        $b = $b + $credit;
                        $credits[$group->id] += $credit;
                        $individual_credit[$level1->id] += $credit;
                    } elseif ($a > 0) {
                        $debit = $a;
                        $d = $d + $debit;
                        $debits[$group->id] += $debit;
                        $individual_debit[$level1->id] += $debit;
                    }
                }
                foreach (get_level_two($level1->id) as $level2) {
                    $individual_debit[$level2->id] = 0;
                    $individual_credit[$level2->id] = 0;

                    foreach (get_ledger_list($level2->id) as $list) {
                        $credit = 0;
                        $debit = 0;
                        $a = get_ledgers($list->id, $from, $to)['balance'];
                        if ($a < 0) {
                            $credit = $a * (-1);
                            $b = $b + $credit;
                            $credits[$group->id] += $credit;
                            $individual_credit[$level1->id] += $credit;
                            $individual_credit[$level2->id] += $credit;
                        } elseif ($a > 0) {
                            $debit = $a;
                            $d = $d + $debit;
                            $debits[$group->id] += $debit;
                            $individual_debit[$level1->id] += $debit;
                            $individual_debit[$level2->id] += $debit;
                        }
                    }
                }
            }

            foreach (get_ledger_list($group->id) as $list) {
                $credit = 0;
                $debit = 0;
                $a = get_ledgers($list->id, $from, $to)['balance'];
                if ($a < 0) {
                    $credit = $a * (-1);
                    $b = $b + $credit;
                    $credits[$group->id] += $credit;
                } elseif ($a > 0) {
                    $debit = $a;
                    $d = $d + $debit;
                    $debits[$group->id] += $debit;
                }
            }

        }

        $datas = [
            'individual_debit' => $individual_debit,
            'individual_credit' => $individual_credit,
        ];

        return $datas;
    }
}

if (!function_exists('get_profit_loss')) {
    function get_profit_loss($from, $to)
    {

        $b = 0;//total income
        $d = 0;//total expense

        $income_id = Group::select('id')->where('status', 1)->where('level', '0')->where('name', 'Income')->first();
        $expense_id = Group::select('id')->where('status', 1)->where('level', '0')->where('name', 'Expenses')->first();

        foreach (get_ledger_list($expense_id->id) as $list) {
            $a = get_ledgers($list->id, $from, $to)['balance'];
            $d = $d + $a;
        }
        foreach (get_level_one($expense_id->id) as $level1) {
            foreach (get_ledger_list($level1->id) as $list) {
                $a = get_ledgers($list->id, $from, $to)['balance'];
                $d = $d + $a;
            }
        }


        foreach (get_ledger_list($income_id->id) as $list) {
            $a = get_ledgers($list->id, $from, $to)['balance'];
            $a = $a * (-1);
            $b = $b + $a;
        }
        foreach (get_level_one($income_id->id) as $level1) {
            foreach (get_ledger_list($level1->id) as $list) {
                $a = get_ledgers($list->id, $from, $to)['balance'];
                $a = $a * (-1);
                $b = $b + $a;
            }
        }

        $net_profit = 0;
        $net_loss = 0;
        if ($d > $b) {
            $net_loss = $d - $b;
            $net_profit = 0;
        } else {
            $net_loss = 0;
            $net_profit = $b - $d;
        }


//        $setting = Setting::where('name', 'net_profit')->first();
//        $setting->value = $net_profit;
//        $setting->save();
//        $setting = Setting::where('name', 'net_loss')->first();
//        $setting->value = $net_loss;
//        $setting->save();

        $datas = [
            'net_profit' => $net_profit,
            'net_loss' => $net_loss,
        ];
        return $datas;
    }
}

if (!function_exists('get_income_expense')) {
    function get_income_expense($from, $to)
    {

        $b = 0;//total income
        $d = 0;//total expense

        $income_id = Group::select('id')->where('status', 1)->where('level', '0')->where('name', 'Income')->first();
        $expense_id = Group::select('id')->where('status', 1)->where('level', '0')->where('name', 'Expenses')->first();

        foreach (get_ledger_list($expense_id->id) as $list) {
            $a = get_ledgers($list->id, $from, $to)['balance'];
            $d = $d + $a;
        }
        foreach (get_level_one($expense_id->id) as $level1) {
            foreach (get_ledger_list($level1->id) as $list) {
                $a = get_ledgers($list->id, $from, $to)['balance'];
                $d = $d + $a;
            }
        }


        foreach (get_ledger_list($income_id->id) as $list) {
            $a = get_ledgers($list->id, $from, $to)['balance'];
            $a = $a * (-1);
            $b = $b + $a;
        }
        foreach (get_level_one($income_id->id) as $level1) {
            foreach (get_ledger_list($level1->id) as $list) {
                $a = get_ledgers($list->id, $from, $to)['balance'];
                $a = $a * (-1);
                $b = $b + $a;
            }
        }

        $datas = [
            'net_income' => $b,
            'net_expense' => $d,
        ];
        return $datas;
    }
}

//Advance Account

if (!function_exists('get_previous_due')) {
    function get_previous_due($roll_no)
    {
        $student = Student::where('roll_no', $roll_no)->where('status', 1)->first();

        $invoices = Invoice::where('student_id', $student->id)->where('status', 0)->orderBy('id', 'DESC')->get();
        $previous_dues = 0;
        foreach ($invoices as $invoice) {
            $previous_dues += $invoice->balance;
        }

        return $previous_dues;

    }
}

if (!function_exists('get_student_by_section')) {
    function get_student_by_section($section_id)
    {
        $session_id = get_academic_year();
        $students = Student::whereHas('student_sessions', function ($query) use ($section_id, $session_id) {
            $query->where('section_id', $section_id)
                ->where('session_id', $session_id);
        })->where('status',1)->get();
        return $students;
    }
}

if (!function_exists('getInitials')) {
    function getInitials($string = null)
    {
        return array_reduce(
            explode(' ', $string),
            function ($initials, $word) {
                return sprintf('%s%s', $initials, substr($word, 0, 1));
            },
            ''
        );
    }
}





