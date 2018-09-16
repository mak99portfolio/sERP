
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
              <li><a href="{{route('packing-list.index')}}">Packing List</a></li>
              <li><a href="{{route('bill-of-lading.index')}}">Bill of Lading</a></li>
              <li><a href="{{route('cnf.index')}}">Duty Tax, Vat, CNF Bill</a></li>
            </ul>
          </li>
          <li><a>Local Purchase<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="#level2_1">Quatation</a>
              </li>
              <li><a href="{{route('local-purchase-order.index')}}">Purchase Order</a>
              </li>
            </ul>
          </li>
          <li><a>Setting<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{route('vendor.index')}}">Vendor</a></li>
              <li><a href="{{route('vendor-category.index')}}">Vendor Category</a></li>
              <li><a href="{{route('requisition-type.index')}}">Requisition Type</a></li>
              <li><a href="{{route('requisition-purpose.index')}}">Requisition Purpose</a></li>
              <li><a href="{{route('requisition-priority.index')}}">Requisition Priority</a></li>
            </ul>
          </li>
        </ul>
      </li>
      <li><a><i class="fa fa-hdd-o"></i> Inventory <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="general_elements.html">Requisition</a></li>
          <li><a href="media_gallery.html">Issue</a></li>
          <li><a href="typography.html">Receive Item</a></li>
          <li><a>Setting<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
            <li class="sub_menu"><a href="{{route('working-unit.index')}}">Working Unit</a></li>
              <li><a href="#level2_1">Item Status</a></li>
              <li><a href="#level2_2">Adjustment Purpose</a></li>
              <li><a href="#level2_2">Return Reason</a></li>
              <li><a href="#level2_2">Record Type</a></li>
            </ul>
          </li>
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
          <li><a href="{{route('product.index')}}">Product</a></li>
          <li><a href="{{route('bank.index')}}">Bank</a></li>
          <li><a href="{{route('employee-profile.index')}}">Employee Profile</a></li>
          <li><a href="{{route('enclosure.index')}}">Enclosure</a></li>
        </ul>
      </li>
    </ul>
  </div>
  <div class="menu_section">
    <h3>Report</h3>
    <ul class="nav side-menu">
      <li><a><i class="fa fa-bug"></i> Procurement <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="e_commerce.html">E-commerce</a></li>
          <li><a href="projects.html">Projects</a></li>
          <li><a href="project_detail.html">Project Detail</a></li>
          <li><a href="contacts.html">Contacts</a></li>
          <li><a href="profile.html">Profile</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-windows"></i> Inventory <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="page_403.html">403 Error</a></li>
          <li><a href="page_404.html">404 Error</a></li>
          <li><a href="page_500.html">500 Error</a></li>
          <li><a href="plain_page.html">Plain Page</a></li>
          <li><a href="login.html">Login Page</a></li>
          <li><a href="pricing_tables.html">Pricing Tables</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-sitemap"></i> Sales <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            <li><a href="#level1_1">Level One</a>
            <li><a>Level One<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li class="sub_menu"><a href="level2.html">Level Two</a>
                </li>
                <li><a href="#level2_1">Level Two</a>
                </li>
                <li><a href="#level2_2">Level Two</a>
                </li>
              </ul>
            </li>
            <li><a href="#level1_2">Level One</a>
            </li>
        </ul>
      </li>
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
  <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
  </a>
</div>
<!-- /menu footer buttons -->
