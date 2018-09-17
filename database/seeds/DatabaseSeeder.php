<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){

        // $this->call(UsersTableSeeder::class);
        $this->call(WorkingUnitTypeSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(DivisionsTableSeeder::class);
        $this->call(DistrictsTableSeeder::class);
        $this->call(ProductCategoryTableSeeder::class);
        $this->call(ProductGroupSeeder::class);
        $this->call(ProductPatternSeeder::class);
        $this->call(ProductBrandTableSeeder::class);
        $this->call(ProductUnitOfMeasurementTableSeeder::class);
        $this->call(ProductStatusTableSeeder::class);
        $this->call(BloodGroupTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(DesignationTableSeeder::class);
        $this->call(EnclosureTableSeeder::class);
        $this->call(BankTableSeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call(PortTableSeeder::class);
        $this->call(CostParticularTableSeeder::class);
        $this->call(ConsignmentParticularTableSeeder::class);
        $this->call(VendorCategoryTableSeeder::class);
        $this->call(VendorTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(InventoryRecordTypesSeeder::class);
        $this->call(InventoryRequisitionTypesSeeder::class);
        $this->call(InventoryItemStatusesSeeder::class);
        
    }
}
