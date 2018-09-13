<?php
namespace App\Helpers;
use Carbon\Carbon;
use App\Transaction;
use App\TransactionType;
use App\JournalEntry;

/**
* Listing financial transaction for journal entry
*/

class Voucher{

	public $approver,$type,$user=NULL,$amount=0,$notes=NULL;
	protected $transaction;

	public function commit(){
		$this->transaction=new Transaction;
		if($this->approver && $this->type && $this->amount > 0){
			$this->transaction->transactionType()->associate($this->type);
			if($this->user) $this->transaction->user()->associate($this->user);
			$this->transaction->amount=$this->amount;
			$this->transaction->notes=$this->notes;
			$this->transaction->approver()->associate($this->approver);
			if($this->transaction->save()){
				if($this->journalEntries($this->type)) return TRUE;
				return FALSE;
			}
			return FALSE;
		}
		return FALSE;
	}

	protected function journalEntries(TransactionType $type){
		$errors=0;
		\DB::beginTransaction();
			$debit=new JournalEntry;
			$debit->transaction()->associate($this->transaction);
			$debit->account()->associate($type->debitAccount);
			$debit->debit=$this->amount;
			if(!$debit->save()) ++$errors;

			$credit=new JournalEntry;
			$credit->transaction()->associate($this->transaction);
			$credit->account()->associate($type->creditAccount);
			$credit->credit=$this->amount;
			if(!$credit->save()) ++$errors;
		\DB::commit();
		if($errors==0) return TRUE;
		return FALSE;
	}

}