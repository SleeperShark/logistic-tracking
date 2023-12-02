<?php

namespace App\Console\Commands;

use App\Enums\LogisticsStatus;
use App\Models\LogisticsOrder;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class ReportLogistics extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:report-logistics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate logistics report and upload to S3';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        /** @var Collection */
        $statusCollection = LogisticsOrder::pluck('tracking_status');
        $statusCounted    = $statusCollection->countBy(fn (LogisticsStatus $status) => $status->description);

        $reportJson = json_encode([
            'created_at'       => Carbon::now()->toIso8601String(),
            'tracking_summary' => $statusCounted->all(),
        ]);

        $filePath = sprintf('reports/%s.json', Carbon::now()->format('Y-m-d_H-i-s'));

        Storage::disk('s3')->put($filePath, $reportJson);
    }
}
