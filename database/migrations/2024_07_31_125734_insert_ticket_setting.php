<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Company;
use App\Models\TicketSettingForAgents;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('ticket_settings_for_agents', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->nullable()->default(null)->change();
        });

        $companies = Company::all();

        if($companies){
            foreach($companies as $company)
            {
                $companyId = $company->id;

                // Check if a row with the current company ID already exists
                $existingRecord = TicketSettingForAgents::where('company_id', $companyId)->first();

                if (!$existingRecord) {
                    TicketSettingForAgents::insert([
                        'ticket_scope' => 'assigned_tickets',
                        'company_id' => $companyId
                    ]);
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ticket_settings_for_agents', function (Blueprint $table) {
            // Revert the column to its previous state, adjust as necessary
            $table->unsignedInteger('user_id')->default('None')->change();
        });
    }
};
