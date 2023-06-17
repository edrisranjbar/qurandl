<!-- Sidebar -->
<ul class="m-0 p-0 navbar-nav bg-gradient-dark sidebar sidebar-dark accordion text-right rounded-top-right-1 rounded-bottom-right-1"
    id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <li>
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('admin//') }}">
            <div class="sidebar-brand-text mx-3">
                {{ $title ?? 'قرآن دانلود' }}
            </div>
        </a>
    </li>

    <!-- Divider -->
    <li>
        <hr class="sidebar-divider my-0">
    </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin//') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>داشبورد</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
            aria-expanded="false" aria-controls="collapseUsers">
            <i class="fas fa-fw fa-users"></i>
            <span>قاری ها</span>
        </a>
        <div id="collapseUsers" class="collapse" aria-labelledby="collapseUsers" data-parent="#accordionSidebar">
            <div class="collapse-inner">
                <a class="collapse-item" href="{{ url('admin/users/') }}">
                    <span>لیست اعضا</span>
                </a>
                <a class="collapse-item" href="{{ url('admin/payments/') }}">
                    <span>واریزی اعضا</span>
                </a>
                <a class="collapse-item" href="{{ url('admin/withdrawals/') }}">
                    <span>برداشت اعضا</span>
                </a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLoan"
            aria-expanded="false" aria-controls="collapseLoan">
            <i class="fas fa-fw fa-microphone"></i>
            <span>تلاوات خاشعه</span>
        </a>
        <div id="collapseLoan" class="collapse" aria-labelledby="collapseLoan" data-parent="#accordionSidebar">
            <div class="collapse-inner">
                <a class="collapse-item" href="{{ url('admin/loans/') }}">لیست وام‌ها</a>
                <a class="collapse-item" href="{{ url('admin/loanTurns/') }}">نوبت‌های وام</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/donations/') }}">
            <i class="fas fa-fw fa-donate"></i>
            <span>کمک‌های دریافتی</span>
        </a>
    </li>

    <li class="nav-item ">
        <a class="nav-link" href="{{ url('admin/reports/') }}">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>گزارش‌ها</span>
        </a>
    </li>

    <li class="nav-item ">
        <a class="nav-link" href="{{ url('admin/comments') }}">
            <i class="fas fa-fw fa-comments"></i>
            <span>نظرات و پیشنهادها</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTools"
            aria-expanded="false" aria-controls="collapseTools">
            <i class="fas fa-fw fa-tools"></i>
            <span>ابزارها</span>
        </a>
        <div id="collapseTools" class="collapse" aria-labelledby="collapseTools" data-parent="#accordionSidebar">
            <div class="collapse-inner">
                <a class="collapse-item" href="{{ url('admin/notes/') }}">یادداشت‌ها</a>
                <a class="collapse-item" href="{{ url('admin/backups/') }}">پشتیبان‌گیری</a>
                <a class="collapse-item" href="{{ url('admin/sendSMS/') }}">ارسال پیامک</a>
            </div>
        </div>
    </li>

    <li class="nav-item ">
        <a class="nav-link" href="{{ url('admin/settings/') }}">
            <i class="fas fa-fw fa-wrench"></i>
            <span>تنظیمات</span>
        </a>
    </li>

</ul>
<!-- End of Sidebar -->
