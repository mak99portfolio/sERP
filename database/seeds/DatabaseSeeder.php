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
        $this->call(ProductTypeSeeder::class);
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
        $this->call(ProductModelTableSeeder::class);
        $this->call(ProductSizeTableSeeder::class);
        $this->call(ProductSetTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(CurrencyTableSeeder::class);
        $this->call(InventoryRecordTypesSeeder::class);
        $this->call(InventoryRequisitionTypesSeeder::class);
        $this->call(InventoryItemStatusesSeeder::class);
        $this->call(RequisitionPurposeTableSeeder::class);
        $this->call(EmployeeProfileTableSeeder::class);
        $this->call(RequisitionPriorityTableSeeder::class);
        $this->call(ForeignRequisitionTableSeeder::class);
        $this->call(ForeignRequisitionItemTableSeeder::class);
        $this->call(ForeignPurchaseOrderTableSeeder::class);

        $this->call(CompanyProfileTableSeeder::class);
        $this->call(CompanyBankTableSeeder::class);
        $this->call(CompanyLicenseTableSeeder::class);
        
        $this->call(ProformaInvoiceSeeder::class);
        $this->call(LocalRequisitionTableSeeder::class);
        $this->call(LetterOfCreditTableSeeder::class);
        $this->call(LetterOfCreditItemTableSeeder::class);
        $this->call(InventoryItemTypesSeeder::class);
        $this->call(WorkingUnitsTableSeeder::class);
        $this->call(StocksTableSeeder::class);
        $this->call(InventoryAdjustmentPurposesSeeder::class);
        $this->call(CommercialInvoiceTableSeeder::class);
        $this->call(CommercialInvoiceItemTableSeeder::class);
        $this->call(LocalPurchaseOrderTableSeeder::class);
        $this->call(PackingListTableSeeder::class);
        $this->call(InventoryReturnReasonsTableSeeder::class);
        $this->call(MoveTypeTableSeeder::class);
        $this->call(ModesOfTransportTableSeeder::class);
        $this->call(PaymentTypeTableSeeder::class);
        $this->call(PaymentByTableSeeder::class);
        $this->call(BillOfLadingTableSeeder::class);
        $this->call(CostSheetTableSeeder::class);
        $this->call(InsuranceCoverNoteTableSeeder::class);
        $this->call(CnfTableSeeder::class);
        $this->call(AccessControlSeeder::class);
        
        $this->call(DepartmentsTableSeeder::class);
        $this->call(EmployeeOrgInfoTypesTableSeeder::class);
        $this->call(EmployeeOrgInfoStatusesTableSeeder::class);
        
        $this->call(InventoryRequisitionStatusesTableSeeder::class);
        $this->call(InventoryIssueStatusesTableSeeder::class);
    }
}
