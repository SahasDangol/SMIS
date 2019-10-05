<?php

use App\PermissionGroup;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role',
            'visitor',
            'hr',
            'student',
            'classroom',
            'section',
            'studentfee',
            'routine',
            'notice',
            'exam',
            'grade',
            'exam-routine',
            'marksheet',
            'complaint',
            'enquiry',
            'permission',
            'user',
            'student-attendance',
            'staff-attendance',
            'exam-attendance',
            'mark',
            'route',
            'vehicle',
            'vehicle-assign',
            'subject',
            'department',
            'designation',
            'gallery',
            'syllabus',
            'transaction',
            'bank-account',
            'payment-method',
            'chart-of-account',
            'payee-payer',
            'invoice',
            'database-backup',
            'academics-year',
            'student-payment',
            'student-history',
            'news-and-event',
            'faq',
            'quick-link',
            'content',
            'testimonial',
            'student-leave-application',
            'report',
            'journal',
            'ledger',
            'trial-balance',
            'balance-sheet',
            'profit-loss',
            'day-book',
            'setting',
            'subject-assign',
            'fiscal-year',
            'subjectteacher',
            'class-teacher-assign',
            'book',
            'item',
            'purchase',
            'sale',
            'guardian',
        ];


        foreach ($permissions as $permission) {
            $group=PermissionGroup::create([
                'name' => $permission,
            ]);
            $created_at = Carbon::now();
            Permission::insert([
                ['name' => $permission.'-list',
                    'group_id'=>$group->id,
                    'guard_name'=>'web',
                    'created_at'=>$created_at,
                    'updated_at'=>$created_at
                    ],
                ['name' => $permission.'-create',
                    'group_id'=>$group->id,
                    'guard_name'=>'web',
                    'created_at'=>$created_at,
                    'updated_at'=>$created_at
                ],
                ['name' => $permission.'-edit',
                    'group_id'=>$group->id,
                    'guard_name'=>'web',
                    'created_at'=>$created_at,
                    'updated_at'=>$created_at
                ],
                ['name' => $permission.'-delete',
                    'group_id'=>$group->id,
                    'guard_name'=>'web',
                    'created_at'=>$created_at,
                    'updated_at'=>$created_at
                ],
            ]);

        }
    }
}
