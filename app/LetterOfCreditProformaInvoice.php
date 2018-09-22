<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class LetterOfCreditProformaInvoice extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'proforma_invoice_id',
        'letter_of_credit_id',
    ];
    public function proforma_invoice(){
        return $this->belongsTo('App\ProformaInvoice','proforma_invoice_id');
    }
    public function letter_of_credit(){
        return $this->belongsTo('App\LetterOfCredit','letter_of_credit_id');
    }
}
