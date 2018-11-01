<ul class="nav nav-tabs tabs-left">
    <li {{ (Request::is('sales/rule-setup/credit-rule')) ? "class=active" : null }}><a href="{{ route('credit-rule.index') }}">Credit Rule</a></li>
    <li {{ (Request::is('sales/rule-setup/discount-customer-wise')) ? "class=active" : null }}><a href="{{ route('discount-customer-wise.index') }}">Discount <small>(Customer Wise)</small></a></li>
    <li {{ (Request::is('sales/rule-setup/discount-generic')) ? "class=active" : null }}><a href="{{ route('discount-generic.index') }}">Discount <small>(Generic)</small></a></li>
    <li {{ (Request::is('sales/rule-setup/free-bonus-customer-wise')) ? "class=active" : null }}><a href="{{ route('free-bonus-customer-wise.index') }}">Free/Bonus <small>(Customer Wise)</small></a></li>
    <li {{ (Request::is('sales/rule-setup/free-bonus-generic')) ? "class=active" : null }}><a href="{{ route('free-bonus-generic.index') }}">Free/Bonus <small>(Generic)</small></a></li>
</ul>