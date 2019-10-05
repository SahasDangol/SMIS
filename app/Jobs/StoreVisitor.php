<?php

namespace App\Jobs;

use App\Http\Controllers\BsdateController;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\DB;
use Modules\Visitor\Entities\Visitor;

class StoreVisitor implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $request;
    public function __construct()
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Request $request)
    {
        DB::beginTransaction();
        try {
            $bsdate = new BsdateController();
            $input = $request->all();
            $input['date'] = $bsdate->nep_to_eng($request->date);
            Visitor::create($input);
        } catch (\Exception $e) {
            DB::rollback();
        return back()->withError($e->getMessage())->withInput();
//            return back()->withError('User not found by ID ')->withInput();
        }
        DB::commit();
    }
}
