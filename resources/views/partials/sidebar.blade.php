
 <!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    {{-- <h3>General</h3> --}}
    <ul class="nav side-menu">
       <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
       <li><a><i class="fa fa-truck"></i> Procurement <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a>Foreign Purchase<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{route('foreign-requisition.index')}}">Foreign Requisition</a></li>
              <li><a href="{{route('purchase-order.index')}}">Purchase Order</a></li>
              <li><a href="{{route('proforma-invoice.index')}}">Proforma Invoice</a></li>
              <li><a href="{{route('letter-of-credit.index')}}">LC Details</a></li>
              <li><a href="{{route('cost-sheet.index')}}">Cost Sheet</a></li>
              <li><a href="{{route('insurance-cover-note.index')}}">Insurance Cover Note</a></li>
              <li><a href="{{route('commercial-invoice.index')}}">Commercial Invoice</a></li>
              <li><a href="{{route('commercial-invoice-tracking.index')}}">CI Tracking</a></li>
              <li><a href="{{route('packing-list.index')}}">Packing List</a></li>
              <li><a href="{{route('bill-of-lading.index')}}">Bill of Lading</a></li>
              <li><a href="{{route('cnf.index')}}">Duty Tax, Vat, CNF Bill</a></li>
              <li><a href="{{route('foreign-payment.index')}}">Payments</a></li>
            </ul>
          </li>
          <li><a>Local Purchase<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{Route('local-requisition.index')}}">Local Requisition</a>
              </li>
              <li><a href="{{route('local-purchase-order.index')}}">Purchase Order</a>
              </li>
            </ul>
          </li>
          <li><a>Setting<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{route('vendor.index')}}">Vendor</a></li>
              <li><a href="{{route('vendor-category.index')}}">Vendor Category</a></li>
              <li><a href="{{route('requisition-purpose.index')}}">Requisition Purpose</a></li>
              <li><a href="{{route('cost-particular.index')}}">Cost Particulars</a></li>
              <li><a href="{{route('consignment-particular.index')}}">Consignmnet Particulars</a></li>
              <li><a href="{{route('move-type.index')}}">Move Type</a></li>
              <li><a href="{{route('modes-of-transport.index')}}">Modes Of Transport</a></li>
              <li><a href="{{route('payment-type.index')}}">Payment Type</a></li>
            </ul>
          </li>
        </ul>
      </li>

      @can('access_to_inventory')
      <li><a><i class="fa fa-hdd-o"></i> Inventory <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{ route('requisition.index') }}">Requisition</a></li>
          <li><a href="{{ route('issue.index') }}">Issue</a></li>
          <li><a href="{{ route('receive.index') }}">Receive Item</a></li>
          <li><a>Setting<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ route('status-adjustment.index') }}">Item Status Adjustment</a></li>
              <li><a href="{{ route('stock-adjustment.index') }}">Item Stock Adjustment</a></li>
              {{-- <li><a href="{{ route('item-status.index') }}">Item Status List</a></li> --}}
              <li><a href="{{ route('adjustment-purpose.index') }}">Adjustment Purpose List</a></li>
              <li><a href="{{ route('return-reason.index') }}">Return Reason List</a></li>
              <li><a href="{{ route('requisition-type.index') }}">Requisition Type List</a></li>
              <li><a href="{{ route('record-type.index') }}">Record Type List</a></li>
            </ul>
          </li>
        </ul>
      </li>
      @endcan

      <li><a><i class="fa fa-dollar"></i> Accounts <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{ route('product-costing.index') }}">Product Costing</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-cogs"></i> Master Data <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{route('country.index')}}">Country</a></li>
          <li><a href="{{route('city.index')}}">City</a></li>
          <li><a href="{{route('port.index')}}">Port</a></li>
          <li><a href="{{route('unit-of-measurement.index')}}">Unit Of Measurement</a></li>
          <li><a href="{{route('product-category.index')}}">Product Category</a></li>
          <li><a href="{{route('product-brand.index')}}">Product Brand</a></li>
          <li><a href="{{route('product-model.index')}}">Product Model</a></li>
          <li><a href="{{route('product-size.index')}}">Product Size</a></li>
          <li><a href="{{route('product.index')}}">Product</a></li>
          <li><a href="{{route('bank.index')}}">Bank</a></li>
          <li><a href="{{route('enclosure.index')}}">Enclosure</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-industry"></i> Company Setting <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{ route('company-profile.index')}}">General Information</a></li>
          <li><a href="{{ route('working-unit.index')}}">Working Unit</a></li>
          <li><a href="{{ route('employee-profile.index')}}">Employees</a></li>
          <li><a href="{{ route('company-bank.index')}}">Bank Information</a></li>
          <li><a href="{{ route('company-license.index')}}">Licenses</a></li>
          <li><a href="{{ route('company-license.index')}}">Licenses</a></li>
          <li><a href="{{ route('employee-user.index')}}">Employee Related User</a></li>
        </ul>
      </li>

      @can('view_developer_menu')
      <li><a><i class="fa fa-key"></i> Access Control <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{ Route('user.index') }}">User List</a></li>
          <li><a href="{{ route('role.index') }}">Roles</a></li>
          <li><a href="{{ route('permission.index') }}">Permissions</a></li>
          <li><a href="{{ Route('matrix.index') }}">Role Permission Matrix</a></li>
          <li><a href="{{ Route('role-user-matrix') }}">Role User Matrix</a></li>
          <li><a href="{{ Route('user-permission-matrix') }}">User Direct Permissions</a></li>
        </ul>
      </li>
      @endcan

    </ul>
  </div>
  <div class="menu_section">
    <h3>Report</h3>
    <ul class="nav side-menu">
      <li><a><i class="fa fa-truck"></i> Procurement <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            <li><a>Foreign Purchase<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="#">Foreign Requisition</a></li>
                <li><a href="{{ route('report-foreign-purchase-order') }}">Purchase Order</a></li>
                <li><a href="{{ route('report-proforma-invoice') }}">Proforma Invoice</a></li>
                <li><a href="#">LC Details</a></li>
                <li><a href="#">Cost Sheet</a></li>
                <li><a href="#">Insurance Cover Note</a></li>
                <li><a href="{{ route('report-commercial-invoice') }}">Commercial Invoice</a></li>
                <li><a href="#">CI Tracking</a></li>
                <li><a href="#">Packing List</a></li>
                <li><a href="#">Bill of Lading</a></li>
                <li><a href="#">Duty Tax, Vat, CNF Bill</a></li>
                <li><a href="#">Payments</a></li>
              </ul>
            </li>
            <li><a>Local Purchase<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="#">Local Requisition</a>
                </li>
                <li><a href="#">Purchase Order</a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li><a><i class="fa fa-hdd-o"></i> Inventory <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
          <li><a href="{{route('stock-report.index')}}">Stock Reports</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-dollar"></i> Accounts <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="#">Product Costing</a></li>
          </ul>
        </li>
     </ul>
  </div>
  <div class="menu_section">
    <h3>Developer Area</h3>
    <ul class="nav side-menu">
      <li><a href="{{ URL::to('/design') }}"><i class="fa fa-globe"></i> Design Test</span></a></li>
     </ul>
  </div>

</div>
<!-- /sidebar menu -->

<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
  <a data-toggle="tooltip" data-placement="top" title="Settings">
    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="FullScreen">
    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="Lock">
    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    <span class="glyphicon glyphicon-off" aria-hidden="true"></span> <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
  </a>
</div>
<!-- /menu footer buttons -->
