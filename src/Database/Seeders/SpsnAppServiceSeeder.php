<?php

namespace Spsn\Kafka\Database\Seeders;

use Illuminate\Database\Seeder;
use Spsn\Kafka\Models\SpsnAppService;

class SpsnAppServiceSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        SpsnAppService::truncate();
        $appServices = [
            [
                'name' => 'spsn-td',
                'repo_name' => 'td4-main-service',
            ],
            [
                'name' => 'spsn-notify',
                'repo_name' => 'td4-notify-service',
            ],
            [
                'name' => 'spsn-billing',
                'repo_name' => 'td4-billing-service',
            ],
            [
                'name' => 'spsn-tikets',
                'repo_name' => 'td4-tiket-service',
            ],
            [
                'name' => 'spsn-idocs-int',
                'repo_name' => 'td4-idocs-service',
            ],
            [
                'name' => 'spsn-stt-int',
                'repo_name' => 'td4-stt-service',
            ],
            [
                'name' => 'spsn-log',
                'repo_name' => 'td4-logs-service',
            ],
            [
                'name' => 'spsn-ca',
                'repo_name' => 'td4-certs-service',
            ],
        ];

        foreach ($appServices as $appService) {
            SpsnAppService::create($appService);
        }
    }
}