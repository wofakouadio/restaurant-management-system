<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SyncDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sync-database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Connect to the local database
        $localConnection = DB::connection('mysql');

        // Connect to the remote database
        $remoteConnection = DB::connection('mysql_remote');

        // Sync the databases
        $localConnection->beginTransaction();
        $remoteConnection->beginTransaction();

        try {
            // Get the data from the local database
            $data = $localConnection->select('SELECT * FROM categories');


            // Insert the data into the remote database
            foreach ($data as $row) {
                if($remoteConnection->select('SELECT * FROM categories WHERE `cat_id` = ?', [$row->cat_id])){
                    $remoteConnection->update('UPDATE categories SET `name` = ?, `image` = ?, `created_at` = ?, `updated_at` = ? WHERE `cat_id` = ?', [
                        $row->name,
                        $row->image,
                        $row->created_at,
                        $row->updated_at,
                        $row->cat_id
                    ]);
                }else{
                    $remoteConnection->insert('INSERT INTO categories (cat_id, name, image, created_at, updated_at) VALUES (?,?,?,?,?)', [
                        $row->cat_id,
                        $row->name,
                        $row->image,
                        $row->created_at,
                        $row->updated_at
                    ]);
                }
            }

            // Commit the transactions
            $localConnection->commit();
            $remoteConnection->commit();

            // Log the success
            Log::info('Database synchronization successful');
        } catch (\Exception $e) {
            // Rollback the transactions
            $localConnection->rollback();
            $remoteConnection->rollback();

            // Log the error
            Log::error('Database synchronization failed: '. $e->getMessage());
        }
    }
}
