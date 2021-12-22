<?php

namespace App\Console\Commands;

use App\Models\Company;
use Illuminate\Console\Command;

class AddCompanyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'contact:company';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds a new company';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->ask('What is the company name?');
        $phone = $this->ask('What is hte company\'s phone number?', 'N/A');

        if ($this->confirm('Are you sure you want to add ' . $name  . ' to database?')) {
            $company = Company::create([
                'name' => $name,
                'phone' => $phone,
            ]);
            $this->info('Added: ' . $company->name);
        } else {
            $this->warn('No company was created');
        }
    }
}
