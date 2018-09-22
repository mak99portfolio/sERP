<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">

    <li role="presentation" class="{{ active(route('receive-internal.create')) }}">
        <a href="{{ route('receive-internal.create') }}" id="home-tab" role="tab" aria-expanded="true"title="Receive Internal">
            <i class="fa fa-industry" aria-hidden="true"></i>
            <span class="hidden-xs">Internal Receive</span>
        </a>
    </li>

    <li role="presentation" class="{{ active(route('receive-foreign-purchase.create')) }}">
        <a href="{{ route('receive-foreign-purchase.create') }}" role="tab" id="profile-tab" aria-expanded="false"title="Receive foreign Purchase">
            <i class="fa fa-ship" aria-hidden="true"></i>
            <span class="hidden-xs">Receive foreign Purchase</span>
        </a>
    </li>

    <li role="presentation" class="{{ active(route('receive-local-purchase.create')) }}">
        <a href="{{ route('receive-local-purchase.create') }}" role="tab" id="profile-tab" aria-expanded="false"title="Receive Against foreign Purchase">
            <i class="fa fa-truck" aria-hidden="true"></i>
            <span class="hidden-xs">Receive Local Purchase</span>
        </a>
    </li>

    <li role="presentation" class="{{ active(route('receive-return.create')) }}">
        <a href="{{ route('receive-return.create') }}" role="tab" id="profile-tab2" aria-expanded="false"title="Receive Against Issue">
            <i class="fa fa-undo" aria-hidden="true"></i>
            <span class="hidden-xs">Receive Against Return</span>
        </a>
    </li>
</ul>